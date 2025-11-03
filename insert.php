<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {
    
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $tahun = $_POST['tahun'];
    
    $target_dir = "uploads/";
    $foto_nama = basename($_FILES["foto"]["name"]);
    $target_file = $target_dir . $foto_nama;
    
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        // Berhasil upload
    } else {
        $foto_nama = ""; 
    }

    $sql = "INSERT INTO mahasiswa (npm, nama, jurusan, prodi, email, nohp, tahun, foto) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            
    $stmt = $koneksi->prepare($sql);
    
    $stmt->bind_param("ssssssis", $npm, $nama, $jurusan, $prodi, $email, $nohp, $tahun, $foto_nama);

    if ($stmt->execute()) {
        echo "<script>alert('Data mahasiswa berhasil ditambahkan!');</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        h2 { color: #333; }
        form { 
            max-width: 600px; 
            margin: 0 auto; 
            padding: 20px; 
            background-color: #fff; 
            border-radius: 8px; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        div { margin-bottom: 15px; }
        label { 
            display: block; 
            margin-bottom: 5px; 
            font-weight: bold; 
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box; 
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>

    <h2>Form Tambah Data Mahasiswa</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm" required>
        </div>
        <div>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div>
            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" value="Teknologi Informasi" required>
        </div>
        <div>
            <label for="prodi">Program Studi:</label>
            <input type="text" id="prodi" name="prodi" value="D3 Manajemen Informatika" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="nohp">No. HP:</label>
            <input type="text" id="nohp" name="nohp" required>
        </div>
        <div>
            <label for="tahun">Tahun Angkatan:</label>
            <input type="number" id="tahun" name="tahun" value="2023" required>
        </div>
        <div>
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto" accept="image/*">
        </div>
        <div>
            <button type="submit" name="submit">Simpan Data</button>
        </div>
    </form>

</body>
</html>
