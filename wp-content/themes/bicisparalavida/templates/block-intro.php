<section class="intro">
  <div class="container">
    <h1 class="intro__title"><?php the_field('title') ?></h1>
    <p><?php the_field('text') ?></p>
    <?php $link = get_field('link'); ?>
    <?php if ($link) : ?>
      <p>
        <a target="<?= $link['target'] ?>" href="<?= $link['url'] ?>" class="button"><?= $link['title']; ?></a>
      </p>
    <?php endif; ?>
  </div>
</section>
