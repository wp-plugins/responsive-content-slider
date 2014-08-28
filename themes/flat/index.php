<?php

function rcs_body_flat($post_id)
	{
		
		$rcs_ribbons = get_option( 'rcs_ribbons' );
		
		
		$rcs_bg_img = get_post_meta( $post_id, 'rcs_bg_img', true );
		$rcs_themes = get_post_meta( $post_id, 'rcs_themes', true );
		$rcs_total_items = get_post_meta( $post_id, 'rcs_total_items', true );		
		$rcs_column_number = get_post_meta( $post_id, 'rcs_column_number', true );
		$rcs_auto_play = get_post_meta( $post_id, 'rcs_auto_play', true );
		$rcs_stop_on_hover = get_post_meta( $post_id, 'rcs_stop_on_hover', true );
		$rcs_slider_navigation = get_post_meta( $post_id, 'rcs_slider_navigation', true );
		$rcs_slide_speed = get_post_meta( $post_id, 'rcs_slide_speed', true );
				
		$rcs_slider_pagination = get_post_meta( $post_id, 'rcs_slider_pagination', true );
		$rcs_pagination_slide_speed = get_post_meta( $post_id, 'rcs_pagination_slide_speed', true );
		$rcs_slider_pagination_count = get_post_meta( $post_id, 'rcs_slider_pagination_count', true );
		
		$rcs_slider_pagination_bg = get_post_meta( $post_id, 'rcs_slider_pagination_bg', true );		
		
		
		$rcs_slider_touch_drag = get_post_meta( $post_id, 'rcs_slider_touch_drag', true );
		$rcs_slider_mouse_drag = get_post_meta( $post_id, 'rcs_slider_mouse_drag', true );
		
		$rcs_content_source = get_post_meta( $post_id, 'rcs_content_source', true );
		$rcs_content_year = get_post_meta( $post_id, 'rcs_content_year', true );
		$rcs_content_month = get_post_meta( $post_id, 'rcs_content_month', true );
		$rcs_content_month_year = get_post_meta( $post_id, 'rcs_content_month_year', true );
		
		$rcs_posttype = get_post_meta( $post_id, 'rcs_posttype', true );			
		$rcs_taxonomy = get_post_meta( $post_id, 'rcs_taxonomy', true );		
		$rcs_taxonomy_category = get_post_meta( $post_id, 'rcs_taxonomy_category', true );	
			
		$rcs_post_ids = get_post_meta( $post->ID, 'rcs_post_ids', true );
		
		$rcs_items_title_color = get_post_meta( $post_id, 'rcs_items_title_color', true );			
		$rcs_items_title_font_size = get_post_meta( $post_id, 'rcs_items_title_font_size', true );		
					
		
		$rcs_items_thumb_size = get_post_meta( $post_id, 'rcs_items_thumb_size', true );
		$rcs_items_thumb_max_hieght = get_post_meta( $post_id, 'rcs_items_thumb_max_hieght', true );
		
		$rcs_ribbon_name = get_post_meta( $post_id, 'rcs_ribbon_name', true );		
		
		
		
		
		$rcs_body = '';
		$rcs_body = '<style type="text/css">

			
		.rcs-container #rcs-'.$post_id.' div.owl-pagination span.owl-numbers
			{
			 background: '.$rcs_slider_pagination_bg .';
			 color:'.$rcs_slider_pagination_text_color.';
			} 
			
		
		</style>';
		$rcs_body .= '
		<div  class="rcs-container" style="background-image:url('.$rcs_bg_img.')">
		<div class="rcs-ribbon rcs-ribbon-'.$rcs_ribbon_name.'" style="background:url('.$rcs_ribbons[$rcs_ribbon_name].') no-repeat scroll 0 0 rgba(0, 0, 0, 0);)"></div>
		
		<div  id="rcs-'.$post_id.'" class="owl-carousel  rcs-'.$rcs_themes.'">
		
		';
		
		global $wp_query;
		


		
		if(($rcs_content_source=="latest"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $rcs_posttype,
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => $rcs_total_items,
						
						) );
			
			
			}		
		
		elseif(($rcs_content_source=="older"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $rcs_posttype,
						'orderby' => 'date',
						'order' => 'ASC',
						'posts_per_page' => $rcs_total_items,
						
						) );

			}		

		elseif(($rcs_content_source=="featured"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $rcs_posttype,
						'meta_query' => array(
							array(
								'key' => '_featured',
								'value' => 'yes',
								)),
						'posts_per_page' => $rcs_total_items,
						
						) );

			}	


		elseif(($rcs_content_source=="year"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $rcs_posttype,
						'year' => $rcs_content_year,
						'posts_per_page' => $rcs_total_items,
						) );

			}

		elseif(($rcs_content_source=="month"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $rcs_posttype,
						'year' => $rcs_content_month_year,
						'monthnum' => $rcs_content_month,
						'posts_per_page' => $rcs_total_items,
						
						) );

			}

		elseif($rcs_content_source="taxonomy")
			{
				$wp_query = new WP_Query(
					array (
						'post_type' => $rcs_posttype,							
						'posts_per_page' => $rcs_total_items,
						
						'tax_query' => array(
							array(
								   'taxonomy' => $rcs_taxonomy,
								   'field' => 'id',
								   'terms' => $rcs_taxonomy_category,
							)
						)
						
						) );
			}


		
		elseif(($rcs_content_source=="post_id"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post__in' => $rcs_post_ids,
						'post_type' => $rcs_posttype,
						
						
						) );
			
			
			}

			

								
		
		if ( $wp_query->have_posts() ) :
		
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
		
		global $product;

		$rcs_featured = get_post_meta( get_the_ID(), '_featured', true );
		
		
		
		
		$rcs_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $rcs_items_thumb_size );
		
		$rcs_thumb_url = $rcs_thumb['0'];
		
		
		$rcs_body.= '<div class="rcs-items" >';
			
		if($rcs_featured=="yes")
			{
			$rcs_body.= '<div class="rcs-featured"></div>';
			}
				
		$rcs_body.= '<div style="max-height:'.$rcs_items_thumb_max_hieght.';" class="rcs-items-thumb"><a href="'.get_permalink().'"><img src="'.$rcs_thumb_url.'" /></a></div>
				<div class="items-info">
					<div class="rcs-items-title" style="color:'.$rcs_items_title_color.';font-size:'.$rcs_items_title_font_size.'">'.get_the_title().'</div>
					
				</div>
			</div>';
		
		endwhile;
		
		wp_reset_query();
		endif;
		

			
		$rcs_body .= '</div></div>';
		
		$rcs_body .='<script>
		jQuery(document).ready(function($)
		{
			$("#rcs-'.$post_id.'").owlCarousel({
				
				items : '.$rcs_column_number.', //10 items above 1000px browser width
				itemsDesktop : [1000,5], //5 items between 1000px and 901px
				itemsDesktopSmall : [900,3], // betweem 900px and 601px
				itemsTablet: [600,2], //2 items between 600 and 0
				itemsMobile : false, 
				navigationText : ["",""],
				';
				
			
		if($rcs_auto_play=="true")
			{
				
		$rcs_body .='autoPlay: '.$rcs_auto_play.',';
		
			}	
		
		if($rcs_stop_on_hover=="true")
			{
				
		$rcs_body .='stopOnHover: '.$rcs_stop_on_hover.',';
		
			}				
				
		if($rcs_slider_navigation=="true")
			{
				
		$rcs_body .='navigation: '.$rcs_slider_navigation.',';
		
			}				
				
		if(!empty($rcs_slider_pagination))
			{
				
		$rcs_body .='pagination: '.$rcs_slider_pagination.',';
		
			}
		else
			{
			$rcs_body .='pagination: false,';
			}
				
				
		if(!empty($rcs_slider_pagination_count))
			{
				
		$rcs_body .='paginationNumbers: true,';
		
			}
		else
			{
			$rcs_body .='paginationNumbers: false,';
			}				
				
				
				
		if(!empty($rcs_slide_speed))
			{
				
		$rcs_body .='slideSpeed: '.$rcs_slide_speed.',';
		
			}
			
				
		if(!empty($rcs_pagination_slide_speed))
			{
				
		$rcs_body .='paginationSpeed: '.$rcs_pagination_slide_speed.',';
		
			}			
			
			
		if(!empty($rcs_slider_touch_drag))
			{
				
		$rcs_body .='touchDrag : true,';
		
			}			
		else
			{
			$rcs_body .='touchDrag: false,';
			}
			
			
			
		if(!empty($rcs_slider_mouse_drag ))
			{
				
		$rcs_body .='mouseDrag  : true,';
		
			}			
		else
			{
			$rcs_body .='mouseDrag : false,';
			}			
			
			
			
			
							
				
				
				
		$rcs_body .='});
		
		});</script>';
		
		
		
		
		
		
		
		
		
		
		return $rcs_body;
		
		    
		
		
		
		
		
		
		
		
		
		
		
		
	}