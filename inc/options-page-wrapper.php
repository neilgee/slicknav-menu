<h3><?php _e( 'SlickNav Mobile Menu Options', 'slicknav-mobile-menu' ); ?></h3>

<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h2><?php esc_attr_e( 'Mobile Menu', 'slicknav-mobile-menu' ); ?></h2>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span><?php esc_attr_e( 'Enter your menu CSS selector for the Mobile Menu name value, for example; #menu-primary-menu', 'slicknav-mobile-menu' ); ?></span></h3>

						<div class="inside">
						<?php if( !isset( $ng_slicknav_menu ) || $ng_slicknav_menu == ''): ?>

						<form name="ng_slicknav_menu_form" method="post" action="">

								<input type="hidden" name="ng_slicknav_form_submitted" value="Y">

							<table class="form-table">
									<tr>
										<td><label for="ng_slicknav_menu"><?php esc_attr_e( 'SlickNav Mobile Menu Name', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_menu" id="ng_slicknav_menu" type="text" value="" class="regular-text" placeholder="CSS Selector Menu Name" /></td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_width"><?php esc_attr_e( 'Maximum width to use SlickNav (600px Default)', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_width" id="ng_slicknav_width" type="number" value="600" class="regular-text" placeholder="600" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_background"><?php esc_attr_e( 'Menu Background Color', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_background" id="ng_slicknav_background" type="text" value="#4c4c4c" class="regular-text" placeholder="#4c4c4c" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_button"><?php esc_attr_e( 'Menu Button Color', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_button" id="ng_slicknav_button" type="text" value="#222222" class="regular-text" placeholder="#222222" /></td>										
									</tr>	
									<tr>
										<td><label for="ng_slicknav_button_position"><?php esc_attr_e( 'Menu Button Position', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<select name="ng_slicknav_button_position" id="ng_slicknav_button_position">
											<option selected="selected" value="right"><?php esc_attr_e( 'Right', 'slicknav-mobile-menu' ); ?></option>
											<option value="left"><?php esc_attr_e( 'Left', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_font"><?php esc_attr_e( 'Menu Font Size (16px Default)', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_font" id="ng_slicknav_font" type="number" value="16" class="regular-text" placeholder="16" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_submenu_position"><?php esc_attr_e( 'SubMenu Button Indicator', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<select name="ng_slicknav_submenu_position" id="ng_slicknav_submenu_position">
											<option selected="selected" value="none"><?php esc_attr_e( 'Left', 'slicknav-mobile-menu' ); ?></option>
											<option value="right"><?php esc_attr_e( 'Right', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_position"><?php esc_attr_e( 'Menu Position (body by default, using body puts the Menu at the top.', 'slicknav-mobile-menu' ); ?><br>
										<?php esc_attr_e( 'However you can adjust this location by adding in a CSS class', 'slicknav-mobile-menu' ); ?></label></td>										
										<td><input name="ng_slicknav_position" id="ng_slicknav_position" type="text" value="body" class="regular-text"  placeholder="body"/></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_label"><?php esc_attr_e( 'Menu Label ("MENU" by default, leave blank for no label)', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_label" id="ng_slicknav_label" type="text" value="MENU" class="regular-text" placeholder="MENU" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_parent_links"><?php esc_attr_e( 'Allow Parent Links', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<select name="ng_slicknav_parent_links" id="ng_slicknav_parent_links">
											<option value="true"><?php esc_attr_e( 'True', 'slicknav-mobile-menu' ); ?></option>
											<option value="false"><?php esc_attr_e( 'False', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_speed"><?php esc_attr_e( 'Speed of Menu open/close (Higher numbers are slower)', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<select name="ng_slicknav_speed" id="ng_slicknav_speed">
											<option value="200"><?php esc_attr_e( '200', 'slicknav-mobile-menu' ); ?></option>
											<option selected="selected" value="400"><?php esc_attr_e( '400', 'slicknav-mobile-menu' ); ?></option>
											<option value="600"><?php esc_attr_e( '600', 'slicknav-mobile-menu' ); ?></option>
											<option value="800"><?php esc_attr_e( '800', 'slicknav-mobile-menu' ); ?></option>
											<option value="1000"><?php esc_attr_e( '1000', 'slicknav-mobile-menu' ); ?></option>
											<option value="2000"><?php esc_attr_e( '2000', 'slicknav-mobile-menu' ); ?></option>
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
									<td><label for="ng_slicknav_menu"><?php esc_attr_e( 'SlickNav Mobile Menu Name', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_menu" id="ng_slicknav_menu" type="text" value="<?php echo $ng_slicknav_menu; ?>" class="regular-text" placeholder="CSS Selector Menu Name"/></td>
								</tr>
								<tr>
									<td><label for="ng_slicknav_width"><?php esc_attr_e( 'Maximum Width to use SlickNav (600px Default)', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_width" id="ng_slicknav_width" type="number" value="<?php echo $ng_slicknav_width; ?>" class="regular-text" placeholder="600" /></td>									
								</tr>
								<tr>
									<td><label for="ng_slicknav_background"><?php esc_attr_e( 'Menu Background Color', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_background" id="ng_slicknav_background" type="text" value="<?php echo $ng_slicknav_background; ?>" class="regular-text" placeholder="#4c4c4c" /></td>										
								</tr>
								<tr>
									<td><label for="ng_slicknav_button"><?php esc_attr_e( 'Menu Button Color', 'slicknav-mobile-menu' ); ?></label></td>
									<td><input name="ng_slicknav_button" id="ng_slicknav_button" type="text" value="<?php echo $ng_slicknav_button; ?>" class="regular-text" placeholder="#222222" /></td>										
								</tr>
									<tr>
										<td><label for="ng_slicknav_button_position"><?php esc_attr_e( 'Menu Button Position', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<strong><?php echo $ng_slicknav_button_position; ?></strong>
										&nbsp;&nbsp;<?php esc_attr_e( 'Reposition', 'slicknav-mobile-menu' ); ?>	
											<select name="ng_slicknav_button_position" id="ng_slicknav_button_position">
											<option  value="<?php echo $ng_slicknav_button_position; ?>"><?php echo $ng_slicknav_button_position; ?></option>
											<option  value="right"><?php esc_attr_e( 'Right', 'slicknav-mobile-menu' ); ?></option>
											<option value="left"><?php esc_attr_e( 'Left', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_font"><?php esc_attr_e( 'Menu Font Size (16px Default)', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_font" id="ng_slicknav_font" type="number" value="<?php echo $ng_slicknav_font; ?>" class="regular-text" placeholder="16"/></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_submenu_position"><?php esc_attr_e( 'SubMenu Button Indicator', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<strong><?php echo $ng_slicknav_submenu_position; ?></strong>
										&nbsp;&nbsp;<?php esc_attr_e( 'Reposition', 'slicknav-mobile-menu' ); ?>
											<select name="ng_slicknav_submenu_position" id="ng_slicknav_submenu_position">
											<option value="<?php echo $ng_slicknav_submenu_position; ?>"><?php echo $ng_slicknav_submenu_position; ?></option>
											<option value="right"><?php esc_attr_e( 'Right', 'slicknav-mobile-menu' ); ?></option>
											<option value="none"><?php esc_attr_e( 'Left', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_position"><?php esc_attr_e( 'Menu Position (body by default, using body puts the Menu at the top.', 'slicknav-mobile-menu' ); ?><br>
										<?php esc_attr_e( 'However you can adjust this location by adding in a CSS class', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_position" id="ng_slicknav_position" type="text" value="<?php echo $ng_slicknav_position; ?>" class="regular-text" placeholder="body" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_label"><?php esc_attr_e( 'Menu Label ("MENU" by default, leave blank for no label)', 'slicknav-mobile-menu' ); ?></label></td>
										<td><input name="ng_slicknav_label" id="ng_slicknav_label" type="text" value="<?php echo $ng_slicknav_label; ?>" class="regular-text" placeholder="MENU"  /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_parent_links"><?php esc_attr_e( 'Allow Parent Links', 'slicknav-mobile-menu' ); ?></label></td>
										<td>	
											<strong><?php echo $ng_slicknav_parent_links; ?></strong>
										&nbsp;&nbsp;<?php esc_attr_e( 'Switch', 'slicknav-mobile-menu' ); ?>	
											<select name="ng_slicknav_parent_links" id="ng_slicknav_parent_links">
											<option  value="<?php echo $ng_slicknav_parent_links; ?>"><?php echo $ng_slicknav_parent_links; ?></option>
											<option  value="true"><?php esc_attr_e( 'True', 'slicknav-mobile-menu' ); ?></option>
											<option value="false"><?php esc_attr_e( 'False', 'slicknav-mobile-menu' ); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_speed"><?php esc_attr_e( 'Speed of Menu open/close (Lower numbers are faster)', 'slicknav-mobile-menu' ); ?></label></td>
										<td>
											<strong><?php echo $ng_slicknav_speed; ?></strong>	
										&nbsp;&nbsp;<?php esc_attr_e( 'Switch', 'slicknav-mobile-menu' ); ?>
											<select name="ng_slicknav_speed" id="ng_slicknav_speed">
											<option value="<?php echo $ng_slicknav_speed; ?>"><?php echo $ng_slicknav_speed; ?></option>
											<option value="200"><?php esc_attr_e( '200', 'slicknav-mobile-menu' ); ?></option>
											<option value="400"><?php esc_attr_e( '400', 'slicknav-mobile-menu' ); ?></option>
											<option value="600"><?php esc_attr_e( '600', 'slicknav-mobile-menu' ); ?></option>
											<option value="800"><?php esc_attr_e( '800', 'slicknav-mobile-menu' ); ?></option>
											<option value="1000"><?php esc_attr_e( '1000', 'slicknav-mobile-menu' ); ?></option>
											<option value="2000"><?php esc_attr_e( '2000', 'slicknav-mobile-menu' ); ?></option>
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

						<h3><span><?php esc_attr_e('Additional Resources', 'slicknav-mobile-menu'); ?></span></h3>

						<div class="inside">
							<p><?php esc_attr_e('More Slick Nav Info...','slicknav-mobile-menu'); ?></p>
							<ul>
								<li><a href="http://slicknav.com/" rel="nofollow"><?php esc_attr_e('SlickNav Home','slicknav-mobile-menu'); ?></a></li>
								<li><a href="https://github.com/ComputerWolf/SlickNav" rel="nofollow"><?php esc_attr_e('SlickNav GitHub','slicknav-mobile-menu'); ?></a></li>
								<li><a href="http://wpbeaches.com/using-slick-responsive-menus-genesis-child-theme/" rel="nofollow"><?php esc_attr_e('WP Beaches Genesis Guide','slicknav-mobile-menu'); ?></a></li>
								<li><a href="http://wpbeaches.com/swap-wordpress-twenty-twelve-mobile-menu-slick-navigation/" rel="nofollow"><?php esc_attr_e('WP Beaches TwentyTwelve Guide','slicknav-mobile-menu'); ?></a></li>
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