// function editProfile() {
//     const profileInfo = document.querySelector("#profileInfo");
//     profileInfo.innerHTML = `
//     <div class="flex justify-between">
//         <span class="text-xl font-semibold block">Edit Your Profile</span>
//         <button onclick="handleUpdateProfile()" class="-mt-2 text-md font-bold text-white bg-gray-700 rounded-full px-5 py-2 hover:bg-gray-800">Update</button>
//     </div>
//     <div class="pb-6">
//       <label for="name" class="font-semibold text-gray-700 block pb-1">Name</label>
//       <input id="name" class="border-1 rounded-r px-4 py-2 w-full" type="text" value="New name" />
//     </div>
//     <div class="pb-4">
//       <label for="email" class="font-semibold text-gray-700 block pb-1">Email</label>
//       <input id="email" class="border-1 rounded-r px-4 py-2 w-full" type="email" value="new@email.com" />
//     </div>
//     <div class="pb-4">
//       <label for="password" class="font-semibold text-gray-700 block pb-1">Date create account</label>
//       <input id="date" class="border-1 rounded-r px-4 py-2 w-full" type="text" value="2023-08-02" />
//     </div>
//     <div class="pb-4">
//       <label for="phoneNumber" class="font-semibold text-gray-700 block pb-1">Phone Number</label>
//       <input id="phoneNumber" class="border-1 rounded-r px-4 py-2 w-full" type="tel" value="0912345678" />
//     </div>
//     <div class="pb-4">
//       <label for="address" class="font-semibold text-gray-700 block pb-1">Address</label>
//       <input id="address" class="border-1 rounded-r px-4 py-2 w-full" type="text" value="123 Main Street, Anytown, CA 12345" />
//     </div>
//     <div class="pb-4">
//       <label for="image" class="font-semibold text-gray-700 block pb-1">Upload Image</label>
//       <input id="image" class="border-1 rounded-r px-4 py-2 w-full" type="file" />
//     </div>
//   </div>
// `;
// }

// function historyBooking() {
//     const profileInfo = document.querySelector("#profileInfo");
//     profileInfo.innerHTML = `
//     <div class="container mx-auto p-4 rounded-lg shadow-md bg-white">
//     <div class="flex items-center justify-between mb-4">
//       <h2 class="text-xl font-semibold">All booking </h2>
//     </div>
  
//     <div class="grid grid-cols-6 gap-4">
//       <div class="col-span-6">
//       </div>
  
//       <div class="col-span-6 bg-gray-100 rounded-lg">
//         <div class="grid grid-cols-6 py-4 px-6">
//           <div class="col-span-1 font-medium">Doctor</div>
//           <div class="col-span-1 font-medium">Specialization</div>
//           <div class="col-span-1 font-medium">Hospital</div>
//           <div class="col-span-1 font-medium">DateTime</div>
//           <div class="col-span-1 font-medium">Quantity</div>
//           <div class="col-span-1 font-medium text-center">Status</div>
//         </div>
  
//         <div class="grid grid-cols-6 py-2 px-6 gap-4 items-center" v-for="customer in customers">
//           <div class="col-span-1">Show từ data</div>
//           <div class="col-span-1">Show từ data</div>
//           <div class="col-span-1">Show từ data</div>
//           <div class="col-span-1">Show từ data</div>
//           <div class="col-span-1">Show từ data</div>
//           <div class="col-span-1 flex items-center justify-center rounded-full px-3 py-1 text-sm font-medium">
//             <span :class="{ 'bg-green-100 text-green-800': customer.status === 'active', 'bg-red-100 text-red-800': customer.status === 'inactive' }">{{ customer.status }}</span>
//           </div>
//         </div>
//       </div>
//     </div>
//   </div>
//   `;
// } 
function handleUpdateProfile() {
    var user_info_update = JSON.parse(localStorage.getItem("user-info"));
    var img = document.getElementById("image").value;
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var date = document.getElementById("date").value;
    var phoneNumber = document.getElementById("phoneNumber").value;
    var address = document.getElementById("address").value;

    user_info_update.image = img;
    user_info_update.fullName = username;
    user_info_update.email = email;
    user_info_update.date = date;
    user_info_update.phone = phoneNumber;
    user_info_update.address = address;
    console.log(user_info_update);

    // Gửi yêu cầu POST đến endpoint PHP
    fetch("/api/edit-profile", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(user_info_update),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            localStorage.setItem("user-info", JSON.stringify(user_info_update));
            window.location.href = "/view-profile";
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}
