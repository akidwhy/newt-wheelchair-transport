<?php
/**
 * Template Name: About Us
 * Assigned to the page with slug: about
 *
 * The "Our Story" body text is pulled from the page's WordPress editor content,
 * so it can be edited freely from WP Admin → Pages → About Us.
 */
get_header();
$img       = get_template_directory_uri() . '/images/';
$phone     = newt_phone();
$phone_raw = newt_phone( true );

// Grab the page content for the story paragraphs
$story_content = '';
if ( have_posts() ) {
    the_post();
    $story_content = get_the_content();
}

// Default story text shown when the editor is blank
$default_story = '<p>N.E.W.T. was founded with one core mission: to give wheelchair-bound individuals the freedom to live their lives fully. Whether it\'s a doctor\'s appointment, a family gathering, or a night out, we believe your mobility challenges should never limit your world.</p><p>As a family-owned and operated business, we bring a personal touch to every single trip. You won\'t reach a call center — you\'ll speak with someone who genuinely cares about you and your loved ones.</p>';
?>

<section class="page-hero">
  <div class="container">
    <span class="section-label" style="color:rgba(255,255,255,0.7);">Our Story</span>
    <h1>About N.E.W.T.</h1>
    <p>A family-owned company built on a simple belief: everyone deserves dignified, compassionate transportation — no matter their mobility challenges.</p>
  </div>
</section>

<div class="breadcrumb"><div class="container"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>›</span> About Us</div></div>

<!-- Our Story -->
<section class="section">
  <div class="container">
    <div class="about-grid">
      <div class="about-image-wrap fade-up">
        <img src="<?php echo esc_url( $img . 'van-ramp.png' ); ?>" alt="N.E.W.T. wheelchair van with ramp deployed" />
      </div>
      <div class="fade-up">
        <span class="section-label">Who We Are</span>
        <h2>More Than Just a Ride</h2>
        <div style="margin-top:0.75rem;">
          <?php echo $story_content ? wp_kses_post( $story_content ) : wp_kses_post( $default_story ); ?>
        </div>
        <div class="value-list" style="margin-top:1.25rem;">
          <div class="value-item"><div class="value-check">✓</div><div><strong>Trained, compassionate drivers</strong><p>Our team undergoes thorough training to ensure the safety and comfort of every rider.</p></div></div>
          <div class="value-item"><div class="value-check">✓</div><div><strong>Stair transport specialists</strong><p>We have the equipment and expertise to transport clients safely up or down stairs.</p></div></div>
          <div class="value-item"><div class="value-check">✓</div><div><strong>Fully ADA-compliant ramp vans</strong><p>Our modern fleet meets all ADA standards for comfortable, safe wheelchair transport.</p></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Our Values -->
<section class="section section-blue">
  <div class="container">
    <div class="section-header">
      <span class="section-label">Our Values</span>
      <h2>The Principles That Drive Us</h2>
      <p>Every decision we make is guided by a set of core values that put our riders first.</p>
    </div>
    <div class="values-grid">
      <div class="value-card fade-up"><div class="value-card-icon">❤️</div><h3>Compassion</h3><p>We treat every rider with the warmth, patience, and respect they deserve.</p></div>
      <div class="value-card fade-up"><div class="value-card-icon">🛡️</div><h3>Safety</h3><p>Our drivers are trained, our vehicles are maintained, and our equipment is inspected before every ride.</p></div>
      <div class="value-card fade-up"><div class="value-card-icon">⏰</div><h3>Reliability</h3><p>When you count on us, we show up — on time, every time.</p></div>
      <div class="value-card fade-up"><div class="value-card-icon">🤝</div><h3>Dignity</h3><p>Our approach is always respectful, never rushed, and always attentive.</p></div>
      <div class="value-card fade-up"><div class="value-card-icon">🏡</div><h3>Community</h3><p>We are proud members of the Chicagoland community.</p></div>
      <div class="value-card fade-up"><div class="value-card-icon">🌟</div><h3>Excellence</h3><p>Every detail of the ride experience is something we take pride in.</p></div>
    </div>
  </div>
</section>

