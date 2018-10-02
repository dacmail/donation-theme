<?php if (get_query_var('thanks')) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <article class="donate-page donate-page--thanks">
      <div class="container">
        <h1>¡Gracias!</h1>
        <p>
          <span id="track-id" class="track-code">
            <span class="indications">Introduce esta hoja en el embalaje de tu bicicleta para llevar el seguimiento de la donación.</span>
            <?php the_title(); ?>
          </span>
        </p>
        <p>Con este nº de seguimiento puedes comprobar el estado de tu donación. <strong>Imprime tu código de seguimiento y entregalo junto con tu bicicleta</strong></p>
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
        <div class="option">
          <h3>Opción 2</h3>
          <p>Ve a la <a href="http://seur.es">página de SEUR</a> para informarte de sus tarifas y organizar una recogida a domilicio. No olvides incluir tu código impreso dentro del embalaje.</p>
        </div>
      </div>
      <h3>¡Gracias por contribuir en el proyecto ‘bicis para la vida’!</h3>
    </section>
  <?php endwhile; ?>
<?php else : ?>
  Pagina seguimiento
<?php endif; ?>
