<h2><?php esc_attr_e( 'SlickNav Mobile Menu Options', 'slicknav-mobile-menu' ); ?></h2>

<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h1><span class="dashicons dashicons-menu" style="font-size:30px;margin-right:10px;"></span><?php esc_attr_e( 'Mobile Menu', 'slicknav-mobile-menu' ); ?></h1>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class=""><span><?php esc_attr_e( 'Enter your CSS menu selector for the Mobile Menu, for example; #primary-menu or #menu-primary-menu etc.', 'slicknav-mobile-menu' ); ?></span>
						</h2>
						<h2 class="hndle"><span><?php esc_attr_e( 'For combining multiple menus into one Mobile Menu, add them in comma separated.', 'slicknav-mobile-menu' ); ?></span>
						</h2>

						<div class="inside">

							<form method="post" action="options.php">
								<?php
									settings_fields('ng_settings_groups_zz'); //passing in the settings group as defined register settings
									do_settings_sections('wpslicknav-menu'); //page that it appears on
									submit_button('Update');
								?>
							</form>
								<?php
								$options = get_option( 'ng_slicknavmenu' );
								?>
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

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span><?php esc_attr_e(
									'SlickNav', 'wp_admin_style'
								); ?></span></h2>

						<div class="inside">
							<h3><span><?php esc_attr_e( 'Additional Resources', 'slicknav-mobile-menu' ); ?></span></h3>

							<div class="inside">
								<p><?php esc_attr_e( 'More Slick Nav Info...','slicknav-mobile-menu' ); ?></p>
								<ul>
									<li><a href="http://slicknav.com/" rel="nofollow"><?php esc_attr_e( 'SlickNav Home','slicknav-mobile-menu' ); ?></a></li>
									<li><a href="https://github.com/ComputerWolf/SlickNav" rel="nofollow"><?php esc_attr_e( 'SlickNav GitHub','slicknav-mobile-menu' ); ?></a></li>
									<li><a href="https://wpbeaches.com/slicknav-wordpress-filter-to-adjust-values" rel="nofollow"><?php esc_attr_e( 'Advanced Filter Guide','slicknav-mobile-menu' ); ?></a></li>
									<li><a href="http://www.alanwood.net/unicode/geometric_shapes.html" target="_blank"><?php esc_attr_e( 'Symbol Reference','slicknav-mobile-menu' ); ?></a></li>
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
