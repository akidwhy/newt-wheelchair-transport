<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="navbar">
  <div class="container">
    <nav class="nav-inner" role="navigation" aria-label="Main navigation">

      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png"
             alt="<?php bloginfo( 'name' ); ?>"
             class="nav-logo-img" />
      </a>

      <?php
      wp_nav_menu( [
          'theme_location' => 'primary',
          'menu_class'     => 'nav-links',
          'container'      => false,
          'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'fallback_cb'    => 'newt_primary_nav_fallback',
      ] );
      ?>

      <button class="hamburger" aria-label="Toggle menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </nav>

    <!-- Mobile menu (separate nav menu registration or cloned) -->
    <div class="mobile-menu" role="navigation" aria-label="Mobile navigation">
      <?php
      wp_nav_menu( [
          'theme_location' => 'mobile',
          'menu_class'     => 'mobile-nav-links',
          'container'      => false,
          'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'fallback_cb'    => 'newt_mobile_nav_fallback',
      ] );
      ?>
    </div>
  </div>
</header>

<?php
/**
 * Fallback nav if no menu is assigned — outputs hardcoded links.
 */
function newt_primary_nav_fallback() {
    $contact_url = esc_url( home_url( '/contact/' ) );
    echo '<ul class="nav-links">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/about/' ) ) . '">About Us</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/faq/' ) ) . '">FAQ</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/testimonials/' ) ) . '">Testimonials</a></li>';
    echo '<li><a href="' . $contact_url . '">Contact Us</a></li>';
    echo '</ul>';
}

function newt_mobile_nav_fallback() {
    echo '<ul class="mobile-nav-links">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/about/' ) ) . '">About Us</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/faq/' ) ) . '">FAQ</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/testimonials/' ) ) . '">Testimonials</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/contact/' ) ) . '">Contact Us</a></li>';
    echo '</ul>';
}
?>
