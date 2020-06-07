<?php

session_start();

require_once("header.php");

unset($_SESSION["name"]);
unset($_SESSION["valid"]);
unset($_SESSION["admin"]);
unset($_SESSION["normal"]);

header('Refresh: 2; URL = ../index.php');

?>

<!DOCTYPE html>
<html>

<head>
  <title></title>
</head>


<body>
  <div style="margin-top:210px;padding:15px 15px 2500px;font-size:30px">
    <div class="out-box">
      <img src="logout.png" alt="" width="180" height="180">
      <h1 style="font-size:52px">You Have Been Logged Out</h1>
      <h4>Thank you for using our website</h4>
    </div>

  </div>

</body>

</html>