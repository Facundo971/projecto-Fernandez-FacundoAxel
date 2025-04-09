<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/productos', 'Home::productos');
$routes->get('/ayuda', 'Home::ayuda');
$routes->get('/carrito', 'Home::carrito');
$routes->get('/show', 'Home::show');