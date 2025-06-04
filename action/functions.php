<?php
function validasiInput($nama, $email, $umur) {
    if (empty($nama) || empty($email) || empty($umur)) {
        return "Semua field wajib diisi!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email tidak valid!";
    }
    if (!is_numeric($umur) || $umur < 10) {
        return "Umur minimal 10 tahun!";
    }
    return true;
}
function redirectTo($page) {
  header("Location: ../index.php?p=" . urlencode($page));
  exit;
}
?>

