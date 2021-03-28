<?php namespace Config;

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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->post('cw_admin/account/edit', 'Cw_admin/Account::save');
$routes->get('/', 'Home::index');
$routes->get('activ', 'Home::activ');
// $routes->get('products', 'Home::tab');
// $routes->get('move-on', 'Home::move_on');
// $routes->get('break', 'Home::break_free');
// $routes->get('mood', 'Home::mood_up');
$routes->get('articles', 'Article::index');
$routes->get('article/(:any)', 'Article::single/$1');
$routes->get('faq', 'Faq::index');
$routes->get('produk', 'Produk::index');
$routes->get('team-mizone', 'Team::index');
$routes->get('events', 'Event::index');
$routes->get('event/(:any)', 'Event::single/$1');
$routes->get('kebijakan-privasi', 'Privacy::index');
// $routes->get('mood', 'Home::mood_up');
// $routes->get('product/(:any)', 'Home::product/$1');
// $routes->get('products-all', 'Home::product_all');
$routes->group('api', function($routes)
{
    $routes->post('contact', 'Contact::submit');
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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
