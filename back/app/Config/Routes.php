<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->resource('resep', ['controller' => 'ResepController']);

$routes->post('resep/(:num)', 'ResepController::update/$1');

// $routes->get('resep', 'ResepController::index');
// $routes->post('resep', 'ResepController::create');
// $routes->put('resep/(:num)', 'ResepController::update/$1');
// $routes->delete('resep/(:num)', 'ResepController::delete/$1');


$routes->resource('kuliner', ['controller' => 'KulinerController']);

$routes->post('kuliner/(:num)', 'KulinerController::update/$1');

$routes->resource('artikel', ['controller' => 'ArtikelController']);
$routes->post('artikel/(:num)', 'ArtikelController::update/$1');
