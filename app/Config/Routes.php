<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// 1-Colocar en el registro y inicio de sesion el metodo old, X
// 2-Coloar el boton resetear en todo, X
// 3-MODIFICAR EL ESTILO DEL NAV CUANDO ES CLIENTE, 
// 4-MODIFICAR EL RESPONSIVO DE LA PARTE DE COMERCIALIZACION, PRODUCTO X
// 5-SI ES NECESARIO AGREGAR UN FORMULARIO PARA LA COMPRA DE PRODUCTOS, (NO)
// 6-MODIFICAR LA PARTE DE AYUDA EN LA SECCION DE COMPRAS Y EL INDEX LA PARTE DE "Elige como pagar"
// 7-CONTROLAR LAS IMAGENES
// 8-AGREGAR FUNCIONALIDADES DE LA SECCION PRODUCTOS X
// 9-AGREGAR EL BOTON DE IMPRIMIR EN VENTAS DE DETALLE X
$routes->get('/', 'Home::index', ['filter' => 'adminAuth']);
$routes->get('/productos', 'Home::productos', ['filter' => 'adminAuth']);

$routes->post('/enviar-formQuery', 'Home::buscador', ['filter' => 'adminAuth']);
$routes->get('/enviar-formPrecio', 'Home::buscadorPrecioProducto', ['filter' => 'adminAuth']);
$routes->get('/enviar-formPrecioMarca/(:num)', 'Home::buscadorPrecioMarcaProducto/$1', ['filter' => 'adminAuth']);
$routes->get('/enviar-formPrecioCategoria/(:num)', 'Home::buscadorPrecioCategoriaProducto/$1', ['filter' => 'adminAuth']);
$routes->get('/enviar-formPrecioBuscador/(:any)', 'Home::buscadorPrecioBuscadorProducto/$1', ['filter' => 'adminAuth']);
$routes->get('/productosMayor', 'Home::productosMayorPrecio', ['filter' => 'adminAuth']);
$routes->get('/productosMenor', 'Home::productosMenorPrecio', ['filter' => 'adminAuth']);
$routes->get('/productosMayorPrecioMarca/(:num)', 'Home::productosMayorPrecioMarca/$1', ['filter' => 'adminAuth']);
$routes->get('/productosMenorPrecioMarca/(:num)', 'Home::productosMenorPrecioMarca/$1', ['filter' => 'adminAuth']);
$routes->get('/productosMayorPrecioCategoria/(:num)', 'Home::productosMayorPrecioCategoria/$1', ['filter' => 'adminAuth']);
$routes->get('/productosMenorPrecioCategoria/(:num)', 'Home::productosMenorPrecioCategoria/$1', ['filter' => 'adminAuth']);
$routes->get('/productosMayorPrecioBuscador/(:any)', 'Home::productosMayorPrecioBuscador/$1', ['filter' => 'adminAuth']);
$routes->get('/productosMenorPrecioBuscador/(:any)', 'Home::productosMenorPrecioBuscador/$1', ['filter' => 'adminAuth']);

$routes->get('/categoria/(:num)', 'Home::categorias/$1', ['filter' => 'adminAuth']);
$routes->get('/marca/(:num)', 'Home::marcas/$1', ['filter' => 'adminAuth']);
$routes->get('/ayuda', 'Home::ayuda', ['filter' => 'adminAuth']);
$routes->get('/contacto', 'Home::contacto', ['filter' => 'adminAuth']);
$routes->get('/quienesSomos', 'Home::quienesSomos', ['filter' => 'adminAuth']);
$routes->get('/comercializacion', 'Home::comercializacion', ['filter' => 'adminAuth']);
$routes->get('/terminosUsos', 'Home::terminosUsos', ['filter' => 'adminAuth']);

$routes->get('/consultas', 'Home::consultas', ['filter' => 'adminAuth']);
$routes->post('/enviar-formConsulta', 'Consulta_controller::formValidation', ['filter' => 'adminAuth']);
$routes->get('/limpiarConsulta', 'Consulta_controller::limpiarDatos', ['filter' => 'adminAuth']);
$routes->get('/marcarConsulta/(:num)', 'Consulta_controller::marcarConsulta/$1', ['filter' => 'usuarioAuth']);

