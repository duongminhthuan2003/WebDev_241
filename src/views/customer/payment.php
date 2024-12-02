<?php
    // session_start();
    // $user_id = $_SESSION['user_id'];
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../output.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
</head>
<body>
    <div class="root">
        <div class="content-wrapper font-BeVietnam max-w-screen-2xl text-base">
            <header class="mx-5 sticky top-0 bg-white bg-opacity-50 backdrop-blur-md z-10">
                <nav class="flex flex-row items-center justify-between">
                    <div class="logo">
                        <img src="img/prd_list_logo.png" alt="logo">
                        
                    </div>
                    <ul class="hidden lg:flex lg:items-center lg:gap-16 uppercase text-sm">
                         <li class="cursor-pointer py-1 relative after:absolute after:bottom-0 after:left-0
                         after:bg-slate-900 after:h-0.5 after:w-full after:origin-center after:scale-x-0 hover:after:scale-x-100 
                         after:transition-transform after:ease-out after:duration-500 font-BeVietnam font-medium">
                            <a href="#" class="">Sản phẩm</a>
                        </li>
                        <li class="font-BeVietnam font-medium">
                            <a href="#" class="">Sale off</a>
                        </li>
                        <li class="font-BeVietnam font-medium">
                            <a href="#" class="">Tin tức</a>
                        </li>
                        <li class="font-BeVietnam font-medium">
                            <a href="#" class="">Giới thiệu</a>
                        </li>
                    </ul>

                    <ul class="hidden lg:flex lg:gap-x-9">
                        <li class="">
                            <button class="bg-white text-black font-medium px-2 py-2 rounded-md">Đăng ký</button>
                        </li>
                        <li class="">
                            <button class="bg-Cam_Ananas text-white font-medium px-2 py-2 rounded-md w-28">Đăng nhập</button>
                        </li>
                    </ul>

                    <div class="lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                        </svg>                          
                    </div>
                </nav>
            </header><!-- end header -->
            
            <main class="flex flex-col mt-5 ">
                <row1 class="flex flex-row px-40 space-x-8">
                    <form id="payment-form" method="POST" action="../../controllers/customer/payment-controller.php">
                        <col1>
                            <ul class="flex flex-col space-y-3">
                                <li class="font-bold text-2xl">THANH TOÁN</li>
                                <!-- <li>Thông tin người nhận</li>
                                <li>
                                    <input 
                                            id="input-box" 
                                            type="text" 
                                            autocomplete="off"
                                            class="w-auto px-4 py-2 border border-gray-400 rounded"
                                            placeholder="Họ và tên">
                                </li>
                                <li>
                                    <ul class="flex space-x-2">
                                        <li>
                                            <input 
                                            id="input-box" 
                                            type="text" 
                                            autocomplete="off"
                                            class="w-auto px-4 py-2 border border-gray-400 rounded"
                                            placeholder="Số điện thoại">
                                        </li>
                                        <li>
                                            <input 
                                            id="input-box" 
                                            type="text" 
                                            autocomplete="off"
                                            class="w-auto px-4 py-2 border border-gray-400 rounded"
                                            placeholder="Email">
                                        </li>
                                    </ul>
                                </li> -->
                                <li>
                                    <ul class="flex space-x-2">
                                        <li>
                                            <input 
                                                id="province" 
                                                type="text" 
                                                name="province"
                                                autocomplete="off"
                                                class="w-auto px-4 py-2 border border-gray-400 rounded"
                                                placeholder="Tỉnh/Thành phố">
                                        </li>
                                        <li>
                                            <input 
                                                id="district" 
                                                type="text" 
                                                name="district"
                                                autocomplete="off"
                                                class="w-auto px-4 py-2 border border-gray-400 rounded"
                                                placeholder="Quận/Huyện">
                                        </li>
                                        <li>
                                            <input 
                                                id="ward" 
                                                type="text" 
                                                name="ward"
                                                autocomplete="off"
                                                class="w-auto px-4 py-2 border border-gray-400 rounded"
                                                placeholder="Phường/Xã">
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <input 
                                        id="address" 
                                        type="text" 
                                        name="address"
                                        autocomplete="off"
                                        class="w-auto px-4 py-2 border border-gray-400 rounded"
                                        placeholder="Địa chỉ cụ thể">
                                </li>
                                <li>
                                    <ul>
                                        <li class="flex flex-row mt-24 space-x-2">
                                            <button class="ML_button w-32" type="submit" name="payment">Thanh toán</button>
                                            <button type="button" class="bg-white text-black border border-black w-32 text-center font-medium 
                                            px-2 py-2 rounded focus:outline-none transition-all duration-300 ease-in-out" 
                                            id="cancel-button">Hủy</button>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </col1>
                    </form>

                    <col2>
                        <div class="font-bold text-2xl">ĐƠN HÀNG</div>
                        <ul class="flex flex-col" id="page-content-product">

                        </ul>
                        <ul class="flex flex-col" id="page-content-fullprice">

                        </ul>
                    </col2>
                </row1><!--end row1-->
                <row2></row2><!--end row2-->
                <!--bổ sung đề xuất-->
                <row3></row3><!--end row3-->
            </main><!-- end main -->

            <footer class="flex flex-col mt-16">
                <row1 class="flex flex-row pl-64 space-x-3">
                    <img class="object-contain" src="img/prd_list_logo_dua.png" alt="logo_dua">
                    <img class="object-contain" src="img/prd_list_logo_text.png" alt="logo_text">
                </row1>
                <row2 class="flex flex-row mt-12 mb-20 justify-center space-x-3">
                    <col1 class="hidden lg:block w-1/6"></col1>
                    <col2 class="w-1/6">
                        <ul class="space-y-4">
                            <li class="font-bold">SẢN PHẨM</li>
                            <li class="text-gray-600">Giày nam</li>
                            <li class="text-gray-600">Giày nữ</li>
                            <li class="text-gray-600">Thời trang & Phụ kiện</li>
                            <li class="text-gray-600">Sale-off</li>
                        </ul>
                    </col2>
                    <col3 class="w-1/6">
                        <ul class="space-y-4">
                            <li class="font-bold">VỀ ANANAS</li>
                            <li class="text-gray-600">Tuyển dụng</li>
                            <li class="text-gray-600">Giới thiệu</li>
                        </ul>
                    </col3>
                    <col4 class="w-1/6">
                        <ul class="space-y-4">
                            <li class="font-bold">HỖ TRỢ</li>
                            <li class="text-gray-600">FAQs</li>
                            <li class="text-gray-600">Bảo mật thông tin</li>
                            <li class="text-gray-600">Chính sách chung</li>
                            <li class="text-gray-600">Tra cứu đơn hàng</li>
                        </ul>
                    </col4>
                    <col5 class="w-1/6">
                        <ul class="space-y-4">
                            <li class="font-bold">LIÊN HỆ</li>
                            <li>
                                <div class="flex items-center border border-gray-600 rounded-lg p-2 w-full max-w-xs">
                                    <!-- Input field -->
                                    <input 
                                        type="text"
                                        class="flex-grow focus:outline-none w-full"
                                    >
                                    <!-- SVG icon -->
                                    <svg 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke-width="1.5" 
                                        stroke="currentColor" 
                                        class="w-6 h-6 text-gray-600">
                                        <path 
                                            stroke-linecap="round" 
                                            stroke-linejoin="round" 
                                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </div>
                            </li>                             
                            <li>
                                <ul class="flex flex-row space-x-5">
                                    <li><a href="https://www.facebook.com/Ananas.vietnam"><img src="img/prd_list_fb_icon.png" alt="facebook"></a></li>
                                    <li><a href="https://www.youtube.com/@DiscoverYOU"><img src="img/prd_list_ytb_icon.png" alt="youtube"></a></li>
                                    <li><a href="https://www.instagram.com/ananasvn/"><img src="img/prd_list_ig_icon.png" alt="instagram"></a></li>
                                </ul>
                            </li> 
                            <li>
                                <ul class="flex flex-row space-x-3">
                                    <li class="font-bold"><a href="#">HỆ THỐNG CỬA HÀNG</a></li>
                                    <li class="mt-1">
                                        <img src="img/prd_list_arrow.png" alt="arrow">                                          
                                    </li>
                                </ul>
                            </li>                          
                        </ul>
                    </col5>
                    <col6 class="hidden lg:block w-1/6"></col6>
                </row2>
                <row3 class="w-full h-10 bg-Cam_Ananas"></row3>
            </footer><!-- end footer -->
        </div><!-- end content -->
    </div><!-- end root -->
    <script src="payment.js"></script>
</body>
</html>