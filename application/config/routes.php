<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//user routes
$route['users/register'] = 'users/register';
$route['posts'] = 'posts/index';
$route['default_controller'] = 'home/index';



//admin routs
$route['administrator'] = 'administrator/view';
$route['administrator/home'] = 'administrator/home';
$route['administrator/index'] = 'administrator/view';
$route['administrator/forget-password'] = 'administrator/forget_password';

$route['administrator/dashboard'] = 'administrator/dashboard';

$route['administrator/change-password'] = 'administrator/get_admin_data';
$route['administrator/update-profile'] = 'administrator/update_admin_profile';

$route['administrator/users/add-user'] = 'administrator/add_user';
$route['administrator/users'] = 'administrator/users';
$route['administrator/users/update-user/(:any)'] = 'administrator/update_user/$1';


$route['administrator/site-configuration/payment-gateway-integration'] = 'administrator/payment_gateway_integration';
$route['administrator/site-configuration/payment-gateway-integration/update'] = 'administrator/payment_gateway_integration_update';

$route['administrator/campaign-listing'] = 'administrator/campaign_listing';

$route['administrator/site-configuration'] = 'administrator/get_siteconfiguration';
$route['administrator/site-configuration/update/(:any)'] = 'administrator/update_siteconfiguration/$1';
$route['/home'] = 'home/index';
$route['/'] = 'home/index';
$route['(:any)'] = 'home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;










