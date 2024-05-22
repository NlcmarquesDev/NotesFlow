<?php


$router->get('/', 'index');

$router->get('/about', 'about');


$router->get('/register', 'registration/show');
$router->post('/register', 'registration/create');

$router->get('/login', 'sessions/show');
$router->post('/login', 'sessions/log');


$router->get('/notes', 'notes/show');
// $router->post('/notes', 'create');


$router->delete('/logout', 'sessions/destroy');
