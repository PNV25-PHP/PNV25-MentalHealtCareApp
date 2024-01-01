<?php include_once dirname(__DIR__) . '/../layouts/HtmlHead.php' ?>
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:700');

    #container {
        color: white;
        text-transform: uppercase;
        font-size: 36px;
        font-weight: bold;
        width: 100%;
        bottom: 45%;
        display: block;
    }

    #flip {
        height: 50px;
        margin-top: 15px;
        overflow: hidden;
    }

    #flip>div>div {
        color: black;
        padding: 3px 12px;
        height: 45px;
        margin-bottom: 45px;
        display: inline-block;
    }

    #flip div:first-child {
        animation: show 5s linear infinite;
    }

    @keyframes show {
        0% {
            margin-top: -270px;
        }

        5% {
            margin-top: -180px;
        }

        33% {
            margin-top: -180px;
        }

        38% {
            margin-top: -90px;
        }

        66% {
            margin-top: -90px;
        }

        71% {
            margin-top: 0px;
        }

        99.99% {
            margin-top: 0px;
        }

        100% {
            margin-top: -270px;
        }
    }

    p {
        position: fixed;
        width: 100%;
        bottom: 30px;
        font-size: 12px;
        color: #999;
        margin-top: 200px;
    }
</style>
<div class="max-w-md mx-auto mt-10 bg-white rounded-lg overflow-hidden">
    <div class="flex max-w-md w-full ">
        <div>
            <p class="text-center text-gray-500"> Tiến sĩ, Chuyên gia Tâm lý Lê Thị Huyền Trang (Tư vấn từ xa) </p>
        </div>
    </div>
    <div class="text-2xl mb-3 py-4 px-6 text-white text-center font-bold uppercase">
        <div class="text-2xl py-4 px-6 text-white text-center font-bold uppercase">
            <div id=container class="font-bold">
                <div class="font-bold text-black">Đặt lịch</div>
                <div id=flip>
                    <div>
                        <div>tiện.</div>
                    </div>
                    <div>
                        <div>lợi.</div>
                    </div>
                    <div style="padding-top: 10px;">
                        <div>chuyên nghiệp.</div>
                    </div>
                    <div>
                        <div>giá rẻ.</div>
                    </div>
                    <div>
                        <div>hiện đại</div>
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST">
        <div>
            <label for="name" class="block text-sm font-medium text-neutral-600"> Name </label>
            <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" required="" placeholder="Your Name" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" fdprocessedid="r8abrv">
            </div>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-neutral-600"> Email address </label>
            <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" required="" placeholder="Your Email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" fdprocessedid="r8abrv">
            </div>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-neutral-600"> Phone Number </label>
            <div class="mt-1">
                <input id="PhoneNumber" name="PhoneNumber" type="type" autocomplete="false" required="" placeholder="Your Phone Number" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" fdprocessedid="r8abrv">
            </div>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-neutral-600"> Email address </label>
            <div class="mt-1">
                <!-- <input id="date" name="date" type="text" autocomplete="false" required="" placeholder="Your Date Booking" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" fdprocessedid="r8abrv"> -->
                <input class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" id="date" name="date" type="text" autocomplete="false" required="" placeholder="Select a date">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-neutral-600" for="time">
                Time
            </label>
            <input class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" id="time" type="time" placeholder="Select a time">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="message">
                Message
            </label>
            <textarea class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" id="message" rows="4" placeholder="Enter any additional information"></textarea>
        </div>
        <div class="flex items-center justify-center mb-4">
            <div>
                <button type="submit" class="flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" fdprocessedid="awen2j">Book Appointment</button>
            </div>
        </div>

    </form>
</div>
<?php include_once dirname(__DIR__) . '/../layouts/HtmlTail.php' ?>