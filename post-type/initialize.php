<?php

// Registrando Custom Post Type
function pokemons_post_type() {

	$labels = array(
		'name'                  => _x( 'Pokemons', 'Post Type General Name', 'pokemons_plugin_dg' ),
		'singular_name'         => _x( 'Pokemon', 'Post Type Singular Name', 'pokemons_plugin_dg' ),
		'menu_name'             => __( 'Pokemons', 'pokemons_plugin_dg' ),
		'name_admin_bar'        => __( 'Pokemons', 'pokemons_plugin_dg' ),
		'archives'              => __( 'Archivo de pokemons', 'pokemons_plugin_dg' ),
		'attributes'            => __( 'Atributo de pokemon', 'pokemons_plugin_dg' ),
		'parent_item_colon'     => __( 'Pokedex', 'pokemons_plugin_dg' ),
		'all_items'             => __( 'Todos', 'pokemons_plugin_dg' ),
		'add_new_item'          => __( 'Agregar nuevo', 'pokemons_plugin_dg' ),
		'add_new'               => __( 'Agregar Nuevo', 'pokemons_plugin_dg' ),
		'new_item'              => __( 'Nuevo', 'pokemons_plugin_dg' ),
		'edit_item'             => __( 'Editar pokemon', 'pokemons_plugin_dg' ),
		'update_item'           => __( 'Actualizar', 'pokemons_plugin_dg' ),
		'view_item'             => __( 'Ver pokemon', 'pokemons_plugin_dg' ),
		'view_items'            => __( 'Ver pokemons', 'pokemons_plugin_dg' ),
		'search_items'          => __( 'Buscar pokemon', 'pokemons_plugin_dg' ),
		'not_found'             => __( 'No encontrado', 'pokemons_plugin_dg' ),
		'not_found_in_trash'    => __( 'No encontrado en papelera', 'pokemons_plugin_dg' ),
		'featured_image'        => __( 'Agregar imagen', 'pokemons_plugin_dg' ),
		'set_featured_image'    => __( 'Asignar imagen destacada', 'pokemons_plugin_dg' ),
		'remove_featured_image' => __( 'Quitar imagen destacada', 'pokemons_plugin_dg' ),
		'use_featured_image'    => __( 'Usar imagen destacada', 'pokemons_plugin_dg' ),
		'insert_into_item'      => __( 'Agregar a pokemon', 'pokemons_plugin_dg' ),
		'uploaded_to_this_item' => __( 'Subir pokemon', 'pokemons_plugin_dg' ),
		'items_list'            => __( 'Lista de pokemons', 'pokemons_plugin_dg' ),
		'items_list_navigation' => __( 'Navegacion de pokemons', 'pokemons_plugin_dg' ),
		'filter_items_list'     => __( 'Filtro de pokemon', 'pokemons_plugin_dg' ),
	);
	$rewrite = array(
		'slug'                  => 'pokemon',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Pokemon', 'pokemons_plugin_dg' ),
		'description'           => __( 'Pokemons Description', 'pokemons_plugin_dg' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'pokemon-weakness', 'pokemon-resistant', ' pokemon-type'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'https://www.flaticon.es/icono-gratis/pokeball_246282',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => 'true',
    'register_meta_box_cb'  => 'wpt_add_pokemons_metaboxes',
	);
	register_post_type( 'pokemon', $args );

}
add_action( 'init', 'pokemons_post_type', 0 );
