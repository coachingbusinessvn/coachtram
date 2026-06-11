<?php
/**
 * Template Name: Passion to Profit Template
 */

get_header();

// 1. Hero Section Fields
$sticky_title = edt_field('dv1_sticky_title', null, 'Workshop Online: PASSION TO PROFIT');
$sticky_meta = edt_field('dv1_sticky_meta', null, '13 - 14 tháng 03 · 3.900.000đ · Giới hạn 20 người');
$badge = edt_field('dv1_badge', null, 'Workshop F&B Online · 2 ngày');
$title_line1 = edt_field('dv1_title_line1', null, 'Từ Đam Mê Đến <span>Lợi Nhuận</span>');
$title_line2 = edt_field('dv1_title_line2', null, 'Định hình mô hình khởi nghiệp F&B của riêng bạn');
$tagline = edt_field('dv1_tagline', null, 'Kinh doanh F&B: Đam mê thôi liệu có đủ?');
$description = edt_field('dv1_description', null, 'Nhiều người bước chân vào ngành F&B vì tình yêu với ẩm thực hoặc mong muốn làm chủ... Workshop này thiết kế để giúp bạn chuyển hóa đam mê thành mô hình kinh doanh bài bản, hiệu quả và sinh lời bền vững.');
$time = edt_field('dv1_time', null, '09:00 - 17:00');
$date = edt_field('dv1_date', null, '13 - 14/03/2026');
$price = edt_field('dv1_price', null, '3.900.000đ');
$slots = edt_field('dv1_slots', null, '20');
$countdown_target = edt_field('dv1_countdown_target', null, 'March 14, 2026 09:00:00');
$cta_label = edt_field('dv1_cta_label', null, 'Đăng ký giữ chỗ ngay');
$scholarship_note = edt_field('dv1_scholarship_note', null, '*Nhập mã <strong>EARLYBIRD</strong> trước 05/03 để nhận ưu đãi 20%');
$hero_image = edt_img_url('dv1_hero_image', null, get_template_directory_uri() . '/assets/dv1/hero-coach.png');
$coach_label = edt_field('dv1_coach_label', null, 'Coach Edina Trâm');

// 2. Credibility Section Fields
$cred_title = edt_field('dv1_cred_title', null, 'Tại sao bạn nên học cùng Edina Trâm?');
$cred_image = edt_img_url('dv1_cred_image', null, get_template_directory_uri() . '/assets/dv1/about-sharing.png');
$stats = edt_field('edt_dv1_stats', null, []);
if (empty($stats)) {
    $stats = [
        ['stat_num' => '15+', 'stat_label' => 'Năm kinh nghiệm vận hành & khai vấn F&B'],
        ['stat_num' => '50+', 'stat_label' => 'Chủ thương hiệu F&B đã được hỗ trợ trực tiếp'],
        ['stat_num' => '1.000+', 'stat_label' => 'Học viên & khách khai vấn đã đồng hành'],
        ['stat_num' => '100%', 'stat_label' => 'Thực chiến, không lý thuyết suông']
    ];
}

// 3. Target Audience Section Fields
$target_title = edt_field('dv1_target_title', null, 'Workshop này dành cho ai?');
$targets = edt_field('edt_dv1_targets', null, []);
if (empty($targets)) {
    $targets = [
        [
            'target_number' => '01',
            'target_text' => '<strong>Chuẩn bị khởi nghiệp F&B:</strong> Đang ấp ủ ý tưởng kinh doanh quán cafe, nhà hàng... nhưng chưa biết bắt đầu từ đâu để hạn chế rủi ro.'
        ],
        [
            'target_number' => '02',
            'target_text' => '<strong>Chủ quán F&B đang loay hoay:</strong> Quán đã vận hành nhưng chưa có lợi nhuận ổn định, thiếu hệ thống kiểm soát chi phí hoặc đang mất định hướng.'
        ],
        [
            'target_number' => '03',
            'target_text' => '<strong>Người làm tự do / Quản lý F&B:</strong> Muốn thấu hiểu sâu sắc bản thân để thiết kế một mô hình kinh doanh bền vững mang dấu ấn riêng.'
        ]
    ];
}

