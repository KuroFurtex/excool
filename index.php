<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran</title>
    <link rel="stylesheet" href="view/core.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #6dd5ed, #2193b0);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 60px auto;
            background: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2193b0;
            margin-bottom: 25px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            color: #333;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px 12px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }
        button {
            width: 100%;
            margin-top: 25px;
            background-color: #2193b0;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background-color: #176d85;
        }
        .info {
            text-align: center;
            margin-top: 20px;
        }
        .info a {
            color: #2193b0;
            text-decoration: none;
        }
        .info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Pendaftaran Anggota Klub</h2>
    <form method="POST" action="proses.php">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" required>

        <label for="email">Email Aktif</label>
        <input type="text" name="email" id="email" required>

        <label for="umur">Umur</label>
        <input type="number" name="umur" id="umur" required>

        <label for="minat">Minat</label>
        <select name="minat" id="minat">
            <option value="Olahraga">Olahraga</option>
            <option value="Musik">Musik</option>
            <option value="Teknologi">Teknologi</option>
            <option value="Seni">Seni</option>
        </select>

        <button type="submit" name="submit">Daftar Sekarang</button>
    </form>
    <div class="info">
        <a href="data.php">Lihat Daftar Anggota</a>
    </div>
</div>
</body>
</html>
