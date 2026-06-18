<?php
/**
 * Edina Trâm V2 — functions.php
 * Theme setup, asset enqueueing, CPTs, helpers.
 */

/* ============================================================
   1. THEME SETUP
   ============================================================ */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    register_nav_menus([
        'primary' => __('Menu chính', 'edina-tram'),
    ]);
});


/* ============================================================
   2. ENQUEUE ASSETS
   ============================================================ */
add_action('wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}, 1);

add_action('wp_enqueue_scripts', function () {
    $v = wp_get_theme()->get('Version');
    $uri = get_template_directory_uri();

    // Google Fonts — canonical single request; preconnect output in wp_head (priority 1)
    // Weights unified from design-system.css (removed its @import to avoid double-load)
    wp_enqueue_style('edt-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600&family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap',
        [], null
    );

    // Theme CSS — enqueued directly (avoids @import chain; allows HTTP/2 parallel fetch + WP cache-busting)
    $css = $uri . '/assets/css';
    wp_enqueue_style('edt-design-system', $css . '/design-system.css', ['edt-fonts'], $v);
    wp_enqueue_style('edt-components',    $css . '/components.css',    ['edt-design-system'], $v);
    wp_enqueue_style('edt-animations',    $css . '/animations.css',    ['edt-design-system'], $v);
    wp_enqueue_style('edt-home',          $css . '/pages/home.css',    ['edt-components'], $v);
    wp_enqueue_style('edt-service',       $css . '/pages/service.css', ['edt-components'], $v);
    wp_enqueue_style('edt-contact',       $css . '/pages/contact.css', ['edt-components'], $v);

    // Theme JS — deferred so it never blocks rendering
    wp_enqueue_script('edt-main', $uri . '/assets/js/main.js', [], $v, ['in_footer' => true, 'strategy' => 'defer']);
});


/* ============================================================
   3. FLUENT FORMS — RECOMMENDED PLUGIN NOTICE
   ============================================================ */
add_action('admin_notices', function () {
    if (!function_exists('is_plugin_active')) {
        include_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    if (!is_plugin_active('fluentform/fluentform.php') && current_user_can('install_plugins')) {
        echo '<div class="notice notice-warning is-dismissible"><p>';
        echo wp_kses_post(__('<strong>Edina Trâm V2:</strong> Plugin <a href="https://wordpress.org/plugins/fluentform/" target="_blank">Fluent Forms</a> được khuyến nghị để sử dụng biểu mẫu liên hệ.', 'edina-tram'));
        echo '</p></div>';
    }
});


/* ============================================================
   4. CUSTOM POST TYPES
   ============================================================ */
add_action('init', function () {

    // Testimonials
    register_post_type('edina_testimonial', [
        'labels' => [
            'name'          => 'Ý kiến Khách hàng',
            'singular_name' => 'Ý kiến',
            'add_new_item'  => 'Thêm ý kiến mới',
            'edit_item'     => 'Sửa ý kiến',
            'all_items'     => 'Tất cả ý kiến',
        ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-format-quote',
        'supports'     => ['title', 'editor', 'thumbnail'],
    ]);

    // FAQs
    register_post_type('edina_faq', [
        'labels' => [
            'name'          => 'FAQs',
            'singular_name' => 'FAQ',
            'add_new_item'  => 'Thêm câu hỏi mới',
            'edit_item'     => 'Sửa câu hỏi',
            'all_items'     => 'Tất cả FAQs',
        ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-editor-help',
        'supports'     => ['title', 'editor'],
    ]);

    // Shared taxonomy
    register_taxonomy('program_cat', ['edina_testimonial', 'edina_faq'], [
        'labels' => [
            'name'          => 'Chương trình',
            'singular_name' => 'Chương trình',
            'add_new_item'  => 'Thêm chương trình',
        ],
        'hierarchical' => true,
        'public'       => false,
        'show_ui'      => true,
        'show_admin_column' => true,
    ]);
});

// Add testimonial role meta field
add_action('add_meta_boxes', function () {
    add_meta_box('edt_testimonial_role', 'Vai trò / Vị trí', function ($post) {
        $role = get_post_meta($post->ID, '_testimonial_role', true);
        wp_nonce_field('edt_testimonial_role_nonce', '_edt_testimonial_role_nonce');
        echo '<input type="text" name="_testimonial_role" value="' . esc_attr($role) . '" style="width:100%;" placeholder="VD: Chủ quán F&B, Startup Founder...">';
    }, 'edina_testimonial', 'side');
});

add_action('save_post_edina_testimonial', function ($post_id) {
    if (!isset($_POST['_edt_testimonial_role_nonce']) || !wp_verify_nonce($_POST['_edt_testimonial_role_nonce'], 'edt_testimonial_role_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (isset($_POST['_testimonial_role'])) {
        update_post_meta($post_id, '_testimonial_role', sanitize_text_field($_POST['_testimonial_role']));
    }
});


/* ============================================================
   5. HELPER FUNCTIONS
   ============================================================ */

/**
 * Get a post meta field value.
 * Prefix with _ automatically.
 */
function edt_field($key, $post_id = null, $default = '') {
    if (!$post_id) $post_id = get_the_ID();
    $val = get_post_meta($post_id, '_' . $key, true);
    return ($val !== '' && $val !== false) ? $val : $default;
}

/**
 * Get image URL from attachment ID stored in post meta.
 */
function edt_img_url($key, $size = 'large', $post_id = null) {
    $id = edt_field($key, $post_id);
    if (!$id) return '';
    $src = wp_get_attachment_image_src(absint($id), $size);
    return $src ? $src[0] : '';
}

/**
 * Get a global option value.
 */
function edt_option($key, $default = '') {
    $val = get_option('edt_' . $key, $default);
    return ($val !== '' && $val !== false) ? $val : $default;
}

/**
 * Render testimonials grid by program category.
 */
function edt_render_testimonials($term_slug, $max = 6) {
    $args = [
        'post_type'              => 'edina_testimonial',
        'post_status'            => 'publish',
        'posts_per_page'         => $max,
        'no_found_rows'          => true,
        'update_post_term_cache' => false,
    ];
    if (term_exists($term_slug, 'program_cat')) {
        $args['tax_query'] = [[
            'taxonomy' => 'program_cat',
            'field'    => 'slug',
            'terms'    => $term_slug,
        ]];
    }
    $q = new WP_Query($args);
    if ($q->have_posts()) :
        echo '<div class="testi-grid" data-reveal-stagger>';
        while ($q->have_posts()) : $q->the_post();
            $role = get_post_meta(get_the_ID(), '_testimonial_role', true);
            $avatar = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            if (!$avatar) $avatar = esc_url(get_template_directory_uri()) . '/assets/images/placeholder-avatar.png';
            ?>
            <div class="testi-card" data-reveal>
                <div class="testi-img-wrap">
                    <img src="<?php echo esc_url($avatar); ?>" class="testi-img" alt="<?php the_title_attribute(); ?>" loading="lazy">
                </div>
                <div>
                    <p class="testi-name"><?php echo esc_html(get_the_title()); ?></p>
                    <p class="testi-role"><?php echo esc_html($role); ?></p>
                    <p class="testi-quote"><?php echo wp_strip_all_tags(get_the_content()); ?></p>
                </div>
            </div>
            <?php
        endwhile;
        echo '</div>';
        wp_reset_postdata();
    else :
        echo '<p style="color:var(--color-fg-muted); font-style:italic; text-align:center;">Chưa có ý kiến nào. Hãy thêm trong mục <strong>Ý kiến Khách hàng</strong> và gán danh mục <code>' . esc_html($term_slug) . '</code>.</p>';
    endif;
}

/**
 * Render FAQ accordion by program category.
 */
function edt_render_faqs($term_slug, $max = 10) {
    $args = [
        'post_type'              => 'edina_faq',
        'post_status'            => 'publish',
        'posts_per_page'         => $max,
        'no_found_rows'          => true,
        'update_post_term_cache' => false,
    ];
    if (term_exists($term_slug, 'program_cat')) {
        $args['tax_query'] = [[
            'taxonomy' => 'program_cat',
            'field'    => 'slug',
            'terms'    => $term_slug,
        ]];
    }
    $q = new WP_Query($args);
    if ($q->have_posts()) :
        echo '<div class="faq-list">';
        while ($q->have_posts()) : $q->the_post();
            ?>
            <div class="faq-item" data-reveal>
                <button class="faq-q" aria-expanded="false">
                    <span><?php echo esc_html(get_the_title()); ?></span>
                </button>
                <div class="faq-a"><div><div class="faq-a-inner"><?php the_content(); ?></div></div></div>
            </div>
            <?php
        endwhile;
        echo '</div>';
        wp_reset_postdata();
    else :
        echo '<p style="color:var(--color-fg-muted); font-style:italic; text-align:center;">Chưa có câu hỏi nào. Hãy thêm trong mục <strong>FAQs</strong> và gán danh mục <code>' . esc_html($term_slug) . '</code>.</p>';
    endif;
}


/* ============================================================
   6. INCLUDE METABOXES
   ============================================================ */
require_once get_template_directory() . '/inc/admin-ui.php';
require_once get_template_directory() . '/inc/metaboxes-global.php';
require_once get_template_directory() . '/inc/metaboxes-home.php';
require_once get_template_directory() . '/inc/metaboxes-dv1.php';
require_once get_template_directory() . '/inc/metaboxes-dv2.php';
require_once get_template_directory() . '/inc/metaboxes-dv3.php';
require_once get_template_directory() . '/inc/metaboxes-contact.php';
require_once get_template_directory() . '/inc/demo-import.php';
