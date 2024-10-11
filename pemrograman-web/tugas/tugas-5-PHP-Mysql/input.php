<?php
    include "koneksi.php";

    if(isset($_POST['submit'])){
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jk = isset($_POST['jk']) ? $_POST['jk'] : null;
        $tgl_lhr = $_POST['tgl_lhr'];
        $email = $_POST['email'];

        $sql = "INSERT INTO biodata(npm, nama, alamat, jk, tgl_lhr, email)
                VALUES ('$npm', '$nama', '$alamat', '$jk', '$tgl_lhr', '$email')";
    }

    if(mysqli_query($conn, $sql)){
        header("Location: tabel.php");
        exit();
    } else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>