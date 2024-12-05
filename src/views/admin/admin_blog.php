<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../output.css" rel="stylesheet">
</head>
<body>
    <div class="root">
        <div class="content-wrapper font-BeVietnam max-w-screen-2xl text-base">
            <main class="flex flex-row">
                <col1 class="bg-Cam_Ananas text-white w-ful sm:w-1/4 md:w-1/5 flex flex-col pb-10">
                    <div class="px-8 py-4">
                        <ul class="flex flex-row items-center space-x-2">
                            <li><img src="img/ananas_logo.png" alt="logo" class="h-16 w-auto"></li>
                        </ul>
                    </div>
                    <div class="flex flex-col space-y-11 pt-10 pl-8">
                        <a class="flex flex-row space-x-3" href="#">
                            <img src="img/donhang_dashboard.png" alt="dashboard_icon" class="h-6 w-6">
                            <p>Dashboard</p>
                        </a>
                        <a href="#" class="flex flex-row space-x-3">
                            <img src="img/donhang_dh.png" alt="dashboard_icon" class="h-6 w-6">
                            <p>Đơn hàng</p>
                        </a>
                        <a href="#" class="flex flex-row space-x-3">
                            <img src="img/donhang_sp.png" alt="dashboard_icon" class="h-6 w-6">
                            <p>Sản phẩm</p>
                        </a>
                        <a href="#" class="flex flex-row space-x-3 ">
                            <img src="img/donhang_kh.png" alt="dashboard_icon" class="h-6 w-6">
                            <p>Khách hàng</p>
                        </a>
                        <a href="#" class="flex flex-row space-x-3 ">
                            <img src="img/donhang_km.png" alt="dashboard_icon" class="h-6 w-6">
                            <p>Khuyến mãi</p>
                        </a>
                        <a href="#" class="flex flex-row space-x-3 bg-green-600 rounded-md p-2">
                            <img src="img/donhang_blog.png" alt="dashboard_icon" class="h-6 w-6">
                            <p>Blog</p>
                        </a>
                        <a href="#" class="flex flex-row space-x-3 pt-96">
                            <img src="img/donhang_ls.png" alt="dashboard_icon" class="h-6 w-6">
                            <p>Lịch sử</p>
                        </a>
                    </div>
                    </ul>
                </col1><!--end col1-->
                <col2 class="bg-back_admin text-white w-4/5 space-y-8 flex flex-col">
                    <row1 class="flex justify-end pr-4 pt-4 space-x-3">
                        <button><img src="img/donhang_notifi.png" alt="notification"></button>
                        <button><img src="img/donhang_ava.png" alt="avarta"></button>
                    </row1><!--end row1-->
                    <row2 class="font-bold text-2xl pl-8">
                        Blog
                    </row2><!--end row2-->
                    <row3 class="bg-white">
                        <div class="flex justify-end p-4">
                            <button class="bg-black text-white border border-black w-auto text-center font-medium px-2 py-2 rounded focus:outline-none transition-all duration-300 ease-in-out">
                                Thêm bài viết
                            </button>
                        </div>
                        <div class="p-4">
                            <!-- table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-300 text-black">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-300 px-4 py-2">
                                            <input type="checkbox" />
                                        </th>
                                        <th class="border border-gray-300 px-4 py-2">Số thứ tự</th>
                                        <th class="border border-gray-300 px-4 py-2">Ngày đăng</th>
                                        <th class="border border-gray-300 px-4 py-2">Tiêu đề</th>
                                        <th class="border border-gray-300 px-4 py-2">Nội dung</th>
                                        <th class="border border-gray-300 px-4 py-2">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><!--hang1-->
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <input type="checkbox"/>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">1</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">01/12/2024</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">HIỂU THẬT SÂU MỌI THỨ BÊN TRONG MỖI NGƯỜI VỚI URBAS LOVE+ 24</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Lấy cảm hứng từ cụm từ "Inside Out", Ananas tạo ra 2 phiên bản thiết kế cổ thấp (có dây và quai dán) cho bộ sưu tập Urbas Love+ 24. Trải qua một năm tương đối khó khăn, chúng tôi vẫn cố gắng "giữ" nhịp độ ra mắt đều đặn mỗi năm cho bộ sưu tập Love+ kể từ năm 2020. Và sẽ thật tuyệt vời nếu bạn có thể theo dõi đầy đủ những điều chúng tôi muốn gửi gắm đến cộng đồng LGBT+ trong ngần ấy thời gian.</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <div class="space-x-2 space-y-2">
                                                <button class="bg-yellow-400 p-2 w-14 rounded-md">Sửa</button>
                                                <button class="bg-red-500 p-2 w-14 rounded-md">Xóa</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                        
                    </row3><!--end row3-->
                </col2><!--end col2-->
            </main>
        </div>
    </div>
</body>
</html>