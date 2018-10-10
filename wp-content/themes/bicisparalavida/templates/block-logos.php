<section class="logos">
  <div class="container">
    <?php $logos = get_field('logos', get_option('page_on_front')); ?>
    <?php foreach ($logos as $logo) : ?>
      <?= wp_get_attachment_image($logo['ID'], 'un_medium', false, array('class' => 'logos__logo'));?>
    <?php endforeach; ?>
  </div>
</section>