// 4. Benefits Section Fields
$benefits_title = edt_field('dv1_benefits_title', null, 'Những giá trị bạn nhận được sau 2 ngày');
$benefits = edt_field('edt_dv1_benefits', null, []);
if (empty($benefits)) {
    $benefits = [
        [
            'benefit_icon' => '💡',
            'benefit_title' => 'Bản đồ định vị bản thân',
            'benefit_description' => 'Hiểu rõ điểm mạnh, giá trị cốt lõi và phong cách quản lý cá nhân để chọn đúng mô hình kinh doanh phù hợp.'
        ],
        [
            'benefit_icon' => '📊',
            'benefit_title' => 'Cơ cấu tài chính chuẩn F&B',
            'benefit_description' => 'Nắm rõ cấu trúc chi phí (COGS, lao động, mặt bằng...) và cách định giá bán để bảo đảm dòng tiền luôn dương.'
        ],
        [
            'benefit_icon' => '🎯',
            'benefit_title' => 'Phác thảo Concept độc bản',
            'benefit_description' => 'Xác định tệp khách hàng mục tiêu, thông điệp truyền thông và sự khác biệt để quán của bạn nổi bật giữa đám đông.'
        ],
        [
            'benefit_icon' => '📋',
            'benefit_title' => 'Checklist chuẩn bị mở quán',
            'benefit_description' => 'Nhận tài liệu và lộ trình từng bước từ thiết kế menu, tuyển dụng, đến kế hoạch khai trương chi tiết.'
        ],
        [
            'benefit_icon' => '🤝',
            'benefit_title' => 'Cộng đồng F&B văn minh',
            'benefit_description' => 'Kết nối với các chủ quán cùng chí hướng để chia sẻ kinh nghiệm, nguồn cung cấp và hỗ trợ lẫn nhau.'
        ],
        [
            'benefit_icon' => '💬',
            'benefit_title' => 'Q&A trực tiếp cùng Coach',
            'benefit_description' => 'Được Coach Edina Trâm giải đáp các thắc mắc riêng biệt của bạn ngay trong workshop.'
        ]
    ];
}

// 5. Modules Section Fields
$modules_title = edt_field('dv1_modules_title', null, 'Lộ trình 2 ngày thực chiến');
$modules = edt_field('edt_dv1_modules', null, []);
if (empty($modules)) {
    $modules = [
        [
            'module_label' => 'MODULE 1',
            'module_title' => 'ĐỊNH VỊ BẢN THÂN & XÂY DỰNG CONCEPT',
            'module_description' => 'Khám phá IKIGAI trong ngành F&B của bạn. Xác định Concept quán phù hợp với năng lực cốt lõi và tệp khách hàng mục tiêu. Phân tích đối thủ cạnh tranh và định hình Unique Selling Proposition (USP).'
        ],
        [
            'module_label' => 'MODULE 2',
            'module_title' => 'TÀI CHÍNH F&B THỰC CHIẾN & VẬN HÀNH',
            'module_description' => 'Làm quen với các chỉ số tài chính sống còn: Định phí, Biến phí, Điểm hòa vốn. Cách tính COGS cho menu và quản lý hao hụt nguyên vật liệu. Phác thảo sơ đồ nhân sự và quy trình dịch vụ cơ bản.'
        ],
        [
            'module_label' => 'MODULE 3',
            'module_title' => 'WHAT\'S NEXT? – Bước tiếp theo dành cho bạn?',
            'module_description' => 'Bạn không cô đơn trên hành trình này. Hãy học từ người đi trước, duy trì kết nối trong cộng đồng những người khởi nghiệp, và chọn cho mình một người Professional Coach chuyên nghiệp để cá nhân hoá lộ trình và cam kết hành động.'
        ]
    ];
}

// 6. Instructor Section Fields
$instructor_image = edt_img_url('dv1_instructor_image', null, get_template_directory_uri() . '/assets/dv1/instructor-edina.png');
$instructor_name = edt_field('dv1_instructor_name', null, 'Edina Trâm');
$instructor_title = edt_field('dv1_instructor_title', null, 'Professional Coach (ICF PCC) & F&B Founder');
$credentials = edt_field('edt_dv1_credentials', null, []);
if (empty($credentials)) {
    $credentials = [
        [
            'cred_number' => '01',
            'cred_text' => '<strong>Chứng chỉ ICF PCC:</strong> Professional Certified Coach đạt chuẩn quốc tế từ Liên đoàn Khai vấn Quốc tế.'
        ],
        [
            'cred_number' => '02',
            'cred_text' => '<strong>F&B Founder:</strong> Đã và đang điều hành chuỗi quán cafe và không gian làm việc sáng tạo.'
        ],
        [
            'cred_number' => '03',
            'cred_text' => '<strong>Tác giả cuốn sách "Ánh Sáng Của Ước Mơ":</strong> Truyền cảm hứng cho hàng ngàn bạn trẻ tự tin khởi nghiệp.'
        ]
    ];
}