<!-- Our Vehicles -->
<section class="section section-alt">
  <div class="container">
    <div class="section-header">
      <span class="section-label">Our Fleet</span>
      <h2>Modern, ADA-Compliant Ramp Vans</h2>
      <p>Every vehicle in our fleet is specifically outfitted for wheelchair transport — clean, safe, and maintained to the highest standards.</p>
    </div>
    <div class="about-vehicles-grid">
      <div class="about-vehicle-card fade-up"><div class="about-vehicle-img"><img src="<?php echo esc_url( $img . 'van-exterior.png' ); ?>" alt="N.E.W.T. fleet vehicle exterior" /></div><div class="about-vehicle-info"><h3>Our Fleet Vehicle</h3><p>A clean, well-maintained ADA ramp van that keeps our riders comfortable from pickup to drop-off.</p></div></div>
      <div class="about-vehicle-card fade-up"><div class="about-vehicle-img"><img src="<?php echo esc_url( $img . 'van-interior-diagram.png' ); ?>" alt="Wheelchair van interior layout" /></div><div class="about-vehicle-info"><h3>Spacious Interior</h3><p>Designed to accommodate wheelchairs, caregivers, and family members together in comfort.</p></div></div>
      <div class="about-vehicle-card fade-up"><div class="about-vehicle-img"><img src="<?php echo esc_url( $img . 'van-ramp.png' ); ?>" alt="Wheelchair van ramp deployed" /></div><div class="about-vehicle-info"><h3>Easy Ramp Access</h3><p>Our hydraulic ramp makes boarding and exiting safe and effortless for every rider.</p></div></div>
    </div>
  </div>
</section>

<!-- What Sets Us Apart -->
<section class="section">
  <div class="container">
    <div class="about-grid" style="align-items:start;">
      <div class="fade-up">
        <span class="section-label">What Makes Us Different</span>
        <h2>The N.E.W.T. Difference</h2>
        <p style="margin-top:0.75rem;margin-bottom:1.25rem;">Here's what you can always expect from us:</p>
        <div class="value-list">
          <div class="value-item"><div class="value-check">✓</div><div><strong>Caregiver or family rides free</strong><p>Your support person is always welcome at no extra charge.</p></div></div>
          <div class="value-item"><div class="value-check">✓</div><div><strong>Pickup from anywhere</strong><p>We serve nursing facilities, assisted living centers, hospitals, and private residences.</p></div></div>
          <div class="value-item"><div class="value-check">✓</div><div><strong>Long-distance service available</strong><p>Need to travel beyond the metro area? Give us a call to arrange.</p></div></div>
          <div class="value-item"><div class="value-check">✓</div><div><strong>Available 24 hours, 7 days a week</strong><p>Life doesn't follow a 9-to-5 schedule, and neither do we.</p></div></div>
          <div class="value-item"><div class="value-check">✓</div><div><strong>Transparent, competitive pricing</strong><p>No hidden fees. We accept all major credit cards.</p></div></div>
        </div>
      </div>
      <div class="fade-up">
        <div class="service-area">
          <h4>Our Service Area</h4>
          <p style="font-size:0.9rem;color:var(--text-light);margin-bottom:0.5rem;">Proudly serving communities throughout the greater Chicagoland region:</p>
          <div class="area-tags">
            <?php
            $areas = ['Chicago','Naperville','Aurora','Joliet','Elgin','Waukegan','Cicero','Evanston','Schaumburg','Bolingbrook','Palatine','Oak Park','Tinley Park','Des Plaines','Orland Park','Oak Lawn','Berwyn','Downers Grove','Lombard','Arlington Heights','And More!'];
            foreach ( $areas as $area ) {
                echo '<span class="area-tag">' . esc_html( $area ) . '</span>';
            }
            ?>
          </div>
        </div>
        <div style="background:var(--light-bg);border:1px solid var(--border);border-radius:var(--radius);padding:2rem;margin-top:1.5rem;text-align:center;">
          <h3 style="margin-bottom:0.5rem;">Ready to Ride?</h3>
          <p style="font-size:0.92rem;margin-bottom:1.25rem;">Call us or send a message — we're available 24/7.</p>
          <a href="tel:<?php echo esc_attr( $phone_raw ); ?>" class="btn btn-primary" style="width:100%;justify-content:center;">📞 <?php echo esc_html( $phone ); ?></a>
          <div style="margin:0.75rem 0;color:var(--text-light);font-size:0.85rem;">— or —</div>
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline-dark" style="width:100%;justify-content:center;">Send a Message</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="cta-banner">
  <div class="container">
    <h2>Let Us Take Care of the Ride</h2>
    <p>Focus on what matters most. We'll handle the rest — safely, comfortably, and with a smile.</p>
    <div class="cta-actions">
      <a href="tel:<?php echo esc_attr( $phone_raw ); ?>" class="btn btn-white btn-lg">📞 <?php echo esc_html( $phone ); ?></a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline btn-lg">Book Online</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
