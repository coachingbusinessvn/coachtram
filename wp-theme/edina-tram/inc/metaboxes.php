<?php
/**
 * Edina Tram – inc/metaboxes.php
 * Custom native metaboxes, section tabs, repeater fields, options page, and save logic.
 */

defined('ABSPATH') || exit;

/* ============================================================
   1. ADMIN SCRIPTS & STYLES (INLINE)
   ============================================================ */
add_action('admin_enqueue_scripts', function ($hook) {
    global $post;
    
    // Only load on post edit screens and settings page
    $allowed_pages = ['post.php', 'post-new.php', 'toplevel_page_edt-site-settings'];
    if (!in_array($hook, $allowed_pages)) {
        return;
    }

    wp_enqueue_media(); // Load WP media scripts

    // 1.1 Custom admin CSS
    $custom_css = "
        .edt-metabox-tabs-wrapper {
            display: flex;
            background: #fff;
            border: 1px solid #ccd0d4;
            box-shadow: 0 1px 1px rgba(0,0,0,.04);
            margin-top: 10px;
        }
        .edt-tabs-nav {
            list-style: none;
            margin: 0;
            padding: 0;
            width: 200px;
            background: #f0f0f1;
            border-right: 1px solid #ccd0d4;
            flex-shrink: 0;
        }
        .edt-tabs-nav li {
            margin: 0;
            padding: 12px 15px;
            border-bottom: 1px solid #ccd0d4;
            cursor: pointer;
            font-weight: 600;
            color: #23282d;
            transition: all 0.2s ease;
        }
        .edt-tabs-nav li:hover {
            background: #e0e0e0;
        }
        .edt-tabs-nav li.active {
            background: #fff;
            color: #005b45;
            border-right: 3px solid #005b45;
            width: 101%;
            box-sizing: border-box;
        }
        .edt-tabs-content {
            flex-grow: 1;
            padding: 20px 30px;
            min-height: 400px;
        }
        .edt-tab-panel {
            display: none;
        }
        .edt-tab-panel.active {
            display: block;
        }
        
        /* Section Visual Guide SVG */
        .edt-section-preview {
            background: #fbf8f0;
            border: 2px dashed #ded3b8;
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .edt-section-preview svg {
            width: 140px;
            height: auto;
            flex-shrink: 0;
            background: #fff;
            border: 1px solid #ccd0d4;
            padding: 5px;
            border-radius: 4px;
        }
        .edt-section-preview-info h4 {
            margin: 0 0 5px 0;
            color: #005b45;
            font-size: 15px;
            font-weight: bold;
        }
        .edt-section-preview-info p {
            margin: 0;
            color: #64748b;
            font-size: 12px;
            line-height: 1.4;
        }

        /* Form styling */
        .edt-field-row {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f0f0f1;
        }
        .edt-field-row:last-child {
            border-bottom: none;
        }
        .edt-field-row label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            color: #1d2327;
        }
        .edt-field-row input[type='text'],
        .edt-field-row input[type='number'],
        .edt-field-row select,
        .edt-field-row textarea {
            width: 100%;
            max-width: 600px;
            padding: 8px 12px;
            border: 1px solid #8c8f94;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .edt-field-row textarea {
            height: 100px;
        }
        .edt-field-desc {
            display: block;
            margin-top: 5px;
            color: #64748b;
            font-size: 12px;
            font-style: italic;
        }

        /* Image selector preview */
        .edt-image-preview {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .edt-image-preview img {
            max-width: 180px;
            max-height: 180px;
            border: 1px solid #ccd0d4;
            padding: 5px;
            background: #fff;
            display: block;
        }

        /* Repeater styling */
        .edt-repeater-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 15px;
        }
        .edt-repeater-table th,
        .edt-repeater-table td {
            border: 1px solid #ccd0d4;
            padding: 10px;
            text-align: left;
            vertical-align: top;
        }
        .edt-repeater-table th {
            background: #f6f7f7;
            font-weight: 600;
        }
        .edt-repeater-table td input[type='text'],
        .edt-repeater-table td textarea {
            width: 100%;
        }
        .edt-repeater-table td textarea {
            height: 60px;
        }
        .edt-remove-row-btn {
            color: #b32d2e !important;
            border-color: #b32d2e !important;
        }
        .edt-remove-row-btn:hover {
            background: #fbf4f4 !important;
        }
    ";
    wp_add_inline_style('common', $custom_css);

    // 1.2 Custom admin JS
    $custom_js = "
        jQuery(document).ready(function($) {
            // Tab switching
            $(document).on('click', '.edt-tabs-nav li', function() {
                var tab = $(this).data('tab');
                var wrapper = $(this).closest('.edt-metabox-tabs-wrapper');
                
                wrapper.find('.edt-tabs-nav li').removeClass('active');
                $(this).addClass('active');
                
                wrapper.find('.edt-tab-panel').removeClass('active');
                wrapper.find('#edt-tab-' + tab).addClass('active');
            });

            // Single Image upload via Media Library
            $(document).on('click', '.edt-upload-btn', function(e) {
                e.preventDefault();
                var button = $(this);
                var inputId = button.data('input-id');
                var input = $('#' + inputId);
                var preview = $('#' + inputId + '_preview');

                var uploader = wp.media({
                    title: 'Chọn ảnh',
                    button: { text: 'Chọn ảnh' },
                    multiple: false
                }).on('select', function() {
                    var attachment = uploader.state().get('selection').first().toJSON();
                    input.val(attachment.id);
                    preview.html('<img src=\"' + attachment.url + '\" />');
                }).open();
            });

            // Remove Image click
            $(document).on('click', '.edt-remove-btn', function(e) {
                e.preventDefault();
                var button = $(this);
                var inputId = button.data('input-id');
                $('#' + inputId).val('');
                $('#' + inputId + '_preview').html('');
            });

            // Repeater Add Row
            $(document).on('click', '.edt-add-row-btn', function(e) {
                e.preventDefault();
                var button = $(this);
                var templateId = button.data('template');
                var container = button.closest('.edt-repeater-wrapper').find('.edt-repeater-rows');
                var index = container.children().length;
                
                var template = $('#' + templateId).html();
                // Replace index placeholder
                var html = template.replace(/{{index}}/g, index);
                container.append(html);
            });

            // Repeater Remove Row
            $(document).on('click', '.edt-remove-row-btn', function(e) {
                e.preventDefault();
                var button = $(this);
                if(confirm('Bạn có chắc chắn muốn xóa mục này không?')) {
                    button.closest('tr').remove();
                }
            });

            // Repeater Image Upload
            $(document).on('click', '.edt-rep-upload-btn', function(e) {
                e.preventDefault();
                var button = $(this);
                var wrapper = button.closest('.edt-rep-image-wrapper');
                var input = wrapper.find('.edt-rep-image-input');
                var preview = wrapper.find('.edt-rep-image-preview');

                var uploader = wp.media({
                    title: 'Chọn ảnh',
                    button: { text: 'Chọn ảnh' },
                    multiple: false
                }).on('select', function() {
                    var attachment = uploader.state().get('selection').first().toJSON();
                    input.val(attachment.id);
                    preview.html('<img src=\"' + attachment.url + '\" style=\"max-width:100px; max-height:100px; display:block; border:1px solid #ccc; padding:3px; background:#fff;\" />');
                }).open();
            });

            // Repeater Image Remove
            $(document).on('click', '.edt-rep-remove-btn', function(e) {
                e.preventDefault();
                var button = $(this);
                var wrapper = button.closest('.edt-rep-image-wrapper');
                wrapper.find('.edt-rep-image-input').val('');
                wrapper.find('.edt-rep-image-preview').html('');
            });
        });
    ";
    wp_add_inline_script('common', $custom_js);
});


/* ============================================================
   2. REPEATER FIELD RENDERER HELPER
   ============================================================ */
/**
 * Renders a dynamically editable repeater field using pure PHP/JS.
 */
function edt_render_repeater($post_id, $field_name, $fields_def) {
    $rows = get_post_meta($post_id, '_' . $field_name, true);
    $rows = is_array($rows) ? $rows : [];
    
    $template_id = $field_name . '_template';
    ?>
    <div class="edt-repeater-wrapper">
        <table class="edt-repeater-table">
            <thead>
                <tr>
                    <?php foreach ($fields_def as $key => $def) : ?>
                        <th><?php echo esc_html($def['label']); ?></th>
                    <?php endforeach; ?>
                    <th style="width: 70px;">Hành động</th>
                </tr>
            </thead>
            <tbody class="edt-repeater-rows">
                <?php if (!empty($rows)) : ?>
                    <?php foreach ($rows as $index => $row) : ?>
                        <tr>
                            <?php foreach ($fields_def as $key => $def) : 
                                $val = isset($row[$key]) ? $row[$key] : '';
                                ?>
                                <td>
                                    <?php if ($def['type'] === 'text') : ?>
                                        <input type="text" name="<?php echo esc_attr($field_name); ?>[<?php echo $index; ?>][<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($val); ?>" />
                                    <?php elseif ($def['type'] === 'textarea') : ?>
                                        <textarea name="<?php echo esc_attr($field_name); ?>[<?php echo $index; ?>][<?php echo esc_attr($key); ?>]"><?php echo esc_textarea($val); ?></textarea>
                                    <?php elseif ($def['type'] === 'checkbox') : ?>
                                        <input type="checkbox" name="<?php echo esc_attr($field_name); ?>[<?php echo $index; ?>][<?php echo esc_attr($key); ?>]" value="1" <?php checked($val, 1); ?> />
                                    <?php elseif ($def['type'] === 'image') : ?>
                                        <div class="edt-rep-image-wrapper">
                                            <input type="hidden" name="<?php echo esc_attr($field_name); ?>[<?php echo $index; ?>][<?php echo esc_attr($key); ?>]" class="edt-rep-image-input" value="<?php echo esc_attr($val); ?>">
                                            <div class="edt-rep-image-preview">
                                                <?php if ($val) : ?>
                                                    <?php $thumb_src = wp_get_attachment_image_src($val, 'thumbnail'); ?>
                                                    <img src="<?php echo $thumb_src ? esc_url($thumb_src[0]) : ''; ?>" style="max-width:100px; max-height:100px; display:block; border:1px solid #ccc; padding:3px; background:#fff;" />
                                                <?php endif; ?>
                                            </div>
                                            <button class="button edt-rep-upload-btn" style="margin-top: 5px;"><?php esc_html_e('Chọn ảnh', 'edina-tram'); ?></button>
                                            <button class="button edt-rep-remove-btn edt-remove-row-btn" style="margin-top: 5px;"><?php esc_html_e('Xóa', 'edina-tram'); ?></button>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            <?php endforeach; ?>
                            <td>
                                <button class="button edt-remove-row-btn"><?php esc_html_e('Xóa', 'edina-tram'); ?></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <button class="button edt-add-row-btn" data-template="<?php echo esc_attr($template_id); ?>"><?php esc_html_e('Thêm hàng mới', 'edina-tram'); ?></button>

        <!-- Template script for new rows -->
        <script type="text/template" id="<?php echo esc_attr($template_id); ?>">
            <tr>
                <?php foreach ($fields_def as $key => $def) : ?>
                    <td>
                        <?php if ($def['type'] === 'text') : ?>
                            <input type="text" name="<?php echo esc_attr($field_name); ?>[{{index}}][<?php echo esc_attr($key); ?>]" value="" />
                        <?php elseif ($def['type'] === 'textarea') : ?>
                            <textarea name="<?php echo esc_attr($field_name); ?>[{{index}}][<?php echo esc_attr($key); ?>]"></textarea>
                        <?php elseif ($def['type'] === 'checkbox') : ?>
                            <input type="checkbox" name="<?php echo esc_attr($field_name); ?>[{{index}}][<?php echo esc_attr($key); ?>]" value="1" />
                        <?php elseif ($def['type'] === 'image') : ?>
                            <div class="edt-rep-image-wrapper">
                                <input type="hidden" name="<?php echo esc_attr($field_name); ?>[{{index}}][<?php echo esc_attr($key); ?>]" class="edt-rep-image-input" value="">
                                <div class="edt-rep-image-preview"></div>
                                <button class="button edt-rep-upload-btn" style="margin-top: 5px;"><?php esc_html_e('Chọn ảnh', 'edina-tram'); ?></button>
                                <button class="button edt-rep-remove-btn edt-remove-row-btn" style="margin-top: 5px;"><?php esc_html_e('Xóa', 'edina-tram'); ?></button>
                            </div>
                        <?php endif; ?>
                    </td>
                <?php endforeach; ?>
                <td>
                    <button class="button edt-remove-row-btn"><?php esc_html_e('Xóa', 'edina-tram'); ?></button>
                </td>
            </tr>
        </script>
    </div>
    <?php
}


