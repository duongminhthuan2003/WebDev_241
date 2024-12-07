<?php
include_once __DIR__ . '/../../config/config.php';
include_once __DIR__ . '/../../models/customer/Register.php';

class RegisterController {
    private $db;
    private $registerModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->registerModel = new Register($this->db);
    }

    public function show() {
        include_once __DIR__ . '../../../views/customer/register.php';
    }

    public function register() {
        // Lấy dữ liệu từ POST request
        $user_name = $_POST['fullname'] ?? '';
        $phone_number = $_POST['phone_number'] ?? '';
        $email_address = $_POST['email_address'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';
        $birth_day = $_POST['birth_day'] ?? '';
        $gender = $_POST['gender'] ?? '';

        // Kiểm tra các trường thông tin
        if (empty($user_name) || empty($phone_number) || empty($email_address) || empty($password) || empty($confirm_password)) {
            $error = "Vui lòng điền đầy đủ thông tin.";
            include_once __DIR__ . '/../../views/customer/register.php';
            return;
        }

        // Kiểm tra định dạng email
        if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
            $error = "Địa chỉ email không hợp lệ.";
            include_once __DIR__ . '/../../views/customer/register.php';
            return;
        }

        // Kiểm tra số điện thoại (phải là số và có độ dài phù hợp)
        if (!preg_match('/^\d{10,11}$/', $phone_number)) {
            $error = "Số điện thoại không hợp lệ";
            include_once __DIR__ . '/../../views/customer/register.php';
            return;
        }

        $existingUser = $this->registerModel->getUserByPhoneOrEmail($phone_number, $email_address);
        if ($existingUser && $existingUser->rowCount() > 0) {
            $error = "Số điện thoại hoặc email đã được sử dụng.";
            include_once __DIR__ . '/../../views/customer/register.php';
            return;
        }

        // Kiểm tra mật khẩu và xác nhận mật khẩu
        if ($password !== $confirm_password) {
            $error = "Mật khẩu và mật khẩu xác nhận không khớp.";
            include_once __DIR__ . '/../../views/customer/register.php';
            return;
        }

        // Gửi dữ liệu tới model
        $result = $this->registerModel->postUser($user_name, $phone_number, $email_address, $password, $birth_day, $gender);

        // Xử lý phản hồi từ model
        if ($result['success']) {
            // Chuyển hướng hoặc hiển thị thông báo thành công
            $success = $result['message'];
            include_once __DIR__ . '/../../views/customer/login.php';
        } else {
            // Hiển thị lỗi từ model
            $error = $result['message'];
            include_once __DIR__ . '/../../views/customer/register.php';
        }
    }
}
?>
