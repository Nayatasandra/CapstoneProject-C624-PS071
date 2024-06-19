<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('online');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Default route
// $routes->get('/', 'Home::index');

$routes->get('/', 'Home::index');
$routes->get('/register', 'Register::index');
$routes->post('/insert_user', 'Register::insert_user');
$routes->get('/login', 'Login::index');
$routes->post('/auth', 'Home::auth');
$routes->get('/hrd', 'HrdController::hrd');
$routes->get('/supplier1', 'SupplierController::supplier');
$routes->get('/stok', 'StokController::stok');
$routes->get('/produksi', 'ProduksiController::produksi');
$routes->get('/penjualan1', 'PenjualanController::penjualan');
$routes->get('/distributor1', 'DistributorController::distributor');

$routes->delete('/karyawan/(:num)', 'Karyawan::delete/$id');
$routes->delete('/penjualan/(:num)', 'Penjualan::delete/$id');
$routes->delete('/persediaan/(:num)', 'Persediaan::delete/$id');
$routes->delete('/produksi/(:num)', 'Produksi::delete/$id');
$routes->delete('/supplier/(:num)', 'Supplier::delete/$id');
$routes->delete('/customer/(:num)', 'Customer::delete/$id');



$routes->delete('/profile/(:num)', 'Profile::delete/$id');
$routes->delete('/kamar/(:num)', 'Kamar::delete/$id');
#$routes->delete('/tipekamar/(:num)', 'Tipekamar::delete/$id');
$routes->delete('/tamu/(:num)', 'Tamu::delete/$id');
$routes->delete('/checkin/(:num)', 'Checkin::delete/$id');
$routes->get('/checkin/export', 'Checkin::export');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
