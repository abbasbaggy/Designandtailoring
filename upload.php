<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 4/7/2017
 * Time: 10:44 PM
 */
include "db.php";
include "auth.php";

$username = $_SESSION["username"];
//check if form is submitted
if (isset($_POST['submit']))
{
    $filename = $_FILES['file1']['name'];

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['png', 'jpg','JPG', 'jpeg',  'gif'];

        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from tbl_files';
            $result = mysqli_query($con, $sql);
            if (count($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['id']+1) . '-' . $filename;
            }
            else
                $filename = '1' . '-' . $filename;

            //set target directory
            $path = 'upload/';

            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));

            // insert file details into database
            $sql = "INSERT INTO tbl_files(filename, created, username) VALUES('$filename', '$created', '$username')";
            mysqli_query($con, $sql);
            header("Location: uploadcheck.php?st=success");
        }
        else
        {
            header("Location: uploadcheck.php?st=error");
        }
    }
    else
        header("Location: uploadcheck.php");
}
?>