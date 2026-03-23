<?php
// WordPress required fallback template.
get_header();
?>
<section class="section">
  <div class="container">
    <div class="section-header">
      <h2><?php the_title(); ?></h2>
    </div>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
  </div>
</section>
<?php get_footer(); ?>
