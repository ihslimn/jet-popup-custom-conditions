<?php
/**
 * Plugin Name: JetPopup - Custom conditions
 * Plugin URI:
 * Description: Makes possible to add custom conditions to JetPopup. Contains "Url Contains" condition.
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

if ( ! class_exists( 'Jet_Popup_Custom_Conditions' ) ) {
	
	class Jet_Popup_Custom_Conditions {

		public function __construct() {
			add_action( 'init', array( $this, 'add_custom_jet_popup_conditions' ), -10000 );
		}

		public function add_custom_jet_popup_conditions() {
			
			add_action( 'jet-popup/conditions/register', function( $manager ) {
				
				$conditions_path = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'conditions/';

				$conditions = array(
					'Jet_Popup_Conditions_Advanced_Url_Contains' => $conditions_path . 'advanced-url-contains.php',
				);

				if ( function_exists( 'jet_engine' ) ) {
					$conditions['Jet_Popup_Conditions_Advanced_Query_Has_Items']    = $conditions_path . 'query-has-items.php';
					$conditions['Jet_Popup_Conditions_Advanced_Query_Has_No_Items'] = $conditions_path . 'query-has-no-items.php';
				}

				foreach ( $conditions as $class => $file ) {
					require $file;
					$manager->register_condition( $class );
				}

			} );

		}

	}

	new Jet_Popup_Custom_Conditions();

}
