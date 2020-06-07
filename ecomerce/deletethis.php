<?php 

include_once 'includes/dbh.inc.php';

// $id = $_GET['a_id'];
if(isset($_GET['id'])){
    $id =  $_GET['id'];
}

if(isset($_GET['qt'])){
    $qt =  $_GET['qt'];
}
    


 $sql = "DELETE FROM ids WHERE articleId = $id AND articleQt = $qt;";


 mysqli_query($conn, $sql);

 header("Location: card.php?deleted=success");
