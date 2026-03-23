<?php
/**
 * Template Name: Home Page
 * The front page of the N.E.W.T. website.
 */
get_header();
$img        = get_template_directory_uri() . '/images/';
$phone      = newt_phone();
$phone_raw  = newt_phone( true );
?>

<!-- ===== HERO ===== -->
<section class="hero">
  <div class="container">
    <div class="hero-grid">
      <div class="hero-content">
        <div class="hero-badge"><span>🚐</span> <?php echo esc_html( get_theme_mod( 'newt_hero_badge', '🚐 Serving Chicagoland Since 2007' ) ); ?></div>
        <h1><?php echo esc_html( get_theme_mod( 'newt_hero_line1', 'Where Can We' ) ); ?><br><?php echo esc_html( get_theme_mod( 'newt_hero_line2', 'Take You Today?' ) ); ?></h1>
        <p><?php echo esc_html( get_theme_mod( 'newt_hero_sub', 'Compassionate, safe, and reliable non-emergency wheelchair transportation for medical appointments, social events, and everyday errands — available around the clock.' ) ); ?></p>
        <div class="hero-actions">
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary btn-lg">Book a Ride</a>
          <div class="hero-phone">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.76 19.79 19.79 0 01.01 1.11 2 2 0 012 .01h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z"/></svg>
            <a href="tel:<?php echo esc_attr( $phone_raw ); ?>" style="color:inherit;"><?php echo esc_html( $phone ); ?></a>
          </div>
        </div>
      </div>
      <div class="hero-card fade-up">
        <h3>Why Choose N.E.W.T.?</h3>
        <div class="hero-feature"><div class="hero-feature-icon">👨‍👩‍👧</div><div><strong>Family Owned &amp; Operated</strong><p>Personal, caring service every single ride</p></div></div>
        <div class="hero-feature"><div class="hero-feature-icon">♿</div><div><strong>ADA-Compliant Ramp Vans</strong><p>Comfortable, modern, fully equipped vehicles</p></div></div>
        <div class="hero-feature"><div class="hero-feature-icon">🕐</div><div><strong>24/7 Availability</strong><p>Around-the-clock service, 365 days a year</p></div></div>
        <div class="hero-feature"><div class="hero-feature-icon">🚶</div><div><strong>Stair-Capable Team</strong><p>Equipment &amp; training to navigate any home</p></div></div>
      </div>
    </div>
  </div>
</section>

<!-- ===== STATS BAR ===== -->
<div class="stats-bar">
  <div class="container">
    <div class="stats-grid">
      <?php for ( $i = 1; $i <= 4; $i++ ) :
        $num    = get_theme_mod( "newt_stat_{$i}_num",    [ '5000', '15', '100', '24' ][ $i - 1 ] );
        $suffix = get_theme_mod( "newt_stat_{$i}_suffix", [ '+', '+', '%', '/7' ][ $i - 1 ] );
        $label  = get_theme_mod( "newt_stat_{$i}_label",  [ 'Rides Completed', 'Years in Service', 'ADA Compliant Fleet', 'Service Availability' ][ $i - 1 ] );
        $display = number_format( (float) $num ) . $suffix;
      ?>
      <div class="stat-item">
        <div class="stat-number" data-count="<?php echo esc_attr( $num ); ?>" data-suffix="<?php echo esc_attr( $suffix ); ?>"><?php echo esc_html( $display ); ?></div>
        <div class="stat-label"><?php echo esc_html( $label ); ?></div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</div>

<!-- ===== WHY CHOOSE ===== -->
<section class="section">
  <div class="container">
    <div class="section-header">
      <span class="section-label">Why N.E.W.T.?</span>
      <h2>Transportation With a Family Touch</h2>
      <p>You never have to give up the quality of your life when you become wheelchair-bound. Our specially trained and compassionate team goes the extra mile for you.</p>
    </div>
    <div class="features-grid">
      <div class="feature-card fade-up"><div class="feature-icon">👨‍👩‍👧</div><h3>Family Owned &amp; Operated</h3><p>We treat every rider like family. Our personal approach means you always speak with someone who genuinely cares.</p></div>
      <div class="feature-card fade-up"><div class="feature-icon">🏠</div><h3>Facilities &amp; Private Residences</h3><p>We pick up from nursing facilities, assisted living centers, hospitals, and private homes alike.</p></div>
      <div class="feature-card fade-up"><div class="feature-icon">🪜</div><h3>Stair Transport Experts</h3><p>We have the specialized equipment and training to safely transport clients up or down stairs.</p></div>
      <div class="feature-card fade-up"><div class="feature-icon">💛</div><h3>Caregiver Rides Free</h3><p>A family member or caregiver can ride along at absolutely no additional charge.</p></div>
      <div class="feature-card fade-up"><div class="feature-icon">🛣️</div><h3>Long Distance Available</h3><p>Need to travel further? We offer long-distance service beyond the Chicagoland area.</p></div>
      <div class="feature-card fade-up"><div class="feature-icon">💳</div><h3>Competitive Rates</h3><p>Transparent pricing with all major credit cards accepted. Quality transport should be accessible.</p></div>
    </div>
  </div>
