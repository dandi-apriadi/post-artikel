<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Dashboard
$route['dashboard'] = 'Dashboard';
$route['change-pass'] = 'Dashboard/change_pass';
$route['logout'] = 'Dashboard/logout';

$route['default_controller'] = 'Homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Register
$route['register'] = 'Register';
$route['verification'] = 'Register/verify';

//Karyawan
$route['karyawan/add-karyawan'] = 'Karyawan/addKaryawan';
$route['karyawan/list'] = 'Karyawan/list';
$route['karyawan/edit/(:num)'] = 'Karyawan/edit/$1';
$route['karyawan/delete/(:num)'] = 'Karyawan/delete/$1';
$route['karyawan/deletedata/(:num)'] = 'Karyawan/deleteData/$1';

//barang
$route['barang/daftar-barang'] = 'Barang';
$route['barang/tambah-barang'] = 'Barang/tambah';
$route['barang/detail/(:num)'] = 'Barang/detail/$1';

//owner
$route['owner/list'] = 'Owner/list';


//kasir
$route['kasir/tambah-pesanan'] = 'Kasir/tambah';