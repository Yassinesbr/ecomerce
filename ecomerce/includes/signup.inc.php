<?php



include_once 'dbh.inc.php';

$first = mysqli_real_escape_string($conn, $_POST['first']);
$last = mysqli_real_escape_string($conn, $_POST['last']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd)
                        VALUES('$first', '$last', '$email', '$uid', '$password');";

mysqli_query($conn, $sql);

header("Location: ../login.php?signup=success");
