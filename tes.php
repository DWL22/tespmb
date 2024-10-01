<?php
include('db/config.php');

// Cek jika user belum login, redirect ke login
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Ambil soal dari database
$query = "SELECT * FROM soal WHERE kategori='S1'"; // Misalnya S1, bisa diganti dengan S2 atau kondisi lain
$result = $conn->query($query);
$soal_list = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tes</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <div class="test-container">
        <h2>Soal Tes</h2>
        <form action="submit_jawaban.php" method="POST">
            <?php foreach ($soal_list as $index => $soal): ?>
                <div class="soal-item">
                    <p><?= ($index + 1) . ". " . $soal['soal']; ?></p>
                    <label><input type="radio" name="jawaban[<?= $soal['id'] ?>]" value="A"> <?= $soal['pilihan_a']; ?></label><br>
                    <label><input type="radio" name="jawaban[<?= $soal['id'] ?>]" value="B"> <?= $soal['pilihan_b']; ?></label><br>
                    <label><input type="radio" name="jawaban[<?= $soal['id'] ?>]" value="C"> <?= $soal['pilihan_c']; ?></label><br>
                    <label><input type="radio" name="jawaban[<?= $soal['id'] ?>]" value="D"> <?= $soal['pilihan_d']; ?></label><br>
                </div>
            <?php endforeach; ?>
            <button type="submit">Submit Jawaban</button>
        </form>
    </div>
</body>
</html>
