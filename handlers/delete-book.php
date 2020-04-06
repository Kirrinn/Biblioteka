<?php
require_once("../db/connection.php");
$bookId = $_GET['id'];

$sql = "DELETE FROM books WHERE id=?";
$dbh->prepare($sql)->execute([$bookId]);
header("Location: ../index.php");