</section>

<!-- ===== SERVICES ===== -->
<section class="section section-blue">
  <div class="container">
    <div class="section-header">
      <span class="section-label">Where We Go</span>
      <h2>Life Doesn't Stop — Neither Do We</h2>
      <p>From routine medical appointments to birthday parties and everything in between, we're here to take you wherever life calls.</p>
    </div>
    <div class="services-grid">
      <?php
      $services = new WP_Query( [
          'post_type'      => 'newt_service',
          'posts_per_page' => -1,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
          'post_status'    => 'publish',
      ] );

      if ( $services->have_posts() ) :
          while ( $services->have_posts() ) : $services->the_post();
              $icon = get_post_meta( get_the_ID(), '_service_icon', true );
      ?>
          <div class="service-item fade-up">
            <div class="service-icon"><?php echo esc_html( $icon ?: '🚐' ); ?></div>
            <span><?php the_title(); ?></span>
          </div>
      <?php
          endwhile;
          wp_reset_postdata();
      else :
          // Fallback defaults if no services are in the database yet
          $default_services = [
              [ '🏥', 'Medical Appointments' ],
              [ '💒', 'Weddings &amp; Special Occasions' ],
              [ '👨‍👩‍👧‍👦', 'Family Gatherings' ],
              [ '⛪', 'Church Services' ],
              [ '🎂', 'Birthday Parties' ],
              [ '✝️', 'Christenings &amp; Baptisms' ],
              [ '🛒', 'Shopping &amp; Errands' ],
              [ '🎭', 'Group Events' ],
              [ '✈️', 'Airport Transfers' ],
          ];
          foreach ( $default_services as $s ) {
              echo '<div class="service-item fade-up"><div class="service-icon">' . $s[0] . '</div><span>' . $s[1] . '</span></div>';
          }
      endif;
      ?>
    </div>
  </div>
</section>

<!-- ===== OUR VEHICLES ===== -->
<section class="section section-alt">
  <div class="container">
    <div class="section-header">
      <span class="section-label">Our Fleet</span>
      <h2>Comfortable, Safe &amp; ADA-Compliant Vans</h2>
      <p>Our modern ramp vans are specifically equipped for wheelchair transport — clean, climate-controlled, and maintained to the highest safety standards.</p>
    </div>
    <div class="vehicles-showcase">
      <div class="vehicle-main fade-up">
        <img src="<?php echo esc_url( $img . 'van-ramp.png' ); ?>" alt="N.E.W.T. wheelchair van with ramp deployed" />
        <div class="vehicle-main-caption">
          <strong>Spacious Interior &amp; Ramp Access</strong>
          <span>Room for wheelchairs, caregivers, and family members — all riding together</span>
        </div>
      </div>
      <div class="vehicle-side">
        <div class="vehicle-thumb fade-up">
          <img src="<?php echo esc_url( $img . 'van-exterior.png' ); ?>" alt="N.E.W.T. blue Honda wheelchair van exterior" />
          <div class="vehicle-thumb-caption"><strong>Our Fleet Vehicle</strong><span>Clean, well-maintained ADA ramp van</span></div>
        </div>
        <div class="vehicle-thumb fade-up">
          <img src="<?php echo esc_url( $img . 'van-interior-diagram.png' ); ?>" alt="Wheelchair van interior layout" />
          <div class="vehicle-thumb-caption"><strong>Interior Layout</strong><span>Designed for comfort and accessibility</span></div>
        </div>
        <div class="vehicle-features fade-up">
          <div class="vehicle-feat-item"><span class="vehicle-feat-icon">♿</span><span>Full ADA compliance</span></div>
          <div class="vehicle-feat-item"><span class="vehicle-feat-icon">🔒</span><span>Secure wheelchair tie-downs</span></div>
          <div class="vehicle-feat-item"><span class="vehicle-feat-icon">❄️</span><span>Climate controlled</span></div>
          <div class="vehicle-feat-item"><span class="vehicle-feat-icon">✨</span><span>Always clean &amp; inspected</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== TESTIMONIALS PREVIEW ===== -->
