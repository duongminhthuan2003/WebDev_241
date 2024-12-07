<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Be Vietnam Pro',sans-serif;
            font-weight: normal;
        }
    </style>
</head>
<body class="h-screen">
<nav class="bg-white/30 flex flex-row items-center text-sm
                        shadow-navBar w-full border-white backdrop-blur z-50">
    <div class="md:w-1/5 w-1/2">
        <a href="/"><img src="/assets/logo-black.png" alt="Logo" class="h-16 ml-7"/></a>
    </div>

    <div class="w-3/5 align-middle">
        <ul class="md:flex flex-row justify-center space-x-12 hidden">
            <li><a href="" class="hover:text-[#F15E2C] cursor-pointer transition-all">SẢN PHẨM</a></li>
            <li><a href="" class="hover:text-[#F15E2C] cursor-pointer transition-all">SALE-OFF</a></li>
            <li><a href="/news" class="hover:text-[#F15E2C] cursor-pointer transition-all">TIN TỨC</a></li>
            <li><a href="" class="hover:text-[#F15E2C] cursor-pointer transition-all">GIỚI THIỆU</a></li>
        </ul>
    </div>

    <?php
        if (isset($_SESSION['user_id'])):
            if ($_SESSION['role'] == 'customer'):
                echo("I'm customer");
            else:
                echo("I'm admin");
            endif;
        else:
    ?>
        <div class="w-1/5 flex justify-end">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none" class="scale-75 mr-4 flex my-auto top-0 bottom-0">
                <path d="M17.5 17.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M20 11C20 6.02944 15.9706 2 11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20C15.9706 20 20 15.9706 20 11Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
            </svg>
            <a href="/register"><button type="button" class="text-[13px] mr-5 lg:block hidden">Đăng ký</button></a>
            <a href="/login"><button type="button" class="text-[13px] bg-gradient-to-r from-[#F15E2C] from-0% to-[#F15E2C] to-100% text-white rounded-lg py-2 px-4 mr-5 hidden md:block
                    hover:bg-gradient-to-r hover:from-[#fca144] hover:from-5% hover:to-[#FF6530] hover:to-30% hover:shadow-md hover:shadow-[rgba(241,94,44,0.5)] duration-300">
                    Đăng nhập
            </button></a>
        </div>
    <?php endif; ?>
</nav>

<div class="flex flex-row w-full h-[calc(100vh-4rem)]">
    <div class="flex items-center -mt-16 lg:w-6/12 w-full">
        <div class="flex-col flex w-2/3 mx-auto">
            <p class="font-bold text-3xl mb-5">ĐĂNG KÝ</p>
            <form method="POST" action="/register/submit">
            <p>Họ và tên:</p>
            <input type="text" placeholder="Họ và tên" class="border-2 w-full mb-5 text-sm h-14 rounded-lg mt-2 pl-4" id="user_name" name="fullname" required>

            <div class="flex flex-row space-x-5">
                <div class="w-4/12">
                    <p>Số điện thoại</p>
                    <input type="tel" placeholder="Số điện thoại" class="border-2 w-full mb-5 text-sm h-14 rounded-lg mt-2 pl-4" id="phone_number" name="phone_number" required>
                </div>

                <div class="w-8/12">
                    <p>Email</p>
                    <input type="email" placeholder="Email" class="border-2 w-full mb-5 text-sm h-14 rounded-lg mt-2 pl-4" id="email_address" name="email_address" required>
                </div>
            </div>

            <p>Mật khẩu:</p>
            <input type="password" placeholder="Mật khẩu" class="border-2 w-full mb-5 text-sm h-14 rounded-lg mt-2 pl-4" id="password" name="password" required>

            <p>Xác nhận mật khẩu:</p>
            <input type="password" placeholder="Xác nhận mật khẩu" class="border-2 w-full mb-5 text-sm h-14 rounded-lg mt-2 pl-4" id="confirm_password" name="confirm_password" required>

            <p>Ngày sinh:</p>
            <input type="date" class="border-2 w-full mb-5 text-sm h-14 rounded-lg mt-2 px-4" id="birth_day" name="birth_day" required>
            <!--Giới tính-->
            <div class="flex space-x-8">
                <p>Giới tính:</p>
                <div>
                    <input type="radio" id="he/him" name="gender" value="he/him">
                    <label for="he/him">Nam</label>
                </div>
                <div>
                    <input type="radio" id="she/her" name="gender" value="she/her">
                    <label for="she/her">Nữ</label>
                </div>
                <div>
                    <input type="radio" id="notsay" name="gender" value="prefer not to say">
                    <label for="notsay">Không đề cập</label>
                </div>
            </div>

            <?php if (isset($error)): ?>
                <div style="color: red;"><?= htmlspecialchars($error); ?></div>
            <?php endif; ?>            
            <button type="submit" class="text-sm bg-gradient-to-r from-[#F15E2C] from-0% to-[#F15E2C] to-100% text-white rounded-lg mt-5 py-3 px-12 mx-auto
                hover:bg-gradient-to-r hover:from-[#fca144] hover:from-5% hover:to-[#FF6530] hover:to-30% hover:shadow-md hover:shadow-[rgba(241,94,44,0.5)] duration-300">
                ĐĂNG KÝ
            </button>
            </form>
            <p class="mt-8">Đã có tài khoản?<a class="ml-1" href="/login"><strong>Đăng nhập</strong></a></p>
        </div>
    </div>

    <div class="w-6/12 hidden lg:block">
        <img src="/assets/login_register/login.jpg" class="h-full object-cover">
    </div>
</div>


</body>
</html>