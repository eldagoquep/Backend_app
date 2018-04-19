<?php 
add_action ('rest_api_init', function () {
  register_rest_route('pokemonplugin/v1','/pokemons/(?P<id>\d+)', array (
       'methods'   => 'GET',
       'callback'  => 'pokemons_data',
       'args'      => array (
          'id'    => array (
             'validate_callback'  => function($param, $request, $key) {
                return is_numeric($param);                        
             }
          ),
       )
       ));
});

function pokemons_data( $data) {
  $posts = get_posts ( array (
      pokemons => $data ['number'],
    )
  );
  if (empty($posts)) {
    return new WP_Error (
      'no existe el pokemon',
      'numero de pokemon invalido',
      array (
        'status' => 404
      )
    );
  }
  return $posts[0];
};