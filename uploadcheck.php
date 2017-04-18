<?php
include_once 'db.php';
include 'auth.php';

$username = $_SESSION['username'];

// fetch files
$sql = "select filename from tbl_files WHERE username = '$username'";
$result = mysqli_query($con, $sql);

if (!isset($_GET['delete_id'])){
    $imagedir= $row['filename'];

    $sql="delete from tbl_files Where filname ='$imagedir' AND usename='$username'";
    $resu= mysqli_query($con, $sql);

}

?>


<!DOCTYPE html>
<html>
<head>
    <title>picture upload</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <?php include ("dashboard.php"); ?>
</header>
<main>
<br/>
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 well">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <legend>Select File to Upload:</legend>
                <div class="form-group">
                    <input type="file" name="file1" />
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Upload and Continue" class="btn btn-info"/>
                </div>
                <?php if(isset($_GET['st'])) { ?>
                    <div class="alert alert-danger text-center">
                        <?php if ($_GET['st'] == 'success') {
                            echo "File Uploaded Successfully!";
                        }
                        else
                        {
                            echo 'Invalid File Extension!';
                        } ?>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>


</div>
</main>
</body>
</html>