<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
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

//Product Routes
$routes->get('product', 'ProductController::index');

//SubCategory Routes
$routes->get('subcategory', 'SubCategoryController::index');
$routes->match(['get','post'],'subcategory/delete/(:any)', 'SubCategoryController::delete/$1');
$routes->match(['get','post'],'subcategory/update/(:any)', 'SubCategoryController::update/$1');
$routes->get('subcategory/edit/(:any)', 'SubCategoryController::edit/$1');


//Category Routes
$routes->get('category', 'CategoryController::index');
$routes->match(['get','post'],'category/delete/(:any)', 'CategoryController::delete/$1');
$routes->match(['get','post'],'category/update/(:any)', 'CategoryController::update/$1');
$routes->get('category/edit/(:any)', 'CategoryController::edit/$1');

//User Routes
$routes->match(['get','post'], 'user/register', 'UserController::register');
$routes->get('/logout', 'UserController::logout');
$routes->get('user/view', 'UserController::view');
$routes->get('user/login', 'UserController::login');
$routes->get('user', 'UserController::index');
$routes->get('/', 'PagesController::index');
$routes->get('(:any)', 'PagesController::view/$1');





//$routes->get('(:any)', 'User/Users::view/$1');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
