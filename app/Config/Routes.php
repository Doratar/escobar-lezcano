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
$routes->get('registro', 'Home::registro');
$routes->post('registrar', 'Home::registrarUsuario');
