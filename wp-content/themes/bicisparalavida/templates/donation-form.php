<form id="donationForm" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>" validate>
  <p><input name="donor_email" id="email" type="email" placeholder="Correo electrónico" required></p>
  <p><input name="donor_name" type="text" placeholder="Nombre y apellidos" required></p>
  <p><input name="donor_cp" type="text" pattern="[0-9]{5}" placeholder="Código postal" required></p>

  <p><small>Los datos que nos facilites van a ser tratados por la Fundación Alberto Contadorcon dirección en Calle Zurbano 73, 5º ext. Dcha., 28010, Madrid y correo electrónico contacto@fundacioncontadorteam.com. La finalidad principal del tratamiento es la gestión de tu donación. Este tratamiento se basa en tu consentimiento. Puedes ejercitar tus derechos (acceso, rectificación, supresión, oposición, limitación y portabilidad, en su caso) dirigiéndote a nosotros a cualquiera de las direcciones indicadas en el párrafo anterior, adjuntando fotocopia del DNI e indicándonos qué actuación por nuestra parte solicitas. Si quieres saber más sobre cómo tratamos tus datos, <a href="<?= get_theme_mod('ungrynerd_policy'); ?>">PINCHA AQUÍ</a> </small></p>

  <p><input name="accept" id="accept" type="checkbox" required> <label for="accept">He leído y acepto la <a href="<?= get_theme_mod('ungrynerd_policy'); ?>" target="_blank">Política de privacidad</a></label></p>
  <p><input name="accept_skoda" id="accept_skoda" type="checkbox"> <label for="accept_skoda">Acepto las <a href="<?= get_theme_mod('ungrynerd_form_policy'); ?>" target="_blank">condiciones de la cesión de datos a VOLKSWAGEN GROUP ESPAÑA DISTRIBUCIÓN S.A. y a las empresas del grupo</a></label></p>
  <p><input name="donate_form" type="submit" value="Donar" class="button"></p>
  <?php wp_nonce_field('new_donation', 'new_donation_nonce'); ?>
  <input name="action" value="new_donation" type="hidden">
</form>

<script>
  jQuery('#donationForm').submit(function(event) {
    event.preventDefault();
    var email = jQuery('#email').val();

    grecaptcha.ready(function() {
      grecaptcha.execute('6LeNMG0aAAAAADv2QgAgcBFmQIWNc-4-4645vQzY', {
        action: 'subscribe_newsletter'
      }).then(function(token) {
        jQuery('#donationForm').prepend('<input type="hidden" name="r_token" value="' + token + '">');
        jQuery('#donationForm').prepend('<input type="hidden" name="r_action" value="subscribe_newsletter">');
        jQuery('#donationForm').unbind('submit').submit();
      });
    });
  });
</script>
