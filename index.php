<!DOCTYPE html>
<?php
    // 1. Default to "welcome" if no ?p is provided
    if (!isset($_GET['p']) || $_GET['p'] === '') {
        header("Location: index.php?p=welcome");
        exit;
    }

    $page = $_GET['p'];

    // 2. Redirect to err404 if the page file doesn't exist
    if (!file_exists("page/$page.php")) {
        header("Location: index.php?p=err404");
        exit;
    }
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Excool - <?= ucwords(str_replace("_", " ", $page)); ?></title>
		<link rel="stylesheet" href="view/css/bootstrap.css">
		<link rel="stylesheet" href="view/core.css">
		<script src="view/js/bootstrap.js"></script>
	</head>

	<body>
		<?php
			include "view/navbar.php"
		?>
		<div class="kf-container">
			<?php
				include "page/$page.php";
			?>
		</div>
		<dialog id="tambahEkstra">
			<form method="POST" action="action/proses_ekstra.php">
				<h3>Tambah Ekstrakulikuler</h3>
				<label>Nama: </label>
				<input type="text" name="nama"><br>
				<button type="submit">Submit</button>
				<button type="button" onclick="document.getElementById('tambahEkstra').close()">Cancel</button>
			</form>
		</dialog>
		<dialog id="editEkstra">
			<form method="POST" action="action/update_ekstra.php">
				<h3>Edit Ekstrakulikuler</h3>
				<label>Nama: </label>
				<input type="hidden" name="id_ekstra" id="edit-id-ekstra">
				<input type="text" name="nama" id="edit-nama-ekstra"><br>
				<button type="submit">Submit</button>
				<button type="button" onclick="document.getElementById('editEkstra').close()">Cancel</button>
			</form>
		</dialog>
		<dialog id="hapusEkstra">
			<form method="POST" action="action/hapus_ekstra.php">
				<h3>Hapus Ekstrakulikuler</h3>
				<p>Apakah anda ingin menghapus ekstrakulikuler: <span id="nama-ekstra-dihapus"></span></p>
				<input type="hidden" name="id_ekstra" id="hapus-id-ekstra">
				<button type="submit">Hapus</button>
				<button type="button" onclick="document.getElementById('hapusEkstra').close()">Cancel</button>
			</form>
		</dialog>
		<dialog id="absen">
			<form method="POST" action="action/absen.php">
				<h3>Absen</h3>
				<label>Siswa: </label>
				<select id="ekstra" name="ekstra">
					<?php while ($ekstra = mysqli_fetch_assoc($ekstraList)): ?>
						<option value="<?= $ekstra['id_ekstra'] ?>" <?= ($ekstra['id_ekstra'] == $filter_ekstra) ? 'selected' : '' ?>>
							<?= htmlspecialchars($ekstra['nama_ekstra']) ?>
						</option>
					<?php endwhile; ?>
				</select>
				<button type="submit">Submit</button>
				<button type="button" onclick="document.getElementById('absen').close()">Cancel</button>
			</form>
		</dialog>
	</body>
	<script src="view/script.js"></script> <!-- FIXME: Yg ini error, gabisa -->
</html>
