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
