<?php
/**
 * Edina Trâm V2 — footer.php
 * Site-wide footer: logo, tagline, link columns, copyright, social icons, scroll-to-top.
 */
?>


<!-- ═══ FOOTER ═══ -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-inner">

      <!-- Brand column -->
      <div>
        <div class="footer-logo">
          <?php
          $logo_img_id = get_option('edt_logo_image', '');
          if ($logo_img_id) {
              $logo_src = wp_get_attachment_image_src(absint($logo_img_id), 'full');
              if ($logo_src) {
                  echo '<img src="' . esc_url($logo_src[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
              } else {
                  echo wp_kses_post(get_option('edt_logo_text', 'Edina <span>Trâm</span>'));
              }
          } else {
              echo wp_kses_post(get_option('edt_logo_text', 'Edina <span>Trâm</span>'));
          }
          ?>
        </div>
        <p class="footer-tagline"><?php echo esc_html(edt_option('footer_tagline', 'Dẫn lối bình an, khai mở nội lực. Đồng hành cùng bạn trên hành trình kiến tạo cuộc sống chất lượng.')); ?></p>
      </div>

      <!-- Về Trâm -->
      <div class="footer-col">
        <h4>Về Trâm</h4>
        <div class="footer-links">
          <a href="<?php echo esc_url(home_url('/#about')); ?>">Câu chuyện của Trâm</a>
          <a href="<?php echo esc_url(home_url('/dich-vu-2/')); ?>">TINA Awakening</a>
          <a href="<?php echo esc_url(home_url('/lien-he/')); ?>">Kết nối 1:1</a>
        </div>
      </div>

      <!-- Dịch vụ -->
      <div class="footer-col">
        <h4>Dịch vụ</h4>
        <div class="footer-links">
          <a href="<?php echo esc_url(home_url('/dich-vu-1/')); ?>">Passion to Profit</a>
          <a href="<?php echo esc_url(home_url('/dich-vu-2/')); ?>">TINA Awakening</a>
          <a href="<?php echo esc_url(home_url('/dich-vu-3/')); ?>">Business Mastery</a>
        </div>
      </div>

      <!-- Kết nối -->
      <div class="footer-col">
        <h4>Kết nối</h4>
        <div class="footer-links">
          <?php
          $contact_email = edt_option('contact_email', 'lequynhtram@gmail.com');
          $contact_phone = edt_option('contact_phone', '(+84) 88-9590-888');
          $contact_website = edt_option('social_website', 'https://edinatram.vn');
          ?>
          <a href="<?php echo esc_url(home_url('/lien-he/')); ?>">Liên hệ</a>
          <a href="mailto:<?php echo esc_attr($contact_email); ?>"><?php echo esc_html($contact_email); ?></a>
          <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $contact_phone)); ?>"><?php echo esc_html($contact_phone); ?></a>
          <a href="<?php echo esc_url($contact_website); ?>" target="_blank" rel="noopener">edinatram.vn</a>
        </div>
      </div>

    </div>

    <!-- Footer bottom bar -->
    <div class="footer-bottom">
      <span><?php echo esc_html(edt_option('footer_copyright', '© 2026 Edina Trâm. All rights reserved.')); ?></span>

      <div class="footer-social">
        <?php $fb_url = edt_option('social_facebook', 'https://www.facebook.com/edina.quynhtram'); if ($fb_url) : ?>
          <a href="<?php echo esc_url($fb_url); ?>" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg>
          </a>
        <?php endif; ?>

        <?php $email_url = edt_option('contact_email', 'lequynhtram@gmail.com'); if ($email_url) : ?>
          <a href="mailto:<?php echo esc_attr($email_url); ?>" aria-label="Email">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
          </a>
        <?php endif; ?>

        <?php $web_url = edt_option('social_website', 'https://edinatram.vn'); if ($web_url) : ?>
          <a href="<?php echo esc_url($web_url); ?>" aria-label="Website" target="_blank" rel="noopener noreferrer">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"></path></svg>
          </a>
        <?php endif; ?>
      </div>
    </div>

  </div>
</footer>

<!-- Scroll-to-top -->
<button class="scroll-top-btn" aria-label="Cuộn lên đầu trang">↑</button>

<?php wp_footer(); ?>
</body>
</html>
