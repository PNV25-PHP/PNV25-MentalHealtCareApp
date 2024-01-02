<?php
include_once dirname(__DIR__) . '../../layouts/HtmlHead.php';

?>
<div class="flex flex-wrap bg-gray-100 w-full h-screen">
    <?php include_once dirname(__DIR__) . '../../layouts/HtmlSidebarAdmin.php'   ?>
    <div class="w-9/12">
        <div class="text-gray-900 bg-blue-100">
            <div class="p-4 flex">
                <h1 class="text-3xl">
                    Quản lý bác sĩ
                </h1>

            </div>
            <div class="px-3 py-4 flex justify-center">

                <div class="overflow-x-auto  height: auto;">

                    <button id="addButton" class="text-sm bg-blue-500 hover:bg-blue-700 text-white m-1 py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer">
                        Thêm bác sỹ
                    </button>
                    <table class="w-full text-md bg-white shadow-md rounded mb-4">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-3 px-5 ">Mã BS</th>
                                <th class="text-left py-3 px-5 ">Họ tên</th>
                                <th class="text-left py-3 px-5  ">Chuyên ngành</th>
                                <th class="text-left py-3 px-5  ">Bệnh viện</th>
                                <th class="text-left  py-3 px-5 ">Email</th>
                                <th class="text-left py-3 px-5  ">Số điện thoại</th>
                                <th class="text-left py-3 px-5  ">Ảnh đại diện</th>
                                <th class="text-left py-3 px-5  ">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody id="doctorTableBody">

                            <tr class="border-b hover:bg-orange-100 bg-gray-100 "  data-doctor-id="<?= $doctor->UserId ?> ">
                                <td class="py-3 px-5"><?= $doctor->UserId ?> </td> //mãBS
                                <td class="py-3 px-5"></td> //Họ tên
                                <td class="py-3 px-5"></td> //chuyên ngnahf
                                <td class="py-3 px-5"> </td> // bệnh viện
                                <td class="py-3 px-5"> </td> // email
                                <td class="py-3 px-5"> </td> // số điện thoại
                                <td class="py-3 px-5"> </td> // ảnh đại diện
                                <td class="py-3 px-5 flex justify-end">
                                    <button onclick="openEditModal('<?= $doctor->Id ?>')" id="updateButton" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer">
                                        Sửa
                                    </button>
                                    <button  id="deleteButton" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        Xoá
                                    </button>
                                </td>
                            </tr>
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
        <form method="POST" action="#">
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">


                <div>
                    <label for="full-name" class="block text-sm font-medium text-neutral-600"> Họ tên </label>
                    <div class="mt-1">
                        <input id="full-name" name="full-name" type="text" required="" placeholder="Họ tên bác sĩ" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>

                <div>
                    <label for="specialization" class="block text-sm font-medium text-neutral-600"> Chuyên ngành </label>
                    <div class="mt-1">
                        <input id="specialization" name="specialization" type="text" equired="" placeholder="Your Email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>

                <div>
                    <label for="hospital" class="block text-sm font-medium text-neutral-600"> Bệnh viện </label>
                    <div class="mt-1">
                        <input id="hospital" name="hospital" type="text" required="" placeholder="Your Email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-neutral-600"> Email </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required="" placeholder="Your Email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>


                <div>
                    <label for="numberPhone" class="block text-sm font-medium text-neutral-600"> Số điện thoại</label>
                    <div class="mt-1">
                        <input id="numberPhone" name="numberPhone" type="text" required="" placeholder="Your Email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>


                <div class="mb-4">
                    <label class="block text-sm font-medium text-neutral-600" for="avatarInput">
                        Ảnh đại diện
                    </label>
                    <input type="file" id="avatarInput" name="avatar" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                </div>




            </div>

            <div class="col-span-2 flex items-center justify-between">
                <button id="addSubmit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Thêm mới
                </button>
                <button id="cancelModalClose" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Hủy bỏ
                </button>
            </div>
        </form>
    </div>
</div>


<!-- Modal for Delete -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded">
        <span id="deleteModalClose" class="absolute top-0 right-0 mt-4 mr-4 text-gray-500 cursor-pointer">&times;</span>
        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Đóng model</span>
        </button>
        <div class="p-4 md:p-5 text-center">
            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Bạn có thực sự muốn xoá bác sỹ?</h3>
            <button onclick="deleteDoctor()" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                Vâng, chắc chắn !
            </button>
            <button id="cancelModalClose" data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                Không, huỷ bỏ !</button>
        </div>
    </div>
