<?php include_once  dirname(__DIR__) . '../../layouts/HtmlHead.php' ?>
<?php include_once dirname(__DIR__) . '../../layouts/HtmlNavbar.php' ?>
<link rel="stylesheet" href="../root/CSS/booking.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
</style>
<script src="https://cdn.tailwindcss.com"></script>

<style>

    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Header styles */
    .header {
        position: relative;
        text-align: center;
    }

    .title,
    .sub_title {
        color: blue;
        text-align: center;
    }

    .title {
        font-size: 50px;
        font-weight: bolder;
        font-family: Georgia, "Times New Roman", Times, serif;
        margin-top: 80px;
    }

    .sub_title {
        font-size: 22px;
        margin-top: 20px;
    }


    .imgDoctor {
        width: 100%;
    }

    .max-w-sm {
        margin: 10px;
    }

    /* Doctor list styles */
    .title_lists {
        text-align: center;
        padding: 20px 0;
    }

    .lists_card {
        display: flex;
        flex-wrap: wrap;

    }

    .max-w-sm {
        width: calc(25% - 20px);
        margin-bottom: 20px;
        box-sizing: border-box;
    }

    .rounded-t-lg {
        width: 100%;
    }

    .listPage {
        padding: 10px;
        text-align: center;
        list-style: none;
    }

    .listPage li {
        background-color: #ffffffBD;
        padding: 5px 15px 5px 15px;
        display: inline-block;
        margin: 0 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    .listPage .active {
        background-color: black;
        color: #fff;
    }

    @media only screen and (max-width: 768px) {
        .title {
            font-size: 30px;
        }

        .sub_title {
            font-size: 16px;
            top: 20px;
            left: 0;
            width: 100%;
        }

        .lists_doctor {
            font-size: 36px;
        }

        .max-w-sm {
            width: calc(50% - 20px);
        }
    }
</style>

<body>
    <div class="container">
        <div class="header">
            <img class="imgDoctor" src="https://res.cloudinary.com/dlmxi3lk0/image/upload/v1704254012/mental%20health%20care/szkg0o52ozdjsjpf2awz.png" alt="doctor">
            <h1 class="title">Mental Health Care</h1>
            <p class="sub_title">
                We would like to extend our warm greetings and express our gratitude for your interest in our services. This website was created with the aim of providing you with excellent experiences and high-quality services.
            </p>
        </div>
        <div class="title_lists">
            <h1 class="lists_doctor">List of doctors</h1>
        </div>
        <div class="lists_card">
            <?php foreach ($doctors as $doctor) : ?>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" onclick="redirectBooking('<?php echo $doctor->Id; ?>')">
                    <a href="#">
                        <img class="rounded-t-lg" src="https://tse1.mm.bing.net/th?id=OIP.iBEROnR1X-Hp8w9CCBwsLwHaHa&pid=Api&P=0&h=180" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Bs. <?php echo $doctor->FullName ?></h5>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <ul class="listPage"></ul>
</body>
<?php include_once dirname(__DIR__) . '../../layouts/HtmlTail.php' ?>
<script>
    function redirectBooking(doctorId) {
        window.location.href = "/patient/list-doctor/booking?id=" + doctorId;
    }
    let thisPage = 1;
    let limit = 8;
    let list = document.querySelectorAll('.lists_card .max-w-sm');

    function loadItem() {
        let beginGet = limit * (thisPage - 1);
        let endGet = limit * thisPage - 1;
        list.forEach((item, key) => {
            if (key >= beginGet && key <= endGet) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        })
        listPage();
    }
    loadItem();

    function listPage() {
        let count = Math.ceil(list.length / limit);
        document.querySelector('.listPage').innerHTML = '';

        if (thisPage != 1) {
            let prev = document.createElement('li');
            prev.innerText = 'PREV';
            prev.setAttribute('onclick', "changePage(" + (thisPage - 1) + ")");
            document.querySelector('.listPage').appendChild(prev);
        }

        for (i = 1; i <= count; i++) {
            let newPage = document.createElement('li');
            newPage.innerText = i;
            if (i == thisPage) {
                newPage.classList.add('active');
            }
            newPage.setAttribute('onclick', "changePage(" + i + ")");
            document.querySelector('.listPage').appendChild(newPage);
        }

        if (thisPage != count) {
            let next = document.createElement('li');
            next.innerText = 'NEXT';
            next.setAttribute('onclick', "changePage(" + (thisPage + 1) + ")");
            document.querySelector('.listPage').appendChild(next);
        }
    }

    function changePage(i) {
        thisPage = i;
        loadItem();
    }
</script>

</html>