/* ============================================================
   3. SINGLE IMAGE FIELD RENDERER
   ============================================================ */
function edt_render_image_field($field_id, $value, $label, $desc = '') {
    ?>
    <div class="edt-field-row">
        <label><?php echo esc_html($label); ?></label>
        <div class="edt-image-upload-wrapper">
            <input type="hidden" name="<?php echo esc_attr($field_id); ?>" id="<?php echo esc_attr($field_id); ?>" value="<?php echo esc_attr($value); ?>">
            <div class="edt-image-preview" id="<?php echo esc_attr($field_id); ?>_preview">
                <?php if ($value) : ?>
                        <?php $med_src = wp_get_attachment_image_src($value, 'medium'); ?>
                    <img src="<?php echo $med_src ? esc_url($med_src[0]) : ''; ?>">
                <?php endif; ?>
            </div>
            <button class="button edt-upload-btn" data-input-id="<?php echo esc_attr($field_id); ?>"><?php esc_html_e('Chọn từ thư viện', 'edina-tram'); ?></button>
            <button class="button edt-remove-btn" data-input-id="<?php echo esc_attr($field_id); ?>"><?php esc_html_e('Xóa ảnh', 'edina-tram'); ?></button>
            <?php if ($desc) : ?>
                <span class="edt-field-desc"><?php echo esc_html($desc); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <?php
}


/* ============================================================
   4. SVG WIREFRAME/MOCKUP RENDERER
   ============================================================ */
function edt_render_svg_preview($title, $desc, $type) {
    // Basic layouts represented by SVGs
    $svg = '';
    switch ($type) {
        case 'hero':
            $svg = '<svg viewBox="0 0 140 90" xmlns="http://www.w3.org/2000/svg">
                <rect width="140" height="90" fill="#f8fafc" rx="4"/>
                <rect x="10" y="25" width="60" height="6" fill="#005b45" rx="2"/>
                <rect x="10" y="35" width="50" height="4" fill="#64748b" rx="1"/>
                <rect x="10" y="42" width="40" height="4" fill="#64748b" rx="1"/>
                <rect x="10" y="55" width="25" height="10" fill="#c8a244" rx="5"/>
                <rect x="40" y="55" width="25" height="10" fill="none" stroke="#005b45" stroke-width="1" rx="5"/>
                <circle cx="105" cy="45" r="25" fill="#e2e8f0"/>
            </svg>';
            break;
        case 'grid-3':
            $svg = '<svg viewBox="0 0 140 90" xmlns="http://www.w3.org/2000/svg">
                <rect width="140" height="90" fill="#f8fafc" rx="4"/>
                <rect x="10" y="25" width="35" height="40" fill="#fff" stroke="#ccd0d4" rx="3"/>
                <rect x="52" y="25" width="35" height="40" fill="#fff" stroke="#ccd0d4" rx="3"/>
                <rect x="95" y="25" width="35" height="40" fill="#fff" stroke="#ccd0d4" rx="3"/>
                <circle cx="27" cy="35" r="6" fill="#e2e8f0"/>
                <circle cx="69" cy="35" r="6" fill="#e2e8f0"/>
                <circle cx="112" cy="35" r="6" fill="#e2e8f0"/>
            </svg>';
            break;
        case 'split':
            $svg = '<svg viewBox="0 0 140 90" xmlns="http://www.w3.org/2000/svg">
                <rect width="140" height="90" fill="#f8fafc" rx="4"/>
                <rect x="10" y="20" width="55" height="50" fill="#e2e8f0" rx="3"/>
                <rect x="75" y="25" width="55" height="6" fill="#005b45" rx="2"/>
                <rect x="75" y="37" width="50" height="4" fill="#64748b" rx="1"/>
                <rect x="75" y="45" width="45" height="4" fill="#64748b" rx="1"/>
            </svg>';
            break;
        case 'book':
            $svg = '<svg viewBox="0 0 140 90" xmlns="http://www.w3.org/2000/svg">
                <rect width="140" height="90" fill="#071a15" rx="4"/>
                <rect x="20" y="15" width="40" height="60" fill="#222" stroke="#c8a244" stroke-width="2" rx="2"/>
                <rect x="75" y="25" width="45" height="5" fill="#c8a244" rx="1"/>
                <rect x="75" y="35" width="40" height="3" fill="#e2e8f0" rx="1"/>
                <rect x="75" y="42" width="35" height="3" fill="#e2e8f0" rx="1"/>
            </svg>';
            break;
        case 'list':
            $svg = '<svg viewBox="0 0 140 90" xmlns="http://www.w3.org/2000/svg">
                <rect width="140" height="90" fill="#f8fafc" rx="4"/>
                <rect x="15" y="20" width="110" height="15" fill="#fff" stroke="#ccd0d4" rx="2"/>
                <rect x="15" y="40" width="110" height="15" fill="#fff" stroke="#ccd0d4" rx="2"/>
                <rect x="15" y="60" width="110" height="15" fill="#fff" stroke="#ccd0d4" rx="2"/>
                <circle cx="25" cy="27" r="4" fill="#005b45"/>
                <circle cx="25" cy="47" r="4" fill="#005b45"/>
                <circle cx="25" cy="67" r="4" fill="#005b45"/>
            </svg>';
            break;
        default:
            $svg = '<svg viewBox="0 0 140 90" xmlns="http://www.w3.org/2000/svg">
                <rect width="140" height="90" fill="#f8fafc" rx="4"/>
                <line x1="10" y1="45" x2="130" y2="45" stroke="#ccd0d4" stroke-width="2"/>
            </svg>';
            break;
    }
    ?>
    <div class="edt-section-preview" aria-hidden="true">
        <?php echo $svg; ?>
        <div class="edt-section-preview-info">
            <h4><?php echo esc_html($title); ?></h4>
            <p><?php echo esc_html($desc); ?></p>
        </div>
    </div>
    <?php
}


/* ============================================================
   5. NATIVE OPTIONS PAGE: WEBSITE SETTINGS
   ============================================================ */
add_action('admin_menu', function () {
    add_menu_page(
        __('Cài đặt Website', 'edina-tram'),
        __('Cài đặt Website', 'edina-tram'),
        'manage_options',
        'edt-site-settings',
        'edt_render_settings_page',
        'dashicons-admin-site-alt3',
        30
    );
});

