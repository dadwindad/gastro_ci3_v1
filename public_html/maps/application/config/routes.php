<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'home';
$route['404_override'] = 'the';
$route['translate_uri_dashes'] = FALSE;

////////////////////////////////////////////
$route['calendar'] = "calendar/index";
$route['session'] = "home/session";
$route['about'] = "home/about";
$route['rule'] = "home/rule";
$route['permission'] = "home/permission";

$route['gastro'] = "gastro/index";

$route['getallfile'] = "file/getAllFile";
$route['upload/(:any)/(:any)']['post'] = "file/dragDropUpload/$1/$2";
$route['unlink/(:any)/(:any)/(:any)']['delete'] = "file/unlinkFile/$1/$2/$3";
$route['unlinkid/(:any)/(:any)']['delete'] = "file/unlinkFileID/$1/$2";
$route['getfilename/(:any)/(:any)/(:any)'] = "file/getFilename/$1/$2/$3";

$route['createfolder/(:any)/(:any)']['post'] = "createFolder/uploadFolder/$1/$2";

$route['attraction'] = "attraction/index";
$route['attraction/insert']['post'] = "attraction/insert";
$route['attractionEdit/(:any)'] = "attraction/edit/$1";
$route['attractionUpdate/(:any)']['put'] = "attraction/update/$1";
$route['attraction/delete/(:any)']['delete'] = "attraction/delete/$1";

$route['community'] = "community/index";
$route['community/insert']['post'] = "community/insert";
$route['communityEdit/(:any)'] = "community/edit/$1";
$route['communityUpdate/(:any)']['put'] = "community/update/$1";
$route['community/delete/(:any)']['delete'] = "community/delete/$1";

$route['dish'] = "dish/index";
$route['dish/insert']['post'] = "dish/insert";
$route['dishEdit/(:any)'] = "dish/edit/$1";
$route['dishUpdate/(:any)']['put'] = "dish/update/$1";
$route['dish/delete/(:any)']['delete'] = "dish/delete/$1";

$route['ingredient'] = "ingredient/index";
$route['ingredient/insert']['post'] = "ingredient/insert";
$route['ingredientEdit/(:any)'] = "ingredient/edit/$1";
$route['ingredientUpdate/(:any)']['put'] = "ingredient/update/$1";
$route['ingredient/delete/(:any)']['delete'] = "ingredient/delete/$1";

$route['restaurant'] = "restaurant/index";
$route['restaurant/insert']['post'] = "restaurant/insert";
$route['restaurantEdit/(:any)'] = "restaurant/edit/$1";
$route['restaurantUpdate/(:any)']['put'] = "restaurant/update/$1";
$route['restaurant/delete/(:any)']['delete'] = "restaurant/delete/$1";

$route['zone'] = 'zone/index';
$route['zone/insert']['post'] = "zone/insert";
$route['zone/delete/(:any)']['delete'] = "zone/delete/$1";

$route['api'] = 'api/index';

$route['login'] = 'user/login';
$route['logout'] = 'user/logout';
$route['user'] = 'user/profile';
$route['user/insert']['post'] = 'user/insert';
$route['user/delete/(:any)']['delete'] = "user/delete/$1";

////////////////////////////////////////////
$route['asset'] = "asset/img";