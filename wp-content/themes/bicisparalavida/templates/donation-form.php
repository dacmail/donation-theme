<form method="post" action="<?php echo admin_url('admin-ajax.php'); ?>" validate>
  <p><input name="donor_email" type="email" placeholder="Correo electrónico" required></p>
  <p><input name="donor_name" type="text" placeholder="Nombre y apellidos" required></p>
  <p><input name="donor_cp" type="text" pattern="[0-9]{5}" placeholder="Código postal" required></p>
  <p><input name="accept" id="accept" type="checkbox" required> <label for="accept">Acepto la forma en que se <a href="<?= get_theme_mod('ungrynerd_policy'); ?>">tratan mis datos</a></label></p>
  <p><input name="donate_form" type="submit" value="Donar" class="button"></p>
  <?php wp_nonce_field('new_donation', 'new_donation_nonce'); ?>
  <input name="action" value="new_donation" type="hidden">
</form>

