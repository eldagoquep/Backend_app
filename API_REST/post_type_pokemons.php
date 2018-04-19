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
		'slug'                  => 'pokemons',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Pokemon', 'pokemons_plugin_dg' ),
		'description'           => __( 'Pokemons Description', 'pokemons_plugin_dg' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'post-formats' ),
		'taxonomies'            => array( 'weaknesses_taxonomy', 'resistant_taxonomy', ' types_taxonomy'),
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
    'register_meta_box_cb'  => 'wpt_add_pokemons_metaboxes',
	);
	register_post_type( 'pokemons_post_type', $args );

}
add_action( 'init', 'pokemons_post_type', 0 );

//Registro de metafields
add_action( 'init', 'pokemons_register_meta_fields' );
function pokemons_register_meta_fields() {

register_meta( 'post',
               'cyb_weaknesses',
               [
                 'description'      => _x( 'Weaknesses', 'meta description', 'pokemons_plugin_dg' ),
                 'single'           => false,
                 'sanitize_callback' => 'cyb_sanitize_checkbox_values',
                 'auth_callback'     => 'cyb_custom_fields_auth_callback'
               ]
  );
register_meta( 'post',
               'cyb_resistant',
               [
                 'description'      => _x( 'Resistant', 'meta description', 'pokemons_plugin_dg' ),
                 'single'           => false,
                 'sanitize_callback' => 'cyb_sanitize_checkbox_values',
                 'auth_callback'     => 'cyb_custom_fields_auth_callback'
               ]
  );
register_meta( 'post',
               'cyb_types',
               [
                 'description'      => _x( 'Types', 'meta description', 'pokemons_plugin_dg' ),
                 'single'           => false,
                 'sanitize_callback' => 'cyb_sanitize_checkbox_values',
                 'auth_callback'     => 'cyb_custom_fields_auth_callback'
               ]
  );
}

function cyb_sanitize_checkbox_values( $value ) {
  // Si hay algún valor, el checbox fue seleccionado
  if( ! empty( $value ) ) {
    return 1;
  } else {
    return 0;
  }
}

function cyb_custom_fields_auth_callback( $allowed, $meta_key, $post_id, $user_id, $cap, $caps ) {
  if( 'post' == get_post_type( $post_id ) && current_user_can( 'edit_post', $post_id ) ) {
    $allowed = true;
  } else {
    $allowed = false;
  }
  return $allowed;
}

//registro de metaboxes
add_action( 'add_meta_boxes', 'wpt_add_pokemons_metaboxes' );

function wpt_add_pokemons_metaboxes() {

  //debilidades
  add_meta_box(
      'wpt_weaknesses',
      'weaknesses',
      'wpt_weaknesses',
      'debilidades',
      'post',
      'normal',
      'default'
    );
  //resistente
  add_meta_box(
      'wpt_resistant',
      'resistant',
      'wpt_resistant',
      'resistente',
      'post',
      'normal',
      'default'
    );
  //tipos
  add_meta_box(
      'wpt_types',
      'types',
      'wpt_types',
      'tipos',
      'post',
      'normal',
      'default'
    );

}

