<?php
/**
 * Template Name: Contact
 * Assigned to the page with slug: contact
 */
get_header();
$sent = isset( $_GET['sent'] ) && $_GET['sent'] === '1';
?>

<section class="page-hero">
  <div class="container">
    <span class="section-label" style="color:rgba(255,255,255,0.7);">Get in Touch</span>
    <h1>Contact Us</h1>
    <p>Ready to book a ride or have a question? We're available 24/7 — just give us a call or fill out the form below.</p>
  </div>
</section>

<div class="breadcrumb"><div class="container"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>›</span> Contact Us</div></div>

<section class="section">
  <div class="container">
    <div class="contact-grid">

      <!-- Left: Info -->
      <div>
        <div class="contact-info-card">
          <h3>Get in Touch</h3>
          <p>Call us directly for the fastest response, or fill out the form and we'll get back to you shortly.</p>
          <div class="contact-detail"><div class="contact-detail-icon">📞</div><div class="contact-detail-text"><strong>Phone (24/7)</strong><a href="tel:6305426398">(630) 542-6398</a></div></div>
          <div class="contact-detail"><div class="contact-detail-icon">📍</div><div class="contact-detail-text"><strong>Service Area</strong><span>Greater Chicagoland, IL</span></div></div>
          <div class="contact-detail"><div class="contact-detail-icon">🕐</div><div class="contact-detail-text"><strong>Hours of Operation</strong><span>24 hours / 7 days a week<br>Including holidays</span></div></div>
          <div class="contact-detail"><div class="contact-detail-icon">⚡</div><div class="contact-detail-text"><strong>Response Time</strong><span>Same-day response on all inquiries</span></div></div>
          <div style="margin-top:2rem;padding-top:1.5rem;border-top:1px solid rgba(255,255,255,0.2);">
            <p style="font-size:0.85rem;color:rgba(255,255,255,0.7);margin-bottom:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.08em;">Why families choose us</p>
            <div style="display:flex;flex-direction:column;gap:0.5rem;">
              <div style="display:flex;align-items:center;gap:0.6rem;font-size:0.88rem;color:rgba(255,255,255,0.85);"><span style="color:#f5a94e;">✓</span> Caregiver rides free of charge</div>
              <div style="display:flex;align-items:center;gap:0.6rem;font-size:0.88rem;color:rgba(255,255,255,0.85);"><span style="color:#f5a94e;">✓</span> ADA-compliant ramp vans</div>
              <div style="display:flex;align-items:center;gap:0.6rem;font-size:0.88rem;color:rgba(255,255,255,0.85);"><span style="color:#f5a94e;">✓</span> Stair transport capability</div>
              <div style="display:flex;align-items:center;gap:0.6rem;font-size:0.88rem;color:rgba(255,255,255,0.85);"><span style="color:#f5a94e;">✓</span> Family owned &amp; operated</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right: Form -->
      <div>
        <div class="contact-form-card">
          <h3>Book a Ride</h3>
          <p>Fill out the form below and we'll get back to you as soon as possible. For immediate assistance, call us at <a href="tel:6305426398" style="color:var(--primary);font-weight:600;">(630) 542-6398</a>.</p>

          <?php if ( $sent ) : ?>
            <div class="success-message show">
              ✅ Thank you! We've received your message and will be in touch shortly. For urgent needs, please call us at (630) 542-6398.
            </div>
          <?php endif; ?>

          <form id="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" novalidate>
            <input type="hidden" name="action" value="newt_contact" />
            <?php wp_nonce_field( 'newt_contact', 'newt_nonce' ); ?>

            <!-- DATE & TIME -->
            <div class="form-section">
              <h4 class="form-section-title">Date &amp; Time</h4>
              <div class="form-group">
                <label for="trip-date">Date of Trip <span class="req">*</span></label>
                <input type="date" id="trip-date" name="trip-date" required />
              </div>
              <div class="form-group">
                <label>Time of Appointment <span class="req">*</span></label>
                <div class="time-picker">
                  <select name="appt-hour" required><option value="">Hour</option><option>12</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option></select>
                  <select name="appt-min" required><option value="">Min</option><option>00</option><option>05</option><option>10</option><option>15</option><option>20</option><option>25</option><option>30</option><option>35</option><option>40</option><option>45</option><option>50</option><option>55</option></select>
                  <select name="appt-ampm" required><option value="">AM/PM</option><option>AM</option><option>PM</option></select>
                </div>
              </div>
              <div class="form-group">
                <label>Expected Pick-up Time <span class="req">*</span></label>
                <div class="time-picker">
                  <select name="pickup-hour" required><option value="">Hour</option><option>12</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option></select>
                  <select name="pickup-min" required><option value="">Min</option><option>00</option><option>05</option><option>10</option><option>15</option><option>20</option><option>25</option><option>30</option><option>35</option><option>40</option><option>45</option><option>50</option><option>55</option></select>
                  <select name="pickup-ampm" required><option value="">AM/PM</option><option>AM</option><option>PM</option></select>
                </div>
              </div>
              <div class="form-group">
                <label>Anticipated Return Time <span class="req">*</span></label>
                <div class="time-picker">
                  <select name="return-hour" required><option value="">Hour</option><option>12</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option></select>
                  <select name="return-min" required><option value="">Min</option><option>00</option><option>05</option><option>10</option><option>15</option><option>20</option><option>25</option><option>30</option><option>35</option><option>40</option><option>45</option><option>50</option><option>55</option></select>
                  <select name="return-ampm" required><option value="">AM/PM</option><option>AM</option><option>PM</option></select>
                </div>
              </div>
              <div class="form-group">
                <label>Trip Type <span class="req">*</span></label>
                <div class="radio-group">
                  <label class="radio-label"><input type="radio" name="trip-type" value="Round Trip" required /> Round Trip</label>
                  <label class="radio-label"><input type="radio" name="trip-type" value="One Way" /> One Way</label>
                </div>
              </div>
            </div>

            <!-- PASSENGER -->
            <div class="form-section">
              <h4 class="form-section-title">Passenger</h4>
              <div class="form-row">
                <div class="form-group"><label for="pax-first">First Name <span class="req">*</span></label><input type="text" id="pax-first" name="pax-first" required /></div>
                <div class="form-group"><label for="pax-last">Last Name <span class="req">*</span></label><input type="text" id="pax-last" name="pax-last" required /></div>
              </div>
              <div class="form-group"><label for="pax-phone">Passenger Phone Number</label><input type="tel" id="pax-phone" name="pax-phone" placeholder="(630) 555-0100" /></div>
              <div class="form-group">
                <label>Date of Birth</label>
                <div class="dob-picker">
                  <select name="dob-month" aria-label="Birth month"><option value="">Month</option><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>
                  <select name="dob-day" aria-label="Birth day"><option value="">Day</option><?php for($d=1;$d<=31;$d++) echo "<option>$d</option>"; ?></select>
                  <select name="dob-year" id="dob-year-select" aria-label="Birth year"><option value="">Year</option></select>
                </div>
              </div>
            </div>

            <!-- CONTACT -->
            <div class="form-section">
              <h4 class="form-section-title">Contact</h4>
              <div class="form-row">
                <div class="form-group"><label for="contact-first">First Name <span class="req">*</span></label><input type="text" id="contact-first" name="contact-first" required /></div>
                <div class="form-group"><label for="contact-last">Last Name <span class="req">*</span></label><input type="text" id="contact-last" name="contact-last" required /></div>
              </div>
              <div class="form-row">
                <div class="form-group"><label for="contact-phone">Phone Number <span class="req">*</span></label><input type="tel" id="contact-phone" name="contact-phone" placeholder="(630) 555-0100" required /></div>
                <div class="form-group"><label for="contact-phone2">Secondary Phone Number</label><input type="tel" id="contact-phone2" name="contact-phone2" placeholder="(630) 555-0100" /></div>
              </div>
              <div class="form-group"><label for="contact-email">Email Address</label><input type="email" id="contact-email" name="contact-email" placeholder="you@example.com" /></div>
              <div class="form-group">
                <label>Preferred Method of Communication</label>
                <div class="radio-group">
                  <label class="radio-label"><input type="radio" name="pref-contact" value="Phone Call" /> Phone Call</label>
                  <label class="radio-label"><input type="radio" name="pref-contact" value="Text Msg" /> Text Msg</label>
                  <label class="radio-label"><input type="radio" name="pref-contact" value="Email" /> Email</label>
                </div>
              </div>
            </div>

            <!-- LOCATIONS -->
            <div class="form-section">
              <h4 class="form-section-title">Locations</h4>
              <div class="form-group"><label for="pickup-street">Pick-up Street Address <span class="req">*</span></label><input type="text" id="pickup-street" name="pickup-street" required /></div>
              <div class="form-group"><label for="pickup-apt">Apartment, suite, etc.</label><input type="text" id="pickup-apt" name="pickup-apt" /></div>
              <div class="form-row three-col">
                <div class="form-group"><label for="pickup-city">City <span class="req">*</span></label><input type="text" id="pickup-city" name="pickup-city" required /></div>
                <div class="form-group"><label for="pickup-state">State / Province</label><input type="text" id="pickup-state" name="pickup-state" placeholder="IL" /></div>
                <div class="form-group"><label for="pickup-zip">ZIP / Postal Code</label><input type="text" id="pickup-zip" name="pickup-zip" placeholder="60540" /></div>
              </div>
              <div class="form-group">
                <label>Stairs? <span class="req">*</span></label>
                <p class="form-hint">Does either the pick-up or destination location have stairs?</p>
                <div class="radio-group">
                  <label class="radio-label"><input type="radio" name="stairs" value="Yes" required /> Yes</label>
                  <label class="radio-label"><input type="radio" name="stairs" value="No" /> No</label>
                </div>
              </div>
              <div class="form-group">
                <label>Wheelchair? <span class="req">*</span></label>
                <p class="form-hint">Will you require the use of our wheelchair?</p>
                <div class="radio-group">
                  <label class="radio-label"><input type="radio" name="wheelchair" value="Yes" required /> Yes</label>
                  <label class="radio-label"><input type="radio" name="wheelchair" value="No" /> No</label>
                </div>
              </div>
              <div class="form-group" style="margin-top:1.25rem;"><label for="dest-street">Destination Street Address <span class="req">*</span></label><input type="text" id="dest-street" name="dest-street" required /></div>
              <div class="form-group"><label for="dest-apt">Apartment, suite, etc.</label><input type="text" id="dest-apt" name="dest-apt" /></div>
              <div class="form-row three-col">
                <div class="form-group"><label for="dest-city">City <span class="req">*</span></label><input type="text" id="dest-city" name="dest-city" required /></div>
                <div class="form-group"><label for="dest-state">State / Province</label><input type="text" id="dest-state" name="dest-state" placeholder="IL" /></div>
                <div class="form-group"><label for="dest-zip">ZIP / Postal Code</label><input type="text" id="dest-zip" name="dest-zip" placeholder="60540" /></div>
              </div>
              <div class="form-group"><label for="additional-info">Additional Information</label><textarea id="additional-info" name="additional-info" placeholder="Any special requirements or notes…"></textarea></div>
            </div>

            <!-- TERMS -->
            <div class="form-section">
              <h4 class="form-section-title">Terms and Conditions of Service</h4>
              <div class="terms-box">
                All trips are either prepaid or paid in full at conclusion of trip by cash, check or credit card. All first time riders are required to pay a $50 deposit that is then deducted from the final cost of the trip. Trips that cancel with less than a 48 hour notice are subject to a $50 cancellation fee. Trips that are canceled on arrival are subject to a $100 cancellation fee. One hour of wait time is included in each trip, after that first hour a $48 per hour wait time fee is charged. All riders using their own wheelchair must have the accompanying foot supports for their safety. We reserve the right to cancel any trip we deem unsafe for the person we are transporting or our employee.
              </div>
              <div class="form-group" style="margin-top:1rem;margin-bottom:0;">
                <label class="checkbox-label">
                  <input type="checkbox" name="terms" required />
                  I have read and agree to the terms and conditions of service shown above. <span class="req">*</span>
                </label>
              </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg form-submit" style="margin-top:1.5rem;">Send Message →</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Service Area -->
