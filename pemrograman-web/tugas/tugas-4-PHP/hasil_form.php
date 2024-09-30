<?php
// Tangkap data yang dikirim dari form
$npm = $_POST['npm'];
$nama = strtoupper($_POST['nama']); // Ubah menjadi huruf besar
$alamat = strtoupper($_POST['alamat']); // Ubah menjadi huruf besar
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$hobi = $_POST['hobi'];

// Tampilkan hasil input
echo "<h2>Hasil Input Data Mahasiswa</h2>";
echo "NPM: $npm<br>";
echo "Nama: $nama<br>";
echo "Alamat: $alamat<br>";
echo "Tempat Lahir: $tempat_lahir<br>";
echo "Tanggal Lahir: $tanggal_lahir<br>";
echo "Jenis Kelamin: $jenis_kelamin<br>";
echo "Hobi: $hobi<br>";
?>
