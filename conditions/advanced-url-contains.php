<?php
/**
 * Is front page condition
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


	/**
	 * Define Jet_Popup_Conditions_Advanced_Url_Contains class
	 */
	class Jet_Popup_Conditions_Advanced_Url_Contains extends Jet_Popup_Conditions_Base {

		/**
		 * Condition slug
		 *
		 * @return string
		 */
		public function get_id() {
			return 'url-contains';
		}

		/**
		 * Condition label
		 *
		 * @return string
		 */
		public function get_label() {
			return __( 'Url Contains', 'jet-popup' );
		}

		/**
		 * Condition group
		 *
		 * @return string
		 */
		public function get_group() {
			return 'advanced';
		}

		/**
		 * [get_control description]
		 * @return [type] [description]
		 */
		public function get_control() {
			return [
				'type'        => 'input',
				'placeholder' => __( 'Input string', 'jet-popup' ),
			];
		}

		/**
		 * [ajax_action description]
		 * @return [type] [description]
		 */
		public function ajax_action() {
			return false;
		}

		/**
		 * [get_label_by_value description]
		 * @param  string $value [description]
		 * @return [type]        [description]
		 */
		public function get_label_by_value( $value = '' ) {
			return $value;
		}

		/**
		 * Condition check callback
		 *
		 * @return bool
		 */
		public function check( $arg = '' ) {

			if ( empty( $arg ) ) {
				return false;
			}

			$is_match = false;

			global $wp;
			$url = home_url( $wp->request );

			if ( false !== strpos( $url, $arg ) ) {
				$is_match = true;
			}

			return $is_match;
		}

	}


