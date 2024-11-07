<?php
// Tải file cấu hình và routes
require_once '../src/config/config.php';
require_once '../src/routes.php';

// Lấy URL từ query string (?url=...)
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/'); // Loại bỏ dấu gạch chéo ở cuối

// Phân tích URL để lấy controller, action và tham số
$urlParts = explode('/', $url);
$controllerName = ucfirst(array_shift($urlParts)) . 'Controller';
$action = array_shift($urlParts) ?? 'index';
$params = $urlParts; // Các tham số còn lại

// Xây dựng đường dẫn tới file controller tương ứng
$controllerPath = __DIR__ . "/../src/controllers/customer/{$controllerName}.php";

// Kiểm tra xem file controller có tồn tại không
if (file_exists($controllerPath)) {
    require_once $controllerPath;
    
    // Khởi tạo controller
    $controller = new $controllerName();

    // Kiểm tra xem action có tồn tại trong controller không
    if (method_exists($controller, $action)) {
        // Gọi action tương ứng và truyền tham số
        call_user_func_array([$controller, $action], $params);
    } else {
        // Nếu action không tồn tại, hiển thị lỗi 404
        echo "404 Not Found: Action '{$action}' không tồn tại trong '{$controllerName}'";
    }
} else {
    // Nếu file controller không tồn tại, hiển thị lỗi 404
    echo "404 Not Found: Controller '{$controllerName}' không tìm thấy";
}
