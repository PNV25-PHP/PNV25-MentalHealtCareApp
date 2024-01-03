<!-- This is an example component -->
<?php include_once dirname(__DIR__) . '../../layouts/HtmlHead.php' ?>

<div class="h-full">

  <div class="border-b-2 block md:flex">

    <div class="w-full md:w-1/5 p-4 sm:p-6 lg:p-8 bg-blue-900 text-white shadow-md">
      <div class="flex justify-between">
        <span class="text-xl font-semibold block">Your Profile</span>
      </div>
      <span class="text-white">This information is secret so be careful</span>
      <div class="w-full p-8 mx-2 block justify-center">
        <img id="showImage" class="w-50 h-50 items-center border shadow-lg" src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.earth.com%2Fnews%2Fbottlenose-dolphins-have-a-newly-discovered-super-sense%2F&psig=AOvVaw1tT2DO_xyF1DCweEuoyLhx&ust=1704356060767000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCJjQzq3jwIMDFQAAAAAdAAAAABAD" alt="">
        <button type="button" class="w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/edit-profile">Edit Profile</a></button>
        <button type="button" onclick="historyBooking()" class=" w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">History Booking</button>
        <button type="button" class=" w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/homepage"><<< Back </a></button>

      </div>
    </div>

    <div id="profileInfo" class="w-full md:w-4/5 p-8 bg-white lg:ml-4 shadow-md">
      <div class="rounded  shadow p-6">
        <div class="pb-6">
          <label for="name" class="font-semibold text-gray-700 block pb-1">Name</label>
          <div class="flex">
            <input disabled id="username" class="border-1  rounded-r px-4 py-2 w-full" type="text" />
          </div>
        </div>
        <div class="pb-4">
          <label for="email" class="font-semibold text-gray-700 block pb-1">Email</label>
          <input disabled id="email" class="border-1  rounded-r px-4 py-2 w-full" type="email" value="" />
        </div>
        <div class="pb-4">
          <label for="password" class="font-semibold text-gray-700 block pb-1">Date create account</label>
          <input disabled id="date" class="border-1  rounded-r px-4 py-2 w-full" type="text" />
        </div>
        <div class="pb-4">
          <label for="phoneNumber" class="font-semibold text-gray-700 block pb-1">Phone Number</label>
          <input disabled id="phoneNumber" class="border-1  rounded-r px-4 py-2 w-full" type="tel" />
        </div>
        <div class="pb-4">
          <label for="address" class="font-semibold text-gray-700 block pb-1">Address</label>
          <input disabled id="address" class="border-1  rounded-r px-4 py-2 w-full" type="text" />
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <script src="../../component/profile.js" ></script> -->
<script>
  showInfo()

  function historyBooking() {
    const profileInfo = document.querySelector("#profileInfo");
    profileInfo.innerHTML = `
    <div class="container mx-auto p-4 rounded-lg shadow-md bg-white">
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-xl font-semibold">All booking </h2>
    </div>
  
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-6">
      </div>
  
      <div class="col-span-6 bg-gray-100 rounded-lg">
        <div class="grid grid-cols-6 py-4 px-6">
          <div class="col-span-1 font-medium">Doctor</div>
          <div class="col-span-1 font-medium">Specialization</div>
          <div class="col-span-1 font-medium">Hospital</div>
          <div class="col-span-1 font-medium">DateTime</div>
          <div class="col-span-1 font-medium">Quantity</div>
          <div class="col-span-1 font-medium text-center">Status</div>
        </div>
  
        <div class="grid grid-cols-6 py-2 px-6 gap-4 items-center" v-for="customer in customers">
          <div class="col-span-1">Show từ data</div>
          <div class="col-span-1">Show từ data</div>
          <div class="col-span-1">Show từ data</div>
          <div class="col-span-1">Show từ data</div>
          <div class="col-span-1">Show từ data</div>
          <div class="col-span-1 flex items-center justify-center rounded-full px-3 py-1 text-sm font-medium">
            <span :class="{ 'bg-green-100 text-green-800': customer.status === 'active', 'bg-red-100 text-red-800': customer.status === 'inactive' }">{{ customer.status }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  `;
  }

  function handleUpdateProfile() {

    var user_info_update = JSON.parse(localStorage.getItem('user-info'));
    var img = document.getElementById('image').value;
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var date = document.getElementById('date').value;
    var phoneNumber = document.getElementById('phoneNumber').value;
    var address = document.getElementById('address').value;

    user_info_update.image = img;
    user_info_update.fullName = username;
    user_info_update.email = email;
    user_info_update.date = date;
    user_info_update.phone = phoneNumber;
    user_info_update.address = address;
    console.log(user_info_update);

    // Gửi yêu cầu POST đến endpoint PHP
    fetch('/api/edit-profile', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(user_info_update)
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        localStorage.setItem('user-info', JSON.stringify(user_info_update));
        window.location.href = '/view-profile';
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
</script>