$routes->get('/registrarse', 'Usuario_controller::registrarse', ['filter' => 'auth']);
$routes->post('/enviar-form', 'Usuario_controller::formValidation');
$routes->get('/inicioSesion', 'Login_controller::inicioSesion', ['filter' => 'auth']);
$routes->post('/enviar-login', 'Login_controller::formValidation');
$routes->get('/cerrarSesion', 'Login_controller::logeout');
$routes->get('/limpiarUsuario', 'Usuario_controller::limpiarDatos', ['filter' => 'auth']);
$routes->get('/limpiarSesion', 'Login_controller::limpiarDatos', ['filter' => 'auth']);

$routes->get('/limpiarProducto', 'Producto_controller::limpiarDatos', ['filter' => 'usuarioAuth']);
$routes->get('/limpiarProductoAct/(:num)', 'Producto_controller::limpiarDatosAct/$1', ['filter' => 'usuarioAuth']);
$routes->get('/limpiarCategoria', 'Categoria_controller::limpiarDatos', ['filter' => 'usuarioAuth']);
$routes->get('/limpiarCategoriaAct/(:num)', 'Categoria_controller::limpiarDatosAct/$1', ['filter' => 'usuarioAuth']);
$routes->get('/limpiarUsuarioUser', 'Usuario_controller::limpiarDatosUser', ['filter' => 'usuarioAuth']);
$routes->get('/limpiarUsuarioUserAct/(:num)', 'Usuario_controller::limpiarDatosUserAct/$1', ['filter' => 'usuarioAuth']);
$routes->get('/limpiarPerfil', 'Perfil_controller::limpiarDatos', ['filter' => 'usuarioAuth']);
$routes->get('/limpiarPerfilAct/(:num)', 'Perfil_controller::limpiarDatosAct/$1', ['filter' => 'usuarioAuth']);

$routes->get('/limpiarMarca', 'Marca_controller::limpiarDatos', ['filter' => 'usuarioAuth']);
$routes->get('/limpiarMarcaAct/(:num)', 'Marca_controller::limpiarDatosAct/$1', ['filter' => 'usuarioAuth']);

// Vista del Carrito
$routes->get('/carrito', 'Home::carrito', ['filter' => ['adminAuth', 'carritoAuth']]);
$routes->post('/enviar-formCarritoAgregar/(:num)', 'Carrito_controller::add/$1', ['filter' => ['adminAuth', 'carritoAuth']]);
$routes->get('/borrar-producto/(:any)', 'Carrito_controller::eliminarProducto/$1', ['filter' => ['adminAuth', 'carritoAuth']]);
$routes->get('/borrar-carrito', 'Carrito_controller::eliminarCarrito', ['filter' => ['adminAuth', 'carritoAuth']]);
$routes->get('/suma-carrito/(:any)', 'Carrito_controller::suma/$1', ['filter' => ['adminAuth', 'carritoAuth']]);
$routes->get('/resta-carrito/(:any)', 'Carrito_controller::resta/$1', ['filter' => ['adminAuth', 'carritoAuth']]);
$routes->get('/comprar-carrito', 'Venta_controller::registrarVenta', ['filter' => ['adminAuth', 'carritoAuth']]);
$routes->get('/vistaDetalleCompra/(:num)', 'Venta_controller::verFactura/$1', ['filter' => ['adminAuth', 'carritoAuth']]);
$routes->get('/misCompras', 'Venta_controller::misCompras', ['filter' => ['adminAuth', 'carritoAuth']]);

