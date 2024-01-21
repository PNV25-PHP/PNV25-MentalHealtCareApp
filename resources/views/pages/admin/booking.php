<?php include_once dirname(__DIR__) . '../../layouts/HtmlHead.php'; ?>
<script>
    const Bookings = <?= json_encode($Bookings) ?>;
</script>
<div class="flex flex-wrap bg-gray-100 w-full h-screen">
    <?php include_once dirname(__DIR__) . '../../layouts/HtmlSidebarAdmin.php' ?>
    <div class="w-10/12">
        <div class="text-gray-900 bg-blue-100">
            <div class="p-4 flex">
                <h1 class="text-3xl">
                    Management appointment
                </h1>
            </div>
            <div class="px-3 py-4 flex justify-center">
                <div class="overflow-x-auto w-full">
                    <table class="w-full text-md bg-white shadow-md rounded mb-4">
                        <tbody>
                            <tr class="border-b ">
                                <th class="text-left py-3 px-5">No. Appointment</th>
                                <th class="text-left py-3 px-5">Time appointment</th>
                                <th class="text-left py-3 px-5">Doctor's name</th>
                                <th class="text-left py-3 px-5">Doctor's phone number</th>
                                <th class="text-left py-3 px-5">Patient's name</th>
                                <th class="text-left py-3 px-5">Price</th>
                            </tr>
                        <tbody id="shows_here">
                        </tbody>
                        <script>
                            var tags = "";
                            Bookings.map((booking) => {
                                var tag = `<tr class="border-b hover:bg-orange-100 bg-gray-100">
                                    <td class="py-3 px-5">${booking.ID}</td>
                                    <td class="py-3 px-5">${booking.time + ", " + booking.datebooking  }</td>
                                    <td class="py-3 px-5">${booking.DoctorFullName}</td>
                                    <td class="py-3 px-5">${booking.DoctorPhone}</td>
                                    <td class="py-3 px-5">${booking.PatientFullName}</td>
                                    <td class="py-3 px-5">${booking.Price } </td>
                                </tr>`;
                                tags += tag;
                            })
                            document.getElementById('shows_here').innerHTML = tags;
                        </script>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once dirname(__DIR__) . '../../layouts/HtmlTail.php'   ?>