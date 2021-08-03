<?php

// Case Studies
function case_study_init() {
	$labels = array(
		'name'               => _x( 'Case Studies', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Case Study', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Case Studies', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Case Study', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'case study', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Case Study', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Case Study', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Case Study', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Case Study', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Case Studies', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Case Studies', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Case Studies:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No case studies found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No case studies found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'work', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

    register_post_type( 'case-study', $args );
}

add_action('init', 'case_study_init');


// Case Studies
function vacancy_init() {
        $labels = array(
                'name'               => _x( 'Vacancies', 'post type general name', 'your-plugin-textdomain' ),
                'singular_name'      => _x( 'Vacancy', 'post type singular name', 'your-plugin-textdomain' ),
                'menu_name'          => _x( 'Vacancies', 'admin menu', 'your-plugin-textdomain' ),
                'name_admin_bar'     => _x( 'Vacancy', 'add new on admin bar', 'your-plugin-textdomain' ),
                'add_new'            => _x( 'Add New', 'vacancy', 'your-plugin-textdomain' ),
                'add_new_item'       => __( 'Add New Vacancy', 'your-plugin-textdomain' ),
                'new_item'           => __( 'New Vacancy', 'your-plugin-textdomain' ),
                'edit_item'          => __( 'Edit Vacancy', 'your-plugin-textdomain' ),
                'view_item'          => __( 'View Vacancy', 'your-plugin-textdomain' ),
                'all_items'          => __( 'All Vacancies', 'your-plugin-textdomain' ),
                'search_items'       => __( 'Search Vacancies', 'your-plugin-textdomain' ),
                'parent_item_colon'  => __( 'Parent Vacancies:', 'your-plugin-textdomain' ),
                'not_found'          => __( 'No vacancies found.', 'your-plugin-textdomain' ),
                'not_found_in_trash' => __( 'No vacancies found in Trash.', 'your-plugin-textdomain' )
        );

        $args = array(
                'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'careers', 'with_front' => false ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        );

    register_post_type( 'vacancy', $args );
}

add_action('init', 'vacancy_init');

// Applications
function application_init() {
        $labels = array(
                'name'               => _x( 'Applications', 'post type general name', 'your-plugin-textdomain' ),
                'singular_name'      => _x( 'Application', 'post type singular name', 'your-plugin-textdomain' ),
                'menu_name'          => _x( 'Applications', 'admin menu', 'your-plugin-textdomain' ),
                'name_admin_bar'     => _x( 'Application', 'add new on admin bar', 'your-plugin-textdomain' ),
                'add_new'            => _x( 'Add New', 'application', 'your-plugin-textdomain' ),
                'add_new_item'       => __( 'Add New Application', 'your-plugin-textdomain' ),
                'new_item'           => __( 'New Application', 'your-plugin-textdomain' ),
                'edit_item'          => __( 'Edit Application', 'your-plugin-textdomain' ),
                'view_item'          => __( 'View Application', 'your-plugin-textdomain' ),
                'all_items'          => __( 'All Applications', 'your-plugin-textdomain' ),
                'search_items'       => __( 'Search Applications', 'your-plugin-textdomain' ),
                'parent_item_colon'  => __( 'Parent Applications:', 'your-plugin-textdomain' ),
                'not_found'          => __( 'No vacancies found.', 'your-plugin-textdomain' ),
                'not_found_in_trash' => __( 'No vacancies found in Trash.', 'your-plugin-textdomain' )
        );

        $args = array(
                'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
                'public'             => false,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'application' ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        );

    register_post_type( 'application', $args );
}


// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Category General Name', 'text_domain' ),
		'singular_name'              => _x( 'Category', 'Category Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Category', 'text_domain' ),
		'all_items'                  => __( 'All Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Category', 'text_domain' ),
		'update_item'                => __( 'Update Category', 'text_domain' ),
		'view_item'                  => __( 'View Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Categories', 'text_domain' ),
		'search_items'               => __( 'Search Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy( 'case-study-category', array( 'case-study' ), $args );

}

add_action( 'init', 'custom_taxonomy', 0 );

?>
