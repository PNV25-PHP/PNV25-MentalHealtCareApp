<?php
include_once dirname(__DIR__) . '../../layouts/HtmlHead.php';
?>

<div class="flex flex-wrap bg-gray-100 w-full h-screen">
    <?php include_once dirname(__DIR__) . '../../layouts/HtmlSidebarAdmin.php'   ?>

    <div class="w-9/12">
        <div class="text-gray-900 bg-blue-100">
            <div class="p-4 flex">
                <h1 class="text-3xl">
                    Thống kê
                </h1>
            </div>

            <div class="px-3 py-4 flex justify-center">
                <!-- Biểu đồ cột thống kê số lượng bệnh nhân đặt của từng bác sỹ -->
                <canvas id="doctorChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<?php include_once dirname(__DIR__) . '../../layouts/HtmlTail.php'   ?>

<script>
    // Thực hiện truy vấn để lấy dữ liệu số lượng đơn cho từng bác sĩ
    const getBookingCountByDoctor = <?php echo json_encode($GetNumberBooking); ?>;
    
    // Xử lý dữ liệu để đưa vào biểu đồ
    const doctorData = {
        labels: getBookingCountByDoctor.map(item => item.doctorFullName),
        datasets: [{
            label: 'Số lượng lượt booking',
            data: getBookingCountByDoctor.map(item => item.BookingCount),
            backgroundColor: [
                'rgba(255, 193, 7, 0.6)', // Bright Yellow
                'rgba(33, 150, 243, 0.6)', // Bright Blue
                'rgba(76, 175, 80, 0.6)', // Bright Green
                'rgba(255, 87, 34, 0.6)' // Bright Orange
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

    // Get the canvas element and render the chart
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
