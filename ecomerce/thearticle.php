<?php

session_start();


if (isset($_SESSION['admin']) && isset($_SESSION['valid'])) {
    require_once("header_log.php");
} elseif (isset($_SESSION['valid'])) {
    require_once("header_normal.php");
} else {
    require_once("header.php");
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Full Motion</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="maincard.css" />
</head>
<div style="margin: 100px;"></div>

</div>

<body id="top">
    <div id="main">
        <div class="inner">

            <!-- Boxes -->
            <div class="thumbnails">
                <div class='box'>
                    <a class='image fit'><img src='images/phone.jpg' /></a>

                </div>


                <?php
                if (isset($_GET['id'])) {
                    $id =  $_GET['id'];
                }
                $sql = "SELECT * FROM articles WHERE a_id='$id'";
                $result = mysqli_query($conn, $sql);
                $queryResults = mysqli_num_rows($result);

                if ($queryResults > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "
                                            <div class='box'>
                                                <div class='inner'>
                                                    <h3>" . $row['a_title'] . "</h3>
                                                    <p>" . $row['a_txt'] . "</p>
                                                    <p>" . $row['a_author'] . "</p>
                                                    <p>" . $row['a_date'] . "</p>
                                                    <form action='includes/cart.inc.php' method='get'>
                                                    <input type='number' name='qt' class='ss' placeholder='Quantité'>
                                                    <input type='hidden'  name='id' value=" . $row['a_id'] . ">
                                                    <div style='margin: 15px;' ></div>
                                                    <button type='submit' class='button fit'>Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                            ";
                    }
                }
                ?>
            </div>

        </div>
    </div>
</body>

</html>