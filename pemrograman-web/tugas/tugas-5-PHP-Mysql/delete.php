<?php
    include "koneksi.php";

    $npm = mysqli_real_escape_string($conn, $_GET['npm']);
    $sql = "DELETE from biodata where npm='$npm'";

    if(mysqli_query($conn, $sql)){
        header("Location: tabel.php");
        exit();
    } else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>