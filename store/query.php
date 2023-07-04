<?php
// include("header.php");
session_start();
include("../darkpan/connection.php");

//login
if (isset($_POST['loginBtnStore'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $pdo->prepare('select * from login where email = :email && password = :password');
    $query->bindParam("email", $email);
    $query->bindParam("password", $password);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $_SESSION['id'] = $row['userId'];
        $_SESSION['name'] = $row['username'];
        $_SESSION['email'] = $row['email'];

        header("location:index.php");
    } else {
        echo "<script>alert('user not found')</script>";
    }
    ;
}
;


?>