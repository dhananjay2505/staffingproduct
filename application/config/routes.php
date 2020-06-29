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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*business section*/
$route['login-business'] = 'Employerlogin/index';
$route['business-login-otp'] = 'Loginotpbusiness/index';

$route['check-otp-validation'] = 'Loginotpbusiness/businessgetnumbermodel';

$route['check-validation'] = 'Loginotpbusiness/businessotplogin';

$route['register-business'] = 'Employer/index';

/*number check*/

/*$route['business-login-otp'] = 'Loginotpbusiness/businessgetnumbermodel/';*/

$route['ajax-otp_check_registration']['post'] = 'Otp_function/otp_check_registration/';
$route['otp']['post'] = 'Forget/otppage/';
$route['otperror']['post'] = 'Forget/otperror/';

$route['userlogout']['post'] = 'Register/logout/';
$route['insert-post']['post'] = 'Jobpost/insertbusinesspostdata';
$route['profilecandidate-insert']['post'] = 'profilecandidate/insertpersonaldata/';
$route['get-prifile-info']['post'] = 'Businessprofile/getprifileinfo/';
$route['getdata-for-profile']['post'] = 'businessprofile/getdataforprofile/';

$route['number-validation']['post'] = 'Loginotp/numbervalidation/';

$route['insert-experience']['post'] = 'profilecandidate/insertexperience/';
$route['addmore-experience']['post'] = 'profilecandidate/addmoreexperience/';
$route['get-data'] = 'profilecandidate/getdata/';
$route['insert-preferance']['post'] = 'profilecandidate/insertpereferenrcedata';
$route['update-exprence-data']['post'] = 'profilecandidate/updateexprencedata';
$route['delete-exprence-data']['post'] = 'profilecandidate/deleteexprencedata';
$route['update-education-data']['post'] = 'profilecandidate/updateeducationdata';
$route['delete-education-data']['post'] = 'profilecandidate/deleteeducationdata';
$route['login']['post'] = 'login/loginuser/';
$route['get-education-data'] = 'profilecandidate/educationdatagetonload/';
$route['education-section-data']['post'] = 'profilecandidate/inserteducationsectiondata/';
$route['educationsection-foraddmore']['post'] = 'profilecandidate/educationsectionforaddmore/';
$route['deducationdelete-data']['post'] = 'profilecandidate/deducationdeleteexprencedata';
$route['update-education-section']['post'] = 'profilecandidate/updateeducationsectionfor';
$route['upload-image-using-ajax'] = "Profilecandidate/uploadImage";
$route['fetch-image'] = "Profilecandidate/fetchimage";
$route['delete-image'] = "Profilecandidate/deleteprofimage";
$route['profile-upload'] = "Profilecandidate/profileuploadImage";
$route['profile-fetch-image'] = "Profilecandidate/profilefetchimage";
$route['profile-delete-image'] = "Profilecandidate/deleteprofimagedata";
$route['jobdetails/(:num)'] = "Jobdetails";
$route['jobsearch/(:num)'] = "Jobsearch";
$route['Jobsearch/(:any)'] = "Jobsearch/fetch_search";
$route['Jobsearch/(:any)'] = "Jobsearch/getdisplaydata/";



