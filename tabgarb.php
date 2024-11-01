<?php
/*
Plugin Name: TabGarb
Plugin URI:  http://webgarb.com/?s=TabGarb
Description: This Plugin convert your simple page/post into javascript enable tab without knowledge of html, JavaScript, PHP very easly.  
Version: beta
Author: Webgarb
Author URI: http://Webgarb.com
*/
/*
TabGarb beta
License : http://www.gnu.org/copyleft/gpl.html
Info : www.webgarb.com?s=TabGarb
Copyright (c) 2010 WebGarb 
------------
Lastupdate : 07-sep-2010
*/      
register_activation_hook(__FILE__, 'tabgarb_int');add_filter('the_content', "tabgarb_parse_garb");add_filter('the_excerpt', "tabgarb_parse_garb");define("TABGARB_PLUGIN_URL",WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)));function tabgarb_int() {add_option("tabgarb_speed","fast");add_option("tabgarb_effect","none"); add_option("tabgarb_enable","1");add_option("tabgarb_debug","1"); add_option("tabgarb_theme",'#tabgarb
	{
	display:block;
	padding-bottom:8px;
	margin: 0;
	padding-left: 0px;
	}

#tabgarb li
	{
		margin: 0; 
		padding: 0;
  		display: inline;
  		list-style-type: none;
  	}
	
#tabgarb li a:link, #tabnav li a:visited
	{
	float: left;
	background: #f3f3f3;
	font-size: 14px;
	line-height: 14px;
	font-weight: bold;
	text-decoration: none;
	color: #666;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	padding-top: 8px;
	padding-right: 20px;
	padding-bottom: 8px;
	padding-left: 20px;
	margin-right: 8px;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: none;
	border-left-style: solid;
	border-top-color: #ccc;
	border-right-color: #ccc;
	border-bottom-color: #ccc;
	border-left-color: #ccc;
	}

#tabgarb li a:link.active, #tabnav li a:visited.active
	{
		border-bottom: 1px solid #fff;
		background: #fff;
		color: #333;
               margin-bottom:-2px
	}

#tabgarb li a:hover
	{
		background: #fff;
	}
.tabgarb_content {
       clear:both;
	display:none;
	border-size:1px;
	margin-top:-0px;
	border-top-width: 1px;
	border-bottom-width: 1px;
	border-top-style: solid;
	border-bottom-style: solid;
	border-top-color: #ccc;
	border-bottom-color: #ccc;
	padding-bottom: 10px;
}');return true;} function tabgarb_parse_garb( $content ) {if(is_page() || is_single() AND get_option("tabgarb_enable") == '1') { include"function.php";$tabcontent = '<link rel="stylesheet" type="text/css" href="'.TABGARB_PLUGIN_URL.'style.php" />';$tabcontent .= '<script src="'.TABGARB_PLUGIN_URL.'tabgarb.js" type="text/javascript" ></script>';$tabcontent .= '<script type="text/javascript">
 _tabgarb_load_jquery("'.TABGARB_PLUGIN_URL.'jquery.js");
</script>
';$tabs = tabgarb_get_menulist($content);if($tabs != "0") { if($tabs == "1") {$content = tabgarb_parse_error("TabGarb Parse Error .!").$content; } else { $tabcontent .= "\n<ul id=\"tabgarb\">";$act = ' ';foreach($tabs as $D) {if($D["active"] == "1" AND $act == ' ') {$act = 'class="active"';} else {$act = ' '; }$tabcontent .= ''."\n".' <li><a '.$act .' id="'.$D["e"].'" href="javascript:void(0)">'.$D["name"].'</a></li>'; } $tabcontent .= "\n</ul><div style=clear:both></div>"; $content = tabgarb_remove_tab_com($content); $act = ' ';foreach($tabs as $D) {$tab = $D["e"];if($D["active"] == "1" AND $act == ' ') {$act = 'style="display:block"';} else {$act = ' ';}$con =tabgarb_gettab_content($tab,$content);$error = false;switch($con) { case '1': $error = tabgarb_parse_error("TabGarb Error : \"$name\" Tab Not Found."); break; case '2': $error = tabgarb_parse_error("Tabgarb Error : Error While Parsing \"$name\" Tab."); break; case '3': $error = tabgarb_parse_error("Tabgarb Error : \"$name\" Tab Content does not exits."); break;}if($error) {$tabcontent = $error.$tabcontent;} else {$content = tabgarb_remove_tab_content($tab,$content); $tabcontent = $tabcontent."\n".'<div class="tabgarb_content" id="tabgarb-'.$tab.'" '.$act.'>'."\n".$con."\n".'</div>'."\n"; }} $loadscript = "\n".'<script type="text/javascript">
tabgarb_set("effect","'.get_option("tabgarb_effect").'");
tabgarb_set("speed","'.get_option("tabgarb_speed").'");
 _tabgarb();
</script>
';$content = $tabcontent.$content.$loadscript; } }}return $content;} function tabgarb_admin_setup() {include"tabgarb_admin.php";tabgarb_admin_page();} function tabgarb_admin_menu() {add_options_page('TabGarb Settings', 'TabGarb', 'manage_options', 'Tabgarb_WP', 'tabgarb_admin_setup');}add_action('admin_menu', 'tabgarb_admin_menu');

?>