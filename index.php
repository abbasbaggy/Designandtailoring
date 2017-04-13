<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/30/2017
 * Time: 2:58 PM
 */

/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/

include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome Exclusive Fashion</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<header>
    <?php include ("dashboard.php"); ?>
</header>
<main>
<div class="form">
    <h1><p>Welcome <?php echo $_SESSION['username']; ?>!</p></h1>
    <h2><p>Exclusive Fashion for your self</p></h2>



</div>
</main>
</body>
</html>
