
jQuery(document).ready(function($)
	{
		
		
		$(document).on('click', '.tab-nav li', function()
			{
				$(".active").removeClass("active");
				$(this).addClass("active");
				
				var nav = $(this).attr("nav");
				
				$(".box li.tab-box").css("display","none");
				$(".box"+nav).css("display","block");
		
			})
		
		
		
		
		$(document).on('click', '.rcs_content_source', function()
			{	
				var source = $(this).val();
				var source_id = $(this).attr("id");
				
				$(".content-source-box.active").removeClass("active");
				$(".content-source-box."+source_id).addClass("active");
				
			})
		
		
		

		
		
		
		
		jQuery(".rcs_taxonomy").click(function()
			{
				
				var taxonomy = jQuery(this).val();
				
				jQuery(".rcs_loading_taxonomy_category").css('display','block');

						jQuery.ajax(
							{
						type: 'POST',
						url: rcs_ajax.rcs_ajaxurl,
						data: {"action": "rcs_get_taxonomy_category","taxonomy":taxonomy},
						success: function(data)
								{	
									jQuery(".rcs_taxonomy_category").html(data);
									jQuery(".rcs_loading_taxonomy_category").fadeOut('slow');
								}
							});

		
			})
		
	
 		

	});	







