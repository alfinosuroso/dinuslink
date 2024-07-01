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



// $routes->get('/admin', 'Admin::index');

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

$routes->get('admin', 'HomeAdm::index');

$routes->get('loginadm', 'AuthControllerAdm::login');
$routes->post('loginadm', 'AuthControllerAdm::login');
$routes->get('logoutadm', 'AuthControllerAdm::logout');

$routes->group('beritaadm', function($routes){
    $routes->get('','BeritaAdmController::index');
    $routes->post('','BeritaAdmController::create');
    $routes->post('edit/(:any)', 'BeritaAdmController::edit/$1');
    $routes->get('delete/(:any)', 'BeritaAdmController::delete/$1');
});

$routes->group('eventadm', function($routes){
    $routes->get('','EventAdmController::index');
    $routes->post('','EventAdmController::create');
    $routes->post('edit/(:any)', 'EventAdmController::edit/$1');
    $routes->get('delete/(:any)', 'EventAdmController::delete/$1');
});

$routes->group('komunitas', ['filter' => 'auth'], function($routes){
    $routes->get('','KomunitasController::index');
    $routes->post('','KomunitasController::create');
    $routes->post('edit/(:any)', 'KomunitasController::edit/$1');
    $routes->get('delete/(:any)', 'KomunitasController::delete/$1');
});