<h2>Daftar Anggota</h2>
<a class="btn" data-bs-toggle="collapse" href="#filter" role="button" aria-expanded="<?= isset($_GET['filter']) && $_GET['filter'] !== '' ? 'true' : 'false' ?>" aria-controls="filter">
    Filter v
</a>

<?php
  include 'config.php';

  $filterActive = isset($_GET['filter']) && $_GET['filter'] !== '';
?>

<div class="collapse kf-filter <?= !$filterActive ? 'show' : '' ?>" id="filter">
  <a href="index.php?p=anggota&filter=all">Semua</a>
  <?php
    $result = mysqli_query($conn, "SELECT nama_ekstra FROM ekstra");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<a href=\"index.php?p=anggota&filter=" . htmlspecialchars($row['nama_ekstra']) . "\">" . htmlspecialchars($row['nama_ekstra']) . "</a>";
    }
  ?>
</div>

<?php
if ($filterActive) {
?>
<h4>Filter By: <?= htmlspecialchars($_GET['filter']) ?></h4>
<div class="kf-overflowed">
<table>
  <thead>
    <th>No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Umur</th>
    <th>Minat</th>
  </thead>
  <?php
      $get = mysqli_real_escape_string($conn, $_GET['filter']);
      if ($get == "all") {
        $result2 = mysqli_query($conn, "SELECT anggota.*, ekstra.nama_ekstra AS minat
        FROM anggota
        JOIN ekstra ON anggota.id_ekstra = ekstra.id_ekstra
        ORDER BY minat ASC;
        ");
      } else {
        $result2 = mysqli_query($conn, "SELECT anggota.*, ekstra.nama_ekstra AS minat
        FROM anggota
        JOIN ekstra ON anggota.id_ekstra = ekstra.id_ekstra
        WHERE ekstra.nama_ekstra = '$get'
        ORDER BY minat ASC;
        ");
      }
      $no = 1;
      while ($row2 = mysqli_fetch_assoc($result2)) {
          echo "<tbody>
                  <td>{$no}</td>
                  <td>" . htmlspecialchars($row2['nama']) . "</td>
                  <td>" . htmlspecialchars($row2['email']) . "</td>
                  <td>" . htmlspecialchars($row2['umur']) . "</td>
                  <td>" . htmlspecialchars($row2['minat']) . "</td>
              </tbody>";
          $no++;
      }
    }
  ?>
</table>
</div>
