<!-- This is an example component -->
<?php include_once '../../layouts/HtmlHead.php' ?>

<div class="h-full">

    <div class="border-b-2 block md:flex">

        <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white shadow-md">
            <div class="flex justify-between">
                <span class="text-xl font-semibold block">Edit Your Profile</span>
                <button onclick="handleUpdateProfile()" class="-mt-2 text-md font-bold text-white bg-gray-700 rounded-full px-5 py-2 hover:bg-gray-800">Update</button>
            </div>

            <span class="text-gray-600">This information is secret so be careful</span>
            <div class="w-full p-8 mx-2 flex justify-center">
                <img id="showImage" class="w-100 h-100 items-center border shadow-lg" src="../../assets/mrSinh.png" alt="">
            </div>
        </div>

        <div class="w-full md:w-3/5 p-8 bg-white lg:ml-4 shadow-md">
            <div class="rounded  shadow p-6">
                <div class="pb-6">
                    <label for="name" class="font-semibold text-gray-700 block pb-1">Name</label>
                    <div class="flex">
                        <input id="username" class=" bg-gray-50 border-1  rounded-r px-4 py-2 w-full" type="text" placeholder="Am Army" />
                    </div>
                </div>
                <div class="pb-4">
                    <label for="email" class="font-semibold text-gray-700 block pb-1">Email</label>
                    <input id="email" class=" bg-gray-50 border-1  rounded-r px-4 py-2 w-full" type="email" placeholder="Army25@gmail.com" />
                </div>
                <div class="pb-4">
                    <label for="password" class="font-semibold text-gray-700 block pb-1">Password</label>
                    <input id="password" class="border-1  rounded-r px-4 py-2 w-full" type="password " placeholder="" />
                </div>
                <div class="pb-4">
                    <label for="phoneNumber" class="font-semibold text-gray-700 block pb-1">Phone Number</label>
                    <input id="phoneNumber" class="border-1  rounded-r px-4 py-2 w-full" type="number" placeholder="0369735240" />
                </div>
                <div class="pb-4">
                    <label for="address" class="font-semibold text-gray-700 block pb-1">Address</label>
                    <input id="address" class="border-1  rounded-r px-4 py-2 w-full" type="text" placeholder="Ly Thuong Kiet" />
                </div>
            </div>
        </div>
    </div>
</div>