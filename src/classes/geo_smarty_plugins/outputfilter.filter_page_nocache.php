<?php
//outputfilter.filter_page_nocache.php
##########GIT Build Data##########
## 
## File Changed In GIT Commit:
## 
##    6.0.7-2-gc953682
## 
##################################

//this smarty plugin is nice

function smarty_outputfilter_filter_page_nocache ($output, Smarty_Internal_Template $smarty)
{
	return geoAddon::triggerDisplay('filter_display_page_nocache',$output, geoAddon::FILTER);
}
