<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Care</title>
    <!--Tailwind-->
    <script src="https://cdn.tailwindcss.com"></script>
    <!---->
    <!--Google Font-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Poppins&display=swap');
    </style>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Volkhov:ital,wght@0,400;0,700;1,700&family=Yesteryear&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.3/axios.min.js" integrity="sha512-JWQFV6OCC2o2x8x46YrEeFEQtzoNV++r9im8O8stv91YwHNykzIS2TbvAlFdeH0GVlpnyd79W0ZGmffcRi++Bw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<script>
    function showInfo() {
    var user_info = JSON.parse(localStorage.getItem("user-info"))

    var img = document.getElementById('showImage')
    var username = document.getElementById('username')
    var email = document.getElementById('email')
    var date = document.getElementById('date')
    var password =document.getElementById('password')
    var phoneNumber = document.getElementById('phoneNumber')
    var address = document.getElementById('address')

    img.src = user_info.image
    username.value = user_info.fullName
    email.value = user_info.email
    phoneNumber.value = user_info.phone
    address.value = user_info.address
    password.value =user_info.password
    document.getElementById('name-profile').innerHTML =username.value
  }
</script>
