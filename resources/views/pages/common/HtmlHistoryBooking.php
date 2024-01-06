<?php

use SebastianBergmann\Environment\Console;

include_once dirname(__DIR__) . '../../layouts/HtmlHead.php' ?>
<div class="border-b-2 block md:flex">
  <div class="w-full md:w-1/5 p-4 sm:p-6 lg:p-8 bg-blue-900 text-white shadow-md">
    <div class="flex justify-between">
      <span id="name-profile" class="text-xl font-semibold block"></span>
    </div>
    <span class="text-white">This information is secret so be careful</span>
    <div class="w-full p-8 mx-2 block justify-center">
      <img id="showImage" class="w-[200px] h-[150px] mb-10 items-center border-2 shadow-lg" src="https://cff2.earth.com/uploads/2023/11/30185539/bottlenose-dolphin_1medium-960x640.jpg" alt="">
      <button type="button" class="w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/edit-profile">Edit Profile</a></button>
      <button type="button" class=" w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/view-profile">
          <<< Back </a></button>

    </div>
  </div>
  <div class="border-b-2 block md:flex">
  </div>
  <div id="profileInfo" class="w-full md:w-4/5 p-8 bg-white lg:ml-4 shadow-md">
    <div class="container mx-auto p-4 rounded-lg shadow-md bg-white">
      <div class="flex items-center justify-between mb-4">
      <h2 class="text-2xl text-center font-bold text-gray-700 shadow text-shadow-sm bg-gray-200 py-2 px-4 rounded-md">All booking</h2>
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
    var email_by_localstore = JSON.parse(localStorage.getItem('user-info'));
    var email = email_by_localstore.email;
    console.log(email_by_localstore)
    var fullname =email_by_localstore.fullName;
    document.getElementById('name-profile').innerHTML =fullname;
    console.log(email);
    var formData = new FormData();
    formData.append('email', email);
    axios.post('/api/patient/processHistoryBooking', formData)
      .then(function(response) {
        console.log(response.data)
        const bookings = response.data
        const tableBody = document.getElementById("history-booking");
        console.log("Kiểu dữ liệu booking ")
        console.log(typeof booking)
        bookings.forEach((booking) => {
          // const row = tableBody.insertRow();
          // row.insertCell().textContent = booking.fullname;
          // row.insertCell().textContent = booking.email;
          // row.insertCell().textContent = booking.TimeBooking;
          // row.insertCell().textContent = booking.DateBooking;
          // row.insertCell().textContent = booking.TotalPrice;
          const row = tableBody.insertRow();

          row.innerHTML = `
  <td class="px-4 py-2">${booking.fullname}</td>
  <td class="px-4 py-2">${booking.email}</td>
  <td class="px-4 py-2">${booking.TimeBooking}</td>
  <td class="px-4 py-2">${booking.DateBooking}</td>
  <td class="px-4 py-2">${booking.TotalPrice}</td>
`;

          row.addEventListener("mouseover", function() {
            row.style.boxShadow = "0 2px 4px 0 rgba(0, 0, 0, 0.1)";
            row.style.backgroundColor = "#11009E";
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
  </script>
  </body>

  </html>