<?php
/**
 * All settings related functions
 */
namespace WPPlugines\Custom_Login_Logo_And_URL\App;
use WPPlugines\Custom_Login_Logo_And_URL\Helper;
use Codexpert\Plugin\Base;
use Codexpert\Plugin\Settings as Settings_API;

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @package Plugin
 * @subpackage Settings
 * @author Codexpert <hi@codexpert.io>
 */
class Settings extends Base {

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
	
	public function init_menu() {

		$settings = [
			'id'            => $this->slug,
			'label'         => __( 'Login Logo & URL', 'wppcllu' ),
			'title'         => "{$this->name}" . __( ' Settings', 'wppcllu' ),
			'header'        => __( 'Login Logo & URL', 'wppcllu' ),
			// 'parent'     => 'woocommerce',
			// 'priority'   => 10,
			// 'capability' => 'manage_options',
			'icon'       => 'dashicons-format-gallery',
			// 'position'   => 25,
			// 'topnav'	=> true,
			'sections'      => [
				'section_login_logo_url'	=> [
					'id'        => 'section_login_logo_url',
					'label'     => __( 'Login Logo & URL', 'wppcllu' ),
					'icon'      => 'dashicons-admin-tools',
					// 'color'		=> '#4c3f93',
					'sticky'	=> false,
					'fields'    => [
						'upload_your_logo' => [
							'id'      => 'upload_your_logo',
							'label'     => __( 'Upload Your Logo' ),
							'type'      => 'file',
							'upload_button'     => __( 'Choose File', 'wppcllu' ),
							'select_button'     => __( 'Select File', 'wppcllu' ),
							'desc'      => __( 'Adds a custom login logo', 'wppcllu' ),
							'disabled'  => false, // true|false
							'default'   => ''
						],
						'login_url' => [
							'id'      => 'login_url',
							'label'     => __( 'Login URL', 'wppcllu' ),
							'type'      => 'url',
							'desc'      => __( 'Changes the login logo URL.', 'wppcllu' ),
							'default'   => home_url( '' ),
						],
						'login_url_title' => [
							'id'        => 'login_url_title',
							'label'     => __( 'Login URL Title', 'wppcllu' ),
							'type'      => 'text',
							'desc'      => __( 'Changes the login logo URL title.', 'wppcllu' ),
							'default'   => get_bloginfo( 'name' ),
						],
					]
				],
				'section_login_logo_style'	=> [
					'id'        => 'section_login_logo_style',
					'label'     => __( 'Style', 'wppcllu' ),
					'icon'      => 'dashicons-admin-appearance',
					// 'color'		=> '#4c3f93',
					'sticky'	=> false,
					'fields'    => [
						'logo_height' => [
							'id'      => 'logo_height',
							'label'     => __( 'Height', 'wppcllu' ),
							'type'      => 'number',
							'upload_button'     => __( 'Choose File', 'wppcllu' ),
							'select_button'     => __( 'Select File', 'wppcllu' ),
							'desc'      => __( 'Set custom logo height(PX)', 'wppcllu' ),
							'disabled'  => false, // true|false
							'default'   => '84'
						],
						'logo_width' => [
							'id'      => 'logo_width',
							'label'     => __( 'Width', 'wppcllu' ),
							'type'      => 'number',
							'upload_button'     => __( 'Choose File', 'wppcllu' ),
							'select_button'     => __( 'Select File', 'wppcllu' ),
							'desc'      => __( 'Set custom logo width(PX)', 'wppcllu' ),
							'disabled'  => false, // true|false
							'default'   => '84'
						],
						'logo_border_radius' => [
							'id'      => 'logo_border_radius',
							'label'     => __( 'Border Radius', 'wppcllu' ),
							'type'      => 'number',
							'upload_button'     => __( 'Choose File', 'wppcllu' ),
							'select_button'     => __( 'Select File', 'wppcllu' ),
							'desc'      => __( 'Set custom logo border radius(PX)', 'wppcllu' ),
							'disabled'  => false, // true|false
							'default'   => '0'
						],
					]
				],
			],
		];

		new Settings_API( $settings );
	}
}