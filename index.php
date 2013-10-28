<?php
/*
  Plugin Name: FormGet Contact Form
  Plugin URI: http://www.formget.com
  Description: FormGet Contact Form is an eassy and effective form builder tool which enable you to bulid and embed form on your website in few steps. With FormGet Contact Form manage all your contact forms and your entire client communication at one single place.
  Version: 1.5
  Author: FormGet
  Author URI: http://www.formget.com
 */
function my_admin_notice() {
	$fg_iframe_form = get_option('fg_embed_code');
	$string = "sideBar";
        $pos = strpos($fg_iframe_form, $string);
        if ($pos == false) {
		global $current_user ;
		$user_id = $current_user->ID;
 /* Check that the user hasn't already clicked to ignore the message */
	 if ( ! get_user_meta($user_id, 'admin_ignore_notice') ){
	?>
    <div class="fg_trial-notify">
        <p>
	<a href='<?php echo admin_url('admin.php?page=cf_page'); ?>'>Click to Create your own Advance Contact Form.</a> You can add your built form to any Page, Post, Sidebar or as a Tabbed Content.<?php printf(__('<a class="fg_hide_notice", href="%1$s">Hide Notice</a>'), '?admin_nag_ignore=0'); ?></p>
    </div>
    <?php
	 }}}
add_action( 'admin_notices', 'my_admin_notice' );

function admin_nag_ignore() {
    global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['admin_nag_ignore']) && '0' == $_GET['admin_nag_ignore'] ) {
             add_user_meta($user_id, 'admin_ignore_notice', 'true', true);
    }
}
add_action('admin_init', 'admin_nag_ignore');

function delete_user_entry(){
	 global $current_user;
        $user_id = $current_user->ID;
delete_user_meta( $user_id, 'admin_ignore_notice', 'true', true );
}
register_deactivation_hook(__FILE__, 'delete_user_entry');

function cf_add_style() {
    wp_enqueue_style('form1_style1_sheet1', plugins_url('css/style.css', __FILE__));
}

add_action("init", "cf_add_style");
//setting page
add_action('admin_menu', 'cf_menu_page');

function cf_menu_page() {
    add_menu_page('cf', 'Contact Form', 'manage_options', 'cf_page', 'cf_setting_page', plugins_url('image/favicon.ico', __FILE__), 109);
}

function cf_setting_page() {
    $url = plugins_url();
    ?><div id="fg_of_container" class="fg_wrap">
        <form id="fg_ofform" action="" method="POST">
            <div id="fg_header">
                <div class="fg_logo">
                    <h2> FormGet Contact Form</h2>
                </div>
                <a target="#">
                    <div class="fg_icon-option"> </div>
                </a>
                <div class="clear"></div>
            </div>
            <div id="fg_main">

                <div id="fg_of-nav">
                    <ul>

                        <li> <a class="pn-view-a" href="#pn_content" title="Form Builder">Contact Form Builder </a></li>
                        <li> <a class="pn-view-a" href="#pn_displaysetting" title="Embed Code">Embed Code</a></li>
                        <li> <a class="pn-view-a" href="#pn_template" title="Help">Help</a></li>	
						<li> <a class="pn-view-a" href="#pn_contactus" title="Help">Plugin Support</a></li>

                    </ul>

                </div>
                <div id="fg_content">
                    <div class="fg_group" id="pn_content">
                        <h2>Contact Form Builder</h2>

                        <div class="fg_section section-text">
                            <h3 class="fg_heading"> Create your custom form by just clicking the fields on left side of the panel.</h3>

                            <iframe src="http://www.formget.com/app" name="iframe" id="iframebox" style="width:100%; height:750px; border:1px solid #dfdfdf; align:center;">
                            </iframe>
                        </div>

                    </div>	

                    <div class="fg_group" id="pn_displaysetting">
                        <h2>Embed Code</h2>

                        <div class="fg_section section-text">
                            <h3 class="fg_heading">Paste here your tabbed code which you will get after creating form, and then click on save button. Your form will start appearing on your website.</h3>
                            <div class="option">
                                <div class="fg_controls">
                                    <textarea name="content[html]" cols="60" rows="10"   class="regular-text"  id="fg_content_html" style="width:900px"><?php echo embeded_code(); ?></textarea>
                                    
									<input id="submit-form" class="fg_embed_code_save button-primary" type="button" value="Save Changes" name="submit_form" style="display:none;">			
									 <div id="loader_img" align="center" style="margin-left:460px; display:none;">
                                        <img src="<?php echo plugins_url('image/ajax-loader.gif', __FILE__); ?>">
                                    </div>

                                </div>
								
								</div>
                        </div>

                    </div>
                    <div class="fg_group" id="pn_template">
                        <h2>Steps to use FormGet Contact Form Plugin</h2>

                        <div class="fg_section section-text">
                            <h3></h3>
                            <div id="help_txt" style="width:900px;">
                                <ol class="step_ol">

                                    <li class="step_li">Go to "Contact Form Builder" tab and create your form by clicking on form fields.</li></br>
                                     <div id="step_img" style="width:963px; border: 1px solid #dfdfdf;"><img src="<?php echo plugins_url('image/1.png', __FILE__); ?>"></div></li></br></br></br>
                                 <div id="step_img" style="width:963px; border: 1px solid #dfdfdf;"><img src="<?php echo plugins_url('image/2.png', __FILE__); ?>"></div></li></br></br></br>
                                    <li class="step_li">After creating your form, Register yourself through a registration popup. Your form is now ready for embedding on your site.</br></br>
                                   <div id="step_img" style="width:963px; border: 1px solid #dfdfdf;"><img src="<?php echo plugins_url('image/3.png', __FILE__); ?>"></div></li></br></br></br>
                                    <li class="step_li">In order to add form to your website. Click the Embed link.</br></br>
                                        <div id="step_img" style="width:963px; border: 1px solid #dfdfdf;"><img src="<?php echo plugins_url('image/4.png', __FILE__); ?>"></div></li></br></br></br>
                                    <li class="step_li">Click on Tabbed Widget and copy the whole code by clicking on "Copy Code" button.</br></br>
                                        <div id="step_img" style="width:963px; border: 1px solid #dfdfdf;"><img src="<?php echo plugins_url('image/5.png', __FILE__); ?>"></div></li></br></br></br>
                                    <li class="step_li">Paste the copied code on "Emded Code" section in the plugin which appears on the "FormGet Contact Form" plugin dashboard inside WordPress Admin area.</br></br>
                                        <div id="step_img" style="width:963px; border: 1px solid #dfdfdf;"><img src="<?php echo plugins_url('image/6.png', __FILE__); ?>"></div></li></br></br></br>
                                    <li class="step_li">Your contact form will start to appear on your website. You can see a Contact Us Tab appearing on the right side of all your site pages.</li></br>
                                    <div id="step_img" style="width:963px; border: 1px solid #dfdfdf;"><img src="<?php echo plugins_url('image/9.png', __FILE__); ?>"></div></li></br></br></br>
                                    <li class="step_li">Alternatively you can also use the WordPress Shortcode tab under the Form Builder tab and use the code over there in your WordPress pages/posts to make the form appear on selective pages only.</li>
                                    <div id="step_img" style="width:963px; border: 1px solid #dfdfdf;"><img src="<?php echo plugins_url('image/8.png', __FILE__); ?>"></div></li></br></br></br>
                     <div id="step_img" style="width:963px; border: 1px solid #dfdfdf;"><img src="<?php echo plugins_url('image/10.png', __FILE__); ?>"></div></li></br></br></br>
    
                                </ol><br /><br />
                                <b><i> If you have any issues whatsoever. Email us at: neeraga@gmail.com and We will help you out with the form integration.<br /><br/>
                                Thanks</br>
                                FormGet Team</i></b>
                            </div>
                        </div>

                    </div>
					 <div class="fg_group" id="pn_contactus">
                      <iframe height='570' allowTransparency='true' frameborder='0' scrolling='no' style='width:100%;border:none'  src='http://www.formget.com/app/embed/form/qQvs-639'>Your Contact </iframe>
                      
                    </div>	

                </div>
                <div class="clear"></div>
            </div>

            <div class="fg_save_bar_top">

                

            </div>

        </form>
    </div>


    <?php
}

