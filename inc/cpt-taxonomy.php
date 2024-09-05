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
    'template'           =>array(array('core/paragraph'),
                                        array('core/button')),
    'template_lock'      => 'all'
);

register_post_type( 'fwd-student', $args );

    // Register Staff
    $labels = array(
        'name'               => _x('Staffs', 'post type general name'),
        'singular_name'      => _x('Staff', 'post type singular name'),
        'menu_name'          => _x('Staffs', 'admin menu'),
        'name_admin_bar'     => _x('Staff', 'add new on admin bar'),
        'add_new'            => _x('Add New', 'staff'),
        'add_new_item'       => __('Add New Staff'),
        'new_item'           => __('New Staff'),
        'edit_item'          => __('Edit Staff'),
        'view_item'          => __('View Staff'),
        'all_items'          => __('All Staffs'),
        'search_items'       => __('Search Staffs'),
        'parent_item_colon'  => __('Parent Staffs:'),
        'not_found'          => __('No staffs found.'),
        'not_found_in_trash' => __('No staffs found in Trash.'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'fwd-staff'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 9,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array('title'),
        'template'           => array(array('core/pullquote')),
        'template_lock'      => 'all'
    );

    register_post_type('fwd-staff', $args);
}

add_action('init', 'fwd_register_custom_post_types');

// Add Role taxonomy
function fwd_register_taxonomies() {
    $labels = array(
        'name'              => _x('Role', 'taxonomy general name'),
        'singular_name'     => _x('Role', 'taxonomy singular name'),
        'search_items'      => __('Search Roles'),
        'all_items'         => __('All Role'),
        'parent_item'       => __('Parent Role'),
        'parent_item_colon' => __('Parent Role:'),
        'edit_item'         => __('Edit Role'),
        'view_item'         => __('View Role'),
        'update_item'       => __('Update Role'),
        'add_new_item'      => __('Add New Role'),
        'new_item_name'     => __('New Role Name'),
        'menu_name'         => __('Role'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'roles'),
    );

    register_taxonomy('fwd-role', array('fwd-staff'), $args);

}

add_action('init', 'fwd_register_taxonomies');