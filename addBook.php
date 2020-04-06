<?php
require_once("db/connection.php.php");

$genresSql = "SELECT * FROM genres";
$genres = $dbh->query($genresSql)->fetchAll(PDO::FETCH_ASSOC);

$authorsSql = "SELECT * FROM authors";
$authors = $dbh->query($authorsSql)->fetchAll(PDO::FETCH_ASSOC);


?>



<html>

<head>
    <title>Add book</title>
    <link rel="stylesheet" href="assets/styles.css" />
</head>

<body>
    <?php
    require_once("header.php");
    ?>

    <form action="handlers/insert-book.php" method="POST">
        <div class="form-item">
            Naziv knjige
            <input type="text" name="bookName" required autocomplete="off"> 
        </div>
        <div class="form-item">
            Godina izdanja:
            <input type="text" name="bookYear" required autocomplete="off"> 
        </div>
        <div class="form-item">
            Izaberite zanr ili ga upisite ako nije naveden:
            <select name="genre">
                <?php
                foreach ($genres as $genre) {
                    $option = "<option value=" . $genre['id'];
                    $option .= ">" . $genre['title'] . "</option>";
                    echo $option;
                }
                ?>
            </select>
            <input type="text" name="genreName">
        </div>

        <div class="form-item">
            Izaberite autora ili ga upisite ako nije naveden:
            <select name="author">
                <?php
                foreach ($authors as $author) {
                    $option = "<option value=" . $author['id'];
                    $option .= ">" . $author['name'] . "</option>";
                    echo $option;
                }
                ?>
            </select>
            <input type="text" name="authorName">
        </div>

        <div class="form-item">
            <input type="submit" value="Sacuvaj">
        </div>

    </form>

</body>

</html>