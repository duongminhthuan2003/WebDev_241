# Web project
# ANANAS

1. git clone https://github.com/duongminhthuan2003/WebDev_241.git

WEBDEV_241/
├── public/
│   ├── index.php            # File khởi động chính của ứng dụng
│   ├── admin/               # Thư mục chứa giao diện và tài nguyên dành riêng cho Admin
│   ├── customer/            # Thư mục chứa giao diện dành cho khách hàng
│   └── assets/              # Thư mục chứa các tài nguyên tĩnh dùng chung
│       ├── css/
│       ├── js/
│       └── images/
├── src/ 
│   ├── controllers/         # Chứa các controller xử lý logic ứng dụng
│   │   ├── Customer/
│   │   └── Admin/
│   ├── models/              # Chứa các model để tương tác với cơ sở dữ liệu
│   │   ├── Customer/
│   │   └── Admin/
│   └── views/               # Chứa các view cho từng phần của ứng dụng
│       ├── Customer/
│       ├── Admin/
│       └── Layout/
├── config/ 
│   └── config.php           # File cấu hình cơ sở dữ liệu và cài đặt chung
├── database/                # Thư mục chứa các file SQL tạo bảng và seed dữ liệu
├── routes.php               # File quản lý các URL của ứng dụng
└── .env                     # File chứa thông tin bảo mật (như mật khẩu cơ sở dữ liệu)

public -> controller -> model -> view