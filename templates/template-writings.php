<?php
/**
 * Template Name: Writings Page Template
 * 
 * Displays all published WordPress posts in a styled list.
 * Used for the /writings page.
 */

get_header();

// Query all published posts
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$writings_args = array(
    'post_type'      => 'post',
    'posts_per_page' => 10,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'paged'          => $paged
);
$writings_query = new WP_Query($writings_args);
?>

<style>
/* Writings Page Styles */
.writings-page-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 60px 24px 80px;
    min-height: 100vh;
    background: #000;
    color: #fff;
}

.writings-page-header {
    text-align: center;
    margin-bottom: 48px;
    padding-top: 40px;
}

.writings-page-header h1 {
    font-family: 'Technology Italic', 'Technology', monospace, sans-serif;
    font-size: clamp(48px, 8vw, 80px);
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #fff;
    margin: 0;
    line-height: 1.1;
}

.writings-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.writings-list-item {
    border-top: 1px dashed rgba(255, 255, 255, 0.2);
    padding: 24px 0;
}

.writings-list-item:last-child {
    border-bottom: 1px dashed rgba(255, 255, 255, 0.2);
}

.writings-list-item a {
    display: flex;
    gap: 24px;
    text-decoration: none;
    color: #fff;
    transition: opacity 0.2s ease;
    align-items: flex-start;
}

.writings-list-item a:hover {
    opacity: 0.8;
}

.writings-thumb {
    width: 160px;
    height: 120px;
    flex-shrink: 0;
    overflow: hidden;
    border-radius: 4px;
    background: #1a1a1a;
}

.writings-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.writings-item-content {
    flex: 1;
    min-width: 0;
}

.writings-item-title {
    font-family: 'Technology Italic', 'Technology', monospace, sans-serif;
    font-size: 20px;
    font-weight: normal;
    margin: 0 0 8px;
    line-height: 1.3;
    color: #fff;
}

.writings-item-date {
    font-family: 'Technology Italic', 'Technology', monospace, sans-serif;
    font-size: 14px;
    color: rgb(136, 136, 136);
    margin-bottom: 12px;
}

.writings-item-categories {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.writings-item-category {
    font-family: 'Technology Italic', 'Technology', monospace, sans-serif;
    font-size: 13px;
    color: rgb(136, 136, 136);
    background: rgba(255, 255, 255, 0.06);
    padding: 4px 10px;
    border-radius: 4px;
}

.writings-pagination {
    display: flex;
    justify-content: center;
    gap: 16px;
    margin-top: 48px;
    font-family: 'Technology Italic', 'Technology', monospace, sans-serif;
}

.writings-pagination a,
.writings-pagination span {
    font-size: 14px;
    color: rgb(136, 136, 136);
    text-decoration: none;
    padding: 8px 16px;
    border: 1px dashed rgba(255, 255, 255, 0.2);
    border-radius: 4px;
    transition: all 0.2s ease;
}

.writings-pagination a:hover {
    color: #fff;
    border-color: rgba(255, 255, 255, 0.5);
}

.writings-pagination .current {
    color: #fff;
    border-color: rgba(255, 255, 255, 0.5);
}

.writings-no-posts {
    text-align: center;
    color: rgb(136, 136, 136);
    font-family: 'Technology Italic', 'Technology', monospace, sans-serif;
    font-size: 16px;
    padding: 80px 0;
}

@media (max-width: 600px) {
    .writings-list-item a {
        flex-direction: column;
    }
    .writings-thumb {
        width: 100%;
        height: 200px;
    }
}
</style>

<div class="writings-page-container">
    <div class="writings-page-header">
        <h1>WRITINGS</h1>
    </div>

    <?php if ($writings_query->have_posts()) : ?>
    <ul class="writings-list">
        <?php while ($writings_query->have_posts()) : $writings_query->the_post(); ?>
        <li class="writings-list-item">
            <a href="<?php echo esc_url(get_permalink()); ?>">
                <?php if (has_post_thumbnail()) : ?>
                <div class="writings-thumb">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
                <?php endif; ?>
                <div class="writings-item-content">
                    <h2 class="writings-item-title"><?php the_title(); ?></h2>
                    <div class="writings-item-date"><?php echo get_the_date('M j, Y'); ?></div>
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) :
                    ?>
                    <div class="writings-item-categories">
                        <?php foreach ($categories as $cat) : ?>
                        <span class="writings-item-category"><?php echo esc_html($cat->name); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </a>
        </li>
        <?php endwhile; ?>
    </ul>

    <div class="writings-pagination">
        <?php
        $big = 999999999;
        echo paginate_links(array(
            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'    => '?paged=%#%',
            'current'   => max(1, $paged),
            'total'     => $writings_query->max_num_pages,
            'prev_text' => '&laquo; Back',
            'next_text' => 'Next &raquo;',
        ));
        ?>
    </div>

    <?php
    wp_reset_postdata();
    else :
    ?>
    <div class="writings-no-posts">
        <p>No writings published yet.</p>
    </div>
    <?php endif; ?>
</div>

<?php
get_footer();
