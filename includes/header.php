<?php include('head.php'); ?>
<link rel="stylesheet" href="assets/css/style.css">



<!-- ส่วนหัวเว็บ -->
<header class="header py-3" style="background: linear-gradient(to right, #2b4b7e, #446cd2); color: white;">
  <div class="container-fluid px-3">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <!-- โลโก้และชื่อ -->
      <a class="navbar-brand d-flex align-items-center" href="index.php#">
        <img width="50" src="./assets/img/Private Learning Logo.png" alt="โลโก้" class="me-2">
        <span class="fw-bold">Saraburi TAM</span>
      </a>

      <!-- ปุ่ม hamburger -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- เมนูหลัก -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav gap-2">
          <li class="nav-item">
            <a class="nav-link text-white" href="index#"><i class="fas fa-home me-2"></i>หน้าหลัก</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white px-2" href="cannabis" id="cannabisDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-clipboard-list me-3"></i> กัญชาทางการแพทย์

            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="cannabisDropdown" style="background: linear-gradient(to right, #2b4b7e, #446cd2); border:none;">
              <a class="dropdown-item text-white" href="cannabis">
                <i class="fas fa-home me-3 text-primary "></i> กัญชาทางการแพทย์
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item text-white" href="map">
                <i class="fas fa-map-location-dot me-3 text-primary"></i> แผนที่
              </a>

              <a class="dropdown-item text-white" href="report">
                <i class="fas fa-chart-pie me-3 text-primary"></i> รายงานสรุป
              </a>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white" href="herbal"><i class="fas fa-seedling me-3"></i> เมืองสมุนไพร</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white" href="food"><i class="fas fa-utensils me-3"></i> อาหารเป็นยา</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white px-2" href="service" id="serviceDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-clipboard-list me-3"></i> หน่วยบริการ
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="serviceDropdown" style="background: linear-gradient(to right, #2b4b7e, #446cd2); border:none;">
              <a class="dropdown-item text-white" href="service"><i class="fas fa-home me-3 text-primary"></i> หน้าหลักหน่วยบริการ</a>
              <div>
                <hr class="dropdown-divider">
              </div>
              <h6 class="dropdown-header text-light">โรงพยาบาลในเครือข่าย</h6>
              <a class="dropdown-item text-white" href="service1"><i class="fas fa-hospital me-3 text-primary"></i> โรงพยาบาลสระบุรี</a>
              <a class="dropdown-item text-white" href="service2"><i class="fas fa-hospital me-3 text-primary"></i> โรงพยาบาลแก่งคอย</a>
              <a class="dropdown-item text-white" href="service3"><i class="fas fa-hospital me-3 text-primary"></i> โรงพยาบาลพระพุทธบาท</a>
              <a class="dropdown-item text-white" href="service4"><i class="fas fa-hospital me-3 text-primary"></i> โรงพยาบาลเสาไห้ฯ</a>
              <a class="dropdown-item text-white" href="service5"><i class="fas fa-hospital me-3 text-primary"></i> โรงพยาบาลมวกเหล็ก</a>
              <a class="dropdown-item text-white" href="service6"><i class="fas fa-hospital me-3 text-primary"></i> โรงพยาบาลวิหารแดง</a>
              <a class="dropdown-item text-white" href="service7"><i class="fas fa-hospital me-3 text-primary"></i> โรงพยาบาลดอนพุด</a>
              <a class="dropdown-item text-white" href="service8"><i class="fas fa-hospital me-3 text-primary"></i> โรงพยาบาลวังม่วงสัทธรรม</a>
              <a class="dropdown-item text-white" href="service9"><i class="fas fa-hospital me-3 text-primary"></i> โรงพยาบาลหนองโดน</a>
              <a class="dropdown-item text-white" href="service10"><i class="fas fa-hospital me-3 text-primary"></i> โรงพยาบาลบ้านหมอ</a>
              <a class="dropdown-item text-white" href="service11"><i class="fas fa-hospital me-3 text-primary"></i> โรงพยาบาลหนองแค</a>
              <a class="dropdown-item text-white" href="service12"><i class="fas fa-hospital me-3 text-primary"></i> โรงพยาบาลหนองแซง</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>