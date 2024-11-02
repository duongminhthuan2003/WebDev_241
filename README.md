# Web project
# ANANAS

1. git clone https://github.com/duongminhthuan2003/WebDev_241.git

WEBDEV_241/
├── public/
|   |── index.php       # File khởi động
|   |── admin/          # Thư mục riêng Admin
|   ├── customer/       # Thư mục dành cho khách
│   └── assets/                  # Tài nguyên tĩnh dùng chung
│       ├── css/
│       ├── js/
│       └── images/
├── src/
│   ├── controllers/            # Chứa các controller xử lý logic cho từng phần
│   │   ├── Customer/
│   │   └── Admin/
│   ├── models/                 # Chứa các model để tương tác với cơ sở dữ liệu
│   │   ├── Customer/
│   │   └── Admin/                 
│   └── views/                   # Chứa các view cho từng phần của ứng dụng
│       ├── Customer/
│       ├── Admin/
│       └── Layout/                # Chứa những layout hay sử dụng
├── config/
│   └── config.php               # File cấu hình cơ sở dữ liệu và cài đặt chung   
├── database/  
├── routes.php                  # quản lý các url
└── .env                        # File chứa thông tin bảo mật  


public -> controller -> model -> view