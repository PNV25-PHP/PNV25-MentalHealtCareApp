<?php include_once dirname(__DIR__) . '/../layouts/HtmlHead.php' ?>

<body class="bg-blue-900 ">
    <section class="relative">
        <div class="absolute inset-0 "></div>
        <div class="w-100 flex items-center px-5 py-12 lg:px-20">
            <div class="flex flex-col w-100 p-10 mx-auto my-6 transition duration-500 ease-in-out transform bg-white rounded-lg md:mt-0 ">
                <div class="rounded shadow p-6">
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="full-name" class="font-semibold text-gray-700 block pb-1">Full name</label>
                            <div>
                                <input id="full-name" name="full-name" required="" placeholder="Your Full Name" class="border-1 rounded-r px-4 py-2 w-full" type="text">
                                <p id="full-name-error" class="text-[13px] text-red-600"></p>
                            </div>
                        </div>

                        <div>
                            <label for="phoneNumber" class="font-semibold text-gray-700 block pb-1">Phone Number</label>
                            <div>
                                <input id="phoneNumber" name="phoneNumber" required="" placeholder="Your Phone Number" class="border-1 rounded-r px-4 py-2 w-full" type="text">
                                <p id="phoneNumber-error" class="text-[13px] text-red-600"></p>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="font-semibold text-gray-700 block pb-1">Email address</label>
                            <div>
                                <input id="email" name="email" type="email" required="" placeholder="Your Email" class="border-1 rounded-r px-4 py-2 w-full" type="email">
                                <p id="email-error" class="text-[13px] text-red-600"></p>
                            </div>
                        </div>

                        <div>
                            <label for="password" class="font-semibold text-gray-700 block pb-1">Password</label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" required="" placeholder="Your Password" class="border-1 rounded-r px-4 py-2 w-full" type="password">
                                <p id="password-error" class="text-[13px] text-red-600"></p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="address" class="font-semibold text-gray-700 block pb-1">Address</label>
                        <div class="mt-1">
                            <input id="address" name="address" type="address" required="" placeholder="Your address" class="border-1 rounded-r px-4 py-2 w-full" type="text">
                            <p id="address-error" class="text-[13px] text-red-600"></p>
                        </div>
                    </div>
                </div>
                <div>
                    <button onclick="handleSubmitSignUp()" type="button" class="w-40 flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Sign Up
                    </button>
                </div>
                <div class="relative my-4">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 text-neutral-600 bg-white"> Or continue with </span>
                    </div>
                </div>
                <div>
                    <button onclick="handleOnClickSignIn()" type="button" class="w-40 w-full items-center block px-10 py-3.5 text-base font-medium text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Sign In
                    </button>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
</body>
<script>
    function handleSubmitSignUp() {
        const fullName = document.getElementById("full-name").value;
        const phone = document.getElementById("phoneNumber").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const address = document.getElementById("address").value;


        axios
            .post('/api/patient/sign-up', {
                email,
                password,
                address,
                phone,
                fullName
            })
            .then(res => {
                const payload = res.data.payload;
                if (res.status === 200) {
                    window.location.href = "/login";
                }
            })
            .catch(error => {
                if (error.response.status === 400) {
                    const errors = error.response.data;
                    if (errors.error.email) {
                        document.getElementById("email-error").textContent = "wrong email format";
                    } else {
                        document.getElementById("email-error").textContent = "";
                    }
                    if (errors.error.password) {
                        document.getElementById("password-error").textContent = "Password must be at least 6 digits containing upper and lower case letters, numbers and special characters";
                    } else {
                        document.getElementById("password-error").textContent = "";
                    }
                    if (errors.error.fullName) {
                        document.getElementById("full-name-error").textContent = "Name at least 2 characters";
                    } else {
                        document.getElementById("full-name-error").textContent = "";
                    }
                }
                if (error.response.status === 422) {
                    const errors = error.response.data;
                    if (errors.error.email == "") {
                        document.getElementById("email-error").textContent = "Please fill in your email";
                    } else {
                        document.getElementById("email-error").textContent = "";
                    }
                    if (errors.error.password == "") {
                        document.getElementById("password-error").textContent = "Please fill in your password";
                    } else {
                        document.getElementById("password-error").textContent = "";
                    }
                    if (errors.error.fullName == "") {
                        document.getElementById("full-name-error").textContent = "Please fill in your name";
                    } else {
                        document.getElementById("full-name-error").textContent = "";
                    }
                    if (errors.error.phone == "") {
                        document.getElementById("phoneNumber-error").textContent = "Please fill in your phone";
                    } else {
                        document.getElementById("phoneNumber-error").textContent = "";
                    }
                    if (errors.error.address == "") {
                        document.getElementById("addres-error").textContent = "Please fill in your address";
                    } else {
                        document.getElementById("addres-error").textContent = "";
                    }
                }
                if (error.response.status === 401) {
                    const errors = error.response.data;
                    if (errors.error == "email is error") {
                        document.getElementById("email-error").textContent = "email already exists";
                        document.getElementById("full-name-error").textContent = "";
                        document.getElementById("password-error").textContent = "";
                    } else {
                        document.getElementById("email-error").textContent = "";
                    }
                }

            });
    }

    function handleOnClickSignIn() {
        window.location.href = "/"
    }
</script>