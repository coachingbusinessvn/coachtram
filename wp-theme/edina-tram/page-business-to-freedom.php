<?php
/**
 * Template Name: Business to Freedom Template
 */

get_header();

// 1. Hero Section Fields
$sticky_title = edt_field('dv2_sticky_title', null, 'Đăng ký BUSINESS TO FREEDOM');
$sticky_meta = edt_field('dv2_sticky_meta', null, 'Khai giảng đợt tới · Chỉ nhận tối đa 6 học viên');
$badge = edt_field('dv2_badge', null, 'Chương trình đào tạo thực chiến 10 tuần');
$title = edt_field('dv2_title', null, 'Business to Freedom');
$tagline = edt_field('dv2_tagline', null, 'Giải phóng lãnh đạo & Tự động hoá vận hành doanh nghiệp');
$description = edt_field('dv2_description', null, 'Dành riêng cho các chủ doanh nghiệp F&B đã có mô hình đang hoạt động nhưng đang bị mắc kẹt vào khâu vận hành hàng ngày, muốn xây dựng hệ thống quy trình chuẩn để giải phóng bản thân và tự do phát triển.');
$schedule = edt_field('dv2_schedule', null, 'Học online Zoom tối thứ 4 & thứ 7 hàng tuần');
$cohort_label = edt_field('dv2_cohort_label', null, 'Khai giảng đợt tiếp theo');
$start_date = edt_field('dv2_start_date', null, '18/03/2026');
$price = edt_field('dv2_price', null, '19.900.000đ');
$slots_note = edt_field('dv2_slots_note', null, 'Chỉ nhận 6 học viên mỗi khoá');
$countdown_target = edt_field('dv2_countdown_target', null, 'March 18, 2026 18:00:00');
$cta_label = edt_field('dv2_cta_label', null, 'Đăng ký phỏng vấn đầu vào');
$hero_image = edt_img_url('dv2_hero_image', null, get_template_directory_uri() . '/assets/dv2/hero-coach-b2f.png');

// 2. Pain Points Fields
$pains = edt_field('edt_dv2_pains', null, []);
if (empty($pains)) {
    $pains = [
        [
            'pain_icon' => '01',
            'pain_title' => 'Làm nô lệ cho quán của mình',
            'pain_description' => 'Bạn không thể vắng mặt dù chỉ một ngày. Điện thoại reo liên tục, nhân viên không tự giải quyết được vấn đề nếu không có chủ.'
        ],
        [
            'pain_icon' => '02',
            'pain_title' => 'Chất lượng dịch vụ trồi sụt',
            'pain_description' => 'Khách hàng chỉ khen khi có mặt bạn ở đó. Khi bạn đi vắng, đồ uống ra chậm, thái độ phục vụ của nhân viên đi xuống.'
        ],
        [
            'pain_icon' => '03',
            'pain_title' => 'Không thể mở rộng quy mô',
            'pain_description' => 'Mở 1 quán đã mệt mỏi, nghĩ đến quán thứ 2, thứ 3 bạn thấy kiệt sức vì không có quy trình chuẩn để chuyển giao và nhân bản.'
        ]
    ];
}

// 3. Target Group Fields
$targets = edt_field('edt_dv2_targets', null, []);
if (empty($targets)) {
    $targets = [
        [
            'target_title' => 'Chủ doanh nghiệp F&B',
            'target_description' => 'Đang vận hành quán cafe, nhà hàng, tiệm bánh... từ 6 tháng trở lên và có mong muốn thoát khỏi sự vụ.'
        ],
        [
            'target_title' => 'Đã có đội ngũ cơ bản',
            'target_description' => 'Quán của bạn đã có từ 5 nhân sự trở lên nhưng vận hành lỏng lẻo, chồng chéo nhiệm vụ và không hiệu quả.'
        ]
    ];
}

// 4. Comparison Table Fields
$compare_rows = edt_field('edt_dv2_compare_rows', null, []);
if (empty($compare_rows)) {
    $compare_rows = [
        [
            'row_label' => 'Mục tiêu chính',
            'row_p2p' => 'Kiểm chứng ý tưởng & Thiết kế mô hình sinh lời',
            'row_b2f' => 'Xây dựng hệ thống quy trình để tự động hoá vận hành'
        ],
        [
            'row_label' => 'Đối tượng học viên',
            'row_p2p' => 'Người chuẩn bị khởi sự hoặc mới bắt đầu',
            'row_b2f' => 'Chủ doanh nghiệp đã có mô hình đang chạy thực tế'
        ],
        [
            'row_label' => 'Hình thức đồng hành',
            'row_p2p' => 'Workshop 2 ngày online đông người',
            'row_b2f' => 'Đào tạo 10 tuần, cố vấn thực chiến nhóm 6 người'
        ]
    ];
}
$compare_quote = edt_field('dv2_compare_quote', null, 'Nếu P2P giúp bạn phác thảo concept thì B2F là lúc bạn xây dựng hệ thống để concept đó tự chạy mà không cần sự hiện diện 24/7 của bạn.');

