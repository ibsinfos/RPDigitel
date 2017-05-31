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

$route['default_controller'] = 'frontend/pages/home';

/*
 * Routes for frontend pages
 */ $route['view/(:any)'] = 'frontend/Vcard/view/$1'; 
$route['pricing'] = 'frontend/pages/pricing';
$route['contact'] = 'frontend/pages/contact';
$route['how-it-works'] = 'frontend/pages/howItWorks';

/*
 * Routes for inner panel
 */
$route['submitlogin'] = 'frontend/login/loginuser';
$route['signup'] = 'frontend/login/registration';
$route['forget-password'] = 'frontend/login/forgetPassword';
$route['submitsignup'] = 'frontend/login/saveUserInfo';
$route['payment'] = 'frontend/payment/index';
//$route['vcard'] = 'frontend/dashboard/createVcard';// start Change By vaishali$route['create-paasport'] = 'frontend/Vcard/index';$route['paasport-update'] = 'frontend/Vcard/updateVcard';$route['paasport-update/(:any)'] = 'frontend/Vcard/updateVcardData/$1';$route['paasport-manage'] = 'frontend/dashboard/manageVcard';$route['main-view/(:any)'] = 'frontend/vcard/main_view/$1';// end Change By vaishali
$route['vcard-edit'] = 'frontend/dashboard/editVcard';//Added by Ranjit on 26 april 2017 to add menu Manage vcard in inner header Start$route['generate-qrcode'] = 'frontend/Generate_qrcode';$route['generate-qrcode/view-qr-code'] = 'frontend/Generate_qrcode/view_qr_code';
$route['update-vcard'] = 'frontend/dashboard/updatevCard';
$route['delete-dynamic-image'] = 'frontend/Dashboard/deleteDynamicImage';
$route['savevcard-step1'] = 'frontend/dashboard/saveVcardStep1';
$route['savevcard-step2'] = 'frontend/dashboard/saveVcardStep2';
$route['savevcard-step3'] = 'frontend/dashboard/saveVcardStep3';
$route['savevcard-step4'] = 'frontend/dashboard/saveVcardStep4';
$route['savevcard-step5'] = 'frontend/dashboard/saveVcardStep5';
$route['savevcard-step6'] = 'frontend/dashboard/saveVcardStep6';
$route['savevcard-step7'] = 'frontend/dashboard/saveVcardStep7';
$route['savevcard-step8'] = 'frontend/dashboard/saveVcardStep8';
$route['checkExistEmail'] = 'frontend/login/emailExist';
$route['login'] = 'frontend/login/index';//Added by Ranjit on 25April2017 to add link on paasport page (go to dashboard)$route['login_from_rpdigitel'] = 'frontend/login/loginuser';
$route['dashboard'] = 'frontend/dashboard/index';
$route['appointments'] = 'frontend/appointments/index';
$route['add-appointment/(:any)'] = 'frontend/appointments/addNewAppointment/$1';
$route['saveAppointment'] = 'frontend/appointments/saveAppointment';
$route['textmsg'] = 'frontend/TextMsg/index';//Added by ranjit on 11May17$route['emailcampaign'] = 'frontend/EmailCampaign/index';
$route['textmsg/(:any)'] = 'frontend/TextMsg/index/$1';
$route['edit-textmsg/(:any)'] = 'frontend/TextMsg/editTxtmsg/$1';
$route['edit_sendtextsms'] = 'frontend/TextMsg/updateTxtmsg';
$route['delete_sendtextsms/(:any)'] = 'frontend/TextMsg/deleteTxtmsg/$1';
$route['contacts'] = 'frontend/contacts/index';
$route['contacts/(:any)'] = 'frontend/contacts/index/$1';
$route['contacts/index/(:any)'] = 'frontend/contacts/index/$1';
$route['new-optinlist'] = 'frontend/contacts/optinList';
$route['edit-optinlist/(:any)'] = 'frontend/contacts/editOptinList/$1';
$route['delete-optinlist/(:any)'] = 'frontend/contacts/deleteOptinList/$1';
$route['delete-optinlist-user/(:any)'] = 'frontend/contacts/deleteOptinListUser/$1';
$route['optinlist-users/(:any)'] = 'frontend/contacts/optinlistUsers/$1';
$route['update-optinlist'] = 'frontend/contacts/updateOptinList';
$route['logout'] = 'frontend/login/logout';
$route['generate-vcard'] = 'frontend/dashboard/generate_card';
$route['generate-vcard/(:any)'] = 'frontend/dashboard/generate_card/$1';
$route['contactme'] = 'frontend/ClientsVcard/clientContactForm';


