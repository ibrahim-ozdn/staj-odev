<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route["login"]  = "userop/login";
$route["logout"] = "userop/logout";
$route["forgot-password"] = "userop/forget_password";
$route["reset-password"]  = "userop/reset_password";