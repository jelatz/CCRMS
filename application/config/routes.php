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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Login';
$route['404_override'] = '';

$route['login']['POST'] = 'CCRMS/login';
$route['login']['GET'] = 'CCRMS';

$route['insert']['POST'] = 'CCRMS/insert';
$route['insert']['GET'] = 'CCRMS';

$route['translate_uri_dashes'] = FALSE;

// Login
$route['login']['GET'] = 'Login';
$route['login']['POST'] = 'Login/login';
$route['logout']['GET'] = 'CCRMS/logout';

$route['changepassword']['GET'] = 'CCRMS/changepassword';
$route['changepassword']['POST'] = 'CCRMS/changepassword';

$route['forgot'] = 'CCRMS/forgot';
$route['signup'] = 'Signup';
$route['dashboard'] = 'CCRMS/dashboard';
$route['classrecord'] = 'CCRMS/classrecord';
$route['uploadclass'] = 'CCRMS/uploadclass';
$route['uploadstudent'] = 'CCRMS/uploadstudent';
$route['settings'] = 'CCRMS/settings';
$route['attendance'] = 'CCRMS/attendance';

$route['midterm'] = 'CCRMS/midterm';
$route['prefi'] = 'CCRMS/prefi';
$route['final'] = 'CCRMS/final';
$route['cp'] = 'CCRMS/cp';
$route['periodictest'] = 'CCRMS/periodictest';