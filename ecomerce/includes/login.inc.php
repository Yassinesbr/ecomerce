<?php
session_start();
include_once 'dbh.inc.php';

if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $usr = $_POST['username'];
    $pwd = $_POST['password'];


    $sql = "SELECT * FROM users WHERE user_uid='$usr' AND user_pwd = '$pwd';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $checkusr = strcmp($usr, "NiceBlue");
        $checkpwd = strcmp($pwd, "yassine@1997");
        if ($check || $checkpwd) {
            $_SESSION['valid'] = true;
            $_SESSION['name'] = $_POST['username'];
        } else {
            $_SESSION['admin'] = true;
            $_SESSION['valid'] = true;
            $_SESSION['name'] = $_POST['username'];
        }
    }
}

header("Location: ../index.php?login=success");
