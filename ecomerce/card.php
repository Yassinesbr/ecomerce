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


<body id="top">
    <div id="main">
        <div class="inner">

            <!-- Boxes -->
            <div class="thumbnails">

                <?php
                $sql = "SELECT * FROM articles INNER JOIN ids ON articles.a_id = ids.articleId";
                $result = mysqli_query($conn, $sql);
                $queryResults = mysqli_num_rows($result);
                if ($queryResults > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
						<div class='box'>
						<a href='thearticle.php?id=" . $row['a_id'] . "' class='image fit'><img src='images/phone.jpg' /></a>
							<div class='inner'>
								<h3>" . $row['a_title'] . "</h3>
								<p>" . $row['a_date'] . "</p>
                                <p>" . $row['a_author'] . "</p>
                                <p>" . $row['articleQt'] . "</p>
								<a href='deletethis.php?id=" . $row['a_id'] . "&qt=" . $row['articleQt'] . "' class='button  fit'>Delete</a>
							</div>
						</div>
						";
                    }
                }

                ?>






            </div>

            <?php

            $sql = "SELECT * FROM ids";
            $result = mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);
            if ($queryResults > 0) {

                echo '<center><button style="width: 100px;" type="submit"><a href="deleteall.php">Buy</a></button></center>';
            } else {
                echo '<h1>cart is empty</h1>';
            }


            ?>




        </div>
    </div>
    <!-- <a href='' class='button  fit' >Watch</a> -->
</body>

</html>