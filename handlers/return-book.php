<?php


require_once("../db/connection.php");

$bookId = $_GET['id'];
$userId = null;

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
}

$sql = "UPDATE books SET user_id=null WHERE id=?";
$stm = $dbh->prepare($sql);
$stm->execute([$bookId]);
header("Location:../profile.php");
