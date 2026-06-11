<?php
/**
 * Template Name: Business Mastery Template
 */

get_header();

// 1. Hero Section Fields
$sticky_title = edt_field('dv3_sticky_title', null, 'Đăng ký BUSINESS MASTERY');
$sticky_meta = edt_field('dv3_sticky_meta', null, 'Đồng hành 1:1 chuyên sâu thiết kế riêng');
$badge = edt_field('dv3_badge', null, 'COACHING 1:1 CHIẾN LƯỢC DÀI HẠN');
$title = edt_field('dv3_title', null, 'Business Mastery');
$tagline = edt_field('dv3_tagline', null, 'Định hình tương lai doanh nghiệp F&B của bạn');
$description = edt_field('dv3_description', null, 'Chương trình khai vấn cao cấp 1:1 trực tiếp cùng Coach Edina Trâm, thiết kế riêng cho các sáng lập viên và nhà điều hành F&B muốn giải quyết bài toán phát triển chiến lược, tái cấu trúc hoặc mở rộng chuỗi quy mô lớn.');
$gift_text = edt_field('dv3_gift_text', null, '🎁 Đặc quyền: Nhận bộ công cụ quản trị F&B trị giá 5.000.000đ');
$cta_label = edt_field('dv3_cta_label', null, 'Đăng ký tư vấn 1:1 miễn phí');
$hero_image = edt_img_url('dv3_hero_image', null, get_template_directory_uri() . '/assets/dv3/hero-coach.png');

// 2. Pain Points Fields
$pains = edt_field('edt_dv3_pains', null, []);
if (empty($pains)) {
    $pains = [
        [
            'pain_number' => '1',
            'pain_title' => 'Mất phương hướng ở quy mô lớn',
            'pain_description' => 'Quán hoạt động tốt nhưng khi phát triển lên chuỗi 3 - 5 quán, bạn mất kiểm soát về chất lượng, chi phí và sự gắn kết của đội ngũ.',
            'pain_full_width' => 0
        ],
        [
            'pain_number' => '2',
            'pain_title' => 'Cô đơn ở vị trí điều hành',
            'pain_description' => 'Bạn không thể chia sẻ những áp lực chiến lược, bài toán nhân sự cấp cao hay nỗi sợ hãi tài chính cùng nhân viên hay gia đình.',
            'pain_full_width' => 0
        ],
        [
            'pain_number' => '3',
            'pain_title' => 'Bế tắc trong việc tối ưu biên lợi nhuận',
            'pain_description' => 'Doanh thu tăng nhưng lợi nhuận thực tế giảm do rò rỉ vận hành, chi phí ẩn lớn và thiếu hệ thống dự báo tài chính nhạy bén.',
            'pain_full_width' => 1
        ]
    ];
}

// 3. Targets Fields
$targets = edt_field('edt_dv3_targets', null, []);
if (empty($targets)) {
    $targets = [
        [
            'target_icon' => '🏢',
            'target_title' => 'F&B Founder & CEO',
            'target_description' => 'Người sáng lập và giám đốc điều hành chuỗi nhà hàng, quán cafe đang trong giai đoạn chuyển mình phát triển quy mô.'
        ],
        [
            'target_icon' => '🤝',
            'target_title' => 'Các nhà quản trị cấp cao',
            'target_description' => 'Giám đốc vận hành (COO), Giám đốc Marketing chuỗi F&B muốn tối ưu năng lực quản lý hệ thống.'
        ]
    ];
}

// 4. Methods Fields
$not_like = edt_field('edt_dv3_not_like', null, []);
if (empty($not_like)) {
    $not_like = [
        ['not_text' => 'Không học chung theo lớp lý thuyết đại trà'],
        ['not_text' => 'Không sử dụng các bộ giáo trình rập khuôn'],
        ['not_text' => 'Không chỉ dừng lại ở lời khuyên chung chung']
    ];
}
$you_get = edt_field('edt_dv3_you_get', null, []);
if (empty($you_get)) {
    $you_get = [
        ['get_text' => 'Khai vấn (Coaching) 1:1 cá nhân hóa 100% cho quán bạn'],
        ['get_text' => 'Đồng hành xây dựng hệ thống quy trình chuẩn F&B thực tế'],
        ['get_text' => 'Hỗ trợ giải quyết bài toán nóng ngay trong tuần làm việc']
    ];
}
$focus_badges = edt_field('edt_dv3_focus_badges', null, []);
if (empty($focus_badges)) {
    $focus_badges = [
        ['badge_label' => 'Menu thật'],
        ['badge_label' => 'Nhân viên thật'],
        ['badge_label' => 'Dòng tiền thật'],
        ['badge_label' => 'Mô hình thật']
    ];
}
$focus_note = edt_field('dv3_focus_note', null, 'Chúng ta không học lại những gì sách vở đã viết. Chúng ta giải quyết bài toán thực tế của chính quán bạn.');