</div>

<!-- Modal for Update -->
<div id="updateModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded">
        <span id="updateModalClose" class="absolute top-0 right-0 mt-4 mr-4 text-gray-500 cursor-pointer">&times;</span>
        <form>
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label for="editModalFullName" class="block text-sm font-medium text-neutral-600"> Họ tên </label>
                    <div class="mt-1">
                        <input id="editModalFullName" name="fullname" type="text" required="" placeholder="Họ tên bác sĩ" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>

                <div>
                    <label for="editModelSpecilization" class="block text-sm font-medium text-neutral-600"> Chuyên ngành </label>
                    <div class="mt-1">
                        <input id="editModelSpecilization" name="specilization" type="text" equired="" placeholder="Chuyên ngành" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>

                <div>
                    <label for="editModelHospital" class="block text-sm font-medium text-neutral-600"> Bệnh viện </label>
                    <div class="mt-1">
                        <input id="editModelHospital" name="hospital" type="text" required="" placeholder="Bệnh viện" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>

                <div>
                    <label for="editModelEmail" class="block text-sm font-medium text-neutral-600"> Email </label>
                    <div class="mt-1">
                        <input id="editModelEmail" name="email" type="email" autocomplete="email" required="" placeholder="Email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>


                <div>
                    <label for="editModelPhone" class="block text-sm font-medium text-neutral-600"> Số điện thoại</label>
                    <div class="mt-1">
                        <input id="editModelPhone" name="phone" type="text" required="" placeholder="Số điện thoại" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>

                <div>
                    <label for="editModelAddress" class="block text-sm font-medium text-neutral-600">Địa chỉ</label>
                    <div class="mt-1">
                        <input id="editModelAddress" name="address" type="text" required="" placeholder="Địa chỉ" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                    </div>
                </div>



                <div class="mb-4">
                    <label class="block text-sm font-medium text-neutral-600" for="editModelAvatar">
                        Ảnh đại diện
                    </label>
                    <input type="file" id="editModelAvatar" name="avatar" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                </div>




            </div>
            <div class="col-span-2 flex items-center justify-between">
                <button onclick="saveDoctorInfo()" id="updateSubmit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Lưu
                </button>
                <button id="cancelModalClose" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Hủy
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Get the modals
    var updateModal = document.getElementById("updateModal");
    var deleteModal = document.getElementById("deleteModal");
    var addModal = document.getElementById("addModal");
    // Get the buttons that open the modals
    var updateButton = document.getElementById("updateButton");
    var deleteButton = document.getElementById("deleteButton");
    var addButton = document.getElementById("addButton");
    // Get the close icons
    var updateModalClose = document.getElementById("updateModalClose");
    var deleteModalClose = document.getElementById("deleteModalClose");
    var addModalClose = document.getElementById("addModalClose");
    // Function to open the update modal
    updateButton.onclick = function() {
        updateModal.classList.remove("hidden");
    }


    addButton.onclick = function() {
        addModal.classList.remove("hidden");
    }
    // Function to open the delete modal
    deleteButton.onclick = function() {
        deleteModal.classList.remove("hidden");
    }

    // Function to close the modals when the user clicks on the close icon
    var cancelModalClose = document.getElementById("cancelModalClose");

    cancelModalClose.onclick = function() {
        updateModal.classList.add("hidden");
        deleteModal.classList.add("hidden");
        addModal.classList.add("hidden");
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
</script>


<!-- openmodel of add Doctor - update Doctor - delete Doctor -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchDoctorsData();
    });

    function fetchDoctorsData() {
        fetch('/admin/getDoctor')
            .then(response => response.json())
            .then(data => {
                displayDoctors(data);
            })
            .catch(error => console.error('Error:', error));

    }

    function displayDoctors(doctors) {
        const tableBody = document.getElementById('doctorTableBody');

        doctors.forEach(doctor => {
            const row = document.createElement('tr');

            // Thêm dữ liệu vào từng ô td
            const userIdCell = document.createElement('td');
            userIdCell.textContent = doctor.UserId;
            row.appendChild(userIdCell);

            const fullNameCell = document.createElement('td');
            fullNameCell.textContent = doctor.FullName;
            row.appendChild(fullNameCell);

            const specializationCell = document.createElement('td');
            specializationCell.textContent = doctor.Specialization;
            row.appendChild(specializationCell);

            const hospitalCell = document.createElement('td');
            hospitalCell.textContent = doctor.Hospital;
            row.appendChild(hospitalCell);

            const emailCell = document.createElement('td');
            emailCell.textContent = doctor.Email;
            row.appendChild(emailCell);

            const phoneCell = document.createElement('td');
            phoneCell.textContent = doctor.Phone;
            row.appendChild(phoneCell);

            const addressCell = document.createElement('td');
            addressCell.textContent = doctor.Address;
            row.appendChild(addressCell);

            const urlimageCell = document.createElement('td');
            urlimageCell.textContent = doctor.Urlimage;
            row.appendChild(urlimageCell);


            // Tạo ô chứa nút Sửa và Xoá
            const actionsCell = document.createElement('td');
            actionsCell.className = 'py-3 px-5 flex justify-end';

            const updateButton = document.createElement('button');
            updateButton.id = 'updateButton';
            updateButton.className = 'text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer';
            updateButton.textContent = 'Sửa';
            actionsCell.appendChild(updateButton);

            const deleteButton = document.createElement('button');
            deleteButton.id = 'deleteButton';
            deleteButton.className = 'text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline';
            deleteButton.textContent = 'Xoá';
            actionsCell.appendChild(deleteButton);

            row.appendChild(actionsCell);

            // Thêm dòng vào tbody
            tableBody.appendChild(row);
        });
    }
