<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/25/2017
 * Time: 3:25 PM
 */
ob_start();
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['user']) ) {
    header("location: index.php");
    exit;
}
 //User logged in details
 $sql_query="SELECT * FROM users WHERE userId=".$_SESSION['user'];
$row =$link->query($sql_query);
$userRow=mysqli_num_rows($row);
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome - <?php echo $userRow['userEmail']; ?></title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootsrap.min.css" type="text/css"  />
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class ="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.codingcage.com">Coding cage</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html">Back to Article</a></li>
                <li><a href="http://www.codingcage.com/search/label/jQuery">jQuery</a></li>
                <li><a href="http://www.codingcage.com/search/label/PHP">PHP</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="fasle">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['userEmail']; ?>&nbsp;<span class ="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="logout.php?logout"><span class="glychicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                </ul>
               </li>
            </ul>
        </div><!--/.nav-collapse-->
    </div>
</nav>

<div id="wrapper">

    <div class="container">

        <div class="page-header">
            <h3>Coding Cage - Programming Blog</h3>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h1>Focuses on PHP, MySQL, Ajax, jQuery, Web Design and more...</h1>
            </div>
        </div>

    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>
