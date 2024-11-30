<?php
// Tải file cấu hình và routes
require_once '../src/config/config.php'; // Tải các thiết lập cấu hình
require_once '../src/routes.php'; // Tải file routes để định nghĩa các đường dẫn

// Lấy URL từ request (ví dụ, "news/detail/hieu-that-sau-moi-thu-ben-trong-moi-nguoi-voi-urbas-love-24")
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/'); // Loại bỏ dấu gạch chéo ở cuối

// Phân tách URL thành các phần
$urlParts = explode('/', $url);

// Tách route chính (ví dụ: "news/detail")
$baseRoute = implode('/', array_slice($urlParts, 0, 2));

// Tách alias nếu có (ví dụ: "hieu-that-sau-moi-thu-ben-trong-moi-nguoi-voi-urbas-love-24")
$alias = $urlParts[2] ?? null;

// Kiểm tra xem route chính có nằm trong danh sách routes đã định nghĩa không
if (isset($routes[$baseRoute])) {
    $controllerName = $routes[$baseRoute]['controller'];
    $action = $routes[$baseRoute]['action'];

    // Xây dựng đường dẫn tới file controller tương ứng
    $controllerPath = __DIR__ . "/../src/controllers/customer/{$controllerName}.php";
    
    // Kiểm tra xem file controller có tồn tại không
    if (file_exists($controllerPath)) {
        require_once $controllerPath;
        
        // Khởi tạo controller
        $controller = new $controllerName();

        // Kiểm tra xem action có tồn tại trong controller không
        if (method_exists($controller, $action)) {
            // Gọi action tương ứng và truyền alias (nếu có)
            $controller->$action($alias);
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
