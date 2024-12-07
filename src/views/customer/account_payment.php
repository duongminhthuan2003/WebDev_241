<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    // Kiểm tra quyền truy cập
    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
        header('Location: /');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.hugeicons.com/font/hgi-stroke-rounded.css" />

    <title>Title</title>
    <style>
        body {
            font-family: 'Be Vietnam Pro',sans-serif;
            font-weight: normal;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['user_id'])):
        if ($_SESSION['role'] == 'customer'):
           include 'header_da_dangnhap.php';
        else:
            header('Location: /dashboard');
        endif;
    else:
        include 'header_chua_dangnhap.php';
    endif;
?>

<div class="flex-grow">
    <div class="flex flex-row w-9/12 mx-auto mt-8">
        <div class="flex flex-col items-start w-3/12 mr-6">
            <div class="text-2xl font-bold">TÀI KHOẢN</div>

            <a class="px-4 mt-8" href="/info">Thông tin tài khoản</a>
            <a class="mt-8 bg-[#F15E2C] text-white font-semibold py-2 px-4 rounded-lg">Phương thức thanh toán</a>
            <a class="px-4 mt-8" href="/orderhistory">Đơn hàng của tôi</a>
            <a class="px-4 mt-8">Đổi mật khẩu</a>

            <a href="/logout"><button type="button" class="mt-32 bg-[#FF4141] text-white font-semibold py-2 px-4 rounded-lg">Đăng xuất</button></a>
        </div>
    
        <div class="w-9/12">
            <?php 
                $cards = $data['card'];
                $banks = $data['bank'];
            ?>
            <div class="flex flex-row w-full">
                <p class="flex font-bold w-9/12">Thẻ tín dụng & thẻ ghi nợ</p>
                <div class="flex justify-end ml-auto w-3/12"><button class="px-4 py-1 bg-[#F15E2C] text-white text-[13px] rounded-md">Thêm</button></div>
            </div>
            <?php
                foreach($cards as $card):
            ?>

            <div class="flex flex-row justify-center mt-5">
                <div class="flex w-3/12 my-auto">
                    <!--<img src="/assets/account/Visa.png" class="flex h-4 mr-3 object-cover my-auto">-->
                    <p><?= htmlspecialchars($card['card_branch']); ?></p>
                </div>

                <div class="w-3/12"> <!--Để trống để đặt tên trong TKNH-->

                </div>

                <div class="flex w-3/12 my-auto">
                    <p>**** <?= htmlspecialchars($card['last_4_digits']); ?></p>
                    <?php if($card['is_default']): ?>
                        <p class="ml-2 px-2 py-1 bg-[#35A16F] text-white text-[13px] rounded-md">Mặc định</p>
                    <?php  endif;?>
                </div>

                <div class="flex w-3/12 justify-end">
                    <a href="/accountpayment/deletecard?card_id=<?= htmlspecialchars($card['card_id']); ?>">
                        <button class="text-sm mr-3 text-[#FF4141] underline">Xóa</button>
                    </a>
                    <a href="/accountpayment/updatedefaultcard?card_id=<?= htmlspecialchars($card['card_id']); ?>">
                        <button class="text-sm underline">Làm mặc định</button>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>

            <!--TKNH-->
            <div class="flex flex-row w-full mt-16">
                <p class="flex font-bold w-9/12">Liên kết ngân hàng</p>
                <div class="flex justify-end ml-auto w-3/12"><button class="px-4 py-1 bg-[#F15E2C] text-white text-[13px] rounded-md">Thêm</button></div>
            </div>
            <?php foreach($banks as $bank): ?>
                <div class="flex flex-row justify-center mt-5">
                    <div class="flex w-3/12 my-auto">
                        <!---<img src="/assets/account/Techcombank.png" class="flex h-4 mr-3 object-cover my-auto">--->
                        <p><?= htmlspecialchars($bank['bank_name']); ?></p>
                    </div>

                    <div class="w-3/12"> <!--Để trống để đặt tên trong TKNH-->
                        <?= htmlspecialchars($bank['card_holder_name']); ?>
                    </div>

                    <div class="flex w-3/12 my-auto">
                        <p>**** <?= htmlspecialchars($bank['last_4_digits']); ?></p>
                        <?php if($bank['is_default']): ?>
                            <p class="ml-2 px-2 py-1 bg-[#35A16F] text-white text-[13px] rounded-md">Mặc định</p>
                        <?php  endif;?>
                    </div>

                    <div class="flex w-3/12 justify-end">
                    <a href="/accountpayment/deletebank?bank_id=<?= htmlspecialchars($bank['bank_id']); ?>">
                        <button class="text-sm mr-3 text-[#FF4141] underline">Xóa</button>
                    </a>
                    <a href="/accountpayment/updatedefaultbank?bank_id=<?= htmlspecialchars($bank['bank_id']); ?>">
                        <button class="text-sm underline">Làm mặc định</button>
                    </a>
                </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<footer class="bottom-0 mb-0">
    <div class="flex w-full bg-white h-[400px] mb-0 bottom-0">
        <div class="my-auto top-0 bottom-0 w-full">
            <div class="flex flex-row w-9/12 mx-auto align-middle">
                <img src="/assets/Logo_Ananas.png" class="h-7 flex my-auto top-0 bottom-0 mr-2" alt="logo">
                <img src="/assets/logo-black.png" class="flex h-10 w-24 object-cover my-auto top-0 bottom-0" alt="logo">
            </div>

            <div class="flex flex-row w-9/12 mx-auto mt-5">
                <div class="w-1/5 space-y-3">
                    <p><strong>SẢN PHẨM</strong></p>
                    <p class="text-sm text-[#888888]">Giày nam</p>
                    <p class="text-sm text-[#888888]">Giày nữ</p>
                    <p class="text-sm text-[#888888]">Thời trang & phụ kiện</p>
                    <p class="text-sm text-[#888888]">Sale-off</p>
                </div>

                <div class="w-1/5 space-y-3">
                    <p><strong>VỀ ANANAS</strong></p>
                    <p class="text-sm text-[#888888]">Tuyển dụng</p>
                    <p class="text-sm text-[#888888]">Giới thiệu</p>
                </div>

                <div class="w-1/5 space-y-3">
                    <p><strong>HỖ TRỢ</strong></p>
                    <p class="text-sm text-[#888888]">FAQs</p>
                    <p class="text-sm text-[#888888]">Bảo mật thông tin</p>
                    <p class="text-sm text-[#888888]">Chính sách chung</p>
                    <p class="text-sm text-[#888888]">Tra cứu đơn hàng</p>
                </div>

                <div class="w-2/5">
                    <p><strong>LIÊN HỆ</strong></p>
                    <input type="text" placeholder="Email" class="border-2 w-full text-sm h-10 rounded-md mt-2 pl-3">
                    <div class="flex flex-row space-x-4 mt-3">
                        <img src="/assets/index/fb_icon.png" alt="Facebook Icon" class="h-5 w-5 opacity-55">
                        <img src="/assets/index/yt_icon.png" alt="Youtube Icon" class="h-5 w-5 opacity-55">
                        <img src="/assets/index/ig_icon.png" alt="Instagram Icon" class="h-5 w-5 opacity-55">
                    </div>

                    <div class="flex space-x-2 flex-row mt-7">
                        <p><strong>HỆ THỐNG CỬA HÀNG</strong></p>

                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none" class="flex my-auto top-0 bottom-0">
                            <path d="M0.467209 12.0185C0.172957 12.3101 0.172957 12.7827 0.467209 13.0742C0.761461 13.3658 1.23854 13.3658 1.53279 13.0742L0.467209 12.0185ZM12.7535 1.64824C12.7535 1.23596 12.4161 0.901737 12 0.901736L5.21868 0.901736C4.80254 0.901736 4.4652 1.23596 4.4652 1.64824C4.4652 2.06052 4.80254 2.39474 5.21868 2.39474H11.2465V8.36677C11.2465 8.77905 11.5839 9.11328 12 9.11328C12.4161 9.11328 12.7535 8.77905 12.7535 8.36677L12.7535 1.64824ZM1.53279 13.0742L12.5328 2.1761L11.4672 1.12038L0.467209 12.0185L1.53279 13.0742Z" fill="#F15E2C"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="h-10 w-full bg-[#F15E2C]"></div>
</footer>
</body>
</html>