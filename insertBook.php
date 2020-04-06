<?php

require_once("db/connection.php");

$bookName = $_POST['bookName'];
$bookYear = $_POST['bookYear'];

//text Box values for adding 
$genreNameText = $_POST['genreName'];
$authorNameText = $_POST['authorName'];

//if these fields are empty
//genre adding
if($genreNameText != "")
{   
    //insert genre into table of genres
    $addGenreSql = "INSERT INTO genres (title) VALUES (?)";
    $dbh ->prepare($addGenreSql)->execute([$genreNameText]);
    //get genre id
    $getGenreSql = "SELECT id FROM genres WHERE title='".$genreNameText."'";
    $data = $dbh ->query($getGenreSql)->fetch(PDO::FETCH_ASSOC);
    $genreId =$data['id'];
}else
{
    $genreId=$_POST['genre'];
}

if($authorNameText != "")
{   
    //insert author into table of genres
    $addAuthorSql = "INSERT INTO  authors (name) VALUES (?)";
    $dbh ->prepare($addAuthorSql )->execute([$authorNameText]);
    ///get author id
    $getAuthorSql = "SELECT id FROM authors WHERE name='".$authorNameText."'";
    $data = $dbh ->query($getAuthorSql)->fetch(PDO::FETCH_ASSOC);
    $authorId =$data['id'];
}else
{
    $authorId=$_POST['author'];
}

$addSQL = "INSERT INTO books(title, year, genre_id, author_id) VALUES(?,?,?,?)";
$dbh->prepare($addSQL)->execute([$bookName,$bookYear,$genreId,$authorId]);
header("Location:index.php");
//dodaje knjigu

