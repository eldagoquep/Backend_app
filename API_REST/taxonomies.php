<?php
add_action( 'init', 'weaknesses_taxonomy' );
add_action( 'init', 'resistant_taxonomy' );
add_action( 'init', 'types_taxonomy' );

// Registrando Custom Taxonomy weaknesses
function weaknesses_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Debilidades', 'Taxonomy General Name', 'weaknesses_domain' ),
		'singular_name'              => _x( 'Debilidad', 'Taxonomy Singular Name', 'weaknesses_domain' ),
		'menu_name'                  => __( 'Debilidad', 'weaknesses_domain' ),
		'all_items'                  => __( 'Todas las debilidades', 'weaknesses_domain' ),
		'parent_item'                => __( 'Debilidad padre', 'weaknesses_domain' ),
		'parent_item_colon'          => __( 'Debilidad:', 'weaknesses_domain' ),
		'new_item_name'              => __( 'Nueva Debilidad', 'weaknesses_domain' ),
		'add_new_item'               => __( 'Agregar Debilidad', 'weaknesses_domain' ),
		'edit_item'                  => __( 'Editar', 'weaknesses_domain' ),
		'update_item'                => __( 'Actualizar', 'weaknesses_domain' ),
		'view_item'                  => __( 'Ver', 'weaknesses_domain' ),
		'separate_items_with_commas' => __( 'Separar con comas', 'weaknesses_domain' ),
		'add_or_remove_items'        => __( 'Agregar o quitar', 'weaknesses_domain' ),
		'choose_from_most_used'      => __( 'Eleguir de más usado', 'weaknesses_domain' ),
		'popular_items'              => __( 'Populares', 'weaknesses_domain' ),
		'search_items'               => __( 'Buscar', 'weaknesses_domain' ),
		'not_found'                  => __( 'No encontrado', 'weaknesses_domain' ),
		'no_terms'                   => __( 'Sin Items', 'weaknesses_domain' ),
		'items_list'                 => __( 'Lista de debilidades', 'weaknesses_domain' ),
		'items_list_navigation'      => __( 'Lista de navegación', 'weaknesses_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'weaknesses',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'update_count_callback'      => 'wpt_weaknesses',
		'show_in_rest'               => true,
	);
	register_taxonomy( 'weaknesses', array( 'pokemons_post_type' ), $args );

}

// Registrando Custom Taxonomy resistant
function resistant_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Fortalezas', 'Taxonomy General Name', 'resistant_domain' ),
		'singular_name'              => _x( 'Fortaleza', 'Taxonomy Singular Name', 'resistant_domain' ),
		'menu_name'                  => __( 'Fortaleza', 'resistant_domain' ),
		'all_items'                  => __( 'Todas las fortalezas', 'resistant_domain' ),
		'parent_item'                => __( 'Fortaleza padre', 'resistant_domain' ),
		'parent_item_colon'          => __( 'Fortaleza:', 'resistant_domain' ),
		'new_item_name'              => __( 'Nueva Fortaleza', 'resistant_domain' ),
		'add_new_item'               => __( 'Agregar Fortaleza', 'resistant_domain' ),
		'edit_item'                  => __( 'Editar', 'resistant_domain' ),
		'update_item'                => __( 'Actualizar', 'resistant_domain' ),
		'view_item'                  => __( 'Ver', 'resistant_domain' ),
		'separate_items_with_commas' => __( 'Separar con comas', 'resistant_domain' ),
		'add_or_remove_items'        => __( 'Agregar o quitar', 'resistant_domain' ),
		'choose_from_most_used'      => __( 'Eleguir de más usado', 'resistant_domain' ),
		'popular_items'              => __( 'Populares', 'resistant_domain' ),
		'search_items'               => __( 'Buscar', 'resistant_domain' ),
		'not_found'                  => __( 'No encontrado', 'resistant_domain' ),
		'no_terms'                   => __( 'Sin Items', 'resistant_domain' ),
		'items_list'                 => __( 'Lista de fortalezas', 'resistant_domain' ),
		'items_list_navigation'      => __( 'Lista de navegación', 'resistant_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'resistant',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'update_count_callback'      => 'wpt_resistant',
		'show_in_rest'               => true,
	);
	register_taxonomy( 'resistant', array( 'pokemons_post_type' ), $args );

}

// Registrando Custom Taxonomy types
function types_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Tipos', 'Taxonomy General Name', 'types_domain' ),
		'singular_name'              => _x( 'Tipo', 'Taxonomy Singular Name', 'types_domain' ),
		'menu_name'                  => __( 'Tipo', 'types_domain' ),
		'all_items'                  => __( 'Todas las tipos', 'types_domain' ),
		'parent_item'                => __( 'Tipo padre', 'types_domain' ),
		'parent_item_colon'          => __( 'Tipo:', 'types_domain' ),
		'new_item_name'              => __( 'Nuevo Tipo', 'types_domain' ),
		'add_new_item'               => __( 'Agregar Tipo', 'types_domain' ),
		'edit_item'                  => __( 'Editar', 'types_domain' ),
		'update_item'                => __( 'Actualizar', 'types_domain' ),
		'view_item'                  => __( 'Ver', 'types_domain' ),
		'separate_items_with_commas' => __( 'Separar con comas', 'types_domain' ),
		'add_or_remove_items'        => __( 'Agregar o quitar', 'types_domain' ),
		'choose_from_most_used'      => __( 'Eleguir de más usado', 'types_domain' ),
		'popular_items'              => __( 'Populares', 'types_domain' ),
		'search_items'               => __( 'Buscar', 'types_domain' ),
		'not_found'                  => __( 'No encontrado', 'types_domain' ),
		'no_terms'                   => __( 'Sin Items', 'types_domain' ),
		'items_list'                 => __( 'Lista de tipos', 'types_domain' ),
		'items_list_navigation'      => __( 'Lista de navegación', 'types_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'types',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'update_count_callback'      => 'wpt_types',
		'show_in_rest'               => true,
	);
	register_taxonomy( 'types', array( 'pokemons_post_type' ), $args );

}
