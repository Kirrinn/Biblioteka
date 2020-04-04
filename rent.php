<?php
session_start();
require_once("database.php");

$bookId = $_GET['id'];
$userId = null;

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
}

$sql = "UPDATE books SET user_id=? WHERE id=?";
$stm = $dbh->prepare($sql);
$stm->execute([$userId, $bookId]);
header("Location:books.php");
