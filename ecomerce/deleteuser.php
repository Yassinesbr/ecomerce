<?php

include_once 'includes/dbh.inc.php';

// $id = $_GET['a_id'];
if (isset($_GET['id'])) {
    $id =  $_GET['id'];
}



$sql = "DELETE FROM users WHERE user_id = $id;";


mysqli_query($conn, $sql);

header("Location: users.php?deleted=success");
