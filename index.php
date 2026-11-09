<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "point_klaten";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM objek_wisata";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SEBARAN TITIK PARIWISATA KABUPATEN KLATEN</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        h2 { text-align: center; }
        .top-link { display: inline-block; margin-bottom: 15px; text-decoration: none; font-weight: bold; color: #007bff; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { padding: 6px 12px; text-decoration: none; color: white; border-radius: 4px; font-size: 13px; margin-right: 5px; }
        .btn-edit { background-color: #82dfe3; }
        .btn-delete { background-color: #dc3545; }
    </style>
</head>
<body>

    <h2>SEBARAN TITIK PARIWISATA KABUPATEN KLATEN</h2>

    <a href="input.html" class="top-link">+ Input Data</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Tempat</th>
            <th>Alamat</th>
            <th>Kelurahan</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["nama_tempat"]."</td>
                    <td>".$row["alamat"]."</td>
                    <td>".$row["kelurahan"]."</td>
                    <td>".$row["longitude"]."</td>
                    <td>".$row["latitude"]."</td>
                    <td>
                        <a href='edit/index.php?id=".$row["id"]."' class='btn btn-edit'>Edit</a>
                        <a href='delete.php?id=".$row["id"]."' class='btn btn-delete' onclick='return confirm(\"Yakin ingin menghapus data?\")'>Hapus</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data pariwisata</td></tr>";
        }
        $conn->close();
        ?>
    </table>

</body>
</html>