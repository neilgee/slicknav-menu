=== Plugin Name ===

Contributors: neilgee
Donate link: http://wpbeaches.com/
Tags: mobile, menu, responsive, aria, accessible, graceful, submenu, multi-level
Requires at least: 4.0
Tested up to: 4.2
Stable tag: 1.4.0
Plugin Name: SlickNav Mobile Menu
Plugin URI: http://wpbeaches.com
Description: SlickNav Mobile Menu
Author: Neil Gee
Version: 1.4.0
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

Internationalized



== Installation ==

This section describes how to install the plugin:

1. Upload the `slicknav-mobile-menu` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Options are in Settings => SlickNav Menu

== Usage ==

The settings are found via the dashboard Settings > SlickNav Menu

 - Here you add in your CSS Menu Selector

 - Maximum width for the menu to appear, default is 600px

 - Menu background color, default is #4c4c4c

 - Menu button color, default is #333

 - Menu label color, default is #fff

 - Menu icon color, default is #fff

 - Menu label shadow, default is on

 - Menu icon shadow, default is on

 - Menu link color, default is #fff

 - Menu link hover background color, default is #ccc

 - Menu button position, default is right

 - Menu font size, default is 16px

 - Menu label size, default is 18px

 - Menu font case, default is none

 - Submenu button indicator position, default is right

 - Menu position, body tag is default

 - Menu Label, MENU is default

 - Parent links, true or false, whether a parent link that has a submenu is clickable to a page 

 - Show Child Links, false by default

 - Open/close Menu speed option

 Demo - http://wpbeaches.com

 Please note that SlickNav is the work of Josh Cope, he is not responsible for the working or support of this plugin.

== Screenshots ==

1. Image of internal options

2. Image of front end view example menu

== Changelog ==

= 1.0.0 =

* Initial release.

= 1.1.0	= 

* 11/4/15  - Position, Label and Parent Links options added. Placeholder text added.

= 1.1.1	=

* 12/4/15 - Position, Label and Parent Links options added. Placeholder text added.

= 1.1.2	=

* 12/4/15 - Added open/close Menu speed amount.

= 1.1.3	=

* 13/4/15  - BugFix, Select Option Dropdowns now retains previous selection on update.

= 1.1.4	=

* 15/4/15  - Added color options for Menu label name and icon, redid dropdown value retentions.

= 1.1.5	=

* 16/4/15  - Added link color and background color hover on links.

= 1.2.0	=

* 17/4/15  - Added shadow on/off for label and icon, added label font size adjustment, label weight adjustment,  admin layout tweaks.

= 1.2.1	=

* 18/4/15  - Added color pickers for color options.

= 1.3.0 =

* 26/4/15  - Internationalized -  French translation added.

= 1.3.1 =

* 28/4/15 - Core SlickNav upgrade version 1.0.3 - CSS minified - Hover Color Option for Items that contain submenus.

= 1.3.2 =

* 3/5/15 - Added Child Links show/hide on open - Added 'Settings Updated' admin notify

= 1.4.0 =

* 12/5/15 - No front end changes, All javascript now passed via wp_localize_script, Parent links on by default, Show Child links on open is off be default