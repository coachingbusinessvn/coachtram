<?php
/**
 * Template Name: Contact Page Template
 */

get_header();

// Retrieve Contact custom fields
$contact_eyebrow = edt_field('contact_eyebrow', null, 'Liên hệ');
$contact_title = edt_field('contact_title', null, 'Hãy kết nối cùng tôi');
$contact_desc = edt_field('contact_desc', null, 'Buổi tư vấn đầu tiên hoàn toàn miễn phí — không có cam kết.');

$info_badge = edt_field('contact_info_badge', null, 'Thông tin');
$info_title = edt_field('contact_info_title', null, 'Tôi muốn lắng nghe bạn');
$info_desc = edt_field('contact_info_desc', null, 'Đừng ngần ngại liên hệ qua bất kỳ kênh nào bạn thấy tiện nhất. Tôi sẽ phản hồi trong vòng 24 giờ.');

$form_badge = edt_field('contact_form_badge', null, 'Gửi tin nhắn');
$form_title = edt_field('contact_form_title', null, 'Đặt lịch tư vấn miễn phí');
$form_lead = edt_field('contact_form_lead', null, 'Điền thông tin bên dưới và tôi sẽ liên hệ lại với bạn sớm nhất có thể.');
$form_note = edt_field('contact_form_note', null, 'Tôi sẽ phản hồi trong vòng 24 giờ. Thông tin của bạn được bảo mật tuyệt đối.');
$contact_form_shortcode = edt_field('contact_form_shortcode', null, '');

$contact_items = edt_field('edt_contact_items', null, []);
if (empty($contact_items)) {
    $contact_items = [
        [
            'item_label' => 'Email',
            'item_val' => 'lequynhtram@gmail.com',
            'item_link' => 'mailto:lequynhtram@gmail.com',
            'item_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>'
        ],
        [
            'item_label' => 'Số điện thoại',
            'item_val' => '(+84) 88-9590-888',
            'item_link' => 'tel:+84889590888',
            'item_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13 19.79 19.79 0 0 1 1.61 4.35 2 2 0 0 1 3.59 2.18h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>'
        ],
        [
            'item_label' => 'Facebook',
            'item_val' => '/edina.quynhtram',
            'item_link' => 'https://www.facebook.com/edina.quynhtram',
            'item_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 2H3v16h5v4l4-4h5l4-4V2zm-11 11v-2m4 2v-2m0-4V7m-4 4V7"/></svg>'
        ],
        [
            'item_label' => 'Giờ làm việc',
            'item_val' => 'Thứ 2 – Thứ 7, 8:00 – 21:00',
            'item_link' => '',
            'item_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>'
        ]
    ];
}
?>

