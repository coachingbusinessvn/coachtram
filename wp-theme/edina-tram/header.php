<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Header -->
<site-header>
    <header class="site-header">
        <div class="container nav">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo">
                <?php
                $logo_img_id = get_option('edt_logo_image', '');
                if ($logo_img_id) {
                    $logo_src = wp_get_attachment_image_src($logo_img_id, 'full');
                    if ($logo_src) {
                        echo '<img src="' . esc_url($logo_src[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '" style="height:40px; width:auto;" />';
                    } else {
                        echo wp_kses_post(get_option('edt_logo_text', 'Edina <span>Trâm</span>'));
                    }
                } else {
                    echo wp_kses_post(get_option('edt_logo_text', 'Edina <span>Trâm</span>'));
                }
                ?>
            </a>
            
            <!-- Mobile Toggle Button -->
            <button class="nav-toggle" aria-label="Toggle navigation">
                <span></span><span></span><span></span>
            </button>
            
            <!-- Navigation Links -->
            <nav class="nav-links">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'walker'         => new EDT_Nav_Walker(),
                    ]);
                } else {
                    // Fallback to match static HTML structure
                    $is_home = is_front_page();
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo esc_attr($is_home ? 'active' : ''); ?>">Trang chủ</a>
                    <a href="<?php echo esc_url(home_url('/#services')); ?>">Dịch vụ</a>
                    <a href="<?php echo esc_url(home_url('/passion-to-profit/')); ?>" class="<?php echo esc_attr(is_page('passion-to-profit') ? 'active' : ''); ?>">Passion to Profit</a>
                    <a href="<?php echo esc_url(home_url('/business-to-freedom/')); ?>" class="<?php echo esc_attr(is_page('business-to-freedom') ? 'active' : ''); ?>">Business to Freedom</a>
                    <a href="<?php echo esc_url(home_url('/business-mastery/')); ?>" class="<?php echo esc_attr(is_page('business-mastery') ? 'active' : ''); ?>">Business Mastery</a>
                    <?php
                }
                
                // CTA button
                $cta_label = get_option('edt_menu_cta_label', 'Thảo luận chiến lược');
                $cta_url   = get_option('edt_menu_cta_url', home_url('/lien-he/'));
                ?>
                <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-primary" style="background:var(--color-accent, #C8A244); color:#fff;">
                    <?php echo esc_html($cta_label); ?>
                </a>
            </nav>
        </div>
    </header>
</site-header>

<main id="main">