// 5. Value Section Fields
$benefits = edt_field('edt_dv2_benefits', null, []);
if (empty($benefits)) {
    $benefits = [
        [
            'benefit_letter' => 'M',
            'benefit_title' => 'MONEY – TỐI ƯU CHI PHÍ',
            'benefit_description' => 'Kiểm soát chặt chẽ COGS, nguyên vật liệu và chi phí nhân sự để tối đa hóa dòng tiền lợi nhuận sạch.'
        ],
        [
            'benefit_letter' => 'M',
            'benefit_title' => 'MEANING – TRẢI NGHIỆM KHÁCH HÀNG',
            'benefit_description' => 'Chuẩn hoá bộ quy trình phục vụ SOP để mang lại trải nghiệm đồng nhất cho khách hàng, giữ chân khách trung thành.'
        ],
        [
            'benefit_letter' => 'F',
            'benefit_title' => 'FREEDOM – GIẢI PHÓNG CHỦ QUÁN',
            'benefit_description' => 'Đào tạo và ủy quyền thông minh cho đội ngũ quản lý, giúp bạn tự do tập trung vào chiến lược mở rộng.'
        ]
    ];
}
$diffs = edt_field('edt_dv2_differentiators', null, []);
if (empty($diffs)) {
    $diffs = [
        [
            'diff_title' => 'Lớp học siêu nhỏ',
            'diff_description' => 'Chỉ nhận tối đa 6 người. Điều này đảm bảo Coach Edina Trâm có thể đi sâu sửa lỗi quy trình cho từng quán cụ thể.'
        ],
        [
            'diff_title' => 'Quy trình thực chiến',
            'diff_description' => 'Bạn không chỉ học lý thuyết. Bạn được cung cấp bộ template SOP chuẩn F&B để đem về áp dụng ngay vào quán.'
        ],
        [
            'diff_title' => 'Đồng hành sửa lỗi',
            'diff_description' => 'Mỗi tuần bạn làm bài tập xây dựng quy trình, Coach sẽ nhận xét, chỉnh sửa trực tiếp để hoàn thiện bản chuẩn.'
        ]
    ];
}
$outcomes = edt_field('edt_dv2_outcomes', null, []);
if (empty($outcomes)) {
    $outcomes = [
        [
            'outcome_number' => '01',
            'outcome_title' => 'Bộ SOP vận hành chuẩn',
            'outcome_description' => 'Sở hữu bộ quy trình phục vụ từ chào đón, order, pha chế, dọn dẹp... được ghi chép rõ ràng và dễ chuyển giao.'
        ],
        [
            'outcome_number' => '02',
            'outcome_title' => 'Quy trình tuyển dụng & đào tạo',
            'outcome_description' => 'Không còn sợ nhân viên nghỉ việc đột ngột nhờ hệ thống tuyển dụng bài bản và tài liệu đào tạo nhân viên mới tự động.'
        ],
        [
            'outcome_number' => '03',
            'outcome_title' => 'Hệ thống báo cáo tài chính',
            'outcome_description' => 'Thiết lập dashboard theo dõi doanh thu, chi phí, kiểm kho hàng tuần đơn giản giúp bạn nắm bắt sức khoẻ tài chính lập tức.'
        ]
    ];
}

// 6. Curriculum Fields
$modules = edt_field('edt_dv2_modules', null, []);
if (empty($modules)) {
    $modules = [
        [
            'module_week' => 'Tuần 1-2',
            'module_title' => 'CHUẨN HÓA BỘ KHUNG TỔ CHỨC & BẢN ĐỒ CÔNG VIỆC',
            'module_description' => 'Phân tích thực trạng vận hành hiện tại. Thiết kế sơ đồ tổ chức tối ưu và bảng mô tả công việc (JD) rõ ràng cho từng vị trí quản lý, pha chế, phục vụ.'
        ],
        [
            'module_week' => 'Tuần 3-5',
            'module_title' => 'XÂY DỰNG BỘ SOP PHỤC VỤ & PHA CHẾ CHUẨN',
            'module_description' => 'Thiết lập quy trình pha chế tiêu chuẩn và bộ SOP phục vụ 5 bước. Tối ưu hóa sơ đồ quầy bar và quy trình lưu trữ kho nguyên liệu chống thất thoát.'
        ],
        [
            'module_week' => 'Tuần 6-8',
            'module_title' => 'ỦY QUYỀN THÔNG MINH & ĐÀO TẠO ĐỘI NGŨ',
            'module_description' => 'Quy trình tuyển dụng và đào tạo nhân sự mới trong 3 ngày. Thiết kế hệ thống đánh giá KPI và chính sách thưởng phạt công bằng tạo động lực cho nhân sự.'
        ],
        [
            'module_week' => 'Tuần 9-10',
            'module_title' => 'TÀI CHÍNH & VẬN HÀNH TỰ ĐỘNG',
            'module_description' => 'Xây dựng hệ thống báo cáo doanh thu và chi phí hàng tuần. Thiết lập bộ checklist kiểm tra của quản lý ca. Kiểm thử rút lui: Chủ quán rời quán 7 ngày và nghiệm thu hệ thống.'
        ]
    ];
}

// 7. Instructor & Price Fields
$instructor_image = edt_img_url('dv2_instructor_image', null, get_template_directory_uri() . '/assets/dv2/avatar-edina-b2f.png');
$instructor_points = edt_field('edt_dv2_instructor_points', null, []);
if (empty($instructor_points)) {
    $instructor_points = [
        ['point' => 'Professional Certified Coach (PCC) do ICF chứng nhận quốc tế.'],
        ['point' => '15+ năm kinh nghiệm quản lý, setup quy trình vận hành và khai vấn các chuỗi F&B.'],
        ['point' => 'Đã chuyển giao quy trình tự động hóa thành công cho hơn 50 chủ thương hiệu F&B trong nước và quốc tế.'],
        ['point' => 'Được đào tạo bài bản về tư duy hệ thống và quản trị nhân sự tối tân.']
    ];
}
$dv2_fb = edt_field('dv2_social_facebook');
$dv2_ig = edt_field('dv2_social_instagram');
$dv2_web = edt_field('dv2_social_website');

$price_main = edt_field('dv2_price_main', null, '19.900.000đ');
$price_vip = edt_field('dv2_price_vip', null, '29.900.000đ');
$payment_note = edt_field('dv2_payment_note', null, 'Hỗ trợ chia thành 2 đợt đóng phí');

