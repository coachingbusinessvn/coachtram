<?php
/**
 * One-Click Demo Import
 * Menu: Giao diện → Nhập Demo
 *
 * Creates pages, testimonials, FAQs, taxonomy terms,
 * global options, and reading settings in one click.
 */

/* ============================================================
   ADMIN MENU
   ============================================================ */
add_action('admin_menu', function () {
    add_theme_page(
        'Nhập nội dung mẫu',
        '🚀 Nhập Demo',
        'manage_options',
        'edt-demo-import',
        'edt_demo_import_page'
    );
});

/* ============================================================
   RENDER PAGE
   ============================================================ */
function edt_demo_import_page() {
    if (!current_user_can('manage_options')) return;

    $imported = get_option('edt_demo_imported', false);
    $result   = null;

    // Handle form submission
    if (isset($_POST['edt_demo_import_nonce']) && wp_verify_nonce($_POST['edt_demo_import_nonce'], 'edt_run_demo_import')) {
        $result = edt_run_demo_import();
        $imported = true;
    }

    // Handle reset
    if (isset($_POST['edt_demo_reset_nonce']) && wp_verify_nonce($_POST['edt_demo_reset_nonce'], 'edt_run_demo_reset')) {
        edt_run_demo_reset();
        $imported = false;
        echo '<div class="notice notice-info is-dismissible"><p>✅ Đã xoá tất cả nội dung demo.</p></div>';
    }

    ?>
    <div class="wrap">
        <h1>🚀 Nhập nội dung mẫu — Edina Trâm V2</h1>

        <?php if ($result) : ?>
            <div class="notice notice-success is-dismissible">
                <p><strong>✅ Nhập demo thành công!</strong></p>
                <ul style="list-style:disc;padding-left:20px;">
                    <li>📄 <?php echo esc_html($result['pages']); ?> trang</li>
                    <li>💬 <?php echo esc_html($result['testimonials']); ?> ý kiến khách hàng</li>
                    <li>❓ <?php echo esc_html($result['faqs']); ?> câu hỏi FAQ</li>
                    <li>🏷️ <?php echo esc_html($result['terms']); ?> danh mục chương trình</li>
                    <li>⚙️ Cài đặt chung đã cập nhật</li>
                    <li>🖼️ <?php echo esc_html($result['images']); ?> ảnh demo</li>
                </ul>
                <p>👉 <a href="<?php echo esc_url(home_url('/')); ?>" target="_blank">Xem website</a></p>
            </div>
        <?php endif; ?>

        <div class="card" style="max-width:700px;padding:20px 24px;">
            <h2 style="margin-top:0;">Nội dung sẽ được tạo</h2>
            <table class="widefat striped" style="margin-bottom:16px;">
                <tbody>
                    <tr><td><strong>📄 Trang</strong></td><td>Trang chủ, Passion to Profit, TINA Awakening, Business Mastery, Liên hệ</td></tr>
                    <tr><td><strong>💬 Testimonials</strong></td><td>12 ý kiến khách hàng (DV1: 6, DV2: 3, Trang chủ: 3)</td></tr>
                    <tr><td><strong>❓ FAQs</strong></td><td>11 câu hỏi thường gặp (DV1: 6, DV2: 5)</td></tr>
                    <tr><td><strong>🏷️ Danh mục</strong></td><td>dich-vu-1, dich-vu-2, dich-vu-3, trang-chu</td></tr>
                    <tr><td><strong>⚙️ Cài đặt</strong></td><td>Tên coach, social links, liên lạc, trang chủ tĩnh</td></tr>
                    <tr><td><strong>🖼️ Ảnh</strong></td><td>coach-tram-hero.png, coach-tram.JPG → Media Library</td></tr>
                </tbody>
            </table>

            <?php if ($imported) : ?>
                <p style="color:#2271b1;">✅ Nội dung demo đã được nhập. Nếu muốn nhập lại, hãy reset trước.</p>
                <form method="post" style="display:inline;">
                    <?php wp_nonce_field('edt_run_demo_reset', 'edt_demo_reset_nonce'); ?>
                    <button type="submit" class="button" onclick="return confirm('Xoá tất cả nội dung demo? Hành động này không thể hoàn tác.');">🗑️ Xoá nội dung demo</button>
                </form>
            <?php else : ?>
                <form method="post">
                    <?php wp_nonce_field('edt_run_demo_import', 'edt_demo_import_nonce'); ?>
                    <button type="submit" class="button button-primary button-hero" style="font-size:16px;">
                        🚀 Nhập nội dung mẫu
                    </button>
                </form>
                <p class="description" style="margin-top:10px;">Quá trình nhập chỉ mất vài giây. Nội dung hiện có sẽ không bị ảnh hưởng.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

/* ============================================================
   IMPORT LOGIC
   ============================================================ */
function edt_run_demo_import() {
    $counts = ['pages' => 0, 'testimonials' => 0, 'faqs' => 0, 'terms' => 0, 'images' => 0];

    // ─── 1. TAXONOMY TERMS ───
    $terms_data = [
        'dich-vu-1' => 'Passion to Profit',
        'dich-vu-2' => 'TINA Awakening',
        'dich-vu-3' => 'Business Mastery',
        'trang-chu' => 'Trang chủ',
    ];
    foreach ($terms_data as $slug => $name) {
        if (!term_exists($slug, 'program_cat')) {
            wp_insert_term($name, 'program_cat', ['slug' => $slug]);
            $counts['terms']++;
        }
    }

    // ─── 2. IMPORT DEMO IMAGES ───
    $images_map = edt_import_demo_images();
    $counts['images'] = count($images_map);

    // ─── 3. PAGES ───
    $pages_data = [
        ['Trang chủ',              '',           'front-page'],
        ['Passion to Profit',      'dich-vu-1',  'dich-vu-1'],
        ['TINA Awakening',         'dich-vu-2',  'dich-vu-2'],
        ['Business Mastery',       'dich-vu-3',  'dich-vu-3'],
        ['Liên hệ',               'lien-he',    'lien-he'],
    ];
    $page_ids = [];
    foreach ($pages_data as $p) {
        list($title, $slug, $template) = $p;
        $existing = $slug ? get_page_by_path($slug) : get_page_by_title($title);
        if (!$existing) {
            $page_id = wp_insert_post([
                'post_title'   => $title,
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
                'page_template' => $template === 'front-page' ? '' : 'page-' . $template . '.php',
            ]);
            if (!is_wp_error($page_id)) {
                $counts['pages']++;
                $page_ids[$template] = $page_id;
            }
        } else {
            $page_ids[$template] = $existing->ID;
        }
    }

    // Set hero images via metabox fields
    if (!empty($images_map['coach-tram-hero.png']) && isset($page_ids['dich-vu-1'])) {
        update_post_meta($page_ids['dich-vu-1'], '_dv1_hero_image', $images_map['coach-tram-hero.png']);
    }
    if (!empty($images_map['coach-tram.JPG']) && isset($page_ids['front-page'])) {
        update_post_meta($page_ids['front-page'], '_home_about_image', $images_map['coach-tram.JPG']);
    }
    if (!empty($images_map['coach-tram-hero.png']) && isset($page_ids['front-page'])) {
        update_post_meta($page_ids['front-page'], '_home_hero_image', $images_map['coach-tram-hero.png']);
    }

    // ─── 4. TESTIMONIALS ───
    $testimonials = edt_get_demo_testimonials();
    foreach ($testimonials as $t) {
        // Check if already exists by title
        $existing = get_page_by_title($t['name'], OBJECT, 'edina_testimonial');
        if ($existing) continue;

        $post_id = wp_insert_post([
            'post_title'   => $t['name'],
            'post_content' => $t['quote'],
            'post_status'  => 'publish',
            'post_type'    => 'edina_testimonial',
        ]);
        if (!is_wp_error($post_id)) {
            update_post_meta($post_id, '_testimonial_role', $t['role']);
            // Set avatar if image was imported
            if (!empty($t['avatar_key']) && !empty($images_map[$t['avatar_key']])) {
                set_post_thumbnail($post_id, $images_map[$t['avatar_key']]);
            }
            // Assign taxonomy
            if (!empty($t['program'])) {
                wp_set_object_terms($post_id, $t['program'], 'program_cat');
            }
            $counts['testimonials']++;
        }
    }

    // ─── 5. FAQs ───
    $faqs = edt_get_demo_faqs();
    foreach ($faqs as $faq) {
        $existing = get_page_by_title($faq['question'], OBJECT, 'edina_faq');
        if ($existing) continue;

        $post_id = wp_insert_post([
            'post_title'   => $faq['question'],
            'post_content' => $faq['answer'],
            'post_status'  => 'publish',
            'post_type'    => 'edina_faq',
        ]);
        if (!is_wp_error($post_id)) {
            wp_set_object_terms($post_id, $faq['program'], 'program_cat');
            $counts['faqs']++;
        }
    }

    // ─── 6. GLOBAL OPTIONS ───
    $options = [
        'edt_coach_name'      => 'Edina Trâm',
        'edt_coach_title'     => 'Tham vấn Tâm lý · Khai vấn cuộc sống · Tài chính · Tâm linh',
        'edt_contact_email'   => 'lequynhtram@gmail.com',
        'edt_contact_phone'   => '(+84) 88-9590-888',
        'edt_social_facebook' => 'https://www.facebook.com/edina.quynhtram',
        'edt_social_website'  => 'https://edinatram.vn',
        'edt_contact_zalo'    => 'https://zalo.me/84889590888',
        'edt_header_cta_label'=> 'Đặt lịch Tư vấn',
        'edt_footer_tagline'  => 'Dẫn lối bình an, khai mở nội lực. Đồng hành cùng bạn trên hành trình kiến tạo cuộc sống chất lượng.',
        'edt_footer_copyright'=> '© 2026 Edina Trâm. All rights reserved.',
        'edt_logo_text'       => 'Edina <span>Trâm</span>',
    ];
    foreach ($options as $key => $value) {
        if (get_option($key) === false || get_option($key) === '') {
            update_option($key, $value);
        }
    }

    // ─── 7. READING SETTINGS ───
    if (isset($page_ids['front-page'])) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $page_ids['front-page']);
    }

    // ─── 8. PERMALINKS ───
    if (get_option('permalink_structure') !== '/%postname%/') {
        update_option('permalink_structure', '/%postname%/');
        flush_rewrite_rules();
    }

    // Mark as imported
    update_option('edt_demo_imported', true);

    return $counts;
}

