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
	class Jet_Popup_Conditions_Advanced_Query_Has_No_Items extends Jet_Popup_Conditions_Base {

		/**
		 * Condition slug
		 *
		 * @return string
		 */
		public function get_id() {
			return 'query_has_no_items';
		}

		/**
		 * Condition label
		 *
		 * @return string
		 */
		public function get_label() {
			return __( 'JetEngine Query Has No Items', 'jet-popup' );
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
				'type'        => 'select',
				'placeholder' => __( 'Select query', 'jet-popup' ),
			];
		}

		public function get_avaliable_options() {
			return \Jet_Engine\Query_Builder\Manager::instance()->get_queries_for_options( true );
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

			$has_no_items = false;

			$query = \Jet_Engine\Query_Builder\Manager::instance()->get_query_by_id( $arg );

			if ( $query ) {
				$has_no_items = ! $query->has_items();
			}

			return $has_no_items;
		}

	}


