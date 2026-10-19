<?php

if(function_exists('get_field')) {
    $guides_page = get_field('guides_page');
} else {
    $guides_page = null;
}


if ($guides_page):
    $title = esc_html($guides_page->post_title);
    $content = wp_kses_post($guides_page->post_content);
    $permalink = esc_url(get_permalink($guides_page->ID));

    $guides = new WP_Query(array(
        'post_type'      => 'page',
        'post_parent'    => $guides_page->ID,
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    )); ?>

    <div class="frontPage-guides-wrapper">

    <div class="frontPage-guides">
        <div class="frontPage-guides-header">
    <h2 class="frontPage-guides-title"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h2>
    <?php echo $content; ?>
</div>
    
    <?php if ($guides->have_posts()) : ?>
        <ul class="frontPage-guides-list">
            <?php while ($guides->have_posts()) : $guides->the_post(); ?>
                <li>
                    <?php get_template_part('template-parts/page-teaser', null, ['sizes' => '(min-width: 50rem) 33vw, 100vw']); ?>
                </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    <?php endif; ?>

</div>
    </div>
    
    

<?php endif; ?>