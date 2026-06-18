<?php
/**
 * Footer template file.
 */
?>
</main><!-- #main -->

<!-- Footer -->
<site-footer>
    <footer class="site-footer" style="margin-top:0;">
        <div class="container">
            <div class="footer-inner" style="border-top: 1px solid var(--home-border, rgba(255,255,255,0.08)); padding-top: var(--space-8);">
                <!-- Brand logo and tagline -->
                <div>
                    <div class="footer-logo">
                        <?php
                        $logo_img_id = get_option('edt_logo_image', '');
                        if ($logo_img_id) {
                            $logo_src = wp_get_attachment_image_src($logo_img_id, 'full');
                            if ($logo_src) {
                                echo '<img src="' . esc_url($logo_src[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '" style="height:36px; width:auto;" />';
                            } else {
                                echo wp_kses_post(get_option('edt_logo_text', 'Edina <span>Trâm</span>'));
                            }
                        } else {
                            echo wp_kses_post(get_option('edt_logo_text', 'Edina <span>Trâm</span>'));
                        }
                        ?>
                    </div>
                    <p class="footer-tagline" style="max-width:320px; line-height:1.6; opacity:0.8;">
                        <?php
                        $footer_tagline = get_option('edt_footer_tagline', 'Edina Trâm đồng hành tại giao điểm của Tâm lý học, Khai vấn, Tâm linh và Tài chính, giúp bạn tìm lại sự rõ ràng, nội lực và kết nối sâu với chính mình.');
                        echo esc_html($footer_tagline);
                        ?>
                    </p>
                </div>
                
                <!-- Navigation links -->
                <div>
                    <h4 class="footer-links-title"><?php esc_html_e('Dịch vụ', 'edina-tram'); ?></h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/passion-to-profit/')); ?>">Passion to Profit</a></li>
                        <li><a href="<?php echo esc_url(home_url('/business-to-freedom/')); ?>">TINA Awakening</a></li>
                        <li><a href="<?php echo esc_url(home_url('/business-mastery/')); ?>">Business Mastery</a></li>
                    </ul>
                </div>
                
                <!-- Social links -->
                <div>
                    <h4 class="footer-links-title"><?php esc_html_e('Liên hệ', 'edina-tram'); ?></h4>
                    <ul class="footer-links">
                        <?php
                        $email = get_option('edt_social_email', 'lequynhtram@gmail.com');
                        $fb = get_option('edt_social_facebook', 'https://www.facebook.com/edina.quynhtram');
                        $phone = get_option('edt_social_phone', '(+84) 88-9590-888');
                        $ig = get_option('edt_social_instagram', '');
                        $web = get_option('edt_social_website', 'https://edinatram.vn');
                        
                        if ($email): ?>
                            <li><a href="mailto:<?php echo sanitize_email($email); ?>"><?php echo esc_html($email); ?></a></li>
                        <?php endif;
                        if ($phone): ?>
                            <li><a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a></li>
                        <?php endif;
                        if ($web): ?>
                            <li><a href="<?php echo esc_url($web); ?>" target="_blank" rel="noopener">edinatram.vn</a></li>
                        <?php endif;
                        if ($fb): ?>
                            <li><a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener">Facebook</a></li>
                        <?php endif;
                        if ($ig): ?>
                            <li><a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener">Instagram</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <?php
                $copyright = get_option('edt_footer_copyright', '© ' . date('Y') . ' Edina Tram. All rights reserved.');
                echo esc_html($copyright);
                ?>
            </div>
        </div>
    </footer>
</site-footer>

<?php wp_footer(); ?>
</body>
</html>
