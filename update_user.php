<?php
require_once("db/connection.php");
$userId = $_GET['id'];

$sql = "SELECT users.name, users.password, users.role_id, roles.title FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE users.id = " . $userId;
$stmt = $dbh->query($sql);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
//die(var_dump($user));
$roleSql = "SELECT * FROM roles";
$res = $dbh->query($roleSql);
$roles = $res->fetchAll(PDO::FETCH_ASSOC);
?>

<html>

<head>
    <title>Update user</title>
    <link rel="stylesheet" href="assets/styles.css" />
</head>

<body>
    <?php
    require_once("header.php");
    ?>
    <form action="save_user.php" method="POST">
        <div class="form-item">
            <input type="text" name="ime" value="<?php echo $user['name'] ?>">
        </div>
        <div class="form-item">
            <input type="text" name="pass" value="<?php echo $user['password'] ?>">
        </div>

        <input type="hidden" name="id" value="<?php echo $userId ?>">
        
        <div class="form-item">
            <select name="rola">
                <?php
                    foreach($roles as $role)
                    {
                        $option = "<option value=".$role['id'];
                        if ($role['id'] == $user['role_id'] ) {
                            $option .= " selected";
                        }
                        $option .= ">" .$role['title']. "</option>";
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