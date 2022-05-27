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
$route['default_controller']    = 'welcome';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;


$route['dashboard']                 = "ClientCRUD/dashboard";  //client index



//////////////////     client side datatables     ////////////////////
$route['clientCRUD']                 = "ClientCRUD/index";  //client index
$route['clientCRUD_datatables']      = "ClientCRUD/get_data"; //client datatables
$route['clientCRUD_create']          = "ClientCRUD/create";  //client add
$route['clientCRUD_store']           = "ClientCRUD/store";   //server store
$route['clientCRUD_show/(:num)']     = "ClientCRUD/show/$1";  //client show
$route['clientCRUD_edit/(:any)']     = "ClientCRUD/edit/$1";   //client edit
$route['clientCRUD_update/(:any)']   = "ClientCRUD/update/$1";  //server update
$route['clientCRUD_delete/(:any)']   = "ClientCRUD/delete/$1";  //client delete





//////////////////     server side datatables     ////////////////////

$route['itemCRUD']                 = "itemCRUD/index";  //server index
$route['itemCRUD_datatables']      = "itemCRUD/get_items"; //server datatables
$route['itemCRUD_create']          = "itemCRUD/create";  //server add
$route['itemCRUDCreate']           = "itemCRUD/store";   //server store
$route['itemCRUD_show/(:num)']     = "itemCRUD/show/$1";  //server show
$route['itemCRUD_edit/(:any)']     = "itemCRUD/edit/$1";   //server edit
$route['itemCRUD_update/(:any)']   = "itemCRUD/update/$1";  //server update
$route['itemCRUD_delete/(:any)']   = "itemCRUD/delete/$1";  //server delete


$route['api/index']              = "ApiController/storedata";
