<?php
/**
 * Template Name: Homepage Template
 * The template for displaying the front page.
 */

get_header();

// Hero Section Fields
$hero_eyebrow = edt_field('hero_eyebrow', null, 'Professional Coach, ICF PCC');
$hero_title = edt_field('hero_title', null, 'Từ Đam mê đến Lợi nhuận,<br>Và Làm Chủ Nền Móng Tự Do.');
$hero_tagline = edt_field('hero_tagline', null, 'Đồng hành cùng các nhà lãnh đạo và chủ doanh nghiệp trên hành trình kiến tạo sự nghiệp bền vững và cuộc sống trọn vẹn.');
$hero_cta_primary_label = edt_field('hero_cta_primary_label', null, 'Khám phá dịch vụ');
$hero_cta_primary_url = edt_field('hero_cta_primary_url', null, '#services');
$hero_cta_secondary_label = edt_field('hero_cta_secondary_label', null, 'Tư vấn 1:1 miễn phí');
$hero_cta_secondary_url = edt_field('hero_cta_secondary_url', null, home_url('/lien-he/'));
$hero_image = edt_img_url('hero_image', null, get_template_directory_uri() . '/assets/dv3/hero-coach.png');

// Services Section Fields
$services_title = edt_field('services_title', null, 'Hệ Sinh Thái Dịch Vụ');
$services_subtitle = edt_field('services_subtitle', null, 'Lộ trình hoàn chỉnh được thiết kế để giải quyết chính xác bài toán của bạn ở từng giai đoạn phát triển doanh nghiệp và bản thân.');
$services = edt_field('edt_homepage_services', null, []);
if (empty($services)) {
    $services = [
        [
            'service_number' => '01',
            'service_name' => 'Passion to Profit',
            'service_description' => 'Dành cho người chuẩn bị khởi sự kinh doanh hoặc muốn thấu hiểu bản thân để định hình mô hình kinh doanh có lợi nhuận bền vững.',
            'service_color_class' => 'c-p2p',
            'service_url' => home_url('/passion-to-profit/')
        ],
        [
            'service_number' => '02',
            'service_name' => 'Business to Freedom',
            'service_description' => 'Dành cho các chủ doanh nghiệp muốn tự động hoá hệ thống vận hành để đạt được sự tự do đích thực.',
            'service_color_class' => 'c-b2f',
            'service_url' => home_url('/business-to-freedom/')
        ],
        [
            'service_number' => '03',
            'service_name' => 'Business Mastery',
            'service_description' => 'Chương trình khai vấn (Coaching) 1:1 cao cấp thiết kế riêng biệt, định hình chiến lược dài hạn cho doanh nghiệp.',
            'service_color_class' => 'c-bm',
            'service_url' => home_url('/business-mastery/')
        ],
    ];
}

// About Coach Section Fields
$about_image = edt_img_url('about_image', null, get_template_directory_uri() . '/assets/dv1/hero-coach.png');
$about_badge_text = edt_field('about_badge_image', null, 'ICF PCC Coach');
$about_name = edt_field('about_name', null, 'Edina Trâm');
$about_title = edt_field('about_title', null, 'Chuyên gia Khai vấn Chiến lược Doanh nghiệp & Cuộc sống');
$about_bio = edt_field('about_bio', null, 'Edina Trâm là Chuyên gia Khai vấn chuyên nghiệp đạt chứng chỉ quốc tế ICF PCC. Với nhiều năm kinh nghiệm điều hành doanh nghiệp và đồng hành cùng các nhà quản lý, cô giúp khách hàng khai phá tối đa tiềm năng, tối ưu hóa hệ thống vận hành và cân bằng cuộc sống tinh tế. Tác giả cuốn sách truyền cảm hứng <em style="color:var(--gold-accent)">Ánh Sáng Của Ước Mơ</em>.');
$badges = edt_field('edt_about_badges', null, []);
if (empty($badges)) {
    $badges = [
        ['badge_text' => 'Professional Coach'],
        ['badge_text' => 'ICF PCC'],
        ['badge_text' => 'Tác giả sách'],
        ['badge_text' => 'Chủ doanh nghiệp']
    ];
}
$stats = edt_field('edt_about_stats', null, []);
if (empty($stats)) {
    $stats = [
        ['stat_number' => '16+', 'stat_label' => 'Năm kinh nghiệm khai vấn'],
        ['stat_number' => '50+', 'stat_label' => 'Chủ doanh nghiệp đồng hành'],
        ['stat_number' => '1.000', 'stat_label' => 'Cuốn sách đã bán'],
        ['stat_number' => '3', 'stat_label' => 'Chương trình Coaching']
    ];
}

