<?php include('./includes/header.php'); ?>

<!-- Hero Section -->
<header class="herbal-hero-section py-5 text-black text-center bg-light">
  <div class="container">
    <div class="hero-content">
      <h1 class="display-4 font-weight-bold">โรงพยาบาลสระบุรี</h1>
    </div>
  </div>
</header>

<!-- คลินิกแพทย์แผนไทย -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="row align-items-center mb-5">
      <div class="col-md-6">
        <img src="./assets/img/host_sbr.jpg" alt="โรงพยาบาลสระบุรี" class="img-fluid rounded shadow w-100" style="max-height: 400px; object-fit: cover;">
      </div>
      <div class="col-md-6 mt-4 mt-md-0">
        <h2 class="display-5 font-weight-bold text-primary mb-4">คลินิกแพทย์แผนไทย</h2>

        <div class="d-flex align-items-start mb-4">
          <i class="fas fa-clock fa-2x text-secondary mr-3"></i>
          <div>
            <p class="lead mb-0">เปิดบริการ: จันทร์ - ศุกร์ เวลา 08.30 - 16.30 น.</p>
            <small class="text-muted">ยกเว้นวันหยุดราชการและนักขัตฤกษ์</small>
          </div>
        </div>

        <div class="d-flex align-items-start">
          <i class="fas fa-map-marker-alt fa-2x text-danger mr-3"></i>
          <div>
            <h5 class="font-weight-bold mb-2">สถานที่ให้บริการ</h5>
            <ol class="pl-3 mb-0" style="line-height: 1.8;">
              <li>ชั้น 2 อาคารผู้ป่วยนอก</li>
              <li>รพ.เทศบาลเมืองสระบุรี (สุขศาลา)</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- หัตถการ -->
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card shadow border-0">
          <div class="card-header bg-primary text-white">
            <h3 class="mb-0"><i class="fas fa-procedures mr-2"></i> หัตถการให้บริการ</h3>
          </div>
          <div class="card-body p-4">
            <div class="row">
              <div class="col-md-6">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex align-items-center">
                    <i class="fas fa-hand-holding-medical text-success mr-3"></i> นวดเพื่อการรักษา/ฟื้นฟู
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                    <i class="fas fa-leaf text-success mr-3"></i> ประคบสมุนไพรเพื่อการรักษา/ฟื้นฟู
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                    <i class="fas fa-smoking text-success mr-3"></i> อบไอน้ำสมุนไพรเพื่อการรักษา/ฟื้นฟู
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                    <i class="fas fa-fire-alt text-success mr-3"></i> ทับหม้อเกลือ
                  </li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex align-items-center">
                    <i class="fas fa-mortar-pestle text-success mr-3"></i> สุมยาสมุนไพร
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                    <i class="fas fa-fire text-success mr-3"></i> เผายาสมุนไพร
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                    <i class="fas fa-spa text-success mr-3"></i> พอกยาสมุนไพร เฉพาะจุด
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                    <i class="fas fa-hand-holding-heart text-success mr-3"></i> นวดเต้านม
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- แผนที่ & ติดต่อ -->
<section class="container my-5">
  <div class="row">
    <!-- แผนที่ -->
    <div class="col-md-6 mb-4">
      <div class="embed-responsive embed-responsive-4by3 rounded shadow">
        <iframe
          class="embed-responsive-item"
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7724.243351947507!2d100.91599800000002!3d14.535032!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311de8e2ae60de41%3A0x1d3571c532671e56!2z4LmC4Lij4LiH4Lie4Lii4Liy4Lia4Liy4Lil4Liq4Lij4Liw4Lia4Li44Lij4Li1!5e0!3m2!1sth!2sus!4v1747365040364!5m2!1sth!2sus"
          allowfullscreen=""
          loading="lazy"
          frameborder="0"
          style="border:0;">
        </iframe>
      </div>
    </div>

    <!-- ข้อมูลติดต่อ -->
    <div class="col-md-6">
      <div class="bg-light rounded shadow p-4 h-100 d-flex flex-column justify-content-center">
        <h5 class="font-weight-bold mb-3">ติดต่อสอบถาม</h5>
        <p class="mb-2">
          <i class="fas fa-phone-alt text-success mr-2"></i> โทร. 095-8706002
        </p>
        <p class="mb-2">
          <a href="https://linevoom.line.me/user/_dRRwvcPn4dnbhUfI2r8g1efZnmx3cIGKQD_1EIA" target="_blank" class="text-decoration-none">
            <i class="fab fa-line text-success mr-2"></i>แพทย์แผนไทย สระบุรี
          </a>
        </p>
        <p class="mb-0">
          <a href="https://www.facebook.com/tm20210" target="_blank" class="text-decoration-none">
            <i class="fab fa-facebook text-primary mr-2"></i>กลุ่มงานแพทย์แผนไทยและแพทย์ทางเลือก รพ.สระบุรี 
          </a>
        </p>
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
