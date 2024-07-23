<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// base
$routes->get('/', 'Auth::Home', ['filter' == 'AuthFilter']);
$routes->get('/FogetAccount', 'Auth::ForgetPage');
$routes->get('/logout', 'Auth::Logout');
$routes->post('/SysRegis', 'Auth::SysRegis');
$routes->post('/SysLogin', 'Auth::SysLogin');

// profile page
$routes->get('/Profile', 'Auth::Profile');
$routes->get('/EditProfile', 'Auth::EditProfile');

// user page
$routes->get('/DashboardUser', 'User::index');
$routes->get('/PresensiGuruUser', 'User::PresensiGuru');
$routes->get('/PresensiJadwalUser', 'User::Jadwal');



// admin
$routes->get('/DashboardAdmin', 'Admin::index');

$routes->get('/LevelAccessAdmin', 'Admin::LevelAccess');
$routes->post('/CreateLevelAccess', 'Admin::CreateLevelAccess');
$routes->post('/DelLevelAccess', 'Admin::DelLevelAccess');

$routes->get('/PresensiGuruAdmin', 'Admin::PresensiGuru');

$routes->get('/DataGuruAdmin', 'Admin::DataGuru');
$routes->post('/TambahDataGuruAdmin', 'Admin::TambahDataGuru');

$routes->get('/DataUserAdmin', 'Admin::DataUser');
$routes->post('/TambahUserAdmin', 'Admin::TambahUser');


$routes->get('/forbidden', 'Auth::forbidden');
