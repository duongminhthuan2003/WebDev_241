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
            <header class="mx-5 sticky top-0 bg-white bg-opacity-50 backdrop-blur-md z-10">
                <nav class="flex flex-row items-center justify-between">
                    <div class="logo">
                        <img src="/img/prd_list_logo.png" alt="logo">
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
                            <button><img src="/img/prd_list_icon_search.png" alt="search"></button>
                        </li>
                        <li id="avatarButton">
                            <button><img src="/img/prd_list_icon_ava.png" alt="avatar"></button>
                        </li>
                        <!-- popup menu -->
                            <div id="popupMenu" class="absolute right-0 mt-8 w-64 rounded-lg bg-white shadow-lg hidden">
                              <div class="py-4 px-6 ">
                                <div class="flex items-center gap-3 border rounded-lg  shadow-md bg-white p-2">
                                  <img src="img/prd_list_ava_popup.png" alt="avatar" class="w-10 h-10 rounded-full">
                                  <div>
                                    <p class="font-medium">HỌ VÀ TÊN</p>
                                    <a href="#" class="text-xs text-gray-500 hover:text-gray-700">Xem hồ sơ</a>
                                </div>
                                </div>
                              </div>
                              <div class="p-4">
                                <ul class="space-y-3 text-gray-700">
                                  <li class="flex items-center gap-3">
                                    <img class="w-auto h-auto max-w-full max-h-full object-contain" src="img/popup_giohang.png" alt="giỏ hàng">
                                    <a href="/cart">Giỏ hàng</a>
                                  </li>
                                  <li class="flex items-center gap-3">
                                    <img class="w-auto h-auto max-w-full max-h-full object-contain" src="img/popup_heart.png" alt="giỏ hàng">
                                    <a href="#">Yêu thích</a>
                                  </li>
                                  <li class="flex items-center gap-3">
                                    <img class="w-auto h-auto max-w-full max-h-full object-contain" src="img/popup_box.png" alt="giỏ hàng">
                                    <a href="#">Tra cứu đơn hàng</a>
                                  </li>
                                  <li class="flex items-center gap-3">
                                    <img class="w-auto h-auto max-w-full max-h-full object-contain" src="img/popup_map.png" alt="giỏ hàng">
                                    <a href="#">Hệ thống cửa hàng</a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                        <!--end popup menu-->
                    </ul>

                    <div class="lg:hidden">
                        <button id="menuButton">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                            </svg> 
                        </button> 
                        <!-- <div class="relative"> -->
                            
                          
                            <div id="popupMenufortablet" class="absolute right-0 mt-8 w-64 rounded-lg bg-white shadow-lg hidden">
                                <div class="py-4 px-6 ">
                                  <div class="flex items-center gap-3 border rounded-lg  shadow-md bg-white p-2">
                                    <img src="img/prd_list_ava_popup.png" alt="avatar" class="w-10 h-10 rounded-full">
                                    <div>
                                      <p class="font-medium">HỌ VÀ TÊN</p>
                                      <a href="#" class="text-xs text-gray-500 hover:text-gray-700">Xem hồ sơ</a>
                                  </div>
                                  </div>
                                </div>
                                <div class="p-4">
                                  <ul class="space-y-3 text-gray-700">
                                    <li class="flex items-center gap-3">
                                      <img class="w-auto h-auto max-w-full max-h-full object-contain" src="img/popup_giohang.png" alt="giỏ hàng">
                                      <a href="/cart">Giỏ hàng</a>
                                    </li>
                                    <li class="flex items-center gap-3">
                                      <img class="w-auto h-auto max-w-full max-h-full object-contain" src="img/popup_heart.png" alt="giỏ hàng">
                                      <a href="/love_item">Yêu thích</a>
                                    </li>
                                    <li class="flex items-center gap-3">
                                      <img class="w-auto h-auto max-w-full max-h-full object-contain" src="img/popup_box.png" alt="giỏ hàng">
                                      <a href="/orderhistory">Tra cứu đơn hàng</a>
                                    </li>
                                    <li class="flex items-center gap-3">
                                      <img class="w-auto h-auto max-w-full max-h-full object-contain" src="img/popup_map.png" alt="giỏ hàng">
                                      <a href="#">Hệ thống cửa hàng</a>
                                    </li>
                                    <!-- add more items as needed -->
                                  </ul>
                                </div>
                              </div>
                            <!-- </div> -->                        
                    </div>
                </nav>
            </header><!-- end header -->
            
            <main class="flex flex-col">
                <row1 class="font-BeVietnam font-bold text-2xl  pl-5 sm:pl-10 lg:pl-40 uppercase mt-14">
                    Sản phẩm
                </row1> <!--end row1-->
                <row2 class="flex flex-row mt-16">
                    <col1 class="w-2/6 pl-40 space-y-5 hidden lg:block">
                        <div class="font-BeVietnam font-bold ML_text_cam">
                            Dòng sản phẩm
                        </div>
                        <ul class="space-y-5 pl-6">
                            <form method="GET" action="">
                                <li class="">
                                    <button type="submit" name="name" value="Basas" class="bg-blue-500 text-white px-4 py-2 rounded">Basas</button>
                                </li>
                            </form>
                            <form method="GET" action="">
                                <li class="">
                                    <button type="submit" name="name" value="Vintas" class="bg-blue-500 text-white px-4 py-2 rounded">Vintas</button>
                                </li>
                            </form>
                            <form method="GET" action="">
                                <li class="">
                                    <button type="submit" name="name" value="Urbas" class="bg-blue-500 text-white px-4 py-2 rounded">Urbas</button>
                                </li>
                            </form>
                            <form method="GET" action="">
                                <li class="">
                                    <button type="submit" name="name" value="Pattas" class="bg-blue-500 text-white px-4 py-2 rounded">Pattas</button>
                                </li>
                            </form>
                            <form method="GET" action="">
                                <li class="">
                                    <button type="submit" name="name" value="Track 6" class="bg-blue-500 text-white px-4 py-2 rounded">Track 6</button>
                                </li>
                            </form>

                        </ul>
                        <div class="font-BeVietnam font-bold ML_text_cam">
                            Giá
                        </div>
                            <ul class="space-y-5 pl-6">
                                <form method="GET" action="">
                                    <li class="">
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                            <div class="flex items-center space-x-2">
                                                <input type="hidden" name="price[]" value=">700k" class="form-checkbox h-5 w-5">
                                                <label class="font-BeVietnam">> 700k</label>
                                            </div>
                                        </button>
                                    </li>
                                </form>
                                <form method="GET" action="">
                                    <li class="">
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                            <div class="flex items-center space-x-2">
                                            <input type="hidden" name="price[]" value="500-699k" class="form-checkbox h-5 w-5">
                                            <label class="font-BeVietnam">500k - 699k</label>
                                            </div>
                                        </button>
                                    </li>
                                </form>
                                <form method="GET" action="">
                                    <li class="">
                                        <button type="submit"  class="bg-blue-500 text-white px-4 py-2 rounded">
                                            <div class="flex items-center space-x-2">
                                            <input type="hidden" name="price[]" value="300-499k" class="form-checkbox h-5 w-5">
                                            <label class="font-BeVietnam">300k - 499k</label>
                                            </div>
                                        </button>
                                    </li>
                                </form>
                                <form method="GET" action="">
                                    <li class="">
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                            <div class="flex items-center space-x-2">
                                            <input type="hidden" name="price[]" value="<300k" class="form-checkbox h-5 w-5">
                                            <label class="font-BeVietnam">< 300k</label>
                                            </div>
                                        </button>
                                    </li>
                                </form>
                            </ul>
                        <div class="font-BeVietnam font-bold ML_text_cam mt-1">
                            Màu sắc
                        </div>
                        <div class="flex flex-col space-y-3">

                            <ul class="space-y-5 pl-6">
                                <form method="GET" action="">
                                    <li class="">
                                        <button type="submit" name="color" value="#efece1" class="bg-blue-500 px-4 py-2 rounded" style="color: #efece1">Trắng</button>
                                    </li>
                                </form>
                                <form method="GET" action="">
                                    <li class="">
                                        <button type="submit" name="color" value="#14130f" class="bg-blue-500 px-4 py-2 rounded" style="color: #14130f">Đen</button>
                                    </li>
                                </form>
                                <form method="GET" action="">
                                    <li class="">
                                        <button type="submit" name="color" value="#00ffff" class="bg-blue-500 px-4 py-2 rounded" style="color: #00ffff">Xanh dương</button>
                                    </li>
                                </form>
                                <form method="GET" action="">
                                    <li class="">
                                        <button type="submit" name="color" value="#f5f5dc" class="bg-blue-500 px-4 py-2 rounded" style="color: #f5f5dc">Be</button>
                                    </li>
                                </form>
                                <form method="GET" action="">
                                    <li class="">
                                        <button type="submit" name="color" value="#d6ba73" class="bg-blue-500 px-4 py-2 rounded" style="color: #d6ba73">Nâu</button>
                                    </li>
                                </form>
                            </ul>

                             <ul class="flex space-x-3   ">
                                <li class="">
                                    <button type="button" onclick="location.href='/product_list'" class="bg-red-500 text-white px-4 py-2 rounded">
                                        Loại bỏ bộ lọc
                                    </button>
                                </li>
                             </ul>
                        </div>
                    </col1>
                    <col2 class="w-full lg:w-4/6 grid grid-cols-2 sm:grid-cols-3 gap-7 px-16 items-center justify-center">
                    <?php 
                        $products_all = $data;
                        $product_per_page = 12;
                        $start_index = 0;


                        $filtered_products = [];

                        if (isset($_GET['price'])) {
                            $price_ranges = $_GET['price'];
                            foreach ($products_all as $product) {
                                $price = $product['price'];
                                foreach ($price_ranges as $range) {
                                    if ($range == '>700k' && $price > 700000) {
                                        $filtered_products[] = $product;
                                    } elseif ($range == '500-699k' && $price >= 500000 && $price <= 699999) {
                                        $filtered_products[] = $product;
                                    } elseif ($range == '300-499k' && $price >= 300000 && $price <= 499999) {
                                        $filtered_products[] = $product;
                                    } elseif ($range == '<300k' && $price < 300000) {
                                        $filtered_products[] = $product;
                                    }                             
                                }
                            }
                        } elseif (isset($_GET['name'])) {
                            $name_filter = $_GET['name'];
                            foreach ($products_all as $product) {
                                if (stripos($product['name'], $name_filter) !== false) {
                                    $filtered_products[] = $product;
                                }
                            }
                        } elseif (isset($_GET['color'])) {
                            $color_filter = $_GET['color'];
                            foreach ($products_all as $product) {
                                if ($product['color_code'] == $color_filter) {
                                    $filtered_products[] = $product;
                                }
                            }
                        } else {
                            $filtered_products =  $products_all;
                        }

                        $total_products = count($filtered_products);
                        $total_pages = ceil($total_products / $product_per_page);
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $start = ($page - 1) * $product_per_page;
                        $products= array_slice($filtered_products, $start, $product_per_page);

                        foreach ($products as $product):
                    ?>
                        <!--san pham 1-->
                        <ul class="flex flex-col text-sm">
                            <li><img src="<?= htmlspecialchars($product['product_image']); ?>" alt="sản phẩm 1"></li>
                            <li>
                                <ul class="flex flex-row">
                                    <li><p class="font-bold h-16 mt-3"><?= htmlspecialchars($product['name']); ?></p></li>
                                </ul>
                            </li>
                            <li class="text-gray-600"><?= htmlspecialchars($product['color_name']); ?></li>
                            <li class="flex flex-row space-x-10 items-center">
                                <p class="font-medium justify-start"><?= htmlspecialchars(number_format($product['price'], 0, ',', '.')); ?> VNĐ</p>
                                <button type="button" onclick="location.href='/product_list/detail/<?= htmlspecialchars($product['product_item_id']); ?>'" class=" bg-Cam_Ananas text-white font-medium px-2 py-2 rounded hover:bg-gradient-to-r hover:from-[#FFAE5C] hover:via-[#F15E2C] hover:to-[#F15E2C] focus:outline-none transition-all duration-300 ease-in-out">Mua ngay</button>
                            </li>
                        </ul>
                    <?php endforeach; ?>

                    </col2>
                </row2><!--end row2-->
                <row3 class="flex flex-row">
                    <col31 class="w-2/6 hidden lg:block">
                    </col31>
                    <col32 class="w-full lg:w-4/6 items-center justify-center">
                        <row2 class="flex flex-row items-center justify-center space-x-3 my-20">
                            <?php if ($page > 1): ?>
                                <a href="?page=<?php echo $page - 1; ?>">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                        </svg> 
                                    </button>
                                </a>
                            <?php endif; ?>

                            <div class="text-sm"><?php echo $page; ?> of <?php echo $total_pages; ?></div>

                            <?php if ($page < $total_pages): ?>
                                <a href="?page=<?php echo $page + 1; ?>">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </button>
                                </a>
                            <?php endif; ?>

                        </row2><!--end row2-->
                    </col32>
                </row3>
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
                                    <li><a href="https://www.facebook.com/Ananas.vietnam"><img src="/img/prd_list_fb_icon.png" alt="facebook"></a></li>
                                    <li><a href="https://www.youtube.com/@DiscoverYOU"><img src="/img/prd_list_ytb_icon.png" alt="youtube"></a></li>
                                    <li><a href="https://www.instagram.com/ananasvn/"><img src="/img/prd_list_ig_icon.png" alt="instagram"></a></li>
                                </ul>
                            </li> 
                            <li>
                                <ul class="flex flex-row space-x-3">
                                    <li class="font-bold"><a href="#">HỆ THỐNG CỬA HÀNG</a></li>
                                    <li class="mt-1">
                                        <img src="/img/prd_list_arrow.png" alt="arrow">                                          
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
    <script src="product_list.js"></script>
</body>
</html>