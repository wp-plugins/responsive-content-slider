<?php



























function rcs_get_all_post_ids($postid)
	{
		
		$rcs_post_ids = get_post_meta( $postid, 'rcs_post_ids', true );
		$rcs_posttype = get_post_meta( $postid, 'rcs_posttype', true );
		
		
		$return_string = '';
		$return_string .= '<ul style="margin: 0;">';
		
		
		
		$args_product = array(
		'post_type' => $rcs_posttype,
		'posts_per_page' => -1,
		);

		$product_query = new WP_Query( $args_product );
	
		if($product_query->have_posts()): while($product_query->have_posts()): $product_query->the_post();
		

	   $return_string .= '<li><label ><input class="rcs_post_ids" type="checkbox" name="rcs_post_ids['.get_the_ID().']" value ="'.get_the_ID().'" ';
		
		if ( isset( $rcs_post_ids[get_the_ID()] ) )
			{
			$return_string .= "checked";
			}

		$return_string .= '/>';

		$return_string .= get_the_title().'</label ></li>';
			
		endwhile; 
		
		else:
		$return_string .= '<span style="color:#f00;">Sorry No Post Found, Please select at least one posttype above or make sure you have at least one post in your posttype selection.';
		endif; wp_reset_query();
		
		
		$return_string .= '</ul>';
		echo $return_string;
	
	}






function rcs_get_taxonomy_category($postid)
	{

	$rcs_taxonomy = get_post_meta( $postid, 'rcs_taxonomy', true );
	if(empty($rcs_taxonomy))
		{
			$rcs_taxonomy= "";
		}
	$rcs_taxonomy_category = get_post_meta( $postid, 'rcs_taxonomy_category', true );
	
		
		if(empty($rcs_taxonomy_category))
			{
			 	$rcs_taxonomy_category =array('none'); // an empty array when no category element selected
				
			
			}

		
		
		if(!isset($_POST['taxonomy']))
			{
			$taxonomy =$rcs_taxonomy;
			}
		else
			{
			$taxonomy = $_POST['taxonomy'];
			}
		
		
		$args=array(
		  'orderby' => 'name',
		  'order' => 'ASC',
		  'taxonomy' => $taxonomy,
		  );
	
	$categories = get_categories($args);
	
	
	if(empty($categories))
		{
		echo "No Items Found!";
		}
	
	
		$return_string = '';
		$return_string .= '<ul style="margin: 0;">';
	
	foreach($categories as $category){
		
		if(array_search($category->cat_ID, $rcs_taxonomy_category))
		{
	   $return_string .= '<li class='.$category->cat_ID.'><label ><input class="rcs_taxonomy_category" checked type="checkbox" name="rcs_taxonomy_category['.$category->cat_ID.']" value ="'.$category->cat_ID.'" />'.$category->cat_name.'</label ></li>';
		}
		
		else
			{
				   $return_string .= '<li class='.$category->cat_ID.'><label ><input class="rcs_taxonomy_category" type="checkbox" name="rcs_taxonomy_category['.$category->cat_ID.']" value ="'.$category->cat_ID.'" />'.$category->cat_name.'</label ></li>';			
			}
		
		

		
		}
	
		$return_string .= '</ul>';
		
		echo $return_string;
	
	if(isset($_POST['taxonomy']))
		{
			die();
		}
	
		
	}

add_action('wp_ajax_rcs_get_taxonomy_category', 'rcs_get_taxonomy_category');
add_action('wp_ajax_nopriv_rcs_get_taxonomy_category', 'rcs_get_taxonomy_category');
























































function rcs_dark_color($input_color)
	{
		if(empty($input_color))
			{
				return "";
			}
		else
			{
				$input = $input_color;
			  
				$col = Array(
					hexdec(substr($input,1,2)),
					hexdec(substr($input,3,2)),
					hexdec(substr($input,5,2))
				);
				$darker = Array(
					$col[0]/2,
					$col[1]/2,
					$col[2]/2
				);
		
				return "#".sprintf("%02X%02X%02X", $darker[0], $darker[1], $darker[2]);
			}

		
		
	}
	
	
	

	