/*
TabGarb Beta
License : http://www.gnu.org/copyleft/gpl.html
Info : www.webgarb.com?s=TabGarb
Copyright (c) 2010 WebGarb 
------------
Lastupdate : 07-sep-2010
*/
var tabgarb_is_hide = false; 
var tabgrab_effect = "fade";
var tabgarb_speed = "fast";

function tabgarb_set(name,value) {
switch(name)
		{
		case "effect":
	tabgrab_effect = value;
		  break;
		case "speed":
	tabgarb_speed = value;
		  break;

		}
}

function _tabgarb_load_jquery(URL) {
if (typeof jQuery == 'undefined') {  
 document.writeln("<script src=\""+URL+"\" type=\"text\/javascript\" language=\"javascript\"><\/script>") 
}

}



function _tabgarb() {
if(typeof jQuery == 'undefined'){
	setTimeout("_tabgarb()",10);
} else {
	jQuery("#tabgarb li").each(function(index) {
   jQuery(this).find("a").click(function() {
 
 var Tname = jQuery(this).attr('id');
 _tabgarb_close_all();
 jQuery(this).attr('class','active'); 
_tabgarb_show(Tname);  
 
   });
   
   
  });


	
}
	
}

function _tabgarb_close_all() {
	jQuery("#tabgarb li").each(function(index) {
	var Tname = jQuery(this).find("a").attr('id');
	jQuery(this).find("a").attr('class','');
    _tabgarb_hide(Tname);
	
	});
	
}


function _tabgarb_show(tab) {
_tabgarb_is_hide();
if(tabgarb_is_hide) {
if(jQuery("#tabgarb-"+tab).css('display') == 'none') {

	switch(tabgrab_effect)
		{
		case "slide":
	 jQuery("#tabgarb-"+tab).slideDown(tabgarb_speed);
		  break;
		case "fade":
	jQuery("#tabgarb-"+tab).fadeIn(tabgarb_speed);
		  break;
		case "zap":
	jQuery("#tabgarb-"+tab).show(tabgarb_speed);
		  break;
		case "none":
	jQuery("#tabgarb-"+tab).show();
		  break;

		}
  
  }
} else {
	  setTimeout(function() { _tabgarb_show(tab); },10);
}
}

function _tabgarb_hide(tab) {
switch(tabgrab_effect)
		{
		case "slide":
	 jQuery("#tabgarb-"+tab).slideUp(tabgarb_speed);
		  break;
		case "fade":
	jQuery("#tabgarb-"+tab).fadeOut(tabgarb_speed);
		  break;
		case "zap":
	jQuery("#tabgarb-"+tab).hide(tabgarb_speed);
		  break;
		case "none":
	jQuery("#tabgarb-"+tab).hide();
		  break;

		}
}


function _tabgarb_is_hide() {
tabgarb_is_hide = true;
	jQuery("#tabgarb li").each(function(index) {
	var Tname = jQuery(this).find("a").attr('id');
	
	if(jQuery("#tabgarb-"+Tname).css('display') != 'none') {

		tabgarb_is_hide = false;
	}
	
	});
}
