<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="output.css" rel="stylesheet">
</head>
<body>
    <div class="root">
        <div class="content-wrapper font-BeVietnam max-w-screen-2xl text-base">
            <?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                // Kiểm tra trạng thái đăng nhập
                if (isset($_SESSION['user_id'])):
                    //đã đăng nhập
                    include '../../../public/assets/navbar/header_da_dangnhap.php';
                else:
                    // Nếu chưa đăng nhập
                    include '../../../public/assets/navbar/header_chua_dangnhap.php';
                endif;
            ?>
            
            
        </div><!-- end content -->
    </div><!-- end root -->
    <script src="../../../public/assets/js/header.js"></script>
</body>
</html>