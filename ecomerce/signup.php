<?php

require_once("header.php");

$firstErr = $lastErr = $emailErr = $userErr = $passErr = $done = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $done = "";

    if (empty($_POST["first"])) {
      $firstErr = "*Name is required";
    } else {
      $first = test_input($_POST["first"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$first)) {
        $nameErr = "*Only letters and white space allowed";
      }
    }
    
    if (empty($_POST["last"])) {
      $lastErr = "*last name is required";
    } else {
      $last = test_input($_POST["last"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$last)) {
        $lastErr = "*Only letters and white space allowed";
      }
    }
      
    if (empty($_POST["email"])) {
      $emailErr = "email is required";
    } 
    
  
    if (empty($_POST["uid"])) {
      $userErr = "*username is required";
    }
  
    if (empty($_POST["password"])) {
      $passErr = "*password is required";
    }
    if($firstErr =="" && $lastErr =="" && $emailErr =="" && $userErr =="" &&  $passErr =="" ) {
        $done = "ok";
    }
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if($done == "ok" ) {
    include_once 'includes/dbh.inc.php';

$first = mysqli_real_escape_string($conn, $_POST['first']);
$last = mysqli_real_escape_string($conn, $_POST['last']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd)
                        VALUES('$first', '$last', '$email', '$uid', '$password');";

mysqli_query($conn, $sql);
$firstErr = $lastErr = $emailErr = $userErr = $passErr = $done = "";
header("Location: login.php?signup=success");

}




?>

<!DOCTYPE html>
<html>


<head>
    <title>INDEX</title>
    <style>
.error {color: #ff3333;}
</style>

</head>



<body style="overflow: hidden; ">
    <div style="margin-top:100px;padding:15px 15px 2500px;font-size:20px">

        <form action="" method="POST">

            <div class="container-sign">
                <h2 style="text-align: center">Sign up</h2>
                <p class="text" style="text-align: center; font-size:25px">Account Information </p>

                <p class="formfield">
                    <label for="">First name :</label><br>
                    <input type="text" placeholder="First name" class="textfield" name="first">
                    <span class="error"> <?php echo $firstErr;?></span>
                </p>

                <p class="formfield">
                    <label for="">Last name :</label><br>
                    <input type="text" placeholder="Last name" class="textfield" name="last">
                    <span class="error"> <?php echo $lastErr;?></span>
                </p>

                <p class="formfield">
                    <label for="">Email :</label><br>
                    <input type="text" placeholder="Email" class="textfield" name="email">
                    <span class="error"> <?php echo $emailErr;?></span>
                </p>

                <p class="formfield">
                    <label for="">Username :</label><br>
                    <input type="text" placeholder="Username" class="textfield" name="uid">
                    <span class="error"> <?php echo $userErr;?></span>
                </p>

                <p class="formfield">
                    <label for="">Password :</label><br>
                    <input type="password" placeholder="Password" class="textfield" name="password">
                    <span class="error"> <?php echo $passErr;?></span>
                </p>


                <button class="sub-btn" type="submit" name="submit">Sign up</button>

        </form>

    </div>
    </div>

</body>

</html>