// 7. Final CTA Section Fields
$cta_quote = edt_field('dv1_cta_quote', null, '"Kinh doanh không phải là trò chơi của may rủi. Đó là khoa học của sự chuẩn bị."');
$cta_final_label = edt_field('dv1_cta_final_label', null, 'Bắt đầu hành trình của bạn ngay hôm nay');
?>

<style>
    /* Service 1 (Passion to Profit) custom stylesheet rules inline */
    body {
        padding-bottom: 70px; /* space for sticky cta */
    }

    .p2p-section {
        overflow: hidden;
    }

    :root {
        --p2p-gold: #C8A244; /* Royal Gold */
        --p2p-red: #005B45;  /* Royal Emerald */
        --p2p-dark: #FBF8F0;  /* Pearl Ivory */
        --p2p-dark2: #EAF2EC; /* Soft Emerald Mist */
        --p2p-card: #FFFFFF;
        --p2p-border: #DED3B8; /* Pale Gold Sand */
    }

    h1, h2, h3 { color: #005B45; }
    p { color: #4A5B54; }

    .badge {
        background: rgba(11, 138, 102, 0.1);
        color: #0B8A66;
    }

    .p2p-section {
        padding-block: var(--space-20);
        background: var(--p2p-dark);
    }

    .p2p-section.alt {
        background: var(--p2p-dark2);
    }

    /* Sticky CTA bar */
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
        background: var(--p2p-gold);
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
    .hero-p2p {
        min-height: calc(100vh - 72px);
        display: flex;
        align-items: center;
        padding-block: var(--space-12);
        background:
            radial-gradient(ellipse at 15% 55%, rgba(11, 138, 102, 0.12) 0%, transparent 55%),
            radial-gradient(ellipse at 85% 20%, rgba(200, 162, 68, 0.08) 0%, transparent 50%),
            #FBF8F0;
    }

    .hero-p2p-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        gap: var(--space-8);
    }

    .hero-p2p-img {
        position: relative;
        display: block;
        width: fit-content;
        margin-inline: auto;
    }

    .hero-p2p-img::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 35%;
        background: linear-gradient(to top, #FBF8F0 0%, transparent 100%);
        pointer-events: none;
        border-radius: 0 0 var(--radius-lg) var(--radius-lg);
    }

    .hero-p2p-img img {
        width: min(420px, 100%);
        height: auto;
        border-radius: var(--radius-lg);
        object-fit: cover;
        object-position: top;
    }

    .coach-label {
        position: absolute;
        bottom: 16px;
        left: 16px;
        background: #005B45;
        color: #fff;
        padding: var(--space-2) var(--space-4);
        border-radius: var(--radius-md);
        font-size: var(--text-sm);
        font-weight: 700;
    }

    .hero-p2p-title {
        font-size: clamp(2rem, 8vw, 3.5rem);
        font-family: var(--font-heading);
        line-height: 1.1;
        color: #071A15;
        margin: 0;
        text-align: left;
    }

    .hero-p2p-title span {
        color: #0B8A66;
    }

    .hero-tagline {
        font-size: var(--text-xl);
        font-style: italic;
        color: var(--p2p-gold);
        margin: var(--space-4) 0;
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
        color: var(--p2p-gold);
        flex-shrink: 0;
    }

    .price-badge {
        display: inline-block;
        background: var(--p2p-gold);
        color: #fff;
        font-family: var(--font-heading);
        font-size: var(--text-2xl);
        font-weight: 700;
        padding: var(--space-2) var(--space-6);
        border-radius: var(--radius-full);
        margin-bottom: var(--space-4);
    }

    .scholarship-note {
        font-size: var(--text-sm);
        color: #4A5B54;
        margin-top: var(--space-3);
        text-align: left;
    }

    .scholarship-note strong {
        color: #005B45;
    }

    .btn-p2p-cta {
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

    .btn-p2p-cta:hover {
        background: #012E24;
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0, 91, 69, 0.3);
    }

    /* Credibility */
    .cred-img-wrap {
        border: 3px solid var(--p2p-gold);
        border-radius: var(--radius-lg);
        overflow: hidden;
        max-width: 720px;
        margin-inline: auto;
        margin-bottom: 30px;
        text-align: center;
    }

    .cred-img-wrap img {
        width: 100%;
        display: block;
    }

    .stats-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: var(--space-6);
    }

    .stat-card {
        text-align: center;
        padding: var(--space-6);
        background: var(--p2p-card);
        border: 1px solid var(--p2p-border);
        border-radius: var(--radius-lg);
    }

    .stat-card .stat-num {
        font-family: var(--font-heading);
        font-size: var(--text-4xl);
        color: var(--p2p-gold);
    }

    .stat-card .stat-label {
        font-size: var(--text-sm);
        color: #4A5B54;
        margin-top: var(--space-2);
    }

    /* Target */
    .target-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-4);
    }

    .target-card {
        background: var(--p2p-card);
        border: 1px solid var(--p2p-border);
        border-radius: var(--radius-lg);
        padding: var(--space-6);
        border-left: 4px solid #005B45;
        transition: all 0.25s ease;
        text-align: left;
    }

    .target-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        border-left-color: var(--p2p-gold);
    }

    .target-num {
        font-family: var(--font-heading);
        font-size: var(--text-3xl);
        color: #005B45;
        opacity: 0.4;
        line-height: 1;
        margin-bottom: var(--space-2);
    }

    .target-card p {
        font-size: var(--text-sm);
        margin: 0;
        line-height: 1.6;
    }

    .target-card strong {
        color: #005B45;
    }

    /* Benefits */
    .benefit-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-4);
    }

    .benefit-card {
        background: var(--p2p-card);
        border: 1px solid var(--p2p-border);
        border-radius: var(--radius-lg);
        padding: var(--space-6);
        text-align: left;
    }

    .benefit-icon {
        font-size: 2rem;
        margin-bottom: var(--space-3);
    }

    .benefit-card h3 {
        font-size: var(--text-base);
        color: #005B45;
        margin-bottom: var(--space-2);
        font-family: var(--font-body);
        font-weight: 700;
    }

    .benefit-card p {
        font-size: var(--text-sm);
        margin: 0;
    }

    /* Modules */
    .modules-list {
        display: flex;
        flex-direction: column;
        gap: var(--space-4);
    }

    .module-card {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: var(--space-6);
        align-items: start;
        background: var(--p2p-card);
        border: 1px solid var(--p2p-border);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        text-align: left;
    }

    .module-label {
        background: #005B45;
        color: #fff;
        font-family: var(--font-heading);
        font-size: var(--text-sm);
        font-weight: 700;
        padding: var(--space-2) var(--space-4);
        border-radius: var(--radius-md);
        text-align: center;
        white-space: nowrap;
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        letter-spacing: 0.05em;
    }

    .module-card h3 {
        font-size: var(--text-xl);
        color: #005B45;
        margin-bottom: var(--space-3);
        font-family: var(--font-heading);
    }

    .module-card p {
        font-size: var(--text-sm);
        margin: 0;
        line-height: 1.6;
    }

    /* Testimonials */
    .testi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-6);
        margin-bottom: var(--space-10);
    }

    .testi-card {
        background: var(--p2p-card);
        border: 1px solid var(--p2p-border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        padding: var(--space-6);
        gap: var(--space-4);
        transition: all 0.35s ease;
        text-align: left;
    }

    .testi-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        display: block;
    }

    .testi-img-wrap {
        width: 100%;
        aspect-ratio: 4/5;
        overflow: hidden;
        border-radius: var(--radius-md);
        margin-bottom: 0;
    }

    .testi-body {
        padding: 0;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: var(--space-2);
    }

    .testi-name {
        font-family: var(--font-heading);
        font-size: var(--text-lg);
        color: #005B45;
        margin-bottom: 0;
    }

    .testi-location {
        font-size: var(--text-xs);
        color: #4A5B54;
        margin-bottom: var(--space-3);
    }

    .testi-quote {
        font-size: var(--text-sm);
        font-style: italic;
        color: #071A15;
        margin: 0;
        line-height: 1.6;
    }

    /* Instructor */
    .instructor-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-12);
        align-items: center;
    }

    .instructor-img {
        border: 3px solid var(--p2p-gold);
        border-radius: var(--radius-lg);
        overflow: hidden;
        background: #FBF8F0;
    }

    .instructor-img img {
        width: 100%;
        display: block;
        border-radius: calc(var(--radius-lg) - 3px);
    }

    .instructor-name {
        font-size: clamp(var(--text-2xl), 3vw, var(--text-4xl));
        color: #005B45;
        margin-bottom: var(--space-1);
        text-align: left;
    }

    .instructor-title {
        color: #4A5B54;
        font-size: var(--text-sm);
        margin-bottom: var(--space-6);
        text-align: left;
    }

    .cred-list {
        display: flex;
        flex-direction: column;
        gap: var(--space-3);
        margin-top: var(--space-4);
    }

    .cred-item {
        display: flex;
        gap: var(--space-3);
        align-items: flex-start;
        background: #EAF2EC;
        border-radius: var(--radius-md);
        padding: var(--space-3) var(--space-4);
        text-align: left;
    }

    .cred-num {
        font-family: var(--font-heading);
        font-size: var(--text-xl);
        color: var(--p2p-gold);
        font-weight: 700;
        flex-shrink: 0;
        line-height: 1.2;
    }

    .cred-item p {
        font-size: var(--text-sm);
        margin: 0;
        color: #071A15;
        line-height: 1.5;
    }

    /* FAQ */
    .faq-list {
        display: flex;
        flex-direction: column;
        gap: var(--space-3);
    }

    .faq-item {
        background: var(--p2p-card);
        border: 1px solid var(--p2p-border);
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

    @media(max-width:1024px) {
        .target-grid, .benefit-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width:768px) {
        .hero-p2p {
            padding-top: var(--space-8);
        }
        .hero-p2p-container, .instructor-layout {
            grid-template-columns: 1fr;
            text-align: center;
        }
        .hero-p2p-img {
            order: -1;
        }
        .hero-p2p-img img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }
        .coach-label {
            display: none;
        }
        .meta-row {
            justify-content: center;
        }
        .stats-row, .testi-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .benefit-card, .target-card, .stat-card, .module-card {
            padding: var(--space-4);
        }
    }

    @media(max-width:600px) {
        .target-grid, .benefit-grid, .stats-row, .testi-grid {
            grid-template-columns: 1fr;
        }
        .module-card {
            grid-template-columns: 1fr;
        }
        .module-label {
            writing-mode: horizontal-tb;
            transform: none;
            width: fit-content;
        }
        .testi-card {
            align-items: center;
            text-align: center;
        }
        .testi-img-wrap {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            margin-inline: auto;
            aspect-ratio: 1/1;
            flex-shrink: 0;
            border: 2px solid var(--p2p-border);
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
<section class="hero-p2p">
    <div class="container hero-p2p-container">
        <div data-reveal style="text-align: left;">
            <span class="badge"><?php echo esc_html($badge); ?></span>
            <h1 class="hero-p2p-title"><?php echo wp_kses_post($title_line1); ?><br><span><?php echo esc_html($title_line2); ?></span></h1>
            <p class="hero-tagline"><?php echo esc_html($tagline); ?></p>
            <p style="color:#4A5B54; margin-bottom:var(--space-6); line-height:1.6; text-align: left;"><?php echo wp_kses_post($description); ?></p>
            
            <div class="meta-row">
                <div class="meta-item">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span><?php echo esc_html($time); ?></span>
                </div>
                <div class="meta-item">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span><?php echo esc_html($date); ?></span>
                </div>
            </div>

            <div>
                <span class="price-badge"><?php echo esc_html($price); ?></span>
                <span style="font-size:var(--text-sm); color:#4A5B54; margin-left:var(--space-2);">*Giới hạn <?php echo esc_html($slots); ?> học viên để bảo đảm chất lượng tương tác</span>
            </div>

            <!-- Countdown Timer -->
            <div class="countdown-wrap" style="margin-block: var(--space-6); text-align: left;">
                <span style="font-size:var(--text-xs); color:#4A5B54; text-transform:uppercase; letter-spacing:0.1em; display:block; margin-bottom:var(--space-2);">Thời gian nhận ưu đãi EARLYBIRD còn:</span>
                <div class="countdown-timer" data-target="<?php echo esc_attr($countdown_target); ?>" style="display:flex; gap:12px;">
                    <div style="background:#fff; border:1px solid var(--p2p-border); padding:8px 12px; border-radius:4px; text-align:center; min-width:50px;">
                        <span class="days" style="font-size:var(--text-xl); font-weight:700; color:#005B45; display:block;">00</span>
                        <span style="font-size:0.65rem; color:#4A5B54; text-transform:uppercase;">Ngày</span>
                    </div>
                    <div style="background:#fff; border:1px solid var(--p2p-border); padding:8px 12px; border-radius:4px; text-align:center; min-width:50px;">
                        <span class="hours" style="font-size:var(--text-xl); font-weight:700; color:#005B45; display:block;">00</span>
                        <span style="font-size:0.65rem; color:#4A5B54; text-transform:uppercase;">Giờ</span>
                    </div>
                    <div style="background:#fff; border:1px solid var(--p2p-border); padding:8px 12px; border-radius:4px; text-align:center; min-width:50px;">
                        <span class="minutes" style="font-size:var(--text-xl); font-weight:700; color:#005B45; display:block;">00</span>
                        <span style="font-size:0.65rem; color:#4A5B54; text-transform:uppercase;">Phút</span>
                    </div>
                    <div style="background:#fff; border:1px solid var(--p2p-border); padding:8px 12px; border-radius:4px; text-align:center; min-width:50px;">
                        <span class="seconds" style="font-size:var(--text-xl); font-weight:700; color:#005B45; display:block;">00</span>
                        <span style="font-size:0.65rem; color:#4A5B54; text-transform:uppercase;">Giây</span>
                    </div>
                </div>
            </div>

            <div style="margin-top:var(--space-6);">
                <a href="#register" class="btn-p2p-cta"><?php echo esc_html($cta_label); ?></a>
                <p class="scholarship-note"><?php echo wp_kses_post($scholarship_note); ?></p>
            </div>
        </div>
        <div class="hero-p2p-img" data-reveal>
            <?php if ($hero_image) : ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr($coach_label); ?>" loading="lazy" />
            <?php endif; ?>
            <span class="coach-label"><?php echo esc_html($coach_label); ?></span>
        </div>
    </div>
</section>

<!-- SECTION 2: CREDIBILITY -->
<section class="p2p-section alt">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Người đồng hành thực chiến</span>
            <h2 style="margin-top:1rem;"><?php echo esc_html($cred_title); ?></h2>
            <div class="divider" style="margin-inline:auto;"></div>
        </div>
        
        <?php if ($cred_image) : ?>
            <div class="cred-img-wrap" data-reveal>
                <img src="<?php echo esc_url($cred_image); ?>" alt="<?php echo esc_attr($cred_title); ?>" loading="lazy" />
            </div>
        <?php endif; ?>

        <div class="stats-row" data-reveal>
            <?php foreach ($stats as $stat) : ?>
                <div class="stat-card">
                    <span class="stat-num"><?php echo esc_html($stat['stat_num']); ?></span>
                    <p class="stat-label"><?php echo esc_html($stat['stat_label']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 3: TARGET AUDIENCE -->
<section class="p2p-section">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Dành cho ai</span>
            <h2 style="margin-top:1rem;"><?php echo esc_html($target_title); ?></h2>
            <div class="divider" style="margin-inline:auto;"></div>
        </div>
        
        <div class="target-grid">
            <?php foreach ($targets as $target) : 
                $t_num = isset($target['target_number']) ? $target['target_number'] : '01';
                $t_text = isset($target['target_text']) ? $target['target_text'] : '';
                ?>
                <div class="target-card" data-reveal>
                    <div class="target-num"><?php echo esc_html($t_num); ?></div>
                    <p><?php echo wp_kses_post($t_text); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 4: BENEFITS -->
<section class="p2p-section alt">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Giá trị nhận được</span>
            <h2 style="margin-top:1rem;"><?php echo esc_html($benefits_title); ?></h2>
            <div class="divider" style="margin-inline:auto;"></div>
        </div>
        
        <div class="benefit-grid">
            <?php foreach ($benefits as $benefit) : 
                $b_icon = isset($benefit['benefit_icon']) ? $benefit['benefit_icon'] : '💡';
                $b_title = isset($benefit['benefit_title']) ? $benefit['benefit_title'] : '';
                $b_desc = isset($benefit['benefit_description']) ? $benefit['benefit_description'] : '';
                ?>
                <div class="benefit-card" data-reveal>
                    <div class="benefit-icon"><?php echo esc_html($b_icon); ?></div>
                    <h3><?php echo esc_html($b_title); ?></h3>
                    <p><?php echo esc_html($b_desc); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 5: MODULES -->
<section class="p2p-section">
    <div class="container">
        <div class="section-header" style="text-align: center;">
            <span class="badge">Nội dung chi tiết</span>
            <h2 style="margin-top:1rem;"><?php echo esc_html($modules_title); ?></h2>
            <div class="divider" style="margin-inline:auto;"></div>
        </div>
        
        <div class="modules-list">
            <?php foreach ($modules as $module) : 
                $m_lbl = isset($module['module_label']) ? $module['module_label'] : 'MODULE';
                $m_title = isset($module['module_title']) ? $module['module_title'] : '';
                $m_desc = isset($module['module_description']) ? $module['module_description'] : '';
                ?>
                <div class="module-card" data-reveal>
                    <div class="module-label"><?php echo esc_html($m_lbl); ?></div>
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
<section class="p2p-section alt">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Học viên nói gì</span>
            <h2 style="margin-top:1rem;">Học viên nói gì về PASSION TO PROFIT?</h2>
            <div class="divider" style="margin-inline:auto;"></div>
        </div>
        
        <?php
        // Query CPT filtered by term slug 'passion-to-profit' or 'p2p'
        $args = [
            'post_type'      => 'edina_testimonial',
            'posts_per_page' => 9,
        ];
        if (term_exists('passion-to-profit', 'program_cat')) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'program_cat',
                    'field'    => 'slug',
                    'terms'    => 'passion-to-profit',
                ]
            ];
        }
        $testi_query = new WP_Query($args);
        
        if ($testi_query->have_posts()) :
            $count = 0;
            while ($testi_query->have_posts()) : $testi_query->the_post();
                if ($count % 3 == 0) {
                    if ($count > 0) echo '</div>'; // close previous grid
                    echo '<div class="testi-grid">';
                }
                $t_role = get_post_meta(get_the_ID(), '_testimonial_role', true);
                $t_avatar = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                if (empty($t_avatar)) {
                    $t_avatar = get_template_directory_uri() . '/assets/dv1/t1-lyly.png';
                }
                ?>
                <div class="testi-card" data-reveal>
                    <div class="testi-img-wrap">
                        <img src="<?php echo esc_url($t_avatar); ?>" class="testi-img" alt="<?php the_title_attribute(); ?>" loading="lazy" />
                    </div>
                    <div class="testi-body">
                        <p class="testi-name"><?php the_title(); ?></p>
                        <p class="testi-location"><?php echo esc_html($t_role); ?></p>
                        <p class="testi-quote">"<?php echo wp_strip_all_tags(get_the_content()); ?>"</p>
                    </div>
                </div>
                <?php
                $count++;
            endwhile;
            echo '</div>'; // close last grid
            wp_reset_postdata();
        else :
            // Hardcoded fallback matching static HTML
            ?>
            <div class="testi-grid">
                <div class="testi-card" data-reveal>
                    <div class="testi-img-wrap"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/dv1/t1-lyly.png" class="testi-img" alt="Lyly" loading="lazy" /></div>
                    <div class="testi-body">
                        <p class="testi-name">Lyly</p>
                        <p class="testi-location">Hà Nội</p>
                        <p class="testi-quote">"Workshop của chị Trâm không chỉ truyền cảm hứng mà còn cho em công cụ thực tế để hành động. Giờ thì em biết mô hình nào phù hợp với vốn và năng lực của bản thân. Không còn mơ hồ như trước nữa."</p>
                    </div>
                </div>
                <div class="testi-card" data-reveal>
                    <div class="testi-img-wrap"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/dv1/t1-thuha.png" class="testi-img" alt="Thu Hà" loading="lazy" /></div>
                    <div class="testi-body">
                        <p class="testi-name">Thu Hà</p>
                        <p class="testi-location">Hà Nội</p>
                        <p class="testi-quote">"Trước giờ em cứ nghĩ phải hoàn hảo rồi mới bắt đầu. Nhưng workshop này cho em thấy bắt đầu từ niềm tin và kế hoạch rõ ràng là đủ."</p>
                    </div>
                </div>
                <div class="testi-card" data-reveal>
                    <div class="testi-img-wrap"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/dv1/t1-haohao.png" class="testi-img" alt="Hảo Hảo" loading="lazy" /></div>
                    <div class="testi-body">
                        <p class="testi-name">Hảo Hảo</p>
                        <p class="testi-location">Hà Nội</p>
                        <p class="testi-quote">"Em cảm ơn chị Trâm rất nhiều khi buổi workshop hôm nay thực sự truyền động lực cho em gia nhập vào lĩnh vực kinh doanh."</p>
                    </div>
                </div>
            </div>
            <?php
        endif;
        ?>
    </div>
