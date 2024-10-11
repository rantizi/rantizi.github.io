<?php
    include "koneksi.php";

    if(isset($_POST['update'])){
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jk = isset($_POST['jk']) ? $_POST['jk'] : null;
        $tgl_lhr = $_POST['tgl_lhr'];
        $email = $_POST['email'];

        $sql = "UPDATE biodata set nama='$nama',  alamat='$alamat', jk='$jk', tgl_lhr='$tgl_lhr', email='$email' where npm='$npm'";
    }

    if(mysqli_query($conn, $sql)){
        header("Location: tabel.php");
        exit();
    } else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>