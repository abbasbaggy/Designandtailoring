<?php  ini_set('display_errors', 1);
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 4/2/2017
 * Time: 12:29 AM
 */

require('db.php');
include("auth.php");
$status = "";

    if (isset($_POST['new']) && $_POST['new'] == 1) {
        $trn_date = date("Y-m-d H:i:s");
        $idname= $_REQUEST['idname'];
        $burst = $_REQUEST['Burst'];
        $waist = $_REQUEST['Waist'];
        $hips = $_REQUEST['Hips'];
        $backWidth = $_REQUEST['backWidth'];
        $frontChest = $_REQUEST['frontChest'];
        $shoulder = $_REQUEST['Shoulder'];
        $neck = $_REQUEST['Neck'];
        $sleeve = $_REQUEST['Sleeve'];
        $underBurst = $_REQUEST['underBurst'];
        $wristt = $_REQUEST['Wrist'];
        $upperArm = $_REQUEST['upperArm'];
        $calf = $_REQUEST['Calf'];
        $ankle = $_REQUEST['Ankle'];
        $napeWaist = $_REQUEST['napeWaist'];
        $waistHip = $_REQUEST['waistHip'];
        $shoulderWaist = $_REQUEST['shoulderWaist'];
        $outsideLeg = $_REQUEST['outsideLeg'];
        $insideLeg = $_REQUEST['insideLeg'];

        $submittedby = $_SESSION["username"];
        $ins_query = "insert into new_record
    (`trn_date`,`idname`,`burst`,`waist`,`hips`,`backwidth`,`frontchest`,`shoulder`,`neck`,`sleeve`,`underburst`,`wrist`,`upperarm`,`calf`,`ankle`,`napewaist`,`waisthip`,`shoulderwaist`,`outsideleg`,`insideleg`,`submittedby`)values
    ('$trn_date','$idname','$burst','$waist','$hips','$backWidth','$frontChest','$shoulder','$neck','$sleeve','$underBurst','$wristt','$upperArm','$calf','$ankle','$napeWaist','$waistHip','$shoulderWaist','$outsideLeg','$insideLeg','$submittedby')";
        mysqli_query($con, $ins_query) or die(mysqli_error());
        $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
    }


?>
<?php

include ('dashboard.php');
?>
<body>
<main>


    <div class="container">
        <h1>Please Enter Your Measurements</h1>

        <p style="color:#FF0000;"><?php echo $status; ?></p>

        <form class="form-inline" name="form" method="post" action="">
           <div class="form-group">
               <img src="css/measurementchart2.jpg" class="img-thumbnail" width="350" height="275">

               <div class="form-group" name="form2" method="" action="">
                   <label for="idname">Please Label your order</label>
                   <input type="text" name="request name" placeholder="order label" required id="idname">
               </div>

               <input type="hidden" name="new" value="1" />
<p>
            <input type="text" name="Burst" placeholder="Enter Burst size "  />
            <input type="text" name="Waist" placeholder="Enter Waist size"  />
            <input type="text" name="Hips" placeholder="Enter Hips size"  />
            <input type="text" name="backWidth" placeholder="Enter back width" />
</p>

<p>
            <input type="text" name="frontChest" placeholder="Enter Front Chest"  />
            <input type="text" name="Shoulder" placeholder="Enter Shoulder size"  />
            <input type="text" name="Neck" placeholder="Enter Necksize"  />
            <input type="text" name="Sleeve" placeholder="Enter Sleeve size" />
           </p>

               <p>
               <input type="text" name="underBurst" placeholder="Under bust size" />
                <input type="text" name="Wrist" placeholder="Enter Wrist size" />
                <input type="text" name="upperArm" placeholder="Enter Upper Arm size" />
                   <input type="text" name="Calf" placeholder="Enter Calf size"  />
               </p>

               <p>
            <input type="text" name="Ankle" placeholder="Enter Ankle size" />
            <input type="text" name="napeWaist" placeholder="Enter Nape to waist size" />
            <input type="text" name="waistHip" placeholder="Enter Waist to Hip size" />
            <input type="text" name="shoulderWaist" placeholder="Enter Front shoulder to waist" />
               </p>
            <p>
                <input type="text" name="outsideLeg" placeholder="Enter outside leg size" />
                <input type="text" name="insideLeg" placeholder="Enter inside leg size" /></p>

               <p><input name="submit" type="submit" value="Submit" /></p>
           </div>

        </form>
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="3" id="comment"></textarea>
        </div>

    </div>
</main>
</body>
