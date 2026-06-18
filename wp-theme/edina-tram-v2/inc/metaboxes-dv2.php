<?php
/**
 * Metaboxes — Dịch vụ 2: TINA Awakening
 * Page slug: dich-vu-2
 */

/* ============================================================
   REGISTER META BOX
   ============================================================ */
add_action('add_meta_boxes', function () {
    $screen = get_current_screen();
    if ($screen->id !== 'page') return;
    global $post;
    if (!$post || $post->post_name !== 'dich-vu-2') return;

    add_meta_box(
        'edt_dv2_metabox',
        '⚙️ Nội dung — TINA Awakening',
        'edt_dv2_render',
        'page',
        'normal',
        'high'
    );
});


/* ============================================================
   RENDER CALLBACK
   ============================================================ */
function edt_dv2_render($post) {
    wp_nonce_field('edt_save_dv2', 'edt_dv2_nonce');

    $f = function ($key, $default = '') use ($post) {
        return edt_field($key, $post->ID, $default);
    };
    $img_val = function ($key) use ($post) {
        return edt_field($key, $post->ID);
    };

    edt_render_tabs([
        'edt-dv2-hero'    => '🚀 Hero',
        'edt-dv2-letter'  => '✉️ Thư ngỏ',
        'edt-dv2-what'    => '🔍 Vì sao & Chuyển hoá',
        'edt-dv2-target'  => '👥 Đối tượng',
        'edt-dv2-pillar'  => '🏛️ 3 Trụ cột 3C',
        'edt-dv2-module'  => '📚 12 Modules',
        'edt-dv2-outcome' => '✨ Kết quả',
        'edt-dv2-offer'   => '🎯 Offer',
        'edt-dv2-inst'    => '👨‍🏫 Giảng viên & Nhận xét',
        'edt-dv2-faq'     => '📞 FAQ & CTA',
    ]);


    /* ─── TAB 1: Hero ─── */
    edt_open_tab('edt-dv2-hero', true);

    echo '<h3 class="edt-section-title">Sticky CTA</h3>';
    edt_text_field('_dv2_sticky_title', 'Tiêu đề', $f('dv2_sticky_title', 'TINA Awakening - 90 ngày chuyển hoá'));
    edt_text_field('_dv2_sticky_meta', 'Phụ đề', $f('dv2_sticky_meta', 'Coaching & Mentoring 1:1 · 12 module'));
    edt_text_field('_dv2_sticky_cta_label', 'Nhãn nút', $f('dv2_sticky_cta_label', 'Đặt Lịch Kết Nối'));
    edt_url_field('_dv2_sticky_cta_url', 'Link nút', $f('dv2_sticky_cta_url', ''));

    echo '<h3 class="edt-section-title">Hero</h3>';
    edt_text_field('_dv2_hero_badge', 'Badge', $f('dv2_hero_badge', 'COACHING & MENTORING 1:1'));
    edt_editor_field('_dv2_hero_title', 'Tiêu đề (HTML)', $f('dv2_hero_title', '90 NGÀY<br>CHUYỂN HOÁ<br><span>TINA AWAKENING</span>'), 'Cho phép HTML: &lt;br&gt;, &lt;span&gt;');
    edt_text_field('_dv2_hero_tagline', 'Tagline', $f('dv2_hero_tagline', 'T.I.N.A - Transformation Into New Awareness'));
    edt_textarea_field('_dv2_hero_desc', 'Mô tả', $f('dv2_hero_desc', 'Một hành trình 12 module dành cho những ai đang đi tìm một hướng đi mới cho cuộc đời mình: rõ hơn, vững hơn, và kết nối sâu hơn với chính bản thân.'));

    echo '<h3 class="edt-section-title">3 Stats</h3>';
    $stat_defaults = [
        ['Thời lượng', '90 ngày đồng hành'],
        ['Lộ trình', '12 module 1:1'],
        ['Trụ cột', 'Clarity · Confidence · Connection'],
    ];
    for ($i = 1; $i <= 3; $i++) {
        echo '<div class="edt-group"><p class="edt-group-title">Stat #' . $i . '</p>';
        edt_text_field("_dv2_hero_stat{$i}_label", "Nhãn", $f("dv2_hero_stat{$i}_label", $stat_defaults[$i - 1][0]));
        edt_text_field("_dv2_hero_stat{$i}_value", "Giá trị", $f("dv2_hero_stat{$i}_value", $stat_defaults[$i - 1][1]));
        echo '</div>';
    }

    echo '<h3 class="edt-section-title">CTA & Ảnh</h3>';
    edt_text_field('_dv2_hero_cta_label', 'Nhãn nút CTA', $f('dv2_hero_cta_label', 'Bắt đầu phiên kết nối'));
    edt_url_field('_dv2_hero_cta_url', 'Link nút CTA', $f('dv2_hero_cta_url', ''));
    edt_image_field('_dv2_hero_image', 'Ảnh Hero', $img_val('dv2_hero_image'), 'Ảnh tam giác chuyển hoá 3C');

    edt_close_tab();


    /* ─── TAB 2: Thư ngỏ ─── */
    edt_open_tab('edt-dv2-letter');

    edt_text_field('_dv2_letter_badge', 'Badge', $f('dv2_letter_badge', 'Thư ngỏ'));
    edt_text_field('_dv2_letter_title', 'Tiêu đề', $f('dv2_letter_title', 'Cảm ơn bạn đã có mặt ở đây'));
    edt_editor_field('_dv2_letter_p1', 'Đoạn 1', $f('dv2_letter_p1', 'Tôi không biết điều gì đã đưa bạn đến trang này - một đêm trằn trọc, một câu hỏi chưa có lời đáp, hay một khao khát thay đổi mà bạn còn chưa gọi thành tên. Nhưng tôi tin chắc một điều: bạn đang tìm kiếm điều gì đó lớn hơn hiện tại của mình. Một sự chuyển mình thật sự.'));
    edt_editor_field('_dv2_letter_p2', 'Đoạn 2', $f('dv2_letter_p2', 'Và nếu bạn đã đọc đến đây, tôi tin bạn không chỉ muốn "dễ chịu hơn một chút". Bạn muốn kiến tạo một cuộc sống mới.'));
    edt_editor_field('_dv2_letter_quote', 'Trích dẫn (quote block)', $f('dv2_letter_quote', 'Không có gì là ngẫu nhiên. Việc bạn dừng lại ở đây, đọc đến tận dòng này, đã là một nhân duyên đẹp.'));
    edt_editor_field('_dv2_letter_p3', 'Đoạn 3', $f('dv2_letter_p3', 'Trâm xin được đón bạn bằng tất cả sự trân trọng. Tôi từng đứng đúng nơi bạn đang đứng, mang đúng những trăn trở bạn mang lúc này. Nên tôi hiểu - và tôi biết ơn vì bạn đã cho chúng ta cơ hội được kết nối.'));
    edt_editor_field('_dv2_letter_p4', 'Đoạn 4', $f('dv2_letter_p4', 'Điều tôi mong mỏi là được trao lại phước lành mà chính Trâm đã may mắn nhận được trên hành trình của mình: sự hàn gắn và sáng tỏ cho những ai đang đi trong bóng tối mà vẫn khát khao một tia sáng ở cuối đường hầm.'));

    edt_close_tab();


    /* ─── TAB 3: Vì sao & Chuyển hoá ─── */
    edt_open_tab('edt-dv2-what');

    /* --- Section: Vì sao hành trình này ra đời --- */
    echo '<h3 class="edt-section-title">Vì sao hành trình này ra đời</h3>';
    edt_text_field('_dv2_why_badge', 'Badge', $f('dv2_why_badge', 'Vì sao hành trình này ra đời?'));
    edt_text_field('_dv2_why_title', 'Tiêu đề', $f('dv2_why_title', 'Khi bế tắc cũ cứ quay lại'));
    edt_textarea_field('_dv2_why_desc', 'Mô tả', $f('dv2_why_desc', 'Trước khi đọc tiếp, hãy dừng lại một nhịp và tự hỏi: vì sao mình cứ quay lại đúng chỗ bế tắc cũ dù đã cố gắng, đã trị liệu, đã chữa lành, đã đọc bao nhiêu sách?'));

    $why_defaults = [
        ['Thành công nhưng mất kết nối', 'Từ một người thành công theo chuẩn mực xã hội, Trâm đã đi qua hai lần phá sản, một cuộc hôn nhân đổ vỡ và ba năm suy sụp cả thể chất lẫn tinh thần.'],
        ['Làm lại từ con số không', 'Ở đáy sâu ấy, một sự thức tỉnh bắt đầu. Trâm từng bước dựng lại đời sống tài chính, sống Đời và Đạo song hành, rồi biến trải nghiệm ấy thành sứ mệnh phụng sự.'],
        ['Không tự mò mẫm mãi', 'Trâm học cách đứng trên vai người khổng lồ: đầu tư đúng vào người thầy, người khai vấn, người dẫn dắt để vực dậy nhanh hơn và tránh tổn hao nhiều công sức.'],
        ['Trở thành người đồng hành', 'TINA Awakening ra đời để trở thành người đồng hành mà chính Trâm từng ao ước có được trong những ngày tăm tối nhất.'],
    ];
    for ($i = 1; $i <= 4; $i++) {
        echo '<div class="edt-group"><p class="edt-group-title">Câu chuyện #' . $i . '</p>';
        edt_text_field("_dv2_why{$i}_title", "Tiêu đề #{$i}", $f("dv2_why{$i}_title", $why_defaults[$i - 1][0]));
        edt_textarea_field("_dv2_why{$i}_desc", "Mô tả #{$i}", $f("dv2_why{$i}_desc", $why_defaults[$i - 1][1]));
        echo '</div>';
    }
    edt_editor_field('_dv2_why_quote', 'Trích dẫn cuối section', $f('dv2_why_quote', 'Tôi không giỏi hơn bạn. Tôi chỉ vấp ngã trước bạn.'));

    /* --- Section: Gốc rễ chuyển hoá --- */
    echo '<h3 class="edt-section-title">Gốc rễ chuyển hoá (Khủng hoảng quay lại)</h3>';
    edt_text_field('_dv2_crisis_badge', 'Badge', $f('dv2_crisis_badge', 'Gốc rễ chuyển hoá'));
    edt_text_field('_dv2_crisis_title', 'Tiêu đề', $f('dv2_crisis_title', 'Khủng hoảng quay lại không phải vì bạn yếu'));
    edt_textarea_field('_dv2_crisis_desc', 'Mô tả', $f('dv2_crisis_desc', 'Phần lớn giải pháp chỉ chữa phần ngọn: coaching ngắn hạn, trị liệu tách rời đời sống thật, chữa lành dừng ở cảm xúc. Nỗi đau quay lại vì nền tảng sống bên trong bạn chưa được tái cấu trúc.'));

    edt_text_field('_dv2_crisis_neg_title', 'Tiêu đề cột ❌', $f('dv2_crisis_neg_title', 'Khi chỉ xử lý phần ngọn'));
    $neg_defaults = [
        'Bạn thấy nhẹ đi một thời gian, rồi mọi thứ lặng lẽ trở về như cũ.',
        'Bạn tự hỏi phải chăng mình chưa đủ cố gắng, chưa đủ kỷ luật, chưa đủ tốt.',
        'Bạn học thêm rất nhiều nhưng vẫn không thoát khỏi vòng lặp cũ.',
    ];
    for ($i = 1; $i <= 3; $i++) {
        edt_text_field("_dv2_crisis_neg{$i}", "Điểm ❌ #{$i}", $f("dv2_crisis_neg{$i}", $neg_defaults[$i - 1]));
    }

    edt_text_field('_dv2_crisis_pos_title', 'Tiêu đề cột ✅', $f('dv2_crisis_pos_title', 'TINA làm việc ở tầng sâu hơn'));
    $pos_defaults = [
        'Nhận thức được khai mở để bạn thật sự thấy rõ mình đang sống từ đâu.',
        'Hành vi được làm mới bằng công cụ thực hành, không chỉ bằng cảm hứng.',
        'Nghiệp lực và nhân cách sống được soi chiếu để chuyển hoá bền vững cả Đời lẫn Đạo.',
    ];
    for ($i = 1; $i <= 3; $i++) {
        edt_text_field("_dv2_crisis_pos{$i}", "Điểm ✅ #{$i}", $f("dv2_crisis_pos{$i}", $pos_defaults[$i - 1]));
    }

    /* --- Section: 6 dấu hiệu chuyển hoá thật sự --- */
    echo '<h3 class="edt-section-title">6 dấu hiệu chuyển hoá thật sự</h3>';
    edt_text_field('_dv2_sign_badge', 'Badge', $f('dv2_sign_badge', 'Chuyển hoá thật sự'));
    edt_text_field('_dv2_sign_title', 'Tiêu đề', $f('dv2_sign_title', '90 ngày này không phải một khoảnh khắc "à há"'));
    edt_textarea_field('_dv2_sign_desc', 'Mô tả', $f('dv2_sign_desc', 'Một chuyển hoá thật cần thời gian để ngấm, để sống, để trở thành chính con người bạn. TINA được thiết kế quanh sáu dấu hiệu chuyển hoá này.'));

    $sign_defaults = [
        ['01 · Là một quá trình', 'Nó không xảy ra trong một buổi học truyền cảm hứng, mà cần thời gian để lắng xuống và trở thành nền tảng sống mới.'],
        ['02 · Đến từ tự nhận thức', 'Không ai thay đổi bạn từ bên ngoài. Vai trò của người đồng hành là giúp bạn nhìn rõ để chuyển hoá từ bên trong.'],
        ['03 · Diễn ra âm thầm', 'Những đổi thay quan trọng nhất thường không ồn ào, mà xảy ra ở nơi sâu kín chỉ bạn là người đầu tiên nhận ra.'],
        ['04 · Được kích hoạt an toàn', 'Chuyển hoá thường bắt đầu từ một cú chạm đủ sâu. Chương trình tạo ra những điểm chạm ấy trong một không gian nâng đỡ.'],
        ['05 · Đòi hỏi dám tổn thương', 'Bạn cần dám thành thật với chính mình về những điều khó chấp nhận nhất. Đó là cái giá, và cũng là cánh cửa.'],
        ['06 · Là tấm vé một chiều', 'Khi nền tảng tư duy đã khác, bạn không thể quay lại phiên bản cũ theo cách cũ nữa.'],
    ];
    for ($i = 1; $i <= 6; $i++) {
        echo '<div class="edt-group"><p class="edt-group-title">Dấu hiệu #' . $i . '</p>';
        edt_text_field("_dv2_sign{$i}_title", "Tiêu đề #{$i}", $f("dv2_sign{$i}_title", $sign_defaults[$i - 1][0]));
        edt_textarea_field("_dv2_sign{$i}_desc", "Mô tả #{$i}", $f("dv2_sign{$i}_desc", $sign_defaults[$i - 1][1]));
        echo '</div>';
    }

    edt_close_tab();


    /* ─── TAB 4: Đối tượng ─── */
    edt_open_tab('edt-dv2-target');

    edt_text_field('_dv2_target_badge', 'Badge', $f('dv2_target_badge', 'Dành cho bạn'));
    edt_text_field('_dv2_target_title', 'Tiêu đề section', $f('dv2_target_title', 'TINA Awakening dành cho bạn nếu'));

    $target_defaults = [
        ['ĐANG CHUYỂN MÌNH', 'Bạn đang mất phương hướng, mất kết nối, hoặc mất niềm tin vào chính mình trong một giai đoạn quan trọng của đời sống.'],
        ['ĐÃ THỬ NHIỀU CÁCH', 'Bạn từng coaching, trị liệu hoặc chữa lành, nhưng cảm giác bình an không bền và bạn cứ quay lại điểm cũ.'],
        ['SẴN SÀNG NHÌN SÂU', 'Bạn khao khát hiểu sâu chính mình và sẵn sàng nhìn thẳng vào những điều khó chấp nhận, thay vì tìm một viên thuốc thần kỳ.'],
    ];
    for ($i = 1; $i <= 3; $i++) {
        echo '<div class="edt-group"><p class="edt-group-title">Đối tượng #' . $i . '</p>';
        edt_text_field("_dv2_target{$i}_title", "Tiêu đề #{$i}", $f("dv2_target{$i}_title", $target_defaults[$i - 1][0]));
        edt_textarea_field("_dv2_target{$i}_desc", "Mô tả #{$i}", $f("dv2_target{$i}_desc", $target_defaults[$i - 1][1]));
        echo '</div>';
    }

    edt_editor_field('_dv2_target_quote', 'Trích dẫn cảnh báo', $f('dv2_target_quote', 'Chương trình này chưa dành cho bạn nếu bạn đang tìm một con đường tắt, một lời trấn an nhanh, hoặc mong người khác thay đổi cuộc đời giùm mình.'));

    edt_close_tab();


    /* ─── TAB 5: 3 Trụ cột 3C ─── */
    edt_open_tab('edt-dv2-pillar');

    edt_text_field('_dv2_pillar_badge', 'Badge', $f('dv2_pillar_badge', 'Tam giác chuyển hoá 3C'));
    edt_text_field('_dv2_pillar_title', 'Tiêu đề section', $f('dv2_pillar_title', 'Ba trụ cột chữa lành ba nỗi đau cốt lõi'));
    edt_textarea_field('_dv2_pillar_desc', 'Mô tả section', $f('dv2_pillar_desc', 'Toàn bộ hành trình được xây trên Clarity, Confidence và Connection - mỗi trụ cột nâng đỡ một tầng chuyển hoá của bạn.'));

    $pillar_defaults = [
        ['C', 'CLARITY - Sự thông suốt', 'Một lộ trình rõ ràng giúp chữa lành nỗi đau mất phương hướng, để bạn biết mình đang ở đâu và thật sự muốn đi đâu.'],
        ['C', 'CONFIDENCE - Tự tin làm chủ', 'Phục hồi năng lực ra quyết định và sự vững vàng nội tâm, chữa lành sự mất mát niềm tin vào chính mình.'],
        ['C', 'CONNECTION - Khơi dậy kết nối', 'Kết nối lại với bản thân và người thân, chữa lành sự thiếu hoà hợp trong những mối quan hệ quan trọng.'],
    ];
    for ($i = 1; $i <= 3; $i++) {
        echo '<div class="edt-group"><p class="edt-group-title">Trụ cột #' . $i . '</p>';
        edt_text_field("_dv2_pillar{$i}_letter", "Chữ cái lớn", $f("dv2_pillar{$i}_letter", $pillar_defaults[$i - 1][0]), 'Chữ hiển thị lớn (C, C, C)');
        edt_text_field("_dv2_pillar{$i}_title", "Tiêu đề", $f("dv2_pillar{$i}_title", $pillar_defaults[$i - 1][1]));
        edt_textarea_field("_dv2_pillar{$i}_desc", "Mô tả", $f("dv2_pillar{$i}_desc", $pillar_defaults[$i - 1][2]));
        echo '</div>';
    }

    edt_close_tab();


    /* ─── TAB 6: 12 Modules ─── */
    edt_open_tab('edt-dv2-module');

    edt_text_field('_dv2_mod_badge', 'Badge', $f('dv2_mod_badge', 'Lộ trình 90 ngày'));
    edt_text_field('_dv2_mod_title', 'Tiêu đề section', $f('dv2_mod_title', '12 module đi từ Quá khứ đến Hiện tại và Tương lai'));
    edt_textarea_field('_dv2_mod_desc', 'Mô tả section', $f('dv2_mod_desc', 'Hành trình bắt đầu bằng ổn định và yêu thương bản thân, rồi đi vào hiểu mình, phục hồi nội lực, hàn gắn quan hệ và phóng tầm nhìn cho tương lai.'));

    echo '<div class="edt-group"><p class="edt-group-title">Focus Badges</p>';
    $focus_defaults = ['Clarity', 'Confidence', 'Connection', 'Integration'];
    for ($i = 1; $i <= 4; $i++) {
        edt_text_field("_dv2_mod_focus{$i}", "Focus #{$i}", $f("dv2_mod_focus{$i}", $focus_defaults[$i - 1]));
    }
    echo '</div>';

    /* -- Giai đoạn 1: Clarity (Module 1-4) -- */
    echo '<h3 class="edt-section-title">Giai đoạn 1 · Clarity (Module 1-4)</h3>';
    edt_text_field('_dv2_stage1_label', 'Nhãn giai đoạn', $f('dv2_stage1_label', 'Giai đoạn 1 · Module 1-4'));
    edt_text_field('_dv2_stage1_title', 'Tiêu đề giai đoạn', $f('dv2_stage1_title', 'Hiểu rõ chính mình · Clarity'));

    $mod_defaults = [
        ['Module 1 · Khởi đầu', 'Làm rõ bạn đang ở đâu, thật sự muốn đi đâu và đặt ngọn hải đăng cho cả hành trình.'],
        ['Module 2 · Yêu thương bản thân & chữa lành nội tâm', 'Làm dịu giọng nói tự dằn vặt bên trong và học cách đối xử với chính mình bằng lòng trắc ẩn.'],
        ['Module 3 · Giá trị cốt lõi & điểm mạnh', 'Tìm lại bạn là ai khi gạt bỏ kỳ vọng của người khác: những giá trị và sức mạnh tự nhiên làm nên con người bạn.'],
        ['Module 4 · Cá tính & bản đồ tính cách', 'Soi chiếu qua Tử Vi, Nhân số học và công cụ Tâm lý học để hiểu cá tính, thế mạnh và điểm yếu.'],
    ];
    for ($i = 1; $i <= 4; $i++) {
        echo '<div class="edt-group"><p class="edt-group-title">📌 Module ' . $i . '</p>';
        edt_text_field("_dv2_mod{$i}_title", "Tiêu đề", $f("dv2_mod{$i}_title", $mod_defaults[$i - 1][0]));
        edt_textarea_field("_dv2_mod{$i}_desc", "Mô tả", $f("dv2_mod{$i}_desc", $mod_defaults[$i - 1][1]));
        echo '</div>';
    }

    /* -- Giai đoạn 2: Confidence (Module 5-7) -- */
    echo '<h3 class="edt-section-title">Giai đoạn 2 · Confidence (Module 5-7)</h3>';
    edt_text_field('_dv2_stage2_label', 'Nhãn giai đoạn', $f('dv2_stage2_label', 'Giai đoạn 2 · Module 5-7'));
    edt_text_field('_dv2_stage2_title', 'Tiêu đề giai đoạn', $f('dv2_stage2_title', 'Tự tin làm chủ · Confidence'));

    $mod_defaults_2 = [
        ['Module 5 · Tư duy làm chủ & khung đạo đức', 'Dựng la bàn nội tâm, chuyển hoá Tham-Sân-Si thành Bi-Trí-Dũng để các quyết định có gốc rễ vững chắc.'],
        ['Module 6 · Nghệ thuật ra quyết định', 'Học cách đi qua những quyết định khó mà không còn dằn vặt, kết hợp trí tuệ phương Đông và công cụ phương Tây.'],
        ['Module 7 · Ý nghĩa cuộc đời', 'Hợp nhất đời sống thực tế và đời sống tinh thần, để Đời và Đạo cân bằng trong một cuộc sống có ý nghĩa.'],
    ];
    for ($i = 5; $i <= 7; $i++) {
        echo '<div class="edt-group"><p class="edt-group-title">📌 Module ' . $i . '</p>';
        edt_text_field("_dv2_mod{$i}_title", "Tiêu đề", $f("dv2_mod{$i}_title", $mod_defaults_2[$i - 5][0]));
        edt_textarea_field("_dv2_mod{$i}_desc", "Mô tả", $f("dv2_mod{$i}_desc", $mod_defaults_2[$i - 5][1]));
        echo '</div>';
    }

    /* -- Giai đoạn 3: Connection (Module 8-10) -- */
    echo '<h3 class="edt-section-title">Giai đoạn 3 · Connection (Module 8-10)</h3>';
    edt_text_field('_dv2_stage3_label', 'Nhãn giai đoạn', $f('dv2_stage3_label', 'Giai đoạn 3 · Module 8-10'));
    edt_text_field('_dv2_stage3_title', 'Tiêu đề giai đoạn', $f('dv2_stage3_title', 'Kết nối lại & phóng tầm nhìn · Connection'));

    $mod_defaults_3 = [
        ['Module 8 · Chữa lành & ranh giới trong quan hệ', 'Hàn gắn tổn thương trong các mối quan hệ thân mật và học cách thiết lập ranh giới lành mạnh.'],
        ['Module 9 · Giao tiếp thật & bày tỏ nhu cầu', 'Tập nói ra điều mình cần một cách rõ ràng, tự tin thông qua những bài thực hành nhập vai sống động.'],
        ['Module 10 · Tầm nhìn 5-10 năm & mục tiêu 90 ngày', 'Nhìn thấy phiên bản tương lai của mình và vạch những bước đầu tiên để biến nó thành hiện thực.'],
    ];
    for ($i = 8; $i <= 10; $i++) {
        echo '<div class="edt-group"><p class="edt-group-title">📌 Module ' . $i . '</p>';
        edt_text_field("_dv2_mod{$i}_title", "Tiêu đề", $f("dv2_mod{$i}_title", $mod_defaults_3[$i - 8][0]));
        edt_textarea_field("_dv2_mod{$i}_desc", "Mô tả", $f("dv2_mod{$i}_desc", $mod_defaults_3[$i - 8][1]));
        echo '</div>';
    }

    /* -- Giai đoạn 4: Integration (Module 11-12) -- */
    echo '<h3 class="edt-section-title">Khép lại · Integration (Module 11-12)</h3>';
    edt_text_field('_dv2_stage4_label', 'Nhãn giai đoạn', $f('dv2_stage4_label', 'Khép lại & neo giữ · Module 11-12'));
    edt_text_field('_dv2_stage4_title', 'Tiêu đề giai đoạn', $f('dv2_stage4_title', 'Integration'));

    $mod_defaults_4 = [
        ['Module 11 · Tổng kết & kế hoạch duy trì', 'Đo lường chặng đường đã đi, neo giữ con người mới và lập kế hoạch để không trượt về lối cũ.'],
        ['Module 12 · Module dự phòng linh hoạt', 'Một module đệm để đào sâu điều bạn cần nhất, hoặc đồng hành cùng những gì mới nảy sinh trên đường.'],
    ];
    for ($i = 11; $i <= 12; $i++) {
        echo '<div class="edt-group"><p class="edt-group-title">📌 Module ' . $i . '</p>';
        edt_text_field("_dv2_mod{$i}_title", "Tiêu đề", $f("dv2_mod{$i}_title", $mod_defaults_4[$i - 11][0]));
        edt_textarea_field("_dv2_mod{$i}_desc", "Mô tả", $f("dv2_mod{$i}_desc", $mod_defaults_4[$i - 11][1]));
        echo '</div>';
    }

    edt_close_tab();


    /* ─── TAB 7: Kết quả ─── */
    edt_open_tab('edt-dv2-outcome');

    edt_text_field('_dv2_outcome_badge', 'Badge', $f('dv2_outcome_badge', 'Sau 90 ngày'));
    edt_text_field('_dv2_outcome_title', 'Tiêu đề section', $f('dv2_outcome_title', 'Bạn mang theo một nền tảng sống mới'));

    $outcome_defaults = [
        ['Bình an không còn dễ vỡ', 'Một sự bình an đến từ bên trong, không còn phải vay mượn từ bên ngoài.'],
        ['Con đường sống rõ ràng', 'Bạn biết mình muốn đi đâu, về đâu, và không còn loay hoay trong cảm giác mơ hồ.'],
        ['Bộ công cụ tự đứng vững', 'Bạn có công cụ để tự ra quyết định, tự làm dịu mình và tự đứng vững khi sóng gió quay lại.'],
    ];
    for ($i = 1; $i <= 3; $i++) {
        echo '<div class="edt-group"><p class="edt-group-title">Kết quả #' . $i . '</p>';
        edt_text_field("_dv2_outcome{$i}_title", "Tiêu đề #{$i}", $f("dv2_outcome{$i}_title", $outcome_defaults[$i - 1][0]));
        edt_textarea_field("_dv2_outcome{$i}_desc", "Mô tả #{$i}", $f("dv2_outcome{$i}_desc", $outcome_defaults[$i - 1][1]));
        echo '</div>';
    }

    echo '<h3 class="edt-section-title">Cam kết & Yêu cầu</h3>';
    edt_text_field('_dv2_guarantee_title', 'Tiêu đề cam kết', $f('dv2_guarantee_title', 'Cam kết của tôi'));
    edt_textarea_field('_dv2_guarantee_desc', 'Mô tả cam kết', $f('dv2_guarantee_desc', 'Tôi tin vào giá trị của hành trình này, nên tôi muốn bạn bắt đầu mà không phải gánh rủi ro một mình.'));
    edt_editor_field('_dv2_guarantee_quote', 'Quote cam kết', $f('dv2_guarantee_quote', 'Trong 30 ngày đầu tiên, nếu bạn thấy hành trình này không phù hợp, tôi sẽ hoàn lại toàn bộ học phí - không cần lý do.'));
    edt_text_field('_dv2_expect_title', 'Tiêu đề yêu cầu', $f('dv2_expect_title', 'Điều tôi cần ở bạn'));
    edt_textarea_field('_dv2_expect_desc', 'Mô tả yêu cầu', $f('dv2_expect_desc', 'Hãy thật sự hiện diện. Hãy có mặt và làm việc với chính mình trong những buổi đồng hành. Phần còn lại, hãy để chúng tôi lo.'));

    edt_close_tab();


    /* ─── TAB 8: Offer ─── */
    edt_open_tab('edt-dv2-offer');

    edt_text_field('_dv2_offer_badge', 'Badge', $f('dv2_offer_badge', 'Bắt đầu như thế nào?'));
    edt_text_field('_dv2_offer_title', 'Tiêu đề section', $f('dv2_offer_title', 'Bạn đã sẵn sàng bắt đầu 90 ngày của mình chưa?'));
    edt_textarea_field('_dv2_offer_desc', 'Mô tả section', $f('dv2_offer_desc', 'Tôi dành riêng hai cách để bạn bước những bước đầu tiên mà chưa cần cam kết toàn bộ ngay.'));

    echo '<div class="edt-group"><p class="edt-group-title">Lựa chọn 1</p>';
    edt_text_field('_dv2_offer1_label', 'Nhãn', $f('dv2_offer1_label', 'Lựa chọn 1 · Miễn phí'));
    edt_text_field('_dv2_offer1_title', 'Tiêu đề', $f('dv2_offer1_title', 'Một phiên trải nghiệm 1:1'));
    edt_textarea_field('_dv2_offer1_desc', 'Mô tả', $f('dv2_offer1_desc', 'Một buổi trò chuyện kết nối cùng tôi, hoàn toàn miễn phí, để bạn cảm nhận hành trình này có thật sự dành cho mình hay không.'));
    echo '</div>';

    echo '<div class="edt-group"><p class="edt-group-title">Lựa chọn 2 (Featured)</p>';
    edt_text_field('_dv2_offer2_label', 'Nhãn', $f('dv2_offer2_label', 'Lựa chọn 2 · Ưu đãi'));
    edt_text_field('_dv2_offer2_title', 'Tiêu đề', $f('dv2_offer2_title', 'Ba phiên khám phá đầu tiên'));
    edt_textarea_field('_dv2_offer2_desc', 'Mô tả', $f('dv2_offer2_desc', 'Ba phiên 1:1 đầu tiên với mức ưu đãi 3.000.000đ. Tặng kèm một e-book trị giá 500.000đ để bạn bắt đầu ngay.'));
    echo '</div>';

    edt_close_tab();


    /* ─── TAB 9: Giảng viên & Nhận xét ─── */
    edt_open_tab('edt-dv2-inst');

    echo '<h3 class="edt-section-title">Giảng viên</h3>';
    edt_image_field('_dv2_inst_image', 'Ảnh giảng viên', $img_val('dv2_inst_image'));
    echo '<p style="color:#646970; font-style: italic; margin-bottom: 15px;">Tên và chức danh Coach được lấy từ <strong>Settings → Cài đặt Website → Coach</strong>.</p>';

    edt_text_field('_dv2_inst_badge', 'Badge', $f('dv2_inst_badge', 'Đôi nét về Edina Trâm'));
    edt_text_field('_dv2_inst_title', 'Tiêu đề section', $f('dv2_inst_title', 'Thanh lịch, trí tuệ và ấm áp'));
    edt_textarea_field('_dv2_inst_bio', 'Giới thiệu ngắn', $f('dv2_inst_bio', 'Điều thú vị ở Trâm không nằm ở một vài tấm bằng, mà ở chỗ rất ít người hội tụ cả bốn thế giới: Tâm lý học, Khai vấn, Tâm linh và Tài chính cùng một lúc.'));

    $cred_defaults = [
        'Thạc sỹ Tâm lý học - Đại học Sư phạm Hà Nội.',
        'Thạc sỹ Tài chính Ngân hàng - University of Southampton, Anh Quốc.',
        'ICF Associate Certified Coach (ACC) - International Coaching Federation.',
        'ACCA - nhiều năm kinh nghiệm tài chính tại các doanh nghiệp.',
        'Hơn 15 năm nghiên cứu và thực hành tâm linh, thiền định, Tử Vi và Nhân số học.',
        'Hơn 20 năm sinh sống và làm việc tại Anh, Singapore, Na Uy và Việt Nam.',
    ];
    for ($i = 1; $i <= 6; $i++) {
        edt_textarea_field("_dv2_inst_cred{$i}", "Thành tích #{$i}", $f("dv2_inst_cred{$i}", $cred_defaults[$i - 1]));
    }

    echo '<h3 class="edt-section-title">Nhận xét</h3>';
    edt_text_field('_dv2_testi_badge', 'Badge', $f('dv2_testi_badge', 'Khách hàng nói gì'));
    edt_text_field('_dv2_testi_title', 'Tiêu đề section', $f('dv2_testi_title', 'Những chia sẻ sau hành trình đồng hành'));
    edt_textarea_field('_dv2_testi_desc', 'Mô tả', $f('dv2_testi_desc', 'Những lời chia sẻ dưới đây được trích từ các video và ghi âm phản hồi của khách hàng sau hành trình đồng hành cùng Trâm.'));
    echo '<div class="edt-group"><p class="edt-group-title">💡 Hướng dẫn</p>';
    echo '<p style="color:#646970;">Nhận xét được quản lý trong mục <strong>Ý kiến Khách hàng</strong> (menu trái). Gán danh mục <code>dich-vu-2</code> cho các nhận xét muốn hiển thị tại trang này.</p>';
    echo '</div>';

    edt_close_tab();


    /* ─── TAB 10: FAQ & CTA ─── */
    edt_open_tab('edt-dv2-faq');

    echo '<h3 class="edt-section-title">FAQ</h3>';
    edt_text_field('_dv2_faq_badge', 'Badge', $f('dv2_faq_badge', 'FAQ'));
    edt_text_field('_dv2_faq_title', 'Tiêu đề section', $f('dv2_faq_title', 'Câu hỏi thường gặp'));
    echo '<div class="edt-group"><p class="edt-group-title">💡 Hướng dẫn</p>';
    echo '<p style="color:#646970;">Câu hỏi FAQ được quản lý trong mục <strong>FAQs</strong> (menu trái). Gán danh mục <code>dich-vu-2</code> cho các câu hỏi muốn hiển thị tại trang này.</p>';
    echo '</div>';

    echo '<h3 class="edt-section-title">🚀 CTA Cuối trang</h3>';
    edt_editor_field('_dv2_cta_title', 'Tiêu đề CTA (HTML)', $f('dv2_cta_title', 'Hãy đặt lịch ngay hôm nay'), 'Cho phép HTML: <br>, <span>');
    edt_textarea_field('_dv2_cta_desc', 'Mô tả', $f('dv2_cta_desc', 'Đừng bỏ lỡ cơ hội thay đổi cuộc đời mình. Một cuộc trò chuyện đủ thành thật có thể là điểm khởi đầu cho một hướng đi hoàn toàn mới.'));
    edt_text_field('_dv2_cta_label', 'Nhãn nút', $f('dv2_cta_label', 'Đặt lịch kết nối với Edina Trâm'));
    edt_url_field('_dv2_cta_url', 'Link nút', $f('dv2_cta_url', ''));
    edt_text_field('_dv2_cta_website', 'Website', $f('dv2_cta_website', wp_parse_url(edt_option('social_website', 'https://edinatram.vn'), PHP_URL_HOST)));
    edt_text_field('_dv2_cta_phone', 'Số điện thoại', $f('dv2_cta_phone', edt_option('contact_phone', '(+84) 88-9590-888')));
    edt_text_field('_dv2_cta_email', 'Email', $f('dv2_cta_email', edt_option('contact_email', 'lequynhtram@gmail.com')));

    edt_close_tab();
}


