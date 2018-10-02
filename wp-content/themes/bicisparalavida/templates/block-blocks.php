<section class="blocks">
  <div class="container">
  <?php while (have_rows('blocks')) : the_row(); ?>
    <div class="block">
      <?= wp_get_attachment_image(get_sub_field('image'), 'un_medium', false, array('class' => 'block__image'));?>
      <div class="block__wrap">
        <h2 class="block__title"><?= the_sub_field('title') ?></h2>
        <?php the_sub_field('text'); ?>
      </div>
    </div>
  <?php endwhile; ?>
  </div>
</section>
