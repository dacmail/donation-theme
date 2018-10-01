<section class="steps">
  <div class="container">
  <?php while (have_rows('steps')) : the_row(); ?>
    <div class="step">
      <?= wp_get_attachment_image(get_sub_field('image'), 'un_small', false, array('class' => 'step__image'));?>
      <h3 class="step__title"><?= the_sub_field('title') ?></h3>
      <p><?php the_sub_field('text'); ?></p>
    </div>
  <?php endwhile; ?>
  </div>
  <?php $link = get_field('steps_link'); ?>
  <?php if ($link) : ?>
    <a target="<?= $link['target'] ?>" href="<?= $link['url'] ?>" class="button button--alt"><?= $link['title']; ?></a>
  <?php endif; ?>
</section>
