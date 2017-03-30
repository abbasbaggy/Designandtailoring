<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/28/2017
 * Time: 11:31 AM
 */
ob_start();
session_start();
if ( isset($_SESSION['user'])!=""){
    header("location: home.php");
}
include_once 'db_connect.php';

$error = false;

if ( isset($_POST['btn-signup']) ) {

    //prevent sql injection
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    //form validation
    if (empty($name)) {
        $error = true;
        $nameerror = "Please enter you full name.";
    } elseif (strlen($name) < 3) {
        $error = true;
        $nameError = "Name must have atleast 3 characters.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $nameError = "Name must contain alphabets and space.";
    }

    //email valivation
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error = true;
            $emailError = "Please enter valid email address.";
    } else {
        //check email
        $sql_query = "SELECT userEmail FROM users WHERE userEmail ='$email'";
        $result = $link->query($sql_query);
        $count = $result->num_rows;
        if($count!=0){
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }
    //paas validation
    if (empty($pass)){
        $error = true;
        $passError = "Please enter password";
    } elseif(strlen($pass) < 6) {
        $error = true;
        $passError = "password must have atleast 6 characters.";
    }

    //pass encryption
    $password = $pass;

    //no erro continue
}if (!$error) {

    $sql_query = "INSERT INTO users(userName,userEmail,userPass) VALUES ('$name','$email','$password')";
    $result =  $link->query($sql_query);

    if ($result) {
        $errTyp = "success";
        $errMSG = "Successfully registered, you may login now";
        unset($name);
        unset($email);
        unset($pass);
    }     else {
        $errTyp = "Trouble";
        $errMSG = "issues, under going sorting, try again in a bit";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Exculsive Fashion</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css"  />
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

    <div id="login-form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 class="">Sign Up.</h2>
                </div>

                <div class="form-group">
                    <hr />
                </div>

                <?php
                if ( isset($errMSG) ) {

                    ?>
                    <div class="form-group">
                        <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                    </div>
                    <span class="text-danger"><?php echo $nameError; ?></span>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                    </div>
                    <span class="text-danger"><?php echo $emailError; ?></span>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                    </div>
                    <span class="text-danger"><?php echo $passError; ?></span>
                </div>

                <div class="form-group">
                    <hr />
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
                </div>

                <div class="form-group">
                    <hr />
                </div>

                <div class="form-group">
                    <a href="index.php">Sign in Here...</a>
                </div>

            </div>

        </form>
    </div>

</div>

</body>
</html>
<?php ob_end_flush(); ?>