//hace el llamado de para el pintado de datos de debilidades
function wpt_weaknesses( $post ) {

    $valores = get_post_custom( $post->ID );
    $bug = isset( $valores['bug'] ) ? esc_attr( $valores['bug'][0] ) : '';
    $Dragon = isset( $valores['Dragon'] ) ? esc_attr( $valores['Dragon'][0] ) : '';
    $Ice = isset( $valores['Ice'] ) ? esc_attr( $valores['Ice'][0] ) : '';
    $Fighting = isset( $valores['Fighting'] ) ? esc_attr( $valores['Fighting'][0] ) : '';
    $Fire = isset( $valores['Fire'] ) ? esc_attr( $valores['Fire'][0] ) : '';
    $Flying = isset( $valores['Flying'] ) ? esc_attr( $valores['Flying'][0] ) : '';
    $Grass = isset( $valores['Grass'] ) ? esc_attr( $valores['Grass'][0] ) : '';
    $Ghost = isset( $valores['Ghost'] ) ? esc_attr( $valores['Ghost'][0] ) : '';
    $Ground = isset( $valores['Ground'] ) ? esc_attr( $valores['Ground'][0] ) : '';
    $Electric = isset( $valores['Electric'] ) ? esc_attr( $valores['Electric'][0] ) : '';
    $Normal = isset( $valores['Normal'] ) ? esc_attr( $valores['Normal'][0] ) : '';
    $Poison = isset( $valores['Poison'] ) ? esc_attr( $valores['Poison'][0] ) : '';
    $Psychic = isset( $valores['Psychic'] ) ? esc_attr( $valores['Psychic'][0] ) : '';
    $Rock = isset( $valores['Rock'] ) ? esc_attr( $valores['Rock'][0] ) : '';
    $Water = isset( $valores['Water'] ) ? esc_attr( $valores['Water'][0] ) : '';
    $Dark = isset( $valores['Dark'] ) ? esc_attr( $valores['Dark'][0] ) : '';
    $Steel = isset( $valores['Steel'] ) ? esc_attr( $valores['Steel'][0] ) : '';
    $Fairy = isset( $valores['Fairy'] ) ? esc_attr( $valores['Fairy'][0] ) : '';

		wp_nonce_field( 'cyb_meta_box', 'cyb_meta_box_noncename' );
		// La función checked() es similar a
    // if ( $current_value == "un valor") { echo ' checked="checked"' ; }
		$current_value = get_post_meta( $post->ID, 'cyb_weaknesses', true );
?>
    <p>
    <input type="checkbox" name="bug" id="bug" value="1" <?php if ( isset ( $valores['bug'] ) ) checked( $valores['bug'][0], '1' ); ?> />
    <label for="bug">Bug</label>
		</p>
		<p>
    <input type="checkbox" name="Dragon" id="Dragon" value="1" <?php if ( isset ( $valores['Dragon'] ) ) checked( $valores['Dragon'][0], '1' ); ?> />
    <label for="Dragon">Dragon</label>
		</p>
		<p>
    <input type="checkbox" name="Ice" id="Ice" value="1" <?php if ( isset ( $valores['Ice'] ) ) checked( $valores['Ice'][0], '1' ); ?> />
    <label for="Ice">Ice</label>
		</p>
		<p>
    <input type="checkbox" name="Fighting" id="Fighting" value="1" <?php if ( isset ( $valores['Fighting'] ) ) checked( $valores['Fighting'][0], '1' ); ?> />
    <label for="Fighting">Fighting</label>
		</p>
		<p>
    <input type="checkbox" name="Fire" id="Fire" value="1" <?php if ( isset ( $valores['Fire'] ) ) checked( $valores['Fire'][0], '1' ); ?> />
    <label for="Fire">Fire</label>
		</p>
		<p>
    <input type="checkbox" name="Flying" id="Flying" value="1" <?php if ( isset ( $valores['Flying'] ) ) checked( $valores['Flying'][0], '1' ); ?> />
    <label for="Flying">Flying</label>
		</p>
		<p>
    <input type="checkbox" name="Grass" id="Grass" value="1" <?php if ( isset ( $valores['Grass'] ) ) checked( $valores['Grass'][0], '1' ); ?> />
    <label for="Grass">Grass</label>
		</p>
		<p>
    <input type="checkbox" name="Ghost" id="Ghost" value="1" <?php if ( isset ( $valores['Ghost'] ) ) checked( $valores['Ghost'][0], '1' ); ?> />
    <label for="Ghost">Ghost</label>
		</p>
		<p>
    <input type="checkbox" name="Ground" id="Ground" value="1" <?php if ( isset ( $valores['Ground'] ) ) checked( $valores['Ground'][0], '1' ); ?> />
    <label for="Ground">Ground</label>
		</p>
		<p>
    <input type="checkbox" name="Electric" id="Electric" value="1" <?php if ( isset ( $valores['Electric'] ) ) checked( $valores['Electric'][0], '1' ); ?> />
    <label for="Electric">Electric</label>
		</p>
		<p>
    <input type="checkbox" name="Normal" id="Normal" value="1" <?php if ( isset ( $valores['Normal'] ) ) checked( $valores['Normal'][0], '1' ); ?> />
    <label for="Normal">Normal</label>
		</p>
		<p>
    <input type="checkbox" name="Poison" id="Poison" value="1" <?php if ( isset ( $valores['Poison'] ) ) checked( $valores['Poison'][0], '1' ); ?> />
    <label for="Poison">Poison</label>
		</p>
		<p>
    <input type="checkbox" name="Psychic" id="Psychic" value="1" <?php if ( isset ( $valores['Psychic'] ) ) checked( $valores['Psychic'][0], '1' ); ?> />
    <label for="Psychic">Psychic</label>
		</p>
		<p>
    <input type="checkbox" name="Rock" id="Rock" value="1" <?php if ( isset ( $valores['Rock'] ) ) checked( $valores['Rock'][0], '1' ); ?> />
    <label for="Rock">Rock</label>
		</p>
		<p>
    <input type="checkbox" name="Water" id="Water" value="1" <?php if ( isset ( $valores['Water'] ) ) checked( $valores['Water'][0], '1' ); ?> />
    <label for="Water">Water</label>
		</p>
		<p>
    <input type="checkbox" name="Dark" id="Dark" value="1" <?php if ( isset ( $valores['Dark'] ) ) checked( $valores['Dark'][0], '1' ); ?> />
    <label for="Dark">Dark</label>
		</p>
		<p>
    <input type="checkbox" name="Steel" id="Steel" value="1" <?php if ( isset ( $valores['Steel'] ) ) checked( $valores['Steel'][0], '1' ); ?> />
    <label for="Steel">Steel</label>
		</p>
		<p>
    <input type="checkbox" name="Fairy" id="Fairy" value="1" <?php if ( isset ( $valores['Fairy'] ) ) checked( $valores['Fairy'][0], '1' ); ?> />
    <label for="Fairy">Fairy</label>
		</p>

    <?php

}

