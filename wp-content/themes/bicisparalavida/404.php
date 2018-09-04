<section class="404">
  <div class="container">
    <h1 class="title">
      <?php _e('Lo sentimos, la página que buscas no existe', 'hde' ); ?>
    </h1>
    <div class="not-found">
      <p><?php esc_html_e('Quizá has escrito mal la dirección, o la hemos roto nosotros. ', 'hde'); ?></p>
      <p><?php printf(__('Puedes ir a la <a href="%1$s">página de inicio</a> o usar este buscador para encontrar lo que buscas:', 'ungrynerd'), home_url('/')); ?></p>
      <?php get_search_form(); ?>
    </div>
  </div>
</section>
