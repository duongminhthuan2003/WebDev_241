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
                            <img src="img/prd_list_icon_search.png" alt="search">
                        </li>
                        <li class="">
                            <img src="img/prd_list_icon_ava.png" alt="avatar">
                        </li>
                    </ul>

                    <div class="lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                        </svg>                          
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
                            <li class="font-bold">VIẾT BÌNH LUẬN</li>
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