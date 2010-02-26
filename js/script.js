jQuery(document).ready(function(){
	prettyPrint();
	
	// images in anchor tags shouldn't have the default hover occur.
	jQuery('a > img').parent().addClass('no-hover');
});