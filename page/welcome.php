<!-- Swiper Slider (CDN) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<div class="swiper mySwiper mb-4">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <img src="https://smkn1probolinggo.sch.id/wp-content/uploads/2023/10/featured2.png.webp" class="w-100" style="height: 300px; object-fit: cover;" />
    </div>
    <div class="swiper-slide">
      <img src="https://source.unsplash.com/800x300/?students,teamwork" class="w-100" style="height: 300px; object-fit: cover;" />
    </div>
    <div class="swiper-slide">
      <img src="https://source.unsplash.com/800x300/?extracurricular,sport" class="w-100" style="height: 300px; object-fit: cover;" />
    </div>
  </div>
</div>

<!-- Search Bar -->
<div class="container my-4">
  <input type="text" class="form-control" placeholder="Cari ekskul..." id="searchInput" onkeyup="searchEkskul()">
</div>

<!-- Daftar Ekskul -->
<div class="container mb-5">
  <div class="row" id="ekskulList">

    <?php
    include 'config.php';
    $result2 = mysqli_query($conn, "SELECT * FROM ekstra");
    $ekskul = [
      ["title" => "Pramuka", "desc" => "Melatih kedisiplinan dan kerja tim.", "img" => "https://images.unsplash.com/photo-1661837127709-7fc694367918?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cHJhbXVrYXxlbnwwfHwwfHx8MA%3D%3D"],
      ["title" => "Pencak Silat", "desc" => "Seni bela diri tradisional.", "img" => "data:image/jpeg;base64,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"],
      ["title" => "Futsal", "desc" => "Olahraga tim cepat dan strategi.", "img" => "https://images.unsplash.com/photo-1676444920926-c8a084ec4003?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8ZnV0c2FsfGVufDB8fDB8fHww"],
      ["title" => "Basket", "desc" => "Olahraga bola tangan yang seru.", "img" => "https://unsplash.com/photos/top-view-of-young-man-in-sports-clothing-scoring-a-slam-dunk-while-playing-basketball-outdoors-cRz7y_9oldc"],
      ["title" => "PMR", "desc" => "Palang Merah Remaja dan bantuan medis.", "img" => "https://www.google.com/imgres?q=PMR%20smkn%201%20probolinggo&imgurl=https%3A%2F%2Fpmijawatimur.or.id%2Fwp-content%2Fuploads%2F2024%2F02%2FIMG-20240203-WA0009.jpg&imgrefurl=https%3A%2F%2Fpmijawatimur.or.id%2Ftumbuhkan-jiwa-relawan-pmr-yang-berkarakter-pmr-wira-unit-smkn-1-gending-laksanakan-pelantikan-atribut%2F&docid=lZJriBjzhaViTM&tbnid=KkZOwmzpSoJD7M&vet=12ahUKEwitnZ-309aNAxVgz6ACHUgeGRIQM3oECGUQAA..i&w=1600&h=1066&hcb=2&ved=2ahUKEwitnZ-309aNAxVgz6ACHUgeGRIQM3oECGUQAA"],
      ["title" => "PIK-R", "desc" => "Kelompok Ilmiah Remaja Genre.", "img" => "https://id.pinterest.com/pin/5911043260142399/"],
      ["title" => "Tari Tradisional", "desc" => "Melestarikan budaya melalui gerakan.", "img" => "https://id.pinterest.com/pin/1137510818359641917/"],
      ["title" => "Badminton", "desc" => "Olahraga melatih kelincahan.", "img" => "https://id.pinterest.com/pin/819373725990616598/"],
      ["title" => "Music/Band", "desc" => "Ekskul band dan musikalitas.", "img" => "https://id.pinterest.com/pin/4222193393151143/"],
      ["title" => "Robotik", "desc" => "Teknologi dan inovasi dengan robot.", "img" => "https://id.pinterest.com/pin/110830840821840007/"],
    ];

    foreach ($ekskul as $e) {
      echo '
      <div class="col-md-4 mb-4 ekskul-item" data-title="' . strtolower($e["title"]) . '">
        <div class="card h-100">
          <img src="' . $e["img"] . '" class="card-img-top" style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">' . $e["title"] . '</h5>
            <p class="card-text">' . $e["desc"] . '</p>
          </div>
        </div>
      </div>';
    }
    ?>
  </div>
</div>

<!-- Formulir Pendaftaran -->
<div class="container mb-5">
  <h2>Pendaftaran Anggota Ekstra</h2>
  <form method="POST" action="action/proses.php">
    <label for="nama" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" name="nama" id="nama" required>

    <label for="email" class="form-label">Email Aktif</label>
    <input type="text" class="form-control" name="email" id="email" required>

    <label for="umur" class="form-label">Umur</label>
    <input type="number" class="form-control" name="umur" id="umur" required>

    <label for="minat" class="form-label">Minat</label>
    <select name="minat" class="form-select" id="minat">
        <?php
            $no = 1;
            while ($row2 = mysqli_fetch_assoc($result2)) {
                echo "<option value='{$no}'>{$row2['nama_ekstra']}</option>";
                $no++;
            }
        ?>
    </select>
    <br>
    <button type="submit" class="btn kf-btn-blue" name="submit">Daftar Sekarang</button>
  </form>
</div>

<!-- Swiper & Search Script -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  new Swiper(".mySwiper", {
    autoplay: { delay: 3000 },
    loop: true,
  });

  function searchEkskul() {
    const keyword = document.getElementById("searchInput").value.toLowerCase();
    const items = document.querySelectorAll("#ekskulList .ekskul-item");
    items.forEach(item => {
      const title = item.getAttribute("data-title");
      item.style.display = title.includes(keyword) ? "block" : "none";
    });
  }
</script>
