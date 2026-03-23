<?php
/**
 * Template Name: Testimonials
 * Assigned to the page with slug: testimonials
 */
get_header();
?>

<section class="page-hero">
  <div class="container">
    <span class="section-label" style="color:rgba(255,255,255,0.7);">Client Stories</span>
    <h1>What Families Are Saying</h1>
    <p>Real words from real people. See why families across Chicagoland trust N.E.W.T. for their loved ones' transportation.</p>
  </div>
</section>

<div class="breadcrumb"><div class="container"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>›</span> Testimonials</div></div>

<section class="section">
  <div class="container">

    <div class="rating-summary">
      <div>
        <div class="rating-big">5.0</div>
        <div class="rating-stars">★★★★★</div>
        <div class="rating-count">Based on client reviews</div>
      </div>
      <div style="width:1px;background:var(--border);align-self:stretch;margin:0 0.5rem;"></div>
      <div style="flex:1;">
        <p style="font-weight:700;color:var(--text-dark);margin-bottom:0.25rem;">Outstanding Service, Every Time</p>
        <p style="font-size:0.9rem;">Our clients consistently praise our drivers for their kindness, punctuality, and professionalism.</p>
      </div>
    </div>

    <div class="testimonials-full-grid">

      <div class="testimonial-featured fade-up">
        <div>
          <div class="stars">★★★★★</div>
          <blockquote>"After searching for a reliable wheelchair transport service for my mother, I finally found N.E.W.T. — and I can't imagine using anyone else. They are compassionate, punctual, and truly treat her like she's family. This service has completely changed our family's life."</blockquote>
          <div class="testimonial-author">
            <div class="author-avatar">DM</div>
            <div class="author-info"><strong>Diane M.</strong><span>Naperville, IL — Client's Daughter</span></div>
          </div>
        </div>
        <div class="featured-side">
          <h3>The N.E.W.T. Promise</h3>
          <p>Every review we receive motivates us to keep doing what we love — giving people the freedom to live their lives fully, regardless of mobility challenges.</p>
          <div style="margin-top:1.5rem;display:flex;gap:0.75rem;flex-wrap:wrap;">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-white">Book a Ride</a>
            <a href="tel:6305426398" class="btn btn-outline">(630) 542-6398</a>
          </div>
        </div>
      </div>

      <?php
      $testimonials = [
        [ 'i' => 'PH', 'name' => 'Patricia H.', 'loc' => 'Oak Lawn, IL', 'quote' => "My husband needs dialysis three times a week. N.E.W.T. has never once been late. The driver is always kind and goes out of his way to make the trip as comfortable as possible. I don't know what we'd do without them." ],
        [ 'i' => 'TW', 'name' => 'Thomas W.', 'loc' => 'Evanston, IL', 'quote' => "I was nervous about finding a transport service that could handle the stairs at my father's home, but N.E.W.T. handled it like true professionals. Outstanding service!" ],
        [ 'i' => 'JR', 'name' => 'Jessica R.', 'loc' => 'Downers Grove, IL', 'quote' => "We used N.E.W.T. to bring my grandmother to my wedding. They were so accommodating and made sure she arrived safely and on time. She even got to dance!" ],
        [ 'i' => 'RL', 'name' => 'Robert L.', 'loc' => 'Schaumburg, IL', 'quote' => "The driver was on time, incredibly professional, and made my mother feel so at ease. The van was clean and comfortable. I highly recommend N.E.W.T. to any family." ],
        [ 'i' => 'MG', 'name' => 'Margaret G.', 'loc' => 'Bolingbrook, IL', 'quote' => "I've used many transportation services over the years, and N.E.W.T. is simply the best. They remember my preferences and I've never felt like 'just a client.' I feel cared for." ],
        [ 'i' => 'CN', 'name' => 'Carol N.', 'loc' => 'Joliet, IL', 'quote' => "My son needed to get to physical therapy twice a week. N.E.W.T. was flexible, understanding, and always worked with our schedule. They genuinely care — it shows in everything they do." ],
        [ 'i' => 'AK', 'name' => 'Andrew K.', 'loc' => 'Chicago, IL', 'quote' => "We called last-minute for an airport transfer and they came through without hesitation. Professional, prompt, and so kind to my elderly father. Will definitely use them again." ],
        [ 'i' => 'FB', 'name' => 'Frank B.', 'loc' => 'Cicero, IL', 'quote' => "After my stroke, I needed regular rides to my rehabilitation center. The team at N.E.W.T. gave me so much confidence and dignity during a really difficult time in my life." ],
        [ 'i' => 'LF', 'name' => 'Linda F.', 'loc' => 'Tinley Park, IL', 'quote' => "The fact that my mother's caregiver could ride along for free was such a relief. N.E.W.T. truly goes above and beyond. Highly, highly recommend!" ],
      ];
      foreach ( $testimonials as $t ) : ?>
        <div class="testimonial-card fade-up">
          <div class="stars">★★★★★</div>
          <blockquote>"<?php echo esc_html( $t['quote'] ); ?>"</blockquote>
          <div class="testimonial-author">
            <div class="author-avatar"><?php echo esc_html( $t['i'] ); ?></div>
            <div class="author-info"><strong><?php echo esc_html( $t['name'] ); ?></strong><span><?php echo esc_html( $t['loc'] ); ?></span></div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>

    <div class="share-banner fade-up">
      <h3>Have a Story to Share?</h3>
      <p>If N.E.W.T. has made a difference in your life, we'd be honored to hear about it!</p>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary btn-lg">Share Your Experience</a>
    </div>

  </div>
</section>

<section class="cta-banner">
  <div class="container">
    <h2>Experience the N.E.W.T. Difference</h2>
    <p>Join hundreds of families across Chicagoland who trust us every day.</p>
    <div class="cta-actions">
      <a href="tel:6305426398" class="btn btn-white btn-lg">📞 (630) 542-6398</a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline btn-lg">Book Online</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
