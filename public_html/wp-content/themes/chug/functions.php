<?php

require "lib/markdown/markdown.php";

add_action('init','register_custom_menu');
function register_custom_menu(){
  register_nav_menu('custom_menu',__('Custom Menu'));
}

add_theme_support('post-thumbnails');

add_filter( 'gettext', 'change_howdy_text', 10, 2 );
function change_howdy_text( $translation, $original ) {
    if( 'Howdy, %1$s' == $original )
        $translation = '%1$s';
    return $translation;
}

function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 {
            display: none;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


function ttf_pages_columns($columns) {
    unset($columns['comments']);
    unset($columns['author']);
    unset($columns['date']);
    return $columns;
}

function ttf_posts_columns($columns) {
    unset($columns['comments']);
    unset($columns['author']);
    unset($columns['tags']);
    return $columns;
}

add_filter('manage_edit-page_columns', 'ttf_pages_columns');
add_filter('manage_edit-post_columns', 'ttf_posts_columns');


/* Disable XMLRPC pingbacks/trackbacks */

add_filter( 'wp_headers', 'pmg_kt_filter_headers', 10, 1 );
function pmg_kt_filter_headers( $headers ) {
    if ( isset( $headers['X-Pingback'] ) ) unset( $headers['X-Pingback'] );
    return $headers;
}

// Kill the rewrite rule
add_filter( 'rewrite_rules_array', 'pmg_kt_filter_rewrites' );
function pmg_kt_filter_rewrites( $rules ) {
	foreach( $rules as $rule => $rewrite ) {
		if ( preg_match( '/trackback\/\?\$$/i', $rule ) ) unset( $rules[$rule] );
	}
	return $rules;
}

// Kill bloginfo( 'pingback_url' )
add_filter( 'bloginfo_url', 'pmg_kt_kill_pingback_url', 10, 2 );
function pmg_kt_kill_pingback_url( $output, $show ) {
	if ( $show == 'pingback_url' ) $output = '';
	return $output;
}

// remove RSD link
remove_action( 'wp_head', 'rsd_link' );

// hijack options updating for XMLRPC
add_filter( 'pre_update_option_enable_xmlrpc', '__return_false' );
add_filter( 'pre_option_enable_xmlrpc', '__return_zero' );

// Disable XMLRPC call
add_action( 'xmlrpc_call', 'pmg_kt_kill_xmlrpc' );
function pmg_kt_kill_xmlrpc( $action ) {
	if ( 'pingback.ping' === $action ) {
		wp_die( 'Pingbacks are not supported', 'Not Allowed!', array( 'response' => 403 ));
	}
}

/* Remove unwanted menu items */

function remove_menus() {
    global $menu;
	$restricted = array(__('Postss'), __('Media'), __('Links'), __('Pagess'), __('Appearances'), __('Settingss'), __('Tools'), __('Userss'), __('Comments'), __('Plugins'));
	end($menu);
	while ( prev($menu) ){
		$value = explode( ' ', $menu[key($menu)][0] );
		if ( in_array( $value[0] != NULL?$value[0]:"" , $restricted ) ) unset( $menu[key($menu)] );
	}
}
add_action('admin_menu', 'remove_menus');

/* Disable all feeds */

function disable_all_feeds() {
    header('HTTP/1.0 404 Not Found');
    exit;
}

add_action('do_feed', 'disable_all_feeds', 1);
add_action('do_feed_rdf', 'disable_all_feeds', 1);
add_action('do_feed_rss', 'disable_all_feeds', 1);
add_action('do_feed_rss2', 'disable_all_feeds', 1);
add_action('do_feed_atom', 'disable_all_feeds', 1);



function my_admin_head() {
        ?>
        <style>
        #wp-admin-bar-new-content, #wp-admin-bar-comments, #contextual-help-link-wrap/*, #toplevel_page_edit-post_type-acf*/, /*#screen-options-link-wrap,*/ #wp-admin-bar-wp-logo, #footer, .row-actions .inline, /*#visibility, #minor-publishing,.misc-pub-section.curtime,*/ .wp-not-current-submenu.wp-menu-separator, .avatar.avatar-16.photo /*, #contextual-help-link-wrap, #screen-options-link-wrap, #dashboard-widgets-wrap*/ {
            display: none !important;
        }
        
        #wpadminbar .quicklinks > ul > #wp-admin-bar-wp-logo {
            border-right: none;
        }
        
        .avatar {
            display: none !important;
        }
        
        #wpadminbar #wp-admin-bar-my-account.with-avatar #wp-admin-bar-user-actions > li {
            margin-left: 0;
            text-align: right;
        }
        
        #wpadminbar #wp-admin-bar-user-actions > li {
            margin-right: 0;
        }
        
        </style>
        <?php
}

add_action('admin_head', 'my_admin_head');



?>