// Book Section Fields
$book_image = edt_img_url('book_image', null, get_template_directory_uri() . '/assets/book-mockup.png');
$book_eyebrow = edt_field('book_eyebrow', null, 'SÁCH CỦA COACH EDINA TRÂM');
$book_title = edt_field('book_title', null, 'Ánh Sáng Của Ước Mơ');
$book_description = edt_field('book_description', null, 'Cuốn sách truyền cảm hứng về hành trình chuyển hoá từ người đi làm thuê đến người làm chủ doanh nghiệp – ghi lại những vấp ngã, bài học và sức mạnh nội tâm giúp người trẻ bước vào con đường khởi nghiệp tự tin hơn.');
$book_highlight = edt_field('book_highlight', null, 'Đã truyền cảm hứng cho hơn <strong style="color:var(--gold-accent)">1.000 người trẻ</strong> trong hành trình khởi nghiệp và phát triển bản thân.');
$book_cta_buy_label = edt_field('book_cta_buy_label', null, 'Mua Sách Ngay');
$book_cta_buy_url = edt_field('book_cta_buy_url', null, '#');

// Testimonials Fields
$testimonials_title = edt_field('testimonials_title', null, 'Trải nghiệm chuyển hoá');

// Channels Fields
$channels = edt_field('edt_channels', null, []);
if (empty($channels)) {
    $channels = [
        [
            'channel_icon' => '📘',
            'channel_name' => 'Facebook',
            'channel_description' => 'Cộng đồng hỗ trợ & chia sẻ',
            'channel_url' => '#'
        ],
        [
            'channel_icon' => '📺',
            'channel_name' => 'YouTube',
            'channel_description' => 'Nhận định & hướng dẫn thực chiến',
            'channel_url' => '#'
        ],
        [
            'channel_icon' => '📧',
            'channel_name' => 'Newsletter',
            'channel_description' => 'Insight kinh doanh qua Substack',
            'channel_url' => '#'
        ],
        [
            'channel_icon' => '🍽️',
            'channel_name' => 'Edina Workspace',
            'channel_description' => 'Không gian làm việc & sáng tạo của Edina',
            'channel_url' => '#'
        ]
    ];
}
?>

