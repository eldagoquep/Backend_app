<?php

add_action( 'init', 'weaknesses_taxonomy' );
add_action( 'init', 'resistant_taxonomy' );
add_action( 'init', 'pokemon_types_taxonomy' );

// Registrando Custom Taxonomy weaknesses
function weaknesses_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Debilidades', 'Taxonomy General Name', 'pokemons_plugin' ),
		'singular_name'              => _x( 'Debilidad', 'Taxonomy Singular Name', 'pokemons_plugin' ),
		'menu_name'                  => __( 'Debilidad', 'pokemons_plugin' ),
		'all_items'                  => __( 'Todas las debilidades', 'pokemons_plugin' ),
		'parent_item'                => __( 'Debilidad padre', 'pokemons_plugin' ),
		'parent_item_colon'          => __( 'Debilidad:', 'pokemons_plugin' ),
		'new_item_name'              => __( 'Nueva Debilidad', 'pokemons_plugin' ),
		'add_new_item'               => __( 'Agregar Debilidad', 'pokemons_plugin' ),
		'edit_item'                  => __( 'Editar', 'pokemons_plugin' ),
		'update_item'                => __( 'Actualizar', 'pokemons_plugin' ),
		'view_item'                  => __( 'Ver', 'pokemons_plugin' ),
		'separate_items_with_commas' => __( 'Separar con comas', 'pokemons_plugin' ),
		'add_or_remove_items'        => __( 'Agregar o quitar', 'pokemons_plugin' ),
		'choose_from_most_used'      => __( 'Eleguir de más usado', 'pokemons_plugin' ),
		'popular_items'              => __( 'Populares', 'pokemons_plugin' ),
		'search_items'               => __( 'Buscar', 'pokemons_plugin' ),
		'not_found'                  => __( 'No encontrado', 'pokemons_plugin' ),
		'no_terms'                   => __( 'Sin Items', 'pokemons_plugin' ),
		'items_list'                 => __( 'Lista de debilidades', 'pokemons_plugin' ),
		'items_list_navigation'      => __( 'Lista de navegación', 'pokemons_plugin' ),
	);
	$rewrite = array(
		'slug'                       => 'pokemon-weakness',
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
	register_taxonomy( 'pokemon-weakness', array( 'pokemon' ), $args );

}

// Registrando Custom Taxonomy resistant
function resistant_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Fortalezas', 'Taxonomy General Name', 'pokemons_plugin' ),
		'singular_name'              => _x( 'Fortaleza', 'Taxonomy Singular Name', 'pokemons_plugin' ),
		'menu_name'                  => __( 'Fortaleza', 'pokemons_plugin' ),
		'all_items'                  => __( 'Todas las fortalezas', 'pokemons_plugin' ),
		'parent_item'                => __( 'Fortaleza padre', 'pokemons_plugin' ),
		'parent_item_colon'          => __( 'Fortaleza:', 'pokemons_plugin' ),
		'new_item_name'              => __( 'Nueva Fortaleza', 'pokemons_plugin' ),
		'add_new_item'               => __( 'Agregar Fortaleza', 'pokemons_plugin' ),
		'edit_item'                  => __( 'Editar', 'pokemons_plugin' ),
		'update_item'                => __( 'Actualizar', 'pokemons_plugin' ),
		'view_item'                  => __( 'Ver', 'pokemons_plugin' ),
		'separate_items_with_commas' => __( 'Separar con comas', 'pokemons_plugin' ),
		'add_or_remove_items'        => __( 'Agregar o quitar', 'pokemons_plugin' ),
		'choose_from_most_used'      => __( 'Eleguir de más usado', 'pokemons_plugin' ),
		'popular_items'              => __( 'Populares', 'pokemons_plugin' ),
		'search_items'               => __( 'Buscar', 'pokemons_plugin' ),
		'not_found'                  => __( 'No encontrado', 'pokemons_plugin' ),
		'no_terms'                   => __( 'Sin Items', 'pokemons_plugin' ),
		'items_list'                 => __( 'Lista de fortalezas', 'pokemons_plugin' ),
		'items_list_navigation'      => __( 'Lista de navegación', 'pokemons_plugin' ),
	);
	$rewrite = array(
		'slug'                       => 'pokemon-resistant',
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
	register_taxonomy( 'pokemon-resistant', array( 'pokemon' ), $args );

}


// Registrando Custom Taxonomy types
function pokemon_types_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Tipos', 'Taxonomy General Name', 'pokemons_plugin' ),
		'singular_name'              => _x( 'Tipo', 'Taxonomy Singular Name', 'pokemons_plugin' ),
		'menu_name'                  => __( 'Tipo', 'pokemons_plugin' ),
		'all_items'                  => __( 'Todas las tipos', 'pokemons_plugin' ),
		'parent_item'                => __( 'Tipo padre', 'pokemons_plugin' ),
		'parent_item_colon'          => __( 'Tipo:', 'pokemons_plugin' ),
		'new_item_name'              => __( 'Nuevo Tipo', 'pokemons_plugin' ),
		'add_new_item'               => __( 'Agregar Tipo', 'pokemons_plugin' ),
		'edit_item'                  => __( 'Editar', 'pokemons_plugin' ),
		'update_item'                => __( 'Actualizar', 'pokemons_plugin' ),
		'view_item'                  => __( 'Ver', 'pokemons_plugin' ),
		'separate_items_with_commas' => __( 'Separar con comas', 'pokemons_plugin' ),
		'add_or_remove_items'        => __( 'Agregar o quitar', 'pokemons_plugin' ),
		'choose_from_most_used'      => __( 'Eleguir de más usado', 'pokemons_plugin' ),
		'popular_items'              => __( 'Populares', 'pokemons_plugin' ),
		'search_items'               => __( 'Buscar', 'pokemons_plugin' ),
		'not_found'                  => __( 'No encontrado', 'pokemons_plugin' ),
		'no_terms'                   => __( 'Sin Items', 'pokemons_plugin' ),
		'items_list'                 => __( 'Lista de tipos', 'pokemons_plugin' ),
		'items_list_navigation'      => __( 'Lista de navegación', 'pokemons_plugin' ),
	);
	$rewrite = array(
		'slug'                       => 'pokemon-type',
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
	register_taxonomy( 'pokemon-type', array( 'pokemon' ), $args );

}
