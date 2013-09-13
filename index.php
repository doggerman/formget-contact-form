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
 <div class="fg_container" id="fg_container">
        <ul id="tabs">
            <li class="fg_goto_fg_advance_form" id="fg_goto_fg_advance_form" cursor="pointer">Contact Form Builder</li>
            <li class="fg_embed_advance_form" id="fg_embed_advance_form" cursor="pointer">Embed Code</li>
        </ul>
     </div><br /><br /><br />
    <div id="ifrme_division" class="iframe_division" >
                    <div class="content">
    <p>
    <ul id="content_para">
         <h2>Steps to create form for your website.</h2>
        <h4>
       
Step 1 : Create your custom form by just clicking the fields on left side of the panel.<br /><br />

Step 2 : After adding respective fields on your form, click on save form button.<br /><br />

Step 3 : A popup window will appear on screen for registration, create an account and get registered.<br /><br />

Step 4 : The FormGet dashboard will be opened.<br /><br />

Step 5 : Click on embed from the FormGet dashboard and get the embed code for(tabbed widget), Click "Copy Code".<br /><br />

Step 6 : Paste the copied code under the embed code tab next to advance form builder under your WordPress dashboard and then click on save button.<br /><br />

Your Form will start to appear on your website.
        </h4>
    </ul>       
</p>
</div>
            <iframe src="http://www.formget.com/app" name="iframe" id="iframebox" width="94%" height="700px">
            </iframe>
        </div>
   <div id="fg_embed_advance_form_division" class="fg_embed_advance_form_division" >
       <h3> Paste here your tabbed code which you will get after creating form, and then click on save button. Your form will start appearing on your website.</h3>
                <textarea rows="10" cols="125" name="embed_code" id="embed_code"><?php cf_embeded_code(); ?></textarea></br>
                <button class="embed_code_save" id="embed_code_save"> Save </button><br />
                <div class="fg_content"><h4>Note : After Saving the Embed Code above. Visit your website to see the Contact Form Tab on right.</h4></div>
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