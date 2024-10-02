<?php
// Database connection
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "mhs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the table
if (isset($_POST['insert'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $jk = $_POST['jk'];
    $email = $_POST['email'];

    $sql = "INSERT INTO identitas (npm, nama, alamat, tgl_lhr, jk, email)
            VALUES ('$npm', '$nama', '$alamat', '$tgl_lhr', '$jk', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete data
if (isset($_GET['delete'])) {
    $npm = $_GET['delete'];
    $sql = "DELETE FROM identitas WHERE npm='$npm'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update data
if (isset($_POST['update'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $jk = $_POST['jk'];
    $email = $_POST['email'];

    $sql = "UPDATE identitas SET nama='$nama', alamat='$alamat', tgl_lhr='$tgl_lhr', jk='$jk', email='$email'
            WHERE npm='$npm'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch all data for display
$sql = "SELECT * FROM identitas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <style>
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Insert Data</h2>
    <form method="POST" action="">
        NPM: <input type="text" name="npm" required><br>
        Nama: <input type="text" name="nama" required><br>
        Alamat: <input type="text" name="alamat" required><br>
        Tanggal Lahir: <input type="date" name="tgl_lhr" required><br>
        Jenis Kelamin: <input type="text" name="jk" maxlength="1" required><br>
        Email: <input type="email" name="email" required><br>
        <button type="submit" name="insert">Insert</button>
    </form>

    <h2>Update Data</h2>
    <form method="POST" action="">
        NPM (to update): <input type="text" name="npm" required><br>
        Nama: <input type="text" name="nama" required><br>
        Alamat: <input type="text" name="alamat" required><br>
        Tanggal Lahir: <input type="date" name="tgl_lhr" required><br>
        Jenis Kelamin: <input type="text" name="jk" maxlength="1" required><br>
        Email: <input type="email" name="email" required><br>
        <button type="submit" name="update">Update</button>
    </form>

    <h2>Data Table</h2>
    <table>
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['npm'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['tgl_lhr'] . "</td>";
                echo "<td>" . $row['jk'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a href='?delete=" . $row['npm'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
