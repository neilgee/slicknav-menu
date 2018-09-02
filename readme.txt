=== Plugin Name ===

Contributors: neilgee
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=neil%40wpbeaches%2ecom&lc=AU&item_name=WP%20Beaches&item_number=Plugins&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: mobile, menu, responsive, aria, accessible, graceful, submenu, multi-level
Requires at least: 4.0
Tested up to: 4.9
Stable tag: 1.8.8
Plugin Name: SlickNav Mobile Menu
Plugin URI: http://wpbeaches.com
Description: SlickNav Mobile Menu
Author: Neil Gowran
Version: 1.8.8
Author URI: http://wpbeaches.com/
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

This plugin adds the option to use the SlickNav Responsive Mobile Menu in place of a regular menu at a designated size.


== Description ==

This plugin adds SlickNav Responsive Mobile Menu functionality to WordPress.

SlickNav Responsive Menu has multi level menu support.

Cross browser Compatible.

Keyboard Accessible.

Degrades gracefully without JavaScript.

Creates ARIA compliant menu.

Option to add a search field.

Option to add a logo.

Internationalized.

Advanced Filter.

Combine multiple menus.



== Installation ==

This section describes how to install the plugin:

1. Upload the `slicknav-mobile-menu` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Options are in Settings => SlickNav Menu

== Usage ==

The settings are found via the dashboard Settings > SlickNav Menu

 - Here you choose your Menu to be used as Mobile Menu - original has to already be on page

 - Maximum width for the menu to appear, default is 600px

 - Menu Label, MENU is default

 - Parent links, true or false, whether a parent link that has a submenu is clickable to a page

 - Show Child Links, false by default

 - Open/close Menu speed option

 - Fix Menu to Head, using position fixed to body tag

 - Option for branding logo opposite menu label - smaller works better such as 40px in height and up to 140px in width

 - Option to hide header with a '.site-header' class when Slicknav Menu is visible

 - Option to add in a search field at the bottom of the menu

 - Search icon background color

 - Options to change the opening and closing symbols

 - Advanced filter to adjust Slicknav values - https://wpbeaches.com/slicknav-wordpress-filter-to-adjust-values/

 Demo - http://wpbeaches.com (resize browser window to below 600px)

 Please note that SlickNav jQuery plugin is the work of Josh Cope, he is not responsible for the working or support of this plugin.

== Screenshots ==

1. Image of internal options

2. Image of front end view example menu

3. Shows menu logo position and search form enabled

4. Shows menu and text logo

== Changelog ==

= 1.8.8 =

* 27/01/18
- Added 'inline-block' display to display designated Mobile Menu when outside of mobile view.
- Updated wp-color-picker to 2.1.3 to be compatible with WP 4.9

= 1.8.7 =

* 17/11/17
- Option to display designated Mobile Menu when outside of mobile view, by various CSS display properties.
- Update wp-color-picker to 2.1.2 to be compatible with WP 4.9

= 1.8.6 =

* 06/08/17
- Fix to store Unicode characters in older MySQL storage

= 1.8.5 =

* 19/7/17
- Minor fix for 2 CSS
- Lower z-index on Menu
- display block on targetted menu

= 1.8.4 =

* 08/7/17
- Minor fix for 2 undefined PHP notices


= 1.8.3 =

* 05/7/17
- CSS fix when menu sticks to head
- JS init code clean up

= 1.8.2 =

* 02/7/17
- Option to center SlickNav Menu Button
- If a brand logo or text block is also used with the button then the spacing is set to 'space-between' which will space the items to the outer edges.
- Fix submenu indicators if set to left
- Set inline CSS to mobile first min-width media queries

= 1.8.1 =

* 24/6/17
- Updated in line with SlickNav core 1.0.10
- New option to swap animation library, jquery is default - velocity as an option too.
- Better keyboard ARIA support with latest SlickNav 1.0.10


= 1.8.0 =

* 7/8/16
- Redo options using Settings API.
- Use RGBa color pickers for color options.
- Add text logo alternative to image
- Option for search icon color.
- Option to toggle sublevel menus - show only one at a time.


= 1.7.5 =

* 4/6/16 - Add option for Link text hover color, this also applies to submenu items, remove submenu hover background color. Existing menu hover background color now applies to top and submenu items.

= 1.7.4 =

