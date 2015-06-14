if(phpVars.ng_slicknav.ng_slicknav_fixhead ) {
	phpVars.ng_slicknav.ng_slicknav_position = 'body';
}

jQuery(document).ready(function($) {
    $(phpVars.ng_slicknav.ng_slicknav_menu).slicknav({
    
        prependTo: phpVars.ng_slicknav.ng_slicknav_position,
        label: phpVars.ng_slicknav.ng_slicknav_label,               
        duration: phpVars.ng_slicknav.ng_slicknav_speed,
        showChildren: phpVars.ng_slicknav.ng_slicknav_child_links,
        allowParentLinks: phpVars.ng_slicknav.ng_slicknav_parent_links,
        brand: phpVars.ng_slicknav.ng_slicknav_brand,

    });
    if ( phpVars.ng_slicknav.ng_slicknav_search == true ) {
    	$( '.slicknav_nav' ).append( '<li class="search"><form role="search" method="get" id="slicknav-searchform" action="'+ phpVars.ng_slicknav.ng_slicksearch + '"><input type="text" placeholder="search..." name="s" id="s" /><input type="submit" id="searchsubmit" value="&#xf179;" /></form></li>');
	}
 });