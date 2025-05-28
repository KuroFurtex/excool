<!DOCTYPE html>
<html>
	<head>
		<title>Title!</title>
		<link rel="stylesheet" href="view/core.css">
		<script src="script.js"></script>
	</head>

	<body>
		<div class="container">
			<h2>Daftar Anggota</h2>
			<table>
				<thead>
					<th>No</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Umur</th>
					<th>Minat</th>
				</thead>
				<?php
					include 'config.php';

					$result = mysqli_query($conn, "SELECT * FROM anggota");
					$no = 1;
					while ($row = mysqli_fetch_assoc($result)) {
							echo "<tbody>
											<td>{$no}</td>
											<td>{$row['nama']}</td>
											<td>{$row['email']}</td>
											<td>{$row['umur']}</td>
											<td>{$row['minat']}</td>
									</tbody>";
							$no++;
					}
				?>
			</table>
		</div>
	</body>
</html>