<style>
    /* Inline styles for the contact page to match lien-he.html layout */
    .contact-page-hero {
        background: linear-gradient(135deg, var(--color-primary, #005b45) 0%, var(--color-primary-dark, #071a15) 100%);
        padding-block: var(--space-16);
        text-align: center;
        padding-top: 100px; /* Offset the fixed header */
    }

    .contact-page-hero h1 { color: var(--color-accent, #c8a244); font-family: var(--font-heading); font-size: clamp(2rem, 5vw, 3rem); }
    .contact-page-hero p  { color: rgba(255,255,255,0.85); font-size: var(--text-lg); }

    .contact-layout {
        display: grid;
        grid-template-columns: 1fr 1.4fr;
        gap: var(--space-12);
        align-items: start;
        padding-block: var(--space-20);
    }

    /* Info column */
    .contact-info-card {
        background: var(--color-white, #ffffff);
        border: 1px solid var(--color-border, #ccd0d4);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        box-shadow: var(--shadow-sm);
        transition: transform var(--transition), box-shadow var(--transition), border-color var(--transition);
        text-align: left;
    }
    .contact-info-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
        border-color: rgba(200, 162, 68, 0.25);
    }

    .contact-info-card h2 {
        font-size: var(--text-2xl);
        margin-bottom: var(--space-4);
        color: #005b45;
    }

    .info-list { margin-top: var(--space-6); }

    .info-item {
        display: flex;
        gap: var(--space-4);
        align-items: flex-start;
        padding: var(--space-4) 0;
        border-bottom: 1px solid var(--color-border, #e2e8f0);
    }

    .info-item:last-child { border-bottom: none; }

    .info-icon {
        width: 44px;
        height: 44px;
        background: rgba(11, 138, 102, 0.08);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: var(--color-primary, #005b45);
    }

    .info-label {
        font-weight: 600;
        color: var(--color-fg, #071a15);
        margin-bottom: var(--space-1);
        font-size: var(--text-sm);
    }

    .info-value {
        color: var(--color-fg-muted, #4a5b54);
        font-size: var(--text-sm);
        margin-bottom: 0;
    }

    /* Form */
    .contact-form-card {
        background: var(--color-white, #ffffff);
        border: 1px solid var(--color-border, #ccd0d4);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        box-shadow: var(--shadow-sm);
        transition: transform var(--transition), box-shadow var(--transition), border-color var(--transition);
        text-align: left;
    }
    .contact-form-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
        border-color: rgba(200, 162, 68, 0.25);
    }

    .contact-form-card h2 {
        font-size: var(--text-2xl);
        margin-bottom: var(--space-2);
        color: #005b45;
    }

    .form-lead { font-size: var(--text-sm); color: var(--color-fg-muted, #4a5b54); margin-bottom: var(--space-6); }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-4);
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: var(--space-2);
        margin-bottom: var(--space-4);
    }

    label {
        font-size: var(--text-sm);
        font-weight: 600;
        color: var(--color-fg, #071a15);
    }

    label .required { color: var(--color-primary, #005b45); margin-left: 2px; }

    input, textarea, select {
        width: 100%;
        padding: var(--space-3) var(--space-4);
        font-family: var(--font-body);
        font-size: var(--text-base);
        color: var(--color-fg, #071a15);
        background: var(--color-bg, #fbf8f0);
        border: 1.5px solid var(--color-border, #ccd0d4);
        border-radius: var(--radius-md);
        transition: border-color var(--transition), box-shadow var(--transition);
        outline: none;
    }

    input:focus, textarea:focus, select:focus {
        border-color: var(--color-primary, #005b45);
        box-shadow: 0 0 0 3px rgba(11, 138, 102, 0.08);
    }

    input::placeholder, textarea::placeholder { color: var(--color-fg-muted, #4a5b54); opacity: 0.6; }

    textarea { resize: vertical; min-height: 130px; }

    .form-submit { margin-top: var(--space-2); }
    .form-submit .btn {
        width: 100%;
        justify-content: center;
        padding-block: var(--space-4);
        font-size: var(--text-lg);
        background: var(--color-primary, #005b45);
        color: #fff;
        border: none;
        border-radius: var(--radius-md);
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .form-submit .btn:hover {
        background: var(--color-primary-dark, #071a15);
    }

    .form-note {
        text-align: center;
        font-size: var(--text-xs);
        color: var(--color-fg-muted, #4a5b54);
        margin-top: var(--space-3);
    }

    @media (max-width: 768px) {
        .contact-layout { grid-template-columns: 1fr; }
        .form-row       { grid-template-columns: 1fr; }
    }
</style>

<section class="contact-page-hero">
    <div class="container">
        <span class="badge" style="background:rgba(255,189,89,0.2); color: var(--color-accent, #c8a244);"><?php echo esc_html($contact_eyebrow); ?></span>
        <h1 style="margin-top: 1rem;"><?php echo esc_html($contact_title); ?></h1>
        <p><?php echo esc_html($contact_desc); ?></p>
    </div>
</section>

<section>
    <div class="container">
        <div class="contact-layout">

            <!-- Contact Info Column -->
            <div class="contact-info-card">
                <span class="badge"><?php echo esc_html($info_badge); ?></span>
                <h2 style="margin-top: 1rem;"><?php echo esc_html($info_title); ?></h2>
                <div class="divider"></div>
                <p style="margin-top: 1rem;"><?php echo esc_html($info_desc); ?></p>
                
                <div class="info-list">
                    <?php foreach ($contact_items as $item) : 
                        $lbl = isset($item['item_label']) ? $item['item_label'] : '';
                        $val = isset($item['item_val']) ? $item['item_val'] : '';
                        $link = isset($item['item_link']) ? $item['item_link'] : '';
                        $svg = isset($item['item_svg']) ? $item['item_svg'] : '';
                        ?>
                        <div class="info-item">
                            <div class="info-icon" aria-hidden="true">
                                <?php echo wp_kses_post($svg); ?>
                            </div>
                            <div>
                                <p class="info-label"><?php echo esc_html($lbl); ?></p>
                                <p class="info-value">
                                    <?php if ($link) : ?>
                                        <a href="<?php echo esc_url($link); ?>" style="color: var(--color-primary, #005b45); text-decoration: none; font-weight: 500;">
                                            <?php echo esc_html($val); ?>
                                        </a>
                                    <?php else : ?>
                                        <?php echo esc_html($val); ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Form Column -->
            <div class="contact-form-card">
                <span class="badge"><?php echo esc_html($form_badge); ?></span>
                <h2 style="margin-top: 1rem;"><?php echo esc_html($form_title); ?></h2>
                <p class="form-lead"><?php echo esc_html($form_lead); ?></p>
                
                <?php if (!empty($contact_form_shortcode)) : ?>
                    <?php echo do_shortcode(wp_kses_post($contact_form_shortcode)); ?>
                <?php else : ?>
                    <p style="text-align:center; color: var(--color-fg-muted); padding: var(--space-8) 0;">Vui lòng cài đặt plugin <strong>Fluent Forms</strong> và nhập shortcode trong trang quản trị.</p>
                <?php endif; ?>
                <p class="form-note"><?php echo esc_html($form_note); ?></p>
            </div>

        </div>
    </div>
</section>

<?php
get_footer();
