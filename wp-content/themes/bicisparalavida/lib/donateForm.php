<?php

namespace Ungrynerd\DonateForm;

class DonateForm {

  public $name;
  public $email;
  public $cp;
  public $donationCode;
  public $donation;

  public function __construct($name, $email, $cp) {
    if (empty($name) || empty($email) || empty($cp)) {
      throw new \Exception('Falta alguno de los campos del donante');
    }
    $this->name = sanitize_text_field($name);
    $this->email = sanitize_email($email);
    $this->cp = intval($cp);
  }

  public function new_donation() {
    $this->donationCode = date('YmdGis') . $this->cp;
    $donation = wp_insert_post(array(
      'post_title' => $this->donationCode,
      'post_type' => 'un_donation',
      'post_status' => 'publish',
      'meta_input' => array(
        'donor_email' => $this->email,
        'donor_name' => $this->name,
        'donor_cp' => $this->cp,
        'status' => 0
      )
    ));
    if (!is_wp_error($donation)) {
      return $this->donation = $donation;
    } else {
      throw new \Exception('Ha ocurrido un problema al registrar la donación');
    }
  }

  public function send_new_donation_email() {
    $subject = "[Bicis para la Vida] Nueva donación";
    ob_start();
    include(TEMPLATEPATH . '/templates/emailNewDonation.php');
    $message = ob_get_contents();
    ob_end_clean();
    $headers[] = 'From: Bicis para la vida <contacto@bicisparalavida.org>';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    return wp_mail($this->email, $subject, $message, $headers);
  }

  public function send_new_status_email($status) {
    $subject = "[Bicis para la Vida] Nuevo estado para tu donación";
    ob_start();
    include(TEMPLATEPATH . '/templates/emailNewStatus.php');
    $message = ob_get_contents();
    ob_end_clean();
    $headers[] = 'From: Bicis para la vida <contacto@bicisparalavida.org>';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    return wp_mail($this->email, $subject, $message, $headers);
  }
}
