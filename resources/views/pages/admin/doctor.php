<?php include_once dirname(__DIR__) . '../../layouts/HtmlHead.php'; ?>
<script>
    const doctors = <?= json_encode($doctors);?>;
</script>
<div class="flex flex-wrap bg-gray-100 w-full h-screen">
    <?php include_once dirname(__DIR__) . '../../layouts/HtmlSidebarAdmin.php' ?>
    <div class="w-10/12">
        <div class="text-gray-900 bg-blue-100">
            <div class="p-4 flex">
                <h1 class="text-3xl">
                    Management doctor
                </h1>
            </div>
            <div class="px-3 py-4 flex justify-center">
                <div class="overflow-x-auto  height: auto;">
                    <button id="addButton" class="text-base bg-blue-500 hover:bg-blue-700 text-white m-1 py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer">
                        Add new doctor
                    </button>
                    <table class="w-full text-md bg-white shadow-md rounded mb-4">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-3 px-5 ">No. Doctor</th>
                                <th class="text-left py-3 px-5 ">Full name</th>
                                <th class="text-left py-3 px-5  ">Specialization</th>
                                <th class="text-left py-3 px-5  ">Hospital</th>
                                <th class="text-left py-3 px-5  ">Address</th>
                                <th class="text-left py-3 px-5 ">Email</th>
                                <th class="text-left py-3 px-5  ">Phone number</th>
                                <th class="text-left py-3 px-5  ">Password</th>
                                <th class="text-left py-3 px-5  ">Function</th>
                            </tr>
                        </thead>
                        <tbody id="doctorTableBody">
                            <script>
                            var tags = "";
                            doctors.map((doctor) => {
                                tag =
                                `<tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="py-3 px-5">${doctor.UserId} </td>
                                <td class="py-3 px-5">${doctor.FullName}</td>
                                <td class="py-3 px-5">${doctor.Specialization}</td>
                                <td class="py-3 px-5">${doctor.Hospital}</td>
                                <td class="py-3 px-5">${doctor.Address}</td>
                                <td class="py-3 px-5">${doctor.Email}</td>
                                <td class="py-3 px-5">${doctor.Phone}</td>
                                <td class="py-3 px-5">${doctor.Password}</td>
                                <td class="py-3 px-5 flex justify-end">
                                <button id="updateButton" onclick="update_Info(${doctor.UserId})" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer">
                                    Update
                                </button>
                                <button id="deleteButton" onclick="confirm_delete(${doctor.UserId})" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Delete
                                </button>
                                </td>
                                </tr>`;
                                tags += tag;
                                })
                                document.getElementById("doctorTableBody").innerHTML = tags;
                            </script>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded">
        <span id="addModalClose" class="absolute top-0 right-0 mt-4 mr-4 text-gray-500 cursor-pointer">&times;</span>
        <form method="post">
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label for="full-name" class="block text-sm font-medium text-neutral-600">Full name</label>
                    <div class="mt-1">
                        <input id="full-name" name="full-name" type="text" required="" placeholder="Doctor's full name" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>

                <div>
                    <label for="specialization" class="block text-sm font-medium text-neutral-600">Specialization</label>
                    <div class="mt-1">
                        <input id="specialization" name="specialization" type="text" equired="" placeholder="Doctor's specialization" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>

                <div>
                    <label for="hospital" class="block text-sm font-medium text-neutral-600"> Hospital </label>
                    <div class="mt-1">
                        <input id="hospital" name="hospital" type="text" required="" placeholder="Doctor's hospital" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-neutral-600"> Email </label>
                    <div class="mt-1">
                        <input id="emaill" name="emaill" type="email" autocomplete="email" required="" placeholder="Doctor's Email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>


                <div>
                    <label for="numberPhone" class="block text-sm font-medium text-neutral-600">Phone number </label>
                    <div class="mt-1">
                        <input id="numberPhone" name="numberPhone" type="text" required="" placeholder="Doctor's phone number" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-neutral-600" for="avatarInput"> Address </label>
                    <input type="text" id="address" placeholder="Doctor's address" name="address" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-neutral-600" for="Password Input"> Password  </label>
                    <input type="text" id="password" placeholder="Doctor's password" name="password" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-neutral-600" for="avatarInput">
                        Avatar
                    </label>
                    <input type="text" id="avatarInput" placeholder="Doctor's avatar" name="avatar" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                </div>
            </div>
            <div class="col-span-2 flex items-center justify-between" id="cancelModalClose">
                <button id="addSubmit" onclick="addDoctor()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Add
                </button>
                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded">
        <span id="deleteModalClose" class="absolute top-0 right-0 mt-4 mr-4 text-gray-500 cursor-pointer">&times;</span>
        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close model</span>
        </button>
        <div class="p-4 md:p-5 text-center" id="delete">
            <script>
                function confirm_delete(Id) {
                    var deleteModal = document.getElementById("deleteModal");
                    deleteModal.classList.remove("hidden");
                    var doctor_id = doctors.find((doctor) => doctor.UserId == Id)
                    var confirm =
                        `<svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Do you really want to delete the doctor?</h3>
                <button onclick="deleteDoctor(${doctor_id.UserId})" data-modal-hide="popup-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Yes, of course !
                </button>
                <button id="cancelModalClose" data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    No, cancel !</button>
                `
                    document.getElementById('delete').innerHTML = confirm;
                }
            </script>
        </div>
    </div>
