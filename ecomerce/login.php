<?php

require_once("header.php");

$userErr = $passErr = $done = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $done = "";
    
  
    if (empty($_POST["username"])) {
      $userErr = "*username is required";
    }
  
    if (empty($_POST["password"])) {
      $passErr = "*password is required";
    }
    if($userErr =="" &&  $passErr =="" ) {
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
    session_start();
    include_once 'includes/dbh.inc.php';
    
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $usr = $_POST['username'];
        $pwd = $_POST['password'];
    
    
        $sql = "SELECT * FROM users WHERE user_uid='$usr' AND user_pwd = '$pwd';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $checkusr = strcmp($usr, "NiceBlue");
            $checkpwd = strcmp($pwd, "yassine@1997");
            if ($check || $checkpwd) {
                $_SESSION['valid'] = true;
                $_SESSION['name'] = $_POST['username'];
            } else {
                $_SESSION['admin'] = true;
                $_SESSION['valid'] = true;
                $_SESSION['name'] = $_POST['username'];
            }
        }
    }
    
    header("Location: index.php?login=success");

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



<body style="overflow: hidden;">
    <div style="margin-top:210px;padding:15px 15px 2500px;font-size:20px">

        <div class="container">
            <h2>Login</h2>
            <p class="text">Enter your username and password below to access your account</p>

            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" placeholder="Username" class="log" name="username"></td>
                        <span class="error"> <?php echo $userErr;?></span>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td><input type="password" placeholder="Password" class="log" name="password"></td>
                        <span class="error"> <?php echo $passErr;?></span>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <button class="log-btn" type="submit" name="login">Login</button>
                        </td>
                    </tr>

                </table>
            </form>

            <p> <span style="font-weight: bolder;"> Not a member yet ? You are SO missing out!</span> <a href="signup.php" class="click">Click here</a> to sign up</p>
        </div>
    </div>

</body>

</html>