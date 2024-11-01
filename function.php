<?php
/*
TabGarb Beta
License : http://www.gnu.org/copyleft/gpl.html
Info : www.webgarb.com?s=TabGarb
Copyright (c) 2010 WebGarb 
------------
Lastupdate : 07-sep-2010
*/

function tabgarb_get_menulist($content) { $strip = explode("<!--tabgarb",$content);$c = $strip[1]; if($c == "") {return '0'; } else { unset($strip); $strip = explode("-->",$c); $c = $strip[0]; if($c == ""){return "1"; } else { $c = str_replace("<br />","",$c);$list = explode("\n",$c);$tab = Array();foreach($list as $list) { if($list != "") {$x = explode("=",$list);$tab[$x[0]]["e"] = $x[0];$tab[$x[0]]["name"] = $x[1]; if(strtolower($x[2]) == "active") {$tab[$x[0]]["active"] = "1";} }}return $tab; }} } function tabgarb_parse_error($error) {if(get_option("tabgarb_debug") == "1") { return '
	<div clsss="error"><p><b>'._($error).'</b></p></div>
	'; }} function tabgarb_remove_tab_com($content) {$content = preg_replace("/<!--tabgarb(.*)-->/Uis", '', $content); return $content; }function tabgarb_remove_tab_content($tab,$content) {$content = preg_replace("/<!--start=".$tab."-->(.*)<!--end=".$tab."-->/Uis", '', $content);return $content;}function tabgarb_gettab_content($tab,$content){$FIND = strpos($content,"<!--start=".$tab."-->");if($FIND == false) {return '1'; } $C = explode("<!--start=".$tab."-->",$content); if($C[1] !== "") { $FIND = strpos($C[1],"<!--end=".$tab."-->"); if($FIND == false) {return '2'; } $G = explode("<!--end=".$tab."-->",$C[1]);if($G[0] == "") {return '3'; } return $G[0];} else {return '1'; } }

?>