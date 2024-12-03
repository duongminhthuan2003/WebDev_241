<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
</head>
<body>
    <div class="root">
        <div class="content-wrapper font-BeVietnam max-w-screen-2xl text-base">
            <main class="flex flex-row">
                <col1 class="bg-Cam_Ananas text-white w-ful sm:w-1/4 md:w-1/5 flex flex-col pb-10">
                    <div class="px-8 py-4">
                        <ul class="flex flex-row items-center space-x-2">
                            <li><img src="/img/ananas_logo.png" alt="logo" class="h-16 w-auto"></li>
                        </ul>
                    </div>
                    <div class="pt-10 pl-8">
                        <ul class="flex flex-col space-y-11">
                            <li class="flex flex-row space-x-3">
                                <img src="/img/donhang_dashboard.png" alt="dashboard_icon" class="h-6 w-6">
                                <p>Dashboard</p>
                            </li>
                            <li class="flex flex-row space-x-3">
                                <img src="/img/donhang_dh.png" alt="dashboard_icon" class="h-6 w-6">
                                <p>Đơn hàng</p>
                            </li>
                            <li class="flex flex-row space-x-3 bg-green-600 rounded-md p-2">
                                <img src="/img/donhang_sp.png" alt="dashboard_icon" class="h-6 w-6">
                                <p>Sản phẩm</p>
                            </li>
                            <li class="flex flex-row space-x-3 ">
                                <img src="/img/donhang_kh.png" alt="dashboard_icon" class="h-6 w-6">
                                <p>Khách hàng</p>
                            </li>
                            <li class="flex flex-row space-x-3 ">
                                <img src="/img/donhang_km.png" alt="dashboard_icon" class="h-6 w-6">
                                <p>Khuyến mãi</p>
                            </li>
                            <li class="flex flex-row space-x-3 ">
                                <img src="/img/donhang_blog.png" alt="dashboard_icon" class="h-6 w-6">
                                <p>Blog</p>
                            </li> 
                            <li class="flex flex-row space-x-3 pt-96">
                                <img src="/img/donhang_ls.png" alt="dashboard_icon" class="h-6 w-6">
                                <p>Lịch sử</p>
                            </li> 
                        </ul>
                    </div>
                    </ul>
                </col1><!--end col1-->
                <col2 class="bg-back_admin text-white w-4/5 space-y-8 flex flex-col">
                    <row1 class="flex justify-end pr-4 pt-4 space-x-3">
                        <button><img src="/img/donhang_notifi.png" alt="notification"></button>
                        <button><img src="/img/donhang_ava.png" alt="avarta"></button>
                    </row1><!--end row1-->
                    <row2 class="flex items-center pl-4">
                        <div class="text-2xl">Sản phẩm</div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>                              
                        </div>
                        <div class="text-gray-500">Danh sách sản phẩm</div>
                    </row2>
                    <row3 class="bg-white p-4 flex flex-col text-black space-y-4">
                        <div class="flex space-x-2">
                            <select class="px-4 py-2 border border-gray-300 rounded-md bg-gray-100 text-black focus:outline-none focus:ring focus:ring-gray-300">
                                <option value="" disabled selected>Lọc sản phẩm</option>
                                <option value="all">1</option>
                                <option value="waiting">2</option>
                            </select>
                
                            <input type="text" placeholder="Tìm kiếm sản phẩm" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-gray-300 text-black" />
                    
                            <button onclick="location.href='/addproduct'" class="bg-black text-white border border-black w-auto text-center font-medium px-2 py-2 rounded focus:outline-none transition-all duration-300 ease-in-out">
                                Thêm sản phẩm
                            </button>
                        </div>
                        <div><hr class="border-t border-black sm:w-full"></div>
                        <!-- table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-300 text-black">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-300 px-4 py-2">ID</th>
                                        <th class="border border-gray-300 px-4 py-2">Tên sản phẩm</th>
                                        <th class="border border-gray-300 px-4 py-2">Màu sắc</th>
                                        <th class="border border-gray-300 px-4 py-2">Size</th>
                                        <th class="border border-gray-300 px-4 py-2">Mô tả</th>
                                        <th class="border border-gray-300 px-4 py-2">Giá</th>
                                        <th class="border border-gray-300 px-4 py-2">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $order_per_page = 8;
                                        $start_index = 0;
                                        $products = $data;
                            
                                        foreach ($products as $index => $product): 
                                    ?>
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2 text-center"><?= htmlspecialchars($product['product_item_id']); ?></td>
                                            <td class="border border-gray-300 px-4 py-2 text-center"><?= htmlspecialchars($product['name']); ?></td>
                                            <td class="border border-gray-300 px-4 py-2 text-center"><?= htmlspecialchars($product['color_name']); ?></td>
                                            <td class="border border-gray-300 px-4 py-2 text-center"><?= htmlspecialchars($product['size_value']); ?></td>
                                            <td class="border border-gray-300 px-4 py-2 text-center"><?= htmlspecialchars($product['description']); ?></td>
                                            <td class="border border-gray-300 px-4 py-2 text-center"><?= htmlspecialchars(number_format($product['price'], 0, ',', '.')); ?> VNĐ</td>
                                            <td class="border border-gray-300 px-4 py-2 text-center">
                                                <button type="button" onclick="location.href='products/updateproduct/<?= htmlspecialchars($product['product_item_id']); ?>'" class="bg-yellow-400 p-2 w-14 rounded-md">Sửa</button>
                                                <button type="button" onclick="location.href='products/deleteproduct/<?= htmlspecialchars($product['product_item_id']); ?>'" class="bg-red-500 p-2 w-14 rounded-md">Xóa</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>  
                                </tbody>
                            </table>
                        </div>
                    </row3><!--end row3-->
                </col2><!--end col2-->
            </main>
        </div>
    </div>
</body>
</html>