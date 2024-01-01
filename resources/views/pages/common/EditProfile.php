<?php include_once dirname(__DIR__) . '/../layouts/HtmlHead.php' ?>
<?php include_once dirname(__DIR__) . '/../layouts/HtmlNavbar.php' ?>

<section class="">
    <div class=" items-center px-5 py-12 lg:px-20">
        <div class="flex flex-col w-full max-w-md p-10 mx-auto my-6 transition duration-500 ease-in-out transform bg-white rounded-lg md:mt-0">
            <div class="mt-8">
                <div class="mt-6">
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-neutral-600"> Email </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" required="" placeholder="Your Email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                <p id="email-error" class="text-[13px] text-red-600"></p>
                            </div>
                        </div>

                        <div>
                            <label for="full-name" class="block text-sm font-medium text-neutral-600"> Họ và tên </label>
                            <div class="mt-1">
                                <input id="full-name" name="full-name" required="" placeholder="Your Full Name" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                <p id="full-name-error" class="text-[13px] text-red-600"></p>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-medium text-neutral-600"> Mật khẩu </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" required="" placeholder="Your Password" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                <p id="password-error" class="text-[13px] text-red-600"></p>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="phone" class="block text-sm font-medium text-neutral-600">Số điện thoại </label>
                            <div class="mt-1">
                                <input id="phone" name="phone" type="number" required="" placeholder="Your phone" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                <p id="phone-error" class="text-[13px] text-red-600"></p>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="address" class="block text-sm font-medium text-neutral-600">Địa chỉ</label>
                            <div class="mt-1">
                                <input id="address" name="address" type="text" required="" placeholder="Your address" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                <p id="address-error" class="text-[13px] text-red-600"></p>
                            </div>
                        </div>

                        <div>
                            <button onclick="updateProfile()" type="button" class="flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Update
                            </button>
                        </div>
                    </form>
                    <div class="relative my-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 text-neutral-600 bg-white"> Or continue with </span>
                        </div>
                    </div>
                    <div>
                        <button onclick="Cancel()" type="button" class="w-full items-center block px-10 py-3.5 text-base font-medium text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // fetch lấy dữ liệu 
    const email = document.getElementById("email").value; // Thay thế bằng địa chỉ email cụ thể bạn muốn tìm kiếm

    axios.get("/findByEmail", {
            email
        })
        .then((response) => {
            const data = response.data;

            if (data) {
                const fullname = data.FullName;
                const password = data.Password;
                const phone = data.Phone;
                const address = data.Address;

                // Gán giá trị của biến fullname cho trường nhập có id là full-name
                document.querySelector("#full-name").setAttribute("value", fullname);

                document.querySelector("#password").setAttribute("value", password);

                document.querySelector("#phone").setAttribute("value", phone);

                document.querySelector("#address").setAttribute("value", fullname);
            } else {
                // Xử lý trường hợp không tìm thấy user
                alert("User not found");
            }
        })
        .catch((error) => {
            console.log("Error: ", error);
        });

    function updateProfile() {
        const email = document.getElementById("email").value
        const fullName = document.getElementById("full-name").value
        const password = document.getElementById("password").value
        const phone = document.getElementById("phone").value
        const address = document.getElementById("address").value
        axios.post('/api/updateUser', {
                email,
                fullName,
                password,
                phone,
                address
            }, {
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(res => {
                if (res.status === 201) {
                    const payload = res.data.payload;
                    localStorage.setItem("user-info", JSON.stringify(payload));
                    window.location.href = "/patient/home";
                } else {
                    console.error("Unexpected response status:", res.status);
                    throw new Error("Update failed");
                }
            })
            .catch(error => {
                if (error.response && error.response.status === 400) {
                    const errorRes = error.response.data.error;
                    document.getElementById("email-error").textContent = errorRes.email || "Invalid email";
                    document.getElementById("password-error").textContent = errorRes.password || "Invalid password";
                    document.getElementById("full-name-error").textContent = errorRes.fullName || "Invalid full name";
                    document.getElementById("phone-error").textContent = errorRes.fullName || "Invalid phone number";
                    document.getElementById("address-error").textContent = errorRes.fullName || "Invalid address";


                } else {
                    console.error("Error updating profile:", error);
                    alert("An error occurred while updating your profile. Please try again.");
                }
            });
    }

    function Cancel() {
        window.location.href = "/patient/home"
    }
</script>

<?php include_once dirname(__DIR__) . '/../layouts/HtmlTail.php' ?>