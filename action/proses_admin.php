<?php
session_start();
include '../config.php';
include 'functions.php';

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    // Query admin table
    $query = "SELECT * FROM admin WHERE username = '$nama'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $admin = mysqli_fetch_assoc($result);

        // Use password_verify if hashed, else simple compare
        if (password_verify($pass, $admin['password'])) {
            $_SESSION['pesan'] = "";
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_name'] = $admin['username'];
            $baseUrl = dirname($_SERVER['PHP_SELF'], 2); // Go two folders up
            redirectTo("welcome");
            exit;
        } else {
            $_SESSION['pesan'] = "Password salah";
            header("Location: ../login.php");
        }
    } else {
        $_SESSION['pesan'] = "Admin tidak ditemukan!";
        header("Location: ../login.php");
    }

    exit;
}
?>

