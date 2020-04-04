<?php
session_start();
require_once("database.php");



$username =  $_POST['username'];
$pass = $_POST['pass'];
$repass = $_POST['repass'];


$sqlQuery = "SELECT * FROM users WHERE name='" . $username .
    "' AND password = '" . $pass . "'";

$stmt = $dbh->query($sqlQuery);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    if ($pass == $repass) {
        $req = "INSERT INTO  users (  name, password, role_id) VALUES (?,?,?)";
        $dbh->prepare($req)->execute([$username, $pass, '2']);
        $_SESSION['greska_signup'] = null;
        header("Location: index.php");
    } else {
        $_SESSION['greska_signup'] = "Sifre nisu iste";
        $_SESSION['greska_login'] = null;
        header("Location: signupPage.php");
    }
} else {
    $_SESSION['greska_signup'] = "Korisnik sa istim imenom i sifrom postoji";
    $_SESSION['greska_login'] = null;
    header("Location: signupPage.php");
}
