<?php
add_action( 'init', 'weaknesses_taxonomy' );
add_action( 'init', 'resistant_taxonomy' );
add_action( 'init', 'types_taxonomy' );

// Registrando Custom Taxonomy weaknesses
function weaknesses_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Debilidades', 'Taxonomy General Name', 'pokemons_plugin_dg' ),
		'singular_name'              => _x( 'Debilidad', 'Taxonomy Singular Name', 'pokemons_plugin_dg' ),
		'menu_name'                  => __( 'Debilidad', 'pokemons_plugin_dg' ),
		'all_items'                  => __( 'Todas las debilidades', 'pokemons_plugin_dg' ),
		'parent_item'                => __( 'Debilidad padre', 'pokemons_plugin_dg' ),
		'parent_item_colon'          => __( 'Debilidad:', 'pokemons_plugin_dg' ),
		'new_item_name'              => __( 'Nueva Debilidad', 'pokemons_plugin_dg' ),
		'add_new_item'               => __( 'Agregar Debilidad', 'pokemons_plugin_dg' ),
		'edit_item'                  => __( 'Editar', 'pokemons_plugin_dg' ),
		'update_item'                => __( 'Actualizar', 'pokemons_plugin_dg' ),
		'view_item'                  => __( 'Ver', 'pokemons_plugin_dg' ),
		'separate_items_with_commas' => __( 'Separar con comas', 'pokemons_plugin_dg' ),
		'add_or_remove_items'        => __( 'Agregar o quitar', 'pokemons_plugin_dg' ),
		'choose_from_most_used'      => __( 'Eleguir de más usado', 'pokemons_plugin_dg' ),
		'popular_items'              => __( 'Populares', 'pokemons_plugin_dg' ),
		'search_items'               => __( 'Buscar', 'pokemons_plugin_dg' ),
		'not_found'                  => __( 'No encontrado', 'pokemons_plugin_dg' ),
		'no_terms'                   => __( 'Sin Items', 'pokemons_plugin_dg' ),
		'items_list'                 => __( 'Lista de debilidades', 'pokemons_plugin_dg' ),
		'items_list_navigation'      => __( 'Lista de navegación', 'pokemons_plugin_dg' ),
	);
	$rewrite = array(
		'slug'                       => 'weaknesses',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
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
		'name'                       => _x( 'Fortalezas', 'Taxonomy General Name', 'pokemons_plugin_dg' ),
		'singular_name'              => _x( 'Fortaleza', 'Taxonomy Singular Name', 'pokemons_plugin_dg' ),
		'menu_name'                  => __( 'Fortaleza', 'pokemons_plugin_dg' ),
		'all_items'                  => __( 'Todas las fortalezas', 'pokemons_plugin_dg' ),
		'parent_item'                => __( 'Fortaleza padre', 'pokemons_plugin_dg' ),
		'parent_item_colon'          => __( 'Fortaleza:', 'pokemons_plugin_dg' ),
		'new_item_name'              => __( 'Nueva Fortaleza', 'pokemons_plugin_dg' ),
		'add_new_item'               => __( 'Agregar Fortaleza', 'pokemons_plugin_dg' ),
		'edit_item'                  => __( 'Editar', 'pokemons_plugin_dg' ),
		'update_item'                => __( 'Actualizar', 'pokemons_plugin_dg' ),
		'view_item'                  => __( 'Ver', 'pokemons_plugin_dg' ),
		'separate_items_with_commas' => __( 'Separar con comas', 'pokemons_plugin_dg' ),
		'add_or_remove_items'        => __( 'Agregar o quitar', 'pokemons_plugin_dg' ),
		'choose_from_most_used'      => __( 'Eleguir de más usado', 'pokemons_plugin_dg' ),
		'popular_items'              => __( 'Populares', 'pokemons_plugin_dg' ),
		'search_items'               => __( 'Buscar', 'pokemons_plugin_dg' ),
		'not_found'                  => __( 'No encontrado', 'pokemons_plugin_dg' ),
		'no_terms'                   => __( 'Sin Items', 'pokemons_plugin_dg' ),
		'items_list'                 => __( 'Lista de fortalezas', 'pokemons_plugin_dg' ),
		'items_list_navigation'      => __( 'Lista de navegación', 'pokemons_plugin_dg' ),
	);
	$rewrite = array(
		'slug'                       => 'resistant',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
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
		'name'                       => _x( 'Tipos', 'Taxonomy General Name', 'pokemons_plugin_dg' ),
		'singular_name'              => _x( 'Tipo', 'Taxonomy Singular Name', 'pokemons_plugin_dg' ),
		'menu_name'                  => __( 'Tipo', 'pokemons_plugin_dg' ),
		'all_items'                  => __( 'Todas las tipos', 'pokemons_plugin_dg' ),
		'parent_item'                => __( 'Tipo padre', 'pokemons_plugin_dg' ),
		'parent_item_colon'          => __( 'Tipo:', 'pokemons_plugin_dg' ),
		'new_item_name'              => __( 'Nuevo Tipo', 'pokemons_plugin_dg' ),
		'add_new_item'               => __( 'Agregar Tipo', 'pokemons_plugin_dg' ),
		'edit_item'                  => __( 'Editar', 'pokemons_plugin_dg' ),
		'update_item'                => __( 'Actualizar', 'pokemons_plugin_dg' ),
		'view_item'                  => __( 'Ver', 'pokemons_plugin_dg' ),
		'separate_items_with_commas' => __( 'Separar con comas', 'pokemons_plugin_dg' ),
		'add_or_remove_items'        => __( 'Agregar o quitar', 'pokemons_plugin_dg' ),
		'choose_from_most_used'      => __( 'Eleguir de más usado', 'pokemons_plugin_dg' ),
		'popular_items'              => __( 'Populares', 'pokemons_plugin_dg' ),
		'search_items'               => __( 'Buscar', 'pokemons_plugin_dg' ),
		'not_found'                  => __( 'No encontrado', 'pokemons_plugin_dg' ),
		'no_terms'                   => __( 'Sin Items', 'pokemons_plugin_dg' ),
		'items_list'                 => __( 'Lista de tipos', 'pokemons_plugin_dg' ),
		'items_list_navigation'      => __( 'Lista de navegación', 'pokemons_plugin_dg' ),
	);
	$rewrite = array(
		'slug'                       => 'types',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
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
