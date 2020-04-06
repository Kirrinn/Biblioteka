<?php
session_start();
//$_SESSION['greska_login'] = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="assets/styles.css" />
</head>

<body bgcolor="lightblue">
    <div class="main">

        <div class="signup-title">
            SIGN UP
        </div>

        <form class="signup-form" method="POST" action="addUser.php">
            <div class="form-item">
                <input type="text" name="username" autocomplete="off" placeholder="Enter your name" required />
            </div>

            <div class="form-item">
                <input type="password" name="pass" placeholder="Enter password" required />
            </div>
            <div class="form-item">
                <input type="password" name="repass" placeholder="Repeat password" required />
            </div>
            <div class="form-item">
                <input type="submit" value="Sign up" />
            </div>
        </form>
        <div class="back-btn-form">
            <div class="back-btn">
                <a href="index.php">
                    Cancel
                </a>
            </div>
        </div>


        <?php
        if (isset($_SESSION['greska_signup'])) {
            echo "<div class='login-error'>" .
                $_SESSION['greska_signup'] .
                "</div>";
        }
        ?>
    </div>

</body>

</html>