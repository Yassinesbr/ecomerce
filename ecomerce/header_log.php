<?php
include 'includes/dbh.inc.php';
?>

<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="main.css" type="text/css">
    <script src="main.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>




<body>
    <div id="navbar">
        <a href="index.php" id="logo">EniExpress</a>
        <div id="navbar-right">
            <a class="" id="" href="index.php">Home</a>
            <div class="dropdown">
                <a class="dropbtn"><?php echo $_SESSION['name'] ?></a>
                <div class="dropdown-content">
                    <a href="users.php">Gérer les comptes</a>
                    <a href="articles.php">Gérer les poduit</a>
                    <a href="includes/logout.inc.php">Logout</a>
                </div>
            </div>
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