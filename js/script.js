jQuery(document).ready(function() {
    jQuery('.group').hide();
	jQuery('.group:first').fadeIn();
	jQuery('#of-nav li:first').addClass('current');
	jQuery('#of-nav li a').click(function(evt){
		jQuery('#of-nav li').removeClass('current');
		jQuery(this).parent().addClass('current');
		if(jQuery(this).attr("title")=="Embed Code"){
			jQuery(".embed_code_save").css("display", "block");
			jQuery(".embed_code_save").css("float", "left");
			jQuery(".embed_code_save").css("width", "120px");
			jQuery(".embed_code_save").css("height", "40px");
		}
		else{
			jQuery(".embed_code_save").css("display", "none");
		}
			var clicked_group = jQuery(this).attr('href');
			jQuery('.group').hide();
			jQuery(clicked_group).fadeIn();
			evt.preventDefault();
		});
    jQuery('.embed_code_save').click(function() {
		jQuery('div#loader_img').css("display","block");
		var text_value = jQuery('textarea#content_html').val();
		var data = {
            action: 'master_response',
            value: text_value
        };
        jQuery.post(script_call.ajaxurl, data, function(response) {
            if (response) {
                jQuery('div#loader_img').css("display", "none");
                }
            else {
                alert('error');
            }
        });
    });
});