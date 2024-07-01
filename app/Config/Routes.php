<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 // $routes->get('/login', 'Login::index');
 // $routes->get('/', 'PartnerMhsController::index');


$routes->get('/', 'HomeMhs::index');
// $routes->get('/', 'HomeMhs::index', ['filter' => 'auth']);

// login
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login', ['filter' => 'redirect']);
$routes->get('logout', 'AuthController::logout');



$routes->get('/admin', 'Admin::index');

$routes->group('partner', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'PartnerMhsController::index');
});

$routes->group('event', function ($routes) {
    $routes->get('', 'EventMhsController::index');
});

$routes->get('create-event', 'EventMhsController::viewCreateEvent');

$routes->group('berita', function ($routes) {
    $routes->get('', 'BeritaMhsController::index');
});

$routes->group('profil', function ($routes) {
    $routes->get('', 'ProfilMhsController::index');
});