<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';

// Login & Dashboard
$route['login'] = 'login';
$route['dashboard'] = 'dashboard';

// -------------------- DASHBOARD PORTOFOLIO ADMIN --------------------
$route['dashboard/portofolio'] = 'dashboard/portofolio';
$route['dashboard/portofolio/tambah'] = 'dashboard/portofolio_tambah';
$route['dashboard/portofolio/tambah_aksi'] = 'dashboard/portofolio_tambah_aksi';
$route['dashboard/portofolio/edit/(:num)'] = 'dashboard/portofolio_edit/$1';
$route['dashboard/portofolio/update'] = 'dashboard/portofolio_update';
$route['dashboard/portofolio/hapus/(:num)'] = 'dashboard/portofolio_hapus/$1';

// -------------------- DASHBOARD ARTIKEL ADMIN --------------------
$route['dashboard/artikel'] = 'dashboard/artikel';
$route['dashboard/artikel_tambah'] = 'dashboard/artikel_tambah';
$route['dashboard/artikel_tambah_aksi'] = 'dashboard/artikel_aksi';
$route['dashboard/artikel_edit/(:num)'] = 'dashboard/artikel_edit/$1';
$route['dashboard/artikel_update'] = 'dashboard/artikel_update';
$route['dashboard/artikel_hapus/(:num)'] = 'dashboard/artikel_hapus/$1';

// -------------------- DASHBOARD LAYANAN --------------------
$route['dashboard/layanan'] = 'dashboard/layanan';
$route['dashboard/layanan/tambah'] = 'dashboard/layanan_tambah';
$route['dashboard/layanan/tambah_aksi'] = 'dashboard/layanan_tambah_aksi';
$route['dashboard/layanan/edit/(:num)'] = 'dashboard/layanan_edit/$1';
$route['dashboard/layanan/update'] = 'dashboard/layanan_update';
$route['dashboard/layanan/hapus/(:num)'] = 'dashboard/layanan_hapus/$1';



// -------------------- FRONTEND --------------------
// Detail artikel berdasarkan slug (HARUS DIATAS page & kategori)
$route['artikel/(:any)'] = 'welcome/single/$1';

// Blog / Frontend
$route['blog'] = 'welcome/blog';
$route['blog/(:num)'] = 'welcome/blog/$1';

// Kategori
$route['kategori/(:any)'] = 'welcome/kategori/$1';
$route['kategori/(:any)/(:num)'] = 'welcome/kategori/$1/$2';

// Search
$route['search'] = 'welcome/search';
$route['search/(:any)'] = 'welcome/search/$1';
$route['search/(:any)/(:num)'] = 'welcome/search/$1/$2';

// Page
$route['page/(:any)'] = 'welcome/page/$1';

// Detail artikel berdasarkan slug
$route['artikel/(:any)'] = 'welcome/single/$1';  // slug frontend

$route['portofolio'] = 'welcome/portofolio';  // List portfolio
$route['portofolio/(:any)'] = 'welcome/portofolio_detail/$1';  // Detail portfolio

$route['dashboard/testimonial_add'] = 'dashboard/testimonial_add';
$route['testimonial'] = 'welcome/testimonial';

$route['layanan'] = 'welcome/layanan';
$route['layanan/(:any)'] = 'welcome/layanan_detail/$1';


// 404
$route['404_override'] = 'welcome/notfound';
$route['translate_uri_dashes'] = FALSE;
