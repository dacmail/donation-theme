<?php use Roots\Sage\Extras; ?>
<?php while (have_posts()) : the_post(); ?>
  <?php $status_strings = array(
      0 => array(
            'title' => esc_html__('En camino', 'ungrynerd'),
            'desc' => esc_html__('Estamos a la espera de recibir tu bicicleta', 'ungrynerd'),
            'img' => 'status-0',
      ),
      1 => array(
            'title' => esc_html__('Recibida', 'ungrynerd'),
            'desc' => esc_html__('Tu bicicleta está en nuestro almacén lista para ser donada', 'ungrynerd'),
            'img' => 'status-1',
      ),
      2 => array(
            'title' => esc_html__('Recibida', 'ungrynerd'),
            'desc' => esc_html__('Tu bicicleta está siendo despiezada en nuestro taller para la reutilización de sus piezas', 'ungrynerd'),
            'img' => 'status-2',
      ),
      3 => array(
            'title' => esc_html__('Donada', 'ungrynerd'),
            'desc' => esc_html__('Tu bicicleta ha sido entregada, ¡Gracias!', 'ungrynerd'),
            'img' => 'status-2',
      )
  ); ?>
  <?php $status = get_field('status'); ?>
  <article class="donate-page donate-page--status">
    <div class="container status">
      <?= Extras\inline_svg($status_strings[$status]['img']); ?>
      <h2 class="status__title"><?= $status_strings[$status]['title'] ?></h2>
      <p>
        <?= $status_strings[$status]['desc'] ?>
      </p>
    </div>
  </article>
<?php endwhile; ?>
