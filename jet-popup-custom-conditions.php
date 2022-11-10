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
			add_filter( 'jet-popup/conditions/conditions-list', array( $this, 'add_custom_jet_popup_conditions' ) );
		}

		public function add_custom_jet_popup_conditions( $conditions ) {

			$conditions_path = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'conditions/';

			$custom_conditions = array(
				'\Jet_Popup\Conditions\Jet_Popup_Conditions_Advanced_Url_Contains' => $conditions_path . 'advanced-url-contains.php',
			);

			foreach( $custom_conditions as $class => $file ) {
				$conditions[$class] = $file;
			}

			return $conditions;

		}

	}

	new Jet_Popup_Custom_Conditions();

}