// 8. Final CTA Fields
$cta_heading = edt_field('dv2_cta_heading', null, 'Bạn đã sẵn sàng sở hữu một doanh nghiệp tự vận hành?');
$cta_subtext = edt_field('dv2_cta_subtext', null, 'Khai giảng ngày 18/03 · Chỉ còn 2 chỗ trống cho khoá học đợt này');
$cta_final_label = edt_field('dv2_cta_final_label', null, 'Đăng ký phỏng vấn ngay hôm nay');
?>

<style>
    /* Inline styles required for Service 2 matching dich-vu-2.html */
    body {
        padding-bottom: 70px; /* space for sticky cta */
    }

    .b2f-section {
        padding-block: var(--space-20);
        background: var(--color-bg, #FBF8F0);
        overflow: hidden;
    }

    .b2f-section.alt {
        background: #EAF2EC; /* Soft Emerald Mist */
    }

    :root {
        --color-primary: #005B45;
        --color-primary-dark: #012E24;
        --color-accent: #C8A244;
        --b2f-border: #DED3B8;
        --b2f-card: #FFFFFF;
    }

    h1, h2, h3 { color: #005B45; }
    p { color: #4A5B54; }

    .site-header {
        background: rgba(251, 248, 240, 0.95);
        border-color: #DED3B8;
    }

    .badge {
        background: rgba(11, 138, 102, 0.1);
        color: #0B8A66;
    }

    /* Sticky CTA */
    .sticky-cta {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 200;
        background: #005B45;
        padding: var(--space-3) var(--space-6);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: var(--space-4);
        box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
    }

    .sticky-cta-info {
        display: flex;
        flex-direction: column;
        text-align: left;
    }

    .sticky-cta-title {
        color: #fff;
        margin: 0;
        font-weight: 700;
        font-size: var(--text-base);
    }

    .sticky-cta-meta {
        color: rgba(255, 255, 255, 0.85);
        font-size: var(--text-sm);
        margin-top: 2px;
    }

    .sticky-cta .btn {
        background: var(--color-accent);
        color: #fff;
        padding: var(--space-2) var(--space-6);
        font-size: var(--text-sm);
        white-space: nowrap;
        flex-shrink: 0;
        border-radius: var(--radius-full);
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .sticky-cta .btn:hover {
        background: #b38e33;
    }

    /* Hero */
    .hero-section-bg {
        background:
            radial-gradient(ellipse at 15% 55%, rgba(11, 138, 102, 0.12) 0%, transparent 55%),
            radial-gradient(ellipse at 85% 20%, rgba(200, 162, 68, 0.08) 0%, transparent 50%),
            #FBF8F0;
        min-height: calc(100vh - 72px);
        display: flex;
        align-items: center;
    }

    .hero-b2f-container {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        align-items: center;
        gap: var(--space-8);
    }

    .hero-b2f-img {
        position: relative;
        text-align: right;
    }

    .hero-b2f-img img {
        max-height: 600px;
        object-fit: contain;
        mask-image: linear-gradient(to bottom, black 85%, transparent 100%);
        -webkit-mask-image: linear-gradient(to bottom, black 85%, transparent 100%);
    }

    .hero-b2f-title {
        font-size: clamp(2rem, 5vw, 3.75rem);
        font-family: var(--font-heading);
        line-height: 1.1;
        color: #071A15;
        margin: 0 0 var(--space-4);
        text-align: left;
    }

    .hero-b2f-title span {
        color: #0B8A66;
    }

    .hero-b2f-tagline {
        font-size: var(--text-xl);
        font-style: italic;
        color: var(--color-accent);
        margin-bottom: var(--space-6);
        text-align: left;
    }

    .meta-row {
        display: flex;
        flex-wrap: wrap;
        gap: var(--space-4);
        margin: var(--space-6) 0;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: var(--space-2);
        font-size: var(--text-lg);
        font-weight: 600;
        color: #071A15;
    }

    .meta-item svg {
        color: var(--color-accent);
        flex-shrink: 0;
    }

    .price-badge {
        display: inline-block;
        background: var(--color-accent);
        color: #fff;
        font-family: var(--font-heading);
        font-size: var(--text-2xl);
        font-weight: 700;
        padding: var(--space-2) var(--space-6);
        border-radius: var(--radius-full);
        margin-bottom: var(--space-4);
    }

    .btn-b2f-cta {
        background: #005B45;
        color: #fff;
        font-size: var(--text-lg);
        padding: var(--space-4) var(--space-10);
        box-shadow: 0 4px 15px rgba(0, 91, 69, 0.2);
        transition: all 0.25s ease;
        border-radius: var(--radius-full);
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
    }

    .btn-b2f-cta:hover {
        background: #012E24;
        transform: translateY(-2px);
    }

    .section-header {
        text-align: center;
        margin-bottom: var(--space-12);
    }

    .section-header h2 {
        font-size: clamp(2rem, 4vw, 2.75rem);
        font-family: var(--font-heading);
        color: #005B45;
        margin-top: 1rem;
        margin-bottom: var(--space-3);
    }

    .section-header p {
        color: #4A5B54;
        font-size: var(--text-lg);
        max-width: 600px;
        margin-inline: auto;
    }

    .b2f-divider {
        width: 60px;
        height: 3px;
        background: var(--color-accent);
        margin-inline: auto;
        margin-block: var(--space-4);
    }

    /* Pain Points */
    .pain-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-6);
    }

    .pain-card {
        background: var(--b2f-card);
        border: 1px solid var(--b2f-border);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        border-top: 4px solid var(--color-primary);
        text-align: left;
    }

    .pain-num {
        font-family: var(--font-heading);
        font-size: 2.5rem;
        color: rgba(0, 91, 69, 0.1);
        margin-bottom: var(--space-4);
        line-height: 1;
    }

    .pain-card h3 {
        font-size: var(--text-lg);
        margin-bottom: var(--space-3);
        color: #005B45;
    }

    .pain-card p {
        font-size: var(--text-sm);
        margin: 0;
        line-height: 1.6;
    }

    /* Targets & Comparison */
    .target-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-6);
        margin-bottom: var(--space-12);
    }

    .target-card {
        background: var(--b2f-card);
        border: 1px solid var(--b2f-border);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        text-align: left;
    }

    .target-card h3 {
        font-size: var(--text-xl);
        color: #005B45;
        margin-bottom: var(--space-3);
    }

    .target-card p {
        font-size: var(--text-sm);
        line-height: 1.6;
    }

    /* Compare Table */
    .compare-table-wrap {
        width: 100%;
        overflow-x: auto;
        border: 1px solid var(--b2f-border);
        border-radius: var(--radius-lg);
        background: var(--b2f-card);
    }

    .compare-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
        font-size: var(--text-sm);
    }

    .compare-table th, .compare-table td {
        padding: var(--space-4) var(--space-6);
        border-bottom: 1px solid var(--b2f-border);
    }

    .compare-table th {
        background: #f6f7f7;
        font-weight: 700;
        color: #005B45;
    }

    .compare-table tr:last-child td {
        border-bottom: none;
    }

    .compare-table .highlight-col {
        background: rgba(0, 91, 69, 0.03);
        font-weight: 500;
    }

    /* Value section (Outcome cards) */
    .value-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-6);
        margin-bottom: var(--space-12);
    }

    .value-card {
        background: var(--b2f-card);
        border: 1px solid var(--b2f-border);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        text-align: left;
        position: relative;
    }

    .value-letter {
        font-family: var(--font-heading);
        font-size: 5rem;
        color: rgba(200, 162, 68, 0.08);
        position: absolute;
        top: 10px;
        right: 20px;
        line-height: 1;
    }

    .value-card h3 {
        font-size: var(--text-md);
        color: var(--color-accent);
        margin-bottom: var(--space-4);
        letter-spacing: 0.05em;
    }

    .value-card p {
        font-size: var(--text-sm);
        margin: 0;
        line-height: 1.6;
    }

    /* Outcome List */
    .outcome-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-6);
    }

    .outcome-card {
        background: var(--b2f-card);
        border: 1px solid var(--b2f-border);
        border-radius: var(--radius-lg);
        padding: var(--space-6);
        border-left: 4px solid var(--color-accent);
        text-align: left;
    }

    .outcome-num {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--color-accent);
        margin-bottom: var(--space-2);
    }

    .outcome-card h3 {
        font-size: var(--text-base);
        color: #005B45;
        margin-bottom: var(--space-2);
    }

    .outcome-card p {
        font-size: var(--text-sm);
        margin: 0;
        line-height: 1.6;
    }

    /* Timeline modules */
    .timeline-list {
        display: flex;
        flex-direction: column;
        gap: var(--space-6);
        max-width: 900px;
        margin-inline: auto;
    }

    .timeline-card {
        display: grid;
        grid-template-columns: 150px 1fr;
        gap: var(--space-6);
        background: var(--b2f-card);
        border: 1px solid var(--b2f-border);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        align-items: start;
        text-align: left;
    }

    .timeline-week {
        background: #005B45;
        color: #fff;
        font-family: var(--font-heading);
        font-size: var(--text-sm);
        font-weight: 700;
        padding: var(--space-2) var(--space-4);
        border-radius: var(--radius-md);
        text-align: center;
        letter-spacing: 0.05em;
    }

    .timeline-card h3 {
        font-size: var(--text-lg);
        color: #005B45;
        margin-bottom: var(--space-3);
    }

    .timeline-card p {
        font-size: var(--text-sm);
        margin: 0;
        line-height: 1.6;
    }

    /* Testimonials */
    .testi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-6);
    }

    .testi-card {
        background: var(--b2f-card);
        border: 1px solid var(--b2f-border);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        text-align: left;
    }

    .testi-card p {
        font-style: italic;
        color: #071A15;
        margin-bottom: var(--space-6);
        line-height: 1.6;
    }

    .testi-author {
        display: flex;
        align-items: center;
        gap: var(--space-4);
        border-top: 1px solid var(--b2f-border);
        padding-top: var(--space-4);
    }

    .testi-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        object-fit: cover;
    }

    .testi-author h4 {
        font-size: var(--text-base);
        margin: 0;
        color: var(--color-accent);
    }

    .testi-author span {
        font-size: var(--text-sm);
        color: #4A5B54;
    }

    /* Pricing card */
    .pricing-grid {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: var(--space-8);
        align-items: start;
        margin-top: var(--space-12);
    }

    .pricing-card {
        background: #fff;
        border: 2px solid var(--color-accent);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        color: #071A15;
        text-align: left;
    }

    .pricing-header {
        border-bottom: 1px solid var(--b2f-border);
        padding-bottom: var(--space-4);
        margin-bottom: var(--space-6);
    }

    .pricing-value {
        font-size: clamp(2rem, 5vw, 3rem);
        color: #005B45;
        font-weight: 700;
        margin-block: var(--space-2);
        font-family: var(--font-heading);
    }

    .pricing-features {
        list-style: none;
        padding: 0;
        margin: 0 0 var(--space-6) 0;
        display: flex;
        flex-direction: column;
        gap: var(--space-3);
    }

    .pricing-features li {
        display: flex;
        align-items: center;
        gap: var(--space-3);
        font-size: var(--text-sm);
    }

    .pricing-features li svg {
        color: var(--color-accent);
        flex-shrink: 0;
    }

    /* FAQ */
    .faq-list {
        display: flex;
        flex-direction: column;
        gap: var(--space-3);
        max-width: 800px;
        margin-inline: auto;
    }

    .faq-item {
        background: var(--b2f-card);
        border: 1px solid var(--b2f-border);
        border-radius: var(--radius-md);
        text-align: left;
    }

    .faq-q {
        padding: var(--space-4) var(--space-6);
        font-weight: 600;
        font-size: var(--text-lg);
        color: #005B45;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .faq-q::after {
        content: '+';
        font-family: monospace;
        font-size: 1.2rem;
        transition: transform 0.2s;
    }

    .faq-item.active .faq-q::after {
        content: '-';
    }

    .faq-a {
        padding: 0 var(--space-6);
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out, padding 0.3s ease-out;
        color: #4A5B54;
        font-size: var(--text-sm);
        line-height: 1.6;
    }

    .faq-item.active .faq-a {
        max-height: 500px;
        padding-bottom: var(--space-4);
    }

    @media (max-width: 992px) {
        .hero-b2f-container, .pricing-grid {
            grid-template-columns: 1fr;
            text-align: center;
        }
        .hero-b2f-img {
            text-align: center;
        }
        .hero-b2f-img img {
            max-height: 400px;
        }
        .pain-grid, .target-grid, .value-grid, .outcome-grid, .testi-grid {
            grid-template-columns: 1fr;
        }
        .timeline-card {
            grid-template-columns: 1fr;
        }
        .timeline-week {
            width: fit-content;
        }
    }
