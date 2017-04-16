
<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/30/2017
 * Time: 3:01 PM
 */

session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); }
?>
