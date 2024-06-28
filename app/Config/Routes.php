<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeMhs::index');

$routes->get('/admin', 'Admin::index');

// $routes->get('/login', 'Login::index');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login', ['filter' => 'redirect']);
$routes->get('logout', 'AuthController::logout');