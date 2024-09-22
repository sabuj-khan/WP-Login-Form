<?php
/*
 * Plugin Name:       WP Login Form Modify
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       WordPress Login form modification
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mohammad Sabuj Khan
 * Author URI:        https://sabuj.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       wplf
 * Domain Path:       /languages
 */



 function wplf_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo plugin_dir_url(__FILE__).'/assets/images/l.png' ?>);
		height:100px;
		width:100px;
		background-size: 100px 100px;
		background-repeat: no-repeat;
        	padding-bottom: 10px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wplf_login_logo' );




add_action('login_head', function(){
    add_filter('gettext', function($translated_text, $text_to_translate, $textdomain){
        if('Username or Email Address' == $text_to_translate){
            $translated_text = __('Write your User Name here', 'wplf');
        }elseif('Password' == $text_to_translate){
            $translated_text = __('Type the password here', 'wplf');
        }

        return $translated_text;
    }, 10, 3);
});




function wplf_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wplf_login_logo_url' );


function wplf_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertext', 'wplf_login_logo_url_title' );



function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', plugin_dir_url(__FILE__) . 'assets/css/login-style.css' );
    wp_enqueue_script( 'custom-login-js', plugin_dir_url(__FILE__). 'assets/js/login-style.js',['jquery'], true );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );











