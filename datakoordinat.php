<?php
header('Content-Type: application/json');

// Contoh data halte
$data = [
    [
        'halte' => 'Halte A',
        'lat' => -6.966667,
        'lng' => 110.416664,
        'waktu_tunggu' => 15
    ],
    [
        'halte' => 'Halte B',
        'lat' => -6.968889,
        'lng' => 110.420000,
        'waktu_tunggu' => 25
    ]
    // tambahkan data halte lainnya
];

echo json_encode($data);
?>
