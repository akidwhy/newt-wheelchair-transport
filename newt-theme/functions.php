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
   Helper: Get phone from customizer
   ============================================= */
function newt_phone( $raw = false ) {
    if ( $raw ) {
        return preg_replace( '/\D/', '', get_theme_mod( 'newt_phone', '(630) 542-6398' ) );
    }
    return get_theme_mod( 'newt_phone', '(630) 542-6398' );
}

/* =============================================
   Custom Post Types
   ============================================= */
function newt_register_post_types() {

    // FAQs
    register_post_type( 'newt_faq', [
        'labels' => [
            'name'          => 'FAQs',
            'singular_name' => 'FAQ',
            'add_new_item'  => 'Add New FAQ',
            'edit_item'     => 'Edit FAQ',
            'new_item'      => 'New FAQ',
            'search_items'  => 'Search FAQs',
            'not_found'     => 'No FAQs found.',
            'menu_name'     => 'FAQs',
        ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-editor-help',
        'supports'     => [ 'title', 'editor', 'page-attributes' ],
        'show_in_rest' => true,
        'rewrite'      => false,
    ] );

    // Testimonials
    register_post_type( 'newt_testimonial', [
        'labels' => [
            'name'          => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new_item'  => 'Add New Testimonial',
            'edit_item'     => 'Edit Testimonial',
            'new_item'      => 'New Testimonial',
            'search_items'  => 'Search Testimonials',
            'not_found'     => 'No testimonials found.',
            'menu_name'     => 'Testimonials',
        ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-format-quote',
        'supports'     => [ 'title', 'editor', 'page-attributes' ],
        'show_in_rest' => true,
        'rewrite'      => false,
    ] );

    // Services (destination types shown on homepage)
    register_post_type( 'newt_service', [
        'labels' => [
            'name'          => 'Services',
            'singular_name' => 'Service',
            'add_new_item'  => 'Add New Service',
            'edit_item'     => 'Edit Service',
            'not_found'     => 'No services found.',
            'menu_name'     => 'Services',
        ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-car',
        'supports'     => [ 'title', 'page-attributes' ],
        'show_in_rest' => true,
        'rewrite'      => false,
    ] );
}
add_action( 'init', 'newt_register_post_types' );

/* =============================================
   FAQ Category Taxonomy
   ============================================= */
function newt_register_taxonomies() {
    register_taxonomy( 'faq_category', 'newt_faq', [
        'labels' => [
            'name'          => 'FAQ Categories',
            'singular_name' => 'FAQ Category',
            'add_new_item'  => 'Add New Category',
            'edit_item'     => 'Edit Category',
            'not_found'     => 'No categories found.',
        ],
        'public'            => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'rewrite'           => false,
    ] );
}
add_action( 'init', 'newt_register_taxonomies' );

/* =============================================
   Meta Boxes
   ============================================= */
function newt_add_meta_boxes() {
    add_meta_box(
        'newt_testimonial_meta',
        'Testimonial Details',
        'newt_testimonial_meta_cb',
        'newt_testimonial',
        'side',
        'high'
    );
    add_meta_box(
        'newt_service_meta',
        'Service Icon',
        'newt_service_meta_cb',
        'newt_service',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'newt_add_meta_boxes' );

function newt_testimonial_meta_cb( $post ) {
    wp_nonce_field( 'newt_meta_save', 'newt_meta_nonce' );
    $location = get_post_meta( $post->ID, '_testimonial_location', true );
    $rating   = get_post_meta( $post->ID, '_testimonial_rating',   true );
    $featured = get_post_meta( $post->ID, '_testimonial_featured', true );
    if ( $rating === '' ) $rating = '5';
    ?>
    <p style="margin-bottom:6px;"><strong>Location</strong></p>
    <p><input type="text" name="testimonial_location" value="<?php echo esc_attr( $location ); ?>" style="width:100%;" placeholder="e.g. Naperville, IL" /></p>
    <p style="margin-bottom:6px;"><strong>Star Rating</strong></p>
    <p>
        <select name="testimonial_rating" style="width:100%;">
            <?php for ( $i = 5; $i >= 1; $i-- ) : ?>
            <option value="<?php echo $i; ?>" <?php selected( $rating, (string) $i ); ?>><?php echo $i; ?> Star<?php echo $i !== 1 ? 's' : ''; ?></option>
            <?php endfor; ?>
        </select>
    </p>
    <p>
        <label>
            <input type="checkbox" name="testimonial_featured" value="1" <?php checked( $featured, '1' ); ?> />
            <strong> Feature on Homepage</strong>
        </label>
    </p>
    <p style="font-size:11px;color:#666;margin-top:4px;">The post <strong>title</strong> is the reviewer's name. The <strong>body</strong> is the quote text.</p>
    <?php
}

function newt_service_meta_cb( $post ) {
    wp_nonce_field( 'newt_meta_save', 'newt_meta_nonce' );
    $icon = get_post_meta( $post->ID, '_service_icon', true );
    ?>
    <p style="margin-bottom:6px;"><strong>Icon (emoji)</strong></p>
    <p><input type="text" name="service_icon" value="<?php echo esc_attr( $icon ); ?>" style="width:100%;font-size:1.4rem;" placeholder="e.g. 🏥" /></p>
    <p style="font-size:11px;color:#666;">Paste any emoji. The post <strong>title</strong> is the service name shown on the site.</p>
    <?php
}

function newt_save_meta( $post_id ) {
    if ( ! isset( $_POST['newt_meta_nonce'] ) || ! wp_verify_nonce( $_POST['newt_meta_nonce'], 'newt_meta_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['testimonial_location'] ) ) {
        update_post_meta( $post_id, '_testimonial_location', sanitize_text_field( $_POST['testimonial_location'] ) );
    }
    if ( isset( $_POST['testimonial_rating'] ) ) {
        update_post_meta( $post_id, '_testimonial_rating', absint( $_POST['testimonial_rating'] ) );
    }
    update_post_meta( $post_id, '_testimonial_featured', isset( $_POST['testimonial_featured'] ) ? '1' : '0' );

    if ( isset( $_POST['service_icon'] ) ) {
        update_post_meta( $post_id, '_service_icon', sanitize_text_field( $_POST['service_icon'] ) );
    }
}
add_action( 'save_post', 'newt_save_meta' );

/* =============================================
   Theme Customizer
   ============================================= */
function newt_customizer( $wp_customize ) {

    $wp_customize->add_panel( 'newt_panel', [
        'title'    => 'N.E.W.T. Site Settings',
        'priority' => 30,
    ] );

    /* ---- Contact Information ---- */
    $wp_customize->add_section( 'newt_contact_info', [
        'title'       => 'Contact Information',
        'description' => 'Phone number used throughout the site.',
        'panel'       => 'newt_panel',
    ] );
    $wp_customize->add_setting( 'newt_phone', [
        'default'           => '(630) 542-6398',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'newt_phone', [
        'label'       => 'Phone Number (display format)',
        'description' => 'e.g. (630) 542-6398 — used in buttons and links',
        'section'     => 'newt_contact_info',
        'type'        => 'text',
    ] );

    /* ---- Homepage Hero ---- */
    $wp_customize->add_section( 'newt_hero', [
        'title' => 'Homepage Hero',
        'panel' => 'newt_panel',
    ] );
    $wp_customize->add_setting( 'newt_hero_badge', [
        'default'           => '🚐 Serving Chicagoland Since 2007',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'newt_hero_badge', [
        'label'   => 'Badge Text',
        'section' => 'newt_hero',
        'type'    => 'text',
    ] );
    $wp_customize->add_setting( 'newt_hero_line1', [
        'default'           => 'Where Can We',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'newt_hero_line1', [
        'label'   => 'Headline — Line 1',
        'section' => 'newt_hero',
        'type'    => 'text',
    ] );
    $wp_customize->add_setting( 'newt_hero_line2', [
        'default'           => 'Take You Today?',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'newt_hero_line2', [
        'label'   => 'Headline — Line 2',
        'section' => 'newt_hero',
        'type'    => 'text',
    ] );
    $wp_customize->add_setting( 'newt_hero_sub', [
        'default'           => 'Compassionate, safe, and reliable non-emergency wheelchair transportation for medical appointments, social events, and everyday errands — available around the clock.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'newt_hero_sub', [
        'label'   => 'Subheadline',
        'section' => 'newt_hero',
        'type'    => 'textarea',
    ] );

    /* ---- Stats Bar ---- */
    $wp_customize->add_section( 'newt_stats', [
        'title'       => 'Homepage Stats',
        'description' => 'The four numbers shown below the hero.',
        'panel'       => 'newt_panel',
    ] );
    $defaults = [
        1 => [ '5000', '+', 'Rides Completed' ],
        2 => [ '15',   '+', 'Years in Service' ],
        3 => [ '100',  '%', 'ADA Compliant Fleet' ],
        4 => [ '24',  '/7', 'Service Availability' ],
    ];
    for ( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_setting( "newt_stat_{$i}_num",    [ 'default' => $defaults[$i][0], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_setting( "newt_stat_{$i}_suffix", [ 'default' => $defaults[$i][1], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_setting( "newt_stat_{$i}_label",  [ 'default' => $defaults[$i][2], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( "newt_stat_{$i}_num",    [ 'label' => "Stat $i — Number",  'section' => 'newt_stats', 'type' => 'text' ] );
        $wp_customize->add_control( "newt_stat_{$i}_suffix", [ 'label' => "Stat $i — Suffix",  'section' => 'newt_stats', 'type' => 'text' ] );
        $wp_customize->add_control( "newt_stat_{$i}_label",  [ 'label' => "Stat $i — Label",   'section' => 'newt_stats', 'type' => 'text' ] );
    }

    /* ---- CTA Banner ---- */
    $wp_customize->add_section( 'newt_cta', [
        'title'       => 'CTA Banner',
        'description' => 'The call-to-action banner that appears at the bottom of pages.',
        'panel'       => 'newt_panel',
    ] );
    $wp_customize->add_setting( 'newt_cta_headline', [
        'default'           => 'Ready to Book Your Ride?',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'newt_cta_headline', [
        'label'   => 'CTA Headline',
        'section' => 'newt_cta',
        'type'    => 'text',
    ] );
    $wp_customize->add_setting( 'newt_cta_sub', [
        'default'           => "Call us anytime or fill out our convenient contact form — we're available 24/7 to help you get where you need to go.",
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'newt_cta_sub', [
        'label'   => 'CTA Subtext',
        'section' => 'newt_cta',
        'type'    => 'textarea',
    ] );
}
add_action( 'customize_register', 'newt_customizer' );

/* =============================================
   Contact Form Handler
   ============================================= */
function newt_process_contact_form() {
    if ( ! isset( $_POST['newt_nonce'] ) || ! wp_verify_nonce( $_POST['newt_nonce'], 'newt_contact' ) ) {
        wp_die( 'Security verification failed. Please go back and try again.' );
    }

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

    $contact_page = get_page_by_path( 'contact' );
    $redirect_url = $contact_page ? get_permalink( $contact_page ) : home_url( '/contact/' );
    wp_safe_redirect( add_query_arg( 'sent', '1', $redirect_url ) );
    exit;
}
add_action( 'admin_post_nopriv_newt_contact', 'newt_process_contact_form' );
add_action( 'admin_post_newt_contact',        'newt_process_contact_form' );
