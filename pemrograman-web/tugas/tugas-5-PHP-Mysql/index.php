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
        <div class="container">
            <h2>Form Biodata Mahasiswa</h2>
            <form method="POST" action="input.php" id="formBiodata">
                <table>
                    <tr>
                        <th>NPM: </th>
                        <td><input type="text" name="npm" id="npm" placeholder="Masukkan NPM"></td>
                    </tr>
                    <tr>
                        <th>Nama: </th>
                        <td><input type="text" name="nama" id="nama" placeholder="Masukkan Nama"></td>
                    </tr>
                    <tr>
                        <th>Alamat: </th>
                        <td><textarea name="alamat" id="alamat" rows="4" cols="30" placeholder="Masukkan Alamat"></textarea></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir: </th>
                        <td><input type="date" name="tgl_lhr" id="tgl_lhr"></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin: </th>
                        <td><input type="radio" name="jk" id="jk_l" value="L">Laki-laki
                            <input type="radio" name="jk" id="jk_p" value="P">Perempuan</td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td><input type="text" name="email" id="email" placeholder="Masukkan Email"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" name="submit">Submit</button>
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