<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="index.css">
        <title>Index</title>
    </head>

    <body>
        <?php
        $npm = $_GET['id'];
        $sql = "SELECT * FROM biodata where npm = '$npm'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $npmValue = $row['npm'];
            $namaValue = $row['nama'];
            $alamatValue = $row['alamat'];
            $tgl_lhrValue = $row['tgl_lhr'];
            $jkValue = $row['jk'];
            $emailValue = $row['email'];
        } else{
            echo "<script>alert('Data not found');</script>";
            exit;
        }

        mysqli_close($conn);
        ?>
        <div class="container">
            <h2>Form Biodata Mahasiswa Edit</h2>
            <form method="POST" action="perbaharui.php" id="formBiodata">
                <table>
                    <tr>
                        <th>NPM: </th>
                        <td><input type="text" name="npm" id="npm" value="<?php echo htmlspecialchars($npmValue); ?>" placeholder="Masukkan NPM"></td>
                    </tr>
                    <tr>
                        <th>Nama: </th>
                        <td><input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($namaValue); ?>" placeholder="Masukkan Nama"></td>
                    </tr>
                    <tr>
                        <th>Alamat: </th>
                        <td><textarea name="alamat" id="alamat" rows="4" cols="30" placeholder="Masukkan Alamat"><?php echo htmlspecialchars($alamatValue); ?></textarea></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir: </th>
                        <td><input type="date" name="tgl_lhr" id="tgl_lhr" value="<?php echo htmlspecialchars($tgl_lhrValue); ?>"></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin: </th>
                        <td><input type="radio" name="jk" id="jk_l" value="L" <?php echo ($jkValue == 'L') ? 'checked' : '';?>>Laki-laki
                            <input type="radio" name="jk" id="jk_p" value="P" <?php echo ($jkValue == 'P') ? 'checked' : '';?>>Perempuan</td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td><input type="text" name="email" id="email" value="<?php echo htmlspecialchars($emailValue); ?>" placeholder="Masukkan Email"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" name="update">Update</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <script>
            document.getElementById("formBiodata").addEventListener("submit", function(event){
                let npm = document.getElementById("npm").value;
                let nama = document.getElementById("nama").value;
                let alamat = document.getElementById("alamat").value;
                let tgl_lhr = document.getElementById("tgl_lhr").value;
                let jk = document.querySelector('input[name="jk"]:checked');
                let email = document.getElementById("email").value;

                let requiredFields = [];
                if (npm === "") requiredFields.push("NPM");
                if (nama === "") requiredFields.push("Nama");
                if (alamat === "") requiredFields.push("Alamat");
                if (tgl_lhr === "") requiredFields.push("Tanggal Lahir");
                if (!jk) requiredFields.push("Jenis Kelamin");
                if (email === "") requiredFields.push("Email");

                if (requiredFields.length > 0) {
                    alert(requiredFields.join(", ") + " is required");
                    event.preventDefault();
                };
            });
        </script>
    </body>
</html>