</style>

<!-- Sticky CTA Bar -->
<div class="sticky-cta">
    <div class="sticky-cta-info">
        <h4 class="sticky-cta-title"><?php echo esc_html($sticky_title); ?></h4>
        <span class="sticky-cta-meta"><?php echo esc_html($sticky_meta); ?></span>
    </div>
    <a href="#register" class="btn"><?php echo esc_html($cta_label); ?></a>
</div>

<!-- SECTION 1: HERO -->
<section class="b2f-section hero-section-bg" style="padding-top:0;">
    <div class="container hero-b2f-container">
        <div data-reveal style="text-align: left;">
            <span class="badge"><?php echo esc_html($badge); ?></span>
            <h1 class="hero-b2f-title"><?php echo esc_html($title); ?></h1>
            <p class="hero-b2f-tagline"><?php echo esc_html($tagline); ?></p>
            <p style="color:#4A5B54; margin-bottom:var(--space-6); line-height:1.6; text-align: left;"><?php echo wp_kses_post($description); ?></p>
            
            <div class="meta-row">
                <div class="meta-item">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span><?php echo esc_html($schedule); ?></span>
                </div>
            </div>

            <div>
                <span style="font-size: var(--text-sm); color: #4A5B54; display:block; margin-bottom: 4px;"><?php echo esc_html($cohort_label); ?></span>
                <span class="price-badge"><?php echo esc_html($start_date); ?></span>
                <span style="font-size:var(--text-sm); color:#4A5B54; margin-left:var(--space-2);">*<?php echo esc_html($slots_note); ?></span>
            </div>

            <!-- Countdown Timer -->
            <div class="countdown-wrap" style="margin-block: var(--space-6); text-align: left;">
                <span style="font-size:var(--text-xs); color:#4A5B54; text-transform:uppercase; letter-spacing:0.1em; display:block; margin-bottom:var(--space-2);">HẠN CHÓT ĐĂNG KÝ PHỎNG VẤN CÒN:</span>
                <div class="countdown-timer" data-target="<?php echo esc_attr($countdown_target); ?>" style="display:flex; gap:12px;">
                    <div style="background:#fff; border:1px solid var(--b2f-border); padding:8px 12px; border-radius:4px; text-align:center; min-width:50px;">
                        <span class="days" style="font-size:var(--text-xl); font-weight:700; color:#005B45; display:block;">00</span>
                        <span style="font-size:0.65rem; color:#4A5B54; text-transform:uppercase;">Ngày</span>
                    </div>
                    <div style="background:#fff; border:1px solid var(--b2f-border); padding:8px 12px; border-radius:4px; text-align:center; min-width:50px;">
                        <span class="hours" style="font-size:var(--text-xl); font-weight:700; color:#005B45; display:block;">00</span>
                        <span style="font-size:0.65rem; color:#4A5B54; text-transform:uppercase;">Giờ</span>
                    </div>
                    <div style="background:#fff; border:1px solid var(--b2f-border); padding:8px 12px; border-radius:4px; text-align:center; min-width:50px;">
                        <span class="minutes" style="font-size:var(--text-xl); font-weight:700; color:#005B45; display:block;">00</span>
                        <span style="font-size:0.65rem; color:#4A5B54; text-transform:uppercase;">Phút</span>
                    </div>
                    <div style="background:#fff; border:1px solid var(--b2f-border); padding:8px 12px; border-radius:4px; text-align:center; min-width:50px;">
                        <span class="seconds" style="font-size:var(--text-xl); font-weight:700; color:#005B45; display:block;">00</span>
                        <span style="font-size:0.65rem; color:#4A5B54; text-transform:uppercase;">Giây</span>
                    </div>
                </div>
            </div>

            <div style="margin-top:var(--space-6);">
                <a href="#register" class="btn-b2f-cta"><?php echo esc_html($cta_label); ?></a>
            </div>
        </div>
        <div class="hero-b2f-img" data-reveal>
            <?php if ($hero_image) : ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="<?php bloginfo('name'); ?>" loading="lazy" />
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- SECTION 2: PAIN POINTS -->
<section class="b2f-section alt">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Vấn đề của bạn</span>
            <h2>Bạn có đang gặp phải tình trạng này?</h2>
            <div class="b2f-divider"></div>
        </div>
        
        <div class="pain-grid">
            <?php foreach ($pains as $pain) : 
                $p_icon = isset($pain['pain_icon']) ? $pain['pain_icon'] : '01';
                $p_title = isset($pain['pain_title']) ? $pain['pain_title'] : '';
                $p_desc = isset($pain['pain_description']) ? $pain['pain_description'] : '';
                ?>
                <div class="pain-card" data-reveal>
                    <div class="pain-num"><?php echo esc_html($p_icon); ?></div>
                    <h3><?php echo esc_html($p_title); ?></h3>
                    <p><?php echo esc_html($p_desc); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 3: TARGET AUDIENCE & COMPARISON -->
