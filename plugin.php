<?php
/**
 * Plugin Name: WP REST API add permalink argument
 * Description: Filter pages by their permalinks (including nested).
 * Author: Felipe Medina
 * Author URI: http://github.com/fmedinac
 * Version: 0.1
 * License: MIT
 **/

add_action( 'rest_api_init', 'rest_api_permalink' );

 /**
  * Add the necessary filter to each post type
  **/
function rest_api_permalink() {
	foreach ( get_post_types( array( 'show_in_rest' => true ), 'objects' ) as $post_type ) {
		add_filter( 'rest_' . $post_type->name . '_query', 'rest_api_permalink_add_param', 10, 2 );
	}
}

/**
 * Add the post id parameter based on the permalink
 *
 * @param  array           $args    The query arguments.
 * @param  WP_REST_Request $request Full details about the request.
 * @return array $args.
 **/
function rest_api_permalink_add_param( $args, $request ) {
	$permalink = $request['permalink'];

	if (!$permalink) {
		return $args;
	}

	$args['p'] = url_to_postid($permalink);
	
	return $args;
}
