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
    'product_list' => ['controller' => 'CustomerProductController', 'action' => 'products'],
    'product_list/detail' => ['controller' => 'CustomerProductController', 'action' => 'detail'],
    'detail/submit' => ['controller' => 'CustomerProductController', 'action' => 'addToCart'],
    'product_list/writereview' => ['controller' => 'CustomerProductController', 'action' => 'writeReviewshow'],
    'writereview/submit' => ['controller' => 'CustomerProductController', 'action' => 'writeReview'],
    'love_item' => ['controller' => 'CustomerProductController', 'action' => 'getLoveItem'],
    'sale_off' => ['controller' => 'CustomerProductController', 'action' => 'getSaleProduct'],
    'cart' => ['controller' => 'CartController', 'action' => 'showcart'],
    'deleteItem/submit' => ['controller' => 'CartController', 'action' => 'delete'],
    'promotionApply/submit' => ['controller' => 'CartController', 'action' => 'promotionApply'],
    'payment_customer' => ['controller' => 'PaymentCustomerController', 'action' => 'showPayment'],
    'payment/submit' => ['controller' => 'PaymentCustomerController', 'action' => 'executePayment'],
    'info' => ['controller' => 'InfoController', 'action' => 'info'],
    'info/submit' => ['controller' => 'InfoController', 'action' => 'updateinfo'],
    'accountpayment' => ['controller' => 'PaymentController', 'action' => 'getall'],
    'accountpayment/updatedefaultcard' => ['controller' => 'PaymentController', 'action' => 'updatedefaultcard'],
    'accountpayment/updatedefaultbank' => ['controller' => 'PaymentController', 'action' => 'updatedefaultbank'],
    'accountpayment/deletecard' => ['controller' => 'PaymentController', 'action' => 'deleteCard'],
    'accountpayment/deletebank' => ['controller' => 'PaymentController', 'action' => 'deleteBank'],
    'dashboard' => ['controller' => 'DashBoardController', 'action' => 'getall'],
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
    'blog' => ['controller' => 'BlogController', 'action' => 'getall'],
    'blog/detail' => ['controller' => 'BlogController', 'action' => 'getdetail'],
    'blog/add' => ['controller' => 'BlogController', 'action' => 'viewaddblog'],
    'blog/submitadd' => ['controller' => 'BlogController', 'action' => 'createblog'],
    'blog/submitupdate' => ['controller' => 'BlogController', 'action' => 'updateblog'],
    'blog/delete' => ['controller' => 'BlogController', 'action' => 'deleteblog'],
    'promotion' => ['controller' => 'PromotionController', 'action' => 'getall'],
    'promotion/add' => ['controller' => 'PromotionController', 'action' => 'viewaddpromotion'],
    'promotion/submitadd' => ['controller' => 'PromotionController', 'action' => 'createpromotion'],
    'promotion/update' => ['controller' => 'PromotionController', 'action' => 'vieweditpromotion'],
    'promotion/submitupdate' => ['controller' => 'PromotionController', 'action' => 'updatepromotion'],
    'promotion/delete' => ['controller' => 'PromotionController', 'action' => 'deletepromotion'],
];

