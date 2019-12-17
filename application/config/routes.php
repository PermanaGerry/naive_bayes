<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['/home'] = 'home/hitung';
$route['hasil'] = 'hasilcontroller';

$route['admin']                   = 'admin/dashboard';

$route['admin/gejala']                = 'admin/gejala';
$route['admin/gejala/save']           = 'admin/gejala/store';
$route['admin/gejala/getcode']        = 'admin/gejala/getCode';
$route['admin/gejala/get/(:num)']     = 'admin/gejala/get/$1';
$route['admin/gejala/delete/(:num)']  = 'admin/gejala/delete/$1';

$route['admin/penyebab']                = 'admin/penyebab';
$route['admin/penyebab/save']           = 'admin/penyebab/store';
$route['admin/penyebab/getcode']        = 'admin/penyebab/getCode';
$route['admin/penyebab/get/(:num)']     = 'admin/penyebab/get/$1';
$route['admin/penyebab/delete/(:num)']  = 'admin/penyebab/delete/$1';

$route['admin/penyakit']                = 'admin/penyakit';
$route['admin/penyakit/save']           = 'admin/penyakit/store';
$route['admin/penyakit/getcode']        = 'admin/penyakit/getCode';
$route['admin/penyakit/get/(:num)']     = 'admin/penyakit/get/$1';
$route['admin/penyakit/delete/(:num)']  = 'admin/penyakit/delete/$1';

// index penyebab gejala penyakit

$route['admin/penyakit/penyebab-gejala/([a-z]+[-]+[0-9])']  = 'admin/penyebabgejala';

// gejala penyakit

$route['admin/penyakit/penyebab-gejala/([a-z]+[-]+[0-9])/gejala/delete/(:num)']  = 'admin/penyebabgejala/deletegejala/$1/$2';
$route['admin/penyakit/penyebab-gejala/([a-z]+[-]+[0-9])/gejala/save']  = 'admin/penyebabgejala/storegejala';
$route['admin/penyakit/penyebab-gejala/([a-z]+[-]+[0-9])/gejala']  = 'admin/penyebabgejala/indexgejala';

// penyebab penyakit

$route['admin/penyakit/penyebab-gejala/([a-z]+[-]+[0-9])/penyebab']  = 'admin/penyebabgejala/indexPenyebab';
$route['admin/penyakit/penyebab-gejala/([a-z]+[-]+[0-9])/penyebab/save']  = 'admin/penyebabgejala/storePenyebab';
$route['admin/penyakit/penyebab-gejala/([a-z]+[-]+[0-9])/penyebab/delete/(:num)']  = 'admin/penyebabgejala/deletePenyebab/$1/$2';

$route['admin/penyakit/penyebab-penyebab/([a-z]+[-]+[0-9])/test/(:num)']  = 'admin/penyebabgejala/test/$1';



$route['admin/prefs/interfaces/(:any)'] = 'admin/prefs/interfaces/$1';

