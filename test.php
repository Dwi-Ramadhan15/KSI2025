<?php
include 'index.php';

// --- MULAI TESTING ---
echo "Menjalankan Unit Test...\n";

// Skenario: Kita tes 10 + 20, harusnya 30
$hasil = tambah(10, 20);
$target = 30;

if ($hasil == $target) {
    echo "[PASSED] Test Berhasil! 10 + 20 = $hasil\n";
    exit(0); // Kode 0 = Jenkins Hijau (Sukses)
} else {
    echo "[FAILED] Test Gagal! Harusnya $target, tapi hasilnya $hasil\n";
    exit(1); // Kode 1 = Jenkins Merah (Gagal)
}
?>
