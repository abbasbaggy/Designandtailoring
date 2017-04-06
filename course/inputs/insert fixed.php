<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 4/2/2017
 * Time: 12:29 AM
 */

require('../db.php');
include("../auth.php");
$status = "";

    if (isset($_POST['new']) && $_POST['new'] == 1) {
        $trn_date = date("Y-m-d H:i:s");
        $name = $_REQUEST['burst'];
        $age = $_REQUEST['age'];
        $submittedby = $_SESSION["username"];
        $ins_query = "insert into new_record
    (`trn_date`,`name`,`age`,`submittedby`)values
    ('$trn_date','$name','$age','$submittedby')";
        mysqli_query($con, $ins_query) or die(mysqli_error());
        $status = "New Record Inserted Successfully.
    </br></br><a href='../view.php'>View Inserted Record</a>";
    }

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>Insert New Measurement</title>
    <link rel="stylesheet" href="../css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<header>
    <h2> Sample for header</h2>
</header>
<body>
<div class="form-inline">
    <p><a href="../dashboard.php">Dashboard</a>
        | <a href="../view.php">View Records</a>
        | <a href="../logout.php">Logout</a></p>
    <div class="form-group">
        <h1>Please Insert Your Measurements</h1>
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <p><input type="text" name="Burst" placeholder="Enter Burst size " checked /></p>
            <p><input type="text" name="Waist" placeholder="Enter Waist size" required /></p>
            <p><input type="text" name="Hips" placeholder="Enter Hips size" required /></p>
            <p><input type="text" name="backWidth" placeholder="Enter back width" required /></p>
            <p><input type="text" name="FrontChest" placeholder="Enter Front Chest" required /></p>
            <p><input type="text" name="Shoulder" placeholder="Enter Shoulder size"  /></p>
            <p><input type="text" name="NeckSize" placeholder="Enter Necksize" required /></p>
            <p><input type="text" name="Sleeve" placeholder="Enter Sleeve size" required /></p>
            <p><input type="text" name="UnderBusrt" placeholder="Under bust size" required /></p>
            <p><input type="text" name="Wrist" placeholder="Enter Wrist size" required /></p>
            <p><input type="text" name="UpperArm" placeholder="Enter Upper Arm size" required /></p>
            <p><input type="text" name="Calf" placeholder="Enter Calf size" required /></p>
            <p><input type="text" name="Ankle" placeholder="Enter Ankle size" required /></p>
            <p><input type="text" name="NapeWaist" placeholder="Enter Nape to waist size" required /></p>
            <p><input type="text" name="WaistHip" placeholder="Enter Waist to Hip size" required /></p>
            <p><input type="text" name="shoulderWaist" placeholder="Enter Front shoulder to waist" required /></p>
            <p><input type="text" name="outsideLeg" placeholder="Enter outside leg size" required /></p>
            <p><input type="text" name="insideLeg" placeholder="Enter inside leg size" required /></p>
            <p><input name="submit" type="submit" value="Submit" /></p>
        </form>
        <p style="color:#FF0000;"><?php echo $status; ?></p>
    </div>
</div>
</body>
</html>