// 5. Value Section Fields
$values = edt_field('edt_dv3_values', null, []);
if (empty($values)) {
    $values = [
        [
            'value_number' => '1',
            'value_title' => 'CHIẾN LƯỢC PHÁT TRIỂN RÕ RÀNG',
            'value_description' => 'Thiết lập mục tiêu 3 năm và kế hoạch hành động cụ thể từng quý, giúp doanh nghiệp phát triển có định hướng.'
        ],
        [
            'value_number' => '2',
            'value_title' => 'TỐI ƯU HÓA HỆ THỐNG VẬN HÀNH CHUỖI',
            'value_description' => 'Xây dựng bộ quy chuẩn kiểm soát chất lượng đồng nhất giữa các chi nhánh, giảm thiểu tối đa sự phụ thuộc vào chủ.'
        ],
        [
            'value_number' => '3',
            'value_title' => 'NÂNG CAO TƯ DUY TÀI CHÍNH QUẢN TRỊ',
            'value_description' => 'Làm chủ các báo cáo P&L, dòng tiền và dự báo tài chính nhạy bén để đưa ra quyết định kinh doanh chính xác.'
        ]
    ];
}
$deliverables = edt_field('edt_dv3_deliverables', null, []);
if (empty($deliverables)) {
    $deliverables = [
        [
            'deliverable_title' => 'Tối ưu Menu & Định giá',
            'deliverable_description' => 'Phân tích ma trận Menu (Menu Engineering) để loại bỏ món không hiệu quả và tăng biên lợi nhuận.'
        ],
        [
            'deliverable_title' => 'Hệ thống Quản trị Tài chính',
            'deliverable_description' => 'Xây dựng bảng dòng tiền dự báo và dashboard theo dõi sức khoẻ tài chính tự động.'
        ],
        [
            'deliverable_title' => 'Bộ SOP chuyển giao chuỗi',
            'deliverable_description' => 'Cùng viết và hoàn thiện bộ quy trình SOP vận hành và đào tạo phục vụ phục vụ nhân bản.'
        ]
    ];
}
$deliverables_note = edt_field('dv3_deliverables_note', null, '*Tất cả hạng mục đều được cá nhân hóa 100% dựa trên mô hình kinh doanh của bạn.');

// 6. Compare & Pricing Fields
$compare_rows = edt_field('edt_dv3_compare_rows', null, []);
if (empty($compare_rows)) {
    $compare_rows = [
        [
            'row_label' => 'Mục tiêu',
            'row_btf' => 'Xây dựng bộ quy trình chuẩn SOP vận hành quán',
            'row_bm' => 'Tái cấu trúc chiến lược dài hạn và nhân bản chuỗi'
        ],
        [
            'row_label' => 'Tần suất gặp Coach',
            'row_btf' => 'Học nhóm cố định 10 tuần qua Zoom',
            'row_bm' => 'Khai vấn 1:1 định kỳ hàng tuần/hai tuần trực tiếp'
        ],
        [
            'row_label' => 'Đặc quyền hỗ trợ',
            'row_btf' => 'Hỗ trợ sửa bài tập quy trình hàng tuần',
            'row_bm' => 'Hỗ trợ không giới hạn qua Zalo/Email 24/7'
        ]
    ];
}
$plans = edt_field('edt_dv3_plans', null, []);
if (empty($plans)) {
    $plans = [
        [
            'plan_duration' => '3 Tháng',
            'plan_subtitle' => 'Giải quyết bài toán nóng',
            'plan_price' => 'Liên hệ',
            'plan_featured' => 0
        ],
        [
            'plan_duration' => '6 Tháng',
            'plan_subtitle' => 'Tái cấu trúc & Quy trình chuỗi',
            'plan_price' => 'Đề xuất',
            'plan_featured' => 1
        ],
        [
            'plan_duration' => '12 Tháng',
            'plan_subtitle' => 'Đồng hành chiến lược trọn đời',
            'plan_price' => 'Liên hệ',
            'plan_featured' => 0
        ]
    ];
}
$capacity_note = edt_field('dv3_capacity_note', null, '*Để đảm bảo hiệu quả tối đa, Coach Edina Trâm chỉ nhận tối đa 3 khách hàng đồng hành mới mỗi quý.');
?>

