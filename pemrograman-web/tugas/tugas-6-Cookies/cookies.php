<?php
// Set cookie bernama "user" dengan nilai "Rantizi", berlaku selama 30 hari
$cookie_name = "user";
$cookie_value = "Rantizi";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 detik = 1 hari
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cookies Example</title>
</head>
<body>
<?php

if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie bernama '" . $cookie_name . "' belum diatur!";
} else {
    echo "Cookie '" . $cookie_name . "' sudah diatur!<br>";
    echo "Nilainya adalah: " . $_COOKIE[$cookie_name];
}
?>
<p><strong>Note:</strong> Muat ulang halaman untuk melihat nilai cookie.</p>
</body>
</html>
