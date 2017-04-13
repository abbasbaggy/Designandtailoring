<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/30/2017
 * Time: 3:04 PM
 */



session_start();
if(session_destroy()) // Destroying All Sessions
{
    header("Location: login.php"); // Redirecting To Home Page
}
?>