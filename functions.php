<?php
function ukrops_homemades_enqueue_styles() {

    $parent_style = 'parent-style'; // This is for general Ukrops theme styling

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.min.css' );
  	wp_enqueue_style( 'ukrops-style', get_stylesheet_directory_uri() . '/style.min.css');
}

add_action( 'wp_enqueue_scripts', 'ukrops_homemades_enqueue_styles' );

function remove_page_templates( $pages_templates ) {

    unset($pages_templates['templates/blog.php']);
    unset($pages_templates['templates/careers.php']);
    unset($pages_templates['templates/community.php']);
    unset($pages_templates['templates/food-team.php']);
    unset($pages_templates['templates/order-online.php']);
    unset($pages_templates['templates/our-story.php']);

    return $pages_templates;
}
add_filter( 'theme_page_templates', 'remove_page_templates' );

function create_product_taxonomy() {
	$labels = array(
		'name'                           => 'Products',
		'singular_name'                  => 'Product',
		'search_items'                   => 'Search Products',
		'all_items'                      => 'All Products',
		'edit_item'                      => 'Edit Product',
		'update_item'                    => 'Update Product',
		'add_new_item'                   => 'Add New Product',
		'new_item_name'                  => 'New Product Name',
		'menu_name'                      => 'Products',
		'view_item'                      => 'View Product',
		'popular_items'                  => 'Popular Product',
		'separate_items_with_commas'     => 'Separate products with commas',
		'add_or_remove_items'            => 'Add or remove products',
		'choose_from_most_used'          => 'Choose from the most used products',
		'not_found'                      => 'No products found'
	);

	register_taxonomy(
		'product',
		'page',
		array(
			'label' => __( 'Product' ),
			'hierarchical' 	=> true,
      'with_front'    => true,
			'slug' 					=> 'products',
			'labels' 				=> $labels
		)
	);

	flush_rewrite_rules();
}

add_action( 'init', 'create_product_taxonomy' );

?>
