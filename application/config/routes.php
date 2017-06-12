<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['default_controller'] = "user/login"; 
$route['default_controller'] = "user/fiberrails"; 

$route['404_override'] = '';


$route['admin'] = 'admin/login';


$route['login'] = 'user/login';
$route['otp'] = 'user/otp/index';
$route['login/logout'] = 'user/login/logout';
$route['login/signup'] = 'user/login/signup';
$route['fiberrails'] = 'user/fiberrails';
$route['subscription'] = 'user/fiberrails/subscription';
$route['check_out'] = 'user/fiberrails/checkout';
$route['main_dashboard'] = 'user/fiberrails/main_dashboard';
$route['silo_sd'] = 'user/silo_sd';
$route['wbs_suite'] = 'user/wbs_suite';
$route['silo_wallet'] = 'user/silo_wallet';
$route['silo_bank'] = 'user/silo_bank';
$route['wbs_suite/wbs_subscribe'] = 'user/wbs_suite/wbs_subscribe';
$route['paasport'] = 'paasport/signup';
$route['wbs_suite/wbs_subscribe_payment_success'] = 'user/wbs_suite/wbs_subscribe_payment_success';
$route['wbs_suite/wbs_subscribe_payment_fail'] = 'user/wbs_suite/wbs_subscribe_payment_fail';

/* Silo routs */
$route['404'] = 'frontend/Pages/pageNotFound404';
$route['admin/login'] = 'backend/login';
$route['account/login'] = 'backend/login';
$route['submitlogin'] = 'backend/login/adminlogin';
$route['dashboard'] = 'backend/Dashboard/index';
$route['admin_dashboard'] = 'backend/Dashboard/admin_dashboard';
$route['register/employee'] = 'frontend/Register/employee';
$route['my-subscribers'] = 'backend/dashboard/mySubscribers';
$route['order-history'] = 'backend/dashboard/orderHistory';
$route['download-center'] = 'backend/dashboard/downloadCenter';

$route['setting'] = 'backend/dashboard/setting';


$route['subscriber-list'] = 'backend/subscriber/subscriberList';
$route['add-subscriber'] = 'backend/subscriber/addSubscriber';


$route['project-list'] = 'backend/project/projectList';
$route['add-project'] = 'backend/project/addProject';
$route['add-news'] = 'backend/news/add_news';
$route['add_latest_news'] = 'backend/news/add_latest_news';
$route['add_featured_news'] = 'backend/news/add_featured_news';
$route['featured_news'] = 'backend/news/featured_news';
$route['latest_news'] = 'backend/news/latest_news';
$route['add_category_news'] = 'backend/news/add_category_news';
$route['edit_header_news/(:any)'] = 'backend/news/edit_header_news/$1';
$route['edit-news/(:any)'] = 'backend/news/edit_news/$1';
$route['admin-community'] = 'backend/news/community';
$route['news'] = 'backend/news/view_news';
$route['header_news'] = 'backend/news/header_news';
$route['category_news'] = 'backend/news/category_news';
$route['category'] = 'backend/news_category/index';
$route['add-category'] = 'backend/news_category/add_category';
$route['edit-category/(:any)'] = 'backend/news_category/edit_category/$1';
$route['add-slider'] = 'backend/community_slider/add_slider';
$route['view-slider'] = 'backend/community_slider/view_slider';
$route['edit-slider/(:any)'] = 'backend/community_slider/edit_slider/$1';

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
$route['community'] = 'backend/Community/community';


/*
 * Routes for frontend
 */

$route['home'] = 'frontend/pages/home';
$route['about-us'] = 'frontend/pages/aboutUs';
$route['checkout'] = 'frontend/pages/checkout';
$route['contact-us'] = 'frontend/pages/contactUs';
$route['register'] = 'frontend/pages/register';
$route['support'] = 'frontend/pages/support';
//$route['silo_login'] = 'frontend/pages/login';


/* End of file routes.php */
/* Location: ./application/config/routes.php */