/* ============================================================
   IMPORT DEMO IMAGES TO MEDIA LIBRARY
   ============================================================ */
function edt_import_demo_images() {
    $map = [];
    $images_dir = get_template_directory() . '/assets/images/';

    if (!is_dir($images_dir)) return $map;

    require_once ABSPATH . 'wp-admin/includes/image.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';

    $files = [
        'coach-tram-hero.png' => 'Coach Edina Trâm – Hero',
        'coach-tram.JPG'      => 'Coach Edina Trâm – Đôi nét',
    ];

    foreach ($files as $filename => $title) {
        $filepath = $images_dir . $filename;
        if (!file_exists($filepath)) continue;

        // Check if already in media library
        $existing = get_posts([
            'post_type'  => 'attachment',
            'meta_key'   => '_edt_demo_source',
            'meta_value' => $filename,
            'posts_per_page' => 1,
        ]);
        if (!empty($existing)) {
            $map[$filename] = $existing[0]->ID;
            continue;
        }

        // Copy to uploads dir
        $upload_dir = wp_upload_dir();
        $dest = $upload_dir['path'] . '/' . $filename;
        if (!copy($filepath, $dest)) continue;

        $filetype = wp_check_filetype($filename);
        $attachment_id = wp_insert_attachment([
            'post_title'     => $title,
            'post_mime_type' => $filetype['type'],
            'post_status'    => 'inherit',
        ], $dest);

        if (!is_wp_error($attachment_id)) {
            $attach_data = wp_generate_attachment_metadata($attachment_id, $dest);
            wp_update_attachment_metadata($attachment_id, $attach_data);
            update_post_meta($attachment_id, '_edt_demo_source', $filename);
            $map[$filename] = $attachment_id;
        }
    }

    return $map;
}

