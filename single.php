<?php
/**
 * The template for displaying all single posts
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();
?>

<div class="framer-1c32q52" style="padding: 120px 20px; max-width: 800px; margin: 0 auto; color: #fff; min-height: 80vh; position: relative; z-index: 2;">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header style="margin-bottom: 40px;">
                <div style="color: rgb(136, 136, 136); font-family: monospace; font-size: 14px; margin-bottom: 12px; letter-spacing: 0.05em; text-transform: uppercase;">
                    <?php echo get_the_date('M j, Y'); ?> &bull; Writing
                </div>
                <h1 class="framer-text" style="font-size: 40px; font-weight: 700; line-height: 1.2; letter-spacing: -0.02em; margin-bottom: 24px; color: #fff;">
                    <?php the_title(); ?>
                </h1>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div style="border-radius: 16px; overflow: hidden; border: 6px solid rgb(53, 53, 53); box-shadow: 0px 4px 20px rgba(0,0,0,0.5); margin: 30px 0;">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; display: block; object-fit: cover;')); ?>
                    </div>
                <?php endif; ?>
            </header>

            <div class="framer-text post-content" style="font-size: 18px; line-height: 1.8; color: rgba(255,255,255,0.85); font-family: 'Inter', sans-serif;">
                <?php the_content(); ?>
            </div>
            
            <footer style="margin-top: 60px; padding-top: 30px; border-top: 1px dashed rgba(255,255,255,0.2);">
                <a href="<?php echo esc_url(home_url('/writings')); ?>" style="color: #fff; text-decoration: none; font-size: 16px; font-weight: 500; display: inline-flex; align-items: center; gap: 8px; transition: opacity 0.2s;">
                    &larr; Back to writings
                </a>
            </footer>
        </article>
    <?php endwhile; endif; ?>
</div>

<style>
/* Styling for Gutenberg elements inside post content */
.post-content p {
    margin-bottom: 24px;
}
.post-content h2 {
    font-size: 28px;
    font-weight: 600;
    margin-top: 40px;
    margin-bottom: 20px;
    color: #fff;
    letter-spacing: -0.01em;
}
.post-content h3 {
    font-size: 22px;
    font-weight: 600;
    margin-top: 30px;
    margin-bottom: 15px;
    color: #fff;
}
.post-content blockquote {
    border-left: 4px solid var(--token-0db76fa3-5c12-40f5-a370-6a95ecdcce54, #fff);
    padding-left: 20px;
    margin-left: 0;
    margin-right: 0;
    font-style: italic;
    color: rgba(255,255,255,0.7);
}
.post-content ul, .post-content ol {
    margin-bottom: 24px;
    padding-left: 20px;
}
.post-content li {
    margin-bottom: 8px;
}
.post-content a {
    color: #fff;
    text-decoration: underline;
}
</style>

<?php
get_footer();
