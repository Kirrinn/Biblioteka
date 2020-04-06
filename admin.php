<?php
require_once("db/connection.php");

$sql = "SELECT users.name, users.password, roles.title,users.id FROM users LEFT JOIN roles ON users.role_id = roles.id";
$stmt = $dbh->query($sql);
$allUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
//die(var_dump($allUsers));
?>

<html>

<head>
    <title>Admin</title>
    <link rel="stylesheet" href="assets/styles.css" />
</head>

<body>
    <?php
    require_once("header.php");
    ?>

    <div class="row header-row">
        <div class="name header-item">Ime</div>
        <div class="password header-item">Password</div>
        <div class="role header-item">Role</div>
        <div class="options header-item">Opcije</div>
    </div>
    <?php
    foreach ($allUsers as $user) {
        $content = "<div class='row'>" .
            "<div class='name'> " . ucfirst($user['name']) .  "</div>" .
            "<div class='password'>" . $user['password'] . "</div>" .
            "<div class='role'>" . ucfirst($user['title']) . "</div>" .
            "<div class ='options'>" .
            "<div class='update-user-btn'><a href='update_user.php?id=" . $user['id'] . "'>Izmeni</a></div>" .
            "<div class='delete-user-btn'><a href='delete_user.php?id=" . $user['id'] . "'>Izbrisi</a></div>" .
            "</div>";

        $content .= " </div>";
        echo $content;
    }
    ?>
</body>

</html>