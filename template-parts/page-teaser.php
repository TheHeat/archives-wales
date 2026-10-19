<article id="page-<?php the_ID(); ?>" <?php post_class('pageTeaser'); ?>>
  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
    <?php the_post_thumbnail('hero-small', [
      'class' => 'pageTeaser-thumbnail',
      // displayed width depends on the list's grid, so callers can override
      'sizes' => !empty($args['sizes']) ? $args['sizes'] : '(min-width: 40rem) 50vw, 100vw',
    ]); ?>
  </a>
  <div class="pageTeaser-title-wrapper">
    <h2 class="pageTeaser-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php the_title(); ?>
      </a>
    </h2>
  </div>
  <div class="pageTeaser-excerpt">
    <?php the_excerpt(); ?>
  </div>
  <div class="pageTeaser-button-wrapper">
    <a href="<?php the_permalink() ?>" class="button"><?php _e('Read More', 'acaw'); ?></a>
  </div>
</article>
