<?php
/**
 * Plugin Name: JetPopup - Custom conditions
 * Plugin URI:
 * Description:
 * Version:     1.0.0
 * Author:      
 * Author URI:  
 * Text Domain: 
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

add_action( 'init', 'add_custom_jet_popup_conditions', -10000 );

function add_custom_jet_popup_conditions() {
	
	add_action( 'jet-popup/conditions/register', function( $manager ) {
		
		$conditions_path = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'conditions/';

		$conditions = array(
			'Jet_Popup_Conditions_Advanced_Url_Contains' => $conditions_path . 'advanced-url-contains.php',
		);

		foreach ( $conditions as $class => $file ) {
				require $file;
				$manager->register_condition( $class );
		}

	} );

}
