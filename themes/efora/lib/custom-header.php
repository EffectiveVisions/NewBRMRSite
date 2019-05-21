<?php
/**
 * Implement Custom Header functionality for efora
 *
 * @package WordPress
 * @subpackage efora WP
 * @since efora 1.0
 */

/**
 * Set up the WordPress core custom header settings.
 *
 * @since efora 1.0
 *
 * @uses efora_header_style()
 * @uses efora_admin_header_style()
 * @uses efora_admin_header_image()
 */
function efora_custom_header_setup() {
	/**
	 * Filter efora custom-header support arguments.
	 *
	 * @since efora 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type bool   $header_text            Whether to display custom header text. Default false.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 1260.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 240.
	 *     @type bool   $flex_height            Whether to allow flexible-height header images. Default true.
	 *     @type string $admin_head_callback    Callback function used to style the image displayed in
	 *                                          the Appearance > Header screen.
	 *     @type string $admin_preview_callback Callback function used to create the custom header markup in
	 *                                          the Appearance > Header screen.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'efora_custom_header_args', array(
		'default-text-color'     => '000000',
		'width'                  => 1260,
		'height'                 => 240,
		'flex-height'            => true,
		'wp-head-callback'       => 'efora_header_style',
		'admin-head-callback'    => 'efora_admin_header_style',
		'admin-preview-callback' => 'efora_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'efora_custom_header_setup' );

if ( ! function_exists( 'efora_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see efora_custom_header_setup().
 *
 */
function efora_header_style() {
	$text_color = get_header_textcolor();

	// If no custom color for text is set, let's bail.
	if ( display_header_text() && $text_color === get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="efora-header-css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.logo {
			display: none;
		}
	<?php
		// If the user has set a custom color for the text, use that.
		elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		.logo a {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // efora_header_style

if ( ! function_exists( 'efora_admin_header_style' ) ) :
/**
 * Style the header image displayed on the Appearance > Header screen.
 *
 * @see efora_custom_header_setup()
 *
 * @since efora 1.0
 */
function efora_admin_header_style() {
?>
	<style type="text/css" id="efora-admin-header-css">
	
	</style>
<?php
}
endif; // efora_admin_header_style

if ( ! function_exists( 'efora_admin_header_image' ) ) :
/**
 * Create the custom header image markup displayed on the Appearance > Header screen.
 *
 * @see efora_custom_header_setup()
 *
 * @since efora 1.0
 */
function efora_admin_header_image() {
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
		<h1 class="displaying-header-text"><a id="name"<?php echo sprintf( ' style="color:#%s;"', get_header_textcolor() ); ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	</div>
<?php
}
endif; // efora_admin_header_image
