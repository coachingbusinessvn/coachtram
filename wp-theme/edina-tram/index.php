<?php
/**
 * Core fallback index.php file.
 */
get_header();
?>
    <div class="container" style="padding: 120px 0 60px;">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; else : ?>
            <p><?php esc_html_e('Không tìm thấy nội dung.', 'edina-tram'); ?></p>
        <?php endif; ?>
    </div>

<?php
get_footer();
