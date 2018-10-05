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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['home'] = 'welcome/home';
$route['login'] = 'welcome/login';
$route['logout'] = 'welcome/logout';
$route['application_form'] = 'welcome/application_form';
$route['confirm'] = 'welcome/confirm';
$route['testing'] = 'welcome/testing';
//$route['test1'] = 'welcome/test1';
$route['test1/(:any)'] = 'welcome/test1/$1';
$route['test2/(:any)'] = 'welcome/test2/$1';
$route['test3/(:any)'] = 'welcome/test3/$1';

//$route['test8/(:any)/(:any)/(:any)'] = 'welcome/test8/$1/$2/$3';
$route['test5'] = 'welcome/test5';
//$route['details/(:any)'] = 'welcome/details/$1';
//$route['booking_id'] = 'welcome/booking_id';
$route['hod'] = 'welcome/hod';
$route['faculty'] = 'welcome/faculty';
$route['modaltest'] = 'welcome/modaltest';
$route['faculty_modal/(:any)'] = 'welcome/faculty_modal/$1';
$route['manager'] = 'welcome/manager';
$route['manager_modal/(:any)'] = 'welcome/manager_modal/$1';
$route['availability_manager'] = 'welcome/availability_manager';
$route['test4/(:any)/(:any)'] = 'welcome/test4/$1/$2';
$route['reject/(:any)/(:any)'] = 'welcome/reject/$1/$2';
//$route['dean'] = 'welcome/dean';
$route['status/(:any)'] = 'welcome/status/$1';
$route['room_status_ac_dean/(:any)/(:any)/(:any)'] = 'welcome/room_status_ac_dean/$1/$2/$3';
$route['room_status_non_ac_dean/(:any)/(:any)/(:any)'] = 'welcome/room_status_non_ac_dean/$1/$2/$3';
//$route['faculty_incharge'] = 'welcome/faculty_incharge';
//$route['caretaker'] = 'welcome/caretaker';
//$route['matrix'] = 'welcome/matrix';
$route['extend/(:any)'] = 'welcome/extend/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
