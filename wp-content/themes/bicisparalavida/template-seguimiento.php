<?php
/*
  Template Name: Seguimiento
*/
?>
<?php while (have_posts()) : the_post(); ?>
  <article class="donate-page">
    <div class="container">
      <h1><?php the_title() ?></h1>
      <?php the_content(); ?>
      <?php get_template_part('templates/status-form'); ?>
    </div>
  </article>
<?php endwhile; ?>
