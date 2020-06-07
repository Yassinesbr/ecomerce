<?php 

include_once 'includes/dbh.inc.php';



 $sql = "DELETE FROM ids;";


 mysqli_query($conn, $sql);

 header("Location: index.php?all=success");
