<style>
.myicon:before {
	content: '\f228';
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 32px/1 'dashicons';
	vertical-align: top;
	margin-right: 10px;
}
</style>

<h3><?php _e( 'SlickNav Mobile Menu Options', 'slicknav-mobile-menu' ); ?></h3>

<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h2 class="myicon"><?php _e( 'Mobile Menu', 'slicknav-mobile-menu' ); ?></h2>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span><?php _e( 'Enter your menu CSS selector for the Mobile Menu name value, for example; #menu-primary-menu', 'slicknav-mobile-menu' ); ?></span></h3>

						<div class="inside">
						<?php if( !isset( $ng_slicknav_menu ) || $ng_slicknav_menu == ''): ?>

						<form name="ng_slicknav_menu_form" method="post" action="">

								<input type="hidden" name="ng_slicknav_form_submitted" value="Y">

							<table class="form-table">
									<tr>
										<td><label for="ng_slicknav_menu"><?php _e( 'SlickNav Mobile Menu Name', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_menu" id="ng_slicknav_menu" type="text" value="" class="regular-text" placeholder="CSS Selector Menu Name" /></td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_width"><?php _e( 'Maximum width to use SlickNav (600px Default)', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_width" id="ng_slicknav_width" type="number" value="600" class="regular-text" placeholder="600" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_background"><?php _e( 'Menu Background Color', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_background" id="ng_slicknav_background" type="text" value="#4c4c4c" class="my-color-field" placeholder="#4c4c4c" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_button"><?php _e( 'Menu Button Color', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_button" id="ng_slicknav_button" type="text" value="#222222" class="my-color-field" placeholder="#222222" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_label_color"><?php _e( 'Menu Label Color', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_label_color" id="ng_slicknav_label_color" type="text" value="#ffffff" class="my-color-field" placeholder="#ffffff" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_icon_color"><?php _e( 'Menu Icon Color', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_icon_color" id="ng_slicknav_icon_color" type="text" value="#ffffff" class="my-color-field" placeholder="#ffffff" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_label_shadow"><?php _e( 'Menu Label Shadow', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<select name="ng_slicknav_label_shadow" id="ng_slicknav_label_shadow">
											<option selected="selected" value="0 1px 3px #000"><?php _e( 'On', 'slicknav-mobile-menu' ); ?></option>
											<option value="none"><?php _e( 'Off', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_icon_shadow"><?php _e( 'Menu Icon Shadow', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<select name="ng_slicknav_icon_shadow" id="ng_slicknav_icon_shadow">
											<option selected="selected" value="0 1px 0 rgba(0,0,0,0.25)"><?php _e( 'On', 'slicknav-mobile-menu' ); ?></option>
											<option value="none"><?php _e( 'Off', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_link_color"><?php _e( 'Menu Link Color', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_link_color" id="ng_slicknav_link_color" type="text" value="#ffffff" class="my-color-field" placeholder="#ffffff" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_link_hover_color"><?php _e( 'Menu Link Hover Color', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_link_hover_color" id="ng_slicknav_link_hover_color" type="text" value="#cccccc" class="my-color-field" placeholder="#ffffff" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_button_position"><?php _e( 'Menu Button Position', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<select name="ng_slicknav_button_position" id="ng_slicknav_button_position">
											<option selected="selected" value="right"><?php _e( 'Right', 'slicknav-mobile-menu' ); ?></option>
											<option value="left"><?php _e( 'Left', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_font"><?php _e( 'Menu Font Size (16px Default)', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_font" id="ng_slicknav_font" type="number" value="16" class="regular-text" placeholder="16" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_label_size"><?php _e( 'Menu Label Size (16px Default)', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_label_size" id="ng_slicknav_label_size" type="number" value="16" class="regular-text" placeholder="16" /></td>										
									</tr>
									<tr>
									<td><label for="ng_slicknav_label_weight"><?php _e( 'Menu Label Weight', 'slicknav-mobile-menu' ); ?></label></td>
									<td>	
										<select name="ng_slicknav_label_weight" id="ng_slicknav_label_weight">
										<option  value="normal"><?php _e( 'Normal', 'slicknav-mobile-menu' ); ?></option>
										<option  selected="selected" value="bold" ><?php _e( 'Bold', 'slicknav-mobile-menu' ); ?></option>
										</select>
									</td>
								</tr>
									<tr>
										<td><label for="ng_slicknav_font_case"><?php _e( 'Menu link font case', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<select name="ng_slicknav_font_case" id="ng_slicknav_font_case">
											<option selected="selected" value="None"><?php _e( 'none', 'slicknav-mobile-menu' ); ?></option>
											<option value="capitalize"><?php _e( 'Capitalize', 'slicknav-mobile-menu' ); ?></option>
											<option value="lowercase"><?php _e( 'Lowercase', 'slicknav-mobile-menu' ); ?></option>
											<option value="uppercase"><?php _e( 'Uppercase', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
									</tr>		
									<tr>
										<td><label for="ng_slicknav_submenu_position"><?php _e( 'SubMenu Button Indicator', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<select name="ng_slicknav_submenu_position" id="ng_slicknav_submenu_position">
											<option selected="selected" value="none"><?php _e( 'Left', 'slicknav-mobile-menu' ); ?></option>
											<option value="right"><?php _e( 'Right', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_position"><?php _e( 'Menu Position (body by default, using body puts the Menu at the top.', 'slicknav-mobile-menu' ); ?><br>
										<?php _e( 'However you can adjust this location by adding in a CSS class', 'slicknav-mobile-menu' ); ?></label></td>										
										<td><input name="ng_slicknav_position" id="ng_slicknav_position" type="text" value="body" class="regular-text"  placeholder="body"/></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_label"><?php _e( 'Menu Label ("MENU" by default, leave blank for no label)', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_label" id="ng_slicknav_label" type="text" value="MENU" class="regular-text" placeholder="MENU" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_parent_links"><?php _e( 'Allow Parent Links', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<select name="ng_slicknav_parent_links" id="ng_slicknav_parent_links">
											<option value="true"><?php _e( 'True', 'slicknav-mobile-menu' ); ?></option>
											<option value="false"><?php _e( 'False', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_speed"><?php _e( 'Speed of Menu open/close (Higher numbers are slower)', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<select name="ng_slicknav_speed" id="ng_slicknav_speed">
											<option value="200"><?php _e( '200', 'slicknav-mobile-menu' ); ?></option>
											<option selected="selected" value="400"><?php _e( '400', 'slicknav-mobile-menu' ); ?></option>
											<option value="600"><?php _e( '600', 'slicknav-mobile-menu' ); ?></option>
											<option value="800"><?php _e( '800', 'slicknav-mobile-menu' ); ?></option>
											<option value="1000"><?php _e( '1000', 'slicknav-mobile-menu' ); ?></option>
											<option value="2000"><?php _e( '2000', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
									</tr>																				
							</table>
							<p><input class="button-primary" type="submit" name="ng_slicknav_menu_submit" value="Save" /></p>
								
						</form>
						<?php endif; ?>
						<?php if( isset( $ng_slicknav_menu ) && $ng_slicknav_menu !== ''): ?>
						<form name="ng_slicknav_menu_form" method="post" action="">

							<input type="hidden" name="ng_slicknav_form_submitted" value="Y">

						<table class="form-table">
								<tr>
									<td><label for="ng_slicknav_menu"><?php _e( 'SlickNav Mobile Menu Name', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_menu" id="ng_slicknav_menu" type="text" value="<?php echo $ng_slicknav_menu; ?>" class="regular-text" placeholder="CSS Selector Menu Name"/></td>
								</tr>
								<tr>
									<td><label for="ng_slicknav_width"><?php _e( 'Maximum Width to use SlickNav (600px Default)', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_width" id="ng_slicknav_width" type="number" value="<?php echo $ng_slicknav_width; ?>" class="regular-text" placeholder="600" /></td>									
								</tr>
								<tr>
									<td><label for="ng_slicknav_background"><?php _e( 'Menu Background Color', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_background" id="ng_slicknav_background" type="text" value="<?php echo $ng_slicknav_background; ?>" class="my-color-field" placeholder="#4c4c4c" /></td>										
								</tr>
								<tr>
									<td><label for="ng_slicknav_button"><?php _e( 'Menu Button Color', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_button" id="ng_slicknav_button" type="text" value="<?php echo $ng_slicknav_button; ?>" class="my-color-field" placeholder="#222222" /></td>										
								</tr>
								<tr>
									<td><label for="ng_slicknav_label_color"><?php _e( 'Menu Label Color', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_label_color" id="ng_slicknav_label_color" type="text" value="<?php echo $ng_slicknav_label_color; ?>" class="my-color-field" placeholder="#ffffff" /></td>										
								</tr>
								<tr>
									<td><label for="ng_slicknav_icon_color"><?php _e( 'Menu Icon Color', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_icon_color" id="ng_slicknav_icon_color" type="text" value="<?php echo $ng_slicknav_icon_color; ?>" class="my-color-field" placeholder="#ffffff" /></td>										
								</tr>
								<tr>
									<td><label for="ng_slicknav_label_shadow"><?php _e( 'Menu Label Shadow', 'slicknav-mobile-menu' ); ?></label></td>
									<td>	
										<select name="ng_slicknav_label_shadow" id="ng_slicknav_label_shadow">
										<option value="0 1px 3px #000"  <?php selected($options['ng_slicknav_label_shadow'], '0 1px 3px #000' ); ?>><?php _e( 'On', 'slicknav-mobile-menu' ); ?></option>
										<option value="none"  <?php selected($options['ng_slicknav_label_shadow'], 'none' ); ?>><?php _e( 'Off', 'slicknav-mobile-menu' ); ?></option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label for="ng_slicknav_icon_shadow"><?php _e( 'Menu Icon Shadow', 'slicknav-mobile-menu' ); ?></label></td>
									<td>	
										<select name="ng_slicknav_icon_shadow" id="ng_slicknav_icon_shadow">
										<option value="0 1px 0 rgba(0,0,0,0.25)" <?php selected($options['ng_slicknav_icon_shadow'], '0 1px 0 rgba(0,0,0,0.25)' ); ?>><?php _e( 'On', 'slicknav-mobile-menu' ); ?></option>
										<option value="none" <?php selected($options['ng_slicknav_icon_shadow'], 'none' ); ?>><?php _e( 'Off', 'slicknav-mobile-menu' ); ?></option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label for="ng_slicknav_link_color"><?php _e( 'Menu Link Color', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_link_color" id="ng_slicknav_link_color" type="text" value="<?php echo $ng_slicknav_link_color; ?>" class="my-color-field" placeholder="#ffffff" /></td>										
								</tr>
								<tr>
									<td><label for="ng_slicknav_link_hover_color"><?php _e( 'Menu Link Hover Color', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_link_hover_color" id="ng_slicknav_link_hover_color" type="text" value="<?php echo $ng_slicknav_link_hover_color; ?>" class="my-color-field" placeholder="#ffffff" /></td>										
								</tr>
								<tr>
									<td><label for="ng_slicknav_button_position"><?php _e( 'Menu Button Position', 'slicknav-mobile-menu' ); ?></label></td>
									<td>	
										<select name="ng_slicknav_button_position" id="ng_slicknav_button_position">
										
										<option  value="right" <?php selected($options['ng_slicknav_button_position'], 'right' ); ?>><?php _e( 'Right', 'slicknav-mobile-menu' ); ?></option>
										<option  value="left" <?php selected($options['ng_slicknav_button_position'], 'left' ); ?>><?php _e( 'Left', 'slicknav-mobile-menu' ); ?></option>

										</select>
									</td>
								</tr>
								<tr>
									<td><label for="ng_slicknav_font"><?php _e( 'Menu Font Size (16px Default)', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_font" id="ng_slicknav_font" type="number" value="<?php echo $ng_slicknav_font; ?>" class="regular-text" placeholder="16"/></td>										
								</tr>
								<tr>
										<td><label for="ng_slicknav_label_size"><?php _e( 'Menu Label Size (16px Default)', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_label_size" id="ng_slicknav_label_size" type="number" value="<?php echo $ng_slicknav_label_size; ?>" class="regular-text" placeholder="16" /></td>										
								</tr>
								<tr>
										<td><label for="ng_slicknav_label_weight"><?php _e( 'Menu Label Weight', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<select name="ng_slicknav_label_weight" id="ng_slicknav_label_weight">
											<option  value="normal" <?php selected($options['ng_slicknav_label_weight'], 'normal' ); ?>><?php _e( 'Normal', 'slicknav-mobile-menu' ); ?></option>
											<option  value="bold" <?php selected($options['ng_slicknav_label_weight'], 'bold' ); ?>><?php _e( 'Bold', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
								</tr>
								<tr>
									<td><label for="ng_slicknav_font_case"><?php _e( 'Menu link font case', 'slicknav-mobile-menu' ); ?></label></td>
									<td>	
										<select name="ng_slicknav_font_case" id="ng_slicknav_font_case">
										<option selected="selected" value="None"><?php _e( 'none', 'slicknav-mobile-menu' ); ?></option>
										<option value="capitalize" <?php selected($options['ng_slicknav_font_case'], 'capitalize' ); ?>><?php _e( 'Capitalize', 'slicknav-mobile-menu' ); ?></option>
										<option value="lowercase" <?php selected($options['ng_slicknav_font_case'], 'lowercase' ); ?>><?php _e( 'Lowercase', 'slicknav-mobile-menu' ); ?></option>
										<option value="uppercase" <?php selected($options['ng_slicknav_font_case'], 'uppercase' ); ?>><?php _e( 'Uppercase', 'slicknav-mobile-menu' ); ?></option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label for="ng_slicknav_submenu_position"><?php _e( 'SubMenu Button Indicator', 'slicknav-mobile-menu' ); ?></label></td>
									<td>	
										<select name="ng_slicknav_submenu_position" id="ng_slicknav_submenu_position">
										<option value="right" <?php selected($options['ng_slicknav_submenu_position'], 'right' ); ?>><?php _e( 'Right', 'slicknav-mobile-menu' ); ?></option>
										<option value="none" <?php selected($options['ng_slicknav_submenu_position'], 'none' ); ?>><?php _e( 'none', 'slicknav-mobile-menu' ); ?></option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label for="ng_slicknav_position"><?php _e( 'Menu Position (body by default, using body puts the Menu at the top.', 'slicknav-mobile-menu' ); ?><br>
									<?php _e( 'However you can adjust this location by adding in a CSS class', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_position" id="ng_slicknav_position" type="text" value="<?php echo $ng_slicknav_position; ?>" class="regular-text" placeholder="body" /></td>										
								</tr>
								<tr>
									<td><label for="ng_slicknav_label"><?php _e( 'Menu Label ("MENU" by default, leave blank for no label)', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_label" id="ng_slicknav_label" type="text" value="<?php echo $ng_slicknav_label; ?>" class="regular-text" placeholder="MENU"  /></td>										
								</tr>
								<tr>
									<td><label for="ng_slicknav_parent_links"><?php _e( 'Allow Parent Links', 'slicknav-mobile-menu' ); ?></label></td>
									<td>		
										<select name="ng_slicknav_parent_links" id="ng_slicknav_parent_links">
										<option  value="true" <?php selected($options['ng_slicknav_parent_links'], 'true' ); ?>><?php _e( 'True', 'slicknav-mobile-menu' ); ?></option>
										<option value="false" <?php selected($options['ng_slicknav_parent_links'], 'false' ); ?>><?php _e( 'False', 'slicknav-mobile-menu' ); ?></option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label for="ng_slicknav_speed"><?php _e( 'Speed of Menu open/close (Lower numbers are faster)', 'slicknav-mobile-menu' ); ?></label></td>
									<td>
										<select name="ng_slicknav_speed" id="ng_slicknav_speed">
										<option value="200"<?php selected($options['ng_slicknav_speed'], '200' ); ?>><?php _e( '200', 'slicknav-mobile-menu' ); ?></option>
										<option value="400" <?php selected($options['ng_slicknav_speed'], '400' ); ?>><?php _e( '400', 'slicknav-mobile-menu' ); ?></option>
										<option value="600" <?php selected($options['ng_slicknav_speed'], '600' ); ?>><?php _e( '600', 'slicknav-mobile-menu' ); ?></option>
										<option value="800" <?php selected($options['ng_slicknav_speed'], '800' ); ?>><?php _e( '800', 'slicknav-mobile-menu' ); ?></option>
										<option value="1000" <?php selected($options['ng_slicknav_speed'], '1000' ); ?>><?php _e( '1000', 'slicknav-mobile-menu' ); ?></option>
										<option value="2000" <?php selected($options['ng_slicknav_speed'], '2000' ); ?>><?php _e( '2000', 'slicknav-mobile-menu' ); ?></option>
										</select>
									</td>
								</tr>											
						</table>
						<p><input class="button-primary" type="submit" name="ng_slicknav_menu_submit" value="Update" /></p>
							
					</form>
					<?php endif; ?>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">

						<h3><span><?php _e('Additional Resources', 'slicknav-mobile-menu'); ?></span></h3>

						<div class="inside">
							<p><?php _e('More Slick Nav Info...','slicknav-mobile-menu'); ?></p>
							<ul>
								<li><a href="http://slicknav.com/" rel="nofollow"><?php _e('SlickNav Home','slicknav-mobile-menu'); ?></a></li>
								<li><a href="https://github.com/ComputerWolf/SlickNav" rel="nofollow"><?php _e('SlickNav GitHub','slicknav-mobile-menu'); ?></a></li>
								<li><a href="http://wpbeaches.com/using-slick-responsive-menus-genesis-child-theme/" rel="nofollow"><?php _e('WP Beaches Genesis Guide','slicknav-mobile-menu'); ?></a></li>
								<li><a href="http://wpbeaches.com/swap-wordpress-twenty-twelve-mobile-menu-slick-navigation/" rel="nofollow"><?php _e('WP Beaches TwentyTwelve Guide','slicknav-mobile-menu'); ?></a></li>
							</ul>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->