<?php if (get_query_var('thanks')) : ?>
  <?php get_template_part('templates/donation-thanks') ?>
<?php else : ?>
  <?php get_template_part('templates/donation-status') ?>
<?php endif; ?>
