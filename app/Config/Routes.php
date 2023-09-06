<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->match(['get', 'post'], 'notices/insert',  'Notices::insert');
$routes->match(['get', 'post'], 'notices/edit/(:num)',  'Notices::edit/$1');
$routes->match(['get', 'post'], 'notices/delete/(:num)',  'Notices::delete/$1');
$routes->match(['get', 'post'], 'notices/save',  'Notices::save');
$routes->get('login',   'Users::index');
$routes->post('login',   'Users::login');
$routes->get('logout',   'Users::logout');
$routes->get('notices',   'Notices::index');
$routes->get('notices/(:segment)', 'Notices::item/$1');
$routes->get('cleanCache',   'Pages::cleanCache');
$routes->get('addCache',   'Pages::addCache');
$routes->get('removeCache',   'Pages::removeCache');
$routes->get('notices',   'Notices::index');
$routes->get('/',   'Users::login');
$routes->get('(:any)', 'Pages::show/$1');
