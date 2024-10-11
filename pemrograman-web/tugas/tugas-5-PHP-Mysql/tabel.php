<?php
    include "koneksi.php";

    $sql = "SELECT * FROM biodata";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="tabel.css">
        <title>Hasil</title>
    </head>

    <body>
        <div class="container">
            <h2>Data Biodata Mahasiswa</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        if(mysqli_num_rows($result) > 0){
                            $no = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $no++;
                        ?>
                                <td><?php echo $no; ?></td>
                                <td><?php echo htmlspecialchars($row['npm']); ?></td>
                                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                                <td><?php echo htmlspecialchars($row['jk']); ?></td>
                                <td><?php echo htmlspecialchars($row['tgl_lhr']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td>
                                    <div class="button">
                                        <button class="aksi-btn edit" onClick="document.location.href='<?php echo "edit.php?id=" . $row["npm"];?>'">Edit</button>
                                        <button class="aksi-btn delete" onClick="confirmDelete('<?php echo $row["npm"];?>')">Delete</button>
                                    </div>
                                </td>
                    </tr>
                    <?php
                            }
                        } else{
                            echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
                        }
                        ?>
                </tbody>
            </table>
            <a href="index.php">Tambahkan Data</a>
        </div>
        <script>
            function confirmDelete(npm) {
                if (confirm("APakah kamu yakin untuk menghapus data\nNPM: " + npm + "?")) {
                    window.location.href = 'delete.php?npm=' + npm;
                }
            }
        </script>
    </body>
</html>