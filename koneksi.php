<?php
include 'db.php';

// SQL queries for all categories from survey
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

// Retrieve data from passenger_statistics
$selectQuery = "SELECT * FROM passenger_statistics";
$resultStats = $conn->query($selectQuery);

$statsData = [];
if ($resultStats->num_rows > 0) {
    while($row = $resultStats->fetch_assoc()) {
        $statsData[] = $row;
    }
}

// Query untuk mengambil data jumlah penumpang per halte
$queryHalte = "SELECT nama_halte, jumlah_penumpang FROM halte_penumpang";
$resultHalte = $conn->query($queryHalte);

$halteData = [];
if ($resultHalte->num_rows > 0) {
    while($row = $resultHalte->fetch_assoc()) {
        $halteData[] = $row;
    }
}


// Pertama, ambil data untuk hari biasa
$sqlNormal = "SELECT time, passengers FROM passengers_per_hour WHERE is_weekend = false ORDER BY id";
$resultNormal = $conn->query($sqlNormal);
$times = [];
$normalPassengerCounts = [];
if ($resultNormal->num_rows > 0) {
    while($row = $resultNormal->fetch_assoc()) {
        $times[] = $row["time"];
        $normalPassengerCounts[] = $row["passengers"];
    }
}

// Kemudian, ambil data untuk hari weekend
$sqlWeekend = "SELECT time, passengers FROM passengers_per_hour WHERE is_weekend = true ORDER BY id";
$resultWeekend = $conn->query($sqlWeekend);
$weekendPassengerCounts = [];
if ($resultWeekend->num_rows > 0) {
    while($row = $resultWeekend->fetch_assoc()) {
        $weekendPassengerCounts[] = $row["passengers"];
    }
}

// Close connection
$conn->close();
?>
