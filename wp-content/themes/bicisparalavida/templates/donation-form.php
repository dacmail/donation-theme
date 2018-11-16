<form method="post" action="<?php echo admin_url('admin-ajax.php'); ?>" validate>
  <p><input name="donor_email" type="email" placeholder="Correo electrónico" required></p>
  <p><input name="donor_name" type="text" placeholder="Nombre y apellidos" required></p>
  <p><input name="donor_cp" type="text" pattern="[0-9]{5}" placeholder="Código postal" required></p>
  <p><input name="accept" id="accept" type="checkbox" required> <label for="accept">Acepto las condiciones del <a href="<?= get_theme_mod('ungrynerd_policy'); ?>" target="_blank">tratamiento de datos por parte de la Fundación Alberto Contador</a></label></p>
  <p><input name="accept_skoda" id="accept_skoda" type="checkbox"> <label for="accept_skoda">Acepto las <a href="<?= get_theme_mod('ungrynerd_form_policy'); ?>" target="_blank">condiciones de la cesión de datos a VOLKSWAGEN GROUP ESPAÑA DISTRIBUCIÓN S.A. y a las empresas del grupo</a></label></p>
  <p><input name="donate_form" type="submit" value="Donar" class="button"></p>
  <?php wp_nonce_field('new_donation', 'new_donation_nonce'); ?>
  <input name="action" value="new_donation" type="hidden">
</form>

