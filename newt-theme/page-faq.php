<?php
/**
 * Template Name: FAQ
 * Assigned to the page with slug: faq
 */
get_header();
?>

<section class="page-hero">
  <div class="container">
    <span class="section-label" style="color:rgba(255,255,255,0.7);">Got Questions?</span>
    <h1>Frequently Asked Questions</h1>
    <p>Everything you need to know about our wheelchair transport service. Can't find your answer? Just give us a call!</p>
  </div>
</section>

<div class="breadcrumb"><div class="container"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>›</span> FAQ</div></div>

<section class="section">
  <div class="container">

    <div class="faq-categories">
      <button class="faq-cat-btn active" data-cat="all">All Questions</button>
      <button class="faq-cat-btn" data-cat="booking">Booking &amp; Scheduling</button>
      <button class="faq-cat-btn" data-cat="pricing">Pricing &amp; Payment</button>
      <button class="faq-cat-btn" data-cat="service">Our Service</button>
      <button class="faq-cat-btn" data-cat="vehicles">Vehicles &amp; Equipment</button>
    </div>

    <div class="faq-list">

      <?php
      $faqs = [
        [ 'cat' => 'booking', 'q' => 'How do I schedule a ride?', 'a' => 'Scheduling a ride is easy! You can call us directly at <strong>(630) 542-6398</strong> — we\'re available 24 hours a day, 7 days a week. You can also fill out our <a href="' . esc_url( home_url( '/contact/' ) ) . '" style="color:var(--primary);font-weight:600;">online contact form</a> and we\'ll get back to you promptly.' ],
        [ 'cat' => 'booking', 'q' => 'How far in advance should I book?', 'a' => 'We recommend booking 24–48 hours in advance when possible. However, we understand situations arise unexpectedly — contact us and we\'ll do our best to accommodate, even on short notice.' ],
        [ 'cat' => 'booking', 'q' => 'Are you available on weekends and holidays?', 'a' => 'Yes! We operate 24 hours a day, 7 days a week — including weekends and major holidays. We believe transportation needs don\'t take days off, and neither do we.' ],
        [ 'cat' => 'booking', 'q' => 'Can I schedule recurring rides for regular appointments?', 'a' => 'Absolutely. Many of our clients rely on us for regular weekly or bi-weekly appointments such as dialysis, physical therapy, or chemotherapy. We can set up a recurring schedule that works for you.' ],
        [ 'cat' => 'pricing', 'q' => 'How much does a ride cost?', 'a' => 'Our rates are competitive and transparent — no hidden fees, ever. Pricing varies based on distance and specific needs. Please call us at <strong>(630) 542-6398</strong> for a free, no-obligation quote.' ],
        [ 'cat' => 'pricing', 'q' => 'What forms of payment do you accept?', 'a' => 'We accept all major credit cards (Visa, Mastercard, American Express, Discover), cash, and checks. Payment is typically collected at the time of service.' ],
        [ 'cat' => 'pricing', 'q' => 'Is there an extra charge for a caregiver riding along?', 'a' => '<strong>No!</strong> A caregiver or family member is always welcome to ride along at absolutely no additional charge. We would never put a price on that.' ],
        [ 'cat' => 'service', 'q' => 'What areas do you serve?', 'a' => 'We serve the greater Chicagoland area, including Chicago and surrounding suburbs such as Naperville, Aurora, Joliet, Elgin, Evanston, Schaumburg, Bolingbrook, Oak Park, Tinley Park, and many more. We also offer long-distance service.' ],
        [ 'cat' => 'service', 'q' => 'Can you transport someone from a nursing home or assisted living facility?', 'a' => 'Yes, absolutely. We regularly pick up and drop off at nursing homes, skilled nursing facilities, assisted living communities, hospitals, and rehabilitation centers.' ],
        [ 'cat' => 'service', 'q' => 'Do you only go to medical appointments?', 'a' => 'We go everywhere! Medical appointments are a big part of what we do, but we also love taking clients to weddings, birthday parties, church services, family gatherings, shopping trips, airport transfers, christenings, group events, and more.' ],
        [ 'cat' => 'service', 'q' => 'Can you help with stair access at my home?', 'a' => 'Yes — this is one of our specialties! We have the professional-grade equipment and trained staff to safely transport clients up or down stairs. Please let us know about stair access when you book.' ],
        [ 'cat' => 'service', 'q' => 'Do you offer long-distance transportation?', 'a' => 'Yes! While we primarily serve the Chicagoland area, we are happy to discuss long-distance trips. Just call ahead and we\'ll work with you to make it happen.' ],
        [ 'cat' => 'vehicles', 'q' => 'What type of vehicles do you use?', 'a' => 'We use comfortable, modern, ADA-compliant ramp vans specifically designed for wheelchair transport. Our vehicles are spacious, climate-controlled, and regularly inspected for safety.' ],
        [ 'cat' => 'vehicles', 'q' => 'Are your vehicles ADA compliant?', 'a' => '100%. All of our vehicles fully meet Americans with Disabilities Act (ADA) standards. They are equipped with hydraulic ramps, proper wheelchair tie-down systems, and appropriate seating configurations.' ],
        [ 'cat' => 'vehicles', 'q' => 'Can your vehicles accommodate power wheelchairs and motorized scooters?', 'a' => 'Yes. Our vans can accommodate most standard manual wheelchairs, power wheelchairs, and motorized scooters. Please let us know the type and size of your chair when booking.' ],
      ];

      foreach ( $faqs as $faq ) : ?>
        <div class="faq-item" data-cat="<?php echo esc_attr( $faq['cat'] ); ?>">
          <button class="faq-question">
            <?php echo esc_html( $faq['q'] ); ?>
            <span class="faq-chevron">▼</span>
          </button>
          <div class="faq-answer">
            <div class="faq-answer-inner"><?php echo wp_kses_post( $faq['a'] ); ?></div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>

    <div style="text-align:center;margin-top:3rem;padding:2.5rem;background:var(--light-bg);border-radius:var(--radius-lg);">
      <h3 style="margin-bottom:0.5rem;">Still Have Questions?</h3>
      <p style="margin-bottom:1.5rem;max-width:420px;margin-left:auto;margin-right:auto;">We're happy to help! Give us a call or send us a message.</p>
      <div class="gap-actions" style="justify-content:center;">
        <a href="tel:6305426398" class="btn btn-primary btn-lg">📞 (630) 542-6398</a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline-dark btn-lg">Send a Message</a>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>
