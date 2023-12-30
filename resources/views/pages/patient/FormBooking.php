<?php include_once dirname(__DIR__) . '/../layouts/HtmlHead.php' ?>
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:700');

    body {
        margin: 0px;
        font-family: 'Roboto';
        text-align: center;
    }

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
        color: #fff;
        padding: 3px 12px;
        height: 45px;
        margin-bottom: 45px;
        display: inline-block;
    }

    #flip div:first-child {
        animation: show 5s linear infinite;
    }

    #flip div div {
        background: #42c58a;
    }

    #flip div:first-child div {
        background: #4ec7f3;
    }

    #flip div:last-child div {
        background: #DC143C;
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
<div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="flex max-w-md w-full ">
        <div>
            <p class="text-center text-gray-500"> Tiến sĩ, Chuyên gia Tâm lý Lê Thị Huyền Trang (Tư vấn từ xa) </p>
        </div>
    </div>
    <div class="text-2xl py-4 px-6 bg-blue-500 text-white text-center font-bold uppercase">
        <div class="text-2xl py-4 px-6 bg-blue-500 text-white text-center font-bold uppercase">
            <div id=container>
                Đặt lịch
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
    <form class="py-4 px-6" action="" method="POST">
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">
                Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Enter your name">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Enter your email">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="phone">
                Phone Number
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="tel" placeholder="Enter your phone number">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="date">
                Date
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date" type="date" placeholder="Select a date">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="time">
                Time
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="time" type="time" placeholder="Select a time">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="message">
                Message
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" rows="4" placeholder="Enter any additional information"></textarea>
        </div>
        <div class="flex items-center justify-center mb-4">
            <button class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline" type="submit">
                Book Appointment
            </button>
        </div>

    </form>
</div>
<?php include_once dirname(__DIR__) . '/../layouts/HtmlTail.php' ?>