<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/30/2017
 * Time: 3:03 PM
 */


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<main>
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){

    $username = stripslashes($_REQUEST['username']); // removes backslashes
    $username = strip_tags($username);
    $username = htmlspecialchars($username);
    $username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
    $password = stripslashes($_REQUEST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);
    $password = mysqli_real_escape_string($con,$password);

    //Checking is user existing in the database or not
    $query = "SELECT * FROM `users2` WHERE username='$username' and password='".md5($password)."'";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    if($rows==1){
        $_SESSION['username'] = $username;
        header("Location: index.php"); // Redirect user to index.php
    }else{
        echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
    }

}

    elseif ($_POST['username'] && $_POST['password']) {
        $usernam = stripslashes($_REQUEST['username']); // removes backslashes
        $usernam = strip_tags($username);
        $usernam = htmlspecialchars($username);
        $usernam = mysqli_real_escape_string($con,$username); //escapes special characters in a string
        $passwor = stripslashes($_REQUEST['password']);
        $passwor = strip_tags($password);
        $passwor = htmlspecialchars($password);
        $passwor = mysqli_real_escape_string($con,$password);
        if ($usernam="Abbas" & $passwor="baggy") {

            $_SESSION['username'] = $usernam;
            header("location: admin/view.php");
        }
        }

else{
    ?>
    <div class="form">
        <h1>Log In</h1>
        <form action="" method="post" name="login">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input name="submit" type="submit" value="Login" />
        </form>
        <p>Not registered yet? <a href='registration.php'>Register Here</a></p>

    </div>
<?php } ?>

</main>
</body>
</html>
