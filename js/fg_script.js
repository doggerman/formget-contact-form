jQuery(document).ready(function() {
    jQuery('.fg_group').hide();
    jQuery('#pn_content').css("display", "block");

    jQuery('#embed_tab').click(function() {
        // alert("hello");
        jQuery('.fg_group').hide();
        jQuery('.nav-tab').removeClass('nav-tab-active');
        jQuery(this).addClass('nav-tab-active');
        jQuery('#pn_displaysetting').css("display", "block");
        jQuery(".fg_embed_code_save").css("display", "block");

    });

    jQuery('#support_tab').click(function() {
        // alert("hello");
        jQuery('.fg_group').hide();
        jQuery('.nav-tab').removeClass('nav-tab-active');
        jQuery(this).addClass('nav-tab-active');
        jQuery('#pn_contactus').css("display", "block");
    });
    jQuery('#help_tab').click(function() {
        // alert("hello");
        jQuery('.fg_group').hide();
        jQuery('.nav-tab').removeClass('nav-tab-active');
        jQuery(this).addClass('nav-tab-active');
        jQuery('#pn_template').css("display", "block");
    });


    jQuery('#form_tab').click(function() {
        //  alert("hello");
        jQuery('.fg_group').hide();
        jQuery('.nav-tab').removeClass('nav-tab-active');
        jQuery(this).addClass('nav-tab-active');
        jQuery('#pn_content').css("display", "block");
    });



    jQuery('.fg_embed_code_save').click(function() {
        jQuery('div#loader_img').css("display", "block");
        var text_value = jQuery('textarea#fg_content_html').val();
        var data = {
            action: 'master_response',
            value: text_value
        };
        jQuery.post(script_call.ajaxurl, data, function(response) {
            if (response) {
                jQuery('div#loader_img').css("display", "none");
            }
            else {

                jQuery('div#loader_img').css("display", "none");
            }
        });
    });
});