<?php

namespace Ungrynerd\DonateForm;

use Brevo\Client\Configuration;
use Brevo\Client\Api\ContactsApi;
use Brevo\Client\Model\CreateContact;
use GuzzleHttp\Client;

class DonateForm
{

  public $name;
  public $email;
  public $cp;
  public $donationCode;
  public $donation;
  public $skoda;

  public function __construct($name, $email, $cp, $accept_skoda = '')
  {
    if (empty($name) || empty($email) || empty($cp)) {
      throw new \Exception('Falta alguno de los campos del donante');
    }
    $this->skoda = sanitize_text_field($accept_skoda);
    $this->name = sanitize_text_field($name);
    $this->email = sanitize_email($email);
    $this->cp = intval($cp);
  }

  public function new_donation()
  {
    $this->donationCode = date('YmdGis') . $this->cp;
    $donation = wp_insert_post(array(
      'post_title' => $this->donationCode,
      'post_type' => 'un_donation',
      'post_status' => 'publish',
      'meta_input' => array(
        'donor_email' => $this->email,
        'donor_name' => $this->name,
        'donor_cp' => $this->cp,
        'skoda' => $this->skoda,
        'status' => 0
      )
    ));
    if (!is_wp_error($donation)) {
      $this->suscribe_to_newsletter();
      return $this->donation = $donation;
    } else {
      throw new \Exception('Ha ocurrido un problema al registrar la donación');
    }
  }

  public function suscribe_to_newsletter()
  {
    $brevoApiKey = $_ENV['BREVO_API_KEY'] ?? getenv('BREVO_API_KEY') ?? '';

    if (empty($brevoApiKey)) {
      throw new \Exception('BREVO_API_KEY no está configurada en las variables de entorno');
    }

    $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $brevoApiKey);
    $config = Configuration::getDefaultConfiguration()->setApiKey('partner-key', $brevoApiKey);

    $apiInstance = new ContactsApi(
      new Client(),
      $config
    );
    $createContact = new CreateContact([
      'email' => $this->email,
      'updateEnabled' => true,
      'attributes' => ['FIRSTNAME' => $this->name],
      'listIds' => [14]
    ]);
    try {
      $apiInstance->createContact($createContact);
    } catch (\Exception $e) {
      echo 'Exception when calling ContactsApi->createContact: ', $e->getMessage(), PHP_EOL;
    }
  }

  public function send_new_donation_email()
  {
    $subject = "[Bicis para la Vida] Nueva donación";
    ob_start();
    include(TEMPLATEPATH . '/templates/emailNewDonation.php');
    $message = ob_get_contents();
    ob_end_clean();
    $headers[] = 'From: Bicis para la vida <contacto@bicisparalavida.org>';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    return wp_mail($this->email, $subject, $message, $headers);
  }

  public function send_new_status_email($status)
  {
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
