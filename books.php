<?php
require_once("header.php");
require_once("db/connection.php");

$sqlQuery = "SELECT b.id AS 'id', b.title AS 'title', " .
    "b.year AS 'year', g.title AS 'genre', a.name AS 'author', " .
    "b.user_id AS 'book_user_id' " .
    "FROM  books b LEFT JOIN genres g on b.genre_id = g.id " .
    "LEFT JOIN authors a ON b.author_id = a.id ";

$stmt = $dbh->query($sqlQuery);
$allBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>

<head>
    <title>Biblioteka</title>
    <link rel="stylesheet" href="assets/styles.css" />
</head>

<body>
</body>
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
        "<div class='genre'>" . ucfirst($knjiga['genre']) . "</div>";
        if ($knjiga['book_user_id']) {
            $content .="<div class='busy'>Izdata</div>";
        } else {
            $content .= "<div class='rent'> <a href='handlers/rent.php?id=" . $knjiga['id'] . "'>Iznajmi</a>" . "</div>";
        }
        
        $content .= " </div>";
    echo $content;
}
?>

</html>
