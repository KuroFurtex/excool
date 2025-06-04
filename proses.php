<?php
session_start();
include 'config.php';
include 'functions.php';

if (isset($_POST['submit'])) {
    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $umur  = $_POST['umur'];
    $minat = $_POST['minat'];

    $hasil = validasiInput($nama, $email, $umur);
    if ($hasil !== true) {
        $_SESSION['pesan'] = $hasil;
        header("Location: sukses.php");
        exit;
    }

    $sql = "INSERT INTO anggota (nama, email, umur, minat) VALUES ('$nama', '$email', '$umur', '$minat')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['pesan'] = "Pendaftaran berhasil!";
    } else {
        $_SESSION['pesan'] = "Gagal menyimpan data.";
    }
    header("Location: sukses.php");
}
?> 
