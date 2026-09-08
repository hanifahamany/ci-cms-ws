<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// ================= Products (CRUD) =================
$routes->get('products', 'Products::index');
$routes->get('products/create', 'Products::create');
$routes->post('products/store', 'Products::store');
$routes->get('products/edit/(:num)', 'Products::edit/$1');
$routes->post('products/update/(:num)', 'Products::update/$1');
$routes->post('products/delete/(:num)', 'Products::delete/$1');

// ================= Purchases / Simulasi Pembelian (CRUD) =================
$routes->get('purchases', 'Purchases::index');
$routes->get('purchases/create', 'Purchases::create');
$routes->post('purchases/store', 'Purchases::store');
$routes->get('purchases/edit/(:num)', 'Purchases::edit/$1');
$routes->post('purchases/update/(:num)', 'Purchases::update/$1');
$routes->post('purchases/delete/(:num)', 'Purchases::delete/$1');