<section class="section section-alt">
  <div class="container">
    <div class="section-header">
      <span class="section-label">Coverage</span>
      <h2>Our Service Area</h2>
      <p>We proudly serve communities throughout the greater Chicagoland region.</p>
    </div>
    <div class="area-tags" style="max-width:860px;margin:0 auto;">
      <?php
      $areas = ['Chicago','Naperville','Aurora','Joliet','Elgin','Waukegan','Cicero','Evanston','Schaumburg','Bolingbrook','Palatine','Oak Park','Tinley Park','Des Plaines','Orland Park','Oak Lawn','Berwyn','Downers Grove','Lombard','Arlington Heights','Hoffman Estates','Glendale Heights','Streamwood','Carol Stream','Wheaton','Lisle','Romeoville','Plainfield','And More!'];
      foreach ( $areas as $area ) echo '<span class="area-tag">' . esc_html( $area ) . '</span>';
      ?>
    </div>
    <p style="text-align:center;margin-top:1.5rem;font-size:0.9rem;color:var(--text-light);">Long-distance service available — call to discuss your needs.</p>
  </div>
</section>

<section class="cta-banner">
  <div class="container">
    <h2>Need a Ride Right Away?</h2>
    <p>Call us directly — we're available 24 hours a day, 7 days a week, including holidays.</p>
    <div class="cta-actions">
      <a href="tel:6305426398" class="btn btn-white btn-lg"><i class="fa-solid fa-phone"></i> (630) 542-6398</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
