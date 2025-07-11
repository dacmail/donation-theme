<?php while (have_posts()) : the_post(); ?>
  <article class="donate-page donate-page--thanks">
    <div class="container">
      <h1>¡Gracias!</h1>
      <div id="track-id" class="track-code">
        <div class="indications">
          <?php the_custom_logo(); ?>
          <p>Introduce esta hoja en el embalaje de tu bicicleta para llevar el seguimiento de la donación. </p>
          <h3>IMPORTANTE!</h3>
          <p>Para poder hacer un correcto seguimiento de tu bicicleta, el número de serie generado en este documento debe ir incorporado en la bicicleta.</p>
          <?= do_shortcode('[kaya_qrcode content="' . get_the_title() . '"]') ?>
        </div>
        <?php the_title(); ?>
      </div>
      <p>Con este nº de seguimiento puedes comprobar el estado de tu donación. <strong>Imprime tu código de seguimiento y entregalo junto con tu bicicleta.</strong>. Si quieres donar más de una bicicleta deberás generar <strong>un código de seguimiento por cada bicicleta que dones.</strong></p>
      <p><a id="print" href="#" class="button">Imprimir código</a></p>
    </div>
  </article>
  <section class="instructions">
    <p>Ya estamos casi, sigue estos pasos para la entrega de tu bicicleta:</p>
    <div class="options">
      <div class="option">
        <h3>SEUR</h3>
        <p>Busca tu oficina más cercana de SEUR en el mapa que encontrarás en la <a href="<?= home_url('/') ?>">página principal</a> y lleva tu bicicleta junto con el código que te hemos facilitado.</p>
      </div>
    </div>
    <h3>¡Gracias por contribuir en el proyecto ‘Bicis para la Vida by Skoda’!</h3>
  </section>
<?php endwhile; ?>
