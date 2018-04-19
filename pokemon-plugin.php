<?php
/*
Plugin Name: WordPress Custom PokeAPI
Plugin URI: https://github.com/eldagoquep/Backend_app
Description: Content Types and Taxonomies to support custom PokeAPI
Version: 0.1
Author: Dagoberto Depablos
Author URI: http://vc-marketingdigital.com/
License: ISC
*/

include __DIR__ . '/API_REST/post_type_pokemons.php';
include __DIR__ . '/taxonomies/initialize.php';
include __DIR__ . '/API_REST/endpoint.php';
