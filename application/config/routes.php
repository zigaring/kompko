<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admin';  //admin controller

$route['narocila'] = 'narocila';  //narocila controller

$route['default_controller'] = 'pages/index';  //default = home page
$route['(:any)'] = 'pages/index/$1';     //karkoli vnesemo kot parameter ($1 = placeholder)
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
