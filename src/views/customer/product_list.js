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
 
// popup cho desk
document.addEventListener('DOMContentLoaded', () => {
  const avatarButton = document.getElementById('avatarButton');
  const popup = document.getElementById('popupMenu');

  // toggle popup khi bấm nút avatar
  avatarButton.addEventListener('click', (event) => {
    event.stopPropagation(); // ngăn chặn sự kiện bấm lan ra ngoài
    popup.classList.toggle('hidden');
  });

  // ẩn popup khi bấm ra ngoài
  document.addEventListener('click', () => {
    if (!popup.classList.contains('hidden')) {
      popup.classList.add('hidden');
    }
  });

  // ngăn popup bị ẩn khi bấm bên trong popup
  popup.addEventListener('click', (event) => {
    event.stopPropagation();
  });
});


//popup cho tab
document.addEventListener('DOMContentLoaded', () => {
  const avatarButton = document.getElementById('menuButton');
  const popup = document.getElementById('popupMenufortablet');

  // toggle popup khi bấm nút avatar
  avatarButton.addEventListener('click', (event) => {
    event.stopPropagation(); // ngăn chặn sự kiện bấm lan ra ngoài
    popup.classList.toggle('hidden');
  });

  // ẩn popup khi bấm ra ngoài
  document.addEventListener('click', () => {
    if (!popup.classList.contains('hidden')) {
      popup.classList.add('hidden');
    }
  });

  // ngăn popup bị ẩn khi bấm bên trong popup
  popup.addEventListener('click', (event) => {
    event.stopPropagation();
  });
});