* 26/3/16 - Added close on click setting, useful for same page links, the menu will close after clicking, added a search text label field, upgraded SlickNav core to 1.0.7, refactored wp_add_inline_style CSS.

= 1.7.3.1 =

* 9/2/16 - Fix undefined notices on CSS variables when WP_Debug is set to true.

= 1.7.3 =

* 5/2/16 - CSS inline styles now added via wp_add_inline_style.

= 1.7.2 =

* 12/12/15 - Updated core SlickNav to match 1.0.6, fixes for Undefined index notices displayed when WP_Debug set to true.

= 1.7.1 =

* 23/10/15 - Option to hide header when SlickNav displays, this will only apply to themes with a header class of '.site-header' otherwise it will need to be done in the CSS, minor updates to descriptive text. Less padding around top & bottom of brand logo.

= 1.7.0 =

* 30/9/15 - Now add comma separated menus for one combined menu -> props Ov3rfly, filter name more descriptively named.

= 1.6.3 =

* 17/9/15 - Backend fixes, nonce referrer completed, remove global variables, restructure output based on no values set -> props Ov3rfly.

= 1.6.2 =

* 17/9/15 - Added a filter so Slicknav options can be changed outside of regular options page, props -> Ov3rfly - Instructions - https://wpbeaches.com/slicknav-wordpress-filter-to-adjust-values/

= 1.6.1 =

* 10/9/15 - Menu Button Position - if set to left, brand logo (if used) will then appear to the right, code error fix ups, added a form nonce for security -> props Ov3rfly.

= 1.6.0 =

* 15/8/15 - Back end PHP functions are now namespaced, script handle names redefined with more description, minor CSS tweaks for spacing on search field, option added for Button background color when menu is expanded, CSS styles added so menu is visible when logged in with Admin toolbar visible, updated translation files. Added fallback to body selector if selector is blank.

= 1.5.6 =

* 25/7/15 - Color option for Search Icon background, logo link to home page, logo alt text field - Set Menu selection back to manual text input.

= 1.5.5 =

* 2/7/15 - CSS bug fix for fixed positioning.

= 1.5.4 =

* 28/6/15 - Select menu from dropdown of available menus instead of text input field - original menu still has to be already output on the page.


= 1.5.3 =

* 26/6/15 - Bug fixes: removed placeholder value for brand logo, added a max-width value on logo,  code tidy up.

= 1.5.2 =

* 13/6/15 - Options to change the opening and closing symbols.

= 1.5.1 =

* 11/6/15 - Option to add in a search field at bottom of menu.

= 1.5.0 =

* 7/6/15 - Updated POT file, Core SlickNav upgrade version to 1.0.4, option for Branding Logo opposite label, using input field of media uploader.

= 1.4.2 =

* 31/5/15 - Option to fix menu to Head by using position fixed to body tag.

= 1.4.1 =

* 17/5/15 - No front end changes, Fix wp-debug notice on undefined index when checkboxes are not set.

= 1.4.0 =

* 12/5/15 - No front end changes, All javascript now passed via wp_localize_script, Parent links on by default, Show Child links on open. is off by default

= 1.3.2 =

* 3/5/15 - Added Child Links show/hide on open - Added 'Settings Updated' admin notify.

= 1.3.1 =

* 28/4/15 - Core SlickNav upgrade version 1.0.3 - CSS minified - Hover Color Option for Items that contain submenus.

= 1.3.0 =

* 26/4/15 - Internationalized - French translation added.

= 1.2.1	=

* 18/4/15  - Added color pickers for color options.

= 1.2.0	=

* 17/4/15  - Added shadow on/off for label and icon, added label font size adjustment, label weight adjustment,  admin layout tweaks.

= 1.1.5	=

* 16/4/15 - Added link color and background color hover on links.

= 1.1.4	=

* 15/4/15 - Added color options for Menu label name and icon, redid dropdown value retentions.

= 1.1.3	=

* 13/4/15 - BugFix, Select Option Dropdowns now retains previous selection on update.

= 1.1.2	=

* 12/4/15 - Added open/close Menu speed amount.

= 1.1.1	=

* 12/4/15 - Position, Label and Parent Links options added. Placeholder text added.

= 1.1.0	=

* 11/4/15 - Position, Label and Parent Links options added. Placeholder text added.

= 1.0.0 =

* Initial release.
