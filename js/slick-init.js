jQuery(document).ready(function($) {
            $(phpVars.ng_slicknav.ng_slicknav_menu).slicknav({
                prependTo: phpVars.ng_slicknav.ng_slicknav_position,
                label: phpVars.ng_slicknav.ng_slicknav_label,               
                duration: phpVars.ng_slicknav.ng_slicknav_speed,
                showChildren: phpVars.ng_slicknav.ng_slicknav_child_links,
                allowParentLinks: phpVars.ng_slicknav.ng_slicknav_parent_links,
            });

 });