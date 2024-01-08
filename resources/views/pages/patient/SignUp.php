<?php include_once dirname(__DIR__).'/../layouts/HtmlHead.php' ?>
<section class="">
    <div class=" items-center px-5 py-12 lg:px-20">
        <div class="flex flex-col w-full max-w-md p-10 mx-auto my-6 transition duration-500 ease-in-out transform bg-white rounded-lg md:mt-0">
            <div class="mt-8">
                <div class="mt-6">
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-neutral-600"> Email address </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" required="" placeholder="Your Email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                <p id="email-error" class="text-[13px] text-red-600"></p>
                            </div>
                        </div>

                        <div>
                            <label for="full-name" class="block text-sm font-medium text-neutral-600"> Full name </label>
                            <div class="mt-1">
                                <input id="full-name" name="full-name" required="" placeholder="Your Full Name" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                <p id="full-name-error" class="text-[13px] text-red-600"></p>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-medium text-neutral-600"> Password </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" required="" placeholder="Your Password" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                <p id="password-error" class="text-[13px] text-red-600"></p>
                            </div>
                        </div>

                        <div>
                            <button onclick="handleSubmitSignUp()" type="submit" class="flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Sign Up
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
                        <button onclick="handleOnClickSignIn()" type="button" class="w-full items-center block px-10 py-3.5 text-base font-medium text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Sign In
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function handleSubmitSignUp() {
        const email = document.getElementById("email").value
        const fullName = document.getElementById("full-name").value
        const password = document.getElementById("password").value
console.log ("Email " , email);
console.log ("Fullname  " , fullName);
console.log ("Psssword  " , password);



        axios.post('/api/patient/sign-up', {email, fullName, password})
            .then(res => {
                const payload = res.data.payload
                if (res.status === 200) {
                    localStorage.setItem("user-info", JSON.stringify(payload))
                    window.location.href = "/patient/home"
                }
            })
            .catch(error => {
                if (error.response.status === 401) {
                    // const errorRes = error.response.data.error
                    document.getElementById("email-error").textContent = "Email not validate. Should be containt @"
                    document.getElementById("password-error").textContent = ""
                    document.getElementById("full-name-error").textContent = errorRes.fullName
                }
            })
    }

    function handleOnClickSignIn() {
        window.location.href = "/sign-in"
    }
</script>

<?php include_once dirname(__DIR__).'/../layouts/HtmlTail.php' ?>