/* ============================================================
   DEMO DATA: TESTIMONIALS
   ============================================================ */
function edt_get_demo_testimonials() {
    return [
        // ── DV1: Passion to Profit — Khóa 1 ──
        [
            'name'    => 'Ly Ly',
            'role'    => 'Freelancer',
            'quote'   => 'Workshop giúp mình nhìn thấy con đường rõ ràng từ đam mê đến thu nhập. Từ một freelancer bơ vơ, mình giờ có bản kế hoạch kinh doanh hoàn chỉnh.',
            'program' => 'dich-vu-1',
            'avatar_key' => '',
        ],
        [
            'name'    => 'Thu Hà',
            'role'    => 'Nhân viên văn phòng',
            'quote'   => 'Cô Trâm giúp mình hiểu rằng khởi nghiệp không phải là liều lĩnh, mà là chuẩn bị kỹ lưỡng. 2 ngày thay đổi hoàn toàn góc nhìn của mình.',
            'program' => 'dich-vu-1',
            'avatar_key' => '',
        ],
        [
            'name'    => 'Hảo Hảo',
            'role'    => 'Sinh viên năm cuối',
            'quote'   => 'Mình đến workshop với rất nhiều nghi ngờ, nhưng ra về với sự tự tin và một kế hoạch cụ thể. Đây là khoản đầu tư tốt nhất cho tương lai.',
            'program' => 'dich-vu-1',
            'avatar_key' => '',
        ],
        // ── DV1: Passion to Profit — Khóa 2 ──
        [
            'name'    => 'Chu Phí Ngà',
            'role'    => 'Mẹ bỉm sữa',
            'quote'   => 'Là một mẹ bỉm, mình nghĩ kinh doanh là điều xa vời. Nhưng workshop đã cho mình thấy cách xây dựng thu nhập từ chính những gì mình giỏi.',
            'program' => 'dich-vu-1',
            'avatar_key' => '',
        ],
        [
            'name'    => 'Hoàng Lâm',
            'role'    => 'Kỹ sư phần mềm',
            'quote'   => 'Mình vốn là dân kỹ thuật, không biết gì về kinh doanh. Workshop cho mình cái nhìn tổng quan và bước đi đầu tiên rất thực tế.',
            'program' => 'dich-vu-1',
            'avatar_key' => '',
        ],
        [
            'name'    => 'Thùy Nga',
            'role'    => 'Giáo viên',
            'quote'   => 'Năng lượng và kiến thức thực chiến từ cô Trâm là vô giá. Mình đã launch dịch vụ dạy kèm online chỉ 2 tuần sau workshop!',
            'program' => 'dich-vu-1',
            'avatar_key' => '',
        ],
        // ── DV2: TINA Awakening ──
        [
            'name'    => 'Chị Hoàng Hương',
            'role'    => '1984 · Phó phòng Tín dụng khách hàng, Ngân hàng BIDV',
            'quote'   => 'Tôi đã sống 40 năm, va chạm xã hội nhiều, nhưng hôm nay tôi mới thật sự sáng mắt ra. Trâm giúp tôi hiểu tam giác Bi - Trí - Dũng và soi thẳng vào đời mình. Một tháng trước, lúc bế tắc nhất, tôi đã cầu xin một quý nhân dẫn đường. Và Trâm đã xuất hiện.',
            'program' => 'dich-vu-2',
            'avatar_key' => '',
        ],
        [
            'name'    => 'Chị Minh Hương',
            'role'    => '1984 · Boston, Massachusetts',
            'quote'   => 'Phiên coach với Trâm là một trong những trải nghiệm sâu nhất tôi từng có. Trâm giúp tôi chạm vào một ký ức tưởng đã quên từ lâu. Ở Trâm luôn có cảm giác an toàn, kiên nhẫn và không bao giờ phán xét.',
            'program' => 'dich-vu-2',
            'avatar_key' => '',
        ],
        [
            'name'    => 'Anh Lê Thế Hào',
            'role'    => '1993 · Dịch giả, TP. Hồ Chí Minh',
            'quote'   => 'Hai điều giá trị nhất trong phiên: em nhìn rõ hơn đâu là phương tiện và đâu mới thật sự là cứu cánh của đời mình; và bài học "còn thở là còn gỡ". Em cảm nhận được một tình thương thiêng liêng trong đó.',
            'program' => 'dich-vu-2',
            'avatar_key' => '',
        ],
        // ── Trang chủ ──
        [
            'name'    => 'Cao Lân',
            'role'    => 'Chủ quán F&B',
            'quote'   => 'Trước khi gặp chị Trâm, tôi gần như kiệt sức với việc vận hành quán. Sau chương trình coaching, tôi đã xây dựng được hệ thống, có thời gian cho gia đình và doanh thu tăng 40%.',
            'program' => 'trang-chu',
            'avatar_key' => '',
        ],
        [
            'name'    => 'Thanh Ngà',
            'role'    => 'Startup Founder',
            'quote'   => 'Chị Trâm không chỉ coaching về kinh doanh mà còn giúp tôi tìm lại chính mình. Tôi học được cách lắng nghe bản thân, đưa ra quyết định sáng suốt và sống đúng với giá trị cốt lõi.',
            'program' => 'trang-chu',
            'avatar_key' => '',
        ],
        [
            'name'    => 'Phạm Hiếu',
            'role'    => 'Giám đốc vận hành',
            'quote'   => 'Business Mastery đã thay đổi hoàn toàn cách tôi lãnh đạo đội ngũ. Từ một người quản lý áp lực, tôi trở thành nhà lãnh đạo truyền cảm hứng, và đội ngũ cũng phát triển vượt bậc.',
            'program' => 'trang-chu',
            'avatar_key' => '',
        ],
    ];
}

