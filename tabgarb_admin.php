<?php
/*
TabGarb Beta
License : http://www.gnu.org/copyleft/gpl.html
Info : www.webgarb.com?s=TabGarb
Copyright (c) 2010 WebGarb 
------------
Lastupdate : 07-sep-2010
*/


function tabgarb_admin_page() { if (!current_user_can('manage_options')){wp_die( __('You do not have sufficient permissions to access this page.') );}?>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div>

<h2>TabGarb (Beta) <?php _e("Settings"); ?></h2>
<center><a href="http://webgarb.com/freebies/wordpress-plugin/tabgarb/" target="_blank" title="Visit tabGarb Home Page"><img src="<?php echo TABGARB_PLUGIN_URL."logo.png"; ?>" border="0"></a></center>
<?php $tabgarb_effects["slide"] = "Slide";$tabgarb_effects["fade"] = "Fade";$tabgarb_effects["zap"] = "Zap";$tabgarb_effects["none"] = "None"; $tabgarb_speed["fast"] = "Fast";$tabgarb_speed["slow"] = "Slow";$tabgarb_speed[""] = "Default"; if($_POST["tabgarb_effect"] != "") {$do = true;$tabgarb_error = array();if(!in_array($_POST["tabgarb_effect"],array("slide","fade","zap","none"))) {$do = false;$tabgarb_error[] = "Effect value is not valid.";} if(!in_array($_POST["tabgarb_speed"],array("fast","slow",""))) {$do = false;$tabgarb_error[] = "Speed value is not valid.";} if($_POST["tabgarb_theme"] == "") {$do = false;$tabgarb_error[] = "You can't leave Theme Blank.";}if(!$do) {foreach($tabgarb_error as $tabgarb_error) {echo "<div id='error' class='error fade'><p><b>"._($tabgarb_error)."</b></p></div>"; } } else {update_option("tabgarb_effect",$_POST["tabgarb_effect"]);update_option("tabgarb_speed",$_POST["tabgarb_speed"]);update_option("tabgarb_enable",((isset($_POST["tabgarb_enable"])?"1":"0")));update_option("tabgarb_debug",((isset($_POST["tabgarb_debug"])?"1":"0")));update_option("tabgarb_theme",$_POST["tabgarb_theme"]);echo "<div id='updated' class='updated fade'><p><b>"._("Setting Sucessfully Saved !")."</b></p></div>";}}?>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<table class="form-table">
<tr valign="top">
<th scope="row"><?php _e("Enable") ?> :<br />
<span class="description"><?php _e("TabGarb Can Render Tab ."); ?></span>
</th>
<td valign="top">
<input name="tabgarb_enable" type="checkbox" <?php if(get_option("tabgarb_enable") == "1") { echo 'checked'; } ?>/>

</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e("Debug") ?> :<br />
<span class="description"><?php _e("Display Tabgarb Tabs Rendering Errors ."); ?></span>
</th>
<td valign="top">
<input name="tabgarb_debug" type="checkbox" <?php if(get_option("tabgarb_debug") == "1") { echo 'checked'; } ?>/>

</td>
</tr>

<th scope="row"><?php _e("Tab Effect") ?> :<br />
<span class="description"><?php _e("TabGarb Tabs Content Changing Effect."); ?></span>
</th>
<td valign="top">

<select name="tabgarb_effect">
<?php foreach($tabgarb_effects as $effect => $effect_name) {echo '<option '.((get_option("tabgarb_effect") == $effect)?"selected='selected'":"").' value="'.$effect.'">'.$effect_name.' </option>'; } ?>
</select>

</td>
</tr>

<th scope="row"><?php _e("Tab Speed") ?> :<br />
<span class="description"><?php _e("TabGarb Tabs Content Changing Speed."); ?></span>
</th>
<td valign="top">

<select name="tabgarb_speed">
<?php foreach($tabgarb_speed as $speed => $speed_name) {echo '<option '.((get_option("tabgarb_speed") == $speed)?"selected='selected'":"").' value="'.$speed.'">'.$speed_name.' </option>'; } ?>
</select>

</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e("Theme") ?> :<br />
<span class="description"><?php _e("TabGarb Menu Style Theme.<br /> <a href=\"http://webgarb.com/freebies/wordpress-plugin/tabgarb/\" target=\"_blank\">Click Here</a> to Get More Themes. "); ?></span>
</th>
<td valing="top">
<textarea cols="70" rows="10" name="tabgarb_theme" tabindex="1" class="codepress css"><?php echo stripslashes(get_option("tabgarb_theme")); ?>
</textarea> 
</td>
</tr>


</table>
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>

<h3>Need Help ? Visit <a href="http://webgarb.com/freebies/wordpress-plugin/tabgarb/" target="_blank">TabGarb</a> Link : <a href="http://webgarb.com/freebies/wordpress-plugin/tabgarb/" target="_blank">www.webgarb.com/freebies/wordpress-plugin/tabgarb/</a></h3>


<span class="description"><a href="http://webgarb.com/freebies/wordpress-plugin/tabgarb/" target="_blank">TabGarb</a> &copy; Copyright 2010 Webgarb.com .<br />
<span>

<h2><?php _e("How to use ?"); ?> </h2>
<b><?php _e("Sample Easy Code"); ?> :</b>
<hr />

<pre><FONT COLOR=GREEN><I>&lt;!--tabgarb
tab1=Information
tab2=Download
tab3=Example=active
--&gt;</I></FONT><span class=cch1><font color=gray>
</font></span><FONT COLOR=GREEN><I>&lt;!--start=tab1--&gt;</I></FONT><span class=cch1><font color=gray>
</font></span><FONT COLOR=BLUE SIZE=+1>&lt;</FONT><FONT COLOR=RED><B>h1</B></FONT><FONT COLOR=BLUE SIZE=+1>&gt;</FONT><span class=cch1><font color=gray>Information Tab</font></span><FONT COLOR=BLUE SIZE=+1>&lt;</FONT><FONT COLOR=BLUE SIZE=+1>/</FONT><FONT COLOR=RED><B>h1</B></FONT><FONT COLOR=BLUE SIZE=+1>&gt;</FONT><span class=cch1><font color=gray>
Nulla sagittis convallis arcu. Sed sed nunc. Curabitur consequat. 
Quisque metus enim, venenatis fermentum, mollis in, porta et, nibh. 
Duis vulputate elit in elit. Mauris dictum libero id justo.
Fusce in est. Sed nec diam. Pellentesque habitant morbi tristique 
senectus et netus et malesuada fames ac turpis egestas. Quisque semper nibh eget nibh. 
Sed tempor. Fusce erat.
</font></span><FONT COLOR=GREEN><I>&lt;!--end=tab1--&gt;</I></FONT><span class=cch1><font color=gray><br />
</font></span><FONT COLOR=GREEN><I>&lt;!--start=tab2--&gt;</I></FONT><span class=cch1><font color=gray>
</font></span><FONT COLOR=BLUE SIZE=+1>&lt;</FONT><FONT COLOR=RED><B>h1</B></FONT><FONT COLOR=BLUE SIZE=+1>&gt;</FONT><span class=cch1><font color=gray>Download Tab</font></span><FONT COLOR=BLUE SIZE=+1>&lt;</FONT><FONT COLOR=BLUE SIZE=+1>/</FONT><FONT COLOR=RED><B>h1</B></FONT><FONT COLOR=BLUE SIZE=+1>&gt;</FONT><span class=cch1><font color=gray>
Vestibulum in mauris semper tortor interdum ultrices.
Sed vel lorem et justo laoreet bibendum. Donec dictum.
Etiam massa libero, lacinia at, commodo in, tincidunt a, purus.
Praesent volutpat eros quis enim blandit tincidunt.
</font></span><FONT COLOR=GREEN><I>&lt;!--end=tab2--&gt;</I></FONT><span class=cch1><font color=gray>

</font></span><FONT COLOR=GREEN><I>&lt;!--start=tab3--&gt;</I></FONT><span class=cch1><font color=gray>
</font></span><FONT COLOR=BLUE SIZE=+1>&lt;</FONT><FONT COLOR=RED><B>h1</B></FONT><FONT COLOR=BLUE SIZE=+1>&gt;</FONT><span class=cch1><font color=gray>Example Tab</font></span><FONT COLOR=BLUE SIZE=+1>&lt;</FONT><FONT COLOR=BLUE SIZE=+1>/</FONT><FONT COLOR=RED><B>h1</B></FONT><FONT COLOR=BLUE SIZE=+1>&gt;</FONT><span class=cch1><font color=gray>
semper tortor interdum ultrices.
Sed vel lorem et justo laoreet bibendum. Donec dictum.
Etiam massa libero, lacinia at, commodo in, tincidunt a, purus.
Praesent volutpat eros quis enim blandit tincidunt.ss
</font></span><FONT COLOR=GREEN><I>&lt;!--end=tab3--&gt;</I></FONT></pre>



</div>
<?php } ?>