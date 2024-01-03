<!-- This is an example component -->
<?php include_once dirname(__DIR__) . '../../layouts/HtmlHead.php' ?>
<div class="h-full">

    <div class="border-b-2 block md:flex">

        <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white shadow-md">
            <div class="flex justify-between">
                <span class="text-xl font-semibold block">Edit Your Profile</span>
                <button onclick="handleUpdateProfile()" class="-mt-2 text-md font-bold text-white bg-gray-700 rounded-full px-5 py-2 hover:bg-gray-800">Update</button>
            </div>

            <span class="text-gray-600">This information is secret so be careful</span>
            <div class="w-full p-8 mx-2 flex justify-center">
                <img id="showImage" class="w-100 h-100 items-center border shadow-lg" src="" alt="">
            </div>
        </div>

        <div class="w-full md:w-3/5 p-8 bg-white lg:ml-4 shadow-md">
            <div class="rounded  shadow p-6">
                <div class="pb-6">
                    <label for="name" class="font-semibold text-gray-700 block pb-1">Name</label>
                    <div class="flex">
                        <input id="username" class="border-1  rounded-r px-4 py-2 w-full" type="text" />
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
                    <input id="phoneNumber" class="border-1  rounded-r px-4 py-2 w-full" type="tel" />
                </div>
                <div class="pb-4">
                    <label for="address" class="font-semibold text-gray-700 block pb-1">Address</label>
                    <input id="address" class="border-1  rounded-r px-4 py-2 w-full" type="text" />
                </div>
                <div class="pb-4">
                    <label for="Image" class="font-semibold text-gray-700 block pb-1">Upload Image</label>
                    <input id="image" class="border-1  rounded-r px-4 py-2 w-full" type="file" />
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    showInfo()

    function handleUpdateProfile() {
        // Lấy dữ liệu đã được cập nhật
        const user_info_update = JSON.parse(localStorage.getItem('user-info'));

        // Tạo đối tượng ProfileRequest với các trường phù hợp với backend
        const profileRequest = {
            email: user_info_update.email,
            fullName: user_info_update.fullName,
            phone: user_info_update.phone,
            address: user_info_update.address,
            urlImage: user_info_update.image,
        };

        // Gửi yêu cầu cập nhật dữ liệu lên backend
        axios.post('/api/update/profile', profileRequest)
            .then(response => {
                if (response.status === 200) {
                    // Cập nhật dữ liệu trong localStorage
                    localStorage.setItem('user-info', JSON.stringify(user_info_update));

                    // Chuyển hướng đến trang view-profile
                    window.location.href = '/view-profile';
                } else {
                    // Xử lý lỗi
                    console.error('Cập nhật dữ liệu thất bại:', response.data);
                }
            })
            .catch(error => {
                // Xử lý lỗi
                console.error('Lỗi khi gửi yêu cầu:', error);
            });
    }

    // function handleUpdateProfile() {
    //     user_info_update = JSON.parse(localStorage.getItem('user-info'))
    //     var img = document.getElementById('image')
    //     var username = document.getElementById('username')
    //     var phoneNumber = document.getElementById('phoneNumber')
    //     var address = document.getElementById('address')
    //     var image = document.getElementById('image')

    //     user_info_update.image = img.value 
    //     user_info_update.fullName = username.value 
    //     user_info_update.phone = phoneNumber.value 
    //     user_info_update.address = address.value 
    //     console.log(user_info_update)
    //     localStorage.setItem("user-info", JSON.stringify(user_info_update))
    //     window.location.href = "/view-profile"
    // }



    //     function uploadImage() {
    //   const formData = new FormData();
    //   formData.append('image', document.getElementById('image').files[0]);

    //   fetch('/upload-image', {
    //     method: 'POST',
    //     body: formData
    //   })
    //   .then(response => response.text())
    //   .then(result => {
    //     console.log(result);

    //     if (result === 'success') {
    //       // Lưu thông tin người dùng vào localStorage
    //       const userInfo = {
    //         fname: document.getElementById('fname').value,
    //         lname: document.getElementById('lname').value,
    //         email: document.getElementById('email').value,
    //         password: document.getElementById('password').value
    //       };

    //       localStorage.setItem('user-info', JSON.stringify(userInfo));

    //       console.log('User info saved to localStorage.');
    //     }
    //   })
    //   .catch(error => {
    //     console.error('Error:', error);
    //   });
    // }
</script>