/* ============================================================
   DEMO DATA: FAQs
   ============================================================ */
function edt_get_demo_faqs() {
    return [
        // ── DV1: Passion to Profit ──
        [
            'question' => 'Workshop này khác gì so với các khóa học online khác?',
            'answer'   => '<p>Workshop Passion to Profit tập trung vào <strong>thực hành</strong>, không phải lý thuyết. Bạn sẽ làm việc trực tiếp trên ý tưởng kinh doanh của mình, được Coach Edina Trâm phản hồi cá nhân hóa, và ra về với một bản kế hoạch hành động cụ thể. Đây không phải webinar nghe rồi quên – đây là 2 ngày làm việc thật, cho kết quả thật.</p>',
            'program'  => 'dich-vu-1',
        ],
        [
            'question' => 'Tôi chưa có ý tưởng kinh doanh rõ ràng, có tham gia được không?',
            'answer'   => '<p>Hoàn toàn có! Đây chính là workshop phù hợp nhất cho bạn. Module đầu tiên (WHY) sẽ giúp bạn khám phá đam mê, thế mạnh và tìm ra ý tưởng kinh doanh phù hợp. Nhiều học viên đến workshop mà chưa biết muốn làm gì, và ra về với một ý tưởng rõ ràng.</p>',
            'program'  => 'dich-vu-1',
        ],
        [
            'question' => 'Tôi đã có công việc ổn định, workshop có phù hợp không?',
            'answer'   => '<p>Rất phù hợp! Workshop giúp bạn khám phá và xây dựng dự án kinh doanh song song với công việc hiện tại. Bạn không cần nghỉ việc ngay – bạn sẽ học cách bắt đầu từng bước, an toàn và có chiến lược.</p>',
            'program'  => 'dich-vu-1',
        ],
        [
            'question' => 'Hình thức tham gia như thế nào? Online hay offline?',
            'answer'   => '<p>Workshop diễn ra trong 2 ngày cuối tuần (thứ 7 – Chủ nhật), từ 9:00 đến 17:00. Hình thức có thể online hoặc offline tùy đợt. Vui lòng liên hệ để xác nhận hình thức cho đợt bạn quan tâm. Mọi tài liệu được gửi trước qua email.</p>',
            'program'  => 'dich-vu-1',
        ],
        [
            'question' => 'Học phí bao gồm những gì?',
            'answer'   => '<p>Học phí <strong>499.000 VNĐ</strong> bao gồm: 2 ngày workshop đầy đủ, tài liệu học tập, workbook thực hành, template Business Model Canvas, kế hoạch hành động 90 ngày, và quyền tham gia cộng đồng học viên vĩnh viễn. Ngoài ra, sinh viên và người mới bắt đầu có cơ hội nhận học bổng 50%.</p>',
            'program'  => 'dich-vu-1',
        ],
        [
            'question' => 'Tôi có được hỗ trợ sau workshop không?',
            'answer'   => '<p>Có! Sau workshop, bạn sẽ được tham gia nhóm cộng đồng học viên, nơi bạn có thể chia sẻ tiến độ, đặt câu hỏi và nhận hỗ trợ từ Coach Trâm và các học viên khác. Nếu cần hỗ trợ chuyên sâu hơn, bạn có thể đăng ký chương trình TINA Awakening – coaching 1:1 trong 90 ngày.</p>',
            'program'  => 'dich-vu-1',
        ],
        // ── DV2: TINA Awakening ──
        [
            'question' => 'TINA Awakening có phải trị liệu tâm lý không?',
            'answer'   => '<p>Đây là hành trình Coaching &amp; Mentoring 1:1 kết hợp nền tảng tâm lý học, khai vấn, tâm linh và đời sống thực tế. Chương trình không thay thế điều trị y khoa hay trị liệu lâm sàng khi bạn đang cần hỗ trợ chuyên môn y tế.</p>',
            'program'  => 'dich-vu-2',
        ],
        [
            'question' => 'Tôi chưa biết vấn đề của mình là gì, có tham gia được không?',
            'answer'   => '<p>Có. Những module đầu tiên được thiết kế để giúp bạn định vị hiện trạng, làm rõ điều mình thật sự muốn và nhìn thấy những vòng lặp đang vận hành bên trong.</p>',
            'program'  => 'dich-vu-2',
        ],
        [
            'question' => 'Vì sao chương trình kéo dài 90 ngày?',
            'answer'   => '<p>Chuyển hoá thật không phải một sự kiện đơn lẻ. 90 ngày cho phép nhận thức mới có thời gian ngấm vào hành vi, lựa chọn, quan hệ và kế hoạch sống của bạn.</p>',
            'program'  => 'dich-vu-2',
        ],
        [
            'question' => 'Tôi có cần chuẩn bị gì trước phiên trải nghiệm không?',
            'answer'   => '<p>Bạn chỉ cần mang theo sự thành thật với chính mình: điều đang khiến bạn bế tắc, điều bạn khao khát thay đổi, và mức độ sẵn sàng nhìn sâu vào bên trong.</p>',
            'program'  => 'dich-vu-2',
        ],
        [
            'question' => 'Sau 90 ngày có thể đi tiếp không?',
            'answer'   => '<p>Có. 90 Ngày Chuyển Hoá là chặng khai sáng đầu tiên. Khi đã thấy rõ tầm nhìn 5-10 năm, nhiều người chọn đi tiếp vào lộ trình chuyên sâu hơn để lên kế hoạch và hiện thực hoá tầm nhìn ấy.</p>',
            'program'  => 'dich-vu-2',
        ],
    ];
}

