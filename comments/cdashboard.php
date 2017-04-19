<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/30/2017
 * Time: 3:02 PM
 */

/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/

require('../db.php');
include("../auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Exclusive fashion- ur logged in</title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
<div class="navbar-header">
    <a class="navbar-brand" href="../index.php">Tailoring Design</a>
</div>
<ul class="nav navbar-nav">
    <li class="active"><a href="../index.php">Home</a></li>
    <li><a href="../insert.php">Make Order</a></li>
    <li><a href="../view.php">View Your Order</a></li>
    <li><a href="../uploadcheck.php">uploadcheck</a></li>
    <li><a href="cindex.php">commnents blog</a></li>

</ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username']; ?></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>

</div>

    </nav>
</header>
</body>
</html>
