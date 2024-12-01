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
  <script src="getAllProduct.js"></script>
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
                            </div>
                        <!--end popup menu-->
                    </ul>

                    <div class="lg:hidden">
                        <button id="menuButton">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                            </svg> 
                        </button>
                        <!-- menu popup for tab -->
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
                                  </ul>
                                </div>
                              </div>
                            <!-- end menu popup for tab -->                            
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
                        <!-- ! Category here -->
                        <ul class="space-y-5 pl-6" id="page-content-category">
                            
                        </ul>
                        <div class="font-BeVietnam font-bold ML_text_cam">
                            Trạng thái
                        </div>
                        <ul class="space-y-5 pl-6">
                            <li class="">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="option15" class="form-checkbox h-5 w-5">
                                    <label for="option15" class="font-BeVietnam">Limited Edition</label>
                                </div>
                            </li>
                            <li class="">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="option16" class="form-checkbox h-5 w-5">
                                    <label for="option16" class="font-BeVietnam">Sale off</label>
                                </div>
                            </li>
                            <li class="">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="option17" class="form-checkbox h-5 w-5">
                                    <label for="option17" class="font-BeVietnam">Pre-oder</label>
                                </div>
                            </li>
                            <li class="">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="option18" class="form-checkbox h-5 w-5">
                                    <label for="option18" class="font-BeVietnam">New Arrival</label>
                                </div>
                            </li>
                        </ul>
                        <div class="font-BeVietnam font-bold ML_text_cam">
                            Giá
                        </div>
                        <ul class="space-y-5 pl-6">
                            <li class="">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="option19" class="form-checkbox h-5 w-5">
                                    <label for="option19" class="font-BeVietnam">> 600k</label>
                                </div>
                            </li>
                            <li class="">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="option20" class="form-checkbox h-5 w-5">
                                    <label for="option20" class="font-BeVietnam">500k - 599k</label>
                                </div>
                            </li>
                            <li class="">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="option21" class="form-checkbox h-5 w-5">
                                    <label for="option21" class="font-BeVietnam">400k - 499k</label>
                                </div>
                            </li>
                            <li class="">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="option22" class="form-checkbox h-5 w-5">
                                    <label for="option22" class="font-BeVietnam">300k - 399k</label>
                                </div>
                            </li>
                            <li class="">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="option23" class="form-checkbox h-5 w-5">
                                    <label for="option23" class="font-BeVietnam">200k - 299k</label>
                                </div>
                            </li>
                            <li class="">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="option24" class="form-checkbox h-5 w-5">
                                    <label for="option24" class="font-BeVietnam">< 200k</label>
                                </div>
                            </li>
                        </ul>
                        <div class="font-BeVietnam font-bold ML_text_cam">
                            Màu sắc
                        </div>
                        <div class="flex flex-col space-y-3">
                            <!-- Hàng 1 -->
                            <ul class="flex space-x-3">
                                <li ><button class="w-6 h-6 bg-prd_color1 border border-gray-400"></button></li>
                                <li ><button class="w-6 h-6 bg-prd_color2 border border-gray-400"></button></li>
                                <li ><button class="w-6 h-6 bg-prd_color3 border border-gray-400"></button></li>
                                <li ><button class="w-6 h-6 bg-prd_color4 border border-gray-400"></button></li>
                            </ul>
                            <!-- Hàng 2 -->
                            <ul class="flex space-x-3">
                                <li ><button class="w-6 h-6 bg-prd_color5 border border-gray-400"></button></li>
                                <li ><button class="w-6 h-6 bg-prd_color6 border border-gray-400"></button></li>
                                <li ><button class="w-6 h-6 bg-prd_color7 border border-gray-400"></button></li>
                                <li ><button class="w-6 h-6 bg-prd_color8 border border-gray-400"></button></li>
                             </ul>
                            <!-- Hàng 3 -->
                            <ul class="flex space-x-3   ">
                                <li ><button class="w-6 h-6 bg-prd_color9 border border-gray-400"></button></li>
                                <li ><button class="w-6 h-6 bg-prd_color10 border border-gray-400"></button></li>
                                <li ><button class="w-6 h-6 bg-prd_color11 border border-gray-400"></button></li>
                                <li ><button class="w-6 h-6 bg-prd_color12 border border-gray-400"></button></li>
                             </ul>
                            
                        </div>
                    </col1> 
                    <!-- !Product here -->
                    <col2 class="w-full lg:w-4/6 grid grid-cols-2 sm:grid-cols-3 gap-7 px-16 items-center justify-center" id="page-content-product">

                    </col2>

                </row2><!--end row2-->
                <row3 class="flex flex-row">
                    <col31 class="w-2/6 hidden lg:block">
                    </col31>
                    <col32 class="w-full lg:w-4/6 items-center justify-center">
                        <row2 class="flex flex-row items-center justify-center space-x-3 my-20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                            <img src="img/prd_list_icon_page1.png" alt="icon page 1">
                            <img src="img/prd_list_icon_page2.png" alt="icon page 2">
                            <img src="img/prd_list_icon_page3.png" alt="icon page 3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
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
</body>
</html>