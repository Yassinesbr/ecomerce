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

<!DOCTYPE html>
<html>


<head>
    <title>INDEX</title>

</head>



<body style="overflow: hidden; ">
    <div style="margin-top:210px;padding:15px 15px 2500px;font-size:20px">

        <form action="includes/addarticle.inc.php" method="POST">

            <div class="container-sign">
                <h2 style="text-align: center">Ajouter un article</h2>
                <p class="text" style="text-align: center; font-size:25px">Article Information </p>

                <p class="formfield">
                    <label for="">Title :</label><br>
                    <input type="text" placeholder="Title" class="textfield" name="title">
                </p>

                <p class="formfield">
                    <label for="">Your article :</label><br>
                    <textarea rows="10" cols="50" name="text" placeholder="Your article" style="resize: none;" class="longtextfield"></textarea>
                </p>

                <p class="formfield">
                    <label for="">Author :</label><br>
                    <input type="text" placeholder="Author" class="textfield" name="author">
                </p>



                <button class="sub-btn" type="submit" name="submitt">Ajouter</button>

        </form>

    </div>
    </div>

</body>

</html>