function edt_render_settings_page() {
    // Check user capability
    if (!current_user_can('manage_options')) {
        return;
    }

    // Save options
    if (isset($_POST['edt_save_options']) && check_admin_referer('edt_options_nonce', 'edt_options_nonce_field')) {
        // Sanitize and save each option with the appropriate sanitizer
        $text_keys = ['edt_menu_cta_label', 'edt_footer_copyright', 'edt_social_email'];
        foreach ($text_keys as $key) {
            if (isset($_POST[$key])) {
                update_option($key, sanitize_text_field(wp_unslash($_POST[$key])));
            }
        }

        // Logo text allows <span> HTML
        if (isset($_POST['edt_logo_text'])) {
            update_option('edt_logo_text', wp_kses(wp_unslash($_POST['edt_logo_text']), ['span' => ['class' => [], 'style' => []]]));
        }

        // Logo image (attachment ID)
        if (isset($_POST['edt_logo_image'])) {
            update_option('edt_logo_image', absint($_POST['edt_logo_image']));
        }

        // Textarea fields
        if (isset($_POST['edt_footer_tagline'])) {
            update_option('edt_footer_tagline', sanitize_textarea_field(wp_unslash($_POST['edt_footer_tagline'])));
        }

        // URL fields
        $url_keys = ['edt_menu_cta_url', 'edt_social_facebook', 'edt_social_instagram', 'edt_social_website'];
        foreach ($url_keys as $key) {
            if (isset($_POST[$key])) {
                update_option($key, esc_url_raw(wp_unslash($_POST[$key])));
            }
        }

        echo '<div class="updated"><p>' . esc_html__('Cấu hình website đã được cập nhật thành công!', 'edina-tram') . '</p></div>';
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form method="post" action="">
            <?php wp_nonce_field('edt_options_nonce', 'edt_options_nonce_field'); ?>
            
            <div class="edt-metabox-tabs-wrapper">
                <ul class="edt-tabs-nav">
                    <li class="active" data-tab="general">Thiết lập chung</li>
                    <li data-tab="menu">Thanh Menu</li>
                    <li data-tab="footer">Chân trang (Footer)</li>
                </ul>
                
                <div class="edt-tabs-content">
                    <!-- Tab: General -->
                    <div class="edt-tab-panel active" id="edt-tab-general">
                        <h2>Thiết lập chung</h2>
                        <div class="edt-field-row">
                            <label for="edt_logo_text">Chữ Logo</label>
                            <input type="text" name="edt_logo_text" id="edt_logo_text" value="<?php echo esc_attr(get_option('edt_logo_text', 'Edina <span>Trâm</span>')); ?>" />
                            <span class="edt-field-desc">Dùng thẻ &lt;span&gt; bao quanh để tạo màu vàng điểm nhấn (ví dụ: Edina &lt;span&gt;Trâm&lt;/span&gt;).</span>
                        </div>
                        <div class="edt-field-row">
                            <label>Logo (Ảnh)</label>
                            <div class="edt-image-upload-wrapper">
                                <input type="hidden" name="edt_logo_image" id="edt_logo_image" value="<?php echo esc_attr(get_option('edt_logo_image', '')); ?>">
                                <div class="edt-image-preview" id="edt_logo_image_preview">
                                    <?php $logo_img_id = get_option('edt_logo_image', ''); if ($logo_img_id) : $logo_src = wp_get_attachment_image_src($logo_img_id, 'medium'); ?>
                                        <img src="<?php echo $logo_src ? esc_url($logo_src[0]) : ''; ?>">
                                    <?php endif; ?>
                                </div>
                                <button class="button edt-upload-btn" data-input-id="edt_logo_image"><?php esc_html_e('Chọn từ thư viện', 'edina-tram'); ?></button>
                                <button class="button edt-remove-btn" data-input-id="edt_logo_image"><?php esc_html_e('Xóa ảnh', 'edina-tram'); ?></button>
                                <span class="edt-field-desc">Nếu có ảnh logo, hệ thống sẽ hiển thị ảnh thay cho chữ.</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tab: Menu -->
                    <div class="edt-tab-panel" id="edt-tab-menu">
                        <h2>Thanh Menu</h2>
                        <div class="edt-field-row">
                            <label for="edt_menu_cta_label">Nhãn nút CTA</label>
                            <input type="text" name="edt_menu_cta_label" id="edt_menu_cta_label" value="<?php echo esc_attr(get_option('edt_menu_cta_label', 'Thảo luận chiến lược')); ?>" />
                        </div>
                        <div class="edt-field-row">
                            <label for="edt_menu_cta_url">Đường dẫn nút CTA</label>
                            <input type="text" name="edt_menu_cta_url" id="edt_menu_cta_url" value="<?php echo esc_attr(get_option('edt_menu_cta_url', home_url('/lien-he/'))); ?>" />
                        </div>
                    </div>
                    
                    <!-- Tab: Footer -->
                    <div class="edt-tab-panel" id="edt-tab-footer">
                        <h2>Thông tin Footer & Mạng xã hội</h2>
                        <div class="edt-field-row">
                            <label for="edt_footer_tagline">Mô tả ngắn Footer</label>
                            <textarea name="edt_footer_tagline" id="edt_footer_tagline"><?php echo esc_textarea(get_option('edt_footer_tagline', 'Edina Trâm là Professional Coach chuyên nghiệp (ICF PCC). Đồng hành cùng chủ doanh nghiệp xây dựng kinh doanh bền vững và cân bằng cuộc sống tinh tế.')); ?></textarea>
                        </div>
                        <div class="edt-field-row">
                            <label for="edt_footer_copyright">Copyright</label>
                            <input type="text" name="edt_footer_copyright" id="edt_footer_copyright" value="<?php echo esc_attr(get_option('edt_footer_copyright', '© ' . date('Y') . ' Edina Tram. All rights reserved.')); ?>" />
                        </div>
                        <h3>Liên kết liên hệ & Mạng xã hội</h3>
                        <div class="edt-field-row">
                            <label for="edt_social_email">Email</label>
                            <input type="text" name="edt_social_email" id="edt_social_email" value="<?php echo esc_attr(get_option('edt_social_email', 'coachtram@gmail.com')); ?>" />
                        </div>
                        <div class="edt-field-row">
                            <label for="edt_social_website">Website</label>
                            <input type="text" name="edt_social_website" id="edt_social_website" value="<?php echo esc_attr(get_option('edt_social_website', 'https://www.coachtram.com')); ?>" />
                        </div>
                        <div class="edt-field-row">
                            <label for="edt_social_facebook">Facebook</label>
                            <input type="text" name="edt_social_facebook" id="edt_social_facebook" value="<?php echo esc_attr(get_option('edt_social_facebook', 'https://www.facebook.com/coachtram')); ?>" />
                        </div>
                        <div class="edt-field-row">
                            <label for="edt_social_instagram">Instagram</label>
                            <input type="text" name="edt_social_instagram" id="edt_social_instagram" value="<?php echo esc_attr(get_option('edt_social_instagram', 'https://www.instagram.com/coachtram')); ?>" />
                        </div>
                    </div>
                </div>
            </div>
            
            <p class="submit">
                <input type="submit" name="edt_save_options" class="button button-primary" value="Lưu thay đổi" />
            </p>
        </form>
    </div>
    <?php
}


/* ============================================================
   6. METABOX ENROLLMENT FOR SPECIFIC PAGE TEMPLATES
   ============================================================ */
add_action('add_meta_boxes', function () {
    global $post;
    if (!$post) return;

    $template = get_post_meta($post->ID, '_wp_page_template', true);
    
    // 6.1 Homepage Metabox
    if ($template === 'front-page.php' || is_front_page()) {
        add_meta_box(
            'edt_homepage_metabox',
            __('Quản lý Nội dung Trang chủ', 'edina-tram'),
            'edt_render_homepage_metabox',
            'page',
            'normal',
            'high'
        );
    }
    
    // 6.2 Passion to Profit (Service 1)
    if ($template === 'page-passion-to-profit.php') {
        add_meta_box(
            'edt_p2p_metabox',
            __('Quản lý Nội dung Passion to Profit', 'edina-tram'),
            'edt_render_p2p_metabox',
            'page',
            'normal',
            'high'
        );
    }

    // 6.3 Business to Freedom (Service 2)
    if ($template === 'page-business-to-freedom.php') {
        add_meta_box(
            'edt_b2f_metabox',
            __('Quản lý Nội dung Business to Freedom', 'edina-tram'),
            'edt_render_b2f_metabox',
            'page',
            'normal',
            'high'
        );
    }

    // 6.4 Business Mastery (Service 3)
    if ($template === 'page-business-mastery.php') {
        add_meta_box(
            'edt_bm_metabox',
            __('Quản lý Nội dung Business Mastery', 'edina-tram'),
            'edt_render_bm_metabox',
            'page',
            'normal',
            'high'
        );
    }

    // 6.5 Contact Template
    if ($template === 'page-lien-he.php') {
        add_meta_box(
            'edt_contact_metabox',
            __('Quản lý Nội dung Trang Liên hệ', 'edina-tram'),
            'edt_render_contact_metabox',
            'page',
            'normal',
            'high'
        );
    }

    // 6.6 Testimonial Role Metabox
    add_meta_box(
        'edt_testimonial_role_metabox',
        __('Thông tin Khách hàng', 'edina-tram'),
        function ($post) {
            wp_nonce_field('edt_metabox_nonce', 'edt_metabox_nonce_field');
            $role = get_post_meta($post->ID, '_testimonial_role', true);
            ?>
            <div class="edt-field-row" style="margin-top: 10px;">
                <label for="testimonial_role">Chức vụ / Chức danh / Đơn vị (ví dụ: Chủ doanh nghiệp tại Paris)</label>
                <input type="text" name="testimonial_role" id="testimonial_role" value="<?php echo esc_attr($role); ?>" style="width: 100%; max-width: 600px;" />
            </div>
            <?php
        },
        'edina_testimonial',
        'normal',
        'high'
    );
});


/* ============================================================
   7. METABOX RENDERING FUNCTIONS
   ============================================================ */

/**
 * 7.1 Homepage Meta Box
 */
function edt_render_homepage_metabox($post) {
    wp_nonce_field('edt_metabox_nonce', 'edt_metabox_nonce_field');
    
    // Get saved values
    $hero_eyebrow = get_post_meta($post->ID, '_hero_eyebrow', true);
    $hero_title = get_post_meta($post->ID, '_hero_title', true);
    $hero_tagline = get_post_meta($post->ID, '_hero_tagline', true);
    $hero_cta_primary_label = get_post_meta($post->ID, '_hero_cta_primary_label', true);
    $hero_cta_primary_url = get_post_meta($post->ID, '_hero_cta_primary_url', true);
    $hero_cta_secondary_label = get_post_meta($post->ID, '_hero_cta_secondary_label', true);
    $hero_cta_secondary_url = get_post_meta($post->ID, '_hero_cta_secondary_url', true);
    $hero_image = get_post_meta($post->ID, '_hero_image', true);
    
    $services_title = get_post_meta($post->ID, '_services_title', true);
    $services_subtitle = get_post_meta($post->ID, '_services_subtitle', true);
    
    $about_image = get_post_meta($post->ID, '_about_image', true);
    $about_badge_image = get_post_meta($post->ID, '_about_badge_image', true);
    $about_name = get_post_meta($post->ID, '_about_name', true);
    $about_title = get_post_meta($post->ID, '_about_title', true);
    $about_bio = get_post_meta($post->ID, '_about_bio', true);
    
    $book_image = get_post_meta($post->ID, '_book_image', true);
    $book_eyebrow = get_post_meta($post->ID, '_book_eyebrow', true);
    $book_title = get_post_meta($post->ID, '_book_title', true);
    $book_description = get_post_meta($post->ID, '_book_description', true);
    $book_highlight = get_post_meta($post->ID, '_book_highlight', true);
    $book_cta_buy_label = get_post_meta($post->ID, '_book_cta_buy_label', true);
    $book_cta_buy_url = get_post_meta($post->ID, '_book_cta_buy_url', true);
    
    $testimonials_title = get_post_meta($post->ID, '_testimonials_title', true);
    ?>
    <div class="edt-metabox-tabs-wrapper">
        <ul class="edt-tabs-nav">
            <li class="active" data-tab="hero">1. Hero Section</li>
            <li data-tab="services">2. Services Grid</li>
            <li data-tab="about">3. About Coach</li>
            <li data-tab="book">4. Book Section</li>
            <li data-tab="testimonials">5. Testimonials</li>
            <li data-tab="channels">6. Social Channels</li>
        </ul>
        
        <div class="edt-tabs-content">
            <!-- Tab: Hero -->
            <div class="edt-tab-panel active" id="edt-tab-hero">
                <?php edt_render_svg_preview('Hero Section', 'Vùng giới thiệu đầu trang của Trang chủ với ảnh đại diện bên phải và nút bấm.', 'hero'); ?>
                <div class="edt-field-row">
                    <label for="hero_eyebrow">Eyebrow text (Dòng nhỏ trên tiêu đề)</label>
                    <input type="text" name="hero_eyebrow" id="hero_eyebrow" value="<?php echo esc_attr($hero_eyebrow); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="hero_title">Tiêu đề chính (Title)</label>
                    <textarea name="hero_title" id="hero_title"><?php echo esc_textarea($hero_title); ?></textarea>
                    <span class="edt-field-desc">Cho phép nhập thẻ &lt;br&gt; để xuống dòng hoặc các thẻ định dạng.</span>
                </div>
                <div class="edt-field-row">
                    <label for="hero_tagline">Mô tả phụ (Tagline)</label>
                    <textarea name="hero_tagline" id="hero_tagline"><?php echo esc_textarea($hero_tagline); ?></textarea>
                </div>
                <div class="edt-field-row">
                    <label for="hero_cta_primary_label">Nhãn nút chính</label>
                    <input type="text" name="hero_cta_primary_label" id="hero_cta_primary_label" value="<?php echo esc_attr($hero_cta_primary_label); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="hero_cta_primary_url">Đường dẫn nút chính</label>
                    <input type="text" name="hero_cta_primary_url" id="hero_cta_primary_url" value="<?php echo esc_attr($hero_cta_primary_url); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="hero_cta_secondary_label">Nhãn nút phụ</label>
                    <input type="text" name="hero_cta_secondary_label" id="hero_cta_secondary_label" value="<?php echo esc_attr($hero_cta_secondary_label); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="hero_cta_secondary_url">Đường dẫn nút phụ</label>
                    <input type="text" name="hero_cta_secondary_url" id="hero_cta_secondary_url" value="<?php echo esc_attr($hero_cta_secondary_url); ?>" />
                </div>
                <?php edt_render_image_field('hero_image', $hero_image, 'Ảnh Coach bên phải (Khuyên dùng ảnh chân dung trong suốt PNG)'); ?>
            </div>
            
            <!-- Tab: Services -->
            <div class="edt-tab-panel" id="edt-tab-services">
                <?php edt_render_svg_preview('Services Ecosystem', 'Danh sách 3 thẻ chương trình đào tạo của bạn với màu sắc tương ứng.', 'grid-3'); ?>
                <div class="edt-field-row">
                    <label for="services_title">Tiêu đề danh mục Dịch vụ</label>
                    <input type="text" name="services_title" id="services_title" value="<?php echo esc_attr($services_title); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="services_subtitle">Mô tả phụ</label>
                    <input type="text" name="services_subtitle" id="services_subtitle" value="<?php echo esc_attr($services_subtitle); ?>" />
                </div>
                <h3>Danh sách dịch vụ</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_homepage_services', [
                    'service_number'      => ['label' => 'Số thứ tự (ví dụ: 01)', 'type' => 'text'],
                    'service_name'        => ['label' => 'Tên chương trình', 'type' => 'text'],
                    'service_description' => ['label' => 'Mô tả ngắn', 'type' => 'textarea'],
                    'service_color_class' => ['label' => 'Class màu sắc (c-p2p, c-b2f, c-bm)', 'type' => 'text'],
                    'service_url'         => ['label' => 'Đường dẫn liên kết', 'type' => 'text']
                ]);
                ?>
            </div>
            
            <!-- Tab: About -->
            <div class="edt-tab-panel" id="edt-tab-about">
                <?php edt_render_svg_preview('About Coach', 'Giới thiệu thông tin tiểu sử, chứng chỉ và số liệu thống kê.', 'split'); ?>
                <?php edt_render_image_field('about_image', $about_image, 'Hình ảnh bên trái'); ?>
                <div class="edt-field-row">
                    <label for="about_badge_image">Nhãn nổi bật trên ảnh (Ví dụ: ICF PCC Coach)</label>
                    <input type="text" name="about_badge_image" id="about_badge_image" value="<?php echo esc_attr($about_badge_image); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="about_name">Họ và tên</label>
                    <input type="text" name="about_name" id="about_name" value="<?php echo esc_attr($about_name); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="about_title">Tiêu đề chuyên môn</label>
                    <input type="text" name="about_title" id="about_title" value="<?php echo esc_attr($about_title); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="about_bio">Tiểu sử chi tiết (Hỗ trợ định dạng)</label>
                    <?php
                    wp_editor($about_bio, 'about_bio_editor', [
                        'textarea_name' => 'about_bio',
                        'media_buttons' => false,
                        'textarea_rows' => 6,
                        'teeny'         => true,
                        'quicktags'     => true
                    ]);
                    ?>
                </div>
                
                <h3>Các huy hiệu / chứng nhận (Badges)</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_about_badges', [
                    'badge_text' => ['label' => 'Huy hiệu (ví dụ: Chủ doanh nghiệp)', 'type' => 'text']
                ]);
                ?>
                
                <h3>Thống kê chỉ số (Stats)</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_about_stats', [
                    'stat_number' => ['label' => 'Con số (ví dụ: 16+)', 'type' => 'text'],
                    'stat_label'  => ['label' => 'Mô tả thống kê (ví dụ: Năm kinh nghiệm)', 'type' => 'text']
                ]);
                ?>
            </div>
            
            <!-- Tab: Book -->
            <div class="edt-tab-panel" id="edt-tab-book">
                <?php edt_render_svg_preview('Book Section', 'Giới thiệu cuốn sách cá nhân của Coach, với bìa sách đổ bóng và nút mua sách.', 'book'); ?>
                <?php edt_render_image_field('book_image', $book_image, 'Ảnh bìa sách'); ?>
                <div class="edt-field-row">
                    <label for="book_eyebrow">Dòng nhãn nhỏ trên cùng</label>
                    <input type="text" name="book_eyebrow" id="book_eyebrow" value="<?php echo esc_attr($book_eyebrow); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="book_title">Tên sách</label>
                    <input type="text" name="book_title" id="book_title" value="<?php echo esc_attr($book_title); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="book_description">Mô tả giới thiệu cuốn sách (Hỗ trợ định dạng)</label>
                    <?php
                    wp_editor($book_description, 'book_description_editor', [
                        'textarea_name' => 'book_description',
                        'media_buttons' => false,
                        'textarea_rows' => 5,
                        'teeny'         => true,
                        'quicktags'     => true
                    ]);
                    ?>
                </div>
                <div class="edt-field-row">
                    <label for="book_highlight">Dòng highlight thành tựu nổi bật (Có thể dùng HTML)</label>
                    <input type="text" name="book_highlight" id="book_highlight" value="<?php echo esc_attr($book_highlight); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="book_cta_buy_label">Nhãn nút Mua sách</label>
                    <input type="text" name="book_cta_buy_label" id="book_cta_buy_label" value="<?php echo esc_attr($book_cta_buy_label); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="book_cta_buy_url">Link mua sách</label>
                    <input type="text" name="book_cta_buy_url" id="book_cta_buy_url" value="<?php echo esc_attr($book_cta_buy_url); ?>" />
                </div>
            </div>
            
            <!-- Tab: Testimonials -->
            <div class="edt-tab-panel" id="edt-tab-testimonials">
                <?php edt_render_svg_preview('Testimonials Section', 'Vùng ý kiến khách hàng. Hệ thống sẽ tự lọc từ CPT Ý kiến Khách hàng nếu bạn phân loại.', 'grid-3'); ?>
                <div class="edt-field-row">
                    <label for="testimonials_title">Tiêu đề vùng Ý kiến khách hàng</label>
                    <input type="text" name="testimonials_title" id="testimonials_title" value="<?php echo esc_attr($testimonials_title); ?>" />
                </div>
                <p><strong>💡 Lời khuyên:</strong> Hãy tạo các bài viết trong menu <strong>Ý kiến Khách hàng</strong> bên cột menu trái và gán chúng vào chuyên mục phù hợp (ví dụ: `homepage`). Hệ thống sẽ tự động truy vấn và hiển thị lên đây.</p>
            </div>
            
            <!-- Tab: Channels -->
            <div class="edt-tab-panel" id="edt-tab-channels">
                <?php edt_render_svg_preview('Social Channels', 'Hệ sinh thái mạng xã hội đa kênh kết nối.', 'grid-3'); ?>
                <h3>Danh sách các Kênh Kết Nối</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_channels', [
                    'channel_icon'        => ['label' => 'Emoji Icon (ví dụ: 📘)', 'type' => 'text'],
                    'channel_name'        => ['label' => 'Tên kênh', 'type' => 'text'],
                    'channel_description' => ['label' => 'Mô tả ngắn', 'type' => 'text'],
                    'channel_url'         => ['label' => 'Đường dẫn liên kết', 'type' => 'text']
                ]);
                ?>
            </div>
        </div>
    </div>
    <?php
}

