<?php 
include_once __DIR__ . '/../../config/config.php';
include_once __DIR__ . '/../../models/customer/Payment_customer.php';

class PaymentCustomerController {
    private $db;
    private $paymentModel;
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->paymentModel = new Payment($this->db);
    }

    public function showPayment() {
        $user_id = $_SESSION['user_id'] ?? '';
        if (empty($user_id)) {
            header('Location: /login');
            exit();
        }
        $payments = $this->paymentModel->getPayment($user_id)->fetchAll(PDO::FETCH_ASSOC);
        $sum_price = $this->paymentModel->getSumPrice($user_id);
        $total_price = $this->paymentModel->getOrderPrice($user_id);
        $data = [
            'payments' => $payments,
            'sum_price' => $sum_price,
            'total_price' => $total_price
        ];
        include_once __DIR__ . '/../../views/customer/payment_customer.php';
    }

    public function executePayment() {
        $province = $_POST['province'] ?? '';
        $district = $_POST['district'] ?? '';
        $ward = $_POST['ward'] ?? '';
        $detail = $_POST['detail'] ?? '';

        if (empty($province) || empty($district) || empty($ward) || empty($detail)) {
            header('Location: /payment?payment-fail-lost-info=1');
            exit();
        }
        $user_id = $_SESSION['user_id'] ?? '';
        if (empty($customer_id)) {
            header('Location: /login');
            exit();
        }
        $this->paymentModel->executePayment($user_id, $province, $district, $ward, $detail);
        header('Location: /payment?success=1');
    }
}