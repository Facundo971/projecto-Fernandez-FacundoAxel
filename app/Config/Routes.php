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
$routes->get('/consultas', 'Home::consultas');
$routes->get('/inicioSesion', 'Home::inicioSesion');
$routes->get('/quienesSomos', 'Home::quienesSomos');
$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/terminosUsos', 'Home::terminosUsos');