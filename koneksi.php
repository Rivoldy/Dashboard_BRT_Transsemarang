<?php
// Database configuration
$host = 'localhost';
$username = 'root'; 
$password = ''; 
$dbname = 'db_brt'; 

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL queries for all categories
$queries = [
    'gender' => "SELECT `jenis_kelamin`, COUNT(*) as count FROM `survey_brt` GROUP BY `jenis_kelamin`",
    'occupation' => "SELECT `pekerjaan`, COUNT(*) as count FROM `survey_brt` GROUP BY `pekerjaan`",
    'frequency' => "SELECT `frekuensi_penggunaan_aplikasi`, COUNT(*) as count FROM `survey_brt` GROUP BY `frekuensi_penggunaan_aplikasi`",
    'reliability' => "SELECT `keandalan_informasi_realtime`, COUNT(*) as count FROM `survey_brt` GROUP BY `keandalan_informasi_realtime`",
    'schedule_accuracy' => "SELECT `akurasi_informasi_jadwal_rute`, COUNT(*) as count FROM `survey_brt` GROUP BY `akurasi_informasi_jadwal_rute`",
    'announcement_clarity' => "SELECT `kejelasan_pengumuman`, COUNT(*) as count FROM `survey_brt` GROUP BY `kejelasan_pengumuman`",
    'performance_satisfaction' => "SELECT `kepuasan_kinerja_sistem`, COUNT(*) as count FROM `survey_brt` GROUP BY `kepuasan_kinerja_sistem`",
    'reuse_possibility' => "SELECT `kemungkinan_menggunakan_kembali`, COUNT(*) as count FROM `survey_brt` GROUP BY `kemungkinan_menggunakan_kembali`"
];
$data = [];

foreach ($queries as $key => $sql) {
    $result = $conn->query($sql);
    $data[$key] = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[$key][] = $row;
        }
    }
}

// Close connection
$conn->close();
?>
