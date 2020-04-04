<?php

require_once("database.php");

$userId = $_GET['id'];


$check = "SELECT b.title AS 'title', u.name as 'user' FROM books b LEFT JOIN users u ON b.user_id = u.id WHERE u.id=" . $userId;

$userExists = $dbh->query($check)->fetchAll(PDO::FETCH_ASSOC);

//die(var_dump($userExists));

if (!$userExists) {
    $sql = "DELETE FROM USERS WHERE id=?";
    $dbh->prepare($sql)->execute([$userId]);
    header("Location:index.php");
} else { 
   echo '<script type="text/javascript">
        alert("Korisnik poseduje knjigu");
        window.location.replace("http://localhost/biblioteka2.1/admin.php");
    </script>';
    
}