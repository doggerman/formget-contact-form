<?php
/*
  Plugin Name: FormGet Contact Form
  Plugin URI: http://www.formget.com
  Description: Popup Contact Form 
  Version: 1.0
  Author: FormGet
  Author URI: http://www.formget.com
 */
function cf_add_style() {
    wp_enqueue_style('style', plugins_url('css/style.css', __FILE__));
}
add_action("init", "cf_add_style");
//include script
function cf_scripts() {
    wp_enqueue_script('select_script', plugins_url('js/script.js', __FILE__), array('jquery'));
    wp_localize_script('select_script', 'embed_script_call', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('init', 'cf_scripts');
//setting page
add_action('admin_menu', 'cf_menu_page');
function cf_menu_page() {
    add_menu_page('cf', 'Contact Form', 'manage_options', 'cf_page', 'cf_setting_page', plugins_url( 'image/favicon.ico', __FILE__ ), '109');
}
function cf_setting_page() {?>
 <div class="container" id="container">
        <ul id="tabs">
            <li class="goto_fg_advance_form" id="goto_fg_advance_form" cursor="pointer">Contact Form Builder</li>
            <li class="embed_advance_form" id="embed_advance_form" cursor="pointer">Embed Code</li>
        </ul>
     </div><br /><br /><br />
    <div id="ifrme_division" class="iframe_division" >
            <iframe src="http://www.formget.com/app" name="iframe" id="iframebox" width="94%" height="700px">
            </iframe>
            <div class="content">
    <p>
    <ul id="content_para">
        <h4>
        <li>&#9830;Step 1 :&#8594;  Create your custom form by just clicking the fields on left side of the pannel.</li> 
        <li>&#9830;Step 2 :&#8594;  After adding respective fields on your form, click on save form button.</li>
        <li>&#9830;Step 3 :&#8594;  A popup window will appears on screen for registration, create an account and get registered.</li>
        <li>&#9830;Step 4 :&#8594;  The FormGet dashboard will opened.  </li>
        <li>&#9830;Step 5 :&#8594;  Click on embed which get appear on your FormGet dashboard and get the embed code(tapped code), copy the code.</li>
        <li>&#9830;Step 6 :&#8594;  Paste the code on embed code tab next to advance form builder at given area and then  click on save button.</li>
       <a href="http://www.formget.com/" target="_blank"> Click here to reach FormGet.com </a>
        </h4>
    </ul>       
</p>
</div>
        </div>
   <div id="embed_advance_form_division" class="embed_advance_form_division" >
       <h3> Paste here your tabbed code which you will get after creating form, and then click on save button. Your form will start appearing on your website.</h3>
                <textarea rows="10" cols="125" name="embed_code" id="embed_code"><?php cf_embeded_code(); ?></textarea></br>
                <button class="embed_code_save" id="embed_code_save"> Save </button>        
        </div>
     <?php
}
  function cf_embeded_code() {
            global $wpdb;
            $result = get_option('cf_fg_tabed_code');
            echo stripslashes($result);
        }
        add_action('wp_head', 'cf_embeded_code');
 function cf_text_ajax_process_request() {
            $text_value = $_POST['value'];
            update_option('cf_fg_tabed_code', $text_value);
        }
        add_action('wp_ajax_master_response', 'cf_text_ajax_process_request');
        add_action('wp_ajax_nopriv_master_response', 'cf_text_ajax_process_request');
?>