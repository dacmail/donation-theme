<?php

use Roots\Sage\Extras; ?>

<header class="header">
  <div class="container">
    <?php if (has_custom_logo()) : ?>
      <?php the_custom_logo(); ?>
    <?php else : ?>
      <a class="header__site-name" href="<?= esc_url(home_url('/')); ?>">
        <?php bloginfo('name'); ?>
      </a>
    <?php endif ?>

    <?php
    if (has_nav_menu('primary_navigation')) :
      wp_nav_menu([
        'theme_location' => 'primary_navigation',
        'menu_class' => 'menu',
        'container' => 'nav',
        'container_class' => 'header__menu'
      ]);
    endif;
    ?>
    <a class="header__social" target="_blank" href="https://www.facebook.com/bicisparalavida"><?= Extras\inline_svg('facebook'); ?></a>
    <a class="header__social" target="_blank" href="https://www.instagram.com/bicisparalavida/"><?= Extras\inline_svg('instagram'); ?></a>
    <a class="header__social" target="_blank" href="https://twitter.com/BicisparalaVida"><?= Extras\inline_svg('twitter'); ?></a>
    <a class="header__social" target="_blank" href="https://www.youtube.com/@FundacionAlbertoContador"><?= Extras\inline_svg('youtube'); ?></a>

    <a href="#" class="header__menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </a>
  </div>
</header>
