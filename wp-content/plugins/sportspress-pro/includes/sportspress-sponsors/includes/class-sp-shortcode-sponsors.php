<?php
/**
 * Sponsors Shortcode
 *
 * @author 		ThemeBoy
 * @category 	Class
 * @package 	SportsPress Sponsors
 * @version     2.6.9
 */
class SP_Shortcode_Sponsors {

	/**
	 * Constructor
	 */
	function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		//add_filter( 'sportspress_locate_template', array( $this, 'locate_template' ) );
	}

	/**
	 * Init shortcodes
	 */
	public function init() {
		add_shortcode( 'sponsors', array( $this, 'output' ) );
	}

	/**
	 * Output the sponsors shortcode.
	 *
	 * @param array $atts
	 */
	public function output( $atts ) {
		ob_start();

		echo '<div class="sportspress">';
		sp_get_template( 'sponsors.php', $atts, '', SP_SPONSORS_DIR . 'templates/' );
		echo '</div>';

		return ob_get_clean();
	}

	public function locate_template( $template = null, $template_name = null, $template_path = null ) {
		if ( ! $template_path && $template_name == 'sponsors' ) {
			return SP_SPONSORS_DIR . '/templates/sponsors.php';
		}
	}
}

new SP_Shortcode_Sponsors();