<style>
    /* Inline styles required for Service 3 (Business Mastery) */
    body {
        padding-bottom: 70px; /* space for sticky cta */
    }

    .bm-section {
        padding-block: var(--space-20);
        background: var(--color-bg, #FBF8F0);
        overflow: hidden;
    }

    .bm-section.alt {
        background: #EAF2EC; /* Soft Emerald Mist */
    }

    :root {
        --color-primary: #014F3D; /* Deep Forest Emerald */
        --color-primary-dark: #071A15;
        --color-accent: #C8A244;
        --bm-border: #DED3B8;
        --bm-card: #FFFFFF;
    }

    h1, h2, h3 { color: #014F3D; }
    p { color: #4A5B54; }

    .site-header {
        background: rgba(251, 248, 240, 0.95);
        border-color: #DED3B8;
    }

    .badge {
        background: rgba(1, 79, 61, 0.1);
        color: #014F3D;
    }

    /* Sticky CTA */
    .sticky-cta {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 200;
        background: #014F3D;
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
            radial-gradient(ellipse at 15% 55%, rgba(1, 79, 61, 0.12) 0%, transparent 55%),
            radial-gradient(ellipse at 85% 20%, rgba(200, 162, 68, 0.08) 0%, transparent 50%),
            #FBF8F0;
        min-height: calc(100vh - 72px);
        display: flex;
        align-items: center;
    }

    .hero-bm-container {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        align-items: center;
        gap: var(--space-8);
    }

    .hero-bm-img {
        position: relative;
        text-align: right;
    }

    .hero-bm-img img {
        max-height: 600px;
        object-fit: contain;
        mask-image: linear-gradient(to bottom, black 85%, transparent 100%);
        -webkit-mask-image: linear-gradient(to bottom, black 85%, transparent 100%);
    }

    .hero-bm-title {
        font-size: clamp(2rem, 5vw, 3.75rem);
        font-family: var(--font-heading);
        line-height: 1.1;
        color: #071A15;
        margin: 0 0 var(--space-4);
        text-align: left;
    }

    .hero-bm-title span {
        color: #014F3D;
    }

    .hero-bm-tagline {
        font-size: var(--text-xl);
        font-style: italic;
        color: var(--color-accent);
        margin-bottom: var(--space-6);
        text-align: left;
    }

    .btn-bm-cta {
        background: #014F3D;
        color: #fff;
        font-size: var(--text-lg);
        padding: var(--space-4) var(--space-10);
        box-shadow: 0 4px 15px rgba(1, 79, 61, 0.2);
        transition: all 0.25s ease;
        border-radius: var(--radius-full);
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
    }

    .btn-bm-cta:hover {
        background: #071A15;
        transform: translateY(-2px);
    }

    .section-header {
        text-align: center;
        margin-bottom: var(--space-12);
    }

    .section-header h2 {
        font-size: clamp(2rem, 4vw, 2.75rem);
        font-family: var(--font-heading);
        color: #014F3D;
        margin-top: 1rem;
        margin-bottom: var(--space-3);
    }

    .section-header p {
        color: #4A5B54;
        font-size: var(--text-lg);
        max-width: 600px;
        margin-inline: auto;
    }

    .bm-divider {
        width: 60px;
        height: 3px;
        background: var(--color-accent);
        margin-inline: auto;
        margin-block: var(--space-4);
    }

    /* Pain Points */
    .pain-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: var(--space-6);
    }

    .pain-card {
        background: var(--bm-card);
        border: 1px solid var(--bm-border);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        border-top: 4px solid var(--color-primary);
        text-align: left;
    }

    .pain-card.full-width {
        grid-column: span 2;
    }

    .pain-num {
        font-family: var(--font-heading);
        font-size: 2.5rem;
        color: rgba(1, 79, 61, 0.1);
        margin-bottom: var(--space-4);
        line-height: 1;
    }

    .pain-card h3 {
        font-size: var(--text-lg);
        margin-bottom: var(--space-3);
        color: #014F3D;
    }

    .pain-card p {
        font-size: var(--text-sm);
        margin: 0;
        line-height: 1.6;
    }

    /* Targets */
    .target-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-6);
    }

    .target-card {
        background: var(--bm-card);
        border: 1px solid var(--bm-border);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        text-align: left;
    }

    .target-icon {
        font-size: 2.5rem;
        margin-bottom: var(--space-4);
    }

    .target-card h3 {
        font-size: var(--text-xl);
        color: #014F3D;
        margin-bottom: var(--space-3);
    }

    .target-card p {
        font-size: var(--text-sm);
        line-height: 1.6;
    }

    /* Compare & Method */
    .method-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-8);
        margin-bottom: var(--space-12);
    }

    .method-col {
        background: var(--bm-card);
        border: 1px solid var(--bm-border);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        text-align: left;
    }

    .method-col.negative {
        border-top: 4px solid #b32d2e;
    }

    .method-col.positive {
        border-top: 4px solid var(--color-primary);
        background: rgba(1, 79, 61, 0.02);
    }

    .method-col h3 {
        font-size: var(--text-xl);
        margin-bottom: var(--space-6);
    }

    .method-col.negative h3 { color: #b32d2e; }

    .method-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: var(--space-4);
    }

    .method-list li {
        display: flex;
        gap: var(--space-3);
        font-size: var(--text-sm);
        align-items: flex-start;
    }

    .method-list li svg {
        flex-shrink: 0;
        margin-top: 3px;
    }

    .focus-badge-row {
        display: flex;
        flex-wrap: wrap;
        gap: var(--space-3);
        justify-content: center;
        margin-block: var(--space-6);
    }

    .focus-badge {
        background: rgba(200, 162, 68, 0.15);
        color: var(--color-accent);
        padding: var(--space-2) var(--space-4);
        border-radius: var(--radius-full);
        font-weight: 700;
        font-size: var(--text-sm);
    }

    /* Value Cards */
    .value-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-6);
        margin-bottom: var(--space-12);
    }

    .value-card {
        background: var(--bm-card);
        border: 1px solid var(--bm-border);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        text-align: left;
        position: relative;
    }

    .value-num {
        font-family: var(--font-heading);
        font-size: 5rem;
        color: rgba(1, 79, 61, 0.08);
        position: absolute;
        top: 10px;
        right: 20px;
        line-height: 1;
    }

    .value-card h3 {
        font-size: var(--text-base);
        color: #014F3D;
        margin-bottom: var(--space-4);
        font-weight: 700;
    }

    .value-card p {
        font-size: var(--text-sm);
        margin: 0;
        line-height: 1.6;
    }

    /* Deliverables list */
    .deliv-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-6);
    }

    .deliv-card {
        background: var(--bm-card);
        border: 1px solid var(--bm-border);
        border-radius: var(--radius-lg);
        padding: var(--space-6);
        border-left: 4px solid var(--color-accent);
        text-align: left;
    }

    .deliv-card h3 {
        font-size: var(--text-base);
        color: #014F3D;
        margin-bottom: var(--space-2);
    }

    .deliv-card p {
        font-size: var(--text-sm);
        margin: 0;
        line-height: 1.6;
    }

    /* Compare Table */
    .compare-table-wrap {
        width: 100%;
        overflow-x: auto;
        border: 1px solid var(--bm-border);
        border-radius: var(--radius-lg);
        background: var(--bm-card);
        margin-bottom: var(--space-12);
    }

    .compare-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
        font-size: var(--text-sm);
    }

    .compare-table th, .compare-table td {
        padding: var(--space-4) var(--space-6);
        border-bottom: 1px solid var(--bm-border);
    }

    .compare-table th {
        background: #f6f7f7;
        font-weight: 700;
        color: #014F3D;
    }

    .compare-table tr:last-child td {
        border-bottom: none;
    }

    .compare-table .highlight-col {
        background: rgba(1, 79, 61, 0.03);
        font-weight: 500;
    }

    /* Pricing Plans */
    .plans-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-6);
    }

    .plan-card {
        background: var(--bm-card);
        border: 1px solid var(--bm-border);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        text-align: left;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .plan-card.featured {
        border: 2px solid var(--color-accent);
        transform: scale(1.03);
        box-shadow: 0 8px 30px rgba(200, 162, 68, 0.15);
    }

    .plan-badge {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--color-accent);
        color: #fff;
        font-size: 0.65rem;
        font-weight: 700;
        text-transform: uppercase;
        padding: var(--space-1) var(--space-3);
        border-radius: var(--radius-full);
        letter-spacing: 0.1em;
    }

    .plan-duration {
        font-family: var(--font-heading);
        font-size: 1.5rem;
        color: #014F3D;
        margin: 0;
    }

    .plan-subtitle {
        font-size: var(--text-xs);
        color: #64748b;
        margin-top: 2px;
        margin-bottom: var(--space-6);
    }

    .plan-price-wrap {
        border-top: 1px solid var(--bm-border);
        padding-top: var(--space-4);
        margin-top: auto;
    }

    .plan-price {
        font-family: var(--font-heading);
        font-size: var(--text-2xl);
        color: var(--color-accent);
        font-weight: 700;
    }

    @media (max-width: 992px) {
        .hero-bm-container {
            grid-template-columns: 1fr;
            text-align: center;
        }
        .hero-bm-img {
            text-align: center;
        }
        .hero-bm-img img {
            max-height: 400px;
        }
        .pain-grid, .target-grid, .method-layout, .value-grid, .deliv-grid, .plans-grid, .testi-grid {
            grid-template-columns: 1fr;
        }
        .pain-card.full-width {
            grid-column: span 1;
        }
        .plan-card.featured {
            transform: none;
        }
    }

    /* Testimonials */
    .testi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-6);
        margin-bottom: var(--space-10);
    }
    .testi-card {
        background: var(--bm-card);
        border: 1px solid var(--bm-border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        padding: var(--space-6);
        gap: var(--space-4);
        transition: all 0.35s ease;
        text-align: left;
    }
    .testi-img-wrap {
        width: 100%;
        aspect-ratio: 4/5;
        overflow: hidden;
        border-radius: var(--radius-md);
    }
    .testi-img { width: 100%; height: 100%; object-fit: cover; object-position: top center; display: block; }
    .testi-name { font-family: var(--font-heading); font-size: var(--text-lg); color: #014F3D; margin-bottom: 0; }
    .testi-location { font-size: var(--text-xs); color: #4A5B54; margin-bottom: var(--space-3); }
    .testi-quote { font-size: var(--text-sm); font-style: italic; color: #071A15; margin: 0; line-height: 1.6; }

    /* FAQ */
    .faq-list { display: flex; flex-direction: column; gap: var(--space-3); }
    .faq-item { background: var(--bm-card); border: 1px solid var(--bm-border); border-radius: var(--radius-md); text-align: left; }
    .faq-q { padding: var(--space-4) var(--space-6); font-weight: 600; font-size: var(--text-lg); color: #014F3D; cursor: pointer; display: flex; justify-content: space-between; align-items: center; }
    .faq-q::after { content: '+'; font-family: monospace; font-size: 1.2rem; transition: transform 0.2s; }
    .faq-item.active .faq-q::after { content: '-'; }
    .faq-a { padding: 0 var(--space-6); max-height: 0; overflow: hidden; transition: max-height 0.3s ease-out, padding 0.3s ease-out; color: #4A5B54; font-size: var(--text-sm); line-height: 1.6; }
    .faq-item.active .faq-a { max-height: 500px; padding-bottom: var(--space-4); }
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
<section class="bm-section hero-section-bg" style="padding-top:0;">
    <div class="container hero-bm-container">
        <div data-reveal style="text-align: left;">
            <span class="badge"><?php echo esc_html($badge); ?></span>
            <h1 class="hero-bm-title"><?php echo esc_html($title); ?></h1>
            <p class="hero-bm-tagline"><?php echo esc_html($tagline); ?></p>
            <p style="color:#4A5B54; margin-bottom:var(--space-6); line-height:1.6; text-align: left;"><?php echo wp_kses_post($description); ?></p>
            
            <div style="background: rgba(200,162,68,0.1); border:1px solid rgba(200,162,68,0.25); color: #071A15; padding: 12px 18px; border-radius: 8px; font-weight:600; font-size:var(--text-sm); display:inline-block; margin-bottom: var(--space-6);">
                <?php echo esc_html($gift_text); ?>
            </div>

            <div style="margin-top:var(--space-2);">
                <a href="#register" class="btn-bm-cta"><?php echo esc_html($cta_label); ?></a>
            </div>
        </div>
        <div class="hero-bm-img" data-reveal>
            <?php if ($hero_image) : ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="<?php bloginfo('name'); ?>" loading="lazy" />
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- SECTION 2: PAIN POINTS -->
<section class="bm-section alt">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Vấn đề cột mốc</span>
            <h2>Những áp lực vô hình bạn đang gánh vác</h2>
            <div class="bm-divider"></div>
        </div>
        
        <div class="pain-grid">
            <?php foreach ($pains as $pain) : 
                $p_num = isset($pain['pain_number']) ? $pain['pain_number'] : '1';
                $p_title = isset($pain['pain_title']) ? $pain['pain_title'] : '';
                $p_desc = isset($pain['pain_description']) ? $pain['pain_description'] : '';
                $p_fw = isset($pain['pain_full_width']) && $pain['pain_full_width'] ? 'full-width' : '';
                ?>
                <div class="pain-card <?php echo esc_attr($p_fw); ?>" data-reveal>
                    <div class="pain-num"><?php echo esc_html($p_num); ?></div>
                    <h3><?php echo esc_html($p_title); ?></h3>
                    <p><?php echo esc_html($p_desc); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 3: WHO SHOULD JOIN -->
<section class="bm-section">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Đối tượng đồng hành</span>
            <h2>Chương trình này dành cho ai?</h2>
            <div class="bm-divider"></div>
        </div>
        
        <div class="target-grid">
            <?php foreach ($targets as $target) : 
                $t_icon = isset($target['target_icon']) ? $target['target_icon'] : '🏢';
                $t_title = isset($target['target_title']) ? $target['target_title'] : '';
                $t_desc = isset($target['target_description']) ? $target['target_description'] : '';
                ?>
                <div class="target-card" data-reveal>
                    <div class="target-icon"><?php echo esc_html($t_icon); ?></div>
                    <h3><?php echo esc_html($t_title); ?></h3>
                    <p><?php echo esc_html($t_desc); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 4: METHODS & ACTION -->
<section class="bm-section alt">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Cách thức làm việc</span>
            <h2>Đây không phải là một khoá học thông thường</h2>
            <div class="bm-divider"></div>
        </div>
        
        <div class="method-layout">
            <!-- Negative points -->
            <div class="method-col negative" data-reveal>
                <h3>CHÚNG TA SẼ KHÔNG:</h3>
                <ul class="method-list">
                    <?php foreach ($not_like as $item) : ?>
                        <li>
                            <svg width="18" height="18" fill="none" stroke="#b32d2e" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span><?php echo esc_html($item['not_text']); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Positive points -->
            <div class="method-col positive" data-reveal>
                <h3>THAY VÀO ĐÓ, BẠN NHẬN ĐƯỢC:</h3>
                <ul class="method-list">
                    <?php foreach ($you_get as $item) : ?>
                        <li>
                            <svg width="18" height="18" fill="none" stroke="#014F3D" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            <span><?php echo esc_html($item['get_text']); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="section-header" style="margin-top: var(--space-12);">
            <span class="badge">Lĩnh vực tập trung</span>
            <h2>Tập trung giải quyết trên mô hình thực tế của bạn</h2>
            <div class="bm-divider"></div>
        </div>

        <div class="focus-badge-row" data-reveal>
            <?php foreach ($focus_badges as $badge_item) : ?>
                <span class="focus-badge"><?php echo esc_html($badge_item['badge_label']); ?></span>
            <?php endforeach; ?>
        </div>

        <p style="font-style: italic; color: #4A5B54; max-width: 600px; margin-inline: auto;">
            <?php echo esc_html($focus_note); ?>
        </p>
    </div>
</section>

<!-- SECTION 5: VALUES & DELIVERABLES -->
<section class="bm-section">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Giá trị đồng hành</span>
            <h2>3 Cột mốc chuyển hóa lớn trong chương trình</h2>
            <div class="bm-divider"></div>
        </div>
        
        <div class="value-grid">
            <?php foreach ($values as $value) : 
                $v_num = isset($value['value_number']) ? $value['value_number'] : '1';
                $v_title = isset($value['value_title']) ? $value['value_title'] : '';
                $v_desc = isset($value['value_description']) ? $value['value_description'] : '';
                ?>
                <div class="value-card" data-reveal>
                    <div class="value-num"><?php echo esc_html($v_num); ?></div>
                    <h3><?php echo esc_html($v_title); ?></h3>
                    <p><?php echo esc_html($v_desc); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="section-header" style="margin-top: var(--space-12);">
            <span class="badge">Các hạng mục bàn giao</span>
            <h2>Những kết quả bàn giao cụ thể</h2>
            <div class="bm-divider"></div>
        </div>

        <div class="deliv-grid" data-reveal>
            <?php foreach ($deliverables as $deliv) : 
                $d_title = isset($deliv['deliverable_title']) ? $deliv['deliverable_title'] : '';
                $d_desc = isset($deliv['deliverable_description']) ? $deliv['deliverable_description'] : '';
                ?>
                <div class="deliv-card">
                    <h3><?php echo esc_html($d_title); ?></h3>
                    <p><?php echo esc_html($d_desc); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        
        <p style="font-size:var(--text-xs); color:#64748b; margin-top: var(--space-6);">
            <?php echo esc_html($deliverables_note); ?>
        </p>
    </div>
</section>

<!-- SECTION 6: COMPARE & PRICING -->
<section class="bm-section alt">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">So sánh chương trình</span>
            <h2>Business to Freedom &amp; Business Mastery</h2>
            <div class="bm-divider"></div>
        </div>

        <div class="compare-table-wrap" data-reveal>
            <table class="compare-table">
                <thead>
                    <tr>
                        <th>Tiêu chí</th>
                        <th>Business to Freedom</th>
                        <th class="highlight-col">Business Mastery</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compare_rows as $row) : 
                        $lbl = isset($row['row_label']) ? $row['row_label'] : '';
                        $btf = isset($row['row_btf']) ? $row['row_btf'] : '';
                        $bm_c = isset($row['row_bm']) ? $row['row_bm'] : '';
                        ?>
                        <tr>
                            <td><strong><?php echo esc_html($lbl); ?></strong></td>
                            <td><?php echo esc_html($btf); ?></td>
                            <td class="highlight-col"><?php echo esc_html($bm_c); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="section-header" style="margin-top: var(--space-12);">
            <span class="badge">Đăng ký lộ trình</span>
            <h2>Các gói giải pháp đồng hành 1:1</h2>
            <div class="bm-divider"></div>
        </div>

        <div class="plans-grid" data-reveal style="margin-bottom: var(--space-6);">
            <?php foreach ($plans as $plan) : 
                $dur = isset($plan['plan_duration']) ? $plan['plan_duration'] : 'Gói';
                $sub = isset($plan['plan_subtitle']) ? $plan['plan_subtitle'] : '';
                $prc = isset($plan['plan_price']) ? $plan['plan_price'] : 'Liên hệ';
                $feat = isset($plan['plan_featured']) && $plan['plan_featured'] ? 'featured' : '';
                ?>
                <div class="plan-card <?php echo esc_attr($feat); ?>">
                    <?php if ($feat) : ?>
                        <span class="plan-badge">Đề xuất nhiều nhất</span>
                    <?php endif; ?>
                    <h3 class="plan-duration"><?php echo esc_html($dur); ?></h3>
                    <p class="plan-subtitle"><?php echo esc_html($sub); ?></p>
                    
                    <div class="plan-price-wrap">
                        <span style="font-size: var(--text-xs); color: #64748b; text-transform: uppercase;">Chi phí đồng hành:</span>
                        <div class="plan-price"><?php echo esc_html($prc); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <p style="font-size: var(--text-sm); color: #4A5B54; margin-top: var(--space-8);">
            <?php echo esc_html($capacity_note); ?>
        </p>
    </div>
</section>

<!-- SECTION: TESTIMONIALS -->
<section class="bm-section alt">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Khách hàng nói gì</span>
            <h2>Ý kiến từ những doanh nhân đã đồng hành</h2>
            <div class="bm-divider"></div>
        </div>
        
        <?php
        $args = [
            'post_type'      => 'edina_testimonial',
            'posts_per_page' => 6,
        ];
        if (term_exists('business-mastery', 'program_cat')) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'program_cat',
                    'field'    => 'slug',
                    'terms'    => 'business-mastery',
                ]
            ];
        }
        $testi_query = new WP_Query($args);
        
        if ($testi_query->have_posts()) :
            echo '<div class="testi-grid">';
            while ($testi_query->have_posts()) : $testi_query->the_post();
                $t_role = get_post_meta(get_the_ID(), '_testimonial_role', true);
                $t_avatar = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                if (empty($t_avatar)) {
                    $t_avatar = esc_url(get_template_directory_uri()) . '/assets/dv2/t1-caolan.png';
                }
                ?>
                <div class="testi-card" data-reveal>
                    <div class="testi-img-wrap">
                        <img src="<?php echo esc_url($t_avatar); ?>" class="testi-img" alt="<?php the_title_attribute(); ?>" loading="lazy" />
                    </div>
                    <div class="testi-body">
                        <p class="testi-name"><?php echo esc_html(get_the_title()); ?></p>
                        <p class="testi-location"><?php echo esc_html($t_role); ?></p>
                        <p class="testi-quote">"<?php echo wp_strip_all_tags(get_the_content()); ?>"</p>
                    </div>
                </div>
                <?php
            endwhile;
            echo '</div>';
            wp_reset_postdata();
        else :
            ?>
            <p style="color: #4A5B54; font-style: italic;">Chưa có ý kiến nào. Hãy thêm trong mục <strong>Ý kiến Khách hàng</strong> và gán danh mục <code>business-mastery</code>.</p>
            <?php
        endif;
        ?>
    </div>
</section>

<!-- SECTION: FAQ -->
<section class="bm-section">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Giải đáp thắc mắc</span>
            <h2>Câu hỏi thường gặp</h2>
            <div class="bm-divider"></div>
        </div>
        
        <div class="faq-list" style="max-width: 800px; margin-inline: auto;">
            <?php
            $faq_args = [
                'post_type'      => 'edina_faq',
                'posts_per_page' => 10,
            ];
            if (term_exists('business-mastery', 'program_cat')) {
                $faq_args['tax_query'] = [
                    [
                        'taxonomy' => 'program_cat',
                        'field'    => 'slug',
                        'terms'    => 'business-mastery',
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
                ?>
                <p style="color: #4A5B54; font-style: italic;">Chưa có câu hỏi nào. Hãy thêm trong mục <strong>FAQs</strong> và gán danh mục <code>business-mastery</code>.</p>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<!-- SECTION 7: FINAL CALL TO ACTION -->
<section id="register" class="bm-section" style="text-align: center; background: var(--color-primary-dark, #071A15); color: #fff; padding-block: var(--space-24);">
    <div class="container" style="max-width: 800px;">
        <div data-reveal>
            <span class="badge" style="background:rgba(200, 162, 68, 0.15); color:var(--color-accent); margin-bottom: var(--space-4);"><?php esc_html_e('Khai vấn Chiến lược 1:1', 'edina-tram'); ?></span>
            <h2 style="font-size: clamp(2rem, 4vw, 3rem); font-family: var(--font-heading); color: #fff; margin-top:1rem; margin-bottom: var(--space-4);">
                Bắt đầu thiết lập tương lai bền vững cho thương hiệu F&B của bạn
            </h2>
            <p style="color: #E2E8F0; font-size: var(--text-lg); margin-bottom: var(--space-8);">
                Đặt lịch hẹn 30 phút trao đổi trực tiếp cùng Coach Edina Trâm để phác thảo các vấn đề nóng cần khai vấn tức thì.
            </p>
            
            <a href="https://zalo.me/0909000000" target="_blank" rel="noopener" class="btn-bm-cta" style="background:var(--color-accent); color:#fff; border-radius: var(--radius-full);">
                Đặt lịch Tư vấn Chiến lược 1:1 Miễn phí
            </a>
            
            <p style="font-size: 0.85rem; color:#94a3b8; margin-top:var(--space-4);">
                *Lưu ý: Buổi tư vấn sơ bộ hoàn toàn miễn phí và bảo mật tuyệt đối thông tin kinh doanh của bạn.
            </p>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            const q = item.querySelector('.faq-q');
            q.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                faqItems.forEach(i => {
                    i.classList.remove('active');
                    const a = i.querySelector('.faq-a');
                    if (a) { a.style.maxHeight = '0'; a.style.paddingBottom = '0'; }
                });
                if (!isActive) {
                    item.classList.add('active');
                    const a = item.querySelector('.faq-a');
                    if (a) { a.style.maxHeight = '500px'; a.style.paddingBottom = 'var(--space-4)'; }
                }
            });
        });
    });
</script>

<?php
get_footer();
