<?php include_once dirname(__DIR__) . '../../layouts/HtmlHead.php' ?>
<!-- <a href="../../layouts/HtmlHead.php"></a> -->

<body class="bg-blue-900 ">
    <section class="relative">
        <div class="absolute inset-0 "></div>
        <div class="flex items-center px-5 py-12 lg:px-20">
            <div class="flex flex-col w-full max-w-md p-10 mx-auto my-6 transition duration-500 ease-in-out transform bg-white rounded-lg md:mt-0 ">
                <form action="#" method="POST" class="space-y-6 shadow-md">
                    <div>
                        <label for="email" class="block text-sm font-medium text-neutral-600"> Email address </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required="" placeholder="Your Email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                            <p id="email-error" class="text-[13px] text-red-600"></p>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-medium text-neutral-600"> Password </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required="" placeholder="Your Password" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                            <p id="password-error" class="text-[13px] text-red-600"></p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" placeholder="Your password" class="w-4 h-4 text-blue-600 border-gray-200 rounded focus:ring-blue-500">
                            <label for="remember-me" class="block ml-2 text-sm text-neutral-600"> Remember me </label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-500"> Forgot your password? </a>
                        </div>
                    </div>

                    <div>
                        <button onclick="handleSubmitSignIn()" type="button" class="flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Sign in
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
                    <button onclick="handleOnClickCreateNewAccount()" type="button" class="w-full items-center block px-10 py-3.5 text-base font-medium text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Create new account
                    </button>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
</body>
<script>
    function handleSubmitSignIn() {
        const email = document.getElementById("email").value
        const password = document.getElementById("password").value

        axios.post('/api/sign-in', {
                email,
                password
            })
            .then(res => {
                const payload = res.data.payload;
                if (res.status === 200) {
                    localStorage.setItem("user-info", JSON.stringify(payload))
                    if (payload.role === "Admin") {
                        window.location.href = "/admin/manage"
                    } else if (payload.role === "Doctor") {
                        window.location.href = "/doctor/booking"
                    } else if (payload.role === "Patient") {
                        window.location.href = "/patient/home"
                    }
                }
            })
            .catch(error => {
                if (error.response.status === 401) {
                    document.getElementById("email-error").textContent = "email or password is invalid"
                    document.getElementById("password-error").textContent = "email or password is invalid"
                } else {
                    console.log("Error: ", error)
                }
                if (error.response.status === 422) {
                    const errors = error.response.data;
                    if (errors.error.email == "") {
                        document.getElementById("email-error").textContent = "Please enter email"
                    } else {
                        document.getElementById("email-error").textContent = ""

                    }
                    if (errors.error.password == "") {
                        document.getElementById("password-error").textContent = "Please enter password"
                    } else {
                        document.getElementById("password-error").textContent = ""
                    }
                } else {
                    console.log("Error: ", error)
                }
            });
    }

    function handleOnClickCreateNewAccount() {
        window.location.href = "/patient/sign-up"
    }
</script>