<section class="section">
  <div class="container">
    <div class="section-header">
      <span class="section-label">Client Stories</span>
      <h2>What Families Are Saying</h2>
      <p>Don't just take our word for it — hear from the families and individuals who trust us every day.</p>
    </div>
    <div class="testimonials-grid">
      <?php
      $featured = new WP_Query( [
          'post_type'      => 'newt_testimonial',
          'posts_per_page' => 3,
          'post_status'    => 'publish',
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
          'meta_query'     => [ [
              'key'     => '_testimonial_featured',
              'value'   => '1',
              'compare' => '=',
          ] ],
      ] );

      if ( $featured->have_posts() ) :
          while ( $featured->have_posts() ) : $featured->the_post();
              $location = get_post_meta( get_the_ID(), '_testimonial_location', true );
              $rating   = (int) ( get_post_meta( get_the_ID(), '_testimonial_rating', true ) ?: 5 );
              $stars    = str_repeat( '★', $rating ) . str_repeat( '☆', 5 - $rating );
              $initials = implode( '', array_map( fn($w) => strtoupper( $w[0] ), array_filter( explode( ' ', get_the_title() ) ) ) );
              $initials = substr( $initials, 0, 2 );
      ?>
          <div class="testimonial-card fade-up">
            <div class="stars"><?php echo esc_html( $stars ); ?></div>
            <blockquote>"<?php echo wp_kses_post( get_the_content() ); ?>"</blockquote>
            <div class="testimonial-author">
              <div class="author-avatar"><?php echo esc_html( $initials ); ?></div>
              <div class="author-info">
                <strong><?php the_title(); ?></strong>
                <?php if ( $location ) : ?><span><?php echo esc_html( $location ); ?></span><?php endif; ?>
              </div>
            </div>
          </div>
      <?php
          endwhile;
          wp_reset_postdata();
      else :
          // Fallback if no testimonials in database yet
          $fallbacks = [
              [ 'SM', 'Sandra M.', 'Naperville, IL', 'N.E.W.T. has been absolutely wonderful for my mother. The driver is always punctual, incredibly kind, and treats her with so much dignity. We couldn\'t be more grateful.' ],
              [ 'RJ', 'Robert J.', 'Oak Park, IL',   'After my surgery I needed regular rides to physical therapy. N.E.W.T. was always there — on time, professional, and the van is spotless. Highly recommend!' ],
              [ 'KL', 'Karen L.',  'Bolingbrook, IL', 'They took my grandfather to our family reunion. He was so happy, and the driver was patient and helpful getting him in and out. It meant the world to our whole family.' ],
          ];
          foreach ( $fallbacks as $f ) {
              echo '<div class="testimonial-card fade-up"><div class="stars">★★★★★</div><blockquote>"' . esc_html( $f[3] ) . '"</blockquote><div class="testimonial-author"><div class="author-avatar">' . esc_html( $f[0] ) . '</div><div class="author-info"><strong>' . esc_html( $f[1] ) . '</strong><span>' . esc_html( $f[2] ) . '</span></div></div></div>';
          }
      endif;
      ?>
    </div>
    <div class="text-center mt-3">
      <a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>" class="btn btn-outline-dark">Read More Stories</a>
    </div>
  </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="cta-banner">
  <div class="container">
    <h2><?php echo esc_html( get_theme_mod( 'newt_cta_headline', 'Ready to Book Your Ride?' ) ); ?></h2>
    <p><?php echo esc_html( get_theme_mod( 'newt_cta_sub', "Call us anytime or fill out our convenient contact form — we're available 24/7 to help you get where you need to go." ) ); ?></p>
    <div class="cta-actions">
      <a href="tel:<?php echo esc_attr( $phone_raw ); ?>" class="btn btn-white btn-lg">📞 <?php echo esc_html( $phone ); ?></a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline btn-lg">Send a Message</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
