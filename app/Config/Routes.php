<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('nosotros', 'Home::nosotros');
$routes->get('tienda', 'Home::tienda');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('contacto', 'Home::contacto');
$routes->get('terminos', 'Home::terminos');
$routes->get('producto', 'Home::producto');

// Registro de un nuevo usuario
$routes->get('registro', 'UsuarioController::create');
$routes->post('registrar', 'UsuarioController::formValidation');

// Login de un usuario
$routes->get('login', 'UsuarioController::login');
$routes->post('login', 'UsuarioController::loginValidation');
$routes->get('logout', 'UsuarioController::logout');

// Cliente
$routes->get('cliente', 'ClienteController::index', ['filter'=>'auth']);

// Admin
$routes->get('admin', 'AdminController::index', ['filter' => 'admin']);
$routes->get('/admin/productos', 'AdminController::productos');
$routes->get('/admin/productos/crear', 'ProductoController::create', ['filter' => 'auth']);
$routes->post('admin/productos/crear', 'ProductoController::formValidation');
$routes->get('admin/productos/editar/(:num)', 'ProductoController::edit/$1', ['filter' => 'auth']);
$routes->post('admin/productos/editar/(:num)', 'ProductoController::update/$1', ['filter' => 'auth']);

//Usuario
$routes->get('admin/usuarios', 'UsuarioController::usuarios', ['filter' => 'auth']);