/**
 * 7.2 Passion to Profit Metabox
 */
function edt_render_p2p_metabox($post) {
    wp_nonce_field('edt_metabox_nonce', 'edt_metabox_nonce_field');
    
    // Retrieve values
    $dv1_sticky_title = get_post_meta($post->ID, '_dv1_sticky_title', true);
    $dv1_sticky_meta = get_post_meta($post->ID, '_dv1_sticky_meta', true);
    $dv1_badge = get_post_meta($post->ID, '_dv1_badge', true);
    $dv1_title_line1 = get_post_meta($post->ID, '_dv1_title_line1', true);
    $dv1_title_line2 = get_post_meta($post->ID, '_dv1_title_line2', true);
    $dv1_tagline = get_post_meta($post->ID, '_dv1_tagline', true);
    $dv1_description = get_post_meta($post->ID, '_dv1_description', true);
    $dv1_time = get_post_meta($post->ID, '_dv1_time', true);
    $dv1_date = get_post_meta($post->ID, '_dv1_date', true);
    $dv1_price = get_post_meta($post->ID, '_dv1_price', true);
    $dv1_slots = get_post_meta($post->ID, '_dv1_slots', true);
    $dv1_countdown_target = get_post_meta($post->ID, '_dv1_countdown_target', true);
    $dv1_cta_label = get_post_meta($post->ID, '_dv1_cta_label', true);
    $dv1_scholarship_note = get_post_meta($post->ID, '_dv1_scholarship_note', true);
    $dv1_hero_image = get_post_meta($post->ID, '_dv1_hero_image', true);
    $dv1_coach_label = get_post_meta($post->ID, '_dv1_coach_label', true);
    
    $dv1_cred_title = get_post_meta($post->ID, '_dv1_cred_title', true);
    $dv1_cred_image = get_post_meta($post->ID, '_dv1_cred_image', true);
    
    $dv1_target_title = get_post_meta($post->ID, '_dv1_target_title', true);
    $dv1_benefits_title = get_post_meta($post->ID, '_dv1_benefits_title', true);
    $dv1_modules_title = get_post_meta($post->ID, '_dv1_modules_title', true);
    
    $dv1_instructor_image = get_post_meta($post->ID, '_dv1_instructor_image', true);
    $dv1_instructor_name = get_post_meta($post->ID, '_dv1_instructor_name', true);
    $dv1_instructor_title = get_post_meta($post->ID, '_dv1_instructor_title', true);
    
    $dv1_cta_quote = get_post_meta($post->ID, '_dv1_cta_quote', true);
    $dv1_cta_final_label = get_post_meta($post->ID, '_dv1_cta_final_label', true);
    ?>
    <div class="edt-metabox-tabs-wrapper">
        <ul class="edt-tabs-nav">
            <li class="active" data-tab="hero">1. Hero Section</li>
            <li data-tab="cred">2. Credibility</li>
            <li data-tab="target">3. Target Audience</li>
            <li data-tab="benefits">4. Benefits</li>
            <li data-tab="curriculum">5. Modules</li>
            <li data-tab="instructor">6. Instructor</li>
            <li data-tab="final">7. Final CTA</li>
        </ul>
        
        <div class="edt-tabs-content">
            <!-- Tab: Hero -->
            <div class="edt-tab-panel active" id="edt-tab-hero">
                <?php edt_render_svg_preview('Hero Section', 'Tiêu đề khóa học, đếm ngược và thông tin đăng ký nhanh.', 'hero'); ?>
                <h3>Thanh đăng ký nhanh (Sticky Bar)</h3>
                <div class="edt-field-row">
                    <label for="dv1_sticky_title">Tiêu đề thanh đăng ký</label>
                    <input type="text" name="dv1_sticky_title" id="dv1_sticky_title" value="<?php echo esc_attr($dv1_sticky_title); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv1_sticky_meta">Thông tin thanh đăng ký (Thời gian, địa điểm, giá tiền)</label>
                    <input type="text" name="dv1_sticky_meta" id="dv1_sticky_meta" value="<?php echo esc_attr($dv1_sticky_meta); ?>" />
                </div>
                
                <h3>Hero Content</h3>
                <div class="edt-field-row">
                    <label for="dv1_badge">Nhãn badge (ví dụ: Workshop F&B Online · 2 ngày)</label>
                    <input type="text" name="dv1_badge" id="dv1_badge" value="<?php echo esc_attr($dv1_badge); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv1_title_line1">Tiêu đề dòng 1 (hỗ trợ &lt;span&gt;)</label>
                    <input type="text" name="dv1_title_line1" id="dv1_title_line1" value="<?php echo esc_attr($dv1_title_line1); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv1_title_line2">Tiêu đề dòng 2</label>
                    <input type="text" name="dv1_title_line2" id="dv1_title_line2" value="<?php echo esc_attr($dv1_title_line2); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv1_tagline">Câu hỏi/Tagline thu hút</label>
                    <input type="text" name="dv1_tagline" id="dv1_tagline" value="<?php echo esc_attr($dv1_tagline); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv1_description">Mô tả ngắn khóa học (Hỗ trợ định dạng)</label>
                    <?php
                    wp_editor($dv1_description, 'dv1_description_editor', [
                        'textarea_name' => 'dv1_description',
                        'media_buttons' => false,
                        'textarea_rows' => 5,
                        'teeny'         => true,
                        'quicktags'     => true
                    ]);
                    ?>
                </div>
                <div class="edt-field-row">
                    <label for="dv1_time">Giờ học</label>
                    <input type="text" name="dv1_time" id="dv1_time" value="<?php echo esc_attr($dv1_time); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv1_date">Ngày khai giảng</label>
                    <input type="text" name="dv1_date" id="dv1_date" value="<?php echo esc_attr($dv1_date); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv1_price">Học phí</label>
                    <input type="text" name="dv1_price" id="dv1_price" value="<?php echo esc_attr($dv1_price); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv1_slots">Số chỗ giới hạn</label>
                    <input type="number" name="dv1_slots" id="dv1_slots" value="<?php echo esc_attr($dv1_slots); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv1_countdown_target">Mục tiêu đếm ngược (Định dạng: Month DD, YYYY HH:MM:SS, ví dụ: March 14, 2026 09:00:00)</label>
                    <input type="text" name="dv1_countdown_target" id="dv1_countdown_target" value="<?php echo esc_attr($dv1_countdown_target); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv1_cta_label">Nhãn nút Đăng ký</label>
                    <input type="text" name="dv1_cta_label" id="dv1_cta_label" value="<?php echo esc_attr($dv1_cta_label); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv1_scholarship_note">Ghi chú học bổng (Hỗ trợ HTML)</label>
                    <input type="text" name="dv1_scholarship_note" id="dv1_scholarship_note" value="<?php echo esc_attr($dv1_scholarship_note); ?>" />
                </div>
                <?php edt_render_image_field('dv1_hero_image', $dv1_hero_image, 'Ảnh đại diện Coach góc trái'); ?>
                <div class="edt-field-row">
                    <label for="dv1_coach_label">Nhãn dưới ảnh đại diện Coach</label>
                    <input type="text" name="dv1_coach_label" id="dv1_coach_label" value="<?php echo esc_attr($dv1_coach_label); ?>" />
                </div>
            </div>
            
            <!-- Tab: Cred -->
            <div class="edt-tab-panel" id="edt-tab-cred">
                <?php edt_render_svg_preview('Credibility Section', 'Ảnh giảng viên lớn và 4 con số thống kê uy tín.', 'split'); ?>
                <div class="edt-field-row">
                    <label for="dv1_cred_title">Tiêu đề mục uy tín</label>
                    <input type="text" name="dv1_cred_title" id="dv1_cred_title" value="<?php echo esc_attr($dv1_cred_title); ?>" />
                </div>
                <?php edt_render_image_field('dv1_cred_image', $dv1_cred_image, 'Hình ảnh giảng viên đang chia sẻ'); ?>
                
                <h3>Bảng thống kê số liệu uy tín (4 cột)</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv1_stats', [
                    'stat_num'   => ['label' => 'Con số (ví dụ: 15+)', 'type' => 'text'],
                    'stat_label' => ['label' => 'Mô tả uy tín', 'type' => 'textarea']
                ]);
                ?>
            </div>
            
            <!-- Tab: Target -->
            <div class="edt-tab-panel" id="edt-tab-target">
                <?php edt_render_svg_preview('Target Audience', 'Thẻ liệt kê những đối tượng phù hợp tham gia khóa học.', 'grid-3'); ?>
                <div class="edt-field-row">
                    <label for="dv1_target_title">Tiêu đề danh mục Đối tượng</label>
                    <input type="text" name="dv1_target_title" id="dv1_target_title" value="<?php echo esc_attr($dv1_target_title); ?>" />
                </div>
                <h3>Danh sách đối tượng</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv1_targets', [
                    'target_number' => ['label' => 'Số thẻ (ví dụ: 01)', 'type' => 'text'],
                    'target_text'   => ['label' => 'Mô tả đối tượng (Hỗ trợ HTML)', 'type' => 'textarea']
                ]);
                ?>
            </div>
            
            <!-- Tab: Benefits -->
            <div class="edt-tab-panel" id="edt-tab-benefits">
                <?php edt_render_svg_preview('Benefits Section', 'Vùng liệt kê 6 giá trị nhận được từ chương trình.', 'grid-3'); ?>
                <div class="edt-field-row">
                    <label for="dv1_benefits_title">Tiêu đề vùng lợi ích</label>
                    <input type="text" name="dv1_benefits_title" id="dv1_benefits_title" value="<?php echo esc_attr($dv1_benefits_title); ?>" />
                </div>
                <h3>Danh sách lợi ích</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv1_benefits', [
                    'benefit_icon'        => ['label' => 'Emoji Icon', 'type' => 'text'],
                    'benefit_title'       => ['label' => 'Tên lợi ích', 'type' => 'text'],
                    'benefit_description' => ['label' => 'Mô tả chi tiết', 'type' => 'textarea']
                ]);
                ?>
            </div>
            
            <!-- Tab: Curriculum -->
            <div class="edt-tab-panel" id="edt-tab-curriculum">
                <?php edt_render_svg_preview('Curriculum Modules', 'Lộ trình 2 ngày học tập chi tiết.', 'list'); ?>
                <div class="edt-field-row">
                    <label for="dv1_modules_title">Tiêu đề Lộ trình</label>
                    <input type="text" name="dv1_modules_title" id="dv1_modules_title" value="<?php echo esc_attr($dv1_modules_title); ?>" />
                </div>
                <h3>Chi tiết các Module</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv1_modules', [
                    'module_label'       => ['label' => 'Tên nhãn (Ví dụ: MODULE 1)', 'type' => 'text'],
                    'module_title'       => ['label' => 'Tiêu đề ngày học', 'type' => 'text'],
                    'module_description' => ['label' => 'Nội dung chi tiết ngày học', 'type' => 'textarea']
                ]);
                ?>
            </div>
            
            <!-- Tab: Instructor -->
            <div class="edt-tab-panel" id="edt-tab-instructor">
                <?php edt_render_svg_preview('Instructor Section', 'Thông tin và các chứng chỉ tiêu biểu của Coach.', 'split'); ?>
                <?php edt_render_image_field('dv1_instructor_image', $dv1_instructor_image, 'Ảnh chân dung lớn giảng viên'); ?>
                <div class="edt-field-row">
                    <label for="dv1_instructor_name">Tên giảng viên</label>
                    <input type="text" name="dv1_instructor_name" id="dv1_instructor_name" value="<?php echo esc_attr($dv1_instructor_name); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv1_instructor_title">Chứng chỉ chuyên môn của giảng viên</label>
                    <input type="text" name="dv1_instructor_title" id="dv1_instructor_title" value="<?php echo esc_attr($dv1_instructor_title); ?>" />
                </div>
                
                <h3>Bảng thông tin chứng chỉ tiêu biểu</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv1_credentials', [
                    'cred_number' => ['label' => 'Số thứ tự', 'type' => 'text'],
                    'cred_text'   => ['label' => 'Mô tả chứng chỉ (Hỗ trợ HTML)', 'type' => 'textarea']
                ]);
                ?>
            </div>
            
            <!-- Tab: Final -->
            <div class="edt-tab-panel" id="edt-tab-final">
                <?php edt_render_svg_preview('Final Call To Action', 'Thông tin kêu gọi đăng ký cuối trang với câu trích dẫn truyền động lực.', 'hero'); ?>
                <div class="edt-field-row">
                    <label for="dv1_cta_quote">Câu trích dẫn đắt giá</label>
                    <textarea name="dv1_cta_quote" id="dv1_cta_quote"><?php echo esc_textarea($dv1_cta_quote); ?></textarea>
                </div>
                <div class="edt-field-row">
                    <label for="dv1_cta_final_label">Nhãn nút Đăng ký cuối trang</label>
                    <input type="text" name="dv1_cta_final_label" id="dv1_cta_final_label" value="<?php echo esc_attr($dv1_cta_final_label); ?>" />
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * 7.3 Business to Freedom Metabox
 */
