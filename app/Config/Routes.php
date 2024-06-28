<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeMhs::index');

$routes->get('/admin', 'Admin::index');