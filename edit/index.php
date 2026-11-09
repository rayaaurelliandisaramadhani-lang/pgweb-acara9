<?php
$conn = new mysqli("localhost", "root", "", "point_klaten");
$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM objek_wisata WHERE id = $id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Pariwisata</title>
</head>
<body>
<h2>Form Edit Destinasi Pariwisata</h2>

<?php
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label>Nama Tempat:</label><br>
        <input type="text" name="nama_tempat" value="<?php echo $row['nama_tempat']; ?>" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required><?php echo $row['alamat']; ?></textarea><br><br>

        <label>Kelurahan:</label><br>
        <input type="text" name="kelurahan" value="<?php echo $row['kelurahan']; ?>" required><br><br>

        <label>Longitude:</label><br>
        <input type="text" name="longitude" value="<?php echo $row['longitude']; ?>" required><br><br>

        <label>Latitude:</label><br>
        <input type="text" name="latitude" value="<?php echo $row['latitude']; ?>" required><br><br>

        <input type="submit" value="Simpan Perubahan">
    </form>
<?php
} else {
    echo "Data tidak ditemukan.";
}
$conn->close();
?>
</body>
</html>