<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Vista del Usuario
$routes->get('/', 'Home::index', ['filter' => 'adminAuth']);
$routes->get('/productos', 'Home::productos', ['filter' => 'adminAuth']);
$routes->get('/ayuda', 'Home::ayuda', ['filter' => 'adminAuth']);
$routes->get('/carrito', 'Home::carrito', ['filter' => 'adminAuth']);
$routes->get('/contacto', 'Home::contacto', ['filter' => 'adminAuth']);
$routes->get('/consultas', 'Home::consultas', ['filter' => 'adminAuth']);
$routes->get('/quienesSomos', 'Home::quienesSomos', ['filter' => 'adminAuth']);
$routes->get('/comercializacion', 'Home::comercializacion', ['filter' => 'adminAuth']);
$routes->get('/terminosUsos', 'Home::terminosUsos', ['filter' => 'adminAuth']);

$routes->get('/registrarse', 'Home::registrarse', ['filter' => 'auth']);
$routes->post('/enviar-form', 'Usuario_controller::formValidation');

$routes->get('/inicioSesion', 'Home::inicioSesion', ['filter' => 'auth']);
$routes->post('/enviar-login', 'Login_controller::auth');
$routes->get('/cerrarSesion', 'Login_controller::logeout');

// Vista del ADMIN
$routes->get('/mostrarListaProductos', 'Producto_controller::index', ['filter' => 'usuarioAuth']);

$routes->get('/altaDeProductos', 'Producto_controller::crearProducto', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formProducto', 'Producto_controller::formValidation');

$routes->get('/altaDeCategorias', 'Categoria_controller::index', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formCategoria', 'Categoria_controller::formValidation');