<?php
require_once("db/connection.php");
if (!isset($_SESSION)) {
    session_start();
}
$sqlQuery = "SELECT b.id AS 'id', b.title AS 'title', " .
    "b.year AS 'year', g.title AS 'genre', a.name AS 'author', " .
    "b.user_id AS 'book_user_id' " .
    "FROM  books b LEFT JOIN genres g on b.genre_id = g.id " .
    "LEFT JOIN authors a ON b.author_id = a.id WHERE b.user_id =" . $_SESSION['user_id'];

$stmt = $dbh->query($sqlQuery);
$allBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
//die(var_dump($allBooks));

?>

<html>

<head>
    <title>Biblioteka</title>
    <link rel="stylesheet" href="assets/styles.css" />
</head>

<body>
    <?php
    require_once("header.php");
    ?>
<div class="row header-row">
    <div class="title header-item">Naslov</div>
    <div class="author header-item">Autor</div>
    <div class="year header-item">Godina</div>
    <div class="genre header-item">Zanr</div>    
    <div class="options header-item">Opcije</div>
</div>
<?php
foreach ($allBooks as $knjiga) {
    $content = "<div class='row'>" .
        "<div class='title'> " . ucfirst($knjiga['title']) .  "</div>" .
        "<div class='author'>" . $knjiga['author'] . "</div>" .
        "<div class='year'>" . ucfirst($knjiga['year']) . "</div>" .
        "<div class='genre'>" . ucfirst($knjiga['genre']) . "</div>".
        "<div class='return-book-btn'><a href='handlers/return-book.php?id=".$knjiga['id']."' >Vrati</a></div>";        
        $content .= " </div>";
    echo $content;
}
?>
</body>

</html>