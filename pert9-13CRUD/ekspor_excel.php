<?php
include "koneksi.php"; // Koneksi ke database

// Fungsi untuk mengubah data menjadi format Excel
function exportToExcel($data, $filename = "data_mahasiswa.xlsx") {
    // Set header untuk membuat file Excel
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");

    // Buka output buffer untuk menangkap output sebagai file Excel
    ob_start();

    // Output baris data
    echo "ID\tNama Mahasiswa\tProdi\n";
    foreach ($data as $row) {
        echo implode("\t", $row) . "\n";
    }

    // Akhiri output buffer dan kirim file Excel
    ob_end_flush();
    exit();
}

// Query untuk mengambil data dari database
$query = "SELECT id, nama_mahasiswa, prodi FROM mahasiswa";
$result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

// Memasukkan data ke dalam array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array($row['id'], $row['nama_mahasiswa'], $row['prodi']);
}

// Ekspor data ke Excel saat halaman dimuat
exportToExcel($data);
?>