/* ============================================================
   RESET / CLEANUP
   ============================================================ */
function edt_run_demo_reset() {
    // Delete demo testimonials
    $testimonials = get_posts(['post_type' => 'edina_testimonial', 'numberposts' => -1, 'post_status' => 'any']);
    foreach ($testimonials as $p) {
        wp_delete_post($p->ID, true);
    }

    // Delete demo FAQs
    $faqs = get_posts(['post_type' => 'edina_faq', 'numberposts' => -1, 'post_status' => 'any']);
    foreach ($faqs as $p) {
        wp_delete_post($p->ID, true);
    }

    // Delete demo pages
    $slugs = ['dich-vu-1', 'dich-vu-2', 'dich-vu-3', 'lien-he'];
    foreach ($slugs as $slug) {
        $page = get_page_by_path($slug);
        if ($page) wp_delete_post($page->ID, true);
    }
    // Homepage
    $home = get_page_by_title('Trang chủ');
    if ($home) {
        update_option('show_on_front', 'posts');
        update_option('page_on_front', 0);
        wp_delete_post($home->ID, true);
    }

    // Delete demo images from media library
    $demo_images = get_posts([
        'post_type'  => 'attachment',
        'meta_key'   => '_edt_demo_source',
        'numberposts' => -1,
    ]);
    foreach ($demo_images as $img) {
        wp_delete_attachment($img->ID, true);
    }

    // Delete taxonomy terms
    $terms = ['dich-vu-1', 'dich-vu-2', 'dich-vu-3', 'trang-chu'];
    foreach ($terms as $slug) {
        $term = get_term_by('slug', $slug, 'program_cat');
        if ($term) wp_delete_term($term->term_id, 'program_cat');
    }

    // Reset flag
    delete_option('edt_demo_imported');
}
