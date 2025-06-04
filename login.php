<?php
session_start();

// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = ""; // Ganti sesuai password MySQL kamu
$db = "klub_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Cek jika form dikirim
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Contoh: login berdasarkan email sebagai username
    $query = "SELECT * FROM anggota WHERE email='$username' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        // Misalnya password di database sama dengan email dulu (untuk testing)
        if ($password == $data['email']) {
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['id'] = $data['id'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Email tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" action="">
        <label>Email:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
