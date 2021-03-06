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
$route['default_controller']    = "siteController";
$route['produtos/(:num)']       = "funcionarioController/produtos/$1";
$route['produtos/(:num)']       = "administradorController/produtos/$1";
$route['produtos/p']             = "administradorController/produtos";
$route['produtos/p/(:num)']      = "administradorController/produtos";
$route['usuario/(:num)']        = "administradorController/usuario/$1";
$route['usuario/p']             = "administradorController/usuario";
$route['usuario/p/(:num)']      = "administradorController/usuario";
$route['clientes/(:num)']       = "administradorController/clientes/$1";
$route['clientes/p']             = "administradorController/clientes";
$route['clientes/p/(:num)']      = "administradorController/clientes";
$route['fornecedores/(:num)']   = "administradorController/fornecedores/$1";
$route['fornecedores/p']             = "administradorController/fornecedores";
$route['fornecedores/p/(:num)']      = "administradorController/fornecedores";
$route['categorias/(:num)']     = "administradorController/categorias/$1";
$route['categorias/p']             = "administradorController/categorias";
$route['categorias/p/(:num)']      = "administradorController/categorias";
$route['LoginCliente/(:num)']   = "siteController/LoginCliente/$1";
$route['LogarCliente/(:num)']   = "siteController/LogarCliente/$1";
$route['LogarUsuario/(:num)']   = "siteController/LogarUsuario/$1";
$route['verificarNivel']        = "loginController/verificarNivel";
$route['get_datatable_data']    = "administradorController/DataTableDinamico";
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
