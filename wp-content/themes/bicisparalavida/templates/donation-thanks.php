<?php while (have_posts()) : the_post(); ?>
  <article class="donate-page donate-page--thanks">
    <div class="container">
      <h1>¡Gracias!</h1>
      <p>
        <span id="track-id" class="track-code">
          <span class="indications"><?php the_custom_logo(); ?> Introduce esta hoja en el embalaje de tu bicicleta para llevar el seguimiento de la donación. <?= do_shortcode('[qrcodetag]' . get_the_title() . '[/qrcodetag]') ?></span>
          <?php the_title(); ?>
        </span>
      </p>
      <p>Con este nº de seguimiento puedes comprobar el estado de tu donación. <strong>Imprime tu código de seguimiento y entregalo junto con tu bicicleta.</strong>. Si quieres donar más de una bicicleta deberás generar <strong>un código de seguimiento por cada bicicleta que dones.</strong></p>
      <p><a id="print" href="#" class="button">Imprimir código</a></p>
    </div>
  </article>
  <section class="instructions">
    <p>Ya estamos casi, te damos dos opciones para la entrega de tu bicicleta:</p>
    <div class="options">
      <div class="option">
        <h3>Opción 1</h3>
        <p>Busca tu oficina más cercana de SEUR o SKODA en el mapa que encontrarás en la <a href="<?= home_url('/') ?>">página principal</a> y lleva tu bicicleta junto con el código que te hemos facilitado.</p>
      </div>
    </div>
    <h3>¡Gracias por contribuir en el proyecto ‘Bicis para la Vida by Skoda’!</h3>
  </section>
<?php endwhile; ?>
