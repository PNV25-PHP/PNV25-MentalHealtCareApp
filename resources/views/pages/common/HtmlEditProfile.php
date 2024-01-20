<?php include_once dirname(__DIR__) . '../../layouts/HtmlHead.php' ?>
<div class="h-full">
    <div class="border-b-2 block md:flex">
        <div class="w-full md:w-1/5 p-4 sm:p-6 lg:p-8 bg-blue-900 text-white shadow-md">
            <div class="flex justify-between">
                <span id="name-profile" class="text-xl font-semibold block"></span>
            </div>
            <div class="w-full p-8 mx-2 block justify-center">
                <img id="showImage" class="w-[150px] h-[150px] mb-10 items-center border-2 shadow-lg rounded-full" src="https://cff2.earth.com/uploads/2023/11/30185539/bottlenose-dolphin_1medium-960x640.jpg" alt="">
                <button type="button" class="w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/edit-profile">Edit Profile</a></button>
                <button type="button" class=" w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/patient/history-booking">History booking</a></button>
                <button type="button" class=" w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="/patient/home">Back </a></button>
            </div>
        </div>
        <div id="profileInfo" class="w-full md:w-4/5 p-8 bg-white lg:ml-4 shadow-md">
            <div class="rounded shadow p-6 grid grid-cols-2 gap-4">
                <div>
                    <label for="name" class="font-semibold text-gray-700 block pb-1">Name</label>
                    <div class="flex">
                        <input id="username" class="border-1 rounded-r px-4 py-2 w-full" type="text" />
                    </div>
                </div>
                <div>
                    <label for="phoneNumber" class="font-semibold text-gray-700 block pb-1">Phone Number</label>
                    <input id="phoneNumber" class="border-1 rounded-r px-4 py-2 w-full" type="tel" />
                </div>
                <div>
                    <label for="email" class="font-semibold text-gray-700 block pb-1">Email</label>
                    <input disabled id="email" class="border-1 rounded-r px-4 py-2 w-full" type="email" value="" />
                </div>
                <div>
                    <label for="password" class="font-semibold text-gray-700 block pb-1">Password</label>
                    <input id="password" class="border-1 rounded-r px-4 py-2 w-full" type="password" />
                </div>
                <div>
                    <label for="address" class="font-semibold text-gray-700 block pb-1">Address</label>
                    <input id="address" class="border-1 rounded-r px-4 py-2 w-full" type="text" />
                </div>
                <div>
                    <label for="image" class="font-semibold text-gray-700 block pb-1">Upload Image</label>
                    <input class="border-1 rounded-r px-4 py-2 w-full" type="file" id="fileInput" accept="image/*" />
                </div>
                <button onclick="handleUpdateProfile()" class="w-[100px] -mt-2 text-md font-bold text-white bg-gray-700 rounded-full px-4 py-2 hover:bg-gray-800">Update</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    var user_info_update12 = JSON.parse(localStorage.getItem('user-info'));
    // document.getElementById('fileInput').value = user_info_update.image;
    showInfo()
    // Hàm uploadImage sử dụng Axios
    function sendImageToServer(base64Image) {
    return new Promise((resolve, reject) => {
        axios.post('/upload_image', {
                image: base64Image
            })
            .then(response => {
                console.log('Image uploaded successfully');
                const imageUrl = response.data.imageUrl;
                console.log('Image URL:', imageUrl);
                resolve(imageUrl);
            })
            .catch(error => {
                console.error('Error uploading image', error);
                reject(error);
            });
    });
}

async function uploadImage() {
    const fileInput = document.getElementById('fileInput');
    const selectedFile = fileInput.files[0];

    if (selectedFile) {
        const reader = new FileReader();

        return new Promise((resolve, reject) => {
            reader.onload = function(e) {
                const base64Image = e.target.result;
                sendImageToServer(base64Image)
                    .then(imageUrl => resolve(imageUrl))
                    .catch(error => reject(error));
            };

            reader.readAsDataURL(selectedFile);
        });
    } else {
        return Promise.reject('No file selected');
    }
}

async function handleUpdateProfile() {
    try {
        var img = await uploadImage();
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var phoneNumber = document.getElementById('phoneNumber').value;
        var address = document.getElementById('address').value;
        var password = document.getElementById('password').value;
        var role = user_info_update12.role;

        // ... rest of the code ...

        var user_info_update = {
            image: img,
            fullName: username,
            email: email,
            phone: phoneNumber,
            address: address,
            password: password,
            role: role
            // ... rest of the properties ...
        };

        console.log(user_info_update);

        axios.post('/api/edit-profile', user_info_update, {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            console.log(response);
            localStorage.setItem('user-info', JSON.stringify(user_info_update));
            window.location.href = '/view-profile';
        })
        .catch(error => {
            console.error('Error:', error);
        });
    } catch (error) {
        console.error('Error:', error);
    }
}
</script>