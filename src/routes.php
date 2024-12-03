<?php
// Define routes as an associative array
$routes = [
    // Add more routes here as needed
    '' => ['controller' => 'HomeController', 'action' => 'index'],
    'news' => ['controller' => 'NewsController', 'action' => 'news'],
    'news/detail' => ['controller' => 'NewsController', 'action' => 'detail'],
    'login' => ['controller' => 'LoginController', 'action' => 'show'],
    'login/submit' => ['controller' => 'LoginController', 'action' => 'login'],
    'register' => ['controller' => 'RegisterController', 'action' => 'show'],
    'register/submit' => ['controller' => 'RegisterController', 'action' => 'register'],
    'orderhistory' => ['controller' => 'OrderHistoryController', 'action' => 'order_history'],
    'logout' => ['controller' => 'LoginController', 'action' => 'logout'],
    'order' => ['controller' => 'OrderController', 'action' => 'order'],
    'order/detail' => ['controller' => 'OrderController', 'action' => 'detail'],
    'customers' => ['controller' => 'CustomerController', 'action' => 'customers'],
    'products' => ['controller' => 'ProductController', 'action' => 'products'],
    'addproduct' => ['controller' => 'ProductController', 'action' => 'show'],
    'addproduct/submit' => ['controller' => 'ProductController', 'action' => 'addproduct'],
    'products/updateproduct' => ['controller' => 'ProductController', 'action' => 'showupdate'],
    'updateproduct/submit' => ['controller' => 'ProductController', 'action' => 'updateproduct'],
    'products/deleteproduct' => ['controller' => 'ProductController', 'action' => 'showdelete'],
    'deleteproduct/submit' => ['controller' => 'ProductController', 'action' => 'deleteproduct'],
];

