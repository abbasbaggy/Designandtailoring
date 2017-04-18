<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/31/2017
 * Time: 6:25 PM
 */
require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM new_record WHERE id=$id";
$result = mysqli_query($con,$query) or die ( mysqli_error());
$query2= "DELETE FROM tbl_files WHERE id=$id";
$result2= mysqli_query($con, $query2) or die (mysqli_error());
header("Location: view.php");
?>