function edt_render_b2f_metabox($post) {
    wp_nonce_field('edt_metabox_nonce', 'edt_metabox_nonce_field');
    
    // Retrieve values
    $dv2_sticky_title = get_post_meta($post->ID, '_dv2_sticky_title', true);
    $dv2_sticky_meta = get_post_meta($post->ID, '_dv2_sticky_meta', true);
    $dv2_badge = get_post_meta($post->ID, '_dv2_badge', true);
    $dv2_title = get_post_meta($post->ID, '_dv2_title', true);
    $dv2_tagline = get_post_meta($post->ID, '_dv2_tagline', true);
    $dv2_description = get_post_meta($post->ID, '_dv2_description', true);
    $dv2_schedule = get_post_meta($post->ID, '_dv2_schedule', true);
    $dv2_cohort_label = get_post_meta($post->ID, '_dv2_cohort_label', true);
    $dv2_start_date = get_post_meta($post->ID, '_dv2_start_date', true);
    $dv2_price = get_post_meta($post->ID, '_dv2_price', true);
    $dv2_slots_note = get_post_meta($post->ID, '_dv2_slots_note', true);
    $dv2_countdown_target = get_post_meta($post->ID, '_dv2_countdown_target', true);
    $dv2_cta_label = get_post_meta($post->ID, '_dv2_cta_label', true);
    $dv2_hero_image = get_post_meta($post->ID, '_dv2_hero_image', true);
    
    $dv2_compare_quote = get_post_meta($post->ID, '_dv2_compare_quote', true);
    $dv2_instructor_image = get_post_meta($post->ID, '_dv2_instructor_image', true);
    $dv2_price_main = get_post_meta($post->ID, '_dv2_price_main', true);
    $dv2_price_vip = get_post_meta($post->ID, '_dv2_price_vip', true);
    $dv2_payment_note = get_post_meta($post->ID, '_dv2_payment_note', true);
    
    $dv2_cta_heading = get_post_meta($post->ID, '_dv2_cta_heading', true);
    $dv2_cta_subtext = get_post_meta($post->ID, '_dv2_cta_subtext', true);
    $dv2_cta_final_label = get_post_meta($post->ID, '_dv2_cta_final_label', true);
    ?>
    <div class="edt-metabox-tabs-wrapper">
        <ul class="edt-tabs-nav">
            <li class="active" data-tab="hero">1. Hero Section</li>
            <li data-tab="pains">2. Pain Points</li>
            <li data-tab="targets">3. Target & Comparison</li>
            <li data-tab="value">4. Outcomes & Value</li>
            <li data-tab="curriculum">5. Timeline (10 tuần)</li>
            <li data-tab="instructor">6. Instructor & Price</li>
            <li data-tab="final">7. Final CTA</li>
        </ul>
        
        <div class="edt-tabs-content">
            <!-- Tab: Hero -->
            <div class="edt-tab-panel active" id="edt-tab-hero">
                <?php edt_render_svg_preview('Hero Section', 'Vùng tiêu đề, đếm ngược và thông tin lớp học.', 'hero'); ?>
                <h3>Thanh đăng ký nhanh (Sticky Bar)</h3>
                <div class="edt-field-row">
                    <label for="dv2_sticky_title">Tiêu đề thanh đăng ký</label>
                    <input type="text" name="dv2_sticky_title" id="dv2_sticky_title" value="<?php echo esc_attr($dv2_sticky_title); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_sticky_meta">Thông tin thanh đăng ký</label>
                    <input type="text" name="dv2_sticky_meta" id="dv2_sticky_meta" value="<?php echo esc_attr($dv2_sticky_meta); ?>" />
                </div>
                
                <h3>Hero Content</h3>
                <div class="edt-field-row">
                    <label for="dv2_badge">Nhãn badge (ví dụ: Khoá học Chuyên sâu 10 tuần)</label>
                    <input type="text" name="dv2_badge" id="dv2_badge" value="<?php echo esc_attr($dv2_badge); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_title">Tiêu đề khóa học</label>
                    <textarea name="dv2_title" id="dv2_title"><?php echo esc_textarea($dv2_title); ?></textarea>
                </div>
                <div class="edt-field-row">
                    <label for="dv2_tagline">Tagline</label>
                    <input type="text" name="dv2_tagline" id="dv2_tagline" value="<?php echo esc_attr($dv2_tagline); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_description">Mô tả ngắn (Hỗ trợ định dạng)</label>
                    <?php
                    wp_editor($dv2_description, 'dv2_description_editor', [
                        'textarea_name' => 'dv2_description',
                        'media_buttons' => false,
                        'textarea_rows' => 5,
                        'teeny'         => true,
                        'quicktags'     => true
                    ]);
                    ?>
                </div>
                <div class="edt-field-row">
                    <label for="dv2_schedule">Lịch học</label>
                    <input type="text" name="dv2_schedule" id="dv2_schedule" value="<?php echo esc_attr($dv2_schedule); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_cohort_label">Nhãn đợt khai giảng</label>
                    <input type="text" name="dv2_cohort_label" id="dv2_cohort_label" value="<?php echo esc_attr($dv2_cohort_label); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_start_date">Ngày khai giảng</label>
                    <input type="text" name="dv2_start_date" id="dv2_start_date" value="<?php echo esc_attr($dv2_start_date); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_price">Chi phí</label>
                    <input type="text" name="dv2_price" id="dv2_price" value="<?php echo esc_attr($dv2_price); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_slots_note">Ghi chú giới hạn chỗ</label>
                    <input type="text" name="dv2_slots_note" id="dv2_slots_note" value="<?php echo esc_attr($dv2_slots_note); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_countdown_target">Mục tiêu đếm ngược (ví dụ: March 27, 2026 10:00:00)</label>
                    <input type="text" name="dv2_countdown_target" id="dv2_countdown_target" value="<?php echo esc_attr($dv2_countdown_target); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_cta_label">Nhãn nút đăng ký</label>
                    <input type="text" name="dv2_cta_label" id="dv2_cta_label" value="<?php echo esc_attr($dv2_cta_label); ?>" />
                </div>
                <?php edt_render_image_field('dv2_hero_image', $dv2_hero_image, 'Ảnh đại diện Coach bên phải'); ?>
            </div>
            
            <!-- Tab: Pains -->
            <div class="edt-tab-panel" id="edt-tab-pains">
                <?php edt_render_svg_preview('Pain Points', 'Vùng nỗi đau, thách thức chủ quán hay gặp phải.', 'grid-3'); ?>
                <h3>Danh sách Nỗi đau / Vướng mắc</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv2_pains', [
                    'pain_icon'        => ['label' => 'Số thứ tự / Icon (ví dụ: 01)', 'type' => 'text'],
                    'pain_title'       => ['label' => 'Tiêu đề vấn đề', 'type' => 'text'],
                    'pain_description' => ['label' => 'Mô tả chi tiết', 'type' => 'textarea']
                ]);
                ?>
            </div>
            
            <!-- Tab: Targets -->
            <div class="edt-tab-panel" id="edt-tab-targets">
                <?php edt_render_svg_preview('Target Audience & Comparison', 'Lọc đối tượng và bảng so sánh chi tiết với khóa P2P.', 'split'); ?>
                <h3>Chương trình này dành cho ai?</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv2_targets', [
                    'target_title'       => ['label' => 'Nhóm đối tượng', 'type' => 'text'],
                    'target_description' => ['label' => 'Chi tiết hành vi/nhu cầu (Hỗ trợ HTML)', 'type' => 'textarea']
                ]);
                ?>
                
                <h3>Bảng so sánh với Passion to Profit</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv2_compare_rows', [
                    'row_label' => ['label' => 'Tiêu chí so sánh (ví dụ: Thời lượng)', 'type' => 'text'],
                    'row_p2p'   => ['label' => 'Đặc điểm bên P2P', 'type' => 'textarea'],
                    'row_b2f'   => ['label' => 'Đặc điểm bên B2F', 'type' => 'textarea']
                ]);
                ?>
                
                <div class="edt-field-row">
                    <label for="dv2_compare_quote">Câu trích dẫn đúc kết so sánh (Hỗ trợ HTML)</label>
                    <textarea name="dv2_compare_quote" id="dv2_compare_quote"><?php echo esc_textarea($dv2_compare_quote); ?></textarea>
                </div>
            </div>
            
            <!-- Tab: Value -->
            <div class="edt-tab-panel" id="edt-tab-value">
                <?php edt_render_svg_preview('Outcomes & Values', '3 giá trị cột mốc (Money, Meaning, Freedom) và kết quả nhận được.', 'grid-3'); ?>
                <h3>3 giá trị cốt lõi nhận được (Money, Meaning, Freedom)</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv2_benefits', [
                    'benefit_letter'      => ['label' => 'Kí tự lớn (M hoặc F)', 'type' => 'text'],
                    'benefit_title'       => ['label' => 'Tiêu đề giá trị (ví dụ: MONEY – LỢI NHUẬN)', 'type' => 'text'],
                    'benefit_description' => ['label' => 'Chi tiết giá trị nhận được', 'type' => 'textarea']
                ]);
                ?>
                
                <h3>Vì sao chương trình này khác biệt? (Differentiators)</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv2_differentiators', [
                    'diff_title'       => ['label' => 'Tiêu đề khác biệt', 'type' => 'text'],
                    'diff_description' => ['label' => 'Mô tả chi tiết', 'type' => 'textarea']
                ]);
                ?>

                <h3>Kết quả nhận được sau 10 tuần học tập</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv2_outcomes', [
                    'outcome_number'      => ['label' => 'Ký số (ví dụ: 01)', 'type' => 'text'],
                    'outcome_title'       => ['label' => 'Tên kết quả', 'type' => 'text'],
                    'outcome_description' => ['label' => 'Mô tả kết quả đạt được', 'type' => 'textarea']
                ]);
                ?>
            </div>
            
            <!-- Tab: Curriculum -->
            <div class="edt-tab-panel" id="edt-tab-curriculum">
                <?php edt_render_svg_preview('Timeline (10 tuần)', 'Lộ trình giảng dạy chi tiết trong 10 tuần học tập.', 'list'); ?>
                <h3>Chi tiết các Tuần học</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv2_modules', [
                    'module_week'        => ['label' => 'Nhãn tuần (ví dụ: Tuần 1-2)', 'type' => 'text'],
                    'module_title'       => ['label' => 'Tiêu đề bài học', 'type' => 'text'],
                    'module_description' => ['label' => 'Mô tả chi tiết bài học', 'type' => 'textarea']
                ]);
                ?>
            </div>
            
            <!-- Tab: Instructor -->
            <div class="edt-tab-panel" id="edt-tab-instructor">
                <?php edt_render_svg_preview('Instructor & Price', 'Thông tin giảng viên và biểu học phí khóa học.', 'split'); ?>
                <?php edt_render_image_field('dv2_instructor_image', $dv2_instructor_image, 'Ảnh chân dung tròn của giảng viên'); ?>
                
                <h3>Điểm nổi bật của Giảng viên</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv2_instructor_points', [
                    'point' => ['label' => 'Dòng mô tả thành tựu (Hỗ trợ HTML)', 'type' => 'textarea']
                ]);
                ?>
                
                <h3>Mạng xã hội riêng của Giảng viên</h3>
                <div class="edt-field-row">
                    <label for="dv2_social_facebook">Facebook Link</label>
                    <input type="text" name="dv2_social_facebook" id="dv2_social_facebook" value="<?php echo esc_attr(get_post_meta($post->ID, '_dv2_social_facebook', true)); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_social_instagram">Instagram Link</label>
                    <input type="text" name="dv2_social_instagram" id="dv2_social_instagram" value="<?php echo esc_attr(get_post_meta($post->ID, '_dv2_social_instagram', true)); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_social_website">Website riêng</label>
                    <input type="text" name="dv2_social_website" id="dv2_social_website" value="<?php echo esc_attr(get_post_meta($post->ID, '_dv2_social_website', true)); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_social_email">Email liên hệ</label>
                    <input type="text" name="dv2_social_email" id="dv2_social_email" value="<?php echo esc_attr(get_post_meta($post->ID, '_dv2_social_email', true)); ?>" />
                </div>
                
                <h3>Học phí & Hình thức</h3>
                <div class="edt-field-row">
                    <label for="dv2_price_main">Học phí chính thức</label>
                    <input type="text" name="dv2_price_main" id="dv2_price_main" value="<?php echo esc_attr($dv2_price_main); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_price_vip">Học phí VIP (nếu có)</label>
                    <input type="text" name="dv2_price_vip" id="dv2_price_vip" value="<?php echo esc_attr($dv2_price_vip); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_payment_note">Ghi chú thanh toán/chia đợt (Hỗ trợ HTML)</label>
                    <input type="text" name="dv2_payment_note" id="dv2_payment_note" value="<?php echo esc_attr($dv2_payment_note); ?>" />
                </div>
            </div>
            
            <!-- Tab: Final -->
            <div class="edt-tab-panel" id="edt-tab-final">
                <?php edt_render_svg_preview('Final Call To Action', 'Thông tin đăng ký giữ chỗ nổi bật ở chân trang.', 'hero'); ?>
                <div class="edt-field-row">
                    <label for="dv2_cta_heading">Tiêu đề lớn kêu gọi</label>
                    <input type="text" name="dv2_cta_heading" id="dv2_cta_heading" value="<?php echo esc_attr($dv2_cta_heading); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_cta_subtext">Dòng mô tả nhỏ đi kèm (Khai giảng, chỗ trống)</label>
                    <input type="text" name="dv2_cta_subtext" id="dv2_cta_subtext" value="<?php echo esc_attr($dv2_cta_subtext); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv2_cta_final_label">Nhãn nút Đăng ký</label>
                    <input type="text" name="dv2_cta_final_label" id="dv2_cta_final_label" value="<?php echo esc_attr($dv2_cta_final_label); ?>" />
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * 7.4 Business Mastery Metabox
 */
