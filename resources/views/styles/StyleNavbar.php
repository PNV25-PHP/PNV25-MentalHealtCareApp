<style>
.dropdown-menu {
  display: none; /* Ẩn menu ban đầu */
  opacity: 0;
  transform: scale(0.95);
}

/* Hiển thị menu khi show */
.dropdown-menu.show.button-menu-hidden {
  display: block; /* Hiển thị menu */
  opacity: 1;
  transform: scale(1);
  transition: opacity 0.1s ease-out, transform 0.1s ease-out; /* Thêm hiệu ứng chuyển tiếp */
}

/* Ẩn menu khi hide */
.dropdown-menu.hide.button-menu-hidden {
  display: none; /* Ẩn menu */
  opacity: 0;
  transform: scale(0.95);
  transition: opacity 0.075s ease-in, transform 0.075s ease-in; /* Thêm hiệu ứng chuyển tiếp */
}
</style>