</section>

<!-- SECTION 7: INSTRUCTOR -->
<section class="p2p-section">
    <div class="container">
        <div class="instructor-layout">
            <div class="instructor-img" data-reveal>
                <?php if ($instructor_image) : ?>
                    <img src="<?php echo esc_url($instructor_image); ?>" alt="<?php echo esc_attr($instructor_name); ?>" loading="lazy" />
                <?php endif; ?>
            </div>
            <div data-reveal style="text-align: left;">
                <span class="badge">Người hướng dẫn</span>
                <h2 class="instructor-name" style="margin-top:1rem;"><?php echo esc_html($instructor_name); ?></h2>
                <div class="instructor-title"><?php echo esc_html($instructor_title); ?></div>
                
                <div class="cred-list">
                    <?php foreach ($credentials as $cred) : 
                        $c_num = isset($cred['cred_number']) ? $cred['cred_number'] : '01';
                        $c_text = isset($cred['cred_text']) ? $cred['cred_text'] : '';
                        ?>
                        <div class="cred-item">
                            <span class="cred-num"><?php echo esc_html($c_num); ?></span>
                            <p><?php echo wp_kses_post($c_text); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 8: FAQ -->
<section class="p2p-section alt">
    <div class="container" style="text-align: center;">
        <div class="section-header">
            <span class="badge">Giải đáp thắc mắc</span>
            <h2 style="margin-top:1rem;">Câu hỏi thường gặp</h2>
            <div class="divider" style="margin-inline:auto;"></div>
        </div>
        
        <div class="faq-list" style="max-width: 800px; margin-inline: auto;">
            <?php
            // Query FAQ CPT filtered by term slug 'passion-to-profit'
            $faq_args = [
                'post_type'      => 'edina_faq',
                'posts_per_page' => 10,
            ];
            if (term_exists('passion-to-profit', 'program_cat')) {
                $faq_args['tax_query'] = [
                    [
                        'taxonomy' => 'program_cat',
                        'field'    => 'slug',
                        'terms'    => 'passion-to-profit',
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
                    <div class="faq-q">Tôi chưa có ý tưởng kinh doanh cụ thể, có tham gia được không?</div>
                    <div class="faq-a" style="max-height: 500px; padding-bottom: var(--space-4);">
                        <p>Hoàn toàn được. Workshop được thiết kế để giúp bạn khai phá điểm mạnh của bản thân và tìm kiếm ý tưởng kinh doanh từ chính năng lực cốt lõi. Bạn sẽ học cách phác thảo ý tưởng thành mô hình thực tế trong 2 ngày học.</p>
                    </div>
                </div>
                <div class="faq-item" data-reveal>
                    <div class="faq-q">Thời gian học cụ thể như thế nào? Tôi bận có thể xem lại ghi hình không?</div>
                    <div class="faq-a">
                        <p>Học trực tiếp qua Zoom trong 2 ngày thứ Bảy & Chủ Nhật, từ 9:00 - 17:00 (nghỉ trưa 1.5 tiếng). Bạn sẽ nhận được ghi hình (recording) xem lại trong vòng 30 ngày cùng toàn bộ slide và tài liệu biểu mẫu đi kèm.</p>
                    </div>
                </div>
                <div class="faq-item" data-reveal>
                    <div class="faq-q">Tôi học xong có được hỗ trợ gì thêm không?</div>
                    <div class="faq-a">
                        <p>Có, bạn sẽ được tham gia group chat kín của lớp để hỏi đáp trực tiếp cùng Coach và các học viên khác trong vòng 30 ngày sau khóa học nhằm theo sát tiến trình áp dụng vào thực tế.</p>
                    </div>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<!-- SECTION 9: FINAL CTA & REGISTER -->
<section id="register" class="p2p-section" style="padding-block: var(--space-24);">
    <div class="container" style="text-align: center; max-width:800px;">
        <div class="cta-quote" style="font-family: var(--font-heading); font-size: clamp(1.5rem, 3vw, 2.25rem); color: #005B45; font-style: italic; margin-bottom: var(--space-8); line-height: 1.4;">
            <?php echo wp_kses_post($cta_quote); ?>
        </div>
        
        <div data-reveal>
            <h2 style="font-size: clamp(2rem, 4vw, 3rem); font-family: var(--font-heading); color: #071A15; margin-bottom: var(--space-8);">
                <?php echo esc_html($cta_final_label); ?>
            </h2>
            
            <a href="https://zalo.me/0909000000" target="_blank" rel="noopener" class="btn-p2p-cta" style="background:#C8A244; color:#fff; border-radius: var(--radius-full);">
                Nhận tư vấn lộ trình & Đăng ký qua Zalo
            </a>
            
            <p style="font-size:var(--text-sm); color:#4A5B54; margin-top:var(--space-4);">
                Hoặc liên hệ hotline: <strong>0909.000.000</strong> để gặp hỗ trợ viên.
            </p>
        </div>
    </div>
</section>

<script>
    // Simple FAQ Accordion Logic for Service 1
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
