<?php
/**
 * All public facing functions
 */
namespace WPPlugines\Custom_Login_Logo_And_URL\App;
use Codexpert\Plugin\Base;
use WPPlugines\Custom_Login_Logo_And_URL\Helper;
/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @package Plugin
 * @subpackage Front
 * @author Codexpert <hi@codexpert.io>
 */
class Front extends Base {

	public $plugin;

	/**
	 * Constructor function
	 */
	public function __construct( $plugin ) {
		$this->plugin	= $plugin;
		$this->slug		= $this->plugin['TextDomain'];
		$this->name		= $this->plugin['Name'];
		$this->version	= $this->plugin['Version'];
	}

	public function add_admin_bar( $admin_bar ) {
		if( ! current_user_can( 'manage_options' ) ) return;

		$admin_bar->add_menu( [
			'id'    => $this->slug,
			'title' => $this->name,
			'href'  => add_query_arg( 'page', $this->slug, admin_url( 'admin.php' ) ),
			'meta'  => [
				'title' => $this->name,            
			],
		] );
	}

	public function modal() {
		echo '
		<div id="wppcllu-modal" style="display: none">
			<img id="wppcllu-modal-loader" src="' . esc_attr( WPPCLLU_ASSET . '/img/loader.gif' ) . '" />
		</div>';
	}

	public function login_logo() {

		$logo_url 			= Helper::get_option( 'section_login_logo_url', 'upload_your_logo' );
		$logo_height 		= Helper::get_option( 'section_login_logo_style', 'logo_height', 84 );
		$logo_width 		= Helper::get_option( 'section_login_logo_style', 'logo_width', 84 );
		$logo_border_radius = Helper::get_option( 'section_login_logo_style', 'logo_border_radius', 0 );

		if ( empty( $logo_url ) ) return;

	    echo '<style type="text/css">
	        .login h1 a {
	            background-image: url(' . esc_url( $logo_url ) . ') !important;
	            background-size: contain !important;
	            width: '. esc_attr( $logo_width ) .'px !important;
	            height: '. esc_attr( $logo_height ) .'px !important;
	            border-radius: '. esc_attr( $logo_border_radius ) .'px !important;
	        }
	    </style>';
	}

	public function login_logo_url( $url )	{
		return Helper::get_option( 'section_login_logo_url', 'login_url', $url );
	}

	public function login_logo_url_title( $text )	{
		return Helper::get_option( 'section_login_logo_url', 'login_url_title', $text );
	}
}