<?php
include_once dirname(__DIR__) . '../../layouts/HtmlHead.php' ?>
<div class="border-b-2 block md:flex" style="height: 100vh;">
  <div class="w-full md:w-1/5 p-4 sm:p-6 lg:p-8 bg-blue-900 text-white shadow-md">
    <div class="flex justify-between">
      <span id="name-profile" class="text-xl font-semibold block"></span>
    </div>
    <div class="w-full p-8 mx-2 block justify-center">
      <img id="showImage" class="w-[150px] h-[150px] mb-10 items-center border-2 shadow-lg rounded-full" src="" alt="">
      <button type="button" class="w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/edit-profile">Edit Profile</a></button>
      <button type="button" class=" w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/patient/history-booking">History booking</a></button>
      <button type="button" class=" w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/patient/home"> Back </a></button>
    </div>
  </div>
  <div id="profileInfo" class="w-full md:w-4/5 p-8 bg-white lg:ml-4 shadow-md">
    <div class="container mx-auto p-4 rounded-lg shadow-md bg-white">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl text-center font-bold text-gray-700 shadow text-shadow-sm bg-gray-200 py-2 px-4 rounded-md">All booking</h2>
      </div>
      <table class="table-auto">
        <thead>
          <tr>
            <th class="border-b-2 border-gray-300 px-4 py-2" id="username">Doctor's name</th>
            <th class="border-b-2 border-gray-300 px-4 py-2" id="email">Doctor's email</th>
            <th class="border-b-2 border-gray-300 px-4 py-2" id="phoneNumber">Doctor's phone number</th>
            <th class="border-b-2 border-gray-300 px-4 py-2" id="address">Time Booking</th>
            <th class="border-b-2 border-gray-300 px-4 py-2" id="password">Date Booking</th>
            <th class="border-b-2 border-gray-300 px-4 py-2">Total Price</th>
          </tr>
        </thead>
        <tbody id="history-booking">
        </tbody>
      </table>
    </div>
  </div>
  <script>
    var email_by_localstore = JSON.parse(localStorage.getItem('user-info'));
    document.getElementById('showImage').src = email_by_localstore.image
    var email = email_by_localstore.email;
    console.log(email_by_localstore)
    var fullname = email_by_localstore.fullName;
    document.getElementById('name-profile').innerHTML = fullname;
    var formData = new FormData();
    formData.append('email', email);
    axios.post('/api/patient/processHistoryBooking', formData)
      .then(function(response) {
        const bookings = response.data
        const tableBody = document.getElementById("history-booking");
        bookings.forEach((booking) => {
          const row = tableBody.insertRow();
          row.innerHTML = `
  <td class="px-4 py-2">${booking.Fullname}</td>
  <td class="px-4 py-2">${booking.Email}</td>
  <td class="px-4 py-2">${booking.Phone}</td>
  <td class="px-4 py-2">${booking.time}</td>
  <td class="px-4 py-2">${booking.DateBooking}</td>
  <td class="px-4 py-2">${booking.price}</td>
`;
          row.addEventListener("mouseover", function() {
            row.style.boxShadow = "0 2px 4px 0 rgba(0, 0, 0, 0.1)";
            row.style.backgroundColor = "#BFCFE7";
            row.style.color = "white";
            row.style.borderRadius = "10px";
          });
          row.addEventListener("mouseout", function() {
            row.style.boxShadow = "none";
            row.style.backgroundColor = "transparent";
            row.style.color = "black"
          });
        });
      })
      .catch(function(error) {
        if (error.response) {
          console.error('Error :', error.response.status);
          console.error('Message:', error.response.data);
        } else if (error.request) {
          console.error('No response received:', error.request);
        } else {
          console.error('Error:', error.message);
        }
      })
    showInfo()
    
    // function customTrim($url) {
    //   // Kiểm tra xem URL có chứa "/patient" không
    //   if (strpos($url, '/patient') !== false) {
    //     // Nếu có, thực hiện loại bỏ
    //     $url = str_replace('/patient', '', $url);
    //   }

    //   return $url;
    // }
  </script>
  </body>

  </html>