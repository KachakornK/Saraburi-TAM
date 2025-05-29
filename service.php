<?php
$pageTitle = "หน่วยบริการ | การแพทย์แผนไทย จ.สระบุรี";
include('./includes/header.php');
?>

<!-- Hero Section -->
<header class="herbal-hero-section py-5 text-black">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="hero-content text-center">
                <h1 class="hero-title display-4 fw-bold mb-3">หน่วยบริการ</h1>
                <p class="hero-subtitle lead mb-4">การให้บริการด้านการแพทย์แผนไทย การแพทย์ทางเลือก<br>
                    และกัญชาทางการแพทย์ในจังหวัดสระบุรี</p>
                <div class="d-flex justify-content-center gap-5">
                    <a href="#services-units" class="btn btn-primary px-4 py-2">ดูหน่วยบริการ</a>
                    <a href="#map-section" class="btn btn-primary px-4 py-2">ดูแผนที่</a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Service Units Section -->
<section id="services-units" class="py-5 bg-white">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="h3 text-primary mb-3">หน่วยบริการในจังหวัดสระบุรี</h2>
                <p class="text-muted mb-4">ค้นหาหน่วยบริการใกล้คุณ</p>
                <div class="d-flex justify-content-center">
                    <div class="w-75">
                        <input type="text" class="form-control" placeholder="ค้นหาหน่วยบริการ..." id="service-search">
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4" id="service-list">
            <?php
            $hospitals = [
                ['name' => 'โรงพยาบาลสระบุรี', 'location' => 'อำเภอเมืองสระบุรี', 'link' => 'service1'],
                ['name' => 'โรงพยาบาลแก่งคอย', 'location' => 'อำเภอแก่งคอย', 'link' => 'service2'],
                ['name' => 'โรงพยาบาลพระพุทธบาท', 'location' => 'อำเภอพระพุทธบาท', 'link' => 'service3'],
                ['name' => 'โรงพยาบาลเสาไห้ฯ', 'location' => 'อำเภอเสาไห้', 'link' => 'service4'],
                ['name' => 'โรงพยาบาลมวกเหล็ก', 'location' => 'อำเภอมวกเหล็ก', 'link' => 'service5'],
                ['name' => 'โรงพยาบาลวิหารแดง', 'location' => 'อำเภอวิหารแดง', 'link' => 'service6'],
                ['name' => 'โรงพยาบาลดอนพุด', 'location' => 'อำเภอดอนพุด', 'link' => 'service7'],
                ['name' => 'โรงพยาบาลวังม่วงสัทธรรม', 'location' => 'อำเภอวังม่วง', 'link' => 'service8'],
                ['name' => 'โรงพยาบาลหนองโดน', 'location' => 'อำเภอหนองโดน', 'link' => 'service9'],
                ['name' => 'โรงพยาบาลบ้านหมอ', 'location' => 'อำเภอบ้านหมอ', 'link' => 'service10'],
                ['name' => 'โรงพยาบาลหนองแค', 'location' => 'อำเภอหนองแค', 'link' => 'service11'],
                ['name' => 'โรงพยาบาลหนองแซง', 'location' => 'อำเภอหนองแซง', 'link' => 'service12']
            ];

            foreach ($hospitals as $hospital) {
                echo '
                <div class="col-md-6 col-lg-4 service-item">
                    <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <i class="fas fa-hospital me-3"></i>
                                </div>
                                <h3 class="h5 mb-0">' . $hospital['name'] . '</h3>
                            </div>
                            <p class="text-muted small mb-3">
                                <i class="fas fa-map-marker-alt text-danger me-3"></i>
                                ' . $hospital['location'] . '
                            </p>
                            <a href="' . $hospital['link'] . '.php" class="btn btn-sm btn-outline-primary stretched-link">
                                ดูรายละเอียด <i class="fas fa-chevron-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Map Section -->
<section id="map-section" class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="h3 text-primary mb-3">แผนที่หน่วยบริการ</h2>
                <p class="text-muted">ตำแหน่งที่ตั้งหน่วยบริการในจังหวัดสระบุรี</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <a href="https://www.google.co.th/maps/@/data=!3m1!4b1!4m3!11m2!2shKKqOcOZROmhOw3PjZP_4Q!3e3?shorturl=1"
                            target="_blank"
                            class="d-block text-center py-3 bg-white">
                            <i class="fas fa-external-link-alt me-2"></i>เปิดใน Google Maps
                        </a>
                        <div class="p-3 p-md-4">
                            <img src="./assets/img/blueprint.png"
                                alt="แผนที่หน่วยบริการในจังหวัดสระบุรี"
                                class="img-fluid rounded shadow-sm w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./assets/js/service.js"></script>


<?php include('./includes/footer.php'); ?>