function edt_render_bm_metabox($post) {
    wp_nonce_field('edt_metabox_nonce', 'edt_metabox_nonce_field');
    
    // Retrieve values
    $dv3_sticky_title = get_post_meta($post->ID, '_dv3_sticky_title', true);
    $dv3_sticky_meta = get_post_meta($post->ID, '_dv3_sticky_meta', true);
    $dv3_badge = get_post_meta($post->ID, '_dv3_badge', true);
    $dv3_title = get_post_meta($post->ID, '_dv3_title', true);
    $dv3_tagline = get_post_meta($post->ID, '_dv3_tagline', true);
    $dv3_description = get_post_meta($post->ID, '_dv3_description', true);
    $dv3_gift_text = get_post_meta($post->ID, '_dv3_gift_text', true);
    $dv3_cta_label = get_post_meta($post->ID, '_dv3_cta_label', true);
    $dv3_hero_image = get_post_meta($post->ID, '_dv3_hero_image', true);
    
    $dv3_focus_note = get_post_meta($post->ID, '_dv3_focus_note', true);
    $dv3_deliverables_note = get_post_meta($post->ID, '_dv3_deliverables_note', true);
    $dv3_capacity_note = get_post_meta($post->ID, '_dv3_capacity_note', true);
    ?>
    <div class="edt-metabox-tabs-wrapper">
        <ul class="edt-tabs-nav">
            <li class="active" data-tab="hero">1. Hero Section</li>
            <li data-tab="pains">2. Pain Points</li>
            <li data-tab="targets">3. Who Should Join</li>
            <li data-tab="method">4. Methods & Badges</li>
            <li data-tab="value">5. Value & Deliverables</li>
            <li data-tab="pricing">6. Compare & Pricing</li>
        </ul>
        
        <div class="edt-tabs-content">
            <!-- Tab: Hero -->
            <div class="edt-tab-panel active" id="edt-tab-hero">
                <?php edt_render_svg_preview('Hero Section', 'Coaching 1:1 cao cấp với ưu đãi đặc quyền.', 'hero'); ?>
                <h3>Thanh đăng ký nhanh (Sticky Bar)</h3>
                <div class="edt-field-row">
                    <label for="dv3_sticky_title">Tiêu đề thanh đăng ký</label>
                    <input type="text" name="dv3_sticky_title" id="dv3_sticky_title" value="<?php echo esc_attr($dv3_sticky_title); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv3_sticky_meta">Thông tin thanh đăng ký</label>
                    <input type="text" name="dv3_sticky_meta" id="dv3_sticky_meta" value="<?php echo esc_attr($dv3_sticky_meta); ?>" />
                </div>
                
                <h3>Hero Content</h3>
                <div class="edt-field-row">
                    <label for="dv3_badge">Nhãn badge (ví dụ: COACHING 1:1 CHIẾN LƯỢC DÀI HẠN)</label>
                    <input type="text" name="dv3_badge" id="dv3_badge" value="<?php echo esc_attr($dv3_badge); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv3_title">Tiêu đề khóa học</label>
                    <input type="text" name="dv3_title" id="dv3_title" value="<?php echo esc_attr($dv3_title); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv3_tagline">Tagline</label>
                    <input type="text" name="dv3_tagline" id="dv3_tagline" value="<?php echo esc_attr($dv3_tagline); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv3_description">Mô tả ngắn (Hỗ trợ định dạng)</label>
                    <?php
                    wp_editor($dv3_description, 'dv3_description_editor', [
                        'textarea_name' => 'dv3_description',
                        'media_buttons' => false,
                        'textarea_rows' => 5,
                        'teeny'         => true,
                        'quicktags'     => true
                    ]);
                    ?>
                </div>
                <div class="edt-field-row">
                    <label for="dv3_gift_text">Nội dung quà tặng ưu đãi (Có emoji)</label>
                    <input type="text" name="dv3_gift_text" id="dv3_gift_text" value="<?php echo esc_attr($dv3_gift_text); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="dv3_cta_label">Nhãn nút Đăng ký</label>
                    <input type="text" name="dv3_cta_label" id="dv3_cta_label" value="<?php echo esc_attr($dv3_cta_label); ?>" />
                </div>
                <?php edt_render_image_field('dv3_hero_image', $dv3_hero_image, 'Ảnh chân dung Coach bên phải'); ?>
            </div>
            
            <!-- Tab: Pains -->
            <div class="edt-tab-panel" id="edt-tab-pains">
                <?php edt_render_svg_preview('Pain Points', 'Các vướng mắc ở cấp độ quản lý chiến lược.', 'grid-3'); ?>
                <h3>Danh sách Vướng mắc / Khó khăn</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv3_pains', [
                    'pain_number'      => ['label' => 'Ký số (1, 2, 3...)', 'type' => 'text'],
                    'pain_title'       => ['label' => 'Tiêu đề vướng mắc', 'type' => 'text'],
                    'pain_description' => ['label' => 'Mô tả chi tiết', 'type' => 'textarea'],
                    'pain_full_width'  => ['label' => 'Hiển thị full chiều rộng (Checkbox)', 'type' => 'checkbox']
                ]);
                ?>
            </div>
            
            <!-- Tab: Targets -->
            <div class="edt-tab-panel" id="edt-tab-targets">
                <?php edt_render_svg_preview('Who Should Join', 'Các nhóm đối tượng chủ doanh nghiệp nên tham gia.', 'grid-3'); ?>
                <h3>Nhóm đối tượng nên tham gia</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv3_targets', [
                    'target_icon'        => ['label' => 'Emoji Icon', 'type' => 'text'],
                    'target_title'       => ['label' => 'Nhóm đối tượng', 'type' => 'text'],
                    'target_description' => ['label' => 'Chi tiết đối tượng', 'type' => 'textarea']
                ]);
                ?>
            </div>
            
            <!-- Tab: Method -->
            <div class="edt-tab-panel" id="edt-tab-method">
                <?php edt_render_svg_preview('Methods & Badges', 'Sự khác biệt trong cách tiếp cận 1-1 và các điểm tập trung.', 'split'); ?>
                <h3>Mục "Không giống khóa học thông thường" (Cột Trái)</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv3_not_like', [
                    'not_text' => ['label' => 'Điểm khác biệt tiêu cực (ví dụ: Không học chung theo lớp)', 'type' => 'text']
                ]);
                ?>
                
                <h3>Mục "Thay vào đó bạn nhận được" (Cột Phải)</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv3_you_get', [
                    'get_text' => ['label' => 'Điểm giá trị tích cực (ví dụ: Làm việc trực tiếp với coach)', 'type' => 'text']
                ]);
                ?>
                
                <h3>Huy hiệu tập trung làm việc (Badges)</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv3_focus_badges', [
                    'badge_label' => ['label' => 'Chủ đề làm việc thực tế (ví dụ: Menu thật)', 'type' => 'text']
                ]);
                ?>
                
                <div class="edt-field-row">
                    <label for="dv3_focus_note">Ghi chú đúc kết cách hoạt động</label>
                    <input type="text" name="dv3_focus_note" id="dv3_focus_note" value="<?php echo esc_attr($dv3_focus_note); ?>" />
                </div>
            </div>
            
            <!-- Tab: Value -->
            <div class="edt-tab-panel" id="edt-tab-value">
                <?php edt_render_svg_preview('Value & Deliverables', '3 Giá trị cột mốc lớn và các hạng mục nhận được khi đồng hành.', 'list'); ?>
                <h3>3 Giá trị cột mốc nhận được</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv3_values', [
                    'value_number'      => ['label' => 'Ký số lớn (1, 2, 3)', 'type' => 'text'],
                    'value_title'       => ['label' => 'Tên giá trị', 'type' => 'text'],
                    'value_description' => ['label' => 'Mô tả chi tiết giá trị', 'type' => 'textarea']
                ]);
                ?>
                
                <h3>Hạng mục nhận được trong quá trình đồng hành (Deliverables)</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv3_deliverables', [
                    'deliverable_title'       => ['label' => 'Tên hạng mục (ví dụ: Tối ưu menu)', 'type' => 'text'],
                    'deliverable_description' => ['label' => 'Mô tả chi tiết', 'type' => 'text']
                ]);
                ?>
                
                <div class="edt-field-row">
                    <label for="dv3_deliverables_note">Ghi chú chân dung hạng mục (Dấu sao * nhỏ)</label>
                    <input type="text" name="dv3_deliverables_note" id="dv3_deliverables_note" value="<?php echo esc_attr($dv3_deliverables_note); ?>" />
                </div>
            </div>
            
            <!-- Tab: Pricing -->
            <div class="edt-tab-panel" id="edt-tab-pricing">
                <?php edt_render_svg_preview('Compare & Pricing', 'Bảng so sánh chương trình và 3 gói dịch vụ (3, 6, 12 tháng).', 'grid-3'); ?>
                <h3>Bảng so sánh với Business to Freedom</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv3_compare_rows', [
                    'row_label' => ['label' => 'Tiêu chí', 'type' => 'text'],
                    'row_btf'   => ['label' => 'Cấu trúc B2F', 'type' => 'textarea'],
                    'row_bm'    => ['label' => 'Cấu trúc Business Mastery', 'type' => 'textarea']
                ]);
                ?>
                
                <h3>Bảng giá 3 Gói Coaching (3, 6, 12 tháng)</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_dv3_plans', [
                    'plan_duration' => ['label' => 'Thời lượng gói (ví dụ: 6 Tháng)', 'type' => 'text'],
                    'plan_subtitle' => ['label' => 'Mục tiêu gói', 'type' => 'text'],
                    'plan_price'    => ['label' => 'Giá trị (ví dụ: 100.000.000)', 'type' => 'text'],
                    'plan_featured' => ['label' => 'Gói đề xuất nổi bật (Featured)', 'type' => 'checkbox']
                ]);
                ?>
                
                <div class="edt-field-row">
                    <label for="dv3_capacity_note">Ghi chú giới hạn học viên hàng năm</label>
                    <input type="text" name="dv3_capacity_note" id="dv3_capacity_note" value="<?php echo esc_attr($dv3_capacity_note); ?>" />
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * 7.5 Contact Meta Box
 */
