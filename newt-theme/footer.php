<?php $img = esc_url( get_template_directory_uri() . '/images/logo.png' ); ?>

<footer class="footer">
  <div class="container">
    <div class="footer-grid">

      <div class="footer-brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
          <img src="<?php echo $img; ?>" alt="<?php bloginfo( 'name' ); ?>" class="nav-logo-img" />
        </a>
        <p>Family-owned wheelchair transportation serving the Chicagoland area with compassion, safety, and reliability since 2007.</p>
        <a href="tel:6305426398" class="footer-phone">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.76 19.79 19.79 0 01.01 1.11 2 2 0 012 .01h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z"/></svg>
          (630) 542-6398
        </a>
      </div>

      <div class="footer-col">
        <h4>Navigation</h4>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
          <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a></li>
          <li><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">FAQ</a></li>
          <li><a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>">Testimonials</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Services</h4>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Medical Appointments</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Airport Transfers</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Special Occasions</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Errands &amp; Shopping</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Long Distance Rides</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Contact</h4>
        <ul>
          <li><a href="tel:6305426398">(630) 542-6398</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Send a Message</a></li>
          <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">Our Service Area</a></li>
          <li><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">Common Questions</a></li>
        </ul>
      </div>

    </div>
    <div class="footer-bottom">
      <span>&copy; <?php echo date( 'Y' ); ?> N.E.W.T. Non-Emergency Wheelchair Transport. All rights reserved.</span>
      <span>Serving the Chicagoland Area with Care</span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
