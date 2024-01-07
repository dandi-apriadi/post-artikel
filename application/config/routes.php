<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Dashboard
$route['dashboard'] = 'Dashboard';
$route['change-pass'] = 'Dashboard/change_pass';
$route['logout'] = 'Dashboard/logout';
$route['working'] = 'Dashboard/working';
$route['profile'] = 'Dashboard/profile';
$route['inactive'] = 'Dashboard/inactive';

//homepage
$route['testing'] = 'Homepage/testing';
$route['default_controller'] = 'Homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['about'] = 'Homepage/about';
$route['artikels'] = 'Homepage/artikels';
$route['kontak'] = 'Homepage/kontak';
$route['support'] = 'Homepage/support';
$route['login'] = 'Homepage/login';
$route['artikel/(:any)'] = 'Homepage/artikel/$1';
$route['registrasi'] = 'Homepage/register';
$route['verification/(:any)'] = 'Homepage/verification/$1';
$route['forgotpass'] = 'Homepage/forgot';
$route['new-password/(:any)'] = 'Homepage/newPassword/$1';

//Artikel
$route['artikel'] = 'Artikel';
$route['artikel-template/(:any)'] = 'Artikel/template/$1';
$route['artikel-create/(:any)'] = 'Artikel/create/$1';
$route['artikel-edit/(:any)'] = 'Artikel/editing/$1';

//support 
$route['support-bank'] = 'Support/bank';
$route['support-crypto'] = 'Support/crypto';

//admin
$route['template-management'] = 'Admin/templateManagement';
$route['add-template-proses'] = 'Admin/addTemplate';
