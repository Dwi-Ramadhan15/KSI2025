<?php
// Fungsi penjumlahan sederhana
function tambah($a, $b) {
    return $a + $b;
}

// Cek jika dijalankan langsung (bukan di-include)
if (!debug_backtrace()) {
    echo "Program Utama Berjalan.\n";
    echo "Hasil 5 + 5 adalah: " . tambah(5, 5);
}
?>
