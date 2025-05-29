$(document).ready(function() {
  // ข้อมูล Infographic ทั้งหมด
  const infographics = [{
      image: "./assets/img/กล้วย.png",
      title: "ประโยชน์ของกล้วย"
    },
    {
      image: "./assets/img/น้ำกัดเท้า.png",
      title: "สมุนไพรรักษาโรคน้ำกัดเท้า"
    },
    {
      image: "./assets/img/โรลผัก4.png",
      title: "โรลผักพื้นบ้าน"
    },
    {
      image: "./assets/img/QRcode ยาไทยช่วยน้ำท่วม.png",
      title: "อุทกภัย ยาสมุนไพรช่วยบรรเทา"
    },
    {
      image: "./assets/img/ต้มยำ.png",
      title: "ตำยำ Sparking"
    },
    {
      image: "./assets/img/สมูทตี้.png",
      title: "สมูทตี้หูเสือ"
    },
    {
      image: "./assets/img/สลัดโรล.png",
      title: "สลัดโรล"
    },
    {
      image: "./assets/img/กัญชา.jpg",
      title: "'กัญชา' อะไร ทำได้/ไม่ได้?"
    }
  ];

  // จำนวนรายการต่อหน้า
  const itemsPerPage = 3;
  let currentPage = 1;

  // แสดง Infographic ตามหน้า
  function showInfographics(page) {
    const container = $('#infographicContainer');
    container.empty();

    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const paginatedItems = infographics.slice(startIndex, endIndex);

    paginatedItems.forEach(item => {
      const cardHtml = `
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 border-0 shadow-sm infographic-card">
          <div class="card-img-top position-relative overflow-hidden" style="height: 200px;">
            <img src="${item.image}" class="img-fluid w-100 h-100 object-fit-cover" alt="${item.title}">
          </div>
          <div class="card-body">
            <h5 class="card-title text-primary">${item.title}</h5>
          </div>
          <div class="card-footer bg-white border-0 pt-0">
            <button class="btn btn-sm btn-outline-primary mr-2 view-fullsize"
              data-image="${item.image}"
              data-title="${item.title}">
              <i class="far fa-eye mr-1"></i>ดูเต็มขนาด
            </button>
          </div>
        </div>
      </div>
    `;
      container.append(cardHtml);
    });

    // อัปเดต Pagination
    updatePagination();
  }

  // สร้าง Pagination
  function updatePagination() {
    const totalPages = Math.ceil(infographics.length / itemsPerPage);
    const pagination = $('#pagination');
    pagination.empty();

    // ปุ่มก่อนหน้า
    const prevDisabled = currentPage === 1 ? 'disabled' : '';
    pagination.append(`
    <li class="page-item ${prevDisabled}">
      <a class="page-link" href="#" data-page="${currentPage - 1}">ก่อนหน้า</a>
    </li>
  `);

    // หมายเลขหน้า
    for (let i = 1; i <= totalPages; i++) {
      const active = i === currentPage ? 'active' : '';
      pagination.append(`
      <li class="page-item ${active}">
        <a class="page-link" href="#" data-page="${i}">${i}</a>
      </li>
    `);
    }

    // ปุ่มถัดไป
    const nextDisabled = currentPage === totalPages ? 'disabled' : '';
    pagination.append(`
    <li class="page-item ${nextDisabled}">
      <a class="page-link" href="#" data-page="${currentPage + 1}">ถัดไป</a>
    </li>
  `);
  }

  // เปิด Modal แล้วแสดงหน้าแรก
  $('#infographicModal').on('show.bs.modal', function() {
    currentPage = 1;
    showInfographics(currentPage);
  });

  // เปลี่ยนหน้าเมื่อคลิก Pagination
  $(document).on('click', '.page-link', function(e) {
    e.preventDefault();
    const page = $(this).data('page');
    if (page && page !== currentPage) {
      currentPage = page;
      showInfographics(currentPage);
    }
  });

  // เปิด Modal ดูรูปเต็มขนาด (เหมือนเดิม)
  $(document).on('click', '.view-fullsize', function() {
    var imgSrc = $(this).data('image');
    var imgTitle = $(this).data('title');

    $('#fullSizeImage').attr('src', imgSrc).attr('alt', imgTitle);
    $('#downloadLink').attr('href', imgSrc).attr('download', imgTitle + '.png');
    $('#imageViewerModal').modal('show');
  });
});



