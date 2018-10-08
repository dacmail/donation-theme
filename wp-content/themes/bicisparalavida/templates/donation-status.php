<?php use Roots\Sage\Extras; ?>
<?php while (have_posts()) : the_post(); ?>
  <?php $status_strings = array(
      0 => array(
            'title' => esc_html__('En camino', 'ungrynerd'),
            'desc' => esc_html__('Tu donación está de camino a nuestros almacenes', 'ungrynerd'),
            'img' => 'status-0',
      ),
      1 => array(
            'title' => esc_html__('Reparándose', 'ungrynerd'),
            'desc' => esc_html__('Tu donación está siendo reparada en uno de nuestros talleres', 'ungrynerd'),
            'img' => 'status-1',
      ),
      2 => array(
            'title' => esc_html__('Donada', 'ungrynerd'),
            'desc' => esc_html__('Tu donación ha sido entregada', 'ungrynerd'),
            'img' => 'status-2',
      ),
      3 => array(
            'title' => esc_html__('Donada', 'ungrynerd'),
            'desc' => esc_html__('Tu donación ha sido entregada', 'ungrynerd'),
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
