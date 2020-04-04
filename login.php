<?php
session_start();
require_once("database.php");

$username = $_POST['username'];
$password = $_POST['pass'];

$sqlQuery = "SELECT * FROM users WHERE name='" . $username .
    "' AND password = '" . $password . "'";

$stmt = $dbh->query($sqlQuery);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $_SESSION['logged_in'] = true;
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['role_id'] = $user['role_id'];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['greska_login'] = null;
    header("Location: books.php");
} else {
    $_SESSION['greska_login'] = "Pogresni kredencijai";
    header("Location: index.php");
}
