<?php get_template_part('templates/block-logos') ?>
<footer class="footer">
  <p class="copy">
    <strong>© <?php echo date('Y') ?> - <?php esc_html_e('BICIS PARA LA VIDA.', 'ungrynerd'); ?></strong>
  </p>
  <p class="legal">
    <a target="_blank" href="https://www.facebook.com/fundacionalbertocontador">Facebook</a> |
    <a target="_blank" href="https://www.instagram.com/fundacionalbertocontador/">Instagram</a> |
    <a target="_blank" href="https://twitter.com/FundContador">Twitter</a>
  </p>

  <p class="legal">
    <?php esc_html_e('Todos los derechos reservados. Prohibida su copia o reproducción sin autorización expresa.', 'ungrynerd'); ?>
    - <a href="<?= get_theme_mod('ungrynerd_legal'); ?>">
      <?php esc_html_e('Aviso legal', 'ungrynerd'); ?>
    </a>
    - <a href="<?= get_theme_mod('ungrynerd_policy'); ?>">
      <?php esc_html_e('Política de privacidad', 'ungrynerd'); ?>
    </a>
    - <a href="<?= get_theme_mod('ungrynerd_cookies'); ?>">
      <?php esc_html_e('Política de cookies', 'ungrynerd'); ?>
    </a>
    - <a href="<?= get_theme_mod('ungrynerd_contact'); ?>">
      <?php esc_html_e('Contacta', 'ungrynerd'); ?>
    </a>
  </p>

  <p class="by">
    <a target="_blank" href="http://ungrynerd.com">
      <?php esc_html_e('Diseño y desarrollo', 'ungrynerd'); ?> <strong>UNGRYNERD</strong>
    </a>
  </p>
</footer>
<?php if (get_field('donate', 'option')) : ?>
  <a target="_blank" href="<?php the_field('donate', 'option') ?>" class="c-donate">
    <?php _e('Donar', 'fundacionalbertocontador') ?>
    <svg width="27" height="24" viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="m21.23 13.36-5.03 3.973H9.45V16h5.488a.682.682 0 0 0 .595-.352.66.66 0 0 0-.034-.684l-1.198-1.776a2.682 2.682 0 0 0-.972-.873A2.72 2.72 0 0 0 12.055 12H1.35c-.358 0-.701.14-.955.39-.253.25-.395.59-.395.943v8c0 .708.284 1.386.79 1.886.507.5 1.194.781 1.91.781h13.013c.577 0 1.148-.122 1.673-.357.526-.236.995-.58 1.375-1.008L27 13.333l-1.96-.645a4.097 4.097 0 0 0-3.81.672zm2.068-7.507a3.45 3.45 0 0 0 .986-2.424 3.45 3.45 0 0 0-.986-2.424A3.339 3.339 0 0 0 20.917 0s-1.68-.004-3.367 1.715C15.862-.004 14.183 0 14.183 0a3.343 3.343 0 0 0-2.381 1.004 3.452 3.452 0 0 0-.986 2.424c0 .947.377 1.805.986 2.424L17.55 12l5.748-6.147z" fill="#00A1DF" />
    </svg>
  </a>
<?php endif; ?>
