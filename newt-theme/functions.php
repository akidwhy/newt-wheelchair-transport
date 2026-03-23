<?php
/**
 * N.E.W.T. Theme Functions
 */

/* =============================================
   Theme Setup
   ============================================= */
function newt_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption' ] );

    register_nav_menus( [
        'primary' => __( 'Primary Menu', 'newt' ),
        'mobile'  => __( 'Mobile Menu', 'newt' ),
    ] );
}
add_action( 'after_setup_theme', 'newt_setup' );

/* =============================================
   Enqueue Styles & Scripts
   ============================================= */
function newt_scripts() {
    wp_enqueue_style(
        'newt-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Nunito:wght@400;600;700;800&display=swap',
        [],
        null
    );
    wp_enqueue_style(
        'newt-style',
        get_stylesheet_uri(),
        [ 'newt-google-fonts' ],
        '1.0'
    );
    wp_enqueue_script(
        'newt-main',
        get_template_directory_uri() . '/js/main.js',
        [],
        '1.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'newt_scripts' );

/* =============================================
   Contact Form Handler
   Uses WordPress admin-post.php to process the form
   and wp_mail() to send the booking request email.
   ============================================= */
function newt_process_contact_form() {
    // Verify nonce
    if ( ! isset( $_POST['newt_nonce'] ) || ! wp_verify_nonce( $_POST['newt_nonce'], 'newt_contact' ) ) {
        wp_die( 'Security verification failed. Please go back and try again.' );
    }

    // Sanitize all fields
    $fields = [
        'trip_date'       => sanitize_text_field( $_POST['trip-date'] ?? '' ),
        'appt_time'       => sanitize_text_field( ( $_POST['appt-hour'] ?? '' ) . ':' . ( $_POST['appt-min'] ?? '' ) . ' ' . ( $_POST['appt-ampm'] ?? '' ) ),
        'pickup_time'     => sanitize_text_field( ( $_POST['pickup-hour'] ?? '' ) . ':' . ( $_POST['pickup-min'] ?? '' ) . ' ' . ( $_POST['pickup-ampm'] ?? '' ) ),
        'return_time'     => sanitize_text_field( ( $_POST['return-hour'] ?? '' ) . ':' . ( $_POST['return-min'] ?? '' ) . ' ' . ( $_POST['return-ampm'] ?? '' ) ),
        'trip_type'       => sanitize_text_field( $_POST['trip-type'] ?? '' ),
        'pax_first'       => sanitize_text_field( $_POST['pax-first'] ?? '' ),
        'pax_last'        => sanitize_text_field( $_POST['pax-last'] ?? '' ),
        'pax_phone'       => sanitize_text_field( $_POST['pax-phone'] ?? '' ),
        'dob'             => sanitize_text_field( ( $_POST['dob-month'] ?? '' ) . '/' . ( $_POST['dob-day'] ?? '' ) . '/' . ( $_POST['dob-year'] ?? '' ) ),
        'contact_first'   => sanitize_text_field( $_POST['contact-first'] ?? '' ),
        'contact_last'    => sanitize_text_field( $_POST['contact-last'] ?? '' ),
        'contact_phone'   => sanitize_text_field( $_POST['contact-phone'] ?? '' ),
        'contact_phone2'  => sanitize_text_field( $_POST['contact-phone2'] ?? '' ),
        'contact_email'   => sanitize_email( $_POST['contact-email'] ?? '' ),
        'pref_contact'    => sanitize_text_field( $_POST['pref-contact'] ?? '' ),
        'pickup_street'   => sanitize_text_field( $_POST['pickup-street'] ?? '' ),
        'pickup_apt'      => sanitize_text_field( $_POST['pickup-apt'] ?? '' ),
        'pickup_city'     => sanitize_text_field( $_POST['pickup-city'] ?? '' ),
        'pickup_state'    => sanitize_text_field( $_POST['pickup-state'] ?? '' ),
        'pickup_zip'      => sanitize_text_field( $_POST['pickup-zip'] ?? '' ),
        'stairs'          => sanitize_text_field( $_POST['stairs'] ?? '' ),
        'wheelchair'      => sanitize_text_field( $_POST['wheelchair'] ?? '' ),
        'dest_street'     => sanitize_text_field( $_POST['dest-street'] ?? '' ),
        'dest_apt'        => sanitize_text_field( $_POST['dest-apt'] ?? '' ),
        'dest_city'       => sanitize_text_field( $_POST['dest-city'] ?? '' ),
        'dest_state'      => sanitize_text_field( $_POST['dest-state'] ?? '' ),
        'dest_zip'        => sanitize_text_field( $_POST['dest-zip'] ?? '' ),
        'additional'      => sanitize_textarea_field( $_POST['additional-info'] ?? '' ),
    ];

    $to      = get_option( 'admin_email' );
    $subject = 'New Trip Request — ' . $fields['pax_first'] . ' ' . $fields['pax_last'];
    $message = "NEW BOOKING REQUEST\n";
    $message .= str_repeat( '=', 50 ) . "\n\n";

    $message .= "DATE & TIME\n";
    $message .= "Date of Trip:           {$fields['trip_date']}\n";
    $message .= "Time of Appointment:    {$fields['appt_time']}\n";
    $message .= "Expected Pick-up Time:  {$fields['pickup_time']}\n";
    $message .= "Anticipated Return:     {$fields['return_time']}\n";
    $message .= "Trip Type:              {$fields['trip_type']}\n\n";

    $message .= "PASSENGER\n";
    $message .= "Name:           {$fields['pax_first']} {$fields['pax_last']}\n";
    $message .= "Phone:          {$fields['pax_phone']}\n";
    $message .= "Date of Birth:  {$fields['dob']}\n\n";

    $message .= "CONTACT PERSON\n";
    $message .= "Name:           {$fields['contact_first']} {$fields['contact_last']}\n";
    $message .= "Phone:          {$fields['contact_phone']}\n";
    if ( $fields['contact_phone2'] ) {
        $message .= "Alt Phone:      {$fields['contact_phone2']}\n";
    }
    if ( $fields['contact_email'] ) {
        $message .= "Email:          {$fields['contact_email']}\n";
    }
    $message .= "Pref. Contact:  {$fields['pref_contact']}\n\n";

    $message .= "PICK-UP LOCATION\n";
    $message .= "{$fields['pickup_street']}";
    if ( $fields['pickup_apt'] ) $message .= ", {$fields['pickup_apt']}";
    $message .= "\n{$fields['pickup_city']}, {$fields['pickup_state']} {$fields['pickup_zip']}\n";
    $message .= "Stairs: {$fields['stairs']}\n\n";

    $message .= "DESTINATION\n";
    $message .= "{$fields['dest_street']}";
    if ( $fields['dest_apt'] ) $message .= ", {$fields['dest_apt']}";
    $message .= "\n{$fields['dest_city']}, {$fields['dest_state']} {$fields['dest_zip']}\n";
    $message .= "Wheelchair Required: {$fields['wheelchair']}\n\n";

    if ( $fields['additional'] ) {
        $message .= "ADDITIONAL NOTES\n{$fields['additional']}\n\n";
    }

    $headers = [ 'Content-Type: text/plain; charset=UTF-8' ];
    if ( $fields['contact_email'] ) {
        $headers[] = 'Reply-To: ' . $fields['contact_first'] . ' ' . $fields['contact_last'] . ' <' . $fields['contact_email'] . '>';
    }

    wp_mail( $to, $subject, $message, $headers );

    // Redirect back to the contact page with success flag
    $contact_page = get_page_by_path( 'contact' );
    $redirect_url = $contact_page ? get_permalink( $contact_page ) : home_url( '/contact/' );
    wp_safe_redirect( add_query_arg( 'sent', '1', $redirect_url ) );
    exit;
}
add_action( 'admin_post_nopriv_newt_contact', 'newt_process_contact_form' );
add_action( 'admin_post_newt_contact',        'newt_process_contact_form' );
