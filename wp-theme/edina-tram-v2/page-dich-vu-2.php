<?php
/**
 * Template Name: Dịch vụ 2 — TINA Awakening
 * Slug: dich-vu-2
 */
get_header();

/* ─── Field helpers ─── */
$f   = function ($key, $default = '') { return edt_field($key, null, $default); };
$img = function ($key, $size = 'large') { return edt_img_url($key, $size); };

/* ─── Social links (global) ─── */
$social_fb     = edt_option('social_facebook', 'https://www.facebook.com/edina.quynhtram');
$social_ig     = edt_option('social_instagram', '');
$social_web    = edt_option('social_website', 'https://edinatram.vn');
$contact_email = edt_option('contact_email', 'lequynhtram@gmail.com');
$coach_name    = edt_option('coach_name', 'Edina Trâm');
$coach_title   = edt_option('coach_title', 'Tham vấn Tâm lý · Khai vấn cuộc sống · Tài chính · Tâm linh');
?>

<style>
  :root {
    --page-accent: #005B45;
    --page-accent-rgb: 0, 91, 69;
  }

  body { padding-bottom: 80px; }

  .tina-hero-card {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: var(--space-3);
    max-width: 560px;
    margin-bottom: var(--space-6);
  }

  .tina-hero-stat {
    background: var(--color-bg-alt);
    border: 1px solid var(--color-border-light);
    border-radius: var(--radius-md);
    padding: var(--space-4);
  }

  .tina-hero-stat span {
    display: block;
    font-size: var(--text-xs);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--color-fg-muted);
    margin-bottom: var(--space-1);
  }

  .tina-hero-stat strong {
    display: block;
    font-size: var(--text-sm);
    color: var(--color-fg);
    line-height: 1.45;
  }

  .tina-visual {
    background: #fff;
    border: 1px solid var(--color-border-light);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    box-shadow: var(--shadow-lg);
  }

  .tina-visual img {
    width: 100%;
    max-height: 540px;
    object-fit: contain;
    mask-image: none;
    -webkit-mask-image: none;
  }

  .tina-quote {
    border-left: 4px solid var(--royal-gold);
    background: rgba(200, 162, 68, 0.08);
    border-radius: 0 var(--radius-md) var(--radius-md) 0;
    padding: var(--space-5) var(--space-6);
    margin-block: var(--space-6);
  }

  .tina-quote p {
    color: var(--color-fg);
    font-family: var(--font-heading);
    font-size: var(--text-xl);
    font-style: italic;
    line-height: 1.55;
    margin: 0;
  }

  .tina-copy {
    max-width: 820px;
    margin-inline: auto;
  }

  .tina-copy p + p { margin-top: var(--space-4); }

  .pain-num {
    color: rgba(var(--page-accent-rgb), 0.18);
    font-weight: 600;
  }

  .tina-sign-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: var(--space-4);
  }

  .tina-sign-card {
    background: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    text-align: left;
  }

  .tina-sign-card h3 {
    font-family: var(--font-body);
    font-size: var(--text-base);
    font-weight: 700;
    color: var(--page-accent);
    margin-bottom: var(--space-2);
  }

  .tina-sign-card p {
    font-size: var(--text-sm);
    line-height: 1.7;
  }

  .tina-profile-list {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: var(--space-3);
    margin-top: var(--space-6);
  }

  .tina-profile-list li {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: var(--radius-md);
    padding: var(--space-4);
    color: rgba(255,255,255,0.86);
    font-size: var(--text-sm);
    line-height: 1.6;
  }

  .tina-stage {
    background: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    padding: var(--space-8);
    margin-bottom: var(--space-6);
    text-align: left;
  }

  .tina-stage-title {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-3);
    align-items: center;
    margin-bottom: var(--space-5);
  }

  .tina-stage-title span {
    color: var(--royal-gold);
    font-size: var(--text-xs);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-weight: 700;
  }

  .tina-stage-title h3 {
    font-family: var(--font-body);
    color: var(--page-accent);
    font-size: var(--text-lg);
    font-weight: 700;
    margin: 0;
  }

  .tina-module-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: var(--space-4);
  }

  .tina-module {
    border-left: 3px solid var(--royal-gold);
    padding-left: var(--space-4);
  }

  .tina-module strong {
    display: block;
    color: var(--color-fg);
    margin-bottom: var(--space-1);
    font-size: var(--text-sm);
  }

  .tina-module p {
    font-size: var(--text-sm);
    line-height: 1.65;
  }

  .offer-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: var(--space-6);
    align-items: stretch;
    margin-top: var(--space-8);
  }

  .offer-card {
    background: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    padding: var(--space-8);
    text-align: left;
    border-top: 4px solid var(--page-accent);
  }

  .offer-card--featured {
    border-top-color: var(--royal-gold);
    box-shadow: var(--shadow-gold);
  }

  .offer-label {
    color: var(--royal-gold);
    font-size: var(--text-xs);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-weight: 700;
    margin-bottom: var(--space-3);
  }

  .offer-card h3 {
    font-family: var(--font-body);
    font-size: var(--text-lg);
    font-weight: 700;
    color: var(--page-accent);
    margin-bottom: var(--space-3);
  }

  .offer-card p {
    font-size: var(--text-sm);
    line-height: 1.7;
  }

  .value-num {
    color: rgba(var(--page-accent-rgb), 0.12);
    z-index: 0;
    pointer-events: none;
  }

  .value-card h3,
  .value-card p {
    position: relative;
    z-index: 1;
  }

  .contact-line {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-4);
    justify-content: center;
    margin-top: var(--space-6);
    color: rgba(255,255,255,0.72);
    font-size: var(--text-sm);
  }

  @media (max-width: 992px) {
    .tina-hero-card,
    .tina-sign-grid,
    .tina-profile-list,
    .tina-module-grid,
    .offer-grid {
      grid-template-columns: 1fr;
    }

    .tina-hero-card { margin-inline: auto; }
    .tina-visual { max-width: 520px; margin-inline: auto; }
  }

  @media (max-width: 600px) {
    .tina-hero-stat,
    .tina-sign-card,
    .offer-card,
    .tina-stage {
      padding: var(--space-5);
    }
  }
