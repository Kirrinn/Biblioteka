<?php
require_once("database.php");
$bookId = $_GET['id'];

$sql = "DELETE FROM books WHERE id=?";
$dbh->prepare($sql)->execute([$bookId]);
header("Location:index.php");