<section class="b2f-section">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Đối tượng phù hợp</span>
            <h2>Chương trình này dành cho ai?</h2>
            <div class="b2f-divider"></div>
        </div>
        
        <div class="target-grid">
            <?php foreach ($targets as $target) : 
                $t_title = isset($target['target_title']) ? $target['target_title'] : '';
                $t_desc = isset($target['target_description']) ? $target['target_description'] : '';
                ?>
                <div class="target-card" data-reveal>
                    <h3><?php echo esc_html($t_title); ?></h3>
                    <p><?php echo wp_kses_post($t_desc); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="section-header" style="margin-top: var(--space-12);">
            <span class="badge">Phân biệt lộ trình</span>
            <h2>So sánh Passion to Profit &amp; Business to Freedom</h2>
            <div class="b2f-divider"></div>
        </div>

        <div class="compare-table-wrap" data-reveal>
            <table class="compare-table">
                <thead>
                    <tr>
                        <th>Tiêu chí</th>
                        <th>Passion to Profit</th>
                        <th class="highlight-col">Business to Freedom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compare_rows as $row) : 
                        $lbl = isset($row['row_label']) ? $row['row_label'] : '';
                        $p2p = isset($row['row_p2p']) ? $row['row_p2p'] : '';
                        $b2f = isset($row['row_b2f']) ? $row['row_b2f'] : '';
                        ?>
                        <tr>
                            <td><strong><?php echo esc_html($lbl); ?></strong></td>
                            <td><?php echo esc_html($p2p); ?></td>
                            <td class="highlight-col"><?php echo esc_html($b2f); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <p style="font-style: italic; color: #4A5B54; margin-top: var(--space-6); max-width: 700px; margin-inline: auto;">
            <?php echo wp_kses_post($compare_quote); ?>
        </p>
    </div>
