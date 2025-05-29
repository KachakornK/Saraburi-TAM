<?php
    include('./config/config.php');
    include('./includes/header.php');
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านกัญชาสระบุรี</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

    <!-- Google Fonts - Mitr -->
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/map.css">
    
</head>

<body>
    <!-- ส่วนหัวเว็บ
    <header class="header py-3" style="background: linear-gradient(to right, #2b4b7e, #446cd2); color: white;">
        <div class="container">
            <div class="d-flex align-items-center">
                <img width="45" src="./img/Private Learning Logo.png" alt="โลโก้" class="me-3">
                <div>
                    <h5 class="mb-0 fw-bold">กลุ่มงานการแพทย์แผนไทยและแพทย์ทางเลือก</h5>
                    <small class="d-block">สำนักงานสาธารณสุขจังหวัดสระบุรี</small>
                </div>
            </div>
        </div>
    </header> -->



    <!-- ส่วนเนื้อหา -->
    <div class="container my-4">
        <!-- หัวข้อหลัก -->
        <div class="text-center mb-4">
            <h3 class="page-title"><i class="fas fa-cannabis mr-2"></i>รายการร้านขายกัญชา จังหวัดสระบุรี</h3>
            <p class="text-muted">ข้อมูลตำแหน่งร้านขายกัญชาที่ได้รับอนุญาตในจังหวัดสระบุรี</p>
        </div>

        <!-- การ์ดสถิติ -->
        <div class="row">
            <!-- การ์ด: จำนวนร้านทั้งหมด -->
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card border-left-primary shadow h-90 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                                    จำนวนร้านทั้งหมด
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalShops">
                                    <?php echo $STORE_ALL ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-store fa-3x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- การ์ด: ร้านที่เปิดดำเนินการ -->
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card border-left-success shadow h-90 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-2">
                                    ร้านที่เปิดดำเนินการ
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="activeShops">
                                    <?php echo $STORE_OPEN ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle fa-3x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- การ์ด: ร้านที่ปิดดำเนินการ -->
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card border-left-danger shadow h-90 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-2">
                                    ร้านที่ปิดดำเนินการ
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="closedShops">
                                    <?php echo $STORE_CLOSE ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-times-circle fa-3x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- การ์ด: อัพเดตล่าสุด -->
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card border-left-info shadow h-90 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h7 class="text-muted mb-2">อัพเดตล่าสุด</h7>
                                <div class="h6 mb-0 font-weight-bold text-gray-800" id="lastUpdate">
                                    <h6 class="mb-1"><?php echo "$day $month $year"; ?></h6>
                                    <small class="text-muted"><?php echo $dayOfWeek ?></small>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar-alt fa-3x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- แผนที่ -->
        <div id="map" class="mb-4"></div>

        <!-- ตารางข้อมูล -->
        <div class="card">
            <div class="card-body">
                <!-- แถวค้นหาใหม่ที่ปรับปรุงแล้ว -->
                <div class="row mb-3 align-items-end">
                    <div class="col-md-3 col-sm-6 mb-2 mb-md-0">
                        <label for="district" class="small text-muted mb-1">อำเภอ</label>
                        <select id="district" class="form-control select2">
                            <option value="">ทั้งหมด</option>
                            <option value="เมือง">เมือง</option>
                            <option value="แก่งคอย">แก่งคอย</option>
                            <option value="1903">หนองแค</option>
                            <option value="1904">วิหารแดง</option>
                            <option value="1905">หนองแซง</option>
                            <option value="1906">บ้านหมอ</option>
                            <option value="1907">ดอนพุด</option>
                            <option value="1908">หนองโดน</option>
                            <option value="1909">พระพุทธบาท</option>
                            <option value="1910">เสาไห้</option>
                            <option value="1911">มวกเหล็ก</option>
                            <option value="1912">วังม่วง</option>
                            <option value="1913">เฉลิมพระเกียรติ</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6 mb-2 mb-md-0">
                        <label for="statusFilter" class="small text-muted mb-1">สถานะร้าน</label>
                        <select id="statusFilter" class="form-control select2">
                            <option value="">ทั้งหมด</option>
                            <option value="คงอยู่">คงอยู่</option>
                            <option value="ยกเลิก">ยกเลิกแล้ว</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6 mb-2 mb-md-0">
                        <label for="typeFilter" class="small text-muted mb-1">ประเภทใบอนุญาต</label>
                        <select id="typeFilter" class="form-control select2">
                            <option value="">ทั้งหมด</option>
                            <option value="จำหน่าย">จำหน่าย</option>
                            <option value="วิจัย">วิจัย</option>
                            <option value="ส่งออก">ส่งออก</option>
                        </select>
                    </div>
                    <div class="col-md-5 col-sm-6 mb-2 mb-md-0">
                        <button id="btnSearch" class="btn btn-primary btn-block h-100 d-flex align-items-center justify-content-center" style="padding-top: 28px; padding-bottom: 28px;">
                            <i class="fas fa-search mr-2"></i> ค้นหา
                        </button>
                    </div>
                </div>


                <div class="table-responsive">
                    <table id="shopTable" class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th width="50">ลำดับ</th>
                                <th>ชื่อผู้ขออนุญาต</th>
                                <th>ชื่อร้าน</th>
                                <th>ยื่นแบบ</th>
                                <th>ประเภทใบอนุญาต</th>
                                <th>เลขที่ใบอนุญาต</th>
                                <th>สถานะใบอนุญาต</th>
                                <th>สถานะร้าน</th>
                                <!-- <th>ที่อยู่</th> -->
                                <th>อำเภอ</th>
                                <th>ข้อมูลทั้งหมด</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

 

    <!-- JavaScript Libraries -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Leaflet JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <!-- ส่วน JavaScript ที่ปรับปรุงแล้ว -->

    <script>
        const mockShops = <?php echo $jsonShops; ?>;
        let map;
        let markers = []; // เก็บ marker ทั้งหมด
        let dataTable; // เก็บ reference ของ DataTable

        function initMap() {
            map = L.map('map').setView([14.5288, 100.9112], 11);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            addMarkers(mockShops); // แสดงหมุดเริ่มต้นทั้งหมด
        }

        // ฟังก์ชันสร้าง marker ทั้งหมด
        function addMarkers(shops) {
            clearMarkers(); // ลบหมุดเดิมก่อน

            const greenIcon = L.icon({
                iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            const redIcon = L.icon({
                iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            shops.forEach(shop => {
                const icon = shop.status_company === "คงอยู่" ? greenIcon : redIcon;
                const marker = L.marker([shop.lat, shop.lng], {
                        icon
                    }).addTo(map)
                    .bindPopup(`
                <b>${shop.company}</b><br>
                <small>${shop.name}</small><br>
                <small>ประเภทใบอนุญาต: ${shop.type}</small><br>
                <small>ยื่นแบบ: ${shop.type_license}</small><br>
                <small>เลขที่ใบอนุญาต: ${shop.number_license}</small><br>
                <small>อำเภอ: ${shop.district}</small><br>
                <small>สถานะใบอนุญาต: ${shop.status_permission}</small><br>
                <small>สถานะร้าน: ${shop.status_company}</small><br>
            `);
                markers.push(marker);
            });
        }

        // ฟังก์ชันลบหมุดทั้งหมด
        function clearMarkers() {
            markers.forEach(marker => map.removeLayer(marker));
            markers = [];
        }

        // ฟังก์ชันกรองอำเภอ
        function filterShops() {
            const selectedDistrict = document.getElementById('district').value;
            const districtText = $('#district option:selected').text();
            const selectedStatus = document.getElementById('statusFilter').value;
            const selectedType = document.getElementById('typeFilter').value;

            // กรองข้อมูลตามอำเภอและสถานะร้าน
            let filtered = mockShops;

            if (selectedDistrict) {
                filtered = filtered.filter(s => s.district === districtText);
            }

            if (selectedStatus) {
                filtered = filtered.filter(s => s.status_company === selectedStatus);
            }

            if (selectedType) {
                filtered = filtered.filter(s => s.type === selectedType);
            }


            // อัพเดท DataTable ด้วยข้อมูลที่กรองแล้ว
            dataTable.clear().rows.add(filtered).draw();

            // อัพเดทแผนที่
            addMarkers(filtered);

            // อัพเดทสถิติ
            updateStats(filtered);
        }

        // ฟังก์ชันแสดง Modal ด้วยข้อมูลทั้งหมด
        function showFullInfo(shop) {
            // สร้าง HTML สำหรับ Modal
            const modalContent = `
                <div class="modal fade" id="shopDetailModal" tabindex="-1" role="dialog" aria-labelledby="shopDetailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="shopDetailModalLabel">รายละเอียดร้าน</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6><i class="fas fa-user mr-2"></i>ชื่อผู้ขออนุญาต</h6>
                                        <p>${shop.name}</p>
                                        
                                        <h6><i class="fas fa-store mr-2"></i>ชื่อร้าน</h6>
                                        <p>${shop.company}</p>

                                        <h6><i class="fas fa-tags"></i> ยื่นแบบ</h6>
                                        <p>${shop.type}</p>
                                        
                                        <h6><i class="fas fa-file-signature mr-2"></i>ประเภทใบอนุญาต</h6>
                                        <p>${shop.type_license}</p>

                                        <h6><i class="fas fa-id-card mr-2"></i>เลขที่ใบอนุญาต</h6>
                                        <p>${shop.number_license}</p>
                                        
                                        <h6><i class="fas fa-calendar-check mr-2"></i>วันอนุญาต</h6>
                                        <p>${shop.permit_date}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><i class="fas fa-calendar-times mr-2"></i>วันหมดอายุ</h6>
                                        <p>${shop.expire_date}</p>
                                        
                                        <h6><i class="fas fa-info-circle mr-2"></i>สถานะใบอนุญาต</h6>
                                        <p>${shop.status_permission}</p>

                                        <h6><i class="fas fa-server"></i> เลขระบบ</h6>
                                        <p>${shop.status}</p>
                                        
                                        <h6><i class="fas fa-store-alt mr-2"></i>สถานะร้าน</h6>
                                        <p>${shop.status_company}</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <h6><i class="fas fa-map-marker-alt mr-2"></i>ที่อยู่</h6>
                                        <p>${shop.address}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // เพิ่ม Modal ลงใน DOM
            $('body').append(modalContent);

            // แสดง Modal
            $('#shopDetailModal').modal('show');

            // ลบ Modal ออกจาก DOM เมื่อปิด
            $('#shopDetailModal').on('hidden.bs.modal', function() {
                $(this).remove();
            });
        }


        document.addEventListener('DOMContentLoaded', function() {
            $('.select2').select2({
                placeholder: function() {
                    return $(this).attr('id') === 'statusFilter' ? "เลือกสถานะร้าน" : "เลือกอำเภอ";
                },
                allowClear: true
            });

            initMap();

            // กำหนดค่า DataTables
            dataTable = $('#shopTable').DataTable({
                data: mockShops,
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        className: "text-center"
                    },
                    {
                        data: 'name',
                        render: function(data, type, row) {
                            return `<div class="truncate-text">${data}</div>
                                    <a class="view-more" onclick="showFullInfo(${JSON.stringify(row).replace(/"/g, '&quot;')})">
                                        
                                    </a>`;
                        }
                    },
                    {
                        data: 'company',
                        render: function(data, type, row) {
                            return `<div class="truncate-text">${data}</div>
                                    <a class="view-more" onclick="showFullInfo(${JSON.stringify(row).replace(/"/g, '&quot;')})">
                                       
                                    </a>`;
                        }
                    },
                    {
                        data: 'type',
                        render: function(data, type, row) {
                            const typemis =
                                data === 'จำหน่าย' ? "badge-info" :
                                data === 'วิจัย' ? "badge-warning" :
                                "badge-danger";

                            return `<span class="badge ${typemis}">${data}</span>`;
                        }
                    },
                    {
                        data: 'type_license'
                    },
                    {
                        data: 'number_license'
                    },
                    {
                        data: 'status_permission',
                        render:function(data, type, row){
                            const statusClass =
                                data === 'มีใบอนุญาต' ? "badge-success" :
                                data === 'หมดอายุ' ? "badge-danger" :
                                "badge-warning";

                            return `<span class="badge ${statusClass}">${data}</span>`;
                        }
                    },
                    {
                        data: 'status_company',
                        render: function(data) {
                            const badgeClass = data === "คงอยู่" ? "badge-success" : "badge-danger";
                            return `<span class="badge ${badgeClass}">${data}</span>`;
                        }
                    },
                    // {
                    //     data: 'address',
                    //     render: function(data, type, row) {
                    //         return `<div class="truncate-text">${data}</div>
                    //                 <a class="view-more" onclick="showFullInfo(${JSON.stringify(row).replace(/"/g, '&quot;')})">

                    //                 </a>`;
                    //     }
                    // },
                    {
                        data: 'district'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<button class="btn btn-sm btn-outline-primary" onclick="showFullInfo(${JSON.stringify(row).replace(/"/g, '&quot;')})">
                                        <i class="fas fa-info-circle"></i> รายละเอียด
                                    </button>`;
                        },
                        className: "text-center"
                    }
                ],
                pageLength: 10,
                lengthChange: false,
                language: {
                    search: "ค้นหา:",
                    paginate: {
                        previous: "<i class='fas fa-chevron-left'></i> ก่อนหน้า",
                        next: "ถัดไป <i class='fas fa-chevron-right'></i>"
                    },
                    info: "Show _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "No entries available",
                    emptyTable: "No data available in table",
                    infoFiltered: "(of _MAX_ entries)",
                    zeroRecords: "Cannot find any matching records",
                },
                dom: '<"top"<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>>rt<"bottom"<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>>',
                initComplete: function() {
                    // $('.dataTables_filter input').addClass('form-control form-control-sm');
                    // $('.dataTables_filter label').contents().filter(function() {
                    //     return this.nodeType === 3;
                    // }).remove();

                    // อัพเดทสถิติเริ่มต้น
                    updateStats(mockShops);
                },
                drawCallback: function() {
                    // ปรับแต่ง pagination buttons
                    $('.paginate_button.previous').html('<i class="fas fa-chevron-left"></i> ก่อนหน้า');
                    $('.paginate_button.next').html('ถัดไป <i class="fas fa-chevron-right"></i>');
                }
            });

            document.getElementById('btnSearch').addEventListener('click', filterShops);
        });

        function updateStats(shops) {
            const total = shops.length;
            const active = shops.filter(s => s.status_company === "คงอยู่").length;
            const closed = shops.filter(s => s.status_company === "ยกเลิก").length;

            document.getElementById('totalShops').textContent = total;
            document.getElementById('activeShops').textContent = active;
            document.getElementById('closedShops').textContent = closed;
        }
    </script>
</body>

</html>

<?php 
include('./includes/footer.php');
?>