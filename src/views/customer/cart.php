<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../output.css" rel="stylesheet">
</head>
<body>

<!--
    + chỉnh ảnh khung item     
    + bổ sung đề xuất
    + chỉnh khoảng cách căn lề
-->
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('delete-success')) {
            alert('Xóa hàng hóa khỏi giỏ hàng thành công');
        }
        if (urlParams.has('promotion-apply-success')) {
            alert('Áp dụng mã khuyến mãi thành công');
        }
        if (urlParams.has('delete-fail')) {
            alert('Xóa hàng hóa khỏi giỏ hàng thất bại');
        }
        if (urlParams.has('promotion-apply-fail')) {
            alert('Áp dụng mã khuyến mãi thất bại');
        }
    </script>

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
            <?php 
                $products = $data['products'];
                $sum_price = $data['sum_price'];
                $total_price = $data['total_price'];
                $discount = $sum_price - $total_price;
            ?>
            <main class="flex flex-col mt-5">
                <row1 class="flex flex-row px-40 flex-wrap sm:px-5">
                    <!-- col1 -->
                    <col1 class="w-full sm:w-1/2 p-2">
                        <ul class="flex flex-col">
                            <li class="font-bold text-2xl">GIỎ HÀNG</li>
                            <?php foreach ($products as $product):  ?>
                                <!-- item1 -->
                                <li class="flex flex-row mt-5">
                                    <ul class="flex flex-row space-x-3">
                                        <li class="flex w-1/6"><img class="w-18 h-18" src="<?= htmlspecialchars($product['product_image']); ?>" alt="item"></li>
                                        <li class="flex w-3/6">
                                            <ul>
                                                <Name_product class="font-bold"><?= htmlspecialchars($product['name']); ?> - <?= htmlspecialchars($product['color_name']); ?></Name_product>
                                                <span class="flex flex-row space-x-3 mt-3"> 
                                                    <!-- Kích cỡ -->
                                                    <div class="flex flex-col space-y-2">
                                                        <select class="w-24 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500">
                                                            <option value="<?= htmlspecialchars($product['size_value']); ?>"><?= htmlspecialchars($product['size_value']); ?></option>
                                                        </select>
                                                    </div>
                                                    <!-- Số lượng -->
                                                    <div class="flex flex-col space-y-2">
                                                        <div class="flex items-center space-x-3">
                                                            <button class="px-2 py-1 text-gray-500 border border-gray-300 rounded-md hover:bg-gray-200" onclick="decreaseQuantity()">-</button>
                                                            <span id="quantity" class="text-gray-800 font-medium"><?= htmlspecialchars($product['quantity']); ?></span>
                                                            <button class="px-2 py-1 text-gray-500 border border-gray-300 rounded-md hover:bg-gray-200" onclick="increaseQuantity()">+</button>
                                                        </div>
                                                    </div>
                                                </span>
                                            </ul>
                                        </li>
                                        <li class="flex w-1/6"></li>
                                        <li class="flex w-2/6">
                                            <ul class="flex flex-col space-y-1 items-center">
                                                <li class="font-bold text-Cam_Ananas"><?= htmlspecialchars(number_format($product['price'], 0, ',', '.')); ?> VNĐ</li>
                                                <button class="flex items-center justify-center w-24 h-8 border border-black bg-white rounded-md hover:bg-gray-100">
                                                    <img src="img/gio_hang_heart.png" alt="heart">
                                                </button>
                                                <form method="POST" action="/deleteItem/submit">
                                                    <input type="hidden" name="product_item_id" value="<?= htmlspecialchars($product['product_item_id']); ?>">
                                                    <button type="submit" class="flex items-center justify-center w-24 h-8 border border-black bg-black rounded-md">
                                                        <img src="img/gio_hang_bin.png" alt="heart">
                                                    </button>
                                                </form>
                                            </ul>
                                        </li>
                                    </ul>
                                </li><!--end item1-->
                            <?php endforeach; ?>
                        </ul>
                    </col1><!--end col1-->
                
                    <!-- col2 -->
                    <col2 class="w-full sm:w-1/2 mt-10 sm:mt-0 p-2">
                        <ul class="flex flex-col">
                            <li class="font-bold text-2xl">ĐƠN HÀNG</li>
                            <li><hr class="border-t border-gray-400 mt-5 w-96 sm:w-full"></li>
                            <li class="mt-5">
                                <ul class="flex flex-row">
                                    <li class="flex w-1/3">Đơn hàng</li>
                                    <li class="flex w-1/3"></li>
                                    <li class="font-bold flex ml-auto"><?= htmlspecialchars(number_format($sum_price, 0, ',', '.')); ?> VNĐ</li>
                                </ul>
                            </li>
                            <li class="mt-2">
                                <ul class="flex flex-row">
                                    <li class="flex w-1/3">Giảm</li>
                                    <li class="flex w-1/3"></li>
                                    <li class="font-bold flex ml-auto"><?= htmlspecialchars(number_format($discount, 0, ',', '.')); ?> VNĐ</li> 
                                </ul>
                            </li>
                            <li><hr class="border-t border-gray-400 mt-5 w-96 sm:w-full"></li>
                            <li class="mt-5">
                                <ul class="flex flex-row">
                                    <li class="flex w-1/3">Tạm tính</li>
                                    <li class="flex w-1/3"></li>
                                    <li class="font-bold flex ml-auto"><?= htmlspecialchars(number_format($total_price, 0, ',', '.')); ?> VNĐ</li>
                                </ul>
                            </li>
                            <li class="font-medium mt-8">Nhập mã khuyến mãi</li>
                            <li>
                                <ul class="flex flex-row">
                                    <form method="POST" action="/promotionApply/submit">
                                        <li class="flex mr-0">
                                            <input 
                                            id="input-box" 
                                            name="promotion_code"
                                            type="text" 
                                            autocomplete="off"
                                            class="w-auto px-4 py-2 border border-gray-400 rounded">
                                        </li>
                                        <li class="flex ml-0 mt-2">
                                            <button type="submit" class="bg-Cam_Ananas text-white font-medium px-2 py-2 rounded w-28 uppercase">Áp dụng</button>
                                        </li>
                                    </form>
                                </ul>
                            </li>
                            <li class="mt-8"><button onclick="location.href='/payment'" class="bg-Cam_Ananas text-white font-medium px-2 py-2 rounded-md w-96 uppercase">Tiếp tục thanh toán</button></li>
                        </ul>
                    </col2><!--end col2-->
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
                            <li class="text-gray-600"><a href="#">Giày nam</a></li>
                            <li class="text-gray-600"><a href="#">Giày nữ</a></li>
                            <li class="text-gray-600"><a href="#">Thời trang & Phụ kiện</a></li>
                            <li class="text-gray-600"><a href="#">Sale-off</a></li>
                        </ul>
                    </col2>
                    <col3 class="w-1/6">
                        <ul class="space-y-4">
                            <li class="font-bold">VỀ ANANAS</li>
                            <li class="text-gray-600"><a href="#">Tuyển dụng</a></li>
                            <li class="text-gray-600"><a href="#">Giới thiệu</a></li>
                        </ul>
                    </col3>
                    <col4 class="w-1/6">
                        <ul class="space-y-4">
                            <li class="font-bold">HỖ TRỢ</li>
                            <li class="text-gray-600"><a href="#">FAQs</a></li>
                            <li class="text-gray-600"><a href="#">Bảo mật thông tin</a></li>
                            <li class="text-gray-600"><a href="#">Chính sách chung</a></li>
                            <li class="text-gray-600"><a href="#">Tra cứu đơn hàng</a></li>
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
</body>
</html>