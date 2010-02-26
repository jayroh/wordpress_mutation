<?php
if(function_exists('register_sidebar'))
{
	//	register_sidebar();
}

wp_deregister_script('jquery');
wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"), false, '1.4.2'); 
wp_enqueue_script('jquery');

// ===========================================================================

/*
Plugin Name: Raw Code Injector
Plugin URI: http://www.thebinarypenguin.com
Description: Removes auto-formatting from text
Version: 0.1
Author: TheBinaryPenguin
Author URI: http://www.thebinarypenguin.com
*/

/**
 * Takes the content and splits it into pieces.
 *
 * The pieces can be either 
 *   (1) Text wrapped in a [raw][/raw] shortcode   
 * or
 *   (2) Text not wrapped in a [raw][/raw] shortcode
 *
 * The pieces retain their order in the content. 
 * 
 * Think of it as a crazy version of explode() where the delimiter 
 * is a regular expression and the delimiter is also returned in the array.
 *
 * Then loop over the pieces
 *     If the piece contains a [raw][/raw] shortcode then append the interior text to the new_content string
 * Else
 *     Apply the wpautop() and wptexturize() formatters to the piece and append it to the new_content string
 */
function my_formatter($content) {

	$new_content = '';
	
	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	
	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	
	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {
			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {
			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}
	return $new_content;
}

/* Remove the 2 main auto-formatters */
remove_filter('the_content',	'wpautop');
remove_filter('the_content',	'wptexturize');

/* Before displaying for viewing, apply this function */
add_filter('the_content', 'my_formatter', 99);

// ===========================================================================


?>