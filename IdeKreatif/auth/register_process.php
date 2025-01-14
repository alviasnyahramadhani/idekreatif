<?php
require_once("config.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
$username = $_POST["username"];
$name = $_POST["name"];
$password = $_POST["password"];
$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, name, password)
VALUES ('$username', '$name', '$hashedpassword')";
if ($conn->query($sql) === TRUE) {
    $_SESSION['notification'] = [
        'type' => 'primary',
        'massage' => 'Registrasi Berhasil!'
    ];
} else {
    $_SESSION['notification'] = [
       'type' => 'danger',
       'massage' => 'Gagal registrasi: '  . mysqli_error($conn)
    ];
}
header('Location: Login.php');
exit();
}
$conn->close();
?>