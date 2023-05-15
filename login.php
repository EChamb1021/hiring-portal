<?php

try {
    $pdo = new PDO('sqlite:hiring_portal_db');
}
catch (PDOException $err) {
    die("Error connecting to database.");
}


$username = $_POST['username'];
$password = sha1($_POST['password']);

$user = $pdo->query("SELECT * FROM users WHERE username='{$username}' AND password='{$password}'");
$user = $user->fetch();

if(!$user){
    header("Location: index.php?err=1");
}
else{
    session_start();
    $_SESSION['user'] = $user['username'];
    header("Location: application.php");
}