</section>

<!-- SECTION 4: OUTCOMES & VALUE -->
<section class="b2f-section alt">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Giá trị của hệ thống</span>
            <h2>3 chữ M cốt lõi trong hệ thống vận hành</h2>
            <div class="b2f-divider"></div>
        </div>
        
        <div class="value-grid">
            <?php foreach ($benefits as $benefit) : 
                $b_let = isset($benefit['benefit_letter']) ? $benefit['benefit_letter'] : 'M';
                $b_title = isset($benefit['benefit_title']) ? $benefit['benefit_title'] : '';
                $b_desc = isset($benefit['benefit_description']) ? $benefit['benefit_description'] : '';
                ?>
                <div class="value-card" data-reveal>
                    <div class="value-letter"><?php echo esc_html($b_let); ?></div>
                    <h3><?php echo esc_html($b_title); ?></h3>
                    <p><?php echo esc_html($b_desc); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="section-header" style="margin-top: var(--space-12);">
            <span class="badge">Điểm khác biệt</span>
            <h2>Điểm khác biệt của chương trình B2F</h2>
            <div class="b2f-divider"></div>
        </div>

        <div class="pain-grid" style="margin-bottom: var(--space-12);">
            <?php foreach ($diffs as $diff) : 
                $d_title = isset($diff['diff_title']) ? $diff['diff_title'] : '';
                $d_desc = isset($diff['diff_description']) ? $diff['diff_description'] : '';
                ?>
                <div class="pain-card" style="border-top-color: var(--color-accent);" data-reveal>
                    <h3 style="color: var(--color-accent); font-weight:700;"><?php echo esc_html($d_title); ?></h3>
                    <p><?php echo esc_html($d_desc); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="section-header" style="margin-top: var(--space-12);">
            <span class="badge">Kết quả đạt được</span>
            <h2>Kết quả bạn sở hữu sau 10 tuần</h2>
            <div class="b2f-divider"></div>
        </div>

        <div class="outcome-grid" data-reveal>
            <?php foreach ($outcomes as $outcome) : 
                $o_num = isset($outcome['outcome_number']) ? $outcome['outcome_number'] : '01';
                $o_title = isset($outcome['outcome_title']) ? $outcome['outcome_title'] : '';
                $o_desc = isset($outcome['outcome_description']) ? $outcome['outcome_description'] : '';
                ?>
                <div class="outcome-card">
                    <div class="outcome-num"><?php echo esc_html($o_num); ?></div>
                    <h3><?php echo esc_html($o_title); ?></h3>
                    <p><?php echo esc_html($o_desc); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 5: TIMELINE / CURRICULUM -->
<section class="b2f-section">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Lộ trình 10 tuần</span>
            <h2>Nội dung đào tạo chi tiết</h2>
            <div class="b2f-divider"></div>
        </div>
        
        <div class="timeline-list">
            <?php foreach ($modules as $module) : 
                $m_week = isset($module['module_week']) ? $module['module_week'] : 'Tuần';
                $m_title = isset($module['module_title']) ? $module['module_title'] : '';
                $m_desc = isset($module['module_description']) ? $module['module_description'] : '';
                ?>
                <div class="timeline-card" data-reveal>
                    <div class="timeline-week"><?php echo esc_html($m_week); ?></div>
                    <div>
                        <h3><?php echo esc_html($m_title); ?></h3>
                        <p><?php echo wp_kses_post($m_desc); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 6: TESTIMONIALS -->
