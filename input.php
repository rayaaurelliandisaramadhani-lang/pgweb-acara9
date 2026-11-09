<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_tempat = $_POST['nama_tempat'] ?? '';
    $alamat      = $_POST['alamat'] ?? '';
    $kelurahan   = $_POST['kelurahan'] ?? '';
    $longitude   = $_POST['longitude'] ?? 0;
    $latitude    = $_POST['latitude'] ?? 0;

    $conn = new mysqli("localhost", "root", "", "point_klaten");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "INSERT INTO objek_wisata (nama_tempat, alamat, kelurahan, longitude, latitude) 
            VALUES ('$nama_tempat', '$alamat', '$kelurahan', '$longitude', '$latitude')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>