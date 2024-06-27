<?php



$router->get('/', 'IndexController', 'index');


$router->get('/register', 'RegisterController', 'index');
$router->post('/register', 'RegisterController', 'create');

$router->get('/login', 'LoginController', 'index');
$router->post('/login', 'LoginController', 'log');


$router->get('/notes', 'NotesController', 'index');
$router->post('/notes', 'NotesController', 'create');
$router->delete('/notes', 'NotesController', 'delete');

$router->get('/note', 'NotesController', 'delete');
$router->post('/edit-note', 'NotesController', 'edit');

$router->post('/logout', 'LoginController', 'logout');
