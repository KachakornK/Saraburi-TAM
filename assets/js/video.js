$(document).ready(function() {
    // ข้อมูลวิดีโอทั้งหมด
    const videos = [{
        title: "ตะลุยโรงผลิตยาสมุนไพรภาครัฐ มาตรฐาน GMP จังหวัดสระบุรี",
        embedCode: '<iframe width="100%" height="315" src="https://www.youtube.com/embed/iMWFU3x_DZo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        description: "เราจะพาไปพบกับ พญ.คณางค์ ถูกฤทัย ผู้อำนวยการโรงพยาบาลหนองโดน เพื่อทำความรู้จักการผลิตยาสมุนไพรที่ได้มาตรฐาน GMP WHO ของจังหวัดสระบุรี ซึ่งเป็นฐานการผลิตยาสมุนไพรภาครัฐ ของจังหวัดสระบุรีและเขตสุขภาพที่ 4"
      },
      {
        title: "ฟ้าทะลายโจร เมืองสมุนไพรสระบุรี",
        embedCode: '<iframe width="100%" height="315" src="https://www.youtube.com/embed/q2tidwyzDn0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        description: "จังหวัดสระบุรี 1 ใน 15 เมืองสมุนไพร ฐานการผลิตยาสมุนไพรในเขตสุขภาพที่ 4"
      },
      {
        title: "3 เส้นทางท่องเที่ยวสระบุรี",
        embedCode: '<iframe width="100%" height="315" src="https://www.youtube.com/embed/I4nAChkug7g" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        description: "3 สถานที่ท่องเที่ยวในจังหวัดสระบุรี"
      },
      {
        title: "'สระบุรี' ท่องเที่ยวเชิงสุขภาพ เดินทางง่าย ใกล้กรุงฯ",
        embedCode: '<iframe width="100%" height="315" src="https://www.youtube.com/embed/35D3iTcs1ks" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        description: "จังหวัดสระบุรี เมืองแห่งการท่องเที่ยวเชิงสุขภาพ"
      },
    ];
  
    // จำนวนรายการต่อหน้า
    const videosPerPage = 3;
    let currentVideoPage = 1;
  
    // แสดงวิดีโอตามหน้า
    function showVideos(page) {
      const container = $('#videoContainer');
      container.empty();
  
      const startIndex = (page - 1) * videosPerPage;
      const endIndex = startIndex + videosPerPage;
      const paginatedVideos = videos.slice(startIndex, endIndex);
  
      paginatedVideos.forEach(video => {
        const videoHtml = `
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-img-top embed-responsive embed-responsive-16by9">
            ${video.embedCode}
          </div>
          <div class="card-body">
            <h5 class="card-title text-primary">${video.title}</h5>
            <p class="card-text">${video.description}</p>
          </div>
        </div>
      </div>
    `;
        container.append(videoHtml);
      });
  
      // อัปเดต Pagination
      updateVideoPagination();
    }
  
    // สร้าง Pagination สำหรับวิดีโอ
    function updateVideoPagination() {
      const totalPages = Math.ceil(videos.length / videosPerPage);
      const pagination = $('#videoPagination');
      pagination.empty();
  
      // ปุ่มก่อนหน้า
      const prevDisabled = currentVideoPage === 1 ? 'disabled' : '';
      pagination.append(`
    <li class="page-item ${prevDisabled}">
      <a class="page-link" href="#" data-page="${currentVideoPage - 1}">ก่อนหน้า</a>
    </li>
  `);
  
      // หมายเลขหน้า
      for (let i = 1; i <= totalPages; i++) {
        const active = i === currentVideoPage ? 'active' : '';
        pagination.append(`
      <li class="page-item ${active}">
        <a class="page-link" href="#" data-page="${i}">${i}</a>
      </li>
    `);
      }
  
      // ปุ่มถัดไป
      const nextDisabled = currentVideoPage === totalPages ? 'disabled' : '';
      pagination.append(`
    <li class="page-item ${nextDisabled}">
      <a class="page-link" href="#" data-page="${currentVideoPage + 1}">ถัดไป</a>
    </li>
  `);
    }
  
    // เปิด Modal แล้วแสดงวิดีโอหน้าแรก
    $('#videoModal').on('show.bs.modal', function() {
      currentVideoPage = 1;
      showVideos(currentVideoPage);
    });
  
    // เปลี่ยนหน้าเมื่อคลิก Pagination วิดีโอ
    $(document).on('click', '#videoPagination .page-link', function(e) {
      e.preventDefault();
      const page = $(this).data('page');
      if (page && page !== currentVideoPage) {
        currentVideoPage = page;
        showVideos(currentVideoPage);
      }
    });
  

  
    // แสดงผลการค้นหา
    function showFilteredVideos(filteredVideos) {
      const container = $('#videoContainer');
      container.empty();
  
      if (filteredVideos.length === 0) {
        container.html(`
      <div class="col-12 text-center py-5">
        <i class="fas fa-video-slash fa-3x text-muted mb-3"></i>
        <h5 class="text-muted">ไม่พบวิดีโอที่ค้นหา</h5>
      </div>
    `);
        $('#videoPagination').empty();
        return;
      }
  
      filteredVideos.forEach(video => {
        const videoHtml = `
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-img-top embed-responsive embed-responsive-16by9">
            ${video.embedCode}
          </div>
          <div class="card-body">
            <h5 class="card-title text-primary">${video.title}</h5>
            <p class="card-text">${video.description}</p>
          </div>
          <div class="card-footer bg-white border-0 pt-0">
            <a href="#" class="btn btn-sm btn-outline-primary">
              <i class="fas fa-share-alt mr-1"></i>แชร์
            </a>
          </div>
        </div>
      </div>
    `;
        container.append(videoHtml);
      });
    }
  });



