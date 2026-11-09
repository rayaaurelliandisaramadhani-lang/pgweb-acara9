<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id          = $_POST['id'];
    $nama_tempat = $_POST['nama_tempat'];
    $alamat      = $_POST['alamat'];
    $kelurahan   = $_POST['kelurahan'];
    $longitude   = $_POST['longitude'];
    $latitude    = $_POST['latitude'];

    $conn = new mysqli("localhost", "root", "", "point_klaten");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "UPDATE objek_wisata SET 
                nama_tempat = '$nama_tempat', 
                alamat = '$alamat', 
                kelurahan = '$kelurahan', 
                longitude = $longitude, 
                latitude = $latitude 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
    }
}
?>