<?php

include_once 'dbh.inc.php';

$title = mysqli_real_escape_string($conn, $_POST['title']) ;
$text = mysqli_real_escape_string($conn,$_POST['text']);
$author = mysqli_real_escape_string($conn,$_POST['author']);
$date = date("Y-m-d h:i:s");

$sql = "INSERT INTO articles (a_title, a_txt, a_author, a_date)
                        VALUES('$title', '$text', '$author', '$date');";
                        
mysqli_query($conn, $sql);

header("Location: ../articles.php?adding=success");