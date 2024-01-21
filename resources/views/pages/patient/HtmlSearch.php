<?php include_once  dirname(__DIR__) . '../../layouts/HtmlHead.php' ?>
<?php include_once dirname(__DIR__) . '../../layouts/HtmlNavbar.php' ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .container-search {
        display: flex;
        background-color: black;
        border-radius: 10px;
        width: 100%;
        max-width: 950px;
        padding: 10px 0;
    }

    .container {
        width: 90%;
        max-width: 950px;
        margin: 0 auto;
        padding: 20px;

    }

    .lists_card {
        display: flex;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .lists_card>div {
        width: calc(25% - 20px);
        margin-bottom: 20px;
        cursor: pointer;
    }

    .max-w-sm {
        max-width: 100%;
        overflow: hidden;
    }

    .max-w-sm {
        margin-right: 20px;
    }

    .max-w-sm img {
        width: 100%;
        height: auto;
        border-top-left-radius: 0.375rem;
        border-top-right-radius: 0.375rem;
    }

    .p-5 {
        padding: 1.25rem;
    }

    .mb-2 {
        margin-bottom: 0.5rem;
    }

    .text-2xl {
        font-size: 1.5rem;
    }

    .font-bold {
        font-weight: 700;
    }

    .tracking-tight {
        letter-spacing: -0.0125em;
    }

    .text-gray-900 {
        color: #333;
    }

    .dark:text-white {
        color: #fff;
    }

    .bg-white {
        background-color: #fff;
    }

    .dark:bg-gray-800 {
        background-color: #2d2d2d;
    }

    .border {
        border-width: 1px;
    }

    .rounded-lg {
        border-radius: 0.375rem;
    }

    .shadow {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .dark:border-gray-700 {
        border-color: #4a5568;
    }

    .dark:hover:border-gray-500 {
        border-color: #cbd5e0;
    }

    #input {
        width: 90%;
        border-radius: 10px;
        padding: 10px;
        box-sizing: border-box;
        margin-left: 10px;
    }

    #icon-search {
        background-color: black;
        margin-left: 10px;
    }

    .content {
        margin-top: 20px;
    }

    .title {
        font-size: 25px;
        font-weight: bolder;
    }

    .w-full {
        height: 300px !important;
        object-fit: cover;
    }

    @media screen and (max-width: 600px) {
        #icon-search {
            margin-left: 10px;
        }

        .container-search {
            flex-direction: column;
            align-items: center;
        }
    }
</style>

<body>
    <div class="container">
        <div class="container-search ">
            <input type="text" id="input">
            <button type="button" id="icon-search" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Search</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <path d="M21 21l-4.35-4.35" />
                </svg>
            </button>
        </div>
        <div class="content">
            <h1 class="title">List of Doctors</h1>
            <div class="lists_card">
            <h1 id="notifi" style="display: none; font-size: 60px; color: red;">No one else</h1>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    function redirectBooking(doctorId) {
        window.location.href = "/patient/list-doctor/booking?id=" + doctorId;
    }
    var searchButton = document.getElementById("icon-search");
    var listsCard = document.querySelector(".lists_card");
    searchButton.addEventListener("click", function() {
        var key = document.getElementById('input').value;
        if (key == "" || key == null) {
            alert('Please enter on box search!!!');
            return;
        }
        console.log(key)
        axios.post('/api/patient/search', {
                key
            })
            .then(res => {
                if (res.status === 200) {
                    if (res.data.ListDoctor == "" || res.data.ListDoctor == null) {
                        document.getElementById('notifi').style.display = "block";
                        return;
                    }
                    var listDoctor = res.data.ListDoctor;
                    console.log(listDoctor)
                    listDoctor.forEach(doctor => {
                        var doctorContainer = document.createElement("div");
                        doctorContainer.className = "max-w-sm bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700";
                        doctorContainer.onclick = function() {
                            redirectBooking(doctor.Id);
                        };

                        var img = document.createElement("img");
                        img.className = "w-full";
                        img.src = doctor.Url_Image;
                        img.alt = "";

                        var doctorInfoDiv = document.createElement("div");
                        doctorInfoDiv.className = "p-5";

                        var doctorNameH5 = document.createElement("h5");
                        doctorNameH5.className = "mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white";
                        doctorNameH5.textContent = "Bs. " + doctor.FullName;

                        doctorInfoDiv.appendChild(doctorNameH5);
                        doctorContainer.appendChild(img);
                        doctorContainer.appendChild(doctorInfoDiv);

                        listsCard.appendChild(doctorContainer);
                    });
                }
            });
    });
</script>