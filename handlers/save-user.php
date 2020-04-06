<?php
require_once("../db/connection.php");
//var_dump($_POST);
$userId = $_POST['id'];
$userName = $_POST['ime'];
$userPass = $_POST['pass'];
$userRole = $_POST['rola'];
/*
var_dump($userId);
var_dump($userName);
var_dump($userPass);
var_dump($userRole);
*/

$sql = "UPDATE users SET name=?, password=?, role_id=? WHERE id=?";
$stmt = $dbh->prepare($sql);
$stmt->execute([$userName,$userPass,$userRole,$userId]);

header("Location:../index.php");
//TODO:
// 1. Get data from POST
// 2. Save it into DB
// 3. Redirection to index.php
