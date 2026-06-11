<?php
/**
 * Edina Tram – functions.php
 * Core theme setup, CPT registrations, menu navigation walker, enqueues, and helpers.
 */

defined('ABSPATH') || exit;

/* ============================================================
   1. THEME SETUP
   ============================================================ */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

    register_nav_menus([
        'primary' => __('Primary Navigation', 'edina-tram'),
        'footer'  => __('Footer Navigation', 'edina-tram'),
    ]);
});

/* ============================================================
   1b. RECOMMENDED PLUGIN NOTICE
   ============================================================ */
add_action('admin_notices', function () {
    if (!is_plugin_active('fluentform/fluentform.php') && current_user_can('install_plugins')) {
        echo '<div class="notice notice-warning is-dismissible"><p>';
        echo wp_kses_post(__('<strong>Edina Tram Theme:</strong> Plugin <a href="https://wordpress.org/plugins/fluentform/" target="_blank">Fluent Forms</a> được khuyến nghị để sử dụng biểu mẫu liên hệ.', 'edina-tram'));
        echo '</p></div>';
    }
});

/* ============================================================
   2. ENQUEUE SCRIPTS & STYLES
   ============================================================ */
add_action('wp_enqueue_scripts', function () {
    $ver = '1.0.0';

    // Theme style.css
    wp_enqueue_style('edt-theme-style', get_stylesheet_uri(), [], $ver);

    // Compiled stylesheet from components
    wp_enqueue_style(
        'edt-main',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        $ver
    );

    // Load main.js
    wp_enqueue_script(
        'edt-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        $ver,
        true
    );
});

/* ============================================================
   3. CUSTOM POST TYPES & TAXONOMIES (NATIVE)
   ============================================================ */
add_action('init', function () {
    // 3.1 Register Program Category Taxonomy
    register_taxonomy('program_cat', ['edina_testimonial', 'edina_faq'], [
        'labels' => [
            'name'              => __('Danh mục Chương trình', 'edina-tram'),
            'singular_name'     => __('Danh mục Chương trình', 'edina-tram'),
            'search_items'      => __('Tìm kiếm Danh mục', 'edina-tram'),
            'all_items'         => __('Tất cả Danh mục', 'edina-tram'),
            'edit_item'         => __('Sửa Danh mục', 'edina-tram'),
            'update_item'       => __('Cập nhật Danh mục', 'edina-tram'),
            'add_new_item'      => __('Thêm Danh mục mới', 'edina-tram'),
            'new_item_name'     => __('Tên Danh mục mới', 'edina-tram'),
            'menu_name'         => __('Danh mục Chương trình', 'edina-tram'),
        ],
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'chuong-trinh'],
    ]);

    // 3.2 Register Testimonial CPT
    register_post_type('edina_testimonial', [
        'labels' => [
            'name'               => __('Ý kiến Khách hàng', 'edina-tram'),
            'singular_name'      => __('Ý kiến Khách hàng', 'edina-tram'),
            'menu_name'          => __('Ý kiến Khách hàng', 'edina-tram'),
            'add_new'            => __('Thêm mới', 'edina-tram'),
            'add_new_item'       => __('Thêm ý kiến mới', 'edina-tram'),
            'edit_item'          => __('Chỉnh sửa ý kiến', 'edina-tram'),
            'new_item'           => __('Ý kiến mới', 'edina-tram'),
            'view_item'          => __('Xem ý kiến', 'edina-tram'),
            'search_items'       => __('Tìm kiếm ý kiến', 'edina-tram'),
            'not_found'          => __('Không tìm thấy ý kiến nào', 'edina-tram'),
            'not_found_in_trash' => __('Không tìm thấy ý kiến nào trong Thùng rác', 'edina-tram'),
        ],
        'public'             => true,
        'has_archive'        => false,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-testimonial',
        'supports'           => ['title', 'editor', 'thumbnail'],
        'taxonomies'         => ['program_cat'],
    ]);

    // 3.3 Register FAQ CPT
    register_post_type('edina_faq', [
        'labels' => [
            'name'               => __('Câu hỏi thường gặp (FAQ)', 'edina-tram'),
            'singular_name'      => __('FAQ', 'edina-tram'),
            'menu_name'          => __('FAQs', 'edina-tram'),
            'add_new'            => __('Thêm mới', 'edina-tram'),
            'add_new_item'       => __('Thêm câu hỏi mới', 'edina-tram'),
            'edit_item'          => __('Chỉnh sửa câu hỏi', 'edina-tram'),
            'new_item'           => __('Câu hỏi mới', 'edina-tram'),
            'view_item'          => __('Xem câu hỏi', 'edina-tram'),
            'search_items'       => __('Tìm kiếm câu hỏi', 'edina-tram'),
            'not_found'          => __('Không tìm thấy câu hỏi nào', 'edina-tram'),
            'not_found_in_trash' => __('Không tìm thấy câu hỏi nào trong Thùng rác', 'edina-tram'),
        ],
        'public'             => true,
        'has_archive'        => false,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-editor-help',
        'supports'           => ['title', 'editor'],
        'taxonomies'         => ['program_cat'],
    ]);
});

/* ============================================================
   4. CUSTOM NAV WALKER
   Strips wrap elements and outputs raw links matching static template.
   ============================================================ */
class EDT_Nav_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes   = empty($item->classes) ? [] : (array) $item->classes;
        $is_active = in_array('current-menu-item', $classes) || in_array('current-page-ancestor', $classes);
        $is_btn    = in_array('nav-cta', $classes);

        if ($is_btn) {
            $output .= sprintf(
                '<a href="%s" class="btn btn-primary" style="background:var(--color-accent, #C8A244); color:#fff;">%s</a>',
                esc_url($item->url),
                esc_html($item->title)
            );
        } else {
            $output .= sprintf(
                '<a href="%s" class="%s">%s</a>',
                esc_url($item->url),
                $is_active ? 'active' : '',
                esc_html($item->title)
            );
        }
    }
    public function end_el(&$output, $item, $depth = 0, $args = null) {}
    public function start_lvl(&$output, $depth = 0, $args = null) {}
    public function end_lvl(&$output, $depth = 0, $args = null) {}
}

/* ============================================================
   5. LOAD CUSTOM METABOXES SYSTEM
   ============================================================ */
require_once get_template_directory() . '/inc/metaboxes.php';

/* ============================================================
   6. FIELD HELPER FUNCTIONS
   ============================================================ */
if (!function_exists('edt_field')) {
    function edt_field($key, $post_id = null, $default = '') {
        if (!$post_id) {
            $post_id = get_the_ID();
        }
        $value = get_post_meta($post_id, '_' . $key, true);
        return !empty($value) ? $value : $default;
    }
}

if (!function_exists('edt_img_url')) {
    function edt_img_url($key, $post_id = null, $fallback = '') {
        if (!$post_id) {
            $post_id = get_the_ID();
        }
        $img_id = get_post_meta($post_id, '_' . $key, true);
        if ($img_id) {
            $src = wp_get_attachment_image_src($img_id, 'full');
            if ($src) {
                return $src[0];
            }
        }
        return $fallback;
    }
}
