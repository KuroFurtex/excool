<?php
include 'config.php'; // Connect to DB
?>

<h2>Data Bukti</h2>
<table border="1">
  <thead>
    <tr>
      <th>No</th>
      <th>Ekstra</th>
      <th>Foto</th>
      <th>Tanggal</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM bukti");
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
              <td>{$row['id_bukti']}</td>
              <td>{$row['id_ekstra']}</td>
              <td><img src='data:image/jpeg;base64," . base64_encode($row['foto']) . "' width='100'/></td>
              <td>{$row['tanggal_bukti']}</td>
            </tr>";
    }
    ?>
  </tbody>
</table>

