<!-- Swiper Slider (CDN) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<div class="swiper mySwiper mb-4">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <img src="https://source.unsplash.com/800x300/?school,activity" class="w-100" style="height: 300px; object-fit: cover;" />
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
    $ekskul = [
      ["title" => "Pramuka", "desc" => "Melatih kedisiplinan dan kerja tim.", "img" => "https://source.unsplash.com/400x200/?pramuka"],
      ["title" => "Pencak Silat", "desc" => "Seni bela diri tradisional.", "img" => "https://source.unsplash.com/400x200/?silat"],
      ["title" => "Futsal", "desc" => "Olahraga tim cepat dan strategi.", "img" => "https://source.unsplash.com/400x200/?futsal"],
      ["title" => "Basket", "desc" => "Olahraga bola tangan yang seru.", "img" => "https://source.unsplash.com/400x200/?basketball"],
      ["title" => "PMR", "desc" => "Palang Merah Remaja dan bantuan medis.", "img" => "https://source.unsplash.com/400x200/?firstaid"],
      ["title" => "KIR", "desc" => "Kelompok Ilmiah Remaja dan penelitian.", "img" => "https://source.unsplash.com/400x200/?science,lab"],
      ["title" => "Tari Tradisional", "desc" => "Melestarikan budaya melalui gerakan.", "img" => "https://source.unsplash.com/400x200/?traditional,dance"],
      ["title" => "English Club", "desc" => "Latihan bahasa Inggris aktif.", "img" => "https://source.unsplash.com/400x200/?english"],
      ["title" => "Paduan Suara", "desc" => "Ekskul vokal dan musikalitas.", "img" => "https://source.unsplash.com/400x200/?choir,singing"],
      ["title" => "Robotik", "desc" => "Teknologi dan inovasi dengan robot.", "img" => "https://source.unsplash.com/400x200/?robotics"],
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
            include 'config.php';
            $result2 = mysqli_query($conn, "SELECT * FROM ekstra");
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