function edt_render_contact_metabox($post) {
    wp_nonce_field('edt_metabox_nonce', 'edt_metabox_nonce_field');
    
    // Retrieve values
    $contact_eyebrow = get_post_meta($post->ID, '_contact_eyebrow', true);
    $contact_title = get_post_meta($post->ID, '_contact_title', true);
    $contact_desc = get_post_meta($post->ID, '_contact_desc', true);
    $contact_info_badge = get_post_meta($post->ID, '_contact_info_badge', true);
    $contact_info_title = get_post_meta($post->ID, '_contact_info_title', true);
    $contact_info_desc = get_post_meta($post->ID, '_contact_info_desc', true);
    
    $contact_form_badge = get_post_meta($post->ID, '_contact_form_badge', true);
    $contact_form_title = get_post_meta($post->ID, '_contact_form_title', true);
    $contact_form_lead = get_post_meta($post->ID, '_contact_form_lead', true);
    $contact_form_note = get_post_meta($post->ID, '_contact_form_note', true);
    $contact_form_shortcode = get_post_meta($post->ID, '_contact_form_shortcode', true);
    ?>
    <div class="edt-metabox-tabs-wrapper">
        <ul class="edt-tabs-nav">
            <li class="active" data-tab="hero">1. Hero Section</li>
            <li data-tab="info">2. Contact Info</li>
            <li data-tab="form">3. Form Settings</li>
        </ul>
        
        <div class="edt-tabs-content">
            <!-- Tab: Hero -->
            <div class="edt-tab-panel active" id="edt-tab-hero">
                <?php edt_render_svg_preview('Hero Section', 'Vùng tiêu đề trang liên hệ.', 'hero'); ?>
                <div class="edt-field-row">
                    <label for="contact_eyebrow">Dòng nhỏ giới thiệu (badge)</label>
                    <input type="text" name="contact_eyebrow" id="contact_eyebrow" value="<?php echo esc_attr($contact_eyebrow); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="contact_title">Tiêu đề chính</label>
                    <input type="text" name="contact_title" id="contact_title" value="<?php echo esc_attr($contact_title); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="contact_desc">Dòng mô tả ngắn dưới tiêu đề</label>
                    <input type="text" name="contact_desc" id="contact_desc" value="<?php echo esc_attr($contact_desc); ?>" />
                </div>
            </div>
            
            <!-- Tab: Info -->
            <div class="edt-tab-panel" id="edt-tab-info">
                <?php edt_render_svg_preview('Contact Info', 'Thông tin liên kết trực tiếp (Cột Trái).', 'split'); ?>
                <div class="edt-field-row">
                    <label for="contact_info_badge">Nhãn badge cột thông tin</label>
                    <input type="text" name="contact_info_badge" id="contact_info_badge" value="<?php echo esc_attr($contact_info_badge); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="contact_info_title">Tiêu đề cột thông tin</label>
                    <input type="text" name="contact_info_title" id="contact_info_title" value="<?php echo esc_attr($contact_info_title); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="contact_info_desc">Mô tả ngắn</label>
                    <textarea name="contact_info_desc" id="contact_info_desc"><?php echo esc_textarea($contact_info_desc); ?></textarea>
                </div>
                
                <h3>Chi tiết các liên kết liên hệ</h3>
                <?php
                edt_render_repeater($post->ID, 'edt_contact_items', [
                    'item_label' => ['label' => 'Tên liên hệ (ví dụ: Email)', 'type' => 'text'],
                    'item_val'   => ['label' => 'Giá trị hiển thị (ví dụ: coachtram@gmail.com)', 'type' => 'text'],
                    'item_link'  => ['label' => 'Đường dẫn click (ví dụ: mailto:coachtram@gmail.com)', 'type' => 'text'],
                    'item_svg'   => ['label' => 'SVG Code icon', 'type' => 'textarea']
                ]);
                ?>
            </div>
            
            <!-- Tab: Form -->
            <div class="edt-tab-panel" id="edt-tab-form">
                <?php edt_render_svg_preview('Form Settings', 'Thông tin tiêu đề và nhãn form đăng ký (Cột Phải).', 'split'); ?>
                <div class="edt-field-row">
                    <label for="contact_form_badge">Nhãn badge form</label>
                    <input type="text" name="contact_form_badge" id="contact_form_badge" value="<?php echo esc_attr($contact_form_badge); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="contact_form_title">Tiêu đề form</label>
                    <input type="text" name="contact_form_title" id="contact_form_title" value="<?php echo esc_attr($contact_form_title); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="contact_form_lead">Mô tả dẫn dắt form</label>
                    <input type="text" name="contact_form_lead" id="contact_form_lead" value="<?php echo esc_attr($contact_form_lead); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="contact_form_note">Ghi chú chân form bảo mật</label>
                    <input type="text" name="contact_form_note" id="contact_form_note" value="<?php echo esc_attr($contact_form_note); ?>" />
                </div>
                <div class="edt-field-row">
                    <label for="contact_form_shortcode">Shortcode Fluent Form</label>
                    <input type="text" name="contact_form_shortcode" id="contact_form_shortcode" value="<?php echo esc_attr($contact_form_shortcode); ?>" />
                    <span class="edt-field-desc">Dán shortcode của Fluent Form vào đây, ví dụ: [fluentform id="1"]. Nếu để trống, hệ thống sẽ không hiển thị form.</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}


