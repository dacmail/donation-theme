<section class="logos">
  <div class="container">
    <?php $logos = get_field('logos', get_option('page_on_front')); ?>
    <?php foreach ($logos as $logo) : ?>
      <a target="_blank" class="logos__logo" href="<?= get_field('link_logo', $logo['ID']) ?>">  <?= wp_get_attachment_image($logo['ID'], 'un_medium', false, array('class' => 'logos__image'));?></a>
    <?php endforeach; ?>
  </div>
</section>

<section class="logos logos--collab">
  <h3 class="step__title"><?php esc_html_e('Colaboran:', 'ungrynerd'); ?></h3>
  <div class="container">
    <?php $logos = get_field('logos_collab', get_option('page_on_front')); ?>
    <?php foreach ($logos as $logo) : ?>
      <a target="_blank" class="logos__logo" href="<?= get_field('link_logo', $logo['ID']) ?>">  <?= wp_get_attachment_image($logo['ID'], 'un_medium', false, array('class' => 'logos__image'));?></a>
    <?php endforeach; ?>
  </div>
</section>
