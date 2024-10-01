<?php
session_start(); // Tambahkan ini di bagian paling atas

include('db/config.php');

// Cek apakah user sudah login, jika ya redirect ke tes.php
if (isset($_SESSION['user_id'])) {
    header('Location: tes.php');
    exit();
}

// Proses login jika form dikirim
if (isset($_POST['login'])) {
    $nama = $_POST['nama'];
    $no_tes = $_POST['no_tes'];

    // Query untuk memeriksa user
    $query = "SELECT * FROM users WHERE nama='$nama' AND no_tes='$no_tes'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Set session untuk menandakan bahwa user sudah login
        $_SESSION['user_id'] = $no_tes;
        // Redirect ke halaman tes
        header('Location: tes.php');
        exit();
    } else {
        $error = "Nama atau Nomor Tes salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tes Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login Peserta</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form action="" method="POST">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>
            <label for="no_tes">No Tes</label>
            <input type="text" id="no_tes" name="no_tes" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
