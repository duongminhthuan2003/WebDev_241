<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Fjalla+One&family=Host+Grotesk:ital,wght@0,300..800;1,300..800&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="/src/output.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Be Vietnam Pro',sans-serif;
            font-weight: normal;
        }
        .track6_list::-webkit-scrollbar {
             display: none;
        }
        .raw_title {
            font-family: 'Anton SC',sans-serif;
        }
    </style>
</head>
<body>
<nav class="bg-white/30 flex flex-row items-center text-sm
            w-full border-white fixed backdrop-blur z-50">
    <div class="w-3/12">
        <a href="index.php">
            <img src="/assets/logo-black.png" alt="Logo" class="h-16 ml-7"/>
        </a>
    </div>

    <div class="w-6/12 align-middle">
        <ul class="md:flex flex-row justify-center lg:space-x-12 space-x-8 hidden">
            <li class="hover:text-[#F15E2C] cursor-pointer transition-all" id="product" onclick="openOverlay()">SẢN PHẨM</li>
            <li><a href="" class="hover:text-[#F15E2C] cursor-pointer transition-all">SALE-OFF</a></li>
            <li><a href="" class="hover:text-[#F15E2C] cursor-pointer transition-all">TIN TỨC</a></li>
            <li><a href="" class="hover:text-[#F15E2C] cursor-pointer transition-all">GIỚI THIỆU</a></li>
        </ul>
    </div>

    <?php
        session_start();
        if (isset($_SESSION['user_id'])):
            if ($_SESSION['role'] == 'customer'):
                echo("I'm customer");
            else:
                echo("I'm admin");
            endif;
        else:
    ?>
            <div class="w-3/12 flex justify-end">
                <button type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none" class="hidden md:block my-auto scale-75 mr-5">
                        <path d="M17.5 17.5L22 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M20 11C20 6.02944 15.9706 2 11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20C15.9706 20 20 15.9706 20 11Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                    </svg>
                </button>
                <a href="/register" class="flex my-auto"><button type="button" class="text-[13px] mr-5 lg:block hidden hover:text-[#F15E2C] duration-300">Đăng ký</button></a>
                <a href="login.php"><button type="button" class="text-[13px] bg-gradient-to-r from-[#F15E2C] from-0% to-[#F15E2C] to-100% text-white rounded-lg py-2 px-4 mr-5 hidden md:block
                hover:bg-gradient-to-r hover:from-[#fca144] hover:from-5% hover:to-[#FF6530] hover:to-30% hover:shadow-md hover:shadow-[rgba(241,94,44,0.5)] hover:scale-105 duration-300">Đăng nhập</button></a>
                <button class="mr-7 md:hidden block" onclick="mobileOverlay()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
                        <path d="M4 5L20 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4 19L20 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
    <?php endif; ?>
</nav>

<div id="myNav" class="fixed md:hidden flex-col bg-white/30 backdrop-blur w-full h-[35vh] z-50 top-16">
    <a class="absolute right-8 top-8 cursor-pointer" onclick="closeOverlay()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M19.0005 4.99988L5.00049 18.9999M5.00049 4.99988L19.0005 18.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </a>
    <div class="flex my-auto mx-auto">
        <div class="mx-8 flex flex-row space-x-[2vw]">
            <a href="#" class="flex flex-col rounded-lg w-auto h-auto items-center shadow-md bg-white hover:bg-Cam_Ananas hover:shadow-lg hover:scale-105 duration-300">
                <img src="/assets/navbar/formen.jpg" class="w-52 aspect-square rounded-t-lg object-cover">
                <div class="flex content-between py-4">CHO NAM</div>
            </a>

            <a href="#" class="flex flex-col bg-white rounded-lg w-auto h-auto items-center shadow-md hover:shadow-lg hover:scale-105 duration-300">
                <img src="/assets/navbar/formen.jpg" class="w-52 aspect-square rounded-t-lg object-cover">
                <div class="flex content-between py-4">CHO NỮ</div>
            </a>

            <a href="#" class="flex flex-col bg-white rounded-lg w-auto h-auto items-center shadow-md hover:shadow-lg hover:scale-105 duration-300">
                <img src="/assets/navbar/formen.jpg" class="w-52 aspect-square rounded-t-lg object-cover">
                <div class="flex content-between py-4">ÁO</div>
            </a>

            <a href="#" class="flex flex-col bg-white rounded-lg w-auto h-auto items-center shadow-md hover:shadow-lg hover:scale-105 duration-300">
                <img src="/assets/navbar/formen.jpg" class="w-52 aspect-square rounded-t-lg object-cover">
                <div class="flex content-between py-4">PHỤ KIỆN</div>
            </a>
        </div>
    </div>
</div>

<div id="mobileNav" class="md:invisible hidden w-full h-[calc(100%-64px)] absolute z-30 top-16 bg-white/30 backdrop-blur">
    <div class="flex flex-col my-16 space-y-9 w-9/12 mx-auto">
        <a class="font-bold text-lg">SẢN PHẨM</a>
        <a class="font-bold text-lg">SALE-OFF</a>
        <a class="font-bold text-lg">TIN TỨC</a>
        <a class="font-bold text-lg">GIỚI THIỆU</a>
        <div class="flex space-x-5">
            <button class="w-1/2 bg-white h-14 rounded-lg shadow-md">Đăng ký</button>
            <button class="w-1/2 bg-[#F15E2C] h-14 rounded-lg shadow-md text-white">Đăng nhập</button>
        </div>

        <div class="flex flex-col justify-end h-full">
            <div class="flex bg-white h-14 rounded-lg shadow-md w-full items-center px-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none" class="flex my-auto scale-75 mr-2">
                    <path d="M17.5 17.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M20 11C20 6.02944 15.9706 2 11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20C15.9706 20 20 15.9706 20 11Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                </svg>
                Tìm kiếm
            </div>
        </div>

    </div>
</div>

<div class="text-center lg:h-[90vh] md:h-[80vh] h-[90vh]">
    <img src="/assets/index/IMG_7284.png" class="lg:h-[90vh] md:h-[80vh] w-full object-cover absolute z-0" alt="urbas 24">
    <h3 class="relative xl:top-36 lg:top-48 text-[#F15E2C] ">Mới ra mắt</h3>
    <h1 class="relative text-8xl xl:top-40 lg:top-52 font-[Bayon]">URBAS LOVE+ 24</h1> <!-- -->
    <h3 class="relative lg:top-[44rem] md:top-[35rem] mb-10">Giao hàng từ 15.12.2024</h3>
    <button type="button" class="relative bg-gradient-to-r from-[#F15E2C]
    from-0% to-[#F15E2C] to-100% text-white rounded-lg py-3 px-12 lg:top-[43rem] md:top-[34rem]">Đặt trước</button>
</div>

<!--Nổi bật-->
<div class="w-9/12 mx-auto mt-16 text-2xl font-bold"><p>Nổi bật</p></div>
<div class="flex flex-row w-9/12 2xl:w-[10/12] h-[600px] left-0 right-0 mx-auto mt-5">
    <?php
        $isLastItem = false;
        $outstanding = $data['outstanding'];
        foreach ($outstanding as $index => $product):
        $isLastItem = $index === count($outstanding) - 1;
    ?>
        <div class="w-1/3 pl-4 <?= $isLastItem ? 'hidden 2xl:block' : ''; ?>">
            <img src="<?= htmlspecialchars($product['os_image']); ?>" class="h-[600px] w-full object-cover" alt="<?= htmlspecialchars($product['os_name']); ?>">
            <img src="/assets/index/ftr_back.png" class="w-full h-[300px] relative bottom-[300px] z-20" alt="Featured_Background">
            <h4 class="text-white z-30 relative bottom-[450px] ml-7"><?= htmlspecialchars($product['os_tag_line']); ?></h4>
            <h3 class="text-lg text-white relative bottom-[440px] font-bold z-30 ml-7"><?= htmlspecialchars($product['os_name']); ?></h3>
            <button class="text-[14px] relative bottom-[430px] ml-7 z-30 bg-gradient-to-r from-[#F15E2C] from-0% to-[#F15E2C] to-100% text-white rounded-lg py-3 px-6
                hover:bg-gradient-to-r hover:from-[#fca144] hover:from-5% hover:to-[#FF6530] hover:to-30% hover:shadow-md hover:shadow-[rgba(241,94,44,0.5)] duration-300">
                Mua ngay
            </button>
        </div>
    <?php endforeach; ?>
</div>

<!--Khám phá-->
<?php $discovery = $data['discovery']; ?>
<div class="w-9/12 mx-auto mt-16 text-2xl"><p>Khám phá dòng sản phẩm <strong><?= htmlspecialchars($discovery[0]['category_name']); ?></strong> của chúng tôi</p></div>
<div class="flex flex-row w-9/12 mx-auto overflow-x-scroll mt-5 h-auto space-x-5 track6_list">
    <?php foreach ($discovery as $index => $product): ?>
        <div class="flex-none h-auto">
            <img src="<?= htmlspecialchars($product['product_image']); ?>" class="h-[350px] aspect-square" alt="<?= htmlspecialchars($product['product_name']); ?>">
            <h4 class="font-bold mt-2"><?= htmlspecialchars($product['product_name']); ?></h4>
            <h5 class="mt-2"><?= htmlspecialchars(number_format($product['price'], 0, ',', '.')); ?> VNĐ</h5>
            <button class="text-[14px] mt-2 z-30 bg-gradient-to-r from-[#F15E2C] from-0% to-[#F15E2C] to-100% text-white rounded-lg py-3 px-6
                hover:bg-gradient-to-r hover:from-[#fca144] hover:from-5% hover:to-[#FF6530] hover:to-30% hover:shadow-md hover:shadow-[rgba(241,94,44,0.5)] duration-300">Mua ngay</button>
        </div>
    <?php endforeach; ?>
</div>

<!--Vintas Vivu-->
<div class="w-full bg-[#BCA984] h-[80vh] mt-20 flex flex-row">
    <div class="w-2/5 h-full">
        <img src="/assets/index/vintas_vivu1.jpg" class="h-full w-full object-cover">
    </div>
    
    <div class="w-3/5 h-full flex flex-col">
        <div class="w-full h-2/3">
            <img src="/assets/index/vintas_vivu2.jpeg" class="h-full w-full object-cover">
        </div>

        <div class="w-full h-1/3 flex flex-row">
            <div class="w-4/5 h-full flex">
                <div class=" ml-10 my-auto">
                    <img src="/assets/logo-white.png" class="w-24 h-10 object-cover">
                    <h1 class="font-[Bayon] text-white text-8xl">VINTAS VIVU</h1>
                    <h3 class="text-white my-1">Giá chỉ từ 610.000 VNĐ</h3>
                    <button class="text-[14px] mt-2 z-30 bg-gradient-to-r from-[#F15E2C] from-0% to-[#F15E2C] to-100% text-white rounded-lg py-3 px-6
               hover:bg-gradient-to-r hover:from-[#fca144] hover:from-5% hover:to-[#FF6530] hover:to-30% hover:shadow-md hover:shadow-[rgba(241,94,44,0.5)] duration-300">Mua ngay</button>
                </div>
            </div>

            <div class="flex-grow">

            </div>

            <div class="w-[120px] h-full flex flex-col">
                <div class="w-full h-[calc(100%-120px)] bg-[#646F84]"></div> <!--Navy rectangle-->
                <div class="w-full h-[120px] bg-[#9A845C]"></div> <!--Brown rectangle-->
            </div>
        </div>
    </div>
</div>

<!--Basas RAW-->
<div class="w-full bg-[#ECE4D7] lg:h-[75vh] 2xl:h-[90vh] md:h-[60vh] flex flex-col">
    <div class="w-auto h-auto flex flex-row mt-[2vw] mx-auto">
        <img src="/assets/index/raw1.jpg" class="w-[30vw] h-[30vw]">
        <img src="/assets/index/raw2.jpg" class="w-[30vw] h-[30vw] mx-[2vw]">
        <img src="/assets/index/raw3.jpg" class="w-[30vw] h-[30vw]">
    </div>

    <div class=" flex flex-col text-center h-full align-middle w-auto">
        <div class="my-auto top-0 bottom-0">
            <h3 class="font-bold text-2xl">ANANAS BASAS RAW</h3>
            <h1 class="raw_title text-6xl mt-8">NGUYÊN BẢN TRONG TỪNG BƯỚC CHÂN</h1>
            <h3 class="text-xl mt-8">Giá chỉ từ 620.000 VNĐ</h3>
            <button class="text-[14px] mt-7 z-30 bg-gradient-to-r from-[#F15E2C] from-0% to-[#F15E2C] to-100% text-white rounded-lg py-3 px-6
               hover:bg-gradient-to-r hover:from-[#fca144] hover:from-5% hover:to-[#FF6530] hover:to-30% hover:shadow-md hover:shadow-[rgba(241,94,44,0.5)] duration-300">Mua ngay</button>
        </div>
    </div>
</div>

<footer class="flex w-full bg-white h-[400px]">
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
</footer>
<div class="h-10 w-full bg-[#F15E2C]"></div>

<script>
    let div = document.getElementById("myNav");
    let mbOverlay = document.getElementById("mobileNav");
    let flag = 0;

    function openOverlay() {
        div.style.display = "flex";
    }

    function closeOverlay() {
        div.style.display = "none";
    }

    function mobileOverlay() {
        if(flag === 0) {
            mbOverlay.style.display = "flex";
            flag = 1;
        } else {
            mbOverlay.style.display = "none";
            flag = 0;
        }
    }
</script>

</body>
</html>



















