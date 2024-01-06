<?php

use SebastianBergmann\Environment\Console;

include_once dirname(__DIR__) . '../../layouts/HtmlHead.php' ?>
<div class="border-b-2 block md:flex">
  <div class="w-full md:w-1/5 p-4 sm:p-6 lg:p-8 bg-blue-900 text-white shadow-md">
    <div class="flex justify-between">
      <span class="text-xl font-semibold block">Your Profile</span>
    </div>
    <span class="text-white">This information is secret so be careful</span>
    <div class="w-full p-8 mx-2 block justify-center">
      <img id="showImage" class="w-[200px] h-[150px] mb-10 items-center border-2 shadow-lg" src="https://cff2.earth.com/uploads/2023/11/30185539/bottlenose-dolphin_1medium-960x640.jpg" alt="">
      <button type="button" class="w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/edit-profile">Edit Profile</a></button>
      <button type="button" class=" w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/homepage">
          <<< Back </a></button>

    </div>
  </div>
  <div class="border-b-2 block md:flex">
  </div>
  <div id="profileInfo" class="w-full md:w-4/5 p-8 bg-white lg:ml-4 shadow-md">
    <div class="container mx-auto p-4 rounded-lg shadow-md bg-white">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl text-center font-semibold">All booking</h2>
      </div>
      <table class="table-auto w-full">
        <thead>
          <tr class="text-left">
            <th>Doctor_Name</th>
            <th>Email</th>
            <th>TimeBooking</th>
            <th>DateBooking</th>
            <th>TotalPrice</th>
          </tr>
        </thead>
        <tbody id="history-booking">
        </tbody>
      </table>
    </div>
  </div>

  <script>
    // showInfo();
    // var email = JSON.parse(localStorage.getItem('email'));
    //sua
    var email_by_localstore = JSON.parse(localStorage.getItem('user-info'));
    var email = email_by_localstore.email;
    console.log(email);

    axios.post('/api/patient/processHistoryBooking', {
        email: email
      })
      .then(function(response) {
        const bookings = response.data; // Lấy dữ liệu từ response
        const tableBody = document.getElementById("history-booking");
        bookings.forEach((booking) => {
          const row = tableBody.insertRow();
          row.insertCell().textContent = booking.fullname;
          row.insertCell().textContent = booking.email;
          row.insertCell().textContent = booking.TimeBooking;
          row.insertCell().textContent = booking.DateBooking;
          row.insertCell().textContent = booking.TotalPrice;
        });
      })
      .catch(function(error) {
        console.error('Error:', error);
      });
  </script>
  </body>

  </html>