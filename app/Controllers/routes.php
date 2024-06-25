<?php



$router->get('/', 'IndexController', 'index');


$router->get('/register', 'RegisterController', 'index');
$router->post('/register', 'RegisterController', 'create');

$router->get('/login', 'LoginController', 'index');
$router->post('/login', 'LoginController', 'log');


$router->get('/notes', 'NotesController', 'index');
// // $router->post('/notes', 'create');


$router->post('/logout', 'LoginController', 'logout');
