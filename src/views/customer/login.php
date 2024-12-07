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
        .error {
            color: red;
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

    <div class="w-1/5 flex justify-end">
        <button type="button" class="text-[13px] mr-5 lg:block hidden">Đăng ký</button>
        <button type="button" class="text-[13px] bg-gradient-to-r from-[#F15E2C] from-0% to-[#F15E2C] to-100% text-white rounded-lg py-2 px-4 mr-5 hidden md:block
                hover:bg-gradient-to-r hover:from-[#fca144] hover:from-5% hover:to-[#FF6530] hover:to-30% hover:shadow-md hover:shadow-[rgba(241,94,44,0.5)] duration-300">Đăng nhập</button>
    </div>
</nav>

<div class="flex flex-row w-full h-[calc(100vh-4rem)]">
    <div class="flex items-center -mt-16 w-10/12 mx-auto md:w-6/12">
        <div class="flex-col flex w-2/3 mx-auto">
            <p class="font-bold text-3xl mb-5">ĐĂNG NHẬP</p>
            <form method="POST" action="/login/submit" class="w-full">
                <p>Email/Số điện thoại:</p>
                <input type="text" placeholder="Email" class="border-2 w-full mb-5 text-sm h-14 rounded-lg mt-2 pl-4" name="identifier" required>
                <p>Mật khẩu:</p>
                <input type="password" placeholder="Mật khẩu" class="border-2 w-full mb-5 text-sm h-14 rounded-lg mt-2 pl-4" name="password" required>
                <?php if (isset($error)): ?>
                    <div class="error"><?= htmlspecialchars($error); ?></div>
                <?php endif; ?>
                <button type="submit" class="text-sm bg-gradient-to-r from-[#F15E2C] from-0% to-[#F15E2C] to-100% text-white rounded-lg mt-5 py-3 px-12 mx-auto
                    hover:bg-gradient-to-r hover:from-[#fca144] hover:from-5% hover:to-[#FF6530] hover:to-30% hover:shadow-md hover:shadow-[rgba(241,94,44,0.5)] duration-300">
                    ĐĂNG NHẬP
                </button>
            </form>
            <div class="flex flex-row w-full mt-8">
                <p class="w-5/12"><a>Quên mật khẩu?</a></p>
                <p class="flex w-7/12 justify-end mr-0 right-0">Chưa có tài khoản?<a class="ml-1" href="/register"><strong>Đăng ký</strong></a></p>
            </div>
        </div>
    </div>

    <div class="flex-grow hidden md:block">

    </div>

    <div class="w-6/12 md:block hidden">
        <img src="../../../public/assets/login_register/login.jpg" class="h-full object-cover">
    </div>
</div>


</body>
</html>