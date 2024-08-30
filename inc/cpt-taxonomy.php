<?php
function fwd_register_custom_post_types() {

//register students
$labels = array(
    'name'               => _x( 'Students', 'post type general name'  ),
    'singular_name'      => _x( 'Student', 'post type singular name'  ),
    'menu_name'          => _x( 'Students', 'admin menu'  ),
    'name_admin_bar'     => _x( 'Student', 'add new on admin bar' ),
    'add_new'            => _x( 'Add New', 'student' ),
    'add_new_item'       => __( 'Add New Student' ),
    'new_item'           => __( 'New Student' ),
    'edit_item'          => __( 'Edit Student' ),
    'view_item'          => __( 'View Student'  ),
    'all_items'          => __( 'All Students' ),
    'search_items'       => __( 'Search Students' ),
    'parent_item_colon'  => __( 'Parent Students:' ),
    'not_found'          => __( 'No students found.' ),
    'not_found_in_trash' => __( 'No students found in Trash.' ),
);
    
$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'students' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => 7,
    'menu_icon'          => 'dashicons-heart',
    'supports'           => array( 'title', 'editor' ),
    'template'           => array( array( 'core/pullquote' ) ),
    'template_lock'      => 'all'
);

register_post_type( 'fwd-student', $args );
}


add_action( 'init', 'fwd_register_custom_post_types' );