<?php

include_once 'dbh.inc.php';


if(isset($_GET['id'])){
    $articleId =  $_GET['id'];
}

if(isset($_GET['qt'])){
    $atricleQt =  $_GET['qt'];

}




$sql = "INSERT INTO ids (articleId, articleQt)
                        VALUES('$articleId', '$atricleQt');";
                        
mysqli_query($conn, $sql);

header("Location: ../card.php?add=success");
