<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //Visitante
$routes->get('/', 'Home::index');
$routes->get('nosotros', 'Home::nosotros');
$routes->get('tienda', 'CarritoController::catalogo');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('contacto', 'ConsultasController::index');
$routes->get('terminos', 'Home::terminos');
$routes->get('producto', 'Home::producto');
$routes->get('verProducto/(:num)', 'ProductoController::verProducto/$1');
$routes->post('consultas/crear', 'ConsultasController::formValidation');

// Registro de un nuevo usuario
$routes->get('registro', 'UsuarioController::create', ['filter'=>'auth']);//filtro sin parametro, solo valida que haya iniciado sesion
$routes->post('registrar', 'UsuarioController::formValidation');

// Login de un usuario
$routes->get('login', 'UsuarioController::login');
$routes->post('login', 'UsuarioController::loginValidation');
$routes->get('logout', 'UsuarioController::logout');

// User / Cliente
$routes->get('cliente', 'ClienteController::index', ['filter'=>'auth']);
$routes->get('cliente/compras/verCompras', 'VentaController::verCompras');
$routes->get('cliente/compras/verCompras/detalle/(:num)', 'VentaController::verDetalleCompra/$1');

// Admin
$routes->get('admin', 'AdminController::index', ['filter'=>'auth:admin']);
$routes->get('/admin/productos', 'AdminController::productos', ['filter'=>'auth:admin']);
$routes->get('/admin/productos/crear', 'ProductoController::create', ['filter'=>'auth:admin']);
$routes->post('admin/productos/crear', 'ProductoController::formValidation', ['filter'=>'auth:admin']);
$routes->get('admin/productos/editar/(:num)', 'ProductoController::edit/$1', ['filter'=>'auth:admin']);
$routes->post('admin/productos/editar', 'ProductoController::formValidationEditar', ['filter'=>'auth:admin']);
$routes->get('admin/productos/eliminar/(:num)', 'ProductoController::eliminarProducto/$1', ['filter'=>'auth:admin']);
$routes->get('admin/productos/activar/(:num)', 'ProductoController::activarProducto/$1', ['filter'=>'auth:admin']);
$routes->get('admin/consultas', 'ConsultasController::consultas', ['filter'=>'auth:admin']);
$routes->get('admin/consultas/marcarLeido/(:num)', 'ConsultasController::marcarLeido/$1', ['filter'=>'auth:admin']);
$routes->get('admin/ventas', 'AdminController::ventas', ['filter'=>'auth:admin']);
$routes->get('admin/ventas/detalle/(:num)', 'VentaController::verDetalleVenta/$1', ['filter'=>'auth:admin']);
$routes->get('admin/categorias', 'AdminController::categorias', ['filter'=>'auth:admin']);
$routes->get('/admin/categorias/crear', 'CategoriaController::create', ['filter'=>'auth:admin']);
$routes->post('admin/categorias/crear', 'CategoriaController::formValidation', ['filter'=>'auth:admin']);
$routes->get('admin/categorias/editar/(:num)', 'CategoriaController::edit/$1', ['filter'=>'auth:admin']);
$routes->post('admin/categorias/editar', 'CategoriaController::formValidationEditar', ['filter'=>'auth:admin']);
$routes->get('admin/usuarios', 'AdminController::usuarios', ['filter' => 'auth:admin']);
$routes->get('admin/usuarios/crear', 'UsuarioController::crear', ['filter' => 'auth:admin']);
$routes->post('admin/usuarios/guardar', 'UsuarioController::guardar', ['filter' => 'auth:admin']);

$routes->get('admin/usuarios/eliminar/(:num)', 'UsuarioController::eliminarUsuario/$1', ['filter' => 'auth:admin']);
$routes->get('admin/usuarios/activar/(:num)', 'UsuarioController::activarUsuario/$1', ['filter' => 'auth:admin']);

$routes->post('usuarios/actualizar-perfil', 'UsuarioController::actualizarPerfilUsuario');

// Buscar producto
$routes->post('buscarProducto', 'ProductoController::buscarProducto');

//Carrito
$routes->get('carrito', 'CarritoController::mostrarCarrito');
$routes->post('carrito_agrega', 'CarritoController::add');
$routes->get('carrito_eliminar/(:any)', 'CarritoController::eliminar_item/$1');
$routes->get('/borrar', 'CarritoController::borrar_carrito');
$routes->get('/carrito-comprar', 'Ventacontroller::registrarVenta', ['filter' => 'auth:user']);
$routes->get('compra/(:num)', 'CarritoController::mostrarCompra/$1', ['filter' => 'auth:user']);
$routes->get('carrito_suma/(:any)', 'CarritoController::suma/$1');
$routes->get('carrito_resta/(:any)', 'CarritoController::resta/$1');