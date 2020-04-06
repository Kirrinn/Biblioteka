<?php
session_start();

if (isset($_SESSION['logged_in']) && isset($_SESSION['role_id'])) {
    $role = $_SESSION['role_id'];

    switch ($role) {
        case 1:
            header("Location: admin.php");
            break;
        case 2:
            header("Location: books.php");
            break;
        case 3:
            header("Location: moderator.php");
            break;
        default:
            break;
    }
}
?>

<html>

<head>
    <title>Biblioteka</title>
    <link rel="stylesheet" href="assets/styles.css" />
</head>

<body bgcolor="lightblue">

    <div class="main">
        <div class="login-title">
            LOGIN
        </div>
        <form class="login-form" method="POST" action="handlers/login.php">
            <div class="form-item">
                <input type="text" name="username" autocomplete="off" placeholder="Enter your name" />
            </div>

            <div class="form-item">
                <input type="password" name="pass" placeholder="Enter password" />
            </div>
            <div class="form-item">
                <input type="submit" value="Login" />
            </div>
        </form>
        <div class="signup-btn-form">
            <div class="signup-btn">
                <a href="signup-page.php">Sign up</a>
            </div>
        </div>

    </div>
    <?php
    if (isset($_SESSION['greska_login'])) {
        echo "<div class='login-error'>" .
            $_SESSION['greska_login'] .
            "</div>";
    }
    ?>


</body>

</html>