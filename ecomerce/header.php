<?php
include 'includes/dbh.inc.php';
?>


<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="main.css" type="text/css">
    <script src="main.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>



<html>

<body>
    <div id="navbar">
        <a href="index.php" id="logo">EniExpress</a>
        <div id="navbar-right">
            <a class="active" id="" href="index.php">Home</a>
            <a class="" id="" href="login.php">Login</a>
            <div class="searching">
                <form action="search.php" method="POST">
                    <input name="search" type="text" placeholder="Search.." class="ss">
                    <button type="submit" name="submit-search" class="nav-search"><i class='fas fa-search'></i></button>
                </form>
            </div>
        </div>
    </div>




</body>

</html>