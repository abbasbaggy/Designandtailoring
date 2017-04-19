<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 4/19/2017
 * Time: 3:12 PM
 */

require("../db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($con,"DELETE FROM comments WHERE id='$id'");
    header("location: cindex.php");
}
mysqli_close($con);
?>