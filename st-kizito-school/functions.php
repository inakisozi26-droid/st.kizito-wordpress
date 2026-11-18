<?php
if (!defined('ABSPATH')) exit;
function sks_setup() {
    add_theme_support('title-tag'); add_theme_support('post-thumbnails'); add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption','style','script'));
    register_nav_menus(array('primary' => __('Main Menu','st-kizito-school')));
}
add_action('after_setup_theme','sks_setup');
function sks_assets() {
    wp_enqueue_style('sks-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script('sks-main', get_theme_file_uri('/assets/js/main.js'), array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts','sks_assets');
function sks_image($file) { return esc_url(get_theme_file_uri('/assets/images/'.rawurlencode($file))); }
function sks_create_pages() {
    $pages = array(
      'home'=>array('Home',''), 'about-us'=>array('About Us',''), 'services'=>array('Services',''),
      'gallery'=>array('Gallery',''), 'events'=>array('Events',''), 'contact-us'=>array('Contact Us','')
    );
    foreach ($pages as $slug=>$data) {
      $existing=get_page_by_path($slug);
      if (!$existing) wp_insert_post(array('post_title'=>$data[0],'post_name'=>$slug,'post_status'=>'publish','post_type'=>'page','post_content'=>''));
    }
    $home=get_page_by_path('home');
    if ($home) { update_option('show_on_front','page'); update_option('page_on_front',$home->ID); }
    $menu_name='St Kizito Main Menu'; $menu=wp_get_nav_menu_object($menu_name);
    if (!$menu) { $menu_id=wp_create_nav_menu($menu_name); foreach ($pages as $slug=>$data) { $p=get_page_by_path($slug); if($p) wp_update_nav_menu_item($menu_id,0,array('menu-item-title'=>$data[0],'menu-item-object'=>'page','menu-item-object-id'=>$p->ID,'menu-item-type'=>'post_type','menu-item-status'=>'publish')); } $locations=get_theme_mod('nav_menu_locations'); $locations['primary']=$menu_id; set_theme_mod('nav_menu_locations',$locations); }
}
add_action('after_switch_theme','sks_create_pages');
function sks_contact_submit() {
    if (!isset($_POST['sks_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['sks_nonce'])),'sks_contact')) wp_die('Security check failed. Please go back and try again.');
    $name=sanitize_text_field(wp_unslash($_POST['full_name'] ?? ''));
    $email=sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $phone=sanitize_text_field(wp_unslash($_POST['phone'] ?? ''));
    $subject=sanitize_text_field(wp_unslash($_POST['subject'] ?? 'Website enquiry'));
    $message=sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));
    if (!$name || !is_email($email) || !$message) { wp_safe_redirect(add_query_arg('contact','invalid',wp_get_referer())); exit; }
    $body="Name: $name\nEmail: $email\nPhone: $phone\n\n$message";
    $sent=wp_mail('stkizitokisule@gmail.com','Website enquiry: '.$subject,$body,array('Reply-To: '.$name.' <'.$email.'>'));
    wp_safe_redirect(add_query_arg('contact',$sent?'sent':'failed',wp_get_referer())); exit;
}
add_action('admin_post_nopriv_sks_contact','sks_contact_submit'); add_action('admin_post_sks_contact','sks_contact_submit');
