<?php
include_once __DIR__ . '/../../config/config.php';
include_once __DIR__ . '/../../models/customer/Login.php';

class LoginController {
    private $db;
    private $loginModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->loginModel = new Login($this->db);
    }

    public function show() {
        include_once __DIR__ . '../../../views/customer/login.php';
    }

    public function login() {
        $identifier = $_POST['identifier'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($identifier) || empty($password)) {
            $error = "Vui lòng nhập đầy đủ thông tin.";
            include_once __DIR__ . '../../../views/customer/login.php';
        }

        $user = $this->loginModel->getUserByPhoneOrEmail($identifier)->fetch(PDO::FETCH_ASSOC);;
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['role'] = $user['role'];

            header('Location: /');
        } else {
            $error = "Số điện thoại/email hoặc mật khẩu không đúng.";
            include_once __DIR__ . '../../../views/customer/login.php';
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy(); 
        header('Location: /');
        exit();
    }
}
?>