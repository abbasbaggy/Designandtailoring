<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/30/2017
 * Time: 3:06 PM
 */


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php    ini_set('display_errors', 1);
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
    $username = stripslashes($_REQUEST['username']); // removes backslashes
    $username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);

    $trn_date = date("Y-m-d H:i:s");
    $query = "INSERT into `users2` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
    $result = mysqli_query($con,$query);
    if($result){
        echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
    }
}else{
    ?>
    <div class="form">
        <h1>Registration</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" name="submit" value="Register" />
        </form>

    </div>
<?php } ?>
</body>
</html>
