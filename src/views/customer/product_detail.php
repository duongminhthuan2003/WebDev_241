<?php
  // session_start();
  // if (!isset($_SESSION['customer'])) {
  //   header('Location: /login');
  // }
  $user_id = $_SESSION['user_id'] ?? '';
  if (empty($user_id)) {
      header('Location: /login');
      exit();
  }
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../output.css" rel="stylesheet">
</head>
<body>

  <!-- 
    + chỉnh hình ảnh sản phẩm
    + bổ sung responsive  
    + bổ sung hiện thêm bình luận
    + chỉnh kích thước popup viết bình luận
    + thêm popup avarta
  -->
    <div class="root">
        <div class="content-wrapper font-BeVietnam max-w-screen-2xl text-base">
            <header class="mx-5 sticky top-0 bg-white bg-opacity-50 backdrop-blur-md z-10">
                <nav class="flex flex-row items-center justify-between" id="navbar">
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
                            <!-- </div> -->                        
                    </div>
                </nav>
            </header><!-- end header -->

            <?php
                $product = $data['product'];
                $color = $data['color'];
                $size = $data['size'];
                $description = $data['description'];
                $review = $data['review'];
            ?>
            
            <main class="flex flex-col mx-64">
                <row1 class="flex flex-row space-x-2">
                  <col1>
                    <img src="<?= htmlspecialchars($product['product_image']); ?>" style="height: 450px; width: 600px" alt="product">
                  </col1>
                  <col2>
                    <div class="" style="padding: 3rem;">
                      <form method="POST" action="/detail/submit">
                        <!-- Màu sắc -->
                        <input type="hidden" id="user_id" name="user_id" value="<?= htmlspecialchars($user_id); ?>">
                        <input type="hidden" id="product_id" name="product_id" value="<?= htmlspecialchars($product['product_id']); ?>">
              
                        <div class="flex flex-col space-y-2">
                          <label class="font-semibold text-gray-800">Màu sắc</label>
                          <select name="color_id" id="color" class="w-30 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500">
                            <?php foreach ($color as $c) { ?>
                              <option value="<?= htmlspecialchars($c['color_id']); ?>"><?= htmlspecialchars($c['color_name']); ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      
                        <!-- Kích cỡ -->
                        <div class="flex flex-col space-y-2 mt-4">
                          <label class="font-semibold text-gray-800">Kích cỡ</label>
                          <select name="size_id" id="size" class="w-30 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500">
                            <?php foreach ($size as $s) { ?>
                              <option value="<?= htmlspecialchars($s['size_id']); ?>"><?= htmlspecialchars($s['size_value']); ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      
                        <!-- Số lượng -->
                        <div class="flex flex-col space-y-2 mt-4 mb-4">
                          <label class="font-semibold text-gray-800">Số lượng</label>
                          <div class="flex items-center space-x-3">
                            <button type="button" id="decrease" class="px-2 py-1 text-gray-500 border border-gray-300 rounded-md hover:bg-gray-200">-</button>
                            <input type="text" id="quantity" name="quantity" value="1" class="text-center w-6 text-gray-800 font-medium border border-gray-300 rounded-md" readonly>
                            <button type="button" id="increase" class="px-2 py-1 text-gray-500 border border-gray-300 rounded-md hover:bg-gray-200">+</button>
                          </div>
                        </div>
                          
                        <script>
                          const decreaseButton = document.getElementById('decrease');
                          const increaseButton = document.getElementById('increase');
                          const quantityInput = document.getElementById('quantity');

                          let quantity = 1;

                          decreaseButton.addEventListener('click', () => {
                            if (quantity > 1) {
                              quantity--;
                              quantityInput.value = quantity;
                            }
                          });

                          increaseButton.addEventListener('click', () => {
                            quantity++;
                            quantityInput.value = quantity;
                          });
                        </script>
                      
                        <!-- Thêm vào giỏ hàng -->
                        <div class="flex items-center space-x-4 mt-6 md:mt-0">
                          <button type="submit" class="ML_button ML_button:hover">
                            Thêm vào giỏ hàng
                          </button>
                      </form>
                          <form method="POST" action="/addloveitem/submit">
                            <input type="hidden" id="product_item_id" name="product_item_id" value="<?= htmlspecialchars($product['product_item_id']); ?>">
                            <button type="submit" id="heartButton" class="w-11 h-10 flex border border-gray-300 rounded-md items-center justify-center" onclick="toggleHeart(this)">
                              <img src="/img/prd_list_heart.png" alt="heart" class="heart-icon"/>
                            </button>
                          </form>
                        </div>
                    </div>
                  </col2>
                </row1><!--end row1-->
                <row2 class="mt-4">
                    <ul>
                        <li class="font-bold text-2xl"><?= htmlspecialchars($product['name']); ?></li>
                        <li class="mt-1">Màu sắc: <?= htmlspecialchars($product['color_name']); ?></li>
                        <li class="font-bold text-Cam_Ananas text-2xl mt-3"><?= htmlspecialchars(number_format($product['price'], 0, ',', '.')); ?> VNĐ</li>
                    </ul>
                </row2><!--end row2-->
                <row3 class="flex flex-row mt-20 space-x-8">
                    <col1 class="w-1/2">
                        <ul class="space-y-3">
                            <li class="font-bold">MÔ TẢ SẢN PHẨM</li>
                            <li>  
                                <ul class="space-y-2 list-disc pl-5">
                                  <?php $sentences = preg_split('/(?<=[.!?])\s+/', $description['description']); 
                                        foreach ($sentences as $sentence): ?>
                                    <li><?= htmlspecialchars($sentence); ?></li>
                                  <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="font-bold">BẢNG CHỌN SIZE</li>
                        </ul>
                    </col1><!--end col1-->
                    <col2 class="w-1/2">
                        <ul class="flex flex-col space-y-5">
                            <li class="font-bold">ĐÁNH GIÁ</li>
                            <li class="flex flex-row items-center space-x-4">
                                <div id="stars-container" class="flex justify-center">
                                    <!-- Get the average rating of review and display as number of star -->
                                    <?php
                                        $totalRating = 0;
                                        $totalReview = count($review);
                                        foreach ($review as $r) {
                                            $totalRating += $r['rating'];
                                        }
                                        $averageRating = $totalReview > 0 ? round($totalRating / $totalReview) : 0;
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $averageRating) {
                                                echo '<span data-value="' . $i . '" class="star text-Cam_Ananas text-5xl">★</span>';
                                            } else {
                                                echo '<span data-value="' . $i . '" class="star text-gray-400 text-5xl">★</span>';
                                            }
                                        }
                                    ?>
                                </div>
                                <p id="rating-text" class="mt-2 text-base font-BeVietnam text-gray-600"><?= htmlspecialchars($averageRating); ?> / 5</p>
                            </li>
                            <li class="font-bold underline"><a href="/product_list/writereview/<?= htmlspecialchars($product['product_item_id']); ?>" id="write-comment">VIẾT BÌNH LUẬN</a></li>
                            

                            <?php foreach ($review as $index => $r): ?>
                              <li class="<?= $index >= 3 ? 'hidden-review' : ''; ?>">
                                <ul class="flex space-x-64">
                                  <li>
                                    <p class="font-bold text-gray-900"><?= htmlspecialchars($r['user_name']); ?></p>
                                  </li>
                                  <li class="pr-0">
                                    <div id="stars-container" class="flex justify-center">
                                      <!-- 5 ngôi sao -->
                                      <?php for ($i = 1; $i <= $r['rating']; $i++): ?>
                                        <span data-value="<?= $i; ?>" class="star text-Cam_Ananas text-xl">★</span>
                                      <?php endfor; ?>
                                    </div>
                                  </li>
                                </ul>
                                <p class="text-sm text-gray-500"><?= htmlspecialchars((new DateTime($r['creat_at']))->format('d/m/Y')); ?></p>
                                <p><?= htmlspecialchars($r['content']); ?></p>
                              </li>
                            <?php endforeach; ?>
                            <li class="flex justify-center">
                              <button id="showMoreButton" class="ML_button flex flex-row justify-center">Hiện thêm</button>
                            </li>

                            <script>
                              document.getElementById('showMoreButton').addEventListener('click', function() {
                                document.querySelectorAll('.hidden-review').forEach(function(review) {
                                  review.style.display = 'block';
                                });
                                this.style.display = 'none';
                              });
                            </script>

                            <style>
                              .hidden-review {
                                display: none;
                              }
                            </style>
                        </ul>
                    </col2><!--end col2-->
                </row3><!--end row3-->
            </main><!-- end main -->

            <footer class="flex flex-col mt-16">
                <row1 class="flex flex-row pl-64 space-x-3">
                    <img class="object-contain" src="/img/prd_list_logo_dua.png" alt="logo_dua">
                    <img class="object-contain" src="/img/prd_list_logo_text.png" alt="logo_text">
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
    <script src="/product_list.js"></script>
</body>
</html>