<?php
    include('./config/config.php');
    include('./includes/header.php');
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แดชบอร์ดร้านกัญชา สระบุรี</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Google Fonts - Mitr -->
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Mitr', sans-serif;
            background-color: #f8f9fa;
        }
        
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            border: none;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .page-title {
            color: #2b4b7e;
            font-weight: 600;
            position: relative;
            padding-bottom: 10px;
        }
        
        .page-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, #2b4b7e, #446cd2);
        }
        
        .stat-card {
            border-left: 4px solid;
        }
        
        .chart-container {
            position: relative;
            height: 250px;
            width: 100%;
        }
        
        @media (max-width: 768px) {
            .chart-container {
                height: 200px;
            }
        }
        
        .badge {
            font-weight: 500;
            padding: 5px 10px;
            font-size: 0.85rem;
        }
        
        .bg-primary-light {
            background-color: rgba(13, 110, 253, 0.1);
        }
        
        .bg-success-light {
            background-color: rgba(25, 135, 84, 0.1);
        }
        
        .bg-danger-light {
            background-color: rgba(220, 53, 69, 0.1);
        }
        
        .bg-info-light {
            background-color: rgba(13, 202, 240, 0.1);
        }
        
        .stat-icon {
            font-size: 1.75rem;
            opacity: 0.8;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 500;
        }
        
        .progress {
            height: 8px;
            border-radius: 4px;
        }
        
        .progress-bar {
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="container-fluid py-4">
        <!-- หัวข้อหลัก -->
        <div class="text-center mb-5">
            <h3 class="page-title"><i class="fas fa-chart-pie mr-2"></i>แดชบอร์ดสรุปข้อมูลร้านกัญชา</h3>
            <p class="text-muted">ข้อมูลสถิติร้านขายกัญชาที่ได้รับอนุญาตในจังหวัดสระบุรี</p>
        </div>

        <!-- การ์ดสถิติ -->
        <div class="row mb-4">
            <!-- การ์ด: จำนวนร้านทั้งหมด -->
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card stat-card border-left-primary h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">ร้านทั้งหมด</h6>
                                <h3 class="mb-0"><?php echo $STORE_ALL ?></h3>
                                <small class="text-muted">จากทั้งหมดในระบบ</small>
                            </div>
                            <div class="bg-primary-light p-3 rounded">
                                <i class="fas fa-store stat-icon text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- การ์ด: ร้านที่เปิดดำเนินการ -->
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card stat-card border-left-success h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">ร้านที่เปิดดำเนินการ</h6>
                                <h3 class="mb-0"><?php echo $STORE_OPEN ?></h3>
                                <div class="progress mt-2">
                                    <div class="progress-bar bg-success" style="width: <?php echo ($STORE_OPEN/$STORE_ALL)*100 ?>%"></div>
                                </div>
                            </div>
                            <div class="bg-success-light p-3 rounded">
                                <i class="fas fa-check-circle stat-icon text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- การ์ด: ร้านที่ปิดดำเนินการ -->
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card stat-card border-left-danger h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">ร้านที่ปิดดำเนินการ</h6>
                                <h3 class="mb-0"><?php echo $STORE_CLOSE ?></h3>
                                <div class="progress mt-2">
                                    <div class="progress-bar bg-danger" style="width: <?php echo ($STORE_CLOSE/$STORE_ALL)*100 ?>%"></div>
                                </div>
                            </div>
                            <div class="bg-danger-light p-3 rounded">
                                <i class="fas fa-times-circle stat-icon text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- การ์ด: อัพเดตล่าสุด -->
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card stat-card border-left-info h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">อัพเดตล่าสุด</h6>
                                <h5 class="mb-1"><?php echo "$day $month $year"; ?></h5>
                                <small class="text-muted"><?php echo $dayOfWeek ?></small>
                            </div>
                            <div class="bg-info-light p-3 rounded">
                                <i class="fas fa-calendar-alt stat-icon text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- แถวกราฟ -->
        <div class="row mb-4">
            <!-- กราฟแท่ง: สถานะใบอนุญาตแยกตามประเภท -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-chart-bar mr-2 text-primary"></i>สถานะใบอนุญาตแยกตามประเภท</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="licenseStatusChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- กราฟวงกลม: การกระจายตัวของประเภทใบอนุญาต -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-chart-pie mr-2 text-success"></i>การกระจายตัวของประเภทใบอนุญาต</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="licenseTypeChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- กราฟสถานะร้านแยกตามอำเภอ -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-map-marked-alt mr-2 text-info"></i>สถานะร้านแยกตามอำเภอ</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="height: 300px;">
                            <canvas id="districtStatusChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row">
            <!-- สรุปตามประเภทใบอนุญาต -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-tags mr-2 text-warning"></i>สรุปตามประเภทใบอนุญาต</h5>
                    </div>
                    <div class="card-body">
                        <div id="licenseTypeSummary" class="d-flex flex-column">
                           
                        </div>
                    </div>
                </div>
            </div>

            <!-- สรุปตามสถานะใบอนุญาต -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-file-signature mr-2 text-danger"></i>สรุปตามสถานะใบอนุญาต</h5>
                    </div>
                    <div class="card-body">
                        <div id="licenseStatusSummary" class="d-flex flex-column">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
       
        const mockShops = <?php echo $jsonShops; ?>;
        
        // ฟังก์ชันเตรียมข้อมูลสำหรับกราฟ
        function prepareChartData() {
            // ข้อมูลสำหรับกราฟประเภทใบอนุญาต
            const licenseTypes = ['จำหน่าย', 'วิจัย', 'ส่งออก'];
            
            // นับจำนวนตามประเภทใบอนุญาต
            const typeCounts = licenseTypes.map(type => 
                mockShops.filter(shop => shop.type === type).length
            );
            
            // นับสถานะใบอนุญาตตามประเภท
            const statusByType = {
                'จำหน่าย': {
                    'มีใบอนุญาต': mockShops.filter(shop => shop.type === 'จำหน่าย' && shop.status_permission === 'มีใบอนุญาต').length,
                    'หมดอายุ': mockShops.filter(shop => shop.type === 'จำหน่าย' && shop.status_permission === 'หมดอายุ').length,
                    'ยกเลิก': mockShops.filter(shop => shop.type === 'จำหน่าย' && shop.status_company === 'ยกเลิก').length
                },
                'วิจัย': {
                    'มีใบอนุญาต': mockShops.filter(shop => shop.type === 'วิจัย' && shop.status_permission === 'มีใบอนุญาต').length,
                    'หมดอายุ': mockShops.filter(shop => shop.type === 'วิจัย' && shop.status_permission === 'หมดอายุ').length,
                    'ยกเลิก': mockShops.filter(shop => shop.type === 'วิจัย' && shop.status_company === 'ยกเลิก').length
                },
                'ส่งออก': {
                    'มีใบอนุญาต': mockShops.filter(shop => shop.type === 'ส่งออก' && shop.status_permission === 'มีใบอนุญาต').length,
                    'หมดอายุ': mockShops.filter(shop => shop.type === 'ส่งออก' && shop.status_permission === 'หมดอายุ').length,
                    'ยกเลิก': mockShops.filter(shop => shop.type === 'ส่งออก' && shop.status_company === 'ยกเลิก').length
                }
            };
            
            // นับสถานะร้านตามอำเภอ
            const districts = [...new Set(mockShops.map(shop => shop.district))];
            const districtStatusData = districts.map(district => {
                const shopsInDistrict = mockShops.filter(shop => shop.district === district);
                return {
                    district,
                    active: shopsInDistrict.filter(shop => shop.status_company === 'คงอยู่').length,
                    inactive: shopsInDistrict.filter(shop => shop.status_company === 'ยกเลิก').length
                };
            });
            
            // นับสถานะใบอนุญาตทั้งหมด
            const licenseStatusSummary = {
                'มีใบอนุญาต': mockShops.filter(shop => shop.status_permission === 'มีใบอนุญาต').length,
                'หมดอายุ': mockShops.filter(shop => shop.status_permission === 'หมดอายุ').length,
                'ยกเลิก': mockShops.filter(shop => shop.status_company === 'ยกเลิก').length
            };
            
            return {
                licenseTypes,
                typeCounts,
                statusByType,
                districts,
                districtStatusData,
                licenseStatusSummary
            };
        }
        
        // สร้างกราฟแท่ง: สถานะใบอนุญาตแยกตามประเภท
        function createLicenseStatusChart() {
            const { licenseTypes, statusByType } = prepareChartData();
            const ctx = document.getElementById('licenseStatusChart').getContext('2d');
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: licenseTypes,
                    datasets: [
                        {
                            label: 'มีใบอนุญาต',
                            data: licenseTypes.map(type => statusByType[type]['มีใบอนุญาต']),
                            backgroundColor: '#28a745',
                            borderColor: '#28a745',
                            borderWidth: 1
                        },
                        {
                            label: 'หมดอายุ',
                            data: licenseTypes.map(type => statusByType[type]['หมดอายุ']),
                            backgroundColor: '#dc3545',
                            borderColor: '#dc3545',
                            borderWidth: 1
                        },
                        {
                            label: 'ยกเลิก',
                            data: licenseTypes.map(type => statusByType[type]['ยกเลิก']),
                            backgroundColor: '#ffc107',
                            borderColor: '#ffc107',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.dataset.label}: ${context.raw} ร้าน`;
                                }
                            }
                        }
                    }
                }
            });
        }
        
        // สร้างกราฟวงกลม: การกระจายตัวของประเภทใบอนุญาต
        function createLicenseTypeChart() {
            const { licenseTypes, typeCounts } = prepareChartData();
            const ctx = document.getElementById('licenseTypeChart').getContext('2d');
            
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: licenseTypes,
                    datasets: [{
                        data: typeCounts,
                        backgroundColor: [
                            '#17a2b8',
                            '#ffc107',
                            '#6f42c1'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const value = context.raw;
                                    const percentage = Math.round((value / total) * 100);
                                    return `${context.label}: ${value} ร้าน (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        }
        
        // สร้างกราฟแท่ง: สถานะร้านแยกตามอำเภอ
        function createDistrictStatusChart() {
            const { districts, districtStatusData } = prepareChartData();
            const ctx = document.getElementById('districtStatusChart').getContext('2d');
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: districts,
                    datasets: [
                        {
                            label: 'คงอยู่',
                            data: districtStatusData.map(data => data.active),
                            backgroundColor: '#28a745',
                            borderColor: '#28a745',
                            borderWidth: 1
                        },
                        {
                            label: 'ยกเลิก',
                            data: districtStatusData.map(data => data.inactive),
                            backgroundColor: '#dc3545',
                            borderColor: '#dc3545',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.dataset.label}: ${context.raw} ร้าน`;
                                }
                            }
                        }
                    }
                }
            });
        }
        
        // การ์ดสรุปประเภทใบอนุญาต
        function createLicenseTypeSummary() {
            const { licenseTypes, typeCounts } = prepareChartData();
            const total = typeCounts.reduce((a, b) => a + b, 0);
            const container = document.getElementById('licenseTypeSummary');
            
            licenseTypes.forEach((type, index) => {
                const count = typeCounts[index];
                const percentage = Math.round((count / total) * 100);
                
                const colors = ['#17a2b8', '#ffc107', '#6f42c1'];
                const icons = ['fa-store', 'fa-flask', 'fa-globe'];
                
                const item = document.createElement('div');
                item.className = 'mb-3';
                item.innerHTML = `
                    <div class="d-flex justify-content-between mb-1">
                        <div>
                            <i class="fas ${icons[index]} mr-2" style="color: ${colors[index]}"></i>
                            <strong>${type}</strong>
                        </div>
                        <div>
                            <span class="badge badge-light">${count} ร้าน (${percentage}%)</span>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: ${percentage}%; background-color: ${colors[index]}"></div>
                    </div>
                `;
                container.appendChild(item);
            });
        }
        
        // การ์ดสรุปสถานะใบอนุญาต
        function createLicenseStatusSummary() {
            const { licenseStatusSummary } = prepareChartData();
            const total = Object.values(licenseStatusSummary).reduce((a, b) => a + b, 0);
            const container = document.getElementById('licenseStatusSummary');
            
            const items = [
                { 
                    label: 'มีใบอนุญาต', 
                    key: 'มีใบอนุญาต', 
                    color: '#28a745', 
                    icon: 'fa-check-circle' 
                },
                { 
                    label: 'หมดอายุ', 
                    key: 'หมดอายุ', 
                    color: '#dc3545', 
                    icon: 'fa-calendar-times' 
                },
                { 
                    label: 'ยกเลิก', 
                    key: 'ยกเลิก', 
                    color: '#ffc107', 
                    icon: 'fa-ban' 
                }
            ];
            
            items.forEach(item => {
                const count = licenseStatusSummary[item.key];
                const percentage = Math.round((count / total) * 100);
                
                const element = document.createElement('div');
                element.className = 'mb-3';
                element.innerHTML = `
                    <div class="d-flex justify-content-between mb-1">
                        <div>
                            <i class="fas ${item.icon} mr-2" style="color: ${item.color}"></i>
                            <strong>${item.label}</strong>
                        </div>
                        <div>
                            <span class="badge badge-light">${count} ร้าน (${percentage}%)</span>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: ${percentage}%; background-color: ${item.color}"></div>
                    </div>
                `;
                container.appendChild(element);
            });
        }
        
        // เริ่มต้นเมื่อโหลดหน้าเว็บ
        $(document).ready(function() {
            createLicenseStatusChart();
            createLicenseTypeChart();
            createDistrictStatusChart();
            createLicenseTypeSummary();
            createLicenseStatusSummary();
        });
    </script>
</body>

</html>

<?php 
include('./includes/footer.php');
?>