<div class="container page__content">
  <?php the_content(); ?>
  <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'ungrynerd'), 'after' => '</p></nav>']); ?>
</div>
