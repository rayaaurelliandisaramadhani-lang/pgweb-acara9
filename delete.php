<?php
$id = $_GET['id'] ?? 0;

$conn = new mysqli("localhost", "root", "", "point_klaten");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "DELETE FROM objek_wisata WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location: index.php");
    exit();
} else {
    echo "Error menghapus data: " . $conn->error;
    $conn->close();
}
?>