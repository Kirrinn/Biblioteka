<?php 
require_once("db/connection.php");

$title = $_POST['title'];
$year = $_POST['year'];
$bookId = $_POST['id'];
$genre = $_POST['genre'];
$author = $_POST['author'];

$sql = "UPDATE books SET title=?, year=?, genre_id=?, author_id=? WHERE id=?";
$stmt = $dbh->prepare($sql);
$stmt->execute([$title, $year, $genre, $author, $bookId]);

header("Location:index.php");
