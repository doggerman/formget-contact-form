/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    jQuery('li#fg_goto_fg_advance_form').click(function() {
        jQuery('#iframebox').css({"display": "block"});
        jQuery('div.fg_embed_advance_form_division').css({"display": "none"});
        jQuery('.content').css({'display': 'block'});
    });
    jQuery('li#fg_embed_advance_form').click(function() {
        jQuery('div.fg_embed_advance_form_division').css({"display": "block"});
        jQuery('#iframebox').css({"display": "none"});
        jQuery('.content').css({'display': 'none'});
    });
    jQuery('.embed_code_save').click(function() {
        var text_value = jQuery(this).parent().children('textarea#embed_code').val();
       var data = {
            action: 'master_response',
            value: text_value
        };
        jQuery.post(embed_script_call.ajaxurl, data, function(response) {
            if (response) {
   //alert("response");
            }
            else {
                alert('error');
            }
        });
    });
});