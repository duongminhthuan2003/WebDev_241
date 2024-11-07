<?php
// Tải file cấu hình và routes
require_once '../src/config/config.php'; // Tải các thiết lập cấu hình
require_once '../src/routes.php'; // Tải file routes để định nghĩa các đường dẫn

$url = $_GET['url'] ?? '';
$url = rtrim($url, '/'); // Loại bỏ dấu gạch chéo ở cuối

// Kiểm tra xem URL có nằm trong danh sách routes đã định nghĩa không
if (isset($routes[$url])) {
    $controllerName = $routes[$url]['controller'];
    $action = $routes[$url]['action'];

    // Xây dựng đường dẫn tới file controller tương ứng
    $controllerPath = __DIR__ . "/../src/controllers/customer/{$controllerName}.php";
    
    // Kiểm tra xem file controller có tồn tại không
    if (file_exists($controllerPath)) {
        require_once $controllerPath;
        
        // Khởi tạo controller
        $controller = new $controllerName();

        // Kiểm tra xem action có tồn tại trong controller không
        if (method_exists($controller, $action)) {
            // Gọi action tương ứng
            $controller->$action();
        } else {
            // Nếu action không tồn tại, hiển thị lỗi 404
            echo "404 Not Found: Action '{$action}' không tồn tại trong '{$controllerName}'";
        }
    } else {
        // Nếu file controller không tồn tại, hiển thị lỗi 404
        echo "404 Not Found: Controller '{$controllerName}' không tìm thấy";
    }
} else {
    // Nếu route không tồn tại trong danh sách routes, hiển thị lỗi 404
    echo "404 Not Found";
}