</div>

<div id="updateModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded">
        <span id="updateModalClose" class="absolute top-0 right-0 mt-4 mr-4 text-gray-500 cursor-pointer">&times;</span>
        <div id="show-here"></div>
        <script>
            function update_Info(id) {
                var updateModal = document.getElementById("updateModal");
                updateModal.classList.remove("hidden");
                var doctorModel1 = doctors.find((doctor) => doctor.UserId == id)
                var form =
                    `<form >
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                        <div>
                            <label for="editModalFullName" class="block text-sm font-medium text-neutral-600"> Full name </label>
                            <div class="mt-1">
                                <input id="editModalFullName" value="${doctorModel1.FullName}" name="fullname" type="text" required="" placeholder="Doctor's full name" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" autocomplete="name">
                            </div>
                        </div>

                        <div>
                            <label for="editModalSpecilization" class="block text-sm font-medium text-neutral-600"> Specialization </label>
                            <div class="mt-1">
                                <input id="editModalSpecilization" value="${doctorModel1.Specialization}" name="specilization" type="text" equired="" placeholder="Doctor's specialization " class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                            </div>
                        </div>

                        <div>
                            <label for="editModalHospital" class="block text-sm font-medium text-neutral-600"> Hospital </label>
                            <div class="mt-1">
                                <input id="editModalHospital" value="${doctorModel1.Hospital}" name="hospital" type="text" required="" placeholder="Doctor's hospital" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                            </div>
                        </div>

                        <div>
                            <label for="editModalEmail" class="block text-sm font-medium text-neutral-600"> Email </label>
                            <div class="mt-1">
                                <input id="editModalEmail" disabled value="${doctorModel1.Email}" name="email" type="email" autocomplete="email" required="" placeholder="Doctor's email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                            </div>
                        </div>


                        <div>
                            <label for="editModalPhone" class="block text-sm font-medium text-neutral-600">Phone number</label>
                            <div class="mt-1">
                                <input id="editModalPhone" value="${doctorModel1.Phone}" name="phone" type="text" required="" placeholder="Doctor's phone number" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" autocomplete="phone">
                            </div>
                        </div>

                        <div>
                            <label for="editModalPassword" class="block text-sm font-medium text-neutral-600"> Password </label>
                            <div class="mt-1">
                                <input id="editModalPassword" value="${doctorModel1.Password}" name="pass" type="text" required="" placeholder="Doctor's password" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" autocomplete="phone">
                            </div>
                        </div>

                        <div>
                            <label for="editModalAddress" class="block text-sm font-medium text-neutral-600">Address</label>
                            <div class="mt-1">
                                <input id="editModalAddress" value="${doctorModel1.Address}" name="address" type="text" required="" placeholder="Doctor's address" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" autocomplete="address">
                            </div>
                        </div>

                        <div>
                            <label for="editModalAddress" class="block text-sm font-medium text-neutral-600">Avartar</label>
                            <div class="mt-1">
                                <input id="editModalImage" value="${doctorModel1.Url_Image}" name="Image" type="text" required="" placeholder="Doctor's avatar" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" autocomplete="address">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 flex items-center justify-between">
                        <button onclick="saveDoctorInfo(${doctorModel1.UserId})"  id="updateSubmit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
                            Save
                        </button>
                        <button id="cancelModalClose" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            Cancel
                        </button>
                    </div>
                </form>`
                document.getElementById('show-here').innerHTML = form;
            }
        </script>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Get the modals
    var updateModal = document.getElementById("updateModal");
    // var deleteModal = document.getElementById("deleteModal");
    var addModal = document.getElementById("addModal");
    // Get the buttons that open the modals
    var updateButton = document.getElementById("updateButton");
    var deleteButton = document.getElementById("deleteButton");
    var addButton = document.getElementById("addButton");
    // Get the close icons
    var updateModalClose = document.getElementById("updateModalClose");
    var deleteModalClose = document.getElementById("deleteModalClose");
    var addModalClose = document.getElementById("addModalClose");

    addButton.onclick = function() {
        addModal.classList.remove("hidden");
    }

    // Function to close the modals when the user clicks on the close icon
    var cancelModalClose = document.getElementById("cancelModalClose");

    cancelModalClose.onclick = function() {
        updateModal.style.display = "none";
        deleteModal.style.display = "none";
        addModal.style.display = "none";
    }

    // Function to close the modals when the user clicks outside the modal content
    window.onclick = function(event) {
        if (event.target == updateModal) {
            updateModal.classList.add("hidden");
        }

        if (event.target == deleteModal) {
            deleteModal.classList.add("hidden");
        }
        if (event.target == addModal) {
            addModal.classList.add("hidden");
        }
    }

    function addDoctor() {
        var email = document.getElementById('emaill').value;
        var password = document.getElementById('password').value;
        var fullName = document.getElementById('full-name').value;
        var phone = document.getElementById('numberPhone').value;
        var address = document.getElementById('address').value;
        var specialization = document.getElementById('specialization').value;
        var hospital = document.getElementById('hospital').value;
        var image = document.getElementById('avatarInput').value;
        var id = "";
        axios.post('/admin/addDoctor', {
            email: email,
            password: password,
            fullName: fullName,
            phone: phone,
            image: image,
            address: address,
            specialization: specialization,
            hospital: hospital,
            id: id
        })
        .then(function(response) {
            console.log('Doctor added:', response.data.message);
            window.location.href = '/admin/getDoctor';
        })

        .catch(function(error) {
            console.log('Error:', error);
        });
    }

    function saveDoctorInfo(id) {
        var name = document.getElementById('editModalFullName').value;
        var email = document.getElementById('editModalEmail').value;
        var phone = document.getElementById('editModalPhone').value;
        var address = document.getElementById('editModalAddress').value;
        var password = document.getElementById('editModalPassword').value;
        var specialization = document.getElementById('editModalSpecilization').value;
        var hospital = document.getElementById('editModalHospital').value;
        var image = document.getElementById('editModalImage').value;

        axios.post('/admin/updateDoctor', {
                fullName: name,
                email: email,
                phone: phone,
                address: address,
                password: password,
                specialization: specialization,
                hospital: hospital,
                image: image,
                id: id
            })
            .then(function(response) {
                console.log('Update successful:', response.data.message);
            })
            .catch(function(error) {
                console.log('Error:', error);
            });
    }

    function deleteDoctor(doctorId) {

        axios.post('/admin/deleteDoctor/' + doctorId)
            .then(function(response) {
                console.log(response.data);
                window.location.href = '/admin/getDoctor';
            })
            .catch(function(error) {
                console.log('Error:', error);
            });
    };
</script>