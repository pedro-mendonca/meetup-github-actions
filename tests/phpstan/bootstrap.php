<?php
/**
 * PHPStan bootstrap file
 *
 * @package Meetup_Github_Actions
 */

// Set script debug.
if ( ! defined( 'SCRIPT_DEBUG' ) ) {
	define( 'SCRIPT_DEBUG', true );
}

// Set plugin version.
if ( ! defined( 'MEETUP_GITHUB_ACTIONS_VERSION' ) ) {
	define( 'MEETUP_GITHUB_ACTIONS_VERSION', '1.0.0' );
}

// Set plugin required PHP version. Needed for PHP compatibility check for WordPress < 7.2.
if ( ! defined( 'MEETUP_GITHUB_ACTIONS_REQUIRED_PHP' ) ) {
	define( 'MEETUP_GITHUB_ACTIONS_REQUIRED_PHP', '7.4' );
}


// Require plugin main file.
require_once 'meetup-github-actions.php';