</script>

<!-- open mode update, get data of doctor by ID, implement update in4 in db -->

<!-- Đoạn JavaScript ở cuối trang -->
<!-- Include Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Đoạn JavaScript -->
<script>
    function openEditModal(doctorId) {
        // Gửi yêu cầu AJAX để lấy thông tin bác sĩ theo ID
        axios.get('/admin/getDoctorById/' + doctorId)
            .then(function(response) {
                var data = response.data;
                document.getElementById('editModalFullName').value = data.FullName;
                document.getElementById('editModalEmail').value = data.Email;
                document.getElementById('editModalPhone').value = data.Phone;
                document.getElementById('editModalAddress').value = data.Address;
                document.getElementById('editModelSpecilization').value = data.Specilization;
                document.getElementById('editModalHospital').value = data.Hospital;
                document.getElementById('editModalAvatar').value = data.Avatar;

                $('#updateModal').modal('show');
            })
            .catch(function(error) {
                console.log('Error:', error);
            });
    }

    function saveDoctorInfo()
     {
        var fullName = document.getElementById('editModalFullName').value;
        var doctorId = window.doctorId;

        var email = document.getElementById('editModalEmail').value;
        var phone = document.getElementById('editModalPhone').value;
        var address = document.getElementById('editModalAddress').value;
        var specialization = document.getElementById('editModelSpecilization').value;
        var hospital = document.getElementById('editModalHospital').value;
        var avatar = document.getElementById('editModalAvatar').value;

        axios.post('/admin/updateDoctor/' + doctorId, {
                fullName: fullName,
                email: email,
                phone: phone,
                address: address,
                specialization: specialization,
                hospital: hospital,
                avatar: avatar
            })
            .then(function(response) {
                // Xử lý thành công (nếu cần)
                console.log('Update successful:', response.data.message);
                // Đóng modal sau khi cập nhật thành công
                $('#updateModal').modal('hide');
            })
            .catch(function(error) {
                console.log('Error:', error);
            });
    }
</script>






<script>
   document.getElementById('deleteButton').addEventListener('click', function () {
    // Lấy giá trị doctorId của bác sĩ cần xoá
    var doctorId = this.closest('tr').getAttribute('data-doctor-id');

    // Gọi Ajax để xoá thông tin bác sĩ
    axios.delete('/admin/deleteDoctor/' + doctorId)
        .then(function (response) {
            // Xoá thành công, có thể làm các bước cần thiết khác
            console.log(response.data);

            // Đóng modal
            $('#deleteModal').modal('hide');
        })
        .catch(function (error) {
            console.log('Error:', error);
        });
});

</script>








<?php include_once dirname(__DIR__) . '../../layouts/HtmlTail.php'   ?>