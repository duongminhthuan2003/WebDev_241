<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/assets/css/output.css" rel="stylesheet">
</head>
<body>
    <div class="root">
        <div class="content-wrapper font-BeVietnam text-base">
            <!--header-->
            <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION['user_id'])):
                if ($_SESSION['role'] == 'customer'):
                    include 'header_da_dangnhap.php';
                else:
                header('Location: /dashboard');
                endif;
            else:
                include 'header_chua_dangnhap.php';
            endif;
            ?>
            <!--end header-->
            
            <main class="flex flex-col pt-20">
                <row1 class="font-BeVietnam font-bold text-2xl  pl-5 sm:pl-10 lg:pl-40 uppercase mt-14">
                    Sale-off
                </row1> <!--end row1-->
                <row2 class="flex flex-row mt-16 justify-center">
                    <col2 class="w-full lg:w-4/6 grid grid-cols-2 sm:grid-cols-3 gap-7 px-16 items-center justify-center">
                        <?php 
                            $products_all = $data;
                            $product_per_page = 12;
                            $start_index = 0;
                            $total_products = count($products_all);
                            $total_pages = ceil($total_products / $product_per_page);
                            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                            $start = ($page - 1) * $product_per_page;
                            $products= array_slice($products_all, $start, $product_per_page);

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
                                <li class="text-gray-600"><p style="text-decoration: line-through;" class="font-medium justify-start"><?= htmlspecialchars(number_format($product['price']/0.9, 0, ',', '.')); ?> VNĐ</p></li>
                                <li class="flex flex-row space-x-10 items-center">
                                    <p class="font-medium justify-start"><?= htmlspecialchars(number_format($product['price'], 0, ',', '.')); ?> VNĐ</p>
                                    
                                    <button type="button" onclick="location.href='/product_list/detail/<?= htmlspecialchars($product['product_item_id']); ?>'" class=" bg-Cam_Ananas text-white font-medium px-2 py-2 rounded hover:bg-gradient-to-r hover:from-[#FFAE5C] hover:via-[#F15E2C] hover:to-[#F15E2C] focus:outline-none transition-all duration-300 ease-in-out">Mua ngay</button>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                    </col2>
                </row2><!--end row2-->
                <row3 class="flex flex-row items-center justify-center">
                    <col32 class="">
                        <row2 class="flex flex-row items-center justify-center space-x-3 my-20">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                            <button><img src="img/prd_list_icon_page1.png" alt="icon page 1"></button>
                            <button><img src="img/prd_list_icon_page2.png" alt="icon page 2"></button>
                            <button><img src="img/prd_list_icon_page3.png" alt="icon page 3"></button>
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </row2><!--end row2-->
                    </col32>
                </row3>
            </main><!-- end main -->

            <?php
                include 'footer.php';
            ?>
        </div><!-- end content -->
    </div><!-- end root -->
    <script src="/assets/js/header.php"></script>
</body>
</html>