<?php
/**
 * Author:      WP Rocket Support Team
 * Author URI:  http://wp-rocket.me/
 * License:     GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Copyright SAS WP MEDIA 2018
 */

namespace WP_Rocket\Helpers\preload\sitemap;

// Standard plugin security, keep this line in place.
defined( 'ABSPATH' ) or die();

// EDIT THIS TO DEFINE A CUSTOM PRELOAD INTERVAL IN SECONDS:
define( 'WPROCKETHELPERS_PRELOAD_INTERVAL_IN_SECONDS', 15 );
// STOP EDITING.

/**
 * Set the preload interval for WP Rocket in microseconds.
 *
 * @author Arun Basil Lal
 * @author Caspar Hübinger
 * @return integer Custom preload interval in microseconds
 */
function apply_preload_interval() {
	return absint( WPROCKETHELPERS_PRELOAD_INTERVAL_IN_SECONDS ) * 1000 * 1000; // microseconds
}
add_filter( 'pre_get_rocket_option_sitemap_preload_url_crawl', __NAMESPACE__ . '\apply_preload_interval' );