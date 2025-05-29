<?php

include('./includes/header.php');

?>

<!-- Hero Section -->
<section class="hero-section" style="padding: 60px 0;">
  <div class="container">
    <div class="hero-content text-center">
      <h1 class="hero-title animate__animated animate__fadeInDown">การแพทย์แผนไทยและการแพทย์ทางเลือก</h1>
      <p class="hero-subtitle animate__animated animate__fadeInUp">สำนักงานสาธารณสุขจังหวัดสระบุรี</p>
    </div>
  </div>
</section>

<!-- Report Section -->
<section id="report" class="py-5 bg-white">
  <div class="container">
    <h2 class="text-center section-title">ผลการดำเนินงาน</h2>
    <div class="row justify-content-center">
      <!-- Report 1 -->
      <div class="col-md-6 col-lg-5 mb-4">
        <div class="card shadow h-100">
          <img src="assets/img/สำนักงานสาธารณสุขจังหวัดสระบุรี 2566.png" class="card-img-top" alt="รายงานปี 2566">
          <div class="card-body text-center">
            <h5 class="card-title">ผลการดำเนินงาน ประจำปีงบประมาณ 2566 </h5>
            <a href="https://anyflip.com/jdnaj/ausa/" target="_blank" class="btn btn-primary mt-3 px-4 py-2">ดาวน์โหลด</a>
          </div>
        </div>
      </div>
      <!-- Report 2 -->
      <div class="col-md-6 col-lg-5 mb-4">
        <div class="card shadow h-100">
          <img src="assets/img/หน้าปกสรุปผลการดำเนินงานปีงบ 2567.png" class="card-img-top" alt="รายงานปี 2567">
          <div class="card-body text-center">
            <h5 class="card-title">ผลการดำเนินงาน ประจำปีงบประมาณ 2567</h5>
            <a href="https://anyflip.com/jdnaj/somp/" target="_blank" class="btn btn-primary mt-3 px-4 py-2">ดาวน์โหลด</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Knowledge Media Section -->
<section id="knowledge" class="section bg-light" style="padding: 40px 0;">
  <div class="container">
    <h2 class="text-center section-title">สื่อความรู้</h2>

    <div class="d-flex justify-content-center flex-wrap"> <!-- ใช้ flexbox -->
      <!-- Card 1 -->
      <div class="m-3" style="width: 320px;">
        <div class="card h-100 border-0 shadow-sm hover-scale">
          <div class="card-body text-center">
            <div class="text-center mb-3">
              <i class="fas fa-video fa-3x text-primary mb-3"></i>
            </div>
            <h4 class="card-title">วิดีโอความรู้</h4>
            <p class="card-text">คลิปวิดีโอแนะนำวิธีการใช้สมุนไพรและการบำบัดด้วยการแพทย์แผนไทย</p>
          </div>
          <div class="card-footer bg-white border-0 text-center">
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#videoModal">
              <i class="fas fa-play mr-2"></i>ชมวิดีโอ
            </button>
          </div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="m-3" style="width: 320px;">
        <div class="card h-100 border-0 shadow-sm hover-scale">
          <div class="card-body text-center">
            <div class="text-center mb-3">
              <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
            </div>
            <h4 class="card-title">อินโฟกราฟิก</h4>
            <p class="card-text">ข้อมูลสรุปเกี่ยวกับประโยชน์ของสมุนไพรและการแพทย์ทางเลือกในรูปแบบกราฟิก</p>
          </div>
          <div class="card-footer bg-white border-0 text-center">
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#infographicModal">
              <i class="fas fa-eye mr-2"></i>ดูทั้งหมด
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Infographic Modal -->
<div class="modal fade" id="infographicModal" tabindex="-1" role="dialog" aria-labelledby="infographicModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content border-0">
      <div class="modal-header bg-gradient-primary text-white">
        <h4 class="modal-title font-weight-bold" id="infographicModalLabel">
          <i class="fas fa-chart-pie mr-2"></i>สื่อความรู้สุขภาพแบบอินโฟกราฟิก
        </h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body p-4">
        <div class="row mb-4">
          <div class="col-md-8">
            <div class="input-group">
            </div>
          </div>
        </div>

        <div class="row" id="infographicContainer">
        </div>
      </div>

      <div class="modal-footer bg-light">
        <nav aria-label="Page navigation">
          <ul class="pagination pagination-sm mb-0" id="pagination">
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

<!-- Full Image Modal -->
<div class="modal fade" id="imageViewerModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-max">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-header border-0">
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img id="fullSizeImage" src="" class="img-fluid shadow-lg" alt="อินโฟกราฟิกเต็มขนาด" style="max-height: 80vh;">
      </div>
      <div class="modal-footer justify-content-center border-0">
        <a id="downloadLink" href="#" class="btn btn-primary" download>
          <i class="fas fa-download mr-2"></i>ดาวน์โหลด
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Video Clip Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content border-0">
      <div class="modal-header bg-gradient-primary text-white">
        <h4 class="modal-title font-weight-bold" id="videoModalLabel">
          <i class="fas fa-video mr-2"></i>วิดีโอคลิปความรู้
        </h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body p-4">
        <div class="row mb-4">
          <div class="col-md-8">
            <div class="input-group">
              <div>
              </div>
            </div>
          </div>
        </div>

        <div class="row" id="videoContainer">
        </div>
      </div>

      <div class="modal-footer bg-light">
        <nav aria-label="Page navigation">
          <ul class="pagination pagination-sm mb-0" id="videoPagination">
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./assets/js/info.js"></script>
<script src="./assets/js/video.js"></script>

<?php include('./includes/footer.php');
?>