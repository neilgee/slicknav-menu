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

jQuery(document).ready(function($) {

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

        prependTo: slickNavVars.ng_slicknav.ng_slicknav_position,
        label: slickNavVars.ng_slicknav.ng_slicknav_label,
        duration: slickNavVars.ng_slicknav.ng_slicknav_speed,
        showChildren: slickNavVars.ng_slicknav.ng_slicknav_child_links,
        allowParentLinks: slickNavVars.ng_slicknav.ng_slicknav_parent_links,
        closeOnClick: slickNavVars.ng_slicknav.ng_slicknav_close_click,
        brand: slickNavVars.ng_slicknav.ng_slicknav_brand,
        openedSymbol: slickNavVars.ng_slicknav.ng_slicknav_openedsymbol,
        closedSymbol: slickNavVars.ng_slicknav.ng_slicknav_closedsymbol,

		    duplicate: ng_slicknav_menu_duplicate	// Ov3rfly

    });
    if ( slickNavVars.ng_slicknav.ng_slicknav_search === true ) {
        $( '.slicknav_nav' ).append( '<li class="search"><form role="search" method="get" id="slicknav-searchform" action="'+ slickNavVars.ng_slicknav.ng_slicksearch + '"><input type="text" placeholder="'+ slickNavVars.ng_slicknav.ng_slicknav_search_text + '" name="s" id="s" /><input type="submit" id="searchsubmit" value="&#xf179;" /></form></li>');
    }
 });
