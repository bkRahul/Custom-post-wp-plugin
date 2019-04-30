<?php
/**
 * @package learnWp
 * @version 1
 *
/*
Plugin Name: Casino Reviews Custom Post
Plugin URI: http://wordpress.org/plugins/plugin101/
Description: Custom Post for Casino Reviews.
Author: Rahul bk
Version: 1.0.0
Author URI: http://rahulsatya1068gmail.com
*/


// If file is called directly
defined('ABSPATH') or die('You are not allowed here');


class casinoReviewPost
{

    function __construct() {
        add_action( 'init', array( $this, 'create_casino_reviews' ) );
    }

    // activation
    function activate() {
        $this->create_casino_reviews();
        flush_rewrite_rules();
    }


    // deactivation
    function deactivate() {
        flush_rewrite_rules();
    }


    function create_casino_reviews() {

        $labels = array(
            'name' => 'Casino Reviews',
            'singular_name' => 'Casino Review',
            'add_new' => 'Add New',
            'add_new_item' => 'Add Casino Review',
            'all_items' => 'All Reviews',
            'edit' => 'Edit',
            'edit_item' => 'Edit Casino Review',
            'new_item' => 'New Casino Review',
            'view' => 'View',
            'view_item' => 'View Review',
            'search_items' => 'Search Casino Reviews',
            'not_found' => 'No Casino Reviews found',
            'not_found_in_trash' => 'No Casino Reviews found in Trash',
            'parent' => 'Parent Casino Review'
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'revisions',
            ),
            'taxonomies' => array('category', 'post_tag'),
            'menu_position' => 5,
            'exclude_from_search' => false
        );

register_post_type( 'reviews', $args );

   }

}

if( class_exists( 'casinoReviewPost' ) ) {

    $casinoReviewPost = new casinoReviewPost();
}


register_activation_hook( __FILE__, array( $casinoReviewPost, 'activate' ) );

register_deactivation_hook( __FILE__, array( $casinoReviewPost, 'deactivate' ) );