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
/*
 * Routes for fronend static pages
 */

$route['404'] = 'frontend/Pages/pageNotFound404';
$route['404_override'] = 'frontend/Pages/pageNotFound404';
$route['default_controller'] = 'frontend/pages/home';
$route['account/login'] = 'backend/login';


$route['submitlogin'] = 'backend/login/adminlogin';
$route['dashboard'] = 'backend/Dashboard/index';
$route['register/employee'] = 'frontend/Register/employee';


$route['my-subscribers'] = 'backend/dashboard/mySubscribers';
$route['order-history'] = 'backend/dashboard/orderHistory';
$route['download-center'] = 'backend/dashboard/downloadCenter';
$route['setting'] = 'backend/dashboard/setting';


$route['subscriber-list'] = 'backend/subscriber/subscriberList';
$route['add-subscriber'] = 'backend/subscriber/addSubscriber';


$route['project-list'] = 'backend/project/projectList';
$route['add-project'] = 'backend/project/addProject';
$route['upload-files'] = 'backend/project/uploadFiles';
$route['view-files'] = 'backend/project/browse_files';


$route['download-data'] = 'backend/download_data/index';

$route['product-list'] = 'backend/store/productList';
$route['pending-orders'] = 'backend/store/pendingOrders';
$route['revenue'] = 'backend/store/revenue';

$route['set-store-name'] = 'backend/setting/setStoreName';
$route['payment-details'] = 'backend/setting/paymentDetails';


$route['sync-with-card'] = 'backend/setting/syncWithCard';
$route['logout'] = 'backend/Login/logout';


/*
 * Routes for frontend
 */

$route['home'] = 'frontend/pages/home';
$route['about-us'] = 'frontend/pages/aboutUs';
$route['checkout'] = 'frontend/pages/checkout';
$route['contact-us'] = 'frontend/pages/contactUs';
$route['register'] = 'frontend/pages/register';
$route['support'] = 'frontend/pages/support';
$route['login'] = 'frontend/pages/login';

$route['webservice'] = 'webservice/services/';