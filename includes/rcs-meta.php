<?php


function rcs_posttype_register() {
 
        $labels = array(
                'name' => _x('RCS', 'rcs'),
                'singular_name' => _x('RCS', 'rcs'),
                'add_new' => _x('New RCS', 'rcs'),
                'add_new_item' => __('New RCS'),
                'edit_item' => __('Edit RCS'),
                'new_item' => __('New RCS'),
                'view_item' => __('View RCS'),
                'search_items' => __('Search RCS'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'rcs' , $args );

}

add_action('init', 'rcs_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_rcs()
	{
		$screens = array( 'rcs' );
		foreach ( $screens as $screen )
			{
				add_meta_box('rcs_metabox',__( 'Responsive Content Slider Options','rcs' ),'meta_boxes_rcs_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_rcs' );


function meta_boxes_rcs_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_rcs_input', 'meta_boxes_rcs_input_nonce' );
	
	
	$rcs_bg_img = get_post_meta( $post->ID, 'rcs_bg_img', true );
	$rcs_themes = get_post_meta( $post->ID, 'rcs_themes', true );
	$rcs_total_items = get_post_meta( $post->ID, 'rcs_total_items', true );	
	$rcs_column_number = get_post_meta( $post->ID, 'rcs_column_number', true );	
	$rcs_auto_play = get_post_meta( $post->ID, 'rcs_auto_play', true );
	$rcs_stop_on_hover = get_post_meta( $post->ID, 'rcs_stop_on_hover', true );
	$rcs_slider_navigation = get_post_meta( $post->ID, 'rcs_slider_navigation', true );
	$rcs_slider_navigation_speed = get_post_meta( $post->ID, 'rcs_slider_navigation_speed', true );
		
	$rcs_slider_pagination = get_post_meta( $post->ID, 'rcs_slider_pagination', true );
	$rcs_pagination_slide_speed = get_post_meta( $post->ID, 'rcs_pagination_slide_speed', true );
	$rcs_slider_pagination_count = get_post_meta( $post->ID, 'rcs_slider_pagination_count', true );
	
	$rcs_slider_pagination_bg = get_post_meta( $post->ID, 'rcs_slider_pagination_bg', true );
	$rcs_slider_pagination_text_color = get_post_meta( $post->ID, 'rcs_slider_pagination_text_color', true );	
	
	$rcs_slider_touch_drag = get_post_meta( $post->ID, 'rcs_slider_touch_drag', true );
	$rcs_slider_mouse_drag = get_post_meta( $post->ID, 'rcs_slider_mouse_drag', true );
	
	$rcs_content_source = get_post_meta( $post->ID, 'rcs_content_source', true );
	$rcs_content_year = get_post_meta( $post->ID, 'rcs_content_year', true );
	$rcs_content_month = get_post_meta( $post->ID, 'rcs_content_month', true );
	$rcs_content_month_year = get_post_meta( $post->ID, 'rcs_content_month_year', true );	

	$rcs_posttype = get_post_meta( $post->ID, 'rcs_posttype', true );
	$rcs_taxonomy = get_post_meta( $post->ID, 'rcs_taxonomy', true );
	$rcs_taxonomy_category = get_post_meta( $post->ID, 'rcs_taxonomy_category', true );
	
	$rcs_post_ids = get_post_meta( $post->ID, 'rcs_post_ids', true );	

	
	$rcs_items_title_color = get_post_meta( $post->ID, 'rcs_items_title_color', true );	
	$rcs_items_title_font_size = get_post_meta( $post->ID, 'rcs_items_title_font_size', true );
	
	
	$rcs_items_thumb_size = get_post_meta( $post->ID, 'rcs_items_thumb_size', true );	
	$rcs_items_thumb_max_hieght = get_post_meta( $post->ID, 'rcs_items_thumb_max_hieght', true );	
	
	$rcs_ribbon_name = get_post_meta( $post->ID, 'rcs_ribbon_name', true );		
	
	
	
	
 






		$rcs_customer_type = get_option('rcs_customer_type');

		if($rcs_customer_type=="free")
			{
				echo '<script>
					jQuery(document).ready(function()
						{
							jQuery(".rcs_taxonomy_category, .rcs_post_ids, #rcs_items_title_color, .rcs_themes_saiga, .rcs_themes_sako, .rcs_themes_anti_ruger, #rcs_content_source_taxonomy, #rcs_content_source_post_id").attr("title","Only For Premium Version")
							jQuery(".rcs_taxonomy_category, .rcs_post_ids, #rcs_items_title_color, .rcs_themes_saiga, .rcs_themes_sako, .rcs_themes_anti_ruger, #rcs_content_source_taxonomy, #rcs_content_source_post_id").attr("disabled","disabled")
						
						})
	 				</script>';
      
			}
		elseif($rcs_customer_type=="pro")
			{
				//premium customer support.
			}

?>




















<table class="form-table">





<tr valign="top">
		<td >
        
        <strong>Shortcode</strong><br />
  <span style=" color:#22aa5d;font-size: 12px;">Copy this shortcode and paste on page or post where you want to display slider. <br />Use PHP code to your themes file to display slider.</span>
        
        <br /> <br /> 
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[rcs <?php echo ' id="'.$post->ID.'"';?> ]</textarea>
        <br /><br />
        PHP Code:<br />
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[rcs id='; echo "'".$post->ID."' ]"; echo '"); ?>'; ?></textarea>  
        
 <br />

		</td>
	</tr>






    <tr valign="top">

        <td style="vertical-align:middle;">
        
        <ul class="tab-nav">
            <li nav="1" class="nav1 active">Slider Options</li>
            <li nav="2" class="nav2">Slider Style</li>
            <li nav="3" class="nav3">Slider Content</li>
        
        </ul>


        <ul class="box">
            <li style="display: block;" class="box1 tab-box active">
            
            
            <table>
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Slider Total Items</strong><br /><br /> 
                        
                        <input type="text" size="5"  name="rcs_total_items" value="<?php if(!empty($rcs_total_items))echo $rcs_total_items; else echo 15; ?>" />
                
                    </td>
                </tr>
                
                
               
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Slider Column Number</strong><br /><br /> 
                        
                        <input type="text" size="5"  name="rcs_column_number" value="<?php if(!empty($rcs_column_number))echo $rcs_column_number; else echo 5; ?>" />
                
                    </td>
                </tr>
                
                
                
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Slider Auto Play</strong><br /><br /> 
                        
                        <input type="checkbox" id="rcs_auto_play" name="rcs_auto_play" value="true" <?php if(($rcs_auto_play=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($rcs_auto_play=="true")) { ?>
                        <label for="rcs_auto_play" >Active</label>
                        <?php } 
                            
                            else
                                {
                                ?>
                                <label for="rcs_auto_play" >Inactive</label>
                                <?php
                                }
                        ?>
                
                    </td>
                </tr>
                
                
                
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Slider Stop on Hover</strong><br /><br /> 
                        
                        <input type="checkbox" id="rcs_stop_on_hover" name="rcs_stop_on_hover" value="true" <?php if(($rcs_stop_on_hover=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($rcs_stop_on_hover=="true")) { ?>
                        <label for="rcs_stop_on_hover" >Active</label>
                        <?php } 
                            
                            else
                                {
                                ?>
                                <label for="rcs_stop_on_hover" >Inactive</label>
                                <?php
                                }
                        ?>
                
                    </td>
                </tr>
                
                
                
                
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Slider Navigation at Top</strong><br /><br /> 
                        
                        <input type="checkbox" id="rcs_slider_navigation" name="rcs_slider_navigation" value="true" <?php if(($rcs_slider_navigation=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($rcs_slider_navigation=="true")) { ?>
                        <label for="rcs_slider_navigation" >Active</label>
                        <?php } 
                            
                            else
                                {
                                ?>
                                <label for="rcs_slider_navigation" >Inactive</label>
                                <?php
                                }
                        ?>
                
                    </td>
                </tr>
                
                
                
                
                
                
                
                
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Slider Pagination at Bottom</strong><br /><br /> 
                        
                        <input type="checkbox" id="rcs_slider_pagination" name="rcs_slider_pagination" value="true" <?php if(($rcs_slider_pagination=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($rcs_slider_pagination=="true")) { ?>
                        <label for="rcs_slider_pagination" >Active</label>
                        <?php } 
                            
                            else
                                {
                                ?>
                                <label for="rcs_slider_pagination" >Inactive</label>
                                <?php
                                }
                        ?>
                
                    </td>
                </tr>
                
                
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Pagination Number Counting</strong><br /><br /> 
                        
                        <input type="checkbox" id="rcs_slider_pagination_count" name="rcs_slider_pagination_count" value="true" <?php if(($rcs_slider_pagination_count=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($rcs_slider_pagination_count=="true")) { ?>
                        <label for="rcs_slider_pagination_count" >Active</label>
                        <?php } 
                            
                        else
                            {
                            ?>
                            <label for="rcs_slider_pagination_count" >Inactive</label>
                            <?php
                            }
                        ?>
                
                    </td>
                </tr>
                
                
                
                
                
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Slide Speed</strong><br /><br /> 
                        
                        <input type="text" id="rcs_slide_speed" name="rcs_slide_speed" value="<?php if(!empty($rcs_slide_speed)) echo $rcs_slide_speed; else echo "1000"; ?>"  />
                
                    </td>
                </tr>
                
                
                
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Pagination Slide Speed</strong><br /><br /> 
                        
                        <input type="text" id="rcs_pagination_slide_speed" name="rcs_pagination_slide_speed" value="<?php if(!empty($rcs_pagination_slide_speed)) echo $rcs_pagination_slide_speed; else echo "1000"; ?>"  />
                
                    </td>
                </tr>
                
                
                
                
                
                
                
                
                
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Slider Touch Drag Enabled</strong><br /><br /> 
                        
                        <input type="checkbox" id="rcs_slider_touch_drag" name="rcs_slider_touch_drag" value="true" <?php if(($rcs_slider_touch_drag=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($rcs_slider_touch_drag=="true")) { ?>
                        <label for="rcs_slider_touch_drag" >Active</label>
                        <?php } 
                            
                        else
                            {
                            ?>
                            <label for="rcs_slider_touch_drag" >Inactive</label>
                            <?php
                            }
                        ?>
                
                    </td>
                </tr>
                
                
                
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Slider Mouse Drag Enabled</strong><br /><br /> 
                        
                        <input type="checkbox" id="rcs_slider_mouse_drag" name="rcs_slider_mouse_drag" value="true" <?php if(($rcs_slider_mouse_drag=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($rcs_slider_mouse_drag=="true")) { ?>
                        <label for="rcs_slider_mouse_drag" >Active</label>
                        <?php } 
                            
                        else
                            {
                            ?>
                            <label for="rcs_slider_mouse_drag" >Inactive</label>
                            <?php
                            }
                        ?>
                
                    </td>
                </tr>


                
                
                
                
                
                
                
            </table>
            
            
            
            
            
            </li>
            <li class="box2 tab-box">
            
            <table>
            
            
				
            
            
            
            
            
            
            
                <tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Themes</strong><br /><br /> 
                    <select name="rcs_themes"  >
                    <option class="rcs_themes_flat" value="flat" <?php if($rcs_themes=="flat")echo "selected"; ?>>Flat</option>
                    <option class="rcs_themes_rossi" value="rossi" <?php if($rcs_themes=="rossi")echo "selected"; ?>>Rossi</option>
                    <option class="rcs_themes_ruger" value="ruger" <?php if($rcs_themes=="ruger")echo "selected"; ?>>Ruger</option>
                    <option class="rcs_themes_anti_ruger" value="anti-ruger" <?php if($rcs_themes=="anti-ruger")echo "selected"; ?>>Anti Ruger</option>
                    <option class="rcs_themes_saiga" value="saiga" <?php if($rcs_themes=="saiga")echo "selected"; ?>>Saiga</option>                  
                    <option class="rcs_themes_sako" value="sako" <?php if($rcs_themes=="sako")echo "selected"; ?>>Sako</option>
                  
                    </select>
                    </td>
				</tr>
                
                
                
                <tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Slider Ribbon</strong><br /><br /> 
					<?php
                    
					echo '<select name="rcs_ribbon_name" >';
	
						if(empty($rcs_ribbon_name))
							{
								$rcs_ribbon_name = "";
							}
						echo  '<option value="none" '.(($rcs_ribbon_name=="none" ) ? "selected" : "").' >None</option>';
						echo  '<option value="free" '.(($rcs_ribbon_name=="free" ) ? "selected" : "").' >Free</option>';
						echo  '<option value="save" '.(($rcs_ribbon_name=="save" ) ? "selected" : "").' >Save</option>';								
						echo  '<option value="hot" '.(($rcs_ribbon_name=="hot" ) ? "selected" : "").' >Hot</option>';
						echo  '<option value="pro" '.(($rcs_ribbon_name=="pro" ) ? "selected" : "").' >Pro</option>';								
						echo  '<option value="best" '.(($rcs_ribbon_name=="best" ) ? "selected" : "").' >Best</option>';
						echo  '<option value="gift" '.(($rcs_ribbon_name=="gift" ) ? "selected" : "").' >Gift</option>';
						echo  '<option value="sale" '.(($rcs_ribbon_name=="sale" ) ? "selected" : "").' >Sale</option>';																
						echo  '<option value="new" '.(($rcs_ribbon_name=="new" ) ? "selected" : "").' >New</option>';	
						echo  '<option value="top" '.(($rcs_ribbon_name=="top" ) ? "selected" : "").' >Top</option>';
						echo  '<option value="fresh" '.(($rcs_ribbon_name=="fresh" ) ? "selected" : "").' >Fresh</option>';								
						
						echo  '<option value="dis-10" '.(($rcs_ribbon_name=="dis-10" ) ? "selected" : "").' >-10%</option>';								
						echo  '<option value="dis-20" '.(($rcs_ribbon_name=="dis-20" ) ? "selected" : "").' >-20%</option>';
						echo  '<option value="dis-30" '.(($rcs_ribbon_name=="dis-30" ) ? "selected" : "").' >-30%</option>';
						echo  '<option value="dis-40" '.(($rcs_ribbon_name=="dis-40" ) ? "selected" : "").' >-40%</option>';
						
						echo  '<option value="dis-50" '.(($rcs_ribbon_name=="dis-50" ) ? "selected" : "").' >-50%</option>';								
						
						echo  '<option value="dis-60" '.(($rcs_ribbon_name=="dis-60" ) ? "selected" : "").' >-60%</option>';								
						
						echo  '<option value="dis-70" '.(($rcs_ribbon_name=="dis-70" ) ? "selected" : "").' >-70%</option>';									
						
						echo  '<option value="dis-80" '.(($rcs_ribbon_name=="dis-80" ) ? "selected" : "").' >-80%</option>';								
						
						echo  '<option value="dis-90" '.(($rcs_ribbon_name=="dis-90" ) ? "selected" : "").' >-90%</option>';								
						
						echo  '<option value="dis-100" '.(($rcs_ribbon_name=="dis-100" ) ? "selected" : "").' >-100%</option>';									
						
							
					echo  '</select><br />';
			
			
					
					?>
                    </td>
				</tr>
                
                
                
                
                <tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Slider Thumbnail Size</strong><br /><br /> 
                    <select name="rcs_items_thumb_size" >
                    <option value="thumbnail" <?php if($rcs_items_thumb_size=="thumbnail")echo "selected"; ?>>Thumbnail</option>
                    <option value="medium" <?php if($rcs_items_thumb_size=="medium")echo "selected"; ?>>medium</option>
                    <option value="large" <?php if($rcs_items_thumb_size=="large")echo "selected"; ?>>large</option>                               
                    <option value="full" <?php if($rcs_items_thumb_size=="full")echo "selected"; ?>>full</option>   

                    </select>
                    </td>
				</tr> 
                


				<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Slider thumb max hieght(px)</strong><br /><br />
                    <input type="text" name="rcs_items_thumb_max_hieght" placeholder="14px" id="rcs_items_thumb_max_hieght" value="<?php if(!empty($rcs_items_thumb_max_hieght)) echo $rcs_items_thumb_max_hieght; else echo "200px"; ?>" />
                    </td>
				</tr>

                
                
                
                
                                           
            <script>
            jQuery(document).ready(function(jQuery)
                {
                        jQuery(".rcs_bg_img_list li").click(function()
                            { 	
                                jQuery('.rcs_bg_img_list li.bg-selected').removeClass('bg-selected');
                                jQuery(this).addClass('bg-selected');
                                
                                var rcs_bg_img = jQuery(this).attr('data-url');
            
                                jQuery('#rcs_bg_img').val(rcs_bg_img);
                                
                            })	
            
                                
                })
            
            </script> 
                            
                            
                            
                            
                            
                            
            <tr valign="top">
            
                    <td style="vertical-align:middle;">
                    
                    <strong>Background Image</strong><br /><br /> 
                    
            
            <?php
            
            
            
                $dir_path = rcs_plugin_dir."css/bg/";
                $filenames=glob($dir_path."*.png*");
            
            
                $rcs_bg_img = get_post_meta( $post->ID, 'rcs_bg_img', true );
                
                if(empty($rcs_bg_img))
                    {
                    $rcs_bg_img = "";
                    }
            
            
                $count=count($filenames);
                
            
                $i=0;
                echo "<ul class='rcs_bg_img_list' >";
            
                while($i<$count)
                    {
                        $filelink= str_replace($dir_path,"",$filenames[$i]);
                        
                        $filelink= rcs_plugin_url."css/bg/".$filelink;
                        
                        
                        if($rcs_bg_img==$filelink)
                            {
                                echo '<li  class="bg-selected" data-url="'.$filelink.'">';
                            }
                        else
                            {
                                echo '<li   data-url="'.$filelink.'">';
                            }
                        
                        
                        echo "<img  width='70px' height='50px' src='".$filelink."' />";
                        echo "</li>";
                        $i++;
                    }
                    
                echo "</ul>";
                
                echo "<input style='width:100%;' value='".$rcs_bg_img."'    placeholder='Please select image or left blank' id='rcs_bg_img' name='rcs_bg_img'  type='text' />";
            
            
            
            ?>
                    </td>
                </tr>
                            
                            

                
				<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Items Title Color</strong><br /><br />
                    <input type="text" name="rcs_items_title_color" id="rcs_items_title_color" value="<?php if(!empty($rcs_items_title_color)) echo $rcs_items_title_color; else echo "#0fcd95"; ?>" />
                    </td>
				</tr>                
                
                
				<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Items Title Font Size</strong><br /><br />
                    <input type="text" name="rcs_items_title_font_size" placeholder="14px" id="rcs_items_title_font_size" value="<?php if(!empty($rcs_items_title_font_size)) echo $rcs_items_title_font_size; else echo "14px"; ?>" />
                    </td>
				</tr>                   
                





				                
                
                
				




				<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Pagination Background Color</strong><br /><br />
                    <input type="text" name="rcs_slider_pagination_bg" id="rcs_slider_pagination_bg" value="<?php if(!empty($rcs_slider_pagination_bg)) echo $rcs_slider_pagination_bg; else echo "#1eb286"; ?>" />
                    </td>
				</tr>


				<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Pagination Text Color</strong><br /><br />
                    <input type="text" name="rcs_slider_pagination_text_color" id="rcs_slider_pagination_text_color" value="<?php if(!empty($rcs_slider_pagination_text_color)) echo $rcs_slider_pagination_text_color; else echo "#fff"; ?>" />
                    </td>
				</tr>



            
                
                
			</table>


            </li>
            
            
            <li class="box3 tab-box">
            

            <table>
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Slider Content Posttype</strong><br /><br /> 
     
<?php

$post_types = get_post_types( '', 'names' ); 

foreach ( $post_types as $post_type ) {

	if($post_type=='post')
		{
		   echo '<label for="rcs_posttype['.$post_type.']"><input class="rcs_posttype" type="checkbox" name="rcs_posttype['.$post_type.']" id="rcs_posttype['.$post_type.']"  value ="'.$post_type.'" ' ?> 
		   <?php if ( isset( $rcs_posttype[$post_type] ) ) echo "checked"; ?>
		   <?php echo' >'. $post_type.'</label><br />' ;
	   
		}

	else
		{
		   echo '<label for="timeline_pro-posttype['.$post_type.']"><input type="checkbox" name="rcs_posttype['.$post_type.']" class="rcs_posttype" id="timeline_pro-posttype['.$post_type.']"  value ="'.$post_type.'" ' ?> 
		   <?php if ( isset( $rcs_posttype[$post_type] ) ) echo "checked"; ?>
		   <?php echo' >'. $post_type.'</label><br />' ;
   
		}

}
?>
   
                
                    </td>
                </tr>

                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Filter Content</strong><br /><br /> 
<ul class="content_source_area" >
            
            <li><input class="rcs_content_source" name="rcs_content_source" id="rcs_content_source_latest" type="radio" value="latest" <?php if($rcs_content_source=="latest")  echo "checked";?> /> <label for="rcs_content_source_latest">Display from Latest Published</label>
            <div class="rcs_content_source_latest content-source-box">Slider items will query from latest published product.</div>
            </li>
            
            <li><input class="rcs_content_source" name="rcs_content_source" id="rcs_content_source_older" type="radio" value="older" <?php if($rcs_content_source=="older")  echo "checked";?> /> <label for="rcs_content_source_older">Display from Older Published</label>
            <div class="rcs_content_source_older content-source-box">Slider items will query from older published product.</div>
            </li>            
            
            <li><input class="rcs_content_source" name="rcs_content_source" id="rcs_content_source_featured" type="radio" value="featured" <?php if($rcs_content_source=="featured")  echo "checked";?> /> <label for="rcs_content_source_featured">Display from Featured Items</label>
            
            <div class="rcs_content_source_featured content-source-box">Slider items will query from featured marked product.</div>
            </li>
            
            <li><input class="rcs_content_source" name="rcs_content_source" id="rcs_content_source_year" type="radio" value="year" <?php if($rcs_content_source=="year")  echo "checked";?> /> <label for="rcs_content_source_year">Display from Only Year</label>
            
            <div class="rcs_content_source_year content-source-box">Slider items will query from a year.
            <input type="text" size="7" class="rcs_content_year" name="rcs_content_year" value="<?php if(!empty($rcs_content_year))  echo $rcs_content_year;?>" placeholder="2014" />
            </div>
            </li>
            
            
            <li><input class="rcs_content_source" name="rcs_content_source" id="rcs_content_source_month" type="radio" value="month" <?php if($rcs_content_source=="month")  echo "checked";?> /> <label for="rcs_content_source_month">Display from Month</label>
            
            <div class="rcs_content_source_month content-source-box">Slider items will query from Month of a year.		<br />
			<input type="text" size="7" class="rcs_content_month_year" name="rcs_content_month_year" value="<?php if(!empty($rcs_content_month_year))  echo $rcs_content_month_year;?>" placeholder="2014" />            
			<input type="text" size="7" class="rcs_content_month" name="rcs_content_month" value="<?php if(!empty($rcs_content_month))  echo $rcs_content_month;?>" placeholder="06" />
            </div>
            </li>            
            
            
            
            
            
            <li><input class="rcs_content_source" name="rcs_content_source" id="rcs_content_source_taxonomy" type="radio" value="taxonomy" <?php if($rcs_content_source=="taxonomy")  echo "checked";?> /> <label for="rcs_content_source_taxonomy">Display from Product Taxonomy & Categories</label>
            
            <div class="rcs_content_source_taxonomy content-source-box" >
            
            
<table style="width:100%;" >

        	<tr style="overflow:scroll; vertical-align:top;">
            	<td style="overflow:scroll; vertical-align:top; padding:0; width:45%;">
                 
                
                 
<?php 
$rcs_taxonomies = get_object_taxonomies( $rcs_posttype ); 
if(!empty($rcs_taxonomies))
	{
		foreach ($rcs_taxonomies as $taxonomy ) {
			?>
		
			
		  <label ><input type="radio" class="rcs_taxonomy" name="rcs_taxonomy" value="<?php echo $taxonomy; ?>" <?php if($rcs_taxonomy==$taxonomy)  echo "checked";?> /><?php echo $taxonomy; ?></label><br />
		  
		  <?php
		}
	}
else
	{
		echo 'No Taxomony found for ';
		echo '<strong>'.implode(', ', $rcs_posttype).'</strong>';
	}

?>
                
                </td>
                <td style=" height:auto;vertical-align:top; padding:0; width:45%;">
                <span class="rcs_loading_taxonomy_category" ></span>
                <div class="rcs_taxonomy_category">
                
				<?php
                if(!empty($rcs_taxonomy))
					{
					rcs_get_taxonomy_category($post->ID);
					}
				else
					{
					
					}
				
				?>
                
                
				</div>
                
                </td>
            </tr>
 
            
</table>
            
            
            
            
            
            
            </div>
            </li>           
            <li><input class="rcs_content_source" name="rcs_content_source" id="rcs_content_source_post_id" type="radio" value="post_id" <?php if($rcs_content_source=="post_id")  echo "checked";?> /> <label for="rcs_content_source_post_id">Display by Product id</label>
            
            <div  class="rcs_content_source_post_id content-source-box" >
            
<table style="width:100%;" >


			<tr style="overflow:scroll; vertical-align:top;">
            	<td colspan="2" style="overflow:scroll; vertical-align:top; padding:0; width:45%;">
                
                <div class="" style="max-height:300px; overflow-y:scroll; overflow-x:hidden;max-width:100%;" >
				<?php

                        rcs_get_all_post_ids($post->ID);

                ?>
                
                </div>
                
                
                
                </td>
            </tr>


            
            
</table>
            
            
            </div>
            </li>             
            </ul>
                
                    </td>
                </tr>
               </table>
            


            </li>
            
            
            
            
            
            
            
        </ul>
        
        
        
        </td>
    </tr> 

</table>
















<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_rcs_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_rcs_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_rcs_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_rcs_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
	$rcs_bg_img = sanitize_text_field( $_POST['rcs_bg_img'] );	
	$rcs_themes = sanitize_text_field( $_POST['rcs_themes'] );
	$rcs_total_items = sanitize_text_field( $_POST['rcs_total_items'] );		
	$rcs_column_number = sanitize_text_field( $_POST['rcs_column_number'] );
	$rcs_auto_play = sanitize_text_field( $_POST['rcs_auto_play'] );
	$rcs_stop_on_hover = sanitize_text_field( $_POST['rcs_stop_on_hover'] );	
	$rcs_slider_navigation = sanitize_text_field( $_POST['rcs_slider_navigation'] );
	$rcs_slide_speed = sanitize_text_field( $_POST['rcs_slide_speed'] );
	
	$rcs_slider_pagination = sanitize_text_field( $_POST['rcs_slider_pagination'] );	
	$rcs_pagination_slide_speed = sanitize_text_field( $_POST['rcs_pagination_slide_speed'] );
	$rcs_slider_pagination_count = sanitize_text_field( $_POST['rcs_slider_pagination_count'] );
	
	$rcs_slider_pagination_bg = sanitize_text_field( $_POST['rcs_slider_pagination_bg'] );
	$rcs_slider_pagination_text_color = sanitize_text_field( $_POST['rcs_slider_pagination_text_color'] );	
	
	$rcs_slider_touch_drag = sanitize_text_field( $_POST['rcs_slider_touch_drag'] );
	$rcs_slider_mouse_drag = sanitize_text_field( $_POST['rcs_slider_mouse_drag'] );	
	
	$rcs_content_source = sanitize_text_field( $_POST['rcs_content_source'] );
	$rcs_content_year = sanitize_text_field( $_POST['rcs_content_year'] );
	$rcs_content_month = sanitize_text_field( $_POST['rcs_content_month'] );
	$rcs_content_month_year = sanitize_text_field( $_POST['rcs_content_month_year'] );	

	$rcs_posttype = stripslashes_deep( $_POST['rcs_posttype'] );
	$rcs_taxonomy = sanitize_text_field( $_POST['rcs_taxonomy'] );
	$rcs_taxonomy_category = stripslashes_deep( $_POST['rcs_taxonomy_category'] );
	
	$rcs_post_ids = stripslashes_deep( $_POST['rcs_post_ids'] );	
	
	$rcs_items_title_color = sanitize_text_field( $_POST['rcs_items_title_color'] );	
	$rcs_items_title_font_size = sanitize_text_field( $_POST['rcs_items_title_font_size'] );	

	$rcs_items_thumb_size = sanitize_text_field( $_POST['rcs_items_thumb_size'] );
	$rcs_items_thumb_max_hieght = sanitize_text_field( $_POST['rcs_items_thumb_max_hieght'] );	
	
	$rcs_ribbon_name = sanitize_text_field( $_POST['rcs_ribbon_name'] );			
	
			


  // Update the meta field in the database.
	update_post_meta( $post_id, 'rcs_bg_img', $rcs_bg_img );	
	update_post_meta( $post_id, 'rcs_themes', $rcs_themes );
	update_post_meta( $post_id, 'rcs_total_items', $rcs_total_items );	
	update_post_meta( $post_id, 'rcs_column_number', $rcs_column_number );	
	update_post_meta( $post_id, 'rcs_auto_play', $rcs_auto_play );
	update_post_meta( $post_id, 'rcs_stop_on_hover', $rcs_stop_on_hover );	
	update_post_meta( $post_id, 'rcs_slider_navigation', $rcs_slider_navigation );
	update_post_meta( $post_id, 'rcs_slide_speed', $rcs_slide_speed );

	update_post_meta( $post_id, 'rcs_slider_pagination', $rcs_slider_pagination );
	update_post_meta( $post_id, 'rcs_pagination_slide_speed', $rcs_pagination_slide_speed );
	update_post_meta( $post_id, 'rcs_slider_pagination_count', $rcs_slider_pagination_count );
	
	update_post_meta( $post_id, 'rcs_slider_pagination_bg', $rcs_slider_pagination_bg );
	update_post_meta( $post_id, 'rcs_slider_pagination_text_color', $rcs_slider_pagination_text_color );		
	
	update_post_meta( $post_id, 'rcs_slider_touch_drag', $rcs_slider_touch_drag );
	update_post_meta( $post_id, 'rcs_slider_mouse_drag', $rcs_slider_mouse_drag );
	
	update_post_meta( $post_id, 'rcs_content_source', $rcs_content_source );
	update_post_meta( $post_id, 'rcs_content_year', $rcs_content_year );
	update_post_meta( $post_id, 'rcs_content_month', $rcs_content_month );
	update_post_meta( $post_id, 'rcs_content_month_year', $rcs_content_month_year );	

	update_post_meta( $post_id, 'rcs_posttype', $rcs_posttype );
	update_post_meta( $post_id, 'rcs_taxonomy', $rcs_taxonomy );
	update_post_meta( $post_id, 'rcs_taxonomy_category', $rcs_taxonomy_category );

	update_post_meta( $post_id, 'rcs_post_ids', $rcs_post_ids );	

	update_post_meta( $post_id, 'rcs_items_title_color', $rcs_items_title_color );
	update_post_meta( $post_id, 'rcs_items_title_font_size', $rcs_items_title_font_size );
		
	update_post_meta( $post_id, 'rcs_items_thumb_size', $rcs_items_thumb_size );	
	update_post_meta( $post_id, 'rcs_items_thumb_max_hieght', $rcs_items_thumb_max_hieght );
	
	update_post_meta( $post_id, 'rcs_ribbon_name', $rcs_ribbon_name );	
	

}
add_action( 'save_post', 'meta_boxes_rcs_save' );


























?>