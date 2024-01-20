<?php
include_once dirname(__DIR__) . '../../layouts/HtmlHead.php';
?>
<div class="flex flex-wrap bg-gray-100 w-full h-screen">
    <?php include_once dirname(__DIR__) . '../../layouts/HtmlSidebarAdmin.php'   ?>
    <div class="w-10/12">
        <div class="text-gray-900 bg-blue-100">
            <div class="p-4 flex">
                <h1 class="text-3xl">
                    Dashboard
                </h1>
            </div>
            <div class="px-3 py-4 flex justify-center">
                <canvas id="doctorChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>
<script>
    const getBookingCountByDoctor = <?php echo json_encode($GetNumberBooking); ?>;
    const doctorData = {
        labels: getBookingCountByDoctor.map(item => item.doctorFullName),
        datasets: [{
            label: 'Số lượng lượt booking',
            data: getBookingCountByDoctor.map(item => item.BookingCount),
            backgroundColor: [
                'rgba(255, 193, 7, 0.6)',
                'rgba(33, 150, 243, 0.6)',
                'rgba(76, 175, 80, 0.6)',
                'rgba(255, 87, 34, 0.6)'
            ],
            borderColor: [
                'rgba(255, 193, 7, 1)',
                'rgba(33, 150, 243, 1)',
                'rgba(76, 175, 80, 1)',
                'rgba(255, 87, 34, 1)'
            ],
            borderWidth: 1
        }]
    };
    const ctx = document.getElementById('doctorChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: doctorData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
</script>