<?php
include('db/config.php');
session_start();

// Cek jika form jawaban sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jawaban_list = $_POST['jawaban'];

    // Loop setiap jawaban dan simpan ke database
    foreach ($jawaban_list as $soal_id => $jawaban) {
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO jawaban (user_id, soal_id, jawaban) VALUES ('$user_id', '$soal_id', '$jawaban')";
        $conn->query($query);
    }

    // Redirect ke halaman selesai
    header('Location: selesai.php');
    exit();
}
?>
