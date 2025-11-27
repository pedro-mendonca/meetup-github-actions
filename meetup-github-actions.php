<?php
/**
 * Meetup GitHub Actions
 *
 * @package           Meetup_Github_Actions
 * @link              https://github.com/pedro-mendonca/meetup-github-actions
 * @author            Pedro Mendonça
 * @copyright         2025 Pedro Mendonça
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Meetup GitHub Actions for WordPress
 * Plugin URI:        https://wordpress.org/plugins/meetup-github-actions/
 * Description:       Meetup GitHub Actions description.
 * Version:           1.0.0
 * Requires at least: 5.3
 * Tested up to:      6.9
 * Requires PHP:      8.2
 * Author:            Pedro Mendonça
 * Author URI:        https://profiles.wordpress.org/pedromendonca/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       meetup-github-actions
 * Domain Path:       /languages
 */

namespace Meetup_Github_Actions;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Check if get_plugin_data() function exists.
if ( ! function_exists( 'get_plugin_data' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

// Get plugin headers data.
$meetup_github_actions_data = get_plugin_data( __FILE__, false, false );


// Set the plugin version.
if ( ! defined( 'MEETUP_GITHUB_ACTIONS_VERSION' ) ) {
	define( 'MEETUP_GITHUB_ACTIONS_VERSION', $meetup_github_actions_data['Version'] );
}

// Set the plugin URL.
define( 'MEETUP_GITHUB_ACTIONS_DIR_URL', plugin_dir_url( __FILE__ ) );

// Set the plugin filesystem path.
define( 'MEETUP_GITHUB_ACTIONS_DIR_PATH', plugin_dir_path( __FILE__ ) );

// Set the plugin file path.
define( 'MEETUP_GITHUB_ACTIONS_FILE', plugin_basename( __FILE__ ) );

// Include Composer autoload.
require_once MEETUP_GITHUB_ACTIONS_DIR_PATH . 'vendor/autoload.php';

/**
 * Initialize the plugin.
 *
 * @since 1.0.0
 */
function init(): void {
	new Init();
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\init' );