/* ============================================================
   8. METABOX SAVE POST HOOKS
   ============================================================ */
add_action('save_post', function ($post_id) {
    // Check nonces
    if (!isset($_POST['edt_metabox_nonce_field']) || !wp_verify_nonce($_POST['edt_metabox_nonce_field'], 'edt_metabox_nonce')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check user capabilities
    if (isset($_POST['post_type']) && 'page' === $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    // ── FIELD CATEGORIZATION ──
    // Text fields (sanitize_text_field)
    $text_keys = [
        'hero_eyebrow', 'hero_title', 'hero_tagline', 'hero_cta_primary_label', 'hero_cta_secondary_label',
        'services_title', 'services_subtitle',
        'about_badge_image', 'about_name', 'about_title',
        'book_eyebrow', 'book_title', 'book_highlight', 'book_cta_buy_label',
        'testimonials_title',
        'dv1_sticky_title', 'dv1_sticky_meta', 'dv1_badge', 'dv1_title_line1', 'dv1_title_line2', 'dv1_tagline', 'dv1_time', 'dv1_date', 'dv1_price', 'dv1_countdown_target', 'dv1_cta_label', 'dv1_scholarship_note', 'dv1_coach_label',
        'dv1_cred_title',
        'dv1_target_title', 'dv1_benefits_title', 'dv1_modules_title',
        'dv1_instructor_name', 'dv1_instructor_title',
        'dv1_cta_quote', 'dv1_cta_final_label',
        'dv2_sticky_title', 'dv2_sticky_meta', 'dv2_badge', 'dv2_title', 'dv2_tagline', 'dv2_schedule', 'dv2_cohort_label', 'dv2_start_date', 'dv2_price', 'dv2_slots_note', 'dv2_countdown_target', 'dv2_cta_label',
        'dv2_compare_quote', 'dv2_price_main', 'dv2_price_vip', 'dv2_payment_note',
        'dv2_social_email',
        'dv2_cta_heading', 'dv2_cta_subtext', 'dv2_cta_final_label',
        'dv3_sticky_title', 'dv3_sticky_meta', 'dv3_badge', 'dv3_title', 'dv3_tagline', 'dv3_gift_text', 'dv3_cta_label',
        'dv3_focus_note', 'dv3_deliverables_note', 'dv3_capacity_note',
        'contact_eyebrow', 'contact_title', 'contact_info_badge', 'contact_info_title',
        'contact_form_badge', 'contact_form_title', 'contact_form_lead', 'contact_form_note',
        'contact_form_shortcode',
        'testimonial_role'
    ];

    // Rich text fields (wp_kses_post) — fields that support HTML formatting
    $rich_text_keys = [
        'about_bio', 'book_description',
        'dv1_description', 'dv2_description', 'dv3_description',
        'contact_desc', 'contact_info_desc'
    ];

    // URL fields (esc_url_raw)
    $url_keys = [
        'hero_cta_primary_url', 'hero_cta_secondary_url', 'book_cta_buy_url',
        'dv2_social_facebook', 'dv2_social_instagram', 'dv2_social_website'
    ];

    // Image ID fields (absint)
    $image_keys = [
        'hero_image', 'about_image', 'book_image',
        'dv1_hero_image', 'dv1_cred_image', 'dv1_instructor_image',
        'dv2_hero_image', 'dv2_instructor_image',
        'dv3_hero_image'
    ];

    // Integer fields (absint)
    $int_keys = ['dv1_slots'];

    // ── SAVE WITH PROPER SANITIZATION ──
    foreach ($text_keys as $key) {
        if (isset($_POST[$key])) {
            update_post_meta($post_id, '_' . $key, sanitize_text_field(wp_unslash($_POST[$key])));
        }
    }

    foreach ($rich_text_keys as $key) {
        if (isset($_POST[$key])) {
            update_post_meta($post_id, '_' . $key, wp_kses_post(wp_unslash($_POST[$key])));
        }
    }

    foreach ($url_keys as $key) {
        if (isset($_POST[$key])) {
            update_post_meta($post_id, '_' . $key, esc_url_raw(wp_unslash($_POST[$key])));
        }
    }

    foreach ($image_keys as $key) {
        if (isset($_POST[$key])) {
            update_post_meta($post_id, '_' . $key, absint($_POST[$key]));
        }
    }

    foreach ($int_keys as $key) {
        if (isset($_POST[$key])) {
            update_post_meta($post_id, '_' . $key, absint($_POST[$key]));
        }
    }

    // ── REPEATER FIELDS ──
    // Only list repeaters that have corresponding UI fields
    $repeaters = [
        'edt_homepage_services', 'edt_about_badges', 'edt_about_stats', 'edt_channels',
        'edt_dv1_stats', 'edt_dv1_targets', 'edt_dv1_benefits', 'edt_dv1_modules', 'edt_dv1_credentials',
        'edt_dv2_pains', 'edt_dv2_targets', 'edt_dv2_benefits', 'edt_dv2_differentiators', 'edt_dv2_compare_rows', 'edt_dv2_outcomes', 'edt_dv2_modules', 'edt_dv2_instructor_points',
        'edt_dv3_pains', 'edt_dv3_targets', 'edt_dv3_not_like', 'edt_dv3_you_get', 'edt_dv3_focus_badges', 'edt_dv3_values', 'edt_dv3_deliverables', 'edt_dv3_compare_rows', 'edt_dv3_plans',
        'edt_contact_items'
    ];

    foreach ($repeaters as $rep) {
        if (isset($_POST[$rep]) && is_array($_POST[$rep])) {
            $raw_rows = array_values(wp_unslash($_POST[$rep]));
            $clean_rows = [];
            foreach ($raw_rows as $row) {
                if (!is_array($row)) continue;
                $clean_row = [];
                foreach ($row as $field_key => $field_val) {
                    // Sanitize each sub-field based on its value type
                    if (is_numeric($field_val) && strlen($field_val) < 10 && strpos($field_key, 'image') !== false) {
                        $clean_row[sanitize_key($field_key)] = absint($field_val);
                    } else {
                        $clean_row[sanitize_key($field_key)] = sanitize_text_field($field_val);
                    }
                }
                $clean_rows[] = $clean_row;
            }
            update_post_meta($post_id, '_' . $rep, $clean_rows);
        } else {
            // Only clear if the repeater's metabox was actually rendered on this page
            // Check by looking for a known field from the same metabox
            $page_template = get_page_template_slug($post_id);
            $post_slug = get_post_field('post_name', $post_id);
            
            // Determine which repeaters belong to the current page context
            $homepage_reps = ['edt_homepage_services', 'edt_about_badges', 'edt_about_stats', 'edt_channels'];
            $dv1_reps = ['edt_dv1_stats', 'edt_dv1_targets', 'edt_dv1_benefits', 'edt_dv1_modules', 'edt_dv1_credentials'];
            $dv2_reps = ['edt_dv2_pains', 'edt_dv2_targets', 'edt_dv2_benefits', 'edt_dv2_differentiators', 'edt_dv2_compare_rows', 'edt_dv2_outcomes', 'edt_dv2_modules', 'edt_dv2_instructor_points'];
            $dv3_reps = ['edt_dv3_pains', 'edt_dv3_targets', 'edt_dv3_not_like', 'edt_dv3_you_get', 'edt_dv3_focus_badges', 'edt_dv3_values', 'edt_dv3_deliverables', 'edt_dv3_compare_rows', 'edt_dv3_plans'];
            $contact_reps = ['edt_contact_items'];

            $is_relevant = false;
            if (is_front_page() || $post_slug === 'front-page') $is_relevant = in_array($rep, $homepage_reps);
            elseif ($post_slug === 'passion-to-profit') $is_relevant = in_array($rep, $dv1_reps);
            elseif ($post_slug === 'business-to-freedom') $is_relevant = in_array($rep, $dv2_reps);
            elseif ($post_slug === 'business-mastery') $is_relevant = in_array($rep, $dv3_reps);
            elseif ($post_slug === 'lien-he') $is_relevant = in_array($rep, $contact_reps);

            if ($is_relevant) {
                update_post_meta($post_id, '_' . $rep, []);
            }
        }
    }
});
