<?php
/*
  Plugin Name: FormGet Contact Form
  Plugin URI: http://www.formget.com
  Description: FormGet Contact Form  is a sophisticated and user-friendly contact form solution. With FormGet Contact Form manage all your contact forms and your entire client communication at one single place. FormGet Contact Forms is a simple solution for those who need comprehensive contact forms.
  Version: 1.1
  Author: FormGet
  Author URI: http://www.formget.com
 */
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
    ?><div id="of_container" class="wrap">
        <form id="ofform" action="" method="POST">
            <div id="header">
                <div class="logo">
                    <h2> FormGet Contact Form</h2>
                </div>
                <a target="#">
                    <div class="icon-option"> </div>
                </a>
                <div class="clear"></div>
            </div>
            <div id="main">

                <div id="of-nav">
                    <ul>

                        <li> <a class="pn-view-a" href="#pn_content" title="Form Builder">Contact Form Builder </a></li>
                        <li> <a class="pn-view-a" href="#pn_displaysetting" title="Embed Code">Embed Code</a></li>
                        <li> <a class="pn-view-a" href="#pn_template" title="Help">Help</a></li>	

                    </ul>

                </div>
                <div id="content">
                    <div class="group" id="pn_content">
                        <h2>Contact Form Builder</h2>

                        <div class="section section-text">
                            <h3 class="heading"> Create your custom form by just clicking the fields on left side of the panel.</h3>

                            <iframe src="http://www.formget.com/app" name="iframe" id="iframebox" style="width:100%; height:750px; border:1px solid #dfdfdf; align:center;">
                            </iframe>
                        </div>

                    </div>	

                    <div class="group" id="pn_displaysetting">
                        <h2>Embed Code</h2>

                        <div class="section section-text">
                            <h3 class="heading">Paste here your tabbed code which you will get after creating form, and then click on save button. Your form will start appearing on your website.</h3>
                            <div class="option">
                                <div class="controls">
                                    <textarea name="content[html]" cols="60" rows="10"   class="regular-text"  id="content_html" style="width:900px"><?php echo embeded_code() ?></textarea>
                                    <div id="loader_img" align="center" style="margin-left:460px; display:none;">
                                        <img src="<?php echo plugins_url('image/ajax-loader.gif', __FILE__); ?>">
                                    </div>
                                </div></div>
                        </div>

                    </div>
                    <div class="group" id="pn_template">
                        <h2>Steps to use FormGet Contact Form Plugin</h2>

                        <div class="section section-text">
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

                </div>
                <div class="clear"></div>
            </div>

            <div class="save_bar_top">

                <input id="submit-form" class="embed_code_save button-primary" type="button" value="Save Changes" name="submit_form" style="display:none;">

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

        $string = "window.onload = function()";
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
var head=document.getElementsByTagName('head')[0];
        head.innerHTML=head.innerHTML+'<link rel="stylesheet" href="http://www.formget.com/app/app_data/user_js/dialog.css" type="text/css" />';
        window.onload = function() {
        var body=document.getElementsByTagName('body')[0];
        var slide_div=document.createElement('div');
        slide_div.setAttribute('id','slide_div');
        slide_div.setAttribute('class','slide_div');
        slide_div.innerHTML="<span class='pin-top'></span><span class='pin-middle'>Contact form</span><span class='pin-bottom'></span>";
        slide_div.setAttribute('style','top:40%; right:-90px; height:40px; position:fixed;');
        slide_div.setAttribute('onclick','document.getElementById("Formget_Dialog_Box").style.display="block"');
        body.appendChild(slide_div);
        var Formget_Dialog_Box=document.createElement('div');
        Formget_Dialog_Box.setAttribute('id','Formget_Dialog_Box');
        Formget_Dialog_Box.setAttribute('onclick','tabbed();');
        Formget_Dialog_Box.innerHTML='<div class="formget-dialog1"></div><div class="formget-dialog2"><div class="formget-dialog3"><div class="formget-dialog4"><div class="dialog-close" title="Close Dialog"><button>Close Dialog</button></div><div class="formget-dialog5"><iframe allowtransparency="true" frameborder="0" src="{$url}"></iframe></div><a class="formget-dialog-logo" href="http://www.formget.com" target="_blank"></a></div></div></div>';
        body.appendChild(Formget_Dialog_Box);    }   
        function tabbed()  {
        document.getElementById("Formget_Dialog_Box").setAttribute("style","position:fixed; top:0; left:0; width:100%; height:100%; display:none; text-align:center; z-index:2000;");
    }
</script>
EOD;
            return $tabbed_formget;
        }
    }

}
add_shortcode('formget', 'formget_shortcode');
?>