//embed code 
function cf_embeded_script() {
    wp_enqueue_script('embeded_script', plugins_url('js/script.js', __FILE__), array('jquery'));
    wp_localize_script('embeded_script', 'script_call', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action('init', 'cf_embeded_script');

function cf_text_ajax_process_request() {
    $text_value = $_POST['value'];
    update_option('fg_embed_code', $text_value);
}

add_action('wp_ajax_master_response', 'cf_text_ajax_process_request');
add_action('wp_ajax_nopriv_master_response', 'cf_text_ajax_process_request');
if (!function_exists('embeded_code')) {

    function embeded_code() {
        global $wpdb;
        $fg_iframe_form = get_option('fg_embed_code');

        $string = "sideBar";
        $pos = strpos($fg_iframe_form, $string);
        if ($pos == true) {
            echo stripslashes($fg_iframe_form);
        }
    }

}
add_action('wp_head', 'embeded_code');

//schort code function
if (!function_exists('formget_shortcode')) {

    function formget_shortcode($atts, $content = null) {
        extract(shortcode_atts(array(
            'user' => '',
            'formcode' => '',
            'allowTransparency' => true,
            'height' => '500',
            'tab' => ''
                        ), $atts));
        $iframe_formget = '';
        $url = "http://www.formget.com/app/embed/form/" . $formcode;
        if ($tab == 'page') {
            $iframe_formget .="<iframe height='" . $height . "' allowTransparency='true' frameborder='0' scrolling='no' style='width:100%;border:none'  src='" . $url . "' >";
            $iframe_formget .="</iframe>";
            add_filter('widget_text', 'do_shortcode');
            return $iframe_formget;
        }
        if ($tab == 'tabbed') {
            $tabbed_formget = <<<EOD
<script type="text/javascript">
    var sideBar;
    (function(d, t) {
        var s = d.createElement(t),
                options = {
            'tabKey': '{$formcode}',
            'tabtext':'Contact Us',
            'height': '{$height}',
            'position': "",
            'textColor': 'ffffff',
            'tabColor': '7d9f2b',
            'fontSize': '16',
        };
        s.src = 'http://www.formget.com/app/app_data/user_js/widget.js';
        s.onload = s.onreadystatechange = function() {
            var rs = this.readyState;
            if (rs)
                if (rs != 'complete')
                    if (rs != 'loaded')
                        return;
            try {
                sideBar = new buildTabbed();
                sideBar.initializeOption(options);
                sideBar.loadContent();
                sideBar.buildHtml();
            } catch (e) {
            }
        };
        var scr = d.getElementsByTagName(t)[0], par = scr.parentNode;
        par.insertBefore(s, scr);
    })(document, 'script');
</script>
EOD;
            return $tabbed_formget;
        }
		
    }

}
add_shortcode('formget', 'formget_shortcode');
?>