<?php
/*
TabGarb Beta
License : http://www.gnu.org/copyleft/gpl.html
Info : www.webgarb.com?s=TabGarb
Copyright (c) 2010 WebGarb 
------------
Lastupdate : 07-sep-2010
*/
define('WP_USE_THEMES', false);
require('../../../wp-blog-header.php'); 

ob_start();

echo get_option("tabgarb_theme");
 
$contents = ob_get_contents();

ob_end_clean();
header('HTTP/1.1 200 OK');
header("Content-Type: text/css");
header('Content-Encoding: gzip');
 print("\x1f\x8b\x08\x00\x00\x00\x00\x00");
 echo gzcompress($contents,9);
 exit();
?>