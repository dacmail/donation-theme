<?php use Roots\Sage\Extras ?>
<div class="container post__wrapper">
  <?php foreach ($posts as $post) :  the_post()?>
  <article class="post <?php echo has_post_thumbnail() ? 'post--image' : '' ?>">
    <?php the_post_thumbnail('news_image', ['class' => 'post__image']) ?>
    <div class="post_-content">
      <p class="post__date"><?php the_time(get_option('date_format')) ?></p>
      <h2 class="post__title"><a target="_blank" href="<?php the_field('link') ?>"><?php the_title(); ?></a></h2>
      <?php the_excerpt() ?>
      <p class="post__link"><a target="_blank" href="<?php the_field('link') ?>"><?php esc_html_e('Leer noticia completa', 'bicisparalavida'); ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"><path fill="#05ce7c" d="M15.085 0a.83.83 0 0 0-.099.009H10.66a.88.88 0 0 0-.344.064c-.1.044-.21.1-.293.192s-.15.18-.196.3a.89.89 0 0 0-.068.342c0 .118.023.235.068.343s.112.207.196.3a.89.89 0 0 0 .293.192.9.9 0 0 0 .344.064h2.297l-8.256 8.256a.89.89 0 0 0-.2.288.88.88 0 0 0-.073.343c-.001.12.02.236.066.345s.1.2.194.293.183.15.293.194.226.067.345.066a.88.88 0 0 0 .343-.073c.11-.047.207-.115.288-.2l8.256-8.256V5.34a.88.88 0 0 0 .064.344c.044.1.1.21.192.293s.18.15.3.196.225.068.343.068a.89.89 0 0 0 .342-.068c.1-.046.208-.112.3-.196a.89.89 0 0 0 .192-.293.88.88 0 0 0 .064-.344V1a.89.89 0 0 0-.03-.381c-.038-.124-.103-.238-.19-.334a.89.89 0 0 0-.31-.223c-.12-.05-.248-.075-.377-.072zM1.777.01A1.79 1.79 0 0 0 0 1.786v12.437A1.79 1.79 0 0 0 1.777 16h12.437a1.79 1.79 0 0 0 1.777-1.777v-5.33a.88.88 0 0 0-.064-.344c-.044-.1-.1-.21-.192-.292s-.18-.15-.3-.196-.225-.07-.342-.07-.235.024-.343.07a.88.88 0 0 0-.29.196c-.083.083-.148.183-.192.292s-.066.226-.064.344v5.33H1.777V1.786h5.33a.9.9 0 0 0 .344-.064c.1-.044.21-.1.292-.192s.15-.18.196-.3.07-.225.07-.343-.024-.234-.07-.342a.86.86 0 0 0-.196-.29C7.66.182 7.56.117 7.45.073S7.225.007 7.107.01h-5.33z"/></svg></a></p>
    </div>
  </article>
  <?php endforeach; ?>
  <?php Extras\ungrynerd_pagination(); ?>
</div>
