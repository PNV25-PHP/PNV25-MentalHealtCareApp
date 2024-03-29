<div class="w-2/12 bg-white rounded p-3 shadow-lg">
    <div class="flex items-center space-x-4 p-2 mb-5">
        <img class="h-12 rounded-full" src="http://www.gravatar.com/avatar/2acfb745ecf9d4dccb3364752d17f65f?s=260&d=mp" alt="James Bhatta">
        <div>
            <h4 class="font-semibold text-lg text-gray-700 capitalize font-poppins tracking-wide"></h4>
            <span class="text-sm tracking-wide flex items-center space-x-1">
                <svg class="h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg><span class="text-gray-600">Verify</span>
            </span>
        </div>
    </div>
    <ul class="space-y-2 text-sm">
        <li>
            <a href="getDashboard" class="flex items-center space-x-3 p-2 rounded-md font-medium hover:bg-gray-200 focus:shadow-outline" id="1">
                <span class="text-gray-600">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </span>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="getDoctor" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline" id="2">
                <span class="text-gray-600">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </span>
                <span>Doctor</span>
            </a>
        </li>
        <li>
            <a href="getPatient" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline" id="3">
                <span class="text-gray-600">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </span>
                <span>Patient</span>
            </a>
        </li>
        <li>
            <a href="getBooking" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline" id="4">
                <span class="text-gray-600">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </span>
                <span>Appointment</span>
            </a>
        </li>



        <li>
            <a href="#" onclick="SignOut()" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
                <span class="text-gray-600">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </span>
                <span>Sign out</span>
            </a>
        </li>
    </ul>
</div>

<script>
    if (window.location.href == "http://localhost:8000/admin/getDoctor") {
        document.getElementById('2').classList.add('bg-gray-200');
    }
    if (window.location.href == "http://localhost:8000/admin/getDashboard") {
        document.getElementById('1').classList.add('bg-gray-200');
    }
    if (window.location.href == "http://localhost:8000/admin/getPatient") {
        document.getElementById('3').classList.add('bg-gray-200');
    }
    if (window.location.href == "http://localhost:8000/admin/getBooking") {
        document.getElementById('4').classList.add('bg-gray-200');
    }

    function SignOut() {
        window.location.href = "/"
        localStorage.clear();
    }
</script>