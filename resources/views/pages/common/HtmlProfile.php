<!-- This is an example component -->
<?php include_once dirname(__DIR__) . '../../layouts/HtmlHead.php' ?>

<div class="h-full">

  <div class="border-b-2 block md:flex">

    <div class="w-full md:w-1/5 p-4 sm:p-6 lg:p-8 bg-blue-900 text-white shadow-md">
      <div class="flex justify-between">
        <span id="name-profile" class="text-xl font-semibold block"></span>
      </div>
      <span class="text-white">This information is secret so be careful</span>
      <div class="w-full p-8 mx-2 block justify-center">
        <img id="showImage" class="w-[150px] h-[150px] mb-10 items-center border-2 shadow-lg rounded-full" src="https://cff2.earth.com/uploads/2023/11/30185539/bottlenose-dolphin_1medium-960x640.jpg" alt="">
        <button type="button" class="w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/edit-profile">Edit Profile</a></button>
        <button type="button" class=" w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/patient/history-booking">History booking</a></button>
        <button type="button" class=" w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="#">Security</a></button>
        <button type="button" class=" w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/homepage">
            Back </a></button>

      </div>
    </div>

    <div id="profileInfo" class="w-full md:w-4/5 p-8 bg-white lg:ml-4 shadow-md">
      <div class="rounded shadow p-6 grid grid-cols-2 gap-4">
        <div>
          <label for="username" class="font-semibold text-gray-700 block pb-1">Name</label>
          <input disabled id="username" class="border-1 rounded-r px-4 py-2 w-full" type="text" />
        </div>
        <div>
          <label for="phoneNumber" class="font-semibold text-gray-700 block pb-1">Phone Number</label>
          <input disabled id="phoneNumber" class="border-1 rounded-r px-4 py-2 w-full" type="tel" />
        </div>
        <div>
          <label for="email" class="font-semibold text-gray-700 block pb-1">Email</label>
          <input disabled id="email" class="border-1 rounded-r px-4 py-2 w-full" type="email" />
        </div>
        <div>
          <label for="password" class="font-semibold text-gray-700 block pb-1">Password</label>
          <input disabled id="password" class="border-1 rounded-r px-4 py-2 w-full" type="password" />
        </div>
        <div class="col-span-2">
          <label for="address" class="font-semibold text-gray-700 block pb-1">Address</label>
          <input disabled id="address" class="border-1 rounded-r px-4 py-2 w-full" type="text" />
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  showInfo()
  function handleUpdateProfile() {
    var user_info_update = JSON.parse(localStorage.getItem('user-info'));
    var img = document.getElementById('image').value;
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var phoneNumber = document.getElementById('phoneNumber').value;
    var address = document.getElementById('address').value;

    user_info_update.image = img;
    user_info_update.fullName = username;
    user_info_update.email = email;
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