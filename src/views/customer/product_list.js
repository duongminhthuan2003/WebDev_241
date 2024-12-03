// <!-- js cho nút bấm thêm sp yêu thích   -->
function toggleHeart(button) {
    const img = button.querySelector('.heart-icon');
    // Kiểm tra và thay đổi src của hình ảnh
    if (img.src.includes('prd_list_heart.png')) {
      img.src = 'img/prd_heart_full.png'; // Chuyển sang hình heart_full
    } else {
      img.src = 'img/prd_list_heart.png'; // Chuyển về hình heart
    }
}
  