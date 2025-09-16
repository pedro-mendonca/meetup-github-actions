<?php
/**
 * Class file for the my plugin.
 *
 * @package Meetup_Github_Actions
 *
 * @since 1.0.0
 */

namespace Meetup_Github_Actions;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( Init::class ) ) {

	/**
	 * Class Meetup_Github_Actions.
	 */
	class Init {


		/**
		 * Register actions.
		 *
		 * @return void
		 */
		public function __construct() {

			// Register and enqueue plugin styles.
			add_action( 'wp_enqueue_scripts', array( self::class, 'register_plugin_styles' ) );

			// Register and enqueue plugin scripts.
			add_action( 'wp_enqueue_scripts', array( self::class, 'register_plugin_scripts' ) );

			// Add items do admin menu.
			add_action( 'admin_menu', array( self::class, 'admin_menu' ), 10 );
		}


		/**
		 * Add items do admin menu.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public static function admin_menu() {

			// Icon.
			$svg = '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 16 16" width="20" aria-hidden="true" class="d-block">
				<path fill="currentColor" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
			</svg>';

			$meetup = array(
				'date'  => '2025-09-16',
				'title' => esc_html__( 'GitHub Actions', 'meetup-github-actions' ),
				'url'   => 'https://github.com/pedro-mendonca/meetup-github-actions',
				'icon'  => 'data:image/svg+xml;base64,' . base64_encode( $svg ), // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_encode
			);

			// Add the new menu item to the admin menu.
			add_menu_page(
				$meetup['title'], // Page title.
				$meetup['title'], // Menu title.
				'read',           // Capability required to access this menu item.
				$meetup['url'],   // URL.
				'',               // Callback.
				$meetup['icon'],  // Menu icon.
				3                 // Menu position.
			);
		}


		/**
		 * Register and enqueue style sheet.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public static function register_plugin_styles() {

			// Check if SCRIPT_DEBUG is true.
			$suffix = SCRIPT_DEBUG ? '' : '.min';

			wp_register_style(
				'meetup-github-actions-css',
				MEETUP_GITHUB_ACTIONS_DIR_URL . 'assets/css/style' . $suffix . '.css',
				array(),
				MEETUP_GITHUB_ACTIONS_VERSION
			);

			wp_enqueue_style(
				'meetup-github-actions-css'
			);
		}


		/**
		 * Register and enqueue scripts.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public static function register_plugin_scripts() {

			// Check if SCRIPT_DEBUG is true.
			$suffix = SCRIPT_DEBUG ? '' : '.min';

			wp_register_script(
				'meetup-github-actions-js',
				MEETUP_GITHUB_ACTIONS_DIR_URL . 'assets/js/scripts' . $suffix . '.js',
				array(),
				MEETUP_GITHUB_ACTIONS_VERSION,
				false
			);

			wp_enqueue_script( 'meetup-github-actions-js' );

			wp_set_script_translations(
				'meetup-github-actions-js',
				'meetup-github-actions'
			);

			wp_localize_script(
				'meetup-github-actions-js',
				'meetup-github-actions-data',
				array(
					'user_login'    => wp_get_current_user()->user_login,                             // Current user login (username).
					'do_some_magic' => apply_filters( 'meetup_github_actions_do_some_magic', true ),  // Whether or not to do some magic.
				)
			);
		}
	}
}