//hace el llamado de para el pintado de datos de fortalezas
function wpt_resistant( $post ) {

    $valores = get_post_custom( $post->ID );
    $bug = isset( $valores['bug'] ) ? esc_attr( $valores['bug'][0] ) : '';
    $Dragon = isset( $valores['Dragon'] ) ? esc_attr( $valores['Dragon'][0] ) : '';
    $Ice = isset( $valores['Ice'] ) ? esc_attr( $valores['Ice'][0] ) : '';
    $Fighting = isset( $valores['Fighting'] ) ? esc_attr( $valores['Fighting'][0] ) : '';
    $Fire = isset( $valores['Fire'] ) ? esc_attr( $valores['Fire'][0] ) : '';
    $Flying = isset( $valores['Flying'] ) ? esc_attr( $valores['Flying'][0] ) : '';
    $Grass = isset( $valores['Grass'] ) ? esc_attr( $valores['Grass'][0] ) : '';
    $Ghost = isset( $valores['Ghost'] ) ? esc_attr( $valores['Ghost'][0] ) : '';
    $Ground = isset( $valores['Ground'] ) ? esc_attr( $valores['Ground'][0] ) : '';
    $Electric = isset( $valores['Electric'] ) ? esc_attr( $valores['Electric'][0] ) : '';
    $Normal = isset( $valores['Normal'] ) ? esc_attr( $valores['Normal'][0] ) : '';
    $Poison = isset( $valores['Poison'] ) ? esc_attr( $valores['Poison'][0] ) : '';
    $Psychic = isset( $valores['Psychic'] ) ? esc_attr( $valores['Psychic'][0] ) : '';
    $Rock = isset( $valores['Rock'] ) ? esc_attr( $valores['Rock'][0] ) : '';
    $Water = isset( $valores['Water'] ) ? esc_attr( $valores['Water'][0] ) : '';
    $Dark = isset( $valores['Dark'] ) ? esc_attr( $valores['Dark'][0] ) : '';
    $Steel = isset( $valores['Steel'] ) ? esc_attr( $valores['Steel'][0] ) : '';
    $Fairy = isset( $valores['Fairy'] ) ? esc_attr( $valores['Fairy'][0] ) : '';

		wp_nonce_field( 'cyb_meta_box', 'cyb_meta_box_noncename' );
		// La función checked() es similar a
    // if ( $current_value == "un valor") { echo ' checked="checked"' ; }
		$current_value = get_post_meta( $post->ID, 'cyb_resistant', true );
?>
    <p>
    <input type="checkbox" name="bug" id="bug" value="1" <?php if ( isset ( $valores['bug'] ) ) checked( $valores['bug'][0], '1' ); ?> />
    <label for="bug">Bug</label>
		</p>
		<p>
    <input type="checkbox" name="Dragon" id="Dragon" value="1" <?php if ( isset ( $valores['Dragon'] ) ) checked( $valores['Dragon'][0], '1' ); ?> />
    <label for="Dragon">Dragon</label>
		</p>
		<p>
    <input type="checkbox" name="Ice" id="Ice" value="1" <?php if ( isset ( $valores['Ice'] ) ) checked( $valores['Ice'][0], '1' ); ?> />
    <label for="Ice">Ice</label>
		</p>
		<p>
    <input type="checkbox" name="Fighting" id="Fighting" value="1" <?php if ( isset ( $valores['Fighting'] ) ) checked( $valores['Fighting'][0], '1' ); ?> />
    <label for="Fighting">Fighting</label>
		</p>
		<p>
    <input type="checkbox" name="Fire" id="Fire" value="1" <?php if ( isset ( $valores['Fire'] ) ) checked( $valores['Fire'][0], '1' ); ?> />
    <label for="Fire">Fire</label>
		</p>
		<p>
    <input type="checkbox" name="Flying" id="Flying" value="1" <?php if ( isset ( $valores['Flying'] ) ) checked( $valores['Flying'][0], '1' ); ?> />
    <label for="Flying">Flying</label>
		</p>
		<p>
    <input type="checkbox" name="Grass" id="Grass" value="1" <?php if ( isset ( $valores['Grass'] ) ) checked( $valores['Grass'][0], '1' ); ?> />
    <label for="Grass">Grass</label>
		</p>
		<p>
    <input type="checkbox" name="Ghost" id="Ghost" value="1" <?php if ( isset ( $valores['Ghost'] ) ) checked( $valores['Ghost'][0], '1' ); ?> />
    <label for="Ghost">Ghost</label>
		</p>
		<p>
    <input type="checkbox" name="Ground" id="Ground" value="1" <?php if ( isset ( $valores['Ground'] ) ) checked( $valores['Ground'][0], '1' ); ?> />
    <label for="Ground">Ground</label>
		</p>
		<p>
    <input type="checkbox" name="Electric" id="Electric" value="1" <?php if ( isset ( $valores['Electric'] ) ) checked( $valores['Electric'][0], '1' ); ?> />
    <label for="Electric">Electric</label>
		</p>
		<p>
    <input type="checkbox" name="Normal" id="Normal" value="1" <?php if ( isset ( $valores['Normal'] ) ) checked( $valores['Normal'][0], '1' ); ?> />
    <label for="Normal">Normal</label>
		</p>
		<p>
    <input type="checkbox" name="Poison" id="Poison" value="1" <?php if ( isset ( $valores['Poison'] ) ) checked( $valores['Poison'][0], '1' ); ?> />
    <label for="Poison">Poison</label>
		</p>
		<p>
    <input type="checkbox" name="Psychic" id="Psychic" value="1" <?php if ( isset ( $valores['Psychic'] ) ) checked( $valores['Psychic'][0], '1' ); ?> />
    <label for="Psychic">Psychic</label>
		</p>
		<p>
    <input type="checkbox" name="Rock" id="Rock" value="1" <?php if ( isset ( $valores['Rock'] ) ) checked( $valores['Rock'][0], '1' ); ?> />
    <label for="Rock">Rock</label>
		</p>
		<p>
    <input type="checkbox" name="Water" id="Water" value="1" <?php if ( isset ( $valores['Water'] ) ) checked( $valores['Water'][0], '1' ); ?> />
    <label for="Water">Water</label>
		</p>
		<p>
    <input type="checkbox" name="Dark" id="Dark" value="1" <?php if ( isset ( $valores['Dark'] ) ) checked( $valores['Dark'][0], '1' ); ?> />
    <label for="Dark">Dark</label>
		</p>
		<p>
    <input type="checkbox" name="Steel" id="Steel" value="1" <?php if ( isset ( $valores['Steel'] ) ) checked( $valores['Steel'][0], '1' ); ?> />
    <label for="Steel">Steel</label>
		</p>
		<p>
    <input type="checkbox" name="Fairy" id="Fairy" value="1" <?php if ( isset ( $valores['Fairy'] ) ) checked( $valores['Fairy'][0], '1' ); ?> />
    <label for="Fairy">Fairy</label>
		</p>

    <?php

}
//hace el llamado de para el pintado de datos de tipos
function wpt_types( $post ) {

    $valores = get_post_custom( $post->ID );
    $bug = isset( $valores['bug'] ) ? esc_attr( $valores['bug'][0] ) : '';
    $Dragon = isset( $valores['Dragon'] ) ? esc_attr( $valores['Dragon'][0] ) : '';
    $Ice = isset( $valores['Ice'] ) ? esc_attr( $valores['Ice'][0] ) : '';
    $Fighting = isset( $valores['Fighting'] ) ? esc_attr( $valores['Fighting'][0] ) : '';
    $Fire = isset( $valores['Fire'] ) ? esc_attr( $valores['Fire'][0] ) : '';
    $Flying = isset( $valores['Flying'] ) ? esc_attr( $valores['Flying'][0] ) : '';
    $Grass = isset( $valores['Grass'] ) ? esc_attr( $valores['Grass'][0] ) : '';
    $Ghost = isset( $valores['Ghost'] ) ? esc_attr( $valores['Ghost'][0] ) : '';
    $Ground = isset( $valores['Ground'] ) ? esc_attr( $valores['Ground'][0] ) : '';
    $Electric = isset( $valores['Electric'] ) ? esc_attr( $valores['Electric'][0] ) : '';
    $Normal = isset( $valores['Normal'] ) ? esc_attr( $valores['Normal'][0] ) : '';
    $Poison = isset( $valores['Poison'] ) ? esc_attr( $valores['Poison'][0] ) : '';
    $Psychic = isset( $valores['Psychic'] ) ? esc_attr( $valores['Psychic'][0] ) : '';
    $Rock = isset( $valores['Rock'] ) ? esc_attr( $valores['Rock'][0] ) : '';
    $Water = isset( $valores['Water'] ) ? esc_attr( $valores['Water'][0] ) : '';
    $Dark = isset( $valores['Dark'] ) ? esc_attr( $valores['Dark'][0] ) : '';
    $Steel = isset( $valores['Steel'] ) ? esc_attr( $valores['Steel'][0] ) : '';
    $Fairy = isset( $valores['Fairy'] ) ? esc_attr( $valores['Fairy'][0] ) : '';

		wp_nonce_field( 'cyb_meta_box', 'cyb_meta_box_noncename' );
		// La función checked() es similar a
    // if ( $current_value == "un valor") { echo ' checked="checked"' ; }
		$current_value = get_post_meta( $post->ID, 'cyb_types', true );
?>
    <p>
    <input type="checkbox" name="bug" id="bug" value="1" <?php if ( isset ( $valores['bug'] ) ) checked( $valores['bug'][0], '1' ); ?> />
    <label for="bug">Bug</label>
		</p>
		<p>
    <input type="checkbox" name="Dragon" id="Dragon" value="1" <?php if ( isset ( $valores['Dragon'] ) ) checked( $valores['Dragon'][0], '1' ); ?> />
    <label for="Dragon">Dragon</label>
		</p>
		<p>
    <input type="checkbox" name="Ice" id="Ice" value="1" <?php if ( isset ( $valores['Ice'] ) ) checked( $valores['Ice'][0], '1' ); ?> />
    <label for="Ice">Ice</label>
		</p>
		<p>
    <input type="checkbox" name="Fighting" id="Fighting" value="1" <?php if ( isset ( $valores['Fighting'] ) ) checked( $valores['Fighting'][0], '1' ); ?> />
    <label for="Fighting">Fighting</label>
		</p>
		<p>
    <input type="checkbox" name="Fire" id="Fire" value="1" <?php if ( isset ( $valores['Fire'] ) ) checked( $valores['Fire'][0], '1' ); ?> />
    <label for="Fire">Fire</label>
		</p>
		<p>
    <input type="checkbox" name="Flying" id="Flying" value="1" <?php if ( isset ( $valores['Flying'] ) ) checked( $valores['Flying'][0], '1' ); ?> />
    <label for="Flying">Flying</label>
		</p>
		<p>
    <input type="checkbox" name="Grass" id="Grass" value="1" <?php if ( isset ( $valores['Grass'] ) ) checked( $valores['Grass'][0], '1' ); ?> />
    <label for="Grass">Grass</label>
		</p>
		<p>
    <input type="checkbox" name="Ghost" id="Ghost" value="1" <?php if ( isset ( $valores['Ghost'] ) ) checked( $valores['Ghost'][0], '1' ); ?> />
    <label for="Ghost">Ghost</label>
		</p>
		<p>
    <input type="checkbox" name="Ground" id="Ground" value="1" <?php if ( isset ( $valores['Ground'] ) ) checked( $valores['Ground'][0], '1' ); ?> />
    <label for="Ground">Ground</label>
		</p>
		<p>
    <input type="checkbox" name="Electric" id="Electric" value="1" <?php if ( isset ( $valores['Electric'] ) ) checked( $valores['Electric'][0], '1' ); ?> />
    <label for="Electric">Electric</label>
		</p>
		<p>
    <input type="checkbox" name="Normal" id="Normal" value="1" <?php if ( isset ( $valores['Normal'] ) ) checked( $valores['Normal'][0], '1' ); ?> />
    <label for="Normal">Normal</label>
		</p>
		<p>
    <input type="checkbox" name="Poison" id="Poison" value="1" <?php if ( isset ( $valores['Poison'] ) ) checked( $valores['Poison'][0], '1' ); ?> />
    <label for="Poison">Poison</label>
		</p>
		<p>
    <input type="checkbox" name="Psychic" id="Psychic" value="1" <?php if ( isset ( $valores['Psychic'] ) ) checked( $valores['Psychic'][0], '1' ); ?> />
    <label for="Psychic">Psychic</label>
		</p>
		<p>
    <input type="checkbox" name="Rock" id="Rock" value="1" <?php if ( isset ( $valores['Rock'] ) ) checked( $valores['Rock'][0], '1' ); ?> />
    <label for="Rock">Rock</label>
		</p>
		<p>
    <input type="checkbox" name="Water" id="Water" value="1" <?php if ( isset ( $valores['Water'] ) ) checked( $valores['Water'][0], '1' ); ?> />
    <label for="Water">Water</label>
		</p>
		<p>
    <input type="checkbox" name="Dark" id="Dark" value="1" <?php if ( isset ( $valores['Dark'] ) ) checked( $valores['Dark'][0], '1' ); ?> />
    <label for="Dark">Dark</label>
		</p>
		<p>
    <input type="checkbox" name="Steel" id="Steel" value="1" <?php if ( isset ( $valores['Steel'] ) ) checked( $valores['Steel'][0], '1' ); ?> />
    <label for="Steel">Steel</label>
		</p>
		<p>
    <input type="checkbox" name="Fairy" id="Fairy" value="1" <?php if ( isset ( $valores['Fairy'] ) ) checked( $valores['Fairy'][0], '1' ); ?> />
    <label for="Fairy">Fairy</label>
		</p>

    <?php

}


