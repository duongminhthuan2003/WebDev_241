<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/assets/css/output.css" rel="stylesheet">
</head>
<body>

<!--
    + chỉnh ảnh khung item     
    + chỉnh khoảng cách căn lề
    + thêm responsive
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

            <?php 
                $products = $data['products'];
                $sum_price = $data['sum_price'];
                $total_price = $data['total_price'];
                $discount = $sum_price - $total_price;
            ?>
            <main class="flex flex-col pt-20">
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
                            <li class="mt-8"><button onclick="location.href='/payment_customer'" class="bg-Cam_Ananas text-white font-medium px-2 py-2 rounded-md w-96 uppercase">Tiếp tục thanh toán</button></li>
                        </ul>
                    </col2><!--end col2-->
                </row1><!--end row1-->
                
                <row2></row2><!--end row2-->
                <!--bổ sung đề xuất-->
                <row3></row3><!--end row3-->
            </main><!-- end main -->

            <?php
                include 'footer.php';
            ?>
        </div><!-- end content -->
    </div><!-- end root -->
    <script src="/assets/js/header.js"></script>
</body>
</html>