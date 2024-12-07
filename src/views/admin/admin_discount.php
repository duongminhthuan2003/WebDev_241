<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="assets/css/output.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Title</title>
</head>
<body>
<div class="flex flex-row font-BeVietnam w-full h-screen">
  <col1 class="bg-Cam_Ananas text-white w-ful sm:w-1/4 md:w-1/5 flex flex-col">
    <div class="py-4 mx-auto">
      <ul class="flex flex-row items-center">
        <li><img src="/img/ananas_logo.png" alt="logo" class="h-16 w-auto"></li>
      </ul>
    </div>
    <div class="flex flex-col space-y-3">
      <a href="#" class="flex flex-row space-x-3 px-7 py-4">
        <img src="/img/donhang_dashboard.png" alt="dashboard_icon" class="h-6 w-6">
        <p>Dashboard</p>
      </a>
      <a href="#" class="flex flex-row space-x-3 py-4 px-7">
        <img src="/img/donhang_dh.png" alt="dashboard_icon" class="h-6 w-6">
        <p>Đơn hàng</p>
      </a>
      <a href="#" class="flex flex-row space-x-3 py-4 px-7">
        <img src="/img/donhang_sp.png" alt="dashboard_icon" class="h-6 w-6">
        <p>Sản phẩm</p>
      </a>
      <a href="#" class="flex flex-row space-x-3 py-4 px-7">
        <img src="/img/donhang_kh.png" alt="dashboard_icon" class="h-6 w-6">
        <p>Khách hàng</p>
      </a>
      <a href="#" class="flex flex-row space-x-3 py-4 px-7 bg-green-600">
        <img src="/img/donhang_km.png" alt="dashboard_icon" class="h-6 w-6">
        <p>Khuyến mãi</p>
      </a>
      <a href="#" class="flex flex-row space-x-3 py-4 px-7">
        <img src="/img/donhang_blog.png" alt="dashboard_icon" class="h-6 w-6">
        <p>Blog</p>
      </a>
    </div>

    <div class="flex-grow">
    </div>

    <div>
      <a href="#" class="flex flex-row space-x-3 py-4 px-7">
        <img src="/img/donhang_ls.png" alt="dashboard_icon" class="h-6 w-6">
        <p>Lịch sử</p>
      </a>
    </div>
  </col1><!--end col1-->

  <div class="w-4/5 bg-back_admin text-white">
    <div class="w-11/12 mx-auto mt-8">
      <p class="font-bold text-3xl">MÃ KHUYẾN MÃI</p>
    </div>

    <div class="w-11/12 flex flex-col mx-auto mt-8">
      <a href="/promotion/add" class="flex ml-auto mr-0 "><button class="px-5 py-2 bg-Cam_Ananas mb-2 rounded">Thêm</button></a>

      <table class="w-full border-collapse border border-gray-300 text-black bg-white">
        <tr class="border-2">
          <th class="border border-gray-300 w-2/12">Mã khuyến mãi</th>
          <th class="border border-gray-300 w-1/12">Số lượng</th>
          <th class="border border-gray-300 w-1/12">Số lượt dùng còn lại</th>
          <th class="border border-gray-300 w-2/12">Ngày bắt đầu</th>
          <th class="border border-gray-300 w-2/12">Ngày hết hạn</th>
          <th class="border border-gray-300 w-1/12">Giá trị (%)</th>
          <th class="border border-gray-300 w-auto">Ghi chú</th>
          <th class="border border-gray-300 w-2/12">Tùy chọn</th>
        </tr>
        <?php foreach($data as $promotion): ?>
          <tr class="border-2">
            <td class="border border-gray-300"><?= htmlspecialchars($promotion['promotion_code']); ?></td>
            <td class="border border-gray-300"><?= htmlspecialchars($promotion['quantity']); ?></td>
            <td class="border border-gray-300"><?= htmlspecialchars($promotion['remain_quantity']); ?></td>
            <td class="border border-gray-300 mx-auto"><?= htmlspecialchars((new DateTime($promotion['start_date']))->format('d.m.Y')); ?></td>
            <td class="border border-gray-300 mx-auto"><?= htmlspecialchars((new DateTime($promotion['end_date']))->format('d.m.Y')); ?></td>
            <td class="border border-gray-300"><?= htmlspecialchars($promotion['discount_percent']); ?></td>
            <td class="border border-gray-300"><?= htmlspecialchars($promotion['description']); ?></td>
            <td class="flex space-x-5 my-auto ">
              <a href="/promotion/update?promotion_id=<?= htmlspecialchars($promotion['promotion_id']); ?>"><button>Chỉnh sửa</button></a>
              <a href="/promotion/delete?promotion_id=<?= htmlspecialchars($promotion['promotion_id']); ?>"><button>Xóa</button></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
</body>
</html>