<?php
/**
 * Fallback index template
 */
get_header();
?>

<div class="framer-1c32q52" style="padding: 120px 20px; max-width: 800px; margin: 0 auto; color: #fff;">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="framer-text" style="font-size: 32px; margin-bottom: 20px;"><?php the_title(); ?></h1>
            <div class="framer-text" style="font-size: 16px; line-height: 1.6; color: rgba(255,255,255,0.8);">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; endif; ?>
</div>

<?php
get_footer();
