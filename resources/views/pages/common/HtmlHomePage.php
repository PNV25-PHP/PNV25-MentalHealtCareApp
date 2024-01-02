<?php include_once '../../layouts/HtmlHead.php' ?>

<body class="font-poppins ">

    <img src="../../assets/homepage.png" alt="">

    <div class="relative mt-10 mb-10 w-full h-full grid grid-cols-[40%,55%]">
        <div class="mt-20">
            <div class=" text-center text-blue-500 text-2xl font-bold uppercase tracking-wide font-poppins">
                WELCOME TO CARE SERVICES
            </div>
            <div class=" text-center text-blue-900 text-3xl font-medium font-poppins">
                Great place to place your trust
            </div>

        </div>
        <div class="text-gray-700 text-base font-normal  font-poppins">
            In a world that can often feel overwhelming, we are here to offer a place of peace and reflection for patients who are seeking to understand themselves better. We are a listening ear and a shoulder to cry on, and we are here to help you find the mental health experts you need to thrive.
            <br>
            <br>
            We believe that everyone deserves access to quality mental health care, and we are committed to making that care as accessible and affordable as possible. Our website provides a wealth of resources and information, including articles, videos, and a directory of mental health professionals.
            <br>
            <br>
            Whether you are struggling with depression, anxiety, stress, or any other mental health issue, we are here to help. Come explore our website and find the support you deserve.
        </div>
        <div class="absolute left-582 top-149 w-109.83 h-22"></div>
    </div>
    <img src="../../assets/mainhomepage.png" class="object-contain mt-8 w-full px-24" alt="Background Image 2">

    <section class="px-24 my-12 ">
        <div class=" mx-auto w-full ">
            <div id="default-carousel" class="relative  " data-carousel="static">
                <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="flex">
                            <img src="../../assets/avatardoctor.png" class="w-100 h-100 ml-20" alt="Image">
                            <div class="ml-20 mt-20">
                                <div class="text-black text-4xl font-poppins font-normal break-words">
                                    Mr.Tran Thanh Luan
                                </div>
                                <div class="text-black text-lg font-poppins font-normal break-words">
                                    Department of Neurology, Hospital 199
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="flex">
                            <img src="../../assets/mrsArmy.png" class="w-100 h-100 ml-20    " alt="Image">
                            <div class="ml-20 mt-20">
                                <div class="text-black text-4xl font-poppins font-normal break-words">
                                    Mrs.Army
                                </div>
                                <div class="text-black text-lg font-poppins font-normal break-words">
                                    Department of Neurology, Hospital 199
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="flex">
                            <img src="../../assets/mrSinh.png" class="w-100 h-100 ml-20" alt="Image">
                            <div class="ml-20 mt-20">
                                <div class="text-black text-4xl font-poppins font-normal break-words">
                                    Mr.Dang Van Sinh
                                </div>
                                <div class="text-black text-lg font-poppins font-normal break-words">
                                    Department of Neurology, Hospital 199
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="flex">
                            <img src="../../assets/mrNghia.png" class="w-100 h-100 ml-20" alt="Image">
                            <div class="ml-20 mt-20">
                                <div class="text-black text-4xl font-poppins font-normal break-words">
                                    Mr.Mai Xuan Nghia
                                </div>
                                <div class="text-black text-lg font-poppins font-normal break-words">
                                    Department of Neurology, Hospital 199
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                </div>

                <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                        <svg class="w-5 h-5 text-black sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <span class="hidden">Anterior</span>
                    </span>
                </button>
                <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 0 group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                        <svg class="w-5 h-5 text-black sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="hidden">Siguiente</span>
                    </span>
                </button>
            </div>


            <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
        </div>

    </section>

    <section>
        <div class=" text-center text-blue-500 text-2xl font-bold  tracking-wide font-poppins">
            Better Information, Better Health
        </div>
        <div class=" text-center text-blue-900 text-3xl font-bold font-poppins">
            NEW
        </div>
        <div class="mt-5 block">
            <div class="grid grid-cols-[48%,48%] gap-1 ml-5 mb-5">
                <div class="flex bg-gray-200 shadow-xl rounded-md">
                    <img class="rounded-tl-lg rounded-tr-lg" src="../../assets/takecare.png" />
                    <div class="block ml-5 mt-10">
                        <div class="text-blue-500 text-sm font-poppins font-normal break-words">
                            Monday 05, August 2021 | By Nghia
                        </div>
                        <div class="text-black text-lg font-poppins font-normal leading-7 break-words">
                            Teenagers don't care to mental health
                        </div>

                        <div class="">
                            <div class="flex">
                                <div class="">
                                    <div class="border-2 border-blue-500"></div>
                                    <div class="border-2 border-blue-500"></div>
                                </div>
                                <div class="text-black text-sm font-semibold break-words">68</div>
                            </div>
                            <div class="flex">
                                <div class="bg-red-500"></div>
                                <div class="text-black text-sm font-semibold break-words">86</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full h-full relative ml-5">
                    <div class="flex bg-gray-200 shadow-xl rounded-md ">
                        <img class="rounded-tl-lg rounded-tr-lg" src="../../assets/takecare.png" />
                        <div class="block ml-5 mt-10">
                            <div class="text-blue-500 text-sm font-poppins font-normal break-words">
                                Monday 05, August 2021 | By Nghia
                            </div>
                            <div class="text-black text-lg font-poppins font-normal leading-7 break-words">
                                Teenagers don't care to mental health
                            </div>
                            <div class="">
                                <div class="flex">
                                    <div class="">
                                        <div class="border-2 border-blue-500"></div>
                                        <div class="border-2 border-blue-500"></div>
                                    </div>
                                    <div class="text-black text-sm font-semibold break-words">68</div>
                                </div>
                                <div class="flex">
                                    <div class="bg-red-500"></div>
                                    <div class="text-black text-sm font-semibold break-words">86</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-[48%,48%] gap-1 ml-5">
                <div class="flex bg-gray-200 shadow-xl rounded-md ">
                    <img class="rounded-tl-lg rounded-tr-lg" src="../../assets/takecare.png" />
                    <div class="block ml-5 mt-10">
                        <div class="text-blue-500 text-sm font-poppins font-normal break-words">
                            Monday 05, August 2021 | By Nghia
                        </div>
                        <div class="text-black text-lg font-poppins font-normal leading-7 break-words">
                            Teenagers don't care to mental health
                        </div>

                        <div class="">
                            <div class="flex">
                                <div class="">
                                    <div class="border-2 border-blue-500"></div>
                                    <div class="border-2 border-blue-500"></div>
                                </div>
                                <div class="text-black text-sm font-semibold break-words">68</div>
                            </div>
                            <div class="flex">
                                <div class="bg-red-500"></div>
                                <div class="text-black text-sm font-semibold break-words">86</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full h-full relative ml-5">
                    <div class="flex bg-gray-200 shadow-xl rounded-md ">
                        <img class="rounded-tl-lg rounded-tr-lg" src="../../assets/takecare.png" />
                        <div class="block ml-5 mt-10">
                            <div class="text-blue-500 text-sm font-poppins font-normal break-words">
                                Monday 05, August 2021 | By Nghia
                            </div>
                            <div class="text-black text-lg font-poppins font-normal leading-7 break-words">
                                Teenagers don't care to mental health
                            </div>
                            <div class="">
                                <div class="flex">
                                    <div class="">
                                        <div class="border-2 border-blue-500"></div>
                                        <div class="border-2 border-blue-500"></div>
                                    </div>
                                    <div class="text-black text-sm font-semibold break-words">68</div>
                                </div>
                                <div class="flex">
                                    <div class="bg-red-500"></div>
                                    <div class="text-black text-sm font-semibold break-words">86</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="flex ml-20 pl-20 mt-20 mb-10">
            <div class=" mr-10 w-[220px] h-[80px] bg-blue-900 rounded-lg">
                <div class="pt-2 pl-2 pr-2 pb-2">
                    <div class="ext-blue-900 text-lg font-semibold uppercase font-poppins">Addres</div>
                    <div class="text-gray-300 text-sm font-medium font-poppins">99 To Hien Thanh-Da Nang</div>
                </div>
            </div>
            <div class="mr-10 w-[220px] h-[80px] bg-blue-900 rounded-lg">
                <div class="pt-2 pl-2 pr-2 pb-2">
                    <div class="ext-blue-900 text-lg font-semibold uppercase font-poppins">URGENT</div>
                    <div class="text-gray-300 text-sm font-medium font-poppins">Phone 1: (237) 681-812-255</div>
                    <div class="text-gray-300 text-sm font-medium font-poppins">Phone 2: (237) 666-331-894</div>
                </div>
            </div>
            <div class="mr-10 w-[220px] h-[80px] bg-blue-900 rounded-lg">
                <div class="pt-2 pl-2 pr-2 pb-2">
                    <div class="ext-blue-900 text-lg font-semibold uppercase font-poppins">Email</div>
                    <div class="text-gray-300 text-sm font-medium font-poppins">benhvien199@gmail.com</div>
                    <div class="text-gray-300 text-sm font-medium font-poppins">bv199@gmail.com</div>
                </div>
            </div>
            <div class="mr-10 w-[220px] h-[80px] bg-blue-900 rounded-lg">
                <div class="pt-2 pl-2 pr-2 pb-2">
                    <div class="ext-blue-900 text-lg font-semibold uppercase font-poppins">Work time</div>
                    <div class="text-gray-300 text-sm font-medium font-poppins">Mon-Sat 09:00-20:00</div>
                    <div class="text-gray-300 text-sm font-medium font-poppins">Sunday Emergency only</div>
                </div>
            </div>

        </div>
    </section>
