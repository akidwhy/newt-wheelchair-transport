<?php
// Default page template — used for any page without a specific template.
get_header();
?>
<section class="page-hero">
  <div class="container">
    <h1><?php the_title(); ?></h1>
  </div>
</section>
<section class="section">
  <div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="entry-content"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
  </div>
</section>
<?php get_footer(); ?>