// Vista del ADMIN (
// 1-SOLUCIONAR EL PROBLEMA CON LA ACTUALIZACION DE LA CONTRASEÑA DE LOS USUARIOS, X
// 2-AGREGAR LA CONDICIONAL A LOS PRODUCTOS CON IMAGEN, X
// 3-Coloar el boton resetear en todo, X
// 4-HACER RESPONSIVO CADA SECCION DE LA PARTE DEL ADMINISTRADOR, 
// 5-MEJORAR O CAMBIAR LOS ESTILOS, 
// 6-EL NOMBRE DE LAS PESTALLAS QUE DICE NETSHOP CAMBIARLO A DASHBOARD O OTRO NOMBRE, X (Fijarse cuando agrego)
// 7-AGREGAR TODOS LOS ESTILOS EN EL ARCHIVO STYLE, 
// 8-FIJARSE EN LOS NOMBRES DE LAS CLASES DE LOS ESTILOS)
// 9-EL SABADO HACER EL CARRITO X
// 10-AGREGAR MARCA, Y OTRO QUE SE ME OCURRA A PRODUCTOS X
// 11-AGREGAR UN FILTRO EN LA PARTE DE VENTAS QUE SE PUEDA BUSCA VENTAS EN UNA FECHA EN ESPECIFICO (DOS FECHAS)
// 12-CAMBIAR EL BOTON BORRAR POR LEIDO EN LA PARTE DE CONSULTA 
// 13-AGREGAR EL BOTON DE IMPRIMIR EN VENTAS DE DETALLE X
// Vista de los Usuarios
$routes->get('/mostrarListaUsuarios', 'Usuario_controller::listaUsuarios', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaUsuariosDesactivados', 'Usuario_controller::indexDesactivados', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaUsuariosParaActivar', 'Usuario_controller::indexParaActivar', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaUsuariosActualizarEliminar', 'Usuario_controller::indexActualizarEliminar', ['filter' => 'usuarioAuth']);
$routes->get('/altaDeUsuarios', 'Usuario_controller::crearUsuario', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formUsuario', 'Usuario_controller::formValidationUsuario', ['filter' => 'usuarioAuth']);
$routes->get('/actualizarUsuarios/(:num)', 'Usuario_controller::actualizarUsuario/$1', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formUsuarioActualizar', 'Usuario_controller::formValidationUpdate');
$routes->get('/eliminarUsuarios/(:num)', 'Usuario_controller::eliminarUsuario/$1', ['filter' => 'usuarioAuth']);
$routes->get('/activarUsuarios/(:num)', 'Usuario_controller::activarUsuario/$1', ['filter' => 'usuarioAuth']);

$routes->post('/enviar-formUsuarioQuery', 'Usuario_controller::buscadorUsuarios', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formUsuarioDesactivadoQuery', 'Usuario_controller::buscadorUsuariosDesactivados', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formUsuarioActQuery', 'Usuario_controller::buscadorUsuariosAct', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formUsuarioParaActivarQuery', 'Usuario_controller::buscadorUsuariosParaActivar', ['filter' => 'usuarioAuth']);

// Vista de los Productos
$routes->get('/mostrarListaProductos', 'Producto_controller::index', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaProductosDesactivados', 'Producto_controller::indexDesactivados', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaProductosParaActivar', 'Producto_controller::indexParaActivar', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaProductosActualizarEliminar', 'Producto_controller::indexActualizarEliminar', ['filter' => 'usuarioAuth']);
$routes->get('/altaDeProductos', 'Producto_controller::crearProducto', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formProducto', 'Producto_controller::formValidation', ['filter' => 'usuarioAuth']);
$routes->get('/actualizarProductos/(:num)', 'Producto_controller::actualizarProducto/$1', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formProductoActualizar', 'Producto_controller::formValidationUpdate');
$routes->get('/eliminarProductos/(:num)', 'Producto_controller::eliminarProducto/$1', ['filter' => 'usuarioAuth']);
$routes->get('/activarProductos/(:num)', 'Producto_controller::activarProducto/$1', ['filter' => 'usuarioAuth']);

$routes->post('/enviar-formProductoQuery', 'Producto_controller::buscadorProductos', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formProductoDesactivadoQuery', 'Producto_controller::buscadorProductosDesactivados', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formProductoActQuery', 'Producto_controller::buscadorProductosAct', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formProductoParaActivarQuery', 'Producto_controller::buscadorProductosParaActivar', ['filter' => 'usuarioAuth']);

// Vista de los Perfiles
$routes->get('/mostrarListaPerfiles', 'Perfil_controller::index', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaPerfilesDesactivados', 'Perfil_controller::indexDesactivados', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaPerfilesParaActivar', 'Perfil_controller::indexParaActivar', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaPerfilesActualizarEliminar', 'Perfil_controller::indexActualizarEliminar', ['filter' => 'usuarioAuth']);
$routes->get('/altaDePerfiles', 'Perfil_controller::crearPerfil', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formPerfil', 'Perfil_controller::formValidation', ['filter' => 'usuarioAuth']);
$routes->get('/actualizarPerfiles/(:num)', 'Perfil_controller::actualizarPerfil/$1', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formPerfilActualizar', 'Perfil_controller::formValidationUpdate');
$routes->get('/eliminarPerfiles/(:num)', 'Perfil_controller::eliminarPerfil/$1', ['filter' => 'usuarioAuth']);
$routes->get('/activarPerfiles/(:num)', 'Perfil_controller::activarPerfil/$1', ['filter' => 'usuarioAuth']);

// Vista de las Categorias
$routes->get('/mostrarListaCategorias', 'Categoria_controller::index', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaCategoriasDesactivados', 'Categoria_controller::indexDesactivados', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaCategoriasParaActivar', 'Categoria_controller::indexParaActivar', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaCategoriasActualizarEliminar', 'Categoria_controller::indexActualizarEliminar', ['filter' => 'usuarioAuth']);
$routes->get('/altaDeCategorias', 'Categoria_controller::crearCategoria', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formCategoria', 'Categoria_controller::formValidation', ['filter' => 'usuarioAuth']);
$routes->get('/actualizarCategorias/(:num)', 'Categoria_controller::actualizarCategoria/$1', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formCategoriaActualizar', 'Categoria_controller::formValidationUpdate');
$routes->get('/eliminarCategorias/(:num)', 'Categoria_controller::eliminarCategoria/$1', ['filter' => 'usuarioAuth']);
$routes->get('/activarCategorias/(:num)', 'Categoria_controller::activarCategoria/$1', ['filter' => 'usuarioAuth']);

// Vista de las Marcas
$routes->get('/mostrarListaMarcas', 'Marca_controller::index', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaMarcasDesactivados', 'Marca_controller::indexDesactivados', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaMarcasParaActivar', 'Marca_controller::indexParaActivar', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaMarcasActualizarEliminar', 'Marca_controller::indexActualizarEliminar', ['filter' => 'usuarioAuth']);
$routes->get('/altaDeMarcas', 'Marca_controller::crearMarca', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formMarca', 'Marca_controller::formValidation', ['filter' => 'usuarioAuth']);
$routes->get('/actualizarMarcas/(:num)', 'Marca_controller::actualizarMarca/$1', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formMarcaActualizar', 'Marca_controller::formValidationUpdate');
$routes->get('/eliminarMarcas/(:num)', 'Marca_controller::eliminarMarca/$1', ['filter' => 'usuarioAuth']);
$routes->get('/activarMarcas/(:num)', 'Marca_controller::activarMarca/$1', ['filter' => 'usuarioAuth']);

// Vista de las Ventas
$routes->get('/mostrarListaVentas', 'Venta_controller::index', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaVentasDesactivadas', 'Venta_controller::indexDesactivadas', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarDetalleCompraCliente/(:num)', 'Venta_controller::indexDetalleCompra/$1', ['filter' => 'usuarioAuth']);

$routes->post('/enviar-formFechaQuery', 'Venta_controller::buscadorVentas', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formFechaDesactivadoQuery', 'Venta_controller::buscadorVentasDesactivados', ['filter' => 'usuarioAuth']);
$routes->post('/enviar-formFechaQuery20', 'Venta_controller::buscadorVentasDeUnCliente', ['filter' => ['adminAuth', 'carritoAuth']]);

// Vista de las Consultas
$routes->get('/mostrarListaConsultas', 'Consulta_controller::index', ['filter' => 'usuarioAuth']);
$routes->get('/mostrarListaConsultasDesactivadas', 'Consulta_controller::indexDesactivadas', ['filter' => 'usuarioAuth']);