<section class="b2f-section alt">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Câu chuyện thành công</span>
            <h2>Cảm nhận từ những chủ quán đã chuyển hoá thành công</h2>
            <div class="b2f-divider"></div>
        </div>
        
        <div class="testi-grid">
            <?php
            // Query Testimonials for Business to Freedom
            $args = [
                'post_type'      => 'edina_testimonial',
                'posts_per_page' => 3,
            ];
            if (term_exists('business-to-freedom', 'program_cat')) {
                $args['tax_query'] = [
                    [
                        'taxonomy' => 'program_cat',
                        'field'    => 'slug',
                        'terms'    => 'business-to-freedom',
                    ]
                ];
            }
            $testi_query = new WP_Query($args);
            
            if ($testi_query->have_posts()) :
                while ($testi_query->have_posts()) : $testi_query->the_post();
                    $t_role = get_post_meta(get_the_ID(), '_testimonial_role', true);
                    $t_avatar = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                    if (empty($t_avatar)) {
                        $t_avatar = get_template_directory_uri() . '/assets/dv2/t1-caolan.png';
                    }
                    ?>
                    <div class="testi-card" data-reveal>
                        <p>"<?php echo wp_strip_all_tags(get_the_content()); ?>"</p>
                        <div class="testi-author">
                            <img src="<?php echo esc_url($t_avatar); ?>" alt="<?php the_title_attribute(); ?>" class="testi-avatar" loading="lazy">
                            <div>
                                <h4><?php the_title(); ?></h4>
                                <span><?php echo esc_html($t_role); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Hardcoded fallback matching static HTML
                ?>
                <div class="testi-card" data-reveal>
                    <p>"Mọi thứ không còn mơ hồ. Mình biết cái gì đang thiếu và cần thay đổi. Thay đổi đầu tiên là áp dụng các quy trình chuẩn cho doanh nghiệp."</p>
                    <div class="testi-author">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/dv2/t1-caolan.png" alt="Cao Lan" class="testi-avatar" loading="lazy">
                        <div>
                            <h4>Cao Lan</h4>
                            <span>Chủ doanh nghiệp tại Paris</span>
                        </div>
                    </div>
                </div>
                <div class="testi-card" data-reveal>
                    <p>"Bước tiến của em là vận hành được quán và để dành được lợi nhuận. Mọi thứ đang vận hành đúng như mong muốn và em rất tự hào."</p>
                    <div class="testi-author">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/dv2/t1-thanhnga.png" alt="Thanh Nga" class="testi-avatar" loading="lazy">
                        <div>
                            <h4>Thanh Nga</h4>
                            <span>Chủ thương hiệu trà tại Bảo Lộc</span>
                        </div>
                    </div>
                </div>
                <div class="testi-card" data-reveal>
                    <p>"Khoá học là bản đồ để dù mình đang làm gì thì cũng có thể đối chiếu. Dù kinh doanh bao lâu, mình vẫn cần soi lại để tìm hướng đi đúng."</p>
                    <div class="testi-author">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/dv2/t1-phamhieu.png" alt="Phạm Hiếu" class="testi-avatar" loading="lazy">
                        <div>
                            <h4>Phạm Hiếu</h4>
                            <span>Chủ doanh nghiệp ở Virginia, Mỹ</span>
                        </div>
                    </div>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<!-- SECTION 7: INSTRUCTOR & PRICING -->
<section class="b2f-section" style="background: var(--color-primary-dark, #012E24); color: #fff;">
    <div class="container">
        <div class="section-header" style="text-align: left; margin-bottom: var(--space-6);">
            <span class="badge" style="background:rgba(200, 162, 68, 0.15); color:var(--color-accent);">Người dẫn đường</span>
            <h2 style="color:#fff; margin-top:1rem;">Coach Edina Trâm</h2>
            <div class="b2f-divider" style="margin-inline:0;"></div>
        </div>

        <div class="pricing-grid">
            <div data-reveal style="text-align: left;">
                <div style="display:flex; gap: 20px; align-items:center; margin-bottom: var(--space-6);">
                    <?php if ($instructor_image) : ?>
                        <img src="<?php echo esc_url($instructor_image); ?>" alt="<?php bloginfo('name'); ?>" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 2px solid var(--color-accent);" />
                    <?php endif; ?>
                    <div>
                        <h4 style="color:#fff; font-size:1.25rem; margin:0;">Chuyên gia Khai vấn Hệ thống</h4>
                        <span style="color:var(--color-accent); font-size:var(--text-sm);">ICF PCC Coach</span>
                    </div>
                </div>
                
                <ul class="pricing-features">
                    <?php foreach ($instructor_points as $point) : 
                        $p_text = isset($point['point']) ? $point['point'] : '';
                        ?>
                        <li>
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            <p style="color:#E2E8F0; margin:0;"><?php echo wp_kses_post($p_text); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div style="display:flex; gap: 16px; margin-top: var(--space-6);">
                    <?php if ($dv2_fb): ?>
                        <a href="<?php echo esc_url($dv2_fb); ?>" target="_blank" rel="noopener" style="color:var(--color-accent); font-size:var(--text-sm); text-decoration:none;">Facebook →</a>
                    <?php endif; ?>
                    <?php if ($dv2_ig): ?>
                        <a href="<?php echo esc_url($dv2_ig); ?>" target="_blank" rel="noopener" style="color:var(--color-accent); font-size:var(--text-sm); text-decoration:none;">Instagram →</a>
                    <?php endif; ?>
                    <?php if ($dv2_web): ?>
                        <a href="<?php echo esc_url($dv2_web); ?>" target="_blank" rel="noopener" style="color:var(--color-accent); font-size:var(--text-sm); text-decoration:none;">Website →</a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Price Card -->
            <div class="pricing-card" data-reveal>
                <div class="pricing-header">
                    <span style="font-size: var(--text-xs); color: var(--color-accent); font-weight:700; text-transform:uppercase; letter-spacing:0.1em;">HỌC PHÍ KHÓA HỌC</span>
                    <div class="pricing-value"><?php echo esc_html($price_main); ?></div>
                    <span style="font-size: var(--text-xs); color:#64748b;">*Đã bao gồm toàn bộ tài liệu quy trình SOP mẫu</span>
                </div>
                
                <ul class="pricing-features" style="margin-bottom: var(--space-6);">
                    <li>
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Học qua Zoom + Bài tập sửa bài hàng tuần</span>
                    </li>
                    <li>
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>1 buổi 1:1 trực tiếp cùng Coach chỉnh sửa SOP</span>
                    </li>
                </ul>

                <a href="#register" class="btn-p2p-cta" style="background:#005B45; color:#fff; width:100%; text-align:center; box-sizing:border-box;">Đăng ký Phỏng vấn giữ chỗ</a>
                <p style="font-size:0.75rem; color:#64748b; margin-top:var(--space-3); text-align:center;">
                    <?php echo wp_kses_post($payment_note); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 8: FAQ -->
