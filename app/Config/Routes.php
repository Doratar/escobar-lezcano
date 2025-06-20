<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('nosotros', 'Home::nosotros');
$routes->get('tienda', 'CarritoController::catalogo');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('contacto', 'ConsultasController::index');
$routes->get('terminos', 'Home::terminos');
$routes->get('producto', 'Home::producto');
$routes->get('verProducto/(:num)', 'ProductoController::verProducto/$1');

// Registro de un nuevo usuario
$routes->get('registro', 'UsuarioController::create', ['filter'=>'auth']);
$routes->post('registrar', 'UsuarioController::formValidation');

// Login de un usuario
$routes->get('login', 'UsuarioController::login');
$routes->post('login', 'UsuarioController::loginValidation');
$routes->get('logout', 'UsuarioController::logout');

// Cliente
$routes->get('cliente', 'ClienteController::index', ['filter'=>'auth']);

// Admin
$routes->get('admin', 'AdminController::index', ['filter'=>'admin']);
$routes->get('/admin/productos', 'AdminController::productos');
$routes->get('/admin/productos/crear', 'ProductoController::create');
$routes->post('admin/productos/crear', 'ProductoController::formValidation');
$routes->get('admin/productos/editar/(:num)', 'ProductoController::edit/$1');
$routes->post('admin/productos/editar', 'ProductoController::formValidationEditar');
$routes->get('admin/productos/eliminar/(:num)', 'ProductoController::eliminarProducto/$1');
$routes->get('admin/productos/activar/(:num)', 'ProductoController::activarProducto/$1');


$routes->get('admin/consultas', 'ConsultasController::consultas');
$routes->post('admin/consultas/crear', 'ConsultasController::formValidation');
$routes->get('admin/consultas/marcarLeido/(:num)', 'ConsultasController::marcarLeido/$1');

$routes->get('admin/ventas', 'AdminController::ventas');
$routes->get('admin/categorias', 'AdminController::categorias');
//Usuario
$routes->get('admin/usuarios', 'AdminController::usuarios', ['filter' => 'auth']);


//Carrito
$routes->get('carrito', 'CarritoController::mostrarCarrito');
$routes->post('carrito_agrega', 'CarritoController::add');

// Rutas para el carrito
// Muestra todos los productos del catálogo
    $routes->get('/todos_p', 'carritoController::catalogo', ['filter' => 'auth']);
// Carga la vista carrito_parte_view
    //$routes->get('/muestro', 'carrito_controller::muestra', ['filter' => 'auth']);
// Actualiza los datos del carrito
    //$routes->get('/carrito_actualiza', 'carrito_controller::actualiza_carrito', ['filter' => 'auth']);
// Agregar los ítems seleccionados
    //$routes->post('carrito/add', 'Carrito_controller::add', ['filter' => 'auth']);
// Elimina un ítem del carrito
    $routes->get('carrito_eliminar/(:any)', 'CarritoController::eliminar_item/$1');
// Eliminar todo el carrito
    //$routes->get('/borrar', 'carrito_controller::borrar_carrito', ['filter' => 'auth']);
// Registrar la venta en las tablas
    //$routes->get('/carrito-comprar', 'Ventascontroller::registrar_venta', ['filter' => 'auth']);
// Botones de sumar y restar en la vista del carrito
    //$routes->get('carrito_suma/(:any)', 'carrito_controller::suma/$1');
    //$routes->get('carrito_resta/(:any)', 'carrito_controller::resta/$1');