$route['getshorturl'] = 'frontend/TextMsg/shortUrl';
/*
 * Routes for text message
 */
$route['newtemplate'] = 'frontend/TextMsg/saveSmsTemplate';
$route['updateemplate'] = 'frontend/TextMsg/updateSmsTemplate';
$route['deletetemplate'] = 'frontend/TextMsg/deleteSmsTemplate';
$route['sendtextsms'] = 'frontend/TextMsg/sendTextMsg';

$route['email_activation/(:any)'] = 'frontend/login/emailVerify/$1';

$route['share/(:any)'] = 'frontend/ClientsVcard/share/$1';

$route['autoresponder'] = 'frontend/AutoResponder/index';
$route['autoresponder/(:any)'] = 'frontend/AutoResponder/index/$1';
$route['autoresponder/index/(:any)'] = 'frontend/AutoResponder/index/$1';
$route['new-autoresponder'] = 'frontend/AutoResponder/newAutoResponder';
$route['add-auto-responder'] = 'frontend/AutoResponder/addNewAutoResponder';
$route['edit-auto-responder/(:any)'] = 'frontend/AutoResponder/editAutoResponder/$1';
$route['update-auto-responder'] = 'frontend/AutoResponder/updateAutoResponder/$1';
$route['delete-auto-responder/(:any)'] = 'frontend/AutoResponder/deleteAutoResponder/$1';

$route['birthday-list'] = 'frontend/Birthday/index';
$route['inbox-list'] = 'frontend/Inbox/index';
$route['keywords-list'] = 'frontend/Keywords/index';
$route['mms-list'] = 'frontend/Mms/index';
$route['scheduled-task'] = 'frontend/Tasks/index';
$route['scheduled-task/index'] = 'frontend/Tasks/index';
$route['scheduled-task/index/(:any)'] = 'frontend/Tasks/index/$1';

 
/*
 * Routes for backend admin panel
 */
$route['backedn/login'] = 'backend/Login/index';
$route['backend/global-setting'] = 'backend/Global_setting/listGlobalSettings';
$route['backend/global-settings/edit/(:any)'] = "backend/global_setting/editGlobalSettings/$1";

/* * Manage email template Start */
$route['backend/email-template/list'] = "backend/email_template/index";
$route['backend/edit-email-template/(:any)'] = "backend/email_template/editEmailTemplate/$1";
/* * Manage email template End */

/* * Manage pricing plans routes */
$route['backend/pricing-plans/list'] = "backend/pricing_plan/planList";
$route['backend/pricing-plans/add'] = "backend/pricing_plan/addPlan";
$route['backend/pricing-plans/edit'] = "backend/pricing_plan/editPlan";
$route['backend/pricing-plans/edit/(:any)'] = "backend/pricing_plan/editPlan/$1";
/* * Manage email template End */


/* * Manage users routes */
$route['backend/users/add'] = "backend/Users/addUser";
$route['backend/users/list'] = "backend/Users/userList";
$route['backend/user/detail/(:any)'] = "backend/users/userDetails/$1";

$route['backend/cms/add'] = "backend/cms/cmsPage";

$route['backend/cms/list'] = "backend/cms/listCMS";

$route['backend/cms/edit'] = "backend/cms/editCMS";

$route['backend/cms/edit/(:any)'] = "backend/cms/editCMS/$1";
/* * Manage email template End */

$route['crontxtms.html'] = "cronejob/cronjob/cronTextMsg";
$route['autoresponder.html'] = "cronejob/cronjob/cronAutoResponder";
$route['appointment.html'] = "cronejob/cronjob/cronAppointment";
$route['homepage'] = 'frontend/Pages/home';
$route['404'] = 'frontend/Pages/pageNotFound404';
$route['404_override'] = 'frontend/Pages/pageNotFound404';
$route['(:any)'] = 'frontend/ClientsVcard/index/$1';
/*$route['translate_uri_dashes'] = FALSE;*/
