<?php include_once dirname(__DIR__) . '../../layouts/HtmlHead.php'   ?>


<div class="flex flex-wrap bg-gray-100 w-full h-screen">
   
<?php include_once dirname(__DIR__) . '../../layouts/HtmlSidebarAdmin.php'   ?> 
    <div class="w-9/12">
        <div class="text-gray-900 bg-blue-100">
            <div class="p-4 flex">
                <h1 class="text-3xl">
                    Quản lý lịch khám
                </h1>
            </div>


            <div class="px-3 py-4 flex justify-center">

                <div class="overflow-x-auto">


                    <table class="w-full text-md bg-white shadow-md rounded mb-4">
                        <tbody>
                            <tr class="border-b">
                                <th class="text-left py-3 px-5">Mã lịch khám</th>
                                <th class="text-left py-3 px-5">Thời gian khám</th>
                                <th class="text-left py-3 px-5">Bác sĩ khám</th>
                                <th class="text-left py-3 px-5">Tên bệnh nhân</th>
                                <th class="text-left py-3 px-5">Ghi chú</th>



                            </tr>
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="py-3 px-5"><input type="text" class="bg-transparent">1</td>
                                <td class="py-3 px-5"><input type="text" class="bg-transparent">7:00 - 8:00 20-12-2023</td>

                                <td class="py-3 px-5"><input type="text" class="bg-transparent">Ths. BS. Trần Thành Luân</td>
                                <td class="py-3 px-5"><input type="text" class="bg-transparent">Y Âm</td>
                                <td class="py-3 px-5"><input type="text" class="bg-transparent">Tình trạng không kiểm soát được nhận thức</td>

                            </tr>





                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





</div>


<?php include_once dirname(__DIR__) . '../../layouts/HtmlTail.php'   ?>