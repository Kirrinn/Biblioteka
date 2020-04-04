<?php
require_once("database.php");
$bookId = $_GET['id'];

$sql = "SELECT b.title AS 'title',b.year AS 'year', g.title AS 'genre',".
" a.name AS 'author', b.genre_id AS 'genre_id',".
"b.author_id AS 'author_id' FROM books b LEFT JOIN ".
"genres g ON b.genre_id = g.id".
" LEFT JOIN authors a ON b.author_id=a.id WHERE b.id=" . $bookId;
$stmt = $dbh->query($sql);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

$genresSql = "SELECT * FROM genres";
$genres = $dbh->query($genresSql)->fetchAll(PDO::FETCH_ASSOC);

$authorsSql = "SELECT * FROM authors";
$authors = $dbh->query($authorsSql)->fetchAll(PDO::FETCH_ASSOC);

?>

<html>

<head>
    <title>Update book</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <?php
    require_once("header.php");
    ?>
    <form action="save_book.php" method="POST">
        <div class="form-item">
            <input type="text" name="title" value="<?php echo $book['title'] ?>">
        </div>
        <div class="form-item">
            <input type="text" name="year" value="<?php echo $book['year'] ?>">
        </div>

        <input type="hidden" name="id" value="<?php echo $bookId ?>">

        <div class="form-item">
            <select name="genre">
                <?php
                foreach ($genres as $genre) {
                    $option = "<option value=" . $genre['id'];
                    if ($genre['id'] == $book['genre_id']) {
                        $option .= " selected";
                    }
                    $option .= ">" . $genre['title'] . "</option>";
                    echo $option;
                }
                ?>
            </select>
        </div>

        <div class="form-item">
            <select name="author">
                <?php
                foreach ($authors as $author) {
                    $option = "<option value=" . $author['id'];
                    if ($author['id'] == $book['author_id']) {
                        $option .= " selected";
                    }
                    $option .= ">" . $author['name'] . "</option>";
                    echo $option;
                }
                ?>
            </select>
        </div>

        <div class="form-item">
            <input type="submit" value="Sacuvaj">
        </div>

    </form>
</body>

</html>