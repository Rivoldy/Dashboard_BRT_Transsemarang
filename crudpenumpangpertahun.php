<?php
include 'koneksi.php';

// Fungsi untuk mengambil data penumpang
function getPassengerData($conn) {
    $sql = "SELECT * FROM passenger_statistics";
    $result = $conn->query($sql);
    return $result;
}

// Menghapus data penumpang
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM passenger_statistics WHERE id=$id");
    header('Location: data_penumpang.php');
}

// Tampilkan data penumpang
$passengerData = getPassengerData($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Penumpang BRT</title>
    <link rel="stylesheet" href="style.css"> <!-- Pastikan style.css sesuai dengan kebutuhan -->
</head>
<body>
    <h1>Data Penumpang BRT Trans Semarang Koridor 1</h1>
    <a href="tambah_data.php">Tambah Data</a>
    <table border="1">
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Penumpang Pertahun</th>
                <th>Rata-rata Penumpang Perhari</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $passengerData->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['year']; ?></td>
                    <td><?= $row['total_annual_passengers']; ?></td>
                    <td><?= $row['average_daily_passengers']; ?></td>
                    <td>
                        <a href="edit_data.php?id=<?= $row['id']; ?>">Edit</a>
                        <a href="data_penumpang.php?delete=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
