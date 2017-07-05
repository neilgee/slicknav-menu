jQuery(document).ready(function($) {

        if(slickNavVars.ng_slicknav.ng_slicknav_fixhead  || !slickNavVars.ng_slicknav.ng_slicknav_position ) {
                slickNavVars.ng_slicknav.ng_slicknav_position = 'body';
        }

        if(slickNavVars.ng_slicknav.ng_slicknav_openedsymbol === "") {
                slickNavVars.ng_slicknav.ng_slicknav_openedsymbol = "&#9660;";
        }

        if(slickNavVars.ng_slicknav.ng_slicknav_closedsymbol === "") {
                slickNavVars.ng_slicknav.ng_slicknav_closedsymbol = "&#9658;";
        }

        if(slickNavVars.ng_slicknav.ng_slicknav_search_text === "") {
                slickNavVars.ng_slicknav.ng_slicknav_search_text = "search...";
        }

        // Ov3rfly
        var ng_slicknav_menu = '';
        var ng_slicknav_menu_duplicate = true;
        var ng_slicknav_menu_arr = slickNavVars.ng_slicknav.ng_slicknav_menu.split(',');

        if ( ng_slicknav_menu_arr.length > 1 ) {
        	// multiple comma seperated selectors
        	// based on http://codepen.io/ComputerWolf/pen/tjyIg
        	// clone all menus to keep them intact
        	ng_slicknav_menu = $( $.trim( ng_slicknav_menu_arr[0] ) ).clone();
        	for ( var i = 1; i < ng_slicknav_menu_arr.length; i++ ) {
        		var ng_slicknav_other = $( $.trim( ng_slicknav_menu_arr[i] ) ).clone();
        		ng_slicknav_other.children( 'li' ).appendTo( ng_slicknav_menu );
        	}
        	ng_slicknav_menu_duplicate = false;
        } else {
        	// only one selector
        	ng_slicknav_menu = $.trim( ng_slicknav_menu_arr[0] );
        }

        $(ng_slicknav_menu).slicknav({	// Ov3rfly
                prependTo       : slickNavVars.ng_slicknav.ng_slicknav_position,
                label           : slickNavVars.ng_slicknav.ng_slicknav_label,
                duration        : slickNavVars.ng_slicknav.ng_slicknav_speed,
                animations      : slickNavVars.ng_slicknav_animation_library,
                showChildren    : slickNavVars.ng_slicknav.ng_slicknav_child_links,
                allowParentLinks: slickNavVars.ng_slicknav.ng_slicknav_parent_links,
                closeOnClick    : slickNavVars.ng_slicknav.ng_slicknav_close_click,
                brand           : slickNavVars.ng_slicknav.ng_slicknav_brand,
                openedSymbol    : slickNavVars.ng_slicknav.ng_slicknav_openedsymbol,
                closedSymbol    : slickNavVars.ng_slicknav.ng_slicknav_closedsymbol,
                duplicate       : ng_slicknav_menu_duplicate,	// Ov3rfly
                beforeOpen      : (slickNavVars.ng_slicknav.ng_slicknav_accordion == true) ? function(trigger) { slicknavOpened(trigger); } : function(){},
        });


        if ( slickNavVars.ng_slicknav.ng_slicknav_search === true ) {
                $( '.slicknav_nav' ).append( '<li class="search"><form role="search" method="get" id="slicknav-searchform" action="'+ slickNavVars.ng_slicknav.ng_slicksearch + '"><input type="text" placeholder="'+ slickNavVars.ng_slicknav.ng_slicknav_search_text + '" name="s" id="s" /><input type="submit" id="searchsubmit" value="&#xf179;" /></form></li>');
        }

        if ( !slickNavVars.ng_slicknav.ng_slicknav_brand && slickNavVars.ng_slicknav.ng_slicknav_brand_text ) {
                $( '.slicknav_menu' ).prepend( '<p class="slicknav-logo-text"><a href="'+ slickNavVars.ng_slicknav.ng_slicksearch + '">'+ slickNavVars.ng_slicknav.ng_slicknav_brand_text + '</p>');

        }

        // Accordion used to show 1 sublevel at a time - https://github.com/ComputerWolf/SlickNav/issues/16
        function slicknavOpened(trigger) {
                var $trigger = $(trigger[0]);
                if ($trigger.hasClass('slicknav_btn')) {
                // this is the top-level menu/list opening.
                // we only want to trap lower-level/sublists.
                return;
                }
                // trigger is an <a> anchor contained in a <li>
                var $liParent = $trigger.parent();
                // parent <li> is contained inside a <ul>
                var $ulParent = $liParent.parent();
                // loop through all children of parent <ul>
                // i.e. all siblings of this <li>
                $ulParent.children().each(function () {
                var $child = $(this);
                if ($child.is($liParent)) {
                    // this child is self, not is sibling
                    return;
                }
                if ($child.hasClass('slicknav_collapsed')) {
                    // this child is already collapsed
                    return;
                }
                if (!$child.hasClass('slicknav_open')) {
                    // could throw an exception here: this shouldn't happen
                    // because I expect li to have class either slicknav_collapsed or slicknav_open
                    return;
                }
                // found a sibling <li> which is already open.
                // expect that its first child is an anchor item.
                var $anchor = $child.children().first();
                if (!$anchor.hasClass('slicknav_item')) {
                    return;
                }
                // close the sibling by emulating a click on its anchor.
                $anchor.click();
                });

        }

        // Add Flex container around brand/brand text and Menu icon/label divs so button can be centered
        var brandBlank = ( slickNavVars.ng_slicknav.ng_slicknav_brand ==  '' );
        var brandBlankText = ( slickNavVars.ng_slicknav.ng_slicknav_brand_text ==  '' );
        if ( ! brandBlank  ) {
                $( ".slicknav_brand" ).next().addBack().wrapAll( "<div class='slicknav-flex'></div>" );
        }
        else if ( ! brandBlankText ) {
                $( ".slicknav-logo-text" ).next().addBack().wrapAll( "<div class='slicknav-flex'></div>" );
        }
        else
                $( ".slicknav_btn" ).wrapAll( "<div class='slicknav-flex'></div>" );
 });