/* ============================================================
   SAVE META
   ============================================================ */
add_action('save_post_page', function ($post_id) {

    // Nonce check
    if (!isset($_POST['edt_dv2_nonce']) || !wp_verify_nonce($_POST['edt_dv2_nonce'], 'edt_save_dv2')) return;
    // Autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    // Capability
    if (!current_user_can('edit_page', $post_id)) return;
    // Only save for dich-vu-2
    $post = get_post($post_id);
    if (!$post || $post->post_name !== 'dich-vu-2') return;


    /* ── Text fields (sanitize_text_field) ── */
    $text_fields = [
        // Sticky CTA
        'dv2_sticky_title', 'dv2_sticky_meta', 'dv2_sticky_cta_label',
        // Hero
        'dv2_hero_badge', 'dv2_hero_tagline', 'dv2_hero_cta_label',
        // Hero stats (1-3)
        'dv2_hero_stat1_label', 'dv2_hero_stat1_value',
        'dv2_hero_stat2_label', 'dv2_hero_stat2_value',
        'dv2_hero_stat3_label', 'dv2_hero_stat3_value',
        // Letter
        'dv2_letter_badge', 'dv2_letter_title',
        // Why
        'dv2_why_badge', 'dv2_why_title',
        'dv2_why1_title', 'dv2_why2_title', 'dv2_why3_title', 'dv2_why4_title',
        // Crisis
        'dv2_crisis_badge', 'dv2_crisis_title',
        'dv2_crisis_neg_title', 'dv2_crisis_pos_title',
        'dv2_crisis_neg1', 'dv2_crisis_neg2', 'dv2_crisis_neg3',
        'dv2_crisis_pos1', 'dv2_crisis_pos2', 'dv2_crisis_pos3',
        // Signs (1-6)
        'dv2_sign_badge', 'dv2_sign_title',
        'dv2_sign1_title', 'dv2_sign2_title', 'dv2_sign3_title',
        'dv2_sign4_title', 'dv2_sign5_title', 'dv2_sign6_title',
        // Target
        'dv2_target_badge', 'dv2_target_title',
        'dv2_target1_title', 'dv2_target2_title', 'dv2_target3_title',
        // Pillars
        'dv2_pillar_badge', 'dv2_pillar_title',
        'dv2_pillar1_letter', 'dv2_pillar1_title',
        'dv2_pillar2_letter', 'dv2_pillar2_title',
        'dv2_pillar3_letter', 'dv2_pillar3_title',
        // Modules header
        'dv2_mod_badge', 'dv2_mod_title',
        'dv2_mod_focus1', 'dv2_mod_focus2', 'dv2_mod_focus3', 'dv2_mod_focus4',
        // Stage labels/titles
        'dv2_stage1_label', 'dv2_stage1_title',
        'dv2_stage2_label', 'dv2_stage2_title',
        'dv2_stage3_label', 'dv2_stage3_title',
        'dv2_stage4_label', 'dv2_stage4_title',
        // Module titles (1-12)
        'dv2_mod1_title', 'dv2_mod2_title', 'dv2_mod3_title', 'dv2_mod4_title',
        'dv2_mod5_title', 'dv2_mod6_title', 'dv2_mod7_title',
        'dv2_mod8_title', 'dv2_mod9_title', 'dv2_mod10_title',
        'dv2_mod11_title', 'dv2_mod12_title',
        // Outcomes
        'dv2_outcome_badge', 'dv2_outcome_title',
        'dv2_outcome1_title', 'dv2_outcome2_title', 'dv2_outcome3_title',
        'dv2_guarantee_title', 'dv2_expect_title',
        // Offer
        'dv2_offer_badge', 'dv2_offer_title',
        'dv2_offer1_label', 'dv2_offer1_title',
        'dv2_offer2_label', 'dv2_offer2_title',
        // Instructor
        'dv2_inst_badge', 'dv2_inst_title',
        // Testimonials
        'dv2_testi_badge', 'dv2_testi_title',
        // FAQ
        'dv2_faq_badge', 'dv2_faq_title',
        // CTA
        'dv2_cta_label', 'dv2_cta_website', 'dv2_cta_phone', 'dv2_cta_email',
    ];

    foreach ($text_fields as $key) {
        if (isset($_POST['_' . $key])) {
            update_post_meta($post_id, '_' . $key, sanitize_text_field(wp_unslash($_POST['_' . $key])));
        }
    }


    /* ── Textarea fields (sanitize_textarea_field) ── */
    $textarea_fields = [
        // Hero
        'dv2_hero_desc',
        // Why
        'dv2_why_desc',
        'dv2_why1_desc', 'dv2_why2_desc', 'dv2_why3_desc', 'dv2_why4_desc',
        // Crisis
        'dv2_crisis_desc',
        // Signs (1-6)
        'dv2_sign_desc',
        'dv2_sign1_desc', 'dv2_sign2_desc', 'dv2_sign3_desc',
        'dv2_sign4_desc', 'dv2_sign5_desc', 'dv2_sign6_desc',
        // Target
        'dv2_target1_desc', 'dv2_target2_desc', 'dv2_target3_desc',
        // Pillars
        'dv2_pillar_desc',
        'dv2_pillar1_desc', 'dv2_pillar2_desc', 'dv2_pillar3_desc',
        // Modules
        'dv2_mod_desc',
        'dv2_mod1_desc', 'dv2_mod2_desc', 'dv2_mod3_desc', 'dv2_mod4_desc',
        'dv2_mod5_desc', 'dv2_mod6_desc', 'dv2_mod7_desc',
        'dv2_mod8_desc', 'dv2_mod9_desc', 'dv2_mod10_desc',
        'dv2_mod11_desc', 'dv2_mod12_desc',
        // Outcomes
        'dv2_outcome1_desc', 'dv2_outcome2_desc', 'dv2_outcome3_desc',
        'dv2_guarantee_desc', 'dv2_expect_desc',
        // Offer
        'dv2_offer_desc',
        'dv2_offer1_desc', 'dv2_offer2_desc',
        // Instructor
        'dv2_inst_bio',
        'dv2_inst_cred1', 'dv2_inst_cred2', 'dv2_inst_cred3',
        'dv2_inst_cred4', 'dv2_inst_cred5', 'dv2_inst_cred6',
        // Testimonials
        'dv2_testi_desc',
        // CTA
        'dv2_cta_desc',
    ];

    foreach ($textarea_fields as $key) {
        if (isset($_POST['_' . $key])) {
            update_post_meta($post_id, '_' . $key, sanitize_textarea_field(wp_unslash($_POST['_' . $key])));
        }
    }


    /* ── Rich text / HTML fields (wp_kses_post) ── */
    $rich_fields = [
        // Hero
        'dv2_hero_title',
        // Letter
        'dv2_letter_p1', 'dv2_letter_p2', 'dv2_letter_quote',
        'dv2_letter_p3', 'dv2_letter_p4',
        // Why
        'dv2_why_quote',
        // Target
        'dv2_target_quote',
        // Outcomes
        'dv2_guarantee_quote',
        // CTA
        'dv2_cta_title',
    ];

    foreach ($rich_fields as $key) {
        if (isset($_POST['_' . $key])) {
            update_post_meta($post_id, '_' . $key, wp_kses_post(wp_unslash($_POST['_' . $key])));
        }
    }


    /* ── URL fields (esc_url_raw) ── */
    $url_fields = [
        'dv2_sticky_cta_url',
        'dv2_hero_cta_url',
        'dv2_cta_url',
    ];

    foreach ($url_fields as $key) {
        if (isset($_POST['_' . $key])) {
            update_post_meta($post_id, '_' . $key, esc_url_raw(wp_unslash($_POST['_' . $key])));
        }
    }


    /* ── Image fields (absint) ── */
    $image_fields = [
        'dv2_hero_image',
        'dv2_inst_image',
    ];

    foreach ($image_fields as $key) {
        if (isset($_POST['_' . $key])) {
            update_post_meta($post_id, '_' . $key, absint($_POST['_' . $key]));
        }
    }
});
