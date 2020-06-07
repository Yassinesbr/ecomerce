<?php 

include_once 'includes/dbh.inc.php';

// $id = $_GET['a_id'];
if(isset($_GET['id'])){
    $id =  $_GET['id'];
}
    


 $sql = "DELETE FROM articles WHERE a_id = $id;";


 mysqli_query($conn, $sql);

 header("Location: articles.php?deleted=success");
