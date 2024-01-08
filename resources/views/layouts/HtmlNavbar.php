<?php include_once "HtmlHead.php" ?>
<style>
  #menu-navigate {
    display: none !important;
  }
  #showMenu:hover #menu-navigate{
    display: block !important;
  }
</style>
<nav class="bg-blue-900">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="h-20 w-20" src="https://res.cloudinary.com/dkvvko14m/image/upload/v1704189315/MentalHealthCare/qbtgghz1acud1e8orfn5.png" alt="Your Company">
        </div>
        <div class="hidden sm:ml-10 sm:block">
          <div class="flex space-x-4">
            <a href="#" class="text-gray-300 hover:bg-white hover:text-black rounded-md px-3 py-6 text-medium font-medium">Home </a>
            <a href="#" class="text-gray-300 hover:bg-white hover:text-black rounded-md px-3 py-6 text-medium font-medium">Booking</a>
            <a href="#" class="text-gray-300 hover:bg-white hover:text-black rounded-md px-3 py-6 text-medium font-medium">Contact Us</a>
            <a href="#" class="text-gray-300 hover:bg-white hover:text-black rounded-md px-3 py-6 text-medium font-medium">About Us </a>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <button type="button" class="relative rounded-full  p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
          <span class="absolute -inset-1.5"></span>
          <span class="sr-only">View notifications</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
          </svg>
          <div id="show"></div>
        </button>
        <div class="relative ml-3" id="showMenu">
          <div>
            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" id="avatar">
            </button>
          </div>

          <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" id="menu-navigate" style="display: block" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <a href="/view-profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="SignOut()">Sign out</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

<script>
  function SignOut() {
  event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

  // Gửi đối tượng JSON thông qua phương thức POST của Axios
  axios.post('/api/update/profile', {
    info_user: info_user
  })
  .then(function (response) {
    // Nếu phương thức POST thành công, tiến hành xóa dữ liệu "info_user" và chuyển hướng trang
    var info_user = {};
    localStorage.setItem('user-info', JSON.stringify(info_user));
    window.location.href = '/sign-in';
  })
  .catch(function (error) {
    // Xử lý lỗi nếu phương thức POST không thành công
    console.log(error);
  });
};

  // function showMenu() {
  //   var menu = document.getElementById("avatar")

  //   if (menu.style.display == "none") {
  //     menu.style.display = "block"
  //   } else {
  //     menu.style.display = "none"
  //   }
  // }
</script>