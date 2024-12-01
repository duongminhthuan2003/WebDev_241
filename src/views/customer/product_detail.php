<?php
    // Check if product_item_id is set in the query string
    if (isset($_GET['product_item_id'])) {
        $product_item_id = intval($_GET['product_item_id']);
        // Pass the product_item_id to JavaScript
        echo "<script>var productItemId = $product_item_id;</script>";
    } 
?>

<?php
    // session_start();
    // $user_id = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../output.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  <script src="getOneProduct.js"></script>
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
                            <button><img src="img/prd_list_icon_search.png" alt="search"></button>
                        </li>
                        <li id="avatarButton">
                            <button><img src="img/prd_list_icon_ava.png" alt="avatar"></button>
                        </li>
                        <!-- popup menu -->
                        <div id="popupMenu" class="absolute right-0 mt-8 w-64 rounded-lg bg-white shadow-lg hidden">
                            <div class="py-4 px-6 ">
                              <div class="flex items-center gap-3 border rounded-lg  shadow-md bg-white p-2">
                                <img src="img/prd_list_ava_popup.png" alt="avatar" class="w-10 h-10 rounded-full">
                                <div>
                                  <p class="font-medium">HỌ VÀ TÊN</p>
                                  <a href="#" class="text-xs text-gray-500 hover:text-gray-700">xem hồ sơ</a>
                              </div>
                              </div>
                            </div>
                            <div class="p-4">
                              <ul class="space-y-3 text-gray-700">
                                <li class="flex items-center gap-3">
                                  <img class="w-auto h-auto max-w-full max-h-full object-contain" src="img/popup_giohang.png" alt="giỏ hàng">
                                  <a href="#">Giỏ hàng</a>
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
                          </div><!--end popup menu-->
                    </ul>

                    <div class="lg:hidden">
                        <button id="menuButton">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                            </svg> 
                        </button>
                        <!--popup menu for tab -->
                            <div id="popupMenufortablet" class="absolute right-0 mt-8 w-64 rounded-lg bg-white shadow-lg hidden">
                                <div class="py-4 px-6 ">
                                  <div class="flex items-center gap-3 border rounded-lg  shadow-md bg-white p-2">
                                    <img src="img/prd_list_ava_popup.png" alt="avatar" class="w-10 h-10 rounded-full">
                                    <div>
                                      <p class="font-medium">HỌ VÀ TÊN</p>
                                      <a href="#" class="text-xs text-gray-500 hover:text-gray-700">xem hồ sơ</a>
                                  </div>
                                  </div>
                                </div>
                                <div class="p-4">
                                  <ul class="space-y-3 text-gray-700">
                                    <li class="flex items-center gap-3">
                                      <img class="w-auto h-auto max-w-full max-h-full object-contain" src="img/popup_giohang.png" alt="giỏ hàng">
                                      <a href="#">Giỏ hàng</a>
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
                                    <!-- add more items as needed -->
                                  </ul>
                                </div>
                              </div>
                            <!-- end popup menu for tab-->                            
                    </div>
                </nav>
            </header><!-- end header -->
            
            <main class="flex flex-col mx-64">
                <row1 class="flex flex-row space-x-2" >
                    <col1 id="page-content-detail-image">

                    </col1>
                    <col2>
                        <div style="padding:4rem;">
                            <!-- Product Details Form -->
                            <form id="add-to-cart-form" action="../../controllers/customer/addtocart-controller.php" method="POST">
                                <!-- Số lượng -->
                                <div class="flex flex-col space-y-2">
                                    <label class="font-semibold text-gray-800">Số lượng</label>
                                    <div class="flex items-center space-x-3">
                                        <button type="button" id="decrease" class="px-2 py-1 text-gray-500 border border-gray-300 rounded-md hover:bg-gray-200">-</button>
                                        <span id="quantity" class="text-gray-800 font-medium">1</span>
                                        <button type="button" id="increase" class="px-2 py-1 text-gray-500 border border-gray-300 rounded-md hover:bg-gray-200">+</button>
                                    </div>
                                </div>

                                <!-- Size Selection -->
                                <div class="flex flex-col space-y-2 mt-4">
                                    <label for="size" class="font-semibold text-gray-800">Size</label>
                                    <select id="size" name="size" class="border border-gray-300 rounded-md px-2 py-1" required>
                                        <?php for ($size = 39; $size <= 45; $size++): ?>
                                            <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>

                                <!-- Color Selection -->
                                <div class="flex flex-col space-y-2 mt-4" id="page-product-color">
                                    <label for="color" class="font-semibold text-gray-800">Color</label>
                                    <select id="color" name="color" class="border border-gray-300 rounded-md px-2 py-1" required>
                                        <option value="Brilliant White">Brilliant White</option>
                                        <option value="Red">Red</option>
                                        <option value="Green">Green</option>
                                        <option value="Black">Black</option>
                                        <option value="White">White</option>
                                    </select>
                                </div>

                                <!-- Hidden Inputs -->
                                <input type="hidden" name="product_item_id" value="<?php echo htmlspecialchars($product_item_id, ENT_QUOTES, 'UTF-8'); ?>">
                                <input type="hidden" name="quantity" id="quantity-input" value="1">

                                <!-- Thêm vào giỏ hàng -->
                                <div class="flex items-center space-x-4 mt-4" style="margin-top: 2rem;">
                                    <button type="submit" class="ML_button hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded">
                                        Thêm vào giỏ hàng
                                    </button>
                                    <button type="button" class="w-10 h-10 border border-gray-300 rounded-md flex items-center justify-center hover:bg-gray-100">
                                        <img src="img/prd_list_heart.png" alt="heart">
                                    </button>
                                </div>
                            </form>
                        </div>

                    </col2>
                </row1><!--end row1-->
                <row2 class="mt-4" id="page-content-detail">
                </row2><!--end row2-->
                <row3 class="flex flex-row mt-20 space-x-8">
                    <col1 class="w-1/2">
                        <ul class="space-y-3" id="page-content-detail-description">
  
                        </ul>
                    </col1><!--end col1-->
                    <col2 class="w-1/2">
                        <ul class="flex flex-col space-y-5">
                            <li class="font-bold">ĐÁNH GIÁ</li>
                            <li class="flex flex-row items-center space-x-4">
                                <div id="stars-container" class="flex justify-center">
                                    <!-- 5 ngôi sao -->
                                    <span data-value="1" class="star text-gray-400 text-5xl hover:text-orange-500 cursor-pointer">★</span>
                                    <span data-value="2" class="star text-gray-400 text-5xl hover:text-orange-500 cursor-pointer">★</span>
                                    <span data-value="3" class="star text-gray-400 text-5xl hover:text-orange-500 cursor-pointer">★</span>
                                    <span data-value="4" class="star text-gray-400 text-5xl hover:text-orange-500 cursor-pointer">★</span>
                                    <span data-value="5" class="star text-gray-400 text-5xl hover:text-orange-500 cursor-pointer">★</span>
                                </div>
                                <p id="rating-text" class="mt-2 text-base font-BeVietnam text-gray-600">0 / 5</p>
                            </li>
                            <li class="font-bold underline"><a href="#" id="write-comment">VIẾT BÌNH LUẬN</a></li>
                            <!-- Popup -->
                            <div id="comment-popup" class="fixed inset-0 bg-black bg-opacity-75 hidden">
                              <div class="bg-white flex justify-center items-center w-800 h-96 mx-auto absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 py-4">
                                <ul class="flex flex-col">
                                  <li>
                                    <ul class="flex flex-row items-center space-x-3">
                                      <li><img class="w-32 h-32" src="img/prd_list_sp2.png" alt="sản phẩm"></li>
                                      <li class="space-y-3">
                                        <p class="font-bold">Basas Day Slide - Slip On</p>
                                        <p class="text-Cam_Ananas">550.000 VND</p>
                                      </li>
                                    </ul>
                                  </li>
                                  <li>
                                    <div class="mt-4 items-center justify-center flex flex-row space-x-3">
                                      <div id="stars-container" class="flex justify-center">
                                        <!-- 5 ngôi sao -->
                                         <span data-value="1" class="star text-gray-400 text-5xl hover:text-orange-500 cursor-pointer">★</span>
                                         <span data-value="2" class="star text-gray-400 text-5xl hover:text-orange-500 cursor-pointer">★</span>
                                         <span data-value="3" class="star text-gray-400 text-5xl hover:text-orange-500 cursor-pointer">★</span>
                                         <span data-value="4" class="star text-gray-400 text-5xl hover:text-orange-500 cursor-pointer">★</span>
                                         <span data-value="5" class="star text-gray-400 text-5xl hover:text-orange-500 cursor-pointer">★</span>
                                      </div>
                                      <p id="rating-text" class="mt-2 text-base font-BeVietnam text-gray-600">0 / 5</p>
                                    </div>
                                  </li>
                                  <li>
                                    <label for="content" class="block mt-4">Nội dung:</label>
                                    <textarea id="content" class="w-full p-2 border border-gray-300 rounded mt-1 h-32"></textarea>
                                  </li>
                                  <li class=" flex flex-row justify-center mt-24 space-x-2">
                                    <button id="close-popup" class="bg-white text-black border border-black w-32 text-center font-medium px-2 py-2 rounded focus:outline-none transition-all duration-300 ease-in-out">
                                      Hủy
                                    </button>
                                    <button class="ML_button w-32">Đăng</button>
                                  </li><!--end li 4-->
                                </ul>
                              </div>
                            </div><!-- end popup viet binh luan -->

                            <div id="reviews-section">

                            </div>

                            <li class="flex justify-center">
                                <button class="ML_button flex flex-row justify-center">Hiện thêm</button>
                            </li>
                        </ul>
                    </col2><!--end col2-->
                </row3><!--end row3-->
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
    <script src="product_list.js"></script>
    <script>
        const decreaseButton = document.getElementById('decrease');
        const increaseButton = document.getElementById('increase');
        const quantitySpan = document.getElementById('quantity');
        const quantityInput = document.getElementById('quantity-input');

        let quantity = 1;

        decreaseButton.addEventListener('click', () => {
            if (quantity > 1) {
                quantity--;
                quantitySpan.textContent = quantity;
                quantityInput.value = quantity;
            }
        });

        increaseButton.addEventListener('click', () => {
            quantity++;
            quantitySpan.textContent = quantity;
            quantityInput.value = quantity;
        });
    </script>
</body>
</html>