<?php include_once dirname(__DIR__) . '/../layouts/HtmlHead.php' ?>

<style>
    a {
        display: block;
        width: 100%;
        height: 40px;
        line-height: 40px;
        font-size: 18px;
        font-family: sans-serif;
        text-decoration: none;
        color: #333;
        border: 1px solid #333;
        letter-spacing: 2px;
        text-align: center;
        position: relative;
        transition: all .35s;
    }

    a span {
        position: relative;
        z-index: 2;
    }

    a:after {
        position: absolute;
        content: "";
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background: rgb(59 130 246);
        transition: all .35s;
    }

    a:hover {
        color: #fff;
    }

    a:hover:after {
        width: 100%;
    }
</style>

<div class=" w-full px-5 py-24 mx-auto lg:px-32">
    <div class="flex flex-col lg:flex-row lg:space-x-12">
        <div class="order-last w-full max-w-screen-sm m-auto mt-12 lg:w-1/4 lg:order-first">
            <div class="p-4 transition duration-500 ease-in-out transform bg-white border rounded-lg">
                <div class="flex py-2 mb-4">
                    <img src="https://cdn.pixabay.com/photo/2018/01/12/10/19/fantasy-3077928_1280.jpg" class="w-16 h-16 rounded-full">
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900">Wicked Labs</p>
                        <p class="text-sm text-gray-500">Agency</p>
                    </div>
                </div>
                <div class="text-center">
                    <a href="#" class="flex items-center px-6 py-2 mt-auto text-lg text-white transition duration-500 ease-in-out transform bg-blue-600 border border-current rounded hover:bg-blue-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">Follow </a>
                </div>
            </div>
        </div>
        <div class="w-full px-4 mt-12 prose lg:px-0 lg:w-3/4">
            <div class="mb-5 border-b border-gray-200">
                <div class="flex flex-wrap items-baseline mt-2">
                    <h1 class="css-1jxf684 text-2xl font-bold leading-[20.8px] text-primary text-blue-600">Tiến sĩ, Chuyên gia Tâm lý Lê Thị Huyền Trang (Tư vấn từ xa)</h1>
                    <p>Chuyên gia tư vấn giảm căng thẳng, khủng hoảng tâm lý, giúp ngủ ngon, ngủ sâu ở trẻ vị thành niên và người lớn.</p>
                    <p>Chuyên gia can thiệp tâm lý học đường, giúp cha mẹ và thầy cô quản lý hành vi chống đối, vi phạm kỷ luật của học sinh hoặc giúp học sinh xây dựng tình bạn lành mạnh</p>
                    <p>Chuyên gia tư vấn vượt qua mất mát, chia ly, lạm dụng và quấy rối tình dục, bạo lực gia đình, bạo lực công sở hoặc tai nạn, thảm họa hoặc căng thẳng về các vấn đề pháp luật.</p>
                </div>
                <div class="w-full bg-blue-500 p-2 text-white text-center mt-2">
                    <h1 class="text-2xl">Lịch Tư Vấn Qua Video</h1>
                    <h1 onclick="showModal()">hôm nay <span> 30/1 </span></h1>
                </div>
                <div class="grid grid-cols-4 grid-rows-5 my-5">
                    <?php
                    for ($i = 0; $i <= 8; $i++) {
                        echo '<button onclick="navigationFormBooking()" class="col-span-1 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded m-2">
                            7:00 - 8:00
                        </button>';
                    }
                    ?>

                    <div id="modal" class="fixed inset-0 flex items-center justify-center z-10 hidden">
                        <div class="bg-white w-1/2 p-6 rounded shadow-md relative">
                            <div class="flex justify-end">
                                <button onclick="hideModal()" class="text-gray-600 hover:text-gray-800">&times;</button>
                            </div>
                            <h2 class="text-xl font-bold mb-4">Thứ trong tuần</h2>
                            <div class="weekdays">

                                <div class="wrapper">
                                    <a href="#"><span>thứ: 2</span></a>
                                </div>
                                <div class="wrapper1">
                                    <a href="#"><span>thứ: 3</span></a>
                                </div>
                                <div class="wrapper2">
                                    <a href="#"><span>thứ: 4</span></a>
                                </div>
                                <div class="wrapper3">
                                    <a href="#"><span>thứ: 5</span></a>
                                </div>
                                <div class="wrapper4">
                                    <a href="#"><span>thứ: 6</span></a>
                                </div>
                                <div class="wrapper5">
                                    <a href="#"><span>thứ: 7</span></a>
                                </div>
                                <div class="wrapper6">
                                    <a href="#"><span>thứ: CN</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showModal() {
        document.getElementById("modal").classList.remove("hidden");
        document.body.classList.add("modal-open");
        document.addEventListener("click", handleOutsideClick);
        // document.body.style.opacity = "0";
        document.body.classList.remove("modal-open")
    }

    function hideModal() {
        document.getElementById("modal").classList.add("hidden");
        document.body.classList.remove("modal-open");
        document.removeEventListener("click", handleOutsideClick);
    }

    function handleOutsideClick(event) {
        if (event.target.id === "modal") {
            hideModal();
        }
    }

    function navigationFormBooking() {
        window.location.href = "patient/FormBooking"
    }
</script>
<?php include_once dirname(__DIR__) . '/../layouts/HtmlTail.php' ?>