<section class="b2f-section alt">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Giải đáp thắc mắc</span>
            <h2>Câu hỏi thường gặp</h2>
            <div class="b2f-divider"></div>
        </div>
        
        <div class="faq-list">
            <?php
            // Query FAQ for B2F
            $faq_args = [
                'post_type'      => 'edina_faq',
                'posts_per_page' => 10,
            ];
            if (term_exists('business-to-freedom', 'program_cat')) {
                $faq_args['tax_query'] = [
                    [
                        'taxonomy' => 'program_cat',
                        'field'    => 'slug',
                        'terms'    => 'business-to-freedom',
                    ]
                ];
            }
            $faq_query = new WP_Query($faq_args);
            
            if ($faq_query->have_posts()) :
                while ($faq_query->have_posts()) : $faq_query->the_post();
                    ?>
                    <div class="faq-item" data-reveal>
                        <div class="faq-q"><?php the_title(); ?></div>
                        <div class="faq-a">
                            <div style="padding-top: var(--space-2);"><?php the_content(); ?></div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Hardcoded fallback matching static HTML
                ?>
                <div class="faq-item active" data-reveal>
                    <div class="faq-q">Tại sao khóa học lại giới hạn ở 6 học viên?</div>
                    <div class="faq-a" style="max-height: 500px; padding-bottom: var(--space-4);">
                        <p>Để đảm bảo hiệu quả tuyệt đối. B2F không phải là khóa học lý thuyết truyền thống. Đây là chương trình cố vấn thực hành. Mỗi tuần học viên phải nộp bộ quy trình SOP viết riêng cho quán của mình, và Coach Edina Trâm sẽ trực tiếp chỉnh sửa từng dòng chi tiết của quy trình đó. Lớp học đông hơn sẽ không đảm bảo được chất lượng chữa bài này.</p>
                    </div>
                </div>
                <div class="faq-item" data-reveal>
                    <div class="faq-q">Quán F&B của tôi mới mở được 3 tháng có học được không?</div>
                    <div class="faq-a">
                        <p>Nếu quán của bạn đã có lượng khách ổn định và bắt đầu bộc lộ các vấn đề về quá tải vận hành, chất lượng dịch vụ không đều, bạn hoàn toàn nên học sớm. Điều này giúp bạn xây dựng bộ khung quy trình chuẩn ngay từ đầu thay vì phải sửa sai sau này.</p>
                    </div>
                </div>
                <div class="faq-item" data-reveal>
                    <div class="faq-q">Chương trình có cam kết kết quả đầu ra không?</div>
                    <div class="faq-a">
                        <p>Chúng tôi cam kết cung cấp toàn bộ công cụ, biểu mẫu chuẩn chỉnh và đồng hành sửa lỗi quy trình cho bạn. Tuy nhiên kết quả giải phóng lãnh đạo phụ thuộc lớn vào mức độ cam kết hoàn thành bài tập viết SOP và mức độ thực thi kỷ luật của bạn đối với nhân viên tại quán.</p>
                    </div>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<!-- SECTION 9: FINAL CTA -->
<section id="register" class="b2f-section" style="text-align: center; background: var(--color-primary-dark, #012E24); color: #fff; padding-block: var(--space-24);">
    <div class="container" style="max-width: 800px;">
        <div data-reveal>
            <span class="badge" style="background:rgba(200, 162, 68, 0.15); color:var(--color-accent); margin-bottom: var(--space-4);"><?php esc_html_e('Đăng ký phỏng vấn đầu vào', 'edina-tram'); ?></span>
            <h2 style="font-size: clamp(2rem, 4vw, 3rem); font-family: var(--font-heading); color: #fff; margin-top:1rem; margin-bottom: var(--space-4);">
                <?php echo esc_html($cta_heading); ?>
            </h2>
            <p style="color: #E2E8F0; font-size: var(--text-lg); margin-bottom: var(--space-8);">
                <?php echo esc_html($cta_subtext); ?>
            </p>
            
            <a href="https://zalo.me/0909000000" target="_blank" rel="noopener" class="btn-b2f-cta" style="background:var(--color-accent); color:#fff; border-radius: var(--radius-full);">
                <?php echo esc_html($cta_final_label); ?>
            </a>
            
            <p style="font-size: 0.85rem; color:#94a3b8; margin-top:var(--space-4);">
                *Lưu ý: Bạn cần trải qua cuộc phỏng vấn 15 phút cùng Coach Edina Trâm để đảm bảo quán của bạn thực sự phù hợp với chương trình trước khi đóng học phí.
            </p>
        </div>
    </div>
</section>

<script>
    // FAQ Accordion Logic for Service 2
    document.addEventListener('DOMContentLoaded', function() {
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            const q = item.querySelector('.faq-q');
            q.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                faqItems.forEach(i => {
                    i.classList.remove('active');
                    const a = i.querySelector('.faq-a');
                    if (a) {
                        a.style.maxHeight = '0';
                        a.style.paddingBottom = '0';
                    }
                });
                if (!isActive) {
                    item.classList.add('active');
                    const a = item.querySelector('.faq-a');
                    if (a) {
                        a.style.maxHeight = '500px';
                        a.style.paddingBottom = 'var(--space-4)';
                    }
                }
            });
        });
    });
</script>

<?php
get_footer();
