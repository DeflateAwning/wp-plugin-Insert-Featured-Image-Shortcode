<?php
/*

Plugin Name: Add Post Thumbnail Shortcode
Plugin URI:  http://aahacreative.com/our-projects/wordpress-post-featured-image-shortcode/
Description: Adds a [post_thumbnail] shortcode for use with wordpress post thumbnails. Also accepts [post_thumbnail size=""]
Version: 1.4.0
Author: Aaron Harun
Author URI: http://aaron.md
Fork URI: https://github.com/DeflateAwning/wp-plugin-Insert-Featured-Image-Shortcode

*/

function post_thumbnail_shortcode($atts, $content='') {
	if(!function_exists('post_thumbnail_shortcode'))
		return;

	// Initialize $atts as an empty array if it's not already
	if (!is_array($atts)) {
		$atts = array();
	}

	// Assume the default size is 'large', if not specified
	if(!$atts['size']) {
		$atts['size'] = 'large';
	}

	return '<span class="post_thumbnail '.$atts['class'].'">'.get_the_post_thumbnail(null,$atts['size']).'</span>';
}

function post_thumbnail($str){
	$args = wp_parse_args($str);
	echo post_thumbnail_shortcode($args);
}

add_shortcode('post_thumbnail', 'post_thumbnail_shortcode');

?>
