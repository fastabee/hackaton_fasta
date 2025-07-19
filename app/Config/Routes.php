<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('tes_mpdf', 'Home::mpdf_tes');
$routes->get('tes_excell', 'Home::tes_excell');

$routes->get('login', 'Login::index');


//login
$routes->post('proses_login', 'Login::login');
$routes->get('logout', 'Login::logout');

//dashboard
$routes->get('dashboard', 'Home::index2');

//halte
$routes->get('datamaster/halte', 'Halte::index');
$routes->post('insert_halte', 'Halte::insert');
$routes->post('update_halte', 'Halte::update');
$routes->post('delete_halte', 'Halte::delete');
$routes->post('import/halte', 'Halte::import');
