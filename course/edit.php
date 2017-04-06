<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/31/2017
 * Time: 6:23 PM
 */
 include ("dashboard.php");
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from new_record where id='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<body>

    <h1>Update Record</h1>
    <?php
    require ('db.php');
    $status = "";
    if(isset($_POST['new']) && $_POST['new']==1)
    {
        $id=$_REQUEST['id'];
        $trn_date = date("Y-m-d H:i:s");
        $burst = $_REQUEST['burst'];
        $waist = $_REQUEST['waist'];
        $hips = $_REQUEST['hips'];
        $backWidth = $_REQUEST['backwidth'];
        $frontChest = $_REQUEST['frontchest'];
        $shoulder = $_REQUEST['shoulder'];
        $neck = $_REQUEST['neck'];
        $sleeve = $_REQUEST['sleeve'];
        $underBurst = $_REQUEST['underburst'];
        $wristt = $_REQUEST['wrist'];
        $upperArm = $_REQUEST['upperarm'];
        $calf = $_REQUEST['calf'];
        $ankle = $_REQUEST['ankle'];
        $napeWaist = $_REQUEST['napewaist'];
        $waistHip = $_REQUEST['waisthip'];
        $shoulderWaist = $_REQUEST['shoulderwaist'];
        $outsideLeg = $_REQUEST['outsideleg'];
        $insideLeg = $_REQUEST['insideleg'];

        $submittedby = $_SESSION["username"];
        $update="update new_record set trn_date=`".$trn_date."`,
burst=`".$burst."`, waist=`".$waist."`,hips=`".$hips."`,bachwidth=`".$backWidth."`,frontchest=`".$frontChest."`,shoulder=`".$shoulder."`,neck=`".$neck."`,sleeve=`".$sleeve."`,underburst=`".$underBurst."`,wrist=`".$wrist."`,upperarm=`".$upperArm."`,calf=`".$calf."`,ankle=`".$ankle."`,napewaist=`".$napeWaist."`,waisthip=`".$waistHip."`,shoulderwaist=`".$shoulderWaist."`,outsideleg=`".$outsideLeg."`,onsideleg=`".$outsideLeg."`,
submittedby=`".$submittedby."` where id=`".$id."`";
        mysqli_query($con, $update) or die(mysqli_error());
        $status = "Record Updated Successfully.;
</br></br><a href='view.php'>View Updated Record</a>";
        echo '<p style="color:#FF0000;">'.$status.'</p>';
    }else {
    ?>
    <div>
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
            <p><input type="text" name="burst" placeholder="Enter burst"
                      required value="<?php echo $row['burst'];?>" /></p>
            <p><input type="text" name="waist" placeholder="Enter waist"
                      required value="<?php echo $row['waist'];?>" /></p>
            <p><input type="text" name="hips" placeholder="Enter hips"
                      required value="<?php echo $row['hips'];?>" /></p>
            <p><input type="text" name="backwidth" placeholder="Enter backwidth"
                      required value="<?php echo $row['backwidth'];?>" /></p>

            <p><input type="text" name="frontchest" placeholder="Enter frontchest"
                      required value="<?php echo $row['frontchest'];?>" /></p>
            <p><input type="text" name="shoulder" placeholder="enter shoulder"
                      required value="<?php echo $row['shoulder'];?>" /></p>
            <p><input type="text" name="neck" placeholder="enter neck"
                      required value="<?php echo $row['neck'];?>" /></p>
            <p><input type="text" name="sleeve" placeholder=" enter sleeve"
                      required value="<?php echo $row['sleeve'];?>" /></p>

            <p><input type="text" name="underburst" placeholder="Enter underburst"
                      required value="<?php echo $row['underburst'];?>" /></p>
            <p><input type="text" name="wrist" placeholder="Enter Wrist"
                      required value="<?php echo $row['wrist'];?>" /></p>
            <p><input type="text" name="upperarm" placeholder="Enter upperarm"
                      required value="<?php echo $row['upperarm'];?>" /></p>
            <p><input type="text" name="calf" placeholder="Enter calf"
                      required value="<?php echo $row['calf'];?>" /></p>

            <p><input type="text" name="ankle" placeholder="Enter ankle"
                      required value="<?php echo $row['ankle'];?>" /></p>
            <p><input type="text" name="napwaist" placeholder="Enter Nape to waist"
                      required value="<?php echo $row['napewaist'];?>" /></p>
            <p><input type="text" name="waisthip" placeholder="Enter waist to hip"
                      required value="<?php echo $row['waisthip'];?>" /></p>
            <p><input type="text" name="shoulderwaist" placeholder="Enter Shoulder to waist"
                      required value="<?php echo $row['shoulderwaist'];?>" /></p>

            <p><input type="text" name="outsideleg" placeholder="Enter outside of leg"
                      required value="<?php echo $row['outsideleg'];?>" /></p>
            <p><input type="text" name="insideleg" placeholder="Enter inside leg"
                      required value="<?php echo $row['insideleg'];?>" /></p>
            <p><input name="submit" type="submit" value="Update" /></p>
        </form>
        <?php } ?>
    </div>
</body>
</html>