//Salvando los datos
add_action( 'save_post', 'cyb_save_custom_fields', 10, 18 );
function cyb_save_custom_fields( $post_id, $post ){

    // comprobamos el nonce como medida de seguridad
    if ( ! isset( $_POST['cyb_meta_box_noncename'] ) || ! wp_verify_nonce( $_POST['cyb_meta_box_noncename'], 'cyb_meta_box' ) ) {
        return;
    }

    // Si hemos recibido valor de un custom field, los actualizamos el saneado/validación se hace automáticamente en el callback
    if( isset( $_POST['cyb_types'] ) ) {
        update_post_meta( $post_id, 'cyb_types', $_POST['cyb_types'] );
    } else {
        // Opcional
        // $_POST['cyb_types'] no tiene valor establecido
        delete_post_meta( $post_id, 'cyb_types' );
    }

		if( isset( $_POST['cyb_resistant'] ) ) {
        update_post_meta( $post_id, 'cyb_resistant', $_POST['cyb_resistant'] );
    } else {
        delete_post_meta( $post_id, 'cyb_resistant' );
    }

	  if( isset( $_POST['cyb_types'] ) ) {
        update_post_meta( $post_id, 'cyb_types', $_POST['cyb_types'] );
    } else {
        delete_post_meta( $post_id, 'cyb_types' );
    }
}
