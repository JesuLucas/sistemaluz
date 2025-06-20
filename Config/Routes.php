<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/login', 'Home::login');
$routes->post('/verificaracceso', 'Home::verificarAcceso');
$routes->get('/cerrarsesion', 'Home::cerrarSesion');

$routes->group('',['filter'=>'auth'], function($routes){

$routes->get('/', 'Home::index');
// Acceso a las vistas, controladores y modelos de los puestos
$routes->get('/puestos', 'PuestoController::index');
$routes->get('/puestos/crear', 'PuestoController::crear');
$routes->post('/puestos/guardar', 'PuestoController::guardar');
$routes->get('/puestos/eliminar/(:num)', 'PuestoController::eliminar/$1');
$routes->get('/puestos/editar/(:num)', 'PuestoController::editar/$1');
$routes->post('/puestos/actualizar/(:segment)', 'PuestoController::actualizar/$1');
// Acceso a las vistas, controladores y modelos de los empleados 
$routes->get('/empleados', 'EmpleadoController::index');
$routes->get('/empleados/crear', 'EmpleadoController::crear');
$routes->post('/empleados/guardar', 'EmpleadoController::guardar');
$routes->get('/empleados/eliminar/(:num)', 'EmpleadoController::eliminar/$1');
$routes->get('/empleados/editar/(:num)', 'EmpleadoController::editar/$1');
$routes->post('/empleados/actualizar/(:segment)', 'EmpleadoController::actualizar/$1');

$routes->get('/entradas_salidas', 'EntradasSalidasController::index');
$routes->get('/entradas_salidas/(:num)', 'EntradasSalidasController::listar/$1');

$routes->get('/reportes', 'EntradasSalidasController::reportes');
$routes->post('/reportes', 'EntradasSalidasController::reportes');

});



$routes->get('/checador', 'ChecadorController::index');
$routes->post('/checador', 'ChecadorController::verificarClave');

$routes->get('/revisar', 'ChecadorController::revisarEntradasSalidas');
$routes->post('/revisar', 'ChecadorController::buscarEntradasSalidas');






