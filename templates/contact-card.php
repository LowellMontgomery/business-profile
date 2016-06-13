<?php
/**
 * Template for a contact card
 *
 * Copy this template into your theme to modify the output of the contact card.
 * The template should sit in your theme here:
 *
 * /wp-content/themes/your-theme/business-profile-templates/contact-card.php
 *
 * You can also add custom templates for each location by creating a template
 * file with the location's ID, eg:
 *
 * /wp-content/themes/your-theme/business-profile-templates/contact-card-123.php
 *
 * By default, the template uses a filtered callback system defined in
 * bpwfwp_print_contact_card(), which you'll find in the plugins'
 * includes/template-functions.php. This structure allows it a certain kind of
 * "hands-off" flexibility for third-party integrations. Plugins can hook into
 * `bpwfwp_component_callbacks` to add or remove content without overriding or
 * effecting existing content.
 *
 * Individual settings can be accessed using the bpfwp_setting(). Example:
 *
 * <?php bpfwp_setting( 'address' ); ?>
 *
 * You can also pass a location ID to bpfwp_setting(). Example:
 *
 * <?php bpfwp_setting( 'address', 123 ); ?>
 *
 * However, ensuring you have complete Schema.org markup can be especially
 * difficult for some things, like Opening Hours. There are a number of template
 * functions at your disposal to help you print details with schema markup.
 * You'll find these at /includes/template-functions.php. Example:
 *
 * <?php bpwfwp_print_address(); ?>
 *
 * These also support a location. Example:
 *
 * <?php bpwfwp_print_address( 123 ); ?>
 *
 * This template can be loaded automatically in a post loop, from a shortcode
 * or via a widget (or you can use bpwfwp_print_contact_card() to print it
 * anywhere you want). For that reason, the location requested may not be the
 * same as the global post (eg - get_the_ID()). To ensure compatibility with the
 * plugin's [contact-card] shortcode and Contact Card widget, you should use the
 * $bpfwp_controller global to access the location post ID. Example:
 *
 * <?php
 *   global $bpfwp_controller;
 *   $location = $bpfwp_controller->display_settings['location'];
 *   bpfwp_setting( 'address', $location );
 * ?>
 *
 * The $bpfwp_controller->display_settings array also contains information on
 * any content that has been hidden with shortcode attributes or widget options.
 * You should check the bool values before printing. Example:
 *
 * <?php
 *   global $bpfwp_controller;
 *   $location = $bpfwp_controller->display_settings['location'];
 *   if ( $bpfwp_controller->display_settings['show_address'] ) {
 *     ?>
 *     <meta itemprop="address" content="<?php bpfwp_setting( 'address', $location ); ?>">
 *     <?php
 *   }
 * ?>
 *
 * If you use the template functions to have the schema markup printed for you,
 * they will take account of these display settings and use hidden meta where
 * appropriate.
 *
 * Google provides a Structured Data Testing Tool which is useful for validating
 * your schema markup once you've changed it.
 *
 * https://search.google.com/structured-data/testing-tool/u/0/
 *
 * Happy theming!
 *
 * @package   BusinessProfile
 * @copyright Copyright (c) 2015, Theme of the Crop
 * @license   GPL-2.0+
 * @since     1.1.0
 */
global $bpfwp_controller; ?>

<address class="bp-contact-card" itemscope itemtype="http://schema.org/<?php echo bpfwp_setting( 'schema-type', $bpfwp_controller->display_settings['location'] ); ?>">
	<?php foreach ( $data as $data => $callback ) { call_user_func( $callback, $bpfwp_controller->display_settings['location'] ); } ?>
</address>