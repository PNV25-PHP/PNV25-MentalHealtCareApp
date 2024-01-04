<?php include_once  dirname(__DIR__) . '../../layouts/HtmlHead.php' ?>
<?php include_once dirname(__DIR__) . '../../layouts/HtmlNavbar.php' ?>
<link rel="stylesheet" href="../root/CSS/booking.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
</style>
<script src="https://cdn.tailwindcss.com"></script>

<style>
    /* General styles */
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


    /* Doctor list styles */
    .title_lists {
        text-align: center;
        padding: 20px 0;
    }

    .lists_card {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .max-w-sm {
        width: calc(33.33% - 20px);
        margin-bottom: 20px;
        box-sizing: border-box;
    }

    /* Responsive styles */
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
                Chúng tôi xin gửi lời chào trân trọng và cảm ơn sự quan tâm của quý khách hàng đến với chúng tôi. Trang web này được tạo ra với mục đích mang đến cho quý khách những trải nghiệm tuyệt vời và dịch vụ chất lượng.
            </p>
        </div>
        <div class="title_lists">
            <h1 class="lists_doctor">Danh sách bác sĩ</h1>
        </div>
        <div class="lists_card">
            <?php foreach ($doctors as $doctor) : ?>
                <a href="">
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
</body>
<?php include_once dirname(__DIR__) . '../../layouts/HtmlTail.php' ?>
<script>
    function redirectBooking(doctorId) {
        window.location.href = "/patient/list-doctor/booking?id=" + doctorId;
    }
</script>

</html>