<?php 
/**
 * Plugin Name: Marchex Call Tracking
 * Description: Enables Marchex call tracking
 * Version: 1.0.2
 * Author: Workshop Digital
 * Author URI: https://www.workshopdigital.com
 * License: GPL2
 */

class marchexCallTracking {


	public function __construct() {
		add_action( 'wp_head', array( $this, 'marchex_ppc_number_generator_id' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'marchex_ppc_number_generator'), 20 );

		add_action( 'admin_init', array( $this, 'save_data' ) );		
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
	}


	public function marchex_ppc_number_generator() {
		wp_enqueue_script( 'marchex-number-generator', 'https://adtrack.voicestar.com/euinc/number-changer.js', null, '1.0', true);
	}


	public function marchex_ppc_number_generator_id() {
		echo '<script type="text/javascript">vs_account_id = "'.get_option( 'marchex_id' ).'"; </script>' ."\n";
	}


	public function add_admin_menu() {
		add_options_page( 'Marchex', 'Marchex', 'manage_options', 'marchex', array( $this, 'admin_page' ) );
	}	


	public function admin_page() {
		require_once( 'form.php' );
	}


	public function save_data() {
		if ( isset( $_POST['marchex_id'] ) && check_admin_referer( 'marchex' ) ) {
			update_option( 'marchex_id', $_POST['marchex_id'] );
			wp_redirect( admin_url( 'options-general.php?page=marchex&settings-updated=true' ) );
		}
		else {
			return;
		}

	}	

}
if ( class_exists( 'marchexCallTracking' ) ) new marchexCallTracking;