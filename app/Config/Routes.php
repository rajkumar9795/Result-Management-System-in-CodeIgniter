<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('jskjhdUjsa65', 'Home::adminlogin');

$routes->get('studentresult/(:num)', 'Home::result/$1');
$routes->post('login', 'Login::LoginUser');
$routes->post('getmarksheet', 'Home::getmarksheet');
//========== Admin===============
$routes->get('dashboard', 'Admin::index',['filter' => 'auth']);
$routes->get('courseindex', 'Admin::courseindex',['filter' => 'auth']);
$routes->get('courseadd', 'Admin::courseadd',['filter' => 'auth']);
$routes->post('coursesave', 'Admin::coursesave',['filter' => 'auth']);
$routes->get('subjectindex', 'Admin::subjectindex',['filter' => 'auth']);
$routes->get('subjectadd', 'Admin::subjectadd',['filter' => 'auth']);
$routes->post('subjectsave', 'Admin::subjectsave',['filter' => 'auth']);
$routes->get('subjectedit/(:num)', 'Admin::subjectadd/$1', ['filter' => 'auth']);
$routes->post('getsubject', 'Admin::getSubject');
$routes->get('studentindex', 'Admin::studentindex', ['filter' => 'auth']);
$routes->get('studentadd', 'Admin::studentadd', ['filter' => 'auth']);
$routes->post('studentadd', 'Admin::studentadd', ['filter' => 'auth']);
$routes->post('studentsave', 'Admin::studentsave',['filter' => 'auth']);
$routes->get('studentedit/(:num)', 'Admin::studentedit/$1',['filter' => 'auth']);
$routes->get('admissionindex', 'Admin::admissionindex',['filter' => 'auth']);
$routes->post('getsinglestu', 'Admin::getsinglestu',['filter' => 'auth']);
$routes->post('saveadmission', 'Admin::saveadmission',['filter' => 'auth']);
$routes->get('admissionlist/(:any)', 'Admin::admissionlist/$1');
$routes->get('result', 'Admin::result',['filter' => 'auth']);
$routes->post('resultsave', 'Admin::resultsave',['filter' => 'auth']);
$routes->get('getresultlist/(:num)/(:num)', 'Admin::getResultList/$1/$2',['filter' => 'auth']);
$routes->get('marksentry/(:num)/(:num)', 'Admin::marksentry/$1/$2',['filter' => 'auth']);
$routes->post('markssave', 'Admin::markssave',['filter' => 'auth']);
$routes->get('marksedit/(:num)', 'Admin::marksedit/$1',['filter' => 'auth']);
$routes->get('admitcard', 'Admin::admitcard', ['filter' => 'auth']);
$routes->get('resultprint', 'Admin::resultprint', ['filter' => 'auth']);
$routes->post('searchreg', 'Admin::searchReg');
$routes->get('marksheetadmin/(:num)/(:num)', 'Admin::marksheetadmin/$1/$2', ['filter' => 'auth']);
$routes->get('diploma/(:num)', 'Admin::diploma/$1/$2', ['filter' => 'auth']);
$routes->get('delmarksentry/(:num)/(:num)', 'Admin::delmarksentry/$1/$2', ['filter' => 'auth']);
$routes->get('deladmission/(:num)', 'Admin::deladmission/$1', ['filter' => 'auth']);
$routes->get('logout', 'Login::logout');