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
    <style>
        body{
            background-color:rgb(192,192,192);opacity:0.9;
        }
    </style>
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
    $username = stripslashes($_REQUEST['username']); // removes backslashes
    $username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $pass = stripslashes($_REQUEST['password']);
    $password= hash(sha256, $pass);
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
        <h1><p><ins>Design and Tailoring</ins></p></h1>
        <h1>Registration</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" name="submit" value="Register" />
        </form>
        <p>registered <a href='login.php'>Login Here</a></p>

    </div>
<?php } ?>
</body>
</html>