</style>


  <!-- ═══ STICKY CTA BAR ═══ -->
  <div class="sticky-cta" role="banner" aria-label="Đăng ký nhanh">
    <div class="sticky-cta-dot"></div>
    <div class="sticky-cta-info">
      <span class="sticky-cta-title"><?php echo esc_html($f('dv2_sticky_title', 'TINA Awakening - 90 ngày chuyển hoá')); ?></span>
      <span class="sticky-cta-meta"><?php echo esc_html($f('dv2_sticky_meta', 'Coaching & Mentoring 1:1 · 12 module')); ?></span>
    </div>
    <a href="<?php echo esc_url($f('dv2_sticky_cta_url', site_url('/lien-he'))); ?>" class="btn btn--accent"><?php echo esc_html($f('dv2_sticky_cta_label', 'Đặt Lịch Kết Nối')); ?></a>
  </div>

  <main>

    <!-- Decorative glow blobs -->
    <div class="glow-blob glow-blob--gold glow-blob--1" aria-hidden="true"></div>
    <div class="glow-blob glow-blob--emerald glow-blob--2" aria-hidden="true"></div>


    <!-- ═══ S1: HERO ═══ -->
    <section class="srv-hero" aria-label="Giới thiệu chương trình TINA Awakening">
      <div class="container srv-hero-grid">
        <div class="srv-hero-content" data-reveal>
          <span class="badge" style="margin-bottom: var(--space-4); display: inline-block;"><?php echo esc_html($f('dv2_hero_badge', 'COACHING & MENTORING 1:1')); ?></span>
          <h1><?php echo wp_kses_post($f('dv2_hero_title', '90 NGÀY<br>CHUYỂN HOÁ<br><span>TINA AWAKENING</span>')); ?></h1>
          <p class="srv-hero-tagline"><?php echo esc_html($f('dv2_hero_tagline', 'T.I.N.A - Transformation Into New Awareness')); ?></p>
          <p class="srv-hero-desc"><?php echo esc_html($f('dv2_hero_desc', 'Một hành trình 12 module dành cho những ai đang đi tìm một hướng đi mới cho cuộc đời mình: rõ hơn, vững hơn, và kết nối sâu hơn với chính bản thân.')); ?></p>

          <div class="tina-hero-card">
            <div class="tina-hero-stat">
              <span><?php echo esc_html($f('dv2_hero_stat1_label', 'Thời lượng')); ?></span>
              <strong><?php echo esc_html($f('dv2_hero_stat1_value', '90 ngày đồng hành')); ?></strong>
            </div>
            <div class="tina-hero-stat">
              <span><?php echo esc_html($f('dv2_hero_stat2_label', 'Lộ trình')); ?></span>
              <strong><?php echo esc_html($f('dv2_hero_stat2_value', '12 module 1:1')); ?></strong>
            </div>
            <div class="tina-hero-stat">
              <span><?php echo esc_html($f('dv2_hero_stat3_label', 'Trụ cột')); ?></span>
              <strong><?php echo esc_html($f('dv2_hero_stat3_value', 'Clarity · Confidence · Connection')); ?></strong>
            </div>
          </div>

          <a href="<?php echo esc_url($f('dv2_hero_cta_url', site_url('/lien-he'))); ?>" class="btn btn--primary btn--lg"><?php echo esc_html($f('dv2_hero_cta_label', 'Bắt đầu phiên kết nối')); ?></a>
        </div>
        <div class="srv-hero-img" data-reveal="right">
          <div class="tina-visual">
            <?php $hero_image = $img('dv2_hero_image'); ?>
            <?php if ($hero_image) : ?>
              <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr('Tam giác chuyển hoá 3C TINA Awakening'); ?>" loading="eager" fetchpriority="high">
            <?php else : ?>
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/tina-visual-triangle.png'); ?>" alt="Tam giác chuyển hoá 3C TINA Awakening" loading="eager" fetchpriority="high">
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>


    <!-- ═══ S2: OPEN LETTER ═══ -->
    <section class="srv-section--alt" aria-label="Thư ngỏ từ Edina Trâm">
      <div class="container container--narrow">
        <div class="section-header" data-reveal>
          <span class="badge"><?php echo esc_html($f('dv2_letter_badge', 'Thư ngỏ')); ?></span>
          <h2 style="margin-top: var(--space-4);"><?php echo esc_html($f('dv2_letter_title', 'Cảm ơn bạn đã có mặt ở đây')); ?></h2>
          <div class="divider"></div>
        </div>
        <div class="tina-copy" data-reveal>
          <?php echo wp_kses_post($f('dv2_letter_content', '<p>Tôi không biết điều gì đã đưa bạn đến trang này - một đêm trằn trọc, một câu hỏi chưa có lời đáp, hay một khao khát thay đổi mà bạn còn chưa gọi thành tên. Nhưng tôi tin chắc một điều: bạn đang tìm kiếm điều gì đó lớn hơn hiện tại của mình. Một sự chuyển mình thật sự.</p>
<p>Và nếu bạn đã đọc đến đây, tôi tin bạn không chỉ muốn "dễ chịu hơn một chút". Bạn muốn kiến tạo một cuộc sống mới.</p>
<div class="tina-quote"><p>Không có gì là ngẫu nhiên. Việc bạn dừng lại ở đây, đọc đến tận dòng này, đã là một nhân duyên đẹp.</p></div>
<p>Trâm xin được đón bạn bằng tất cả sự trân trọng. Tôi từng đứng đúng nơi bạn đang đứng, mang đúng những trăn trở bạn mang lúc này. Nên tôi hiểu - và tôi biết ơn vì bạn đã cho chúng ta cơ hội được kết nối.</p>
<p>Điều tôi mong mỏi là được trao lại phước lành mà chính Trâm đã may mắn nhận được trên hành trình của mình: sự hàn gắn và sáng tỏ cho những ai đang đi trong bóng tối mà vẫn khát khao một tia sáng ở cuối đường hầm.</p>')); ?>
        </div>
      </div>
    </section>


    <!-- ═══ S3: WHY THIS JOURNEY ═══ -->
    <section class="srv-section" aria-label="Lý do tạo ra hành trình TINA">
      <div class="container">
        <div class="section-header" data-reveal>
          <span class="badge"><?php echo esc_html($f('dv2_what_badge', 'Vì sao hành trình này ra đời?')); ?></span>
          <h2 style="margin-top: var(--space-4);"><?php echo esc_html($f('dv2_what_title', 'Khi bế tắc cũ cứ quay lại')); ?></h2>
          <div class="divider"></div>
          <p><?php echo esc_html($f('dv2_what_desc', 'Trước khi đọc tiếp, hãy dừng lại một nhịp và tự hỏi: vì sao mình cứ quay lại đúng chỗ bế tắc cũ dù đã cố gắng, đã trị liệu, đã chữa lành, đã đọc bao nhiêu sách?')); ?></p>
        </div>
        <div class="pain-grid" data-reveal-stagger>
          <?php
          $what_defaults = [
            ['Thành công nhưng mất kết nối', 'Từ một người thành công theo chuẩn mực xã hội, Trâm đã đi qua hai lần phá sản, một cuộc hôn nhân đổ vỡ và ba năm suy sụp cả thể chất lẫn tinh thần.'],
            ['Làm lại từ con số không', 'Ở đáy sâu ấy, một sự thức tỉnh bắt đầu. Trâm từng bước dựng lại đời sống tài chính, sống Đời và Đạo song hành, rồi biến trải nghiệm ấy thành sứ mệnh phụng sự.'],
            ['Không tự mò mẫm mãi', 'Trâm học cách đứng trên vai người khổng lồ: đầu tư đúng vào người thầy, người khai vấn, người dẫn dắt để vực dậy nhanh hơn và tránh tổn hao nhiều công sức.'],
            ['Trở thành người đồng hành', 'TINA Awakening ra đời để trở thành người đồng hành mà chính Trâm từng ao ước có được trong những ngày tăm tối nhất.'],
          ];
          for ($i = 1; $i <= 4; $i++) :
            $what_title = $f("dv2_what{$i}_title", $what_defaults[$i - 1][0]);
            $what_desc  = $f("dv2_what{$i}_desc",  $what_defaults[$i - 1][1]);
          ?>
          <div class="pain-card" data-reveal>
            <div class="pain-num"><?php echo esc_html(str_pad($i, 2, '0', STR_PAD_LEFT)); ?></div>
            <h3><?php echo esc_html($what_title); ?></h3>
            <p><?php echo esc_html($what_desc); ?></p>
          </div>
          <?php endfor; ?>
        </div>
        <div class="tina-quote" style="max-width: 860px; margin-inline: auto;">
          <p><?php echo esc_html($f('dv2_what_quote', 'Tôi không giỏi hơn bạn. Tôi chỉ vấp ngã trước bạn.')); ?></p>
        </div>
      </div>
    </section>


    <!-- ═══ S4: WHY CRISIS RETURNS ═══ -->
    <section class="srv-section--alt" aria-label="Vì sao khủng hoảng cứ quay lại">
      <div class="container">
        <div class="section-header" data-reveal>
          <span class="badge badge--gold"><?php echo esc_html($f('dv2_crisis_badge', 'Gốc rễ chuyển hoá')); ?></span>
          <h2 style="margin-top: var(--space-4);"><?php echo esc_html($f('dv2_crisis_title', 'Khủng hoảng quay lại không phải vì bạn yếu')); ?></h2>
          <div class="divider"></div>
          <p><?php echo esc_html($f('dv2_crisis_desc', 'Phần lớn giải pháp chỉ chữa phần ngọn: coaching ngắn hạn, trị liệu tách rời đời sống thật, chữa lành dừng ở cảm xúc. Nỗi đau quay lại vì nền tảng sống bên trong bạn chưa được tái cấu trúc.')); ?></p>
        </div>
        <div class="method-layout" data-reveal-stagger>
          <div class="method-col method-col--negative" data-reveal>
            <h3><?php echo esc_html($f('dv2_crisis_neg_title', 'Khi chỉ xử lý phần ngọn')); ?></h3>
            <ul class="method-list">
              <?php
              $neg_defaults = [
                'Bạn thấy nhẹ đi một thời gian, rồi mọi thứ lặng lẽ trở về như cũ.',
                'Bạn tự hỏi phải chăng mình chưa đủ cố gắng, chưa đủ kỷ luật, chưa đủ tốt.',
                'Bạn học thêm rất nhiều nhưng vẫn không thoát khỏi vòng lặp cũ.',
              ];
              for ($i = 1; $i <= 3; $i++) :
                $neg = $f("dv2_crisis_neg{$i}", $neg_defaults[$i - 1]);
              ?>
              <li>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#b32d2e" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                <span><?php echo esc_html($neg); ?></span>
              </li>
              <?php endfor; ?>
            </ul>
          </div>
          <div class="method-col method-col--positive" data-reveal>
            <h3><?php echo esc_html($f('dv2_crisis_pos_title', 'TINA làm việc ở tầng sâu hơn')); ?></h3>
            <ul class="method-list">
              <?php
              $pos_defaults = [
                'Nhận thức được khai mở để bạn thật sự thấy rõ mình đang sống từ đâu.',
                'Hành vi được làm mới bằng công cụ thực hành, không chỉ bằng cảm hứng.',
                'Nghiệp lực và nhân cách sống được soi chiếu để chuyển hoá bền vững cả Đời lẫn Đạo.',
              ];
              for ($i = 1; $i <= 3; $i++) :
                $pos = $f("dv2_crisis_pos{$i}", $pos_defaults[$i - 1]);
              ?>
              <li>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--page-accent)" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                <span><?php echo esc_html($pos); ?></span>
              </li>
              <?php endfor; ?>
            </ul>
          </div>
        </div>
      </div>
    </section>


    <!-- ═══ S5: TRUE TRANSFORMATION (6 signs) ═══ -->
    <section class="srv-section" aria-label="Sáu dấu hiệu chuyển hoá thật sự">
      <div class="container">
        <div class="section-header" data-reveal>
          <span class="badge"><?php echo esc_html($f('dv2_sign_badge', 'Chuyển hoá thật sự')); ?></span>
          <h2 style="margin-top: var(--space-4);"><?php echo esc_html($f('dv2_sign_title', '90 ngày này không phải một khoảnh khắc "à há"')); ?></h2>
          <div class="divider"></div>
          <p><?php echo esc_html($f('dv2_sign_desc', 'Một chuyển hoá thật cần thời gian để ngấm, để sống, để trở thành chính con người bạn. TINA được thiết kế quanh sáu dấu hiệu chuyển hoá này.')); ?></p>
        </div>
        <div class="tina-sign-grid" data-reveal-stagger>
          <?php
          $sign_defaults = [
            ['01 · Là một quá trình', 'Nó không xảy ra trong một buổi học truyền cảm hứng, mà cần thời gian để lắng xuống và trở thành nền tảng sống mới.'],
            ['02 · Đến từ tự nhận thức', 'Không ai thay đổi bạn từ bên ngoài. Vai trò của người đồng hành là giúp bạn nhìn rõ để chuyển hoá từ bên trong.'],
            ['03 · Diễn ra âm thầm', 'Những đổi thay quan trọng nhất thường không ồn ào, mà xảy ra ở nơi sâu kín chỉ bạn là người đầu tiên nhận ra.'],
            ['04 · Được kích hoạt an toàn', 'Chuyển hoá thường bắt đầu từ một cú chạm đủ sâu. Chương trình tạo ra những điểm chạm ấy trong một không gian nâng đỡ.'],
            ['05 · Đòi hỏi dám tổn thương', 'Bạn cần dám thành thật với chính mình về những điều khó chấp nhận nhất. Đó là cái giá, và cũng là cánh cửa.'],
            ['06 · Là tấm vé một chiều', 'Khi nền tảng tư duy đã khác, bạn không thể quay lại phiên bản cũ theo cách cũ nữa.'],
          ];
          for ($i = 1; $i <= 6; $i++) :
            $sign_title = $f("dv2_sign{$i}_title", $sign_defaults[$i - 1][0]);
            $sign_desc  = $f("dv2_sign{$i}_desc",  $sign_defaults[$i - 1][1]);
          ?>
          <div class="tina-sign-card" data-reveal>
            <h3><?php echo esc_html($sign_title); ?></h3>
            <p><?php echo esc_html($sign_desc); ?></p>
          </div>
          <?php endfor; ?>
        </div>
      </div>
    </section>


    <!-- ═══ S6: TARGET AUDIENCE ═══ -->
    <section class="srv-section--alt" aria-label="Chương trình dành cho ai">
      <div class="container">
        <div class="section-header" data-reveal>
          <span class="badge badge--gold"><?php echo esc_html($f('dv2_target_badge', 'Dành cho bạn')); ?></span>
          <h2 style="margin-top: var(--space-4);"><?php echo esc_html($f('dv2_target_title', 'TINA Awakening dành cho bạn nếu')); ?></h2>
          <div class="divider"></div>
        </div>
        <div class="target-grid" data-reveal-stagger>
          <?php
          $target_defaults = [
            ['ĐANG CHUYỂN MÌNH', 'Bạn đang mất phương hướng, mất kết nối, hoặc mất niềm tin vào chính mình trong một giai đoạn quan trọng của đời sống.'],
            ['ĐÃ THỬ NHIỀU CÁCH', 'Bạn từng coaching, trị liệu hoặc chữa lành, nhưng cảm giác bình an không bền và bạn cứ quay lại điểm cũ.'],
            ['SẴN SÀNG NHÌN SÂU', 'Bạn khao khát hiểu sâu chính mình và sẵn sàng nhìn thẳng vào những điều khó chấp nhận, thay vì tìm một viên thuốc thần kỳ.'],
          ];
          for ($i = 1; $i <= 3; $i++) :
            $tgt_title = $f("dv2_target{$i}_title", $target_defaults[$i - 1][0]);
            $tgt_desc  = $f("dv2_target{$i}_desc",  $target_defaults[$i - 1][1]);
          ?>
          <div class="target-card" data-reveal>
            <div class="target-num"><?php echo esc_html(str_pad($i, 2, '0', STR_PAD_LEFT)); ?></div>
            <h3 style="font-family: var(--font-body); font-size: var(--text-base); font-weight: 700; margin-bottom: var(--space-2);"><?php echo esc_html($tgt_title); ?></h3>
            <p><?php echo esc_html($tgt_desc); ?></p>
          </div>
          <?php endfor; ?>
        </div>
        <div class="tina-quote" style="max-width: 860px; margin-inline: auto;">
          <p><?php echo esc_html($f('dv2_target_caveat', 'Chương trình này chưa dành cho bạn nếu bạn đang tìm một con đường tắt, một lời trấn an nhanh, hoặc mong người khác thay đổi cuộc đời giùm mình.')); ?></p>
        </div>
      </div>
    </section>


    <!-- ═══ S7: BENEFITS / 3C ═══ -->
    <section class="srv-section" aria-label="Tam giác chuyển hoá 3C">
      <div class="container">
        <div class="section-header" data-reveal>
          <span class="badge"><?php echo esc_html($f('dv2_pillar_badge', 'Tam giác chuyển hoá 3C')); ?></span>
          <h2 style="margin-top: var(--space-4);"><?php echo esc_html($f('dv2_pillar_title', 'Ba trụ cột chữa lành ba nỗi đau cốt lõi')); ?></h2>
          <div class="divider"></div>
          <p><?php echo esc_html($f('dv2_pillar_desc', 'Toàn bộ hành trình được xây trên Clarity, Confidence và Connection - mỗi trụ cột nâng đỡ một tầng chuyển hoá của bạn.')); ?></p>
        </div>
        <div class="value-grid" data-reveal-stagger>
          <?php
          $pillar_defaults = [
            ['C', 'CLARITY - Sự thông suốt', 'Một lộ trình rõ ràng giúp chữa lành nỗi đau mất phương hướng, để bạn biết mình đang ở đâu và thật sự muốn đi đâu.'],
            ['C', 'CONFIDENCE - Tự tin làm chủ', 'Phục hồi năng lực ra quyết định và sự vững vàng nội tâm, chữa lành sự mất mát niềm tin vào chính mình.'],
            ['C', 'CONNECTION - Khơi dậy kết nối', 'Kết nối lại với bản thân và người thân, chữa lành sự thiếu hoà hợp trong những mối quan hệ quan trọng.'],
          ];
          for ($i = 1; $i <= 3; $i++) :
            $p_letter = $f("dv2_pillar{$i}_letter", $pillar_defaults[$i - 1][0]);
            $p_title  = $f("dv2_pillar{$i}_title",  $pillar_defaults[$i - 1][1]);
            $p_desc   = $f("dv2_pillar{$i}_desc",   $pillar_defaults[$i - 1][2]);
          ?>
          <div class="value-card" data-reveal>
            <div class="value-num"><?php echo esc_html($p_letter); ?></div>
            <h3 style="color: var(--page-accent);"><?php echo esc_html($p_title); ?></h3>
            <p><?php echo esc_html($p_desc); ?></p>
          </div>
          <?php endfor; ?>
        </div>
      </div>
    </section>


    <!-- ═══ S8: CURRICULUM – 12 MODULE JOURNEY ═══ -->
    <section class="srv-section--alt" aria-label="Lộ trình 12 module">
      <div class="container">
        <div class="section-header" data-reveal>
          <span class="badge badge--gold"><?php echo esc_html($f('dv2_mod_badge', 'Lộ trình 90 ngày')); ?></span>
          <h2 style="margin-top: var(--space-4);"><?php echo esc_html($f('dv2_mod_title', '12 module đi từ Quá khứ đến Hiện tại và Tương lai')); ?></h2>
          <div class="divider"></div>
          <p><?php echo esc_html($f('dv2_mod_desc', 'Hành trình bắt đầu bằng ổn định và yêu thương bản thân, rồi đi vào hiểu mình, phục hồi nội lực, hàn gắn quan hệ và phóng tầm nhìn cho tương lai.')); ?></p>
          <div class="focus-badge-row">
            <?php
            $focus_defaults = ['Clarity', 'Confidence', 'Connection', 'Integration'];
            for ($i = 1; $i <= 4; $i++) :
            ?>
            <span class="focus-badge"><?php echo esc_html($f("dv2_mod_focus{$i}", $focus_defaults[$i - 1])); ?></span>
            <?php endfor; ?>
          </div>
        </div>

        <!-- Stage 1: Clarity (Module 1-4) -->
        <div class="tina-stage" data-reveal>
          <div class="tina-stage-title">
            <span><?php echo esc_html($f('dv2_stage1_label', 'Giai đoạn 1 · Module 1-4')); ?></span>
            <h3><?php echo esc_html($f('dv2_stage1_title', 'Hiểu rõ chính mình · Clarity')); ?></h3>
          </div>
          <div class="tina-module-grid">
            <?php
            $s1_defaults = [
              ['Module 1 · Khởi đầu', 'Làm rõ bạn đang ở đâu, thật sự muốn đi đâu và đặt ngọn hải đăng cho cả hành trình.'],
              ['Module 2 · Yêu thương bản thân &amp; chữa lành nội tâm', 'Làm dịu giọng nói tự dằn vặt bên trong và học cách đối xử với chính mình bằng lòng trắc ẩn.'],
              ['Module 3 · Giá trị cốt lõi &amp; điểm mạnh', 'Tìm lại bạn là ai khi gạt bỏ kỳ vọng của người khác: những giá trị và sức mạnh tự nhiên làm nên con người bạn.'],
              ['Module 4 · Cá tính &amp; bản đồ tính cách', 'Soi chiếu qua Tử Vi, Nhân số học và công cụ Tâm lý học để hiểu cá tính, thế mạnh và điểm yếu.'],
            ];
            for ($i = 1; $i <= 4; $i++) :
            ?>
            <div class="tina-module">
              <strong><?php echo wp_kses_post($f("dv2_mod{$i}_title", $s1_defaults[$i - 1][0])); ?></strong>
              <p><?php echo esc_html($f("dv2_mod{$i}_desc", $s1_defaults[$i - 1][1])); ?></p>
            </div>
            <?php endfor; ?>
          </div>
        </div>

        <!-- Stage 2: Confidence (Module 5-7) -->
        <div class="tina-stage" data-reveal>
          <div class="tina-stage-title">
            <span><?php echo esc_html($f('dv2_stage2_label', 'Giai đoạn 2 · Module 5-7')); ?></span>
            <h3><?php echo esc_html($f('dv2_stage2_title', 'Tự tin làm chủ · Confidence')); ?></h3>
          </div>
          <div class="tina-module-grid">
            <?php
            $s2_defaults = [
              ['Module 5 · Tư duy làm chủ &amp; khung đạo đức', 'Dựng la bàn nội tâm, chuyển hoá Tham-Sân-Si thành Bi-Trí-Dũng để các quyết định có gốc rễ vững chắc.'],
              ['Module 6 · Nghệ thuật ra quyết định', 'Học cách đi qua những quyết định khó mà không còn dằn vặt, kết hợp trí tuệ phương Đông và công cụ phương Tây.'],
              ['Module 7 · Ý nghĩa cuộc đời', 'Hợp nhất đời sống thực tế và đời sống tinh thần, để Đời và Đạo cân bằng trong một cuộc sống có ý nghĩa.'],
            ];
            for ($i = 5; $i <= 7; $i++) :
              $idx = $i - 5;
            ?>
            <div class="tina-module">
              <strong><?php echo wp_kses_post($f("dv2_mod{$i}_title", $s2_defaults[$idx][0])); ?></strong>
              <p><?php echo esc_html($f("dv2_mod{$i}_desc", $s2_defaults[$idx][1])); ?></p>
            </div>
            <?php endfor; ?>
          </div>
        </div>

        <!-- Stage 3: Connection (Module 8-10) -->
        <div class="tina-stage" data-reveal>
          <div class="tina-stage-title">
            <span><?php echo esc_html($f('dv2_stage3_label', 'Giai đoạn 3 · Module 8-10')); ?></span>
            <h3><?php echo wp_kses_post($f('dv2_stage3_title', 'Kết nối lại &amp; phóng tầm nhìn · Connection')); ?></h3>
          </div>
          <div class="tina-module-grid">
            <?php
            $s3_defaults = [
              ['Module 8 · Chữa lành &amp; ranh giới trong quan hệ', 'Hàn gắn tổn thương trong các mối quan hệ thân mật và học cách thiết lập ranh giới lành mạnh.'],
              ['Module 9 · Giao tiếp thật &amp; bày tỏ nhu cầu', 'Tập nói ra điều mình cần một cách rõ ràng, tự tin thông qua những bài thực hành nhập vai sống động.'],
              ['Module 10 · Tầm nhìn 5-10 năm &amp; mục tiêu 90 ngày', 'Nhìn thấy phiên bản tương lai của mình và vạch những bước đầu tiên để biến nó thành hiện thực.'],
            ];
            for ($i = 8; $i <= 10; $i++) :
              $idx = $i - 8;
            ?>
            <div class="tina-module">
              <strong><?php echo wp_kses_post($f("dv2_mod{$i}_title", $s3_defaults[$idx][0])); ?></strong>
              <p><?php echo esc_html($f("dv2_mod{$i}_desc", $s3_defaults[$idx][1])); ?></p>
            </div>
            <?php endfor; ?>
          </div>
        </div>

        <!-- Stage 4: Integration (Module 11-12) -->
        <div class="tina-stage" data-reveal>
          <div class="tina-stage-title">
            <span><?php echo esc_html($f('dv2_stage4_label', 'Khép lại & neo giữ · Module 11-12')); ?></span>
            <h3><?php echo esc_html($f('dv2_stage4_title', 'Integration')); ?></h3>
          </div>
          <div class="tina-module-grid">
            <?php
            $s4_defaults = [
              ['Module 11 · Tổng kết &amp; kế hoạch duy trì', 'Đo lường chặng đường đã đi, neo giữ con người mới và lập kế hoạch để không trượt về lối cũ.'],
              ['Module 12 · Module dự phòng linh hoạt', 'Một module đệm để đào sâu điều bạn cần nhất, hoặc đồng hành cùng những gì mới nảy sinh trên đường.'],
            ];
            for ($i = 11; $i <= 12; $i++) :
              $idx = $i - 11;
            ?>
            <div class="tina-module">
              <strong><?php echo wp_kses_post($f("dv2_mod{$i}_title", $s4_defaults[$idx][0])); ?></strong>
              <p><?php echo esc_html($f("dv2_mod{$i}_desc", $s4_defaults[$idx][1])); ?></p>
            </div>
            <?php endfor; ?>
          </div>
        </div>
      </div>
    </section>


    <!-- ═══ S9: OUTCOMES & GUARANTEE ═══ -->
    <section class="srv-section" aria-label="Kết quả sau 90 ngày">
      <div class="container">
        <div class="section-header" data-reveal>
          <span class="badge"><?php echo esc_html($f('dv2_outcome_badge', 'Sau 90 ngày')); ?></span>
          <h2 style="margin-top: var(--space-4);"><?php echo esc_html($f('dv2_outcome_title', 'Bạn mang theo một nền tảng sống mới')); ?></h2>
          <div class="divider"></div>
        </div>
        <div class="deliv-grid" data-reveal-stagger>
          <?php
          $outcome_defaults = [
            ['Bình an không còn dễ vỡ', 'Một sự bình an đến từ bên trong, không còn phải vay mượn từ bên ngoài.'],
            ['Con đường sống rõ ràng', 'Bạn biết mình muốn đi đâu, về đâu, và không còn loay hoay trong cảm giác mơ hồ.'],
            ['Bộ công cụ tự đứng vững', 'Bạn có công cụ để tự ra quyết định, tự làm dịu mình và tự đứng vững khi sóng gió quay lại.'],
          ];
          for ($i = 1; $i <= 3; $i++) :
            $o_title = $f("dv2_outcome{$i}_title", $outcome_defaults[$i - 1][0]);
            $o_desc  = $f("dv2_outcome{$i}_desc",  $outcome_defaults[$i - 1][1]);
          ?>
          <div class="deliv-card" data-reveal>
            <h3><?php echo esc_html($o_title); ?></h3>
            <p><?php echo esc_html($o_desc); ?></p>
          </div>
          <?php endfor; ?>
        </div>
        <div class="method-layout" style="margin-top: var(--space-8);" data-reveal-stagger>
          <div class="method-col method-col--positive" data-reveal>
            <h3><?php echo esc_html($f('dv2_guarantee_title', 'Cam kết của tôi')); ?></h3>
            <p><?php echo esc_html($f('dv2_guarantee_desc', 'Tôi tin vào giá trị của hành trình này, nên tôi muốn bạn bắt đầu mà không phải gánh rủi ro một mình.')); ?></p>
            <div class="tina-quote" style="margin-bottom: 0;">
              <p><?php echo esc_html($f('dv2_guarantee_quote', 'Trong 30 ngày đầu tiên, nếu bạn thấy hành trình này không phù hợp, tôi sẽ hoàn lại toàn bộ học phí - không cần lý do.')); ?></p>
            </div>
          </div>
          <div class="method-col" data-reveal>
            <h3><?php echo esc_html($f('dv2_expect_title', 'Điều tôi cần ở bạn')); ?></h3>
            <p><?php echo esc_html($f('dv2_expect_desc', 'Hãy thật sự hiện diện. Hãy có mặt và làm việc với chính mình trong những buổi đồng hành. Phần còn lại, hãy để chúng tôi lo.')); ?></p>
          </div>
        </div>
      </div>
    </section>


    <!-- ═══ S10: TESTIMONIALS ═══ -->
    <section class="srv-section--alt" aria-label="Khách hàng nói gì về Trâm">
      <div class="container">
        <div class="section-header" data-reveal>
          <span class="badge badge--gold"><?php echo esc_html($f('dv2_testi_badge', 'Khách hàng nói gì')); ?></span>
          <h2 style="margin-top: var(--space-4);"><?php echo esc_html($f('dv2_testi_title', 'Những chia sẻ sau hành trình đồng hành')); ?></h2>
          <div class="divider"></div>
          <p><?php echo esc_html($f('dv2_testi_desc', 'Những lời chia sẻ dưới đây được trích từ các video và ghi âm phản hồi của khách hàng sau hành trình đồng hành cùng Trâm.')); ?></p>
        </div>
        <?php edt_render_testimonials('dich-vu-2'); ?>
      </div>
    </section>


    <!-- ═══ S11: INSTRUCTOR ═══ -->
    <section class="srv-section--dark" aria-label="Người đồng hành">
      <div class="container">
        <div class="instructor-layout">
          <div class="instructor-img" data-reveal style="border-color: var(--royal-gold); max-width: 420px; margin-inline: auto;">
            <?php $inst_image = $img('dv2_inst_image'); ?>
            <?php if ($inst_image) : ?>
              <img src="<?php echo esc_url($inst_image); ?>" alt="<?php echo esc_attr($coach_name . ' - người đồng hành trong chương trình TINA Awakening'); ?>" loading="lazy" style="border-radius: var(--radius-lg);">
            <?php else : ?>
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/coach-tram.JPG'); ?>" alt="<?php echo esc_attr($coach_name . ' - người đồng hành trong chương trình TINA Awakening'); ?>" loading="lazy" style="border-radius: var(--radius-lg);">
            <?php endif; ?>
          </div>
          <div data-reveal>
            <div class="section-header" style="text-align: left; margin-bottom: var(--space-6); max-width: none;">
              <span class="badge badge--gold"><?php echo esc_html($f('dv2_inst_badge', 'Đôi nét về Edina Trâm')); ?></span>
              <h2 style="margin-top: var(--space-4);"><?php echo esc_html($f('dv2_inst_heading', 'Thanh lịch, trí tuệ và ấm áp')); ?></h2>
              <div class="divider divider--left"></div>
            </div>
            <h3 class="instructor-name" style="color: #fff;"><?php echo esc_html($coach_name); ?></h3>
            <p class="instructor-title" style="color: var(--champagne-glow);"><?php echo esc_html($coach_title); ?></p>
            <p style="color: rgba(255,255,255,0.85);"><?php echo esc_html($f('dv2_inst_intro', 'Điều thú vị ở Trâm không nằm ở một vài tấm bằng, mà ở chỗ rất ít người hội tụ cả bốn thế giới: Tâm lý học, Khai vấn, Tâm linh và Tài chính cùng một lúc.')); ?></p>
            <ul class="tina-profile-list">
              <?php
              $cred_defaults = [
                'Thạc sỹ Tâm lý học - Đại học Sư phạm Hà Nội.',
                'Thạc sỹ Tài chính Ngân hàng - University of Southampton, Anh Quốc.',
                'ICF Associate Certified Coach (ACC) - International Coaching Federation.',
                'ACCA - nhiều năm kinh nghiệm tài chính tại các doanh nghiệp.',
                'Hơn 15 năm nghiên cứu và thực hành tâm linh, thiền định, Tử Vi và Nhân số học.',
                'Hơn 20 năm sinh sống và làm việc tại Anh, Singapore, Na Uy và Việt Nam.',
              ];
              for ($i = 1; $i <= 6; $i++) :
              ?>
              <li><?php echo esc_html($f("dv2_inst_cred{$i}", $cred_defaults[$i - 1])); ?></li>
              <?php endfor; ?>
            </ul>
            <div class="social-links" style="margin-top: var(--space-6);">
              <?php if ($social_fb) : ?>
              <a href="<?php echo esc_url($social_fb); ?>" target="_blank" rel="noopener" aria-label="Facebook" style="border-color: rgba(255,255,255,0.15); color: rgba(255,255,255,0.7);">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg>
              </a>
              <?php endif; ?>
              <?php if ($contact_email) : ?>
              <a href="mailto:<?php echo esc_attr($contact_email); ?>" aria-label="Email" style="border-color: rgba(255,255,255,0.15); color: rgba(255,255,255,0.7);">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              </a>
              <?php endif; ?>
              <?php if ($social_web) : ?>
              <a href="<?php echo esc_url($social_web); ?>" target="_blank" rel="noopener" aria-label="Website" style="border-color: rgba(255,255,255,0.15); color: rgba(255,255,255,0.7);">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"></path></svg>
              </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- ═══ S12: NEXT JOURNEY / OFFER ═══ -->
    <section class="srv-section" aria-label="Bắt đầu hành trình 90 ngày">
      <div class="container">
        <div class="section-header" data-reveal>
          <span class="badge"><?php echo esc_html($f('dv2_offer_badge', 'Bắt đầu như thế nào?')); ?></span>
          <h2 style="margin-top: var(--space-4);"><?php echo esc_html($f('dv2_offer_title', 'Bạn đã sẵn sàng bắt đầu 90 ngày của mình chưa?')); ?></h2>
          <div class="divider"></div>
          <p><?php echo esc_html($f('dv2_offer_desc', 'Tôi dành riêng hai cách để bạn bước những bước đầu tiên mà chưa cần cam kết toàn bộ ngay.')); ?></p>
        </div>
        <div class="offer-grid" data-reveal-stagger>
          <div class="offer-card" data-reveal>
            <div class="offer-label"><?php echo esc_html($f('dv2_offer1_label', 'Lựa chọn 1 · Miễn phí')); ?></div>
            <h3><?php echo esc_html($f('dv2_offer1_title', 'Một phiên trải nghiệm 1:1')); ?></h3>
            <p><?php echo esc_html($f('dv2_offer1_desc', 'Một buổi trò chuyện kết nối cùng tôi, hoàn toàn miễn phí, để bạn cảm nhận hành trình này có thật sự dành cho mình hay không.')); ?></p>
          </div>
          <div class="offer-card offer-card--featured" data-reveal>
            <div class="offer-label"><?php echo esc_html($f('dv2_offer2_label', 'Lựa chọn 2 · Ưu đãi')); ?></div>
            <h3><?php echo esc_html($f('dv2_offer2_title', 'Ba phiên khám phá đầu tiên')); ?></h3>
            <p><?php echo esc_html($f('dv2_offer2_desc', 'Ba phiên 1:1 đầu tiên với mức ưu đãi 3.000.000đ. Tặng kèm một e-book trị giá 500.000đ để bạn bắt đầu ngay.')); ?></p>
          </div>
        </div>
      </div>
    </section>


    <!-- ═══ S13: FAQ ═══ -->
    <section class="srv-section--alt" aria-label="Câu hỏi thường gặp">
      <div class="container container--narrow">
        <div class="section-header" data-reveal>
          <span class="badge"><?php echo esc_html($f('dv2_faq_badge', 'FAQ')); ?></span>
          <h2 style="margin-top: var(--space-4);"><?php echo esc_html($f('dv2_faq_title', 'Câu hỏi thường gặp')); ?></h2>
          <div class="divider"></div>
        </div>
        <?php edt_render_faqs('dich-vu-2'); ?>
      </div>
    </section>


    <!-- ═══ S14: CTA FINAL ═══ -->
    <section class="srv-cta-final" aria-label="Đặt lịch bắt đầu hành trình">
      <div class="container" data-reveal>
        <h2><?php echo wp_kses_post($f('dv2_cta_title', 'Hãy đặt lịch ngay hôm nay')); ?></h2>
        <p style="max-width: 660px;"><?php echo esc_html($f('dv2_cta_desc', 'Đừng bỏ lỡ cơ hội thay đổi cuộc đời mình. Một cuộc trò chuyện đủ thành thật có thể là điểm khởi đầu cho một hướng đi hoàn toàn mới.')); ?></p>
        <a href="<?php echo esc_url($f('dv2_cta_url', site_url('/lien-he'))); ?>" class="btn btn--accent btn--lg"><?php echo esc_html($f('dv2_cta_label', 'Đặt lịch kết nối với Edina Trâm')); ?></a>
        <div class="contact-line">
          <span><?php echo esc_html($f('dv2_cta_website', 'Website: ' . wp_parse_url(edt_option('social_website', 'https://edinatram.vn'), PHP_URL_HOST))); ?></span>
          <span><?php echo esc_html($f('dv2_cta_phone', 'WhatsApp/Zalo: ' . edt_option('contact_phone', '(+84) 88-9590-888'))); ?></span>
          <span><?php echo esc_html($f('dv2_cta_email', 'Email: ' . edt_option('contact_email', 'lequynhtram@gmail.com'))); ?></span>
        </div>
      </div>
    </section>

  </main>

<?php get_footer(); ?>
