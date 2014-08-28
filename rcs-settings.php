<?php	

	if(empty($_POST['rcs_hidden']))
		{
			$rcs_ribbons = get_option( 'rcs_ribbons' );
			
			
		}
	else
		{
					
				
		if($_POST['rcs_hidden'] == 'Y') {
			//Form data sent

			$rcs_ribbons = stripslashes_deep($_POST['rcs_ribbons']);
			update_option('rcs_ribbons', $rcs_ribbons);
			
		
			
					

			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p></div>

			<?php
		} 
	}
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__('rcs Settings')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="rcs_hidden" value="Y">
        <?php settings_fields( 'rcs_plugin_options' );
				do_settings_sections( 'rcs_plugin_options' );
			
		?>
        
        
    
        
<table class="form-table">





	<tr valign="top">
        <td style="vertical-align:middle;">
        <strong>Ribbons</strong><br /><br /> 
    	<span style=" color:#22aa5d;font-size: 12px;">You can use your own ribbons icon by inserting ribbon url to text field, image size for ribbons must be same as 90px × 24px</span>
        <table>
        
        	<tr>
            <td>Best</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($rcs_ribbons["best"])) echo rcs_plugin_url."css/ribbons/best.png";  else echo $rcs_ribbons["best"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[best]" type="text" value="<?php if(empty($rcs_ribbons["best"])) echo rcs_plugin_url."css/ribbons/best.png";  else echo $rcs_ribbons["best"]; ?>"  /></td>
            </tr>



        	<tr>
            <td>Discount 10%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($rcs_ribbons["dis-10"])) echo rcs_plugin_url."css/ribbons/dis-10.png";  else echo $rcs_ribbons["dis-10"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%"  name="rcs_ribbons[dis-10]" type="text" value="<?php if(empty($rcs_ribbons["dis-10"])) echo rcs_plugin_url."css/ribbons/dis-10.png";  else echo $rcs_ribbons["dis-10"]; ?>"  /></td>
            </tr>




        	<tr>
            <td>Discount 20%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($rcs_ribbons["dis-20"])) echo rcs_plugin_url."css/ribbons/dis-20.png";  else echo $rcs_ribbons["dis-20"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[dis-20]" type="text" value="<?php if(empty($rcs_ribbons["dis-20"])) echo rcs_plugin_url."css/ribbons/dis-20.png";  else echo $rcs_ribbons["dis-20"]; ?>"  /></td>
            </tr>


        	<tr>
            <td>Discount 30%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($rcs_ribbons["dis-30"])) echo rcs_plugin_url."css/ribbons/dis-30.png";  else echo $rcs_ribbons["dis-30"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[dis-30]" type="text" value="<?php if(empty($rcs_ribbons["dis-30"])) echo rcs_plugin_url."css/ribbons/dis-30.png";  else echo $rcs_ribbons["dis-30"]; ?>"  /></td>
            </tr>


        	<tr>
            <td>Discount 40%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($rcs_ribbons["dis-40"])) echo rcs_plugin_url."css/ribbons/dis-40.png";  else echo $rcs_ribbons["dis-40"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[dis-40]" type="text" value="<?php if(empty($rcs_ribbons["dis-40"])) echo rcs_plugin_url."css/ribbons/dis-40.png";  else echo $rcs_ribbons["dis-40"]; ?>"  /></td>
            </tr>


        	<tr>
            <td>Discount 50%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($rcs_ribbons["dis-50"])) echo rcs_plugin_url."css/ribbons/dis-50.png";  else echo $rcs_ribbons["dis-50"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[dis-50]" type="text" value="<?php if(empty($rcs_ribbons["dis-50"])) echo rcs_plugin_url."css/ribbons/dis-50.png";  else echo $rcs_ribbons["dis-50"]; ?>"  /></td>
            </tr>



        	<tr>
            <td>Discount 60%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($rcs_ribbons["dis-60"])) echo rcs_plugin_url."css/ribbons/dis-60.png";  else echo $rcs_ribbons["dis-60"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[dis-60]" type="text" value="<?php if(empty($rcs_ribbons["dis-60"])) echo rcs_plugin_url."css/ribbons/dis-60.png";  else echo $rcs_ribbons["dis-60"]; ?>"  /></td>
            </tr>
            



        	<tr>
            <td>Discount 70%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($rcs_ribbons["dis-70"])) echo rcs_plugin_url."css/ribbons/dis-70.png";  else echo $rcs_ribbons["dis-70"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[dis-70]" type="text" value="<?php if(empty($rcs_ribbons["dis-70"])) echo rcs_plugin_url."css/ribbons/dis-70.png";  else echo $rcs_ribbons["dis-70"]; ?>"  /></td>
            </tr>




        	<tr>
            <td>Discount 80%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($rcs_ribbons["dis-80"])) echo rcs_plugin_url."css/ribbons/dis-80.png";  else echo $rcs_ribbons["dis-80"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[dis-80]" type="text" value="<?php if(empty($rcs_ribbons["dis-80"])) echo rcs_plugin_url."css/ribbons/dis-80.png";  else echo $rcs_ribbons["dis-80"]; ?>"  /></td>
            </tr>



        	<tr>
            <td>Discount 90%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($rcs_ribbons["dis-90"])) echo rcs_plugin_url."css/ribbons/dis-90.png";  else echo $rcs_ribbons["dis-90"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[dis-90]" type="text" value="<?php if(empty($rcs_ribbons["dis-90"])) echo rcs_plugin_url."css/ribbons/dis-90.png";  else echo $rcs_ribbons["dis-90"]; ?>"  /></td>
            </tr>
            
            
            
        	<tr>
            <td>Discount 100%</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($rcs_ribbons["dis-100"])) echo rcs_plugin_url."css/ribbons/dis-100.png";  else echo $rcs_ribbons["dis-100"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[dis-100]" type="text" value="<?php if(empty($rcs_ribbons["dis-100"])) echo rcs_plugin_url."css/ribbons/dis-100.png";  else echo $rcs_ribbons["dis-100"]; ?>"  /></td>
            </tr>    
            
            





        	<tr>
            <td>Free</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($rcs_ribbons["free"])) echo rcs_plugin_url."css/ribbons/free.png";  else echo $rcs_ribbons["free"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[free]" type="text" value="<?php if(empty($rcs_ribbons["free"])) echo rcs_plugin_url."css/ribbons/free.png";  else echo $rcs_ribbons["free"]; ?>"  /></td>
            </tr>



        	<tr>
            <td>Fresh</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($rcs_ribbons["fresh"])) echo rcs_plugin_url."css/ribbons/fresh.png";  else echo $rcs_ribbons["fresh"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[fresh]" type="text" value="<?php if(empty($rcs_ribbons["fresh"])) echo rcs_plugin_url."css/ribbons/fresh.png";  else echo $rcs_ribbons["fresh"]; ?>"  /></td>
            </tr>


        	<tr>
            <td>Gift</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($rcs_ribbons["gift"])) echo rcs_plugin_url."css/ribbons/gift.png";  else echo $rcs_ribbons["gift"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[gift]" type="text" value="<?php if(empty($rcs_ribbons["gift"])) echo rcs_plugin_url."css/ribbons/gift.png";  else echo $rcs_ribbons["gift"]; ?>"  /></td>
            </tr>



        	<tr>
            <td>Hot</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($rcs_ribbons["hot"])) echo rcs_plugin_url."css/ribbons/hot.png";  else echo $rcs_ribbons["hot"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[hot]" type="text" value="<?php if(empty($rcs_ribbons["hot"])) echo rcs_plugin_url."css/ribbons/hot.png";  else echo $rcs_ribbons["hot"]; ?>"  /></td>
            </tr>



        	<tr>
            <td>new</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($rcs_ribbons["new"])) echo rcs_plugin_url."css/ribbons/new.png";  else echo $rcs_ribbons["new"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[new]" type="text" value="<?php if(empty($rcs_ribbons["new"])) echo rcs_plugin_url."css/ribbons/new.png";  else echo $rcs_ribbons["new"]; ?>"  /></td>
            </tr>




        	<tr>
            <td>Pro</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($rcs_ribbons["pro"])) echo rcs_plugin_url."css/ribbons/pro.png";  else echo $rcs_ribbons["pro"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[pro]" type="text" value="<?php if(empty($rcs_ribbons["pro"])) echo rcs_plugin_url."css/ribbons/pro.png";  else echo $rcs_ribbons["pro"]; ?>"  /></td>
            </tr>

         






        	<tr>
            <td>sale</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($rcs_ribbons["sale"])) echo rcs_plugin_url."css/ribbons/sale.png";  else echo $rcs_ribbons["sale"]; ?>"  /></td>
            <td><input class="rcs_ribbons"  size="50%" name="rcs_ribbons[sale]" type="text" value="<?php if(empty($rcs_ribbons["sale"])) echo rcs_plugin_url."css/ribbons/sale.png";  else echo $rcs_ribbons["sale"]; ?>"  /></td>
            </tr>



        	<tr>
            <td>save</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($rcs_ribbons["save"])) echo rcs_plugin_url."css/ribbons/save.png";  else echo $rcs_ribbons["save"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[save]" type="text" value="<?php if(empty($rcs_ribbons["save"])) echo rcs_plugin_url."css/ribbons/save.png";  else echo $rcs_ribbons["save"]; ?>"  /></td>
            </tr>

 
        	<tr>
            <td>Top</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($rcs_ribbons["top"])) echo rcs_plugin_url."css/ribbons/top.png";  else echo $rcs_ribbons["top"]; ?>"  /></td>
            <td><input class="rcs_ribbons" size="50%" name="rcs_ribbons[top]" type="text" value="<?php if(empty($rcs_ribbons["top"])) echo rcs_plugin_url."css/ribbons/top.png";  else echo $rcs_ribbons["top"]; ?>"  /></td>
            </tr>




















            
        </table>
    
    
    
    
        </td>
    </tr>
</table>






<p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
                </p>
		</form>


</div>
