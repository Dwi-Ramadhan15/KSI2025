<?php
require 'koneksi.php';

$sql = "SELECT npm, nama, jurusan FROM mahasiswa ORDER BY npm ASC";
$result = $koneksi->query($sql);

if (!$result) {
    die("Error executing query: " . $koneksi->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa KSI2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Tugas KSI2025</span>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Data Mahasiswa</h1>
        <p>Menampilkan data dari database MySQL</p>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Jurusan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1; 
                if ($result->num_rows > 0) {
                    while($mhs = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $nomor . "</th>";
                        echo "<td>" . htmlspecialchars($mhs['npm']) . "</td>";
                        echo "<td>" . htmlspecialchars($mhs['nama']) . "</td>";
                        echo "<td>" . htmlspecialchars($mhs['jurusan']) . "</td>";
                        echo "</tr>";
                        $nomor++;
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Tidak ada data ditemukan.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>

    <footer class="footer mt-auto py-3 bg-light fixed-bottom">
        <div class="container text-center">
            <span class="text-muted">© 2025 - Dwi-Ramadhan15</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