<style>
    /* Inline styles required for the homepage context to match static file */
    :root {
        --c-dv1: #0B8A66; /* Fresh Emerald */
        --c-dv2: #C8A244; /* Royal Gold */
        --c-dv3: #014F3D; /* Emerald Depth */
        --home-bg: #FBF8F0; /* Pearl Ivory */
        --home-card: #FFFFFF;
        --home-border: #DED3B8; /* Pale Gold Sand */
        --gold-accent: #C8A244;
    }

    body { 
        background: var(--home-bg); 
        color: #071A15; /* Deep Forest Ink */
    }

    h1, h2, h3, h4 { color: #005B45; } /* Royal Emerald */

    site-header {
        display: block;
        height: 0;
    }

    .site-header { 
        background: rgba(251,248,240,0.95); /* Pearl Ivory translucent */
        backdrop-filter: blur(10px);
        border-bottom: 1px solid var(--home-border); 
        position: fixed; top: 0; width: 100%; z-index: 1000;
    }
    
    .nav-logo, .nav-logo span { color: #005B45; }
    .nav-logo span { color: var(--gold-accent); }
    .nav-links a { color: #071A15; }
    .nav-links a.active, .nav-links a:hover { color: #005B45; }

    .btn-gold {
        background: var(--gold-accent);
        color: #fff;
        padding: var(--space-3) var(--space-6);
        border-radius: var(--radius-full);
        font-weight: 600;
        display: inline-block;
        transition: all var(--transition);
        text-decoration: none;
    }
    .btn-gold:hover { background: #B38E33; transform: translateY(-2px); }

    .btn-outline {
        border: 1px solid var(--color-primary, #005B45);
        color: var(--color-primary, #005B45);
        padding: var(--space-3) var(--space-6);
        border-radius: var(--radius-full);
        font-weight: 600;
        display: inline-block;
        background: transparent;
        transition: all var(--transition);
        text-decoration: none;
    }
    .btn-outline:hover { background: rgba(0, 91, 69, 0.05); }

    .section-title { text-align: center; margin-bottom: var(--space-12); }
    .section-title h2 { font-size: clamp(2rem, 4vw, 3rem); font-family: var(--font-heading); color: #005B45; margin-bottom: var(--space-4); }
    .section-title p { color: #4A5B54; font-size: var(--text-lg); max-width: 600px; margin-inline: auto; }

    /* Helpers */
    .home-section { padding-block: var(--space-24) var(--space-20); overflow: hidden; }
    .home-section.alt { background: var(--color-bg-alt, #EAF2EC); }
    .home-divider { width: 60px; height: 3px; background: var(--gold-accent); margin-inline: auto; margin-block: var(--space-4); opacity: 0.8; }

    /* ── SECTION 1: HERO ── */
    .hero {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: var(--space-8);
        align-items: center;
        min-height: 90vh;
        padding-top: 100px; /* offset header */
    }
    .hero-content h1 { 
        font-family: var(--font-heading);
        font-size: clamp(2.5rem, 5vw, 4.5rem); 
        line-height: 1.1; 
        margin-bottom: var(--space-6); 
        background: linear-gradient(to right, #005B45, #C8A244);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .hero-tagline { font-size: var(--text-xl); color: #4A5B54; margin-bottom: var(--space-6); line-height: 1.6; }
    .hero-img-wrap { text-align: right; position: relative; }
    .hero-img { max-height: 700px; object-fit: contain; mask-image: linear-gradient(to bottom, black 80%, transparent 100%); -webkit-mask-image: linear-gradient(to bottom, black 80%, transparent 100%); }
    .hero-bg-blob {
        position: absolute; width: 400px; height: 400px; background: var(--gold-accent); 
        border-radius: 50%; filter: blur(100px); opacity: 0.15; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: -1;
    }

    /* ── SECTION 2: SERVICES ── */
    .service-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-6);
    }
    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: var(--space-12);
        align-items: center;
    }
    .about-img-wrap { position: relative; }
    .about-img {
        width: 100%; max-width: 420px;
        border-radius: var(--radius-lg);
        object-fit: cover;
        border: 1px solid var(--home-border);
    }
    .about-img-badge {
        position: absolute; bottom: 20px; left: -20px;
        background: var(--gold-accent); color: #fff;
        font-weight: 700; font-size: var(--text-sm);
        padding: var(--space-2) var(--space-4);
        border-radius: var(--radius-md);
        box-shadow: 0 8px 24px rgba(0,0,0,0.4);
    }
    .about-badge-row { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-bottom: var(--space-6); }
    .about-badge { background: rgba(200,162,68,0.1); border: 1px solid rgba(200,162,68,0.25); color: var(--gold-accent); padding: 4px 12px; border-radius: var(--radius-full); font-size: var(--text-sm); font-weight: 600; }
    .about-name { font-size: clamp(2rem,4vw,3rem); font-family: var(--font-heading); color: #005B45; margin-bottom: var(--space-2); }
    .about-title { color: var(--gold-accent); font-size: var(--text-lg); margin-bottom: var(--space-6); }
    .about-bio { color: #4A5B54; line-height: 1.8; margin-bottom: var(--space-8); }
    .stat-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-4); }
    .stat-card { background: var(--home-card); border: 1px solid var(--home-border); border-radius: var(--radius-md); padding: var(--space-4) var(--space-3); text-align: center; transition: border-color 0.3s; }
    .stat-card:hover { border-color: rgba(200,162,68,0.4); }
    .stat-num { font-family: var(--font-heading); font-size: var(--text-3xl); color: var(--gold-accent); font-weight: 700; line-height: 1; margin-bottom: 4px; }
    .stat-label { font-size: var(--text-xs); color: #4A5B54; text-transform: uppercase; letter-spacing: 0.05em; }
    @media(max-width:768px) {
        .about-grid { grid-template-columns: 1fr; }
        .about-img-wrap {
            display: flex;
            justify-content: center;
            width: fit-content;
            margin-inline: auto;
            margin-bottom: var(--space-8);
        }
        .about-img {
            max-width: 320px;
            margin-inline: auto;
        }
        .about-img-badge {
            left: -10px;
            bottom: 15px;
            font-size: var(--text-xs);
            padding: var(--space-1) var(--space-3);
        }
        .stat-grid { grid-template-columns: repeat(2, 1fr); gap: var(--space-6) var(--space-4); }
        .hero-content h1 { font-size: clamp(2rem, 8vw, 3rem); }
        .srv-num { font-size: 6rem; opacity: 0.05; }
        .book-section .btn-gold, .book-section .btn-outline { width: 100%; text-align: center; }
        .book-section div[style*="display:flex"] { flex-direction: column; }
    }
    .srv-card {
        background: var(--home-card);
        border: 1px solid var(--home-border);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        display: flex; flex-direction: column;
        transition: all var(--transition);
        position: relative; overflow: hidden;
        text-align: left;
    }
    .srv-card:hover { transform: translateY(-8px); border-color: rgba(0, 91, 69, 0.2); }
    .srv-num { font-family: var(--font-heading); font-size: 3rem; color: rgba(0, 91, 69, 0.05); position: absolute; top: 20px; right: 20px; line-height: 1; }
    .srv-card h3 { font-size: 1.75rem; margin-bottom: var(--space-2); margin-top: var(--space-8); }
    .srv-card p { flex-grow: 1; color: #4A5B54; margin-bottom: var(--space-6); }
    
    /* Service Themes */
    .srv-card.c-p2p { border-top: 4px solid var(--c-dv1); }
    .srv-card.c-p2p h3 { color: var(--c-dv1); }
    .srv-card.c-b2f { border-top: 4px solid var(--c-dv2); }
    .srv-card.c-b2f h3 { color: var(--c-dv2); }
    .srv-card.c-bm { border-top: 4px solid var(--c-dv3); }
    .srv-card.c-bm h3 { color: var(--c-dv3); }

    /* ── SECTION 3: BOOK ── */
    .book-section {
        background: linear-gradient(135deg, #012E24 0%, #071A15 100%);
        border-top: 1px solid var(--home-border);
        border-bottom: 1px solid var(--home-border);
        padding-block: var(--space-20);
    }
    .book-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-12);
        align-items: center;
    }
    .book-img-wrap { text-align: center; }

    /* ── SECTION 4: TESTIMONIALS ── */
    .testi-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-6); }
    .testi-card { background: var(--home-card); border: 1px solid var(--home-border); padding: var(--space-8); border-radius: var(--radius-lg); text-align: left; }
    .testi-card p { font-style: italic; color: #071A15; margin-bottom: var(--space-6); }
    .testi-author { display: flex; align-items: center; gap: var(--space-4); border-top: 1px solid var(--home-border); padding-top: var(--space-4); }
    .testi-avatar { width: 48px; height: 48px; border-radius: 50%; object-fit: cover; }
    .testi-author h4 { font-size: var(--text-base); margin: 0; color: var(--gold-accent); }
    .testi-author span { font-size: var(--text-sm); color: #4A5B54; }

    /* ── SECTION 5: CONTACT & ECOSYSTEM ── */
    .eco-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--space-6); }
    .eco-card {
        background: var(--home-card); border: 1px solid var(--home-border); border-radius: var(--radius-lg);
        padding: var(--space-8); text-align: center; transition: all var(--transition);
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        text-decoration: none;
    }
    .eco-card:hover { background: rgba(0, 91, 69, 0.03); transform: translateY(-4px); }
    .eco-icon { font-size: 2.5rem; margin-bottom: var(--space-4); color: var(--gold-accent); }

    @media (max-width: 992px) {
        .hero, .book-grid { grid-template-columns: 1fr; text-align: center; }
        .hero-img-wrap { text-align: center; }
        .hero-img { max-height: 500px; }
        .service-grid, .testi-grid { grid-template-columns: 1fr; }
    }
</style>

<!-- SECTION 1: HERO -->
<section class="home-section" style="padding-top:0;">
    <div class="container hero">
        <div class="hero-content" data-reveal>
            <span style="color:var(--gold-accent); font-weight:600; letter-spacing:2px; text-transform:uppercase; font-size:var(--text-sm)">
                <?php echo esc_html($hero_eyebrow); ?>
            </span>
            <h1><?php echo wp_kses_post($hero_title); ?></h1>
            <p class="hero-tagline"><?php echo esc_html($hero_tagline); ?></p>
            <div style="display:flex; gap:16px; flex-wrap:wrap; justify-content: var(--hero-justify, flex-start);">
                <?php if ($hero_cta_primary_label) : ?>
                    <a href="<?php echo esc_url($hero_cta_primary_url); ?>" class="btn-gold"><?php echo esc_html($hero_cta_primary_label); ?></a>
                <?php endif; ?>
                <?php if ($hero_cta_secondary_label) : ?>
                    <a href="<?php echo esc_url($hero_cta_secondary_url); ?>" class="btn-outline"><?php echo esc_html($hero_cta_secondary_label); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="hero-img-wrap" data-reveal>
            <div class="hero-bg-blob"></div>
            <?php if ($hero_image) : ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="hero-img" loading="lazy">
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- SECTION 2: SERVICES ECOSYSTEM -->
<section id="services" class="home-section alt">
    <div class="container">
        <div class="section-title" data-reveal>
            <h2><?php echo esc_html($services_title); ?></h2>
            <div class="home-divider"></div>
            <p><?php echo esc_html($services_subtitle); ?></p>
        </div>
        
        <div class="service-grid">
            <?php foreach ($services as $service) : 
                $s_num = isset($service['service_number']) ? $service['service_number'] : '01';
                $s_name = isset($service['service_name']) ? $service['service_name'] : '';
                $s_desc = isset($service['service_description']) ? $service['service_description'] : '';
                $s_color = isset($service['service_color_class']) ? $service['service_color_class'] : 'c-p2p';
                $s_url = isset($service['service_url']) ? $service['service_url'] : '#';
                ?>
                <div class="srv-card <?php echo esc_attr($s_color); ?>" data-reveal>
                    <div class="srv-num"><?php echo esc_html($s_num); ?></div>
                    <h3><?php echo esc_html($s_name); ?></h3>
                    <p><?php echo esc_html($s_desc); ?></p>
                    <a href="<?php echo esc_url($s_url); ?>" style="font-weight:600; text-decoration:none;">Tìm hiểu chi tiết →</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 3: ABOUT COACH -->
<section class="home-section">
    <div class="container">
        <div class="about-grid">
            <div class="about-img-wrap" data-reveal>
                <?php if ($about_image) : ?>
                    <img src="<?php echo esc_url($about_image); ?>" alt="<?php echo esc_attr($about_name); ?>" class="about-img" loading="lazy">
                <?php endif; ?>
                <?php if ($about_badge_text) : ?>
                    <span class="about-img-badge"><?php echo esc_html($about_badge_text); ?></span>
                <?php endif; ?>
            </div>
            <div data-reveal>
                <div class="about-badge-row">
                    <?php foreach ($badges as $badge) : ?>
                        <span class="about-badge"><?php echo esc_html($badge['badge_text'] ?? ''); ?></span>
                    <?php endforeach; ?>
                </div>
                <h2 class="about-name"><?php echo esc_html($about_name); ?></h2>
                <p class="about-title"><?php echo esc_html($about_title); ?></p>
                <div class="about-bio"><?php echo wp_kses_post($about_bio); ?></div>
                
                <div class="stat-grid">
                    <?php foreach ($stats as $stat) : ?>
                        <div class="stat-card">
                            <div class="stat-num"><?php echo esc_html($stat['stat_number'] ?? ''); ?></div>
                            <div class="stat-label"><?php echo esc_html($stat['stat_label'] ?? ''); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 4: BOOK -->
<section class="book-section">
    <div class="container book-grid">
        <div class="book-img-wrap" data-reveal>
            <?php if ($book_image) : ?>
                <img src="<?php echo esc_url($book_image); ?>" alt="<?php echo esc_attr($book_title); ?>" style="width:100%; max-width:320px; border-radius:var(--radius-md); box-shadow: 0 24px 60px rgba(0,0,0,0.5), 0 0 40px rgba(201,168,76,0.1); display:block; margin:auto;" loading="lazy">
            <?php endif; ?>
        </div>
        <div data-reveal style="text-align: left;">
            <span style="font-size:var(--text-sm); color:var(--gold-accent); font-weight:600; letter-spacing:2px; text-transform:uppercase; display:block;">
                <?php echo esc_html($book_eyebrow); ?>
            </span>
            <h2 style="font-size:clamp(1.75rem,3vw,2.5rem); margin:var(--space-2) 0 var(--space-4); color:#fff; font-family:var(--font-heading);">
                <?php echo esc_html($book_title); ?>
            </h2>
            <div style="font-size:var(--text-lg); line-height:1.6; color:#E2E8F0; margin-bottom:var(--space-4);">
                <?php echo wp_kses_post($book_description); ?>
            </div>
            <div style="color:#E2E8F0; margin-bottom:var(--space-6);">
                <?php echo wp_kses_post($book_highlight); ?>
            </div>
            <div style="display:flex; gap:16px; flex-wrap:wrap;">
                <?php if ($book_cta_buy_label) : ?>
                    <a href="<?php echo esc_url($book_cta_buy_url); ?>" class="btn-gold"><?php echo esc_html($book_cta_buy_label); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 5: TESTIMONIALS -->
<section class="home-section alt">
    <div class="container">
        <div class="section-title" data-reveal>
            <h2><?php echo esc_html($testimonials_title); ?></h2>
            <div class="home-divider"></div>
            <p>Lắng nghe những học viên đã xây dựng thành công bộ quy trình chuyên nghiệp cho doanh nghiệp của họ.</p>
        </div>
        
        <div class="testi-grid">
            <?php
            // Query CPT
            $args = [
                'post_type'      => 'edina_testimonial',
                'posts_per_page' => 3,
            ];
            // Filter by taxonomy 'homepage' if exist
            if (term_exists('homepage', 'program_cat')) {
                $args['tax_query'] = [
                    [
                        'taxonomy' => 'program_cat',
                        'field'    => 'slug',
                        'terms'    => 'homepage',
                    ]
                ];
            }
            $testi_query = new WP_Query($args);
            
            if ($testi_query->have_posts()) :
                while ($testi_query->have_posts()) : $testi_query->the_post();
                    $t_role = get_post_meta(get_the_ID(), '_testimonial_role', true);
                    $t_avatar = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                    if (empty($t_avatar)) {
                        $t_avatar = get_template_directory_uri() . '/assets/dv2/t1-caolan.png'; // dynamic fallback
                    }
                    ?>
                    <div class="testi-card" data-reveal>
                        <p>"<?php echo wp_strip_all_tags(get_the_content()); ?>"</p>
                        <div class="testi-author">
                            <img src="<?php echo esc_url($t_avatar); ?>" alt="<?php the_title_attribute(); ?>" class="testi-avatar" loading="lazy">
                            <div>
                                <h4><?php echo esc_html(get_the_title()); ?></h4>
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

<!-- SECTION 6: CONNECT CHANNELS -->
<section class="home-section">
    <div class="container">
        <div class="section-title" data-reveal>
            <h2>Kết nối đa kênh</h2>
            <div class="home-divider"></div>
            <p>Theo dõi và gia nhập cộng đồng chung đam mê khởi nghiệp và phát triển bản thân.</p>
        </div>
        
        <div class="eco-grid">
            <?php foreach ($channels as $channel) : 
                $c_icon = isset($channel['channel_icon']) ? $channel['channel_icon'] : '📘';
                $c_name = isset($channel['channel_name']) ? $channel['channel_name'] : '';
                $c_desc = isset($channel['channel_description']) ? $channel['channel_description'] : '';
                $c_url = isset($channel['channel_url']) ? $channel['channel_url'] : '#';
                ?>
                <a href="<?php echo esc_url($c_url); ?>" class="eco-card" data-reveal>
                    <div class="eco-icon"><?php echo esc_html($c_icon); ?></div>
                    <h3><?php echo esc_html($c_name); ?></h3>
                    <p style="color:#4A5B54; margin-top:var(--space-2); font-size:var(--text-sm);"><?php echo esc_html($c_desc); ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
get_footer();
