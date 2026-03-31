<?php

$guides_page = get_field('guides_page');

if ($guides_page):
    $title = esc_html($guides_page->post_title);
    $content = wp_kses_post($guides_page->post_content);
    $permalink = esc_url(get_permalink($guides_page->ID));
    
    $child_pages = get_pages(array(
        'parent' => $guides_page->ID,
        'sort_column' => 'menu_order',
    ));?>

    <div class="frontPage-guides-wrapper">

    <div class="frontPage-guides">

        
  
            <h2 class="frontPage-guides-title"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h2>
            <div class="frontPage-guides-content"><?php echo $content; ?></div>
  
        
        <?php
    if (!empty($child_pages)) : ?>
            <ul class="frontPage-guides-list">
            <?php
        foreach ($child_pages as $child):
            $child_title = esc_html($child->post_title);
            $child_permalink = esc_url(get_permalink($child->ID)); ?>
            <li>
        
                <a href="<?php echo $child_permalink; ?>"><?php echo $child_title; ?></a></li>
        <?php endforeach; ?>
            </ul>
            <?php endif; ?>

</div>
    </div>
    
    

<?php endif; ?>