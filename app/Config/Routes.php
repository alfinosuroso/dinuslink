<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeMhs::index');

$routes->get('/admin', 'Admin::index');

$routes->group('partner', function ($routes) {
    $routes->get('', 'PartnerMhsController::index');
});

$routes->group('event', function ($routes) {
    $routes->get('', 'EventMhsController::index');
});

$routes->group('berita', function ($routes) {
    $routes->get('', 'BeritaMhsController::index');
});

$routes->group('profil', function ($routes) {
    $routes->get('', 'ProfilMhsController::index');
});