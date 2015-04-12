<h3><?php _e( 'SlickNav Mobile Menu Options', 'wp_admin_style' ); ?></h3>

<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h2><?php esc_attr_e( 'Mobile Menu', 'wp_admin_style' ); ?></h2>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span><?php esc_attr_e( 'Enter your menu CSS selector for the Mobile Menu name value, for example; #menu-primary-menu', 'wp_admin_style' ); ?></span></h3>

						<div class="inside">
						<?php if( !isset( $ng_slicknav_menu ) || $ng_slicknav_menu == ''): ?>

						<form name="ng_slicknav_menu_form" method="post" action="">

								<input type="hidden" name="ng_slicknav_form_submitted" value="Y">

							<table class="form-table">
									<tr>
										<td><label for="ng_slicknav_menu">SlickNav Mobile Menu Name</label></td>
										<td><input name="ng_slicknav_menu" id="ng_slicknav_menu" type="text" value="" class="regular-text" placeholder="CSS Selector Menu Name" /></td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_width">Maximum width to use SlickNav (600px Default)</label></td>
										<td><input name="ng_slicknav_width" id="ng_slicknav_width" type="number" value="600" class="regular-text" placeholder="600" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_background">Menu Background Color</label></td>
										<td><input name="ng_slicknav_background" id="ng_slicknav_background" type="text" value="#4c4c4c" class="regular-text" placeholder="#4c4c4c" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_button">Menu Button Color</label></td>
										<td><input name="ng_slicknav_button" id="ng_slicknav_button" type="text" value="#222222" class="regular-text" placeholder="#222222" /></td>										
									</tr>	
									<tr>
										<td><label for="ng_slicknav_button_position">Menu Button Position</label></td>
										<td>	
											<select name="ng_slicknav_button_position" id="ng_slicknav_button_position">
											<option selected="selected" value="right">Right</option>
											<option value="left">Left</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_font">Menu Font Size (16px Default)</label></td>
										<td><input name="ng_slicknav_font" id="ng_slicknav_font" type="number" value="16" class="regular-text" placeholder="16" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_submenu_position">SubMenu Button Indicator</label></td>
										<td>	
											<select name="ng_slicknav_submenu_position" id="ng_slicknav_submenu_position">
											<option selected="selected" value="none">Left</option>
											<option value="right">Right</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_position">Menu Position (body by default, using body puts the Menu at the top,<br> however you can adjust this location by adding in a CSS class)</label></td>
										<td><input name="ng_slicknav_position" id="ng_slicknav_position" type="text" value="body" class="regular-text"  placeholder="body"/></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_label">Menu Label ("MENU" by default, leave blank for no label)</label></td>
										<td><input name="ng_slicknav_label" id="ng_slicknav_label" type="text" value="MENU" class="regular-text" placeholder="MENU" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_parent_links">Allow Parent Links</label></td>
										<td>	
											<select name="ng_slicknav_parent_links" id="ng_slicknav_parent_links">
											<option value="true">True</option>
											<option value="false">False</option>
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
									<td><label for="ng_slicknav_menu">SlickNav Mobile Menu Name</label></td>
									<td><input name="ng_slicknav_menu" id="ng_slicknav_menu" type="text" value="<?php echo $ng_slicknav_menu; ?>" class="regular-text" placeholder="CSS Selector Menu Name"/></td>
								</tr>
								<tr>
									<td><label for="ng_slicknav_width">Maximum Width to use SlickNav (600px Default)</label></td>
									<td><input name="ng_slicknav_width" id="ng_slicknav_width" type="number" value="<?php echo $ng_slicknav_width; ?>" class="regular-text" placeholder="600" /></td>									
								</tr>
								<tr>
									<td><label for="ng_slicknav_background">Menu Background Color</label></td>
									<td><input name="ng_slicknav_background" id="ng_slicknav_background" type="text" value="<?php echo $ng_slicknav_background; ?>" class="regular-text" placeholder="#4c4c4c" /></td>										
								</tr>
								<tr>
									<td><label for="ng_slicknav_button">Menu Button Color</label></td>
									<td><input name="ng_slicknav_button" id="ng_slicknav_button" type="text" value="<?php echo $ng_slicknav_button; ?>" class="regular-text" placeholder="#222222" /></td>										
								</tr>
									<tr>
										<td><label for="ng_slicknav_button_position">Menu Button Position</label></td>
										<td>	
											<strong><?php echo $ng_slicknav_button_position; ?></strong>
										&nbsp;&nbsp;Reposition	
											<select name="ng_slicknav_button_position" id="ng_slicknav_button_position">
											<option  value="right">Right</option>
											<option value="left">Left</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_font">Menu Font Size (16px Default)</label></td>
										<td><input name="ng_slicknav_font" id="ng_slicknav_font" type="number" value="<?php echo $ng_slicknav_font; ?>" class="regular-text" placeholder="16"/></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_submenu_position">SubMenu Button Indicator</label></td>
										<td>	
											<strong><?php echo $ng_slicknav_submenu_position; ?></strong>
										&nbsp;&nbsp;Reposition	
											<select name="ng_slicknav_submenu_position" id="ng_slicknav_submenu_position">
											<option selected="selected" value="right">Right</option>
											<option value="none">Left</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="ng_slicknav_position">Menu Position (body by default, using body puts the Menu at the top,<br> however you can adjust this location by adding in a CSS class)</label></td>
										<td><input name="ng_slicknav_position" id="ng_slicknav_position" type="text" value="<?php echo $ng_slicknav_position; ?>" class="regular-text" placeholder="body" /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_label">Menu Label ("MENU" by default, leave blank for no label)</label></td>
										<td><input name="ng_slicknav_label" id="ng_slicknav_label" type="text" value="<?php echo $ng_slicknav_label; ?>" class="regular-text" placeholder="MENU"  /></td>										
									</tr>
									<tr>
										<td><label for="ng_slicknav_parent_links">Allow Parent Links</label></td>
										<td>	
											<strong><?php echo $ng_slicknav_parent_links; ?></strong>
										&nbsp;&nbsp;Switch	
											<select name="ng_slicknav_parent_links" id="ng_slicknav_parent_links">
											<option  value="true">True</option>
											<option value="false">False</option>
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

						<h3><span><?php esc_attr_e(
									'Additional Resources', 'wp_admin_style'
								); ?></span></h3>

						<div class="inside">
							<p><?php esc_attr_e(
									'More Slick Nav Info...',
									'wp_admin_style'
								); ?></p><ul>
										<li><a href="http://slicknav.com/" rel="nofollow">SlickNav Home</a></li>
										<li><a href="https://github.com/ComputerWolf/SlickNav" rel="nofollow">SlickNav GitHub</a></li>
										<li><a href="http://wpbeaches.com/using-slick-responsive-menus-genesis-child-theme/" rel="nofollow">WP Beaches Genesis Guide</a></li>
										<li><a href="http://wpbeaches.com/swap-wordpress-twenty-twelve-mobile-menu-slick-navigation/" rel="nofollow">WP Beaches TwentyTwelve Guide</a></li>
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