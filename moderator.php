<?php
require_once("database.php");
$sql = "SELECT b.id AS 'book_id', b.title AS 'title',b.year  AS 'year'," .
    " g.title AS 'genre', a.name AS 'author', b.user_id AS 'user_id' " .
    "FROM books b LEFT JOIN genres g ON b.genre_id = g.id LEFT JOIN authors a" .
    " ON b.author_id=a.id";
$allBooks = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//die(var_dump($allBooks));

?>



<html>

<head>
    <title>Moderator</title>
    <link rel="stylesheet" href="styles.css" />
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
        <div class="addBook header-item"><a href="addBook.php">Dodaj knjigu<a></div>
        <div class="options header-item">Opcije</div>
    </div>

    <?php
    foreach ($allBooks as $book) {
        if (!isset($book['user_id'])) {
            $content = "<div class='row'>" .
                "<div class='title'> " . ucfirst($book['title']) .  "</div>" .
                "<div class='author'>" . $book['author'] . "</div>" .
                "<div class='year'>" . ucfirst($book['year']) . "</div>" .
                "<div class='genre'>" . ucfirst($book['genre']) . "</div>" .
                "<div class ='options'>" .
                "<div class='update-user-btn'><a href='update_book.php?id=" . $book['book_id'] . "'>Izmeni</a></div>" .
                "<div class='delete-user-btn'><a href='delete_book.php?id=" . $book['book_id'] . "'>Izbrisi</a></div>" .
                "</div>";
            $content .= " </div>";
            echo $content;
        }
    }
    ?>
</body>

</html>