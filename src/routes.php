<?php
// Define routes as an associative array
$routes = [
    // Add more routes here as needed
    '' => ['controller' => 'HomeController', 'action' => 'index'],
    'news' => ['controller' => 'NewsController', 'action' => 'news'],
    'news/detail' => ['controller' => 'NewsController', 'action' => 'detail'],
    'login' => ['controller' => 'LoginController', 'action' => 'show'],
    'login/submit' => ['controller' => 'LoginController', 'action' => 'login'],
];

