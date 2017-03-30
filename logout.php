<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/28/2017
 * Time: 11:32 AM
 */
session_start();
if (!isset($_SESSION['user'])) {
    header("location: index.php");
} else if (isset($_SESSION['user'])!="") {
    header("location: home.php");
}

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    session_unset();
    session_destroy();
    header("location: index.php");
    exit;
}