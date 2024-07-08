<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 // $routes->get('/login', 'Login::index');
 // $routes->get('/', 'PartnerMhsController::index');


$routes->get('/', 'HomeMhs::index', ['filter' => 'authAdmin']);
// $routes->get('/', 'HomeMhs::index', ['filter' => 'auth']);

// login
$routes->get('login', 'AuthController::login', ['filter' => 'authAdmin']);
$routes->post('login', 'AuthController::login', ['filter' => 'redirect']);
$routes->get('logout', 'AuthController::logout');

// register
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::register');


// $routes->get('/admin', 'Admin::index');


// Mahasiswa
$routes->group('partner', ['filter' => 'authAdmin'], function ($routes) {

    $routes->get('', 'PartnerMhsController::index');
});

$routes->group('event', ['filter' => 'authAdmin'], function ($routes) {
    $routes->get('', 'EventMhsController::index');
    $routes->get('detail/(:any)', 'EventMhsController::detail/$1');
});

$routes->group('create-event', ['filter' => 'authAdmin'], function ($routes) {
    $routes->get('', 'EventMhsController::viewCreateEvent');
    $routes->post('', 'EventMhsController::create');
});

$routes->group('berita', ['filter' => 'authAdmin'], function ($routes) {
    $routes->get('', 'BeritaMhsController::index');
});

$routes->group('profil',  ['filter' => 'authAdmin'], function ($routes) {
    $routes->get('', 'ProfilMhsController::index');
});
  $routes->group('komunitas', function ($routes) {
    $routes->get('', 'KomunitasMhsController::index');
});



// Admin

$routes->get('admin', 'HomeAdm::index', ['filter' => 'authMhs']);

$routes->get('loginadm', 'AuthControllerAdm::login');
$routes->post('loginadm', 'AuthControllerAdm::login');
$routes->get('logoutadm', 'AuthControllerAdm::logout');

$routes->group('beritaadm', ['filter' => 'authMhs'], function($routes){
    $routes->get('','BeritaAdmController::index');
    $routes->post('','BeritaAdmController::create');
    $routes->post('edit/(:any)', 'BeritaAdmController::edit/$1');
    $routes->get('delete/(:any)', 'BeritaAdmController::delete/$1');
});

$routes->group('eventadm', ['filter' => 'authMhs'], function($routes){
    $routes->get('','EventAdmController::index');
    $routes->post('create','EventAdmController::create');
    $routes->post('edit/(:any)', 'EventAdmController::edit/$1');
    $routes->get('delete/(:any)', 'EventAdmController::delete/$1');
});


$routes->group('verifeventadm', function($routes){
    $routes->get('','VerifEventAdmController::index');
    $routes->post('create','VerifEventAdmController::create');
    $routes->post('accept', 'VerifEventAdmController::accept');
    $routes->post('reject/(:any)', 'VerifEventAdmController::reject/$1');
    $routes->post('pending/(:any)', 'VerifEventAdmController::pending/$1');
    $routes->post('readData/(:any)', 'VerifEventAdmController::readData/$1');
    $routes->post('updateStatus', 'VerifEventAdmController::updateStatus');
});

$routes->group('komunitasadm', ['filter' => 'authMhs'], ['filter' => 'auth'], function($routes){

    $routes->get('','KomunitasAdmController::index');
    $routes->post('','KomunitasAdmController::create');
    $routes->post('edit/(:any)', 'KomunitasAdmController::edit/$1');
    $routes->get('delete/(:any)', 'KomunitasAdmController::delete/$1');
});
