<?php
/*
Plugin Name: Responsive Content Slider
Plugin URI: 
Description: Fully responsive and mobile ready Carousel Slider for your posttypes. unlimited slider anywhere via short-codes and easy admin setting.
Version: 1.0
Author: wpkids
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('rcs_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('rcs_plugin_dir', plugin_dir_path( __FILE__ ) );

require_once( plugin_dir_path( __FILE__ ) . 'includes/rcs-meta.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/rcs-functions.php');


//Themes php files

require_once( plugin_dir_path( __FILE__ ) . 'themes/flat/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/rossi/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/saiga/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/sako/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/ruger/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/anti-ruger/index.php');


function rcs_init_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('rcs_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		
		wp_localize_script('rcs_js', 'rcs_ajax', array( 'rcs_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('rcs_style', rcs_plugin_url.'css/style.css');

		wp_enqueue_script('owl.carousel', plugins_url( '/js/owl.carousel.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_style('owl.carousel', rcs_plugin_url.'css/owl.carousel.css');
		wp_enqueue_style('owl.theme', rcs_plugin_url.'css/owl.theme.css');
		
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'rcs_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		

		
		// Style for themes
		wp_enqueue_style('rcs-style-flat', rcs_plugin_url.'themes/flat/style.css');			
		wp_enqueue_style('rcs-style-rossi', rcs_plugin_url.'themes/rossi/style.css');
		wp_enqueue_style('rcs-style-saiga', rcs_plugin_url.'themes/saiga/style.css');
		wp_enqueue_style('rcs-style-sako', rcs_plugin_url.'themes/sako/style.css');
		wp_enqueue_style('rcs-style-ruger', rcs_plugin_url.'themes/ruger/style.css');		
		wp_enqueue_style('rcs-style-anti-ruger', rcs_plugin_url.'themes/anti-ruger/style.css');			
		
		
		
		
		//Style for font
		
		
		wp_register_style( 'Raleway', 'http://fonts.googleapis.com/css?family=Raleway:900'); 
		wp_enqueue_style( 'Raleway' );
		

		
	}
add_action("init","rcs_init_scripts");







register_activation_hook(__FILE__, 'rcs_activation');


function rcs_activation()
	{
		$rcs_version= "1.0";
		update_option('rcs_version', $rcs_version); //update plugin version.
		
		$rcs_customer_type= "free"; //customer_type "free"
		update_option('rcs_customer_type', $rcs_customer_type); //update plugin version.

	}


function rcs_display($atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'id' => "",

				), $atts);


			$post_id = $atts['id'];

			$rcs_themes = get_post_meta( $post_id, 'rcs_themes', true );

			$rcs_display ="";

			if($rcs_themes== "flat")
				{
					$rcs_display.= rcs_body_flat($post_id);
				}
				
			else if($rcs_themes== "rossi")
				{
					$rcs_display.= rcs_body_rossi($post_id);
				}				
				
			else if($rcs_themes== "saiga")
				{
					$rcs_display.= rcs_body_saiga($post_id);
				}
			else if($rcs_themes== "sako")
				{
					$rcs_display.= rcs_body_sako($post_id);
				}
				
			else if($rcs_themes== "ruger")
				{
					$rcs_display.= rcs_body_ruger($post_id);
				}				
				
			else if($rcs_themes== "anti-ruger")
				{
					$rcs_display.= rcs_body_anti_ruger($post_id);
				}				
				

return $rcs_display;



}

add_shortcode('rcs', 'rcs_display');









add_action('admin_menu', 'rcs_menu_init');


	
function rcs_menu_help(){
	include('rcs-help.php');	
}


function rcs_menu_settings(){
	include('rcs-settings.php');	
}



function rcs_menu_init()
	{
		add_submenu_page('edit.php?post_type=rcs', __('Settings','menu-wpt'), __('Settings','menu-wpt'), 'manage_options', 'rcs_menu_settings', 'rcs_menu_settings');	
			
		add_submenu_page('edit.php?post_type=rcs', __('Help & Upgrade','menu-wpt'), __('Help & Upgrade','menu-wpt'), 'manage_options', 'rcs_menu_help', 'rcs_menu_help');

	}





?>