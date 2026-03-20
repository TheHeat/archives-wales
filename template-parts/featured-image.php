<?php if (has_post_thumbnail()) : ?>
    <?php $caption = get_the_post_thumbnail_caption(); ?>
    <figure class="featuredImage-wrapper">
        <?php the_post_thumbnail('large', array('class' => 'featuredImage')) ?>
        <?php if ($caption) : ?>
            <figcaption class="featuredImage-caption"><?php echo $caption; ?></figcaption>
        <?php endif; ?>
    </figure>
<?php endif; ?>