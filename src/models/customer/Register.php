<?php

class Register {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserByPhoneOrEmail($email_address, $phone_number) {
        $query = "SELECT * FROM users WHERE phone_number = :phone_number OR email_address = :email_address LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['email_address' => $email_address, 'phone_number' => $phone_number]);
        return $stmt;
    }

    public function postUser($fullname, $phone_number, $email_address, $password, $birth_day, $gender) {
        try { 
            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            // Thêm người dùng mới vào cơ sở dữ liệu
            $insertQuery = "INSERT INTO users (fullname, phone_number, email_address, password, birth_date, gender) 
                            VALUES (:fullname, :phone_number, :email_address, :password, :birth_day, :gender)";
            $insertStmt = $this->db->prepare($insertQuery);
            $insertStmt->execute([
                ':fullname' => $fullname,
                ':phone_number' => $phone_number,
                ':email_address' => $email_address,
                ':password' => $hashedPassword,
                ':birth_day' => $birth_day,
                ':gender' => $gender
            ]);
    
            return ['success' => true, 'message' => 'Successfully add new user!'];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()];
        }
    }
}
    
?>