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
    'info' => ['controller' => 'InfoController', 'action' => 'info'],
    'info/submit' => ['controller' => 'InfoController', 'action' => 'updateinfo'],
    'payment' => ['controller' => 'PaymentController', 'action' => 'getall'],
    'payment/updatedefaultcard' => ['controller' => 'PaymentController', 'action' => 'updatedefaultcard'],
    'payment/updatedefaultbank' => ['controller' => 'PaymentController', 'action' => 'updatedefaultbank'],
    'payment/deletecard' => ['controller' => 'PaymentController', 'action' => 'deleteCard'],
    'payment/deletebank' => ['controller' => 'PaymentController', 'action' => 'deleteBank'],
    'dashboard' => ['controller' => 'DashBoardController', 'action' => 'getall']
];

