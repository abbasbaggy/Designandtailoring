<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/31/2017
 * Time: 6:19 PM
 */
require('db.php');
include("auth.php");
include('dashboard.php')
?>

<body>
<main>

    <h2>View Records</h2>
    <table width="100%" border="1" style="border-collapse:collapse;">
        <thead>
        <tr>
            <th><strong>Order.No</strong></th>
            <th><strong>Burst</strong></th>
            <th><strong>Waist</strong></th>
            <th><strong>Hips</strong></th>
            <th><strong>Back Width</strong></th>
            <th><strong>Front chest</strong></th>
            <th><strong>Shoulder</strong></th>
            <th><strong>Neck Size</strong></th>
            <th><strong>Sleeve</strong></th>
            <th><strong>Under Burst</strong></th>
            <th><strong>Wrist</strong></th>
            <th><strong>Upper Arm</strong></th>
            <th><strong>Calf</strong></th>
            <th><strong>Ankle</strong></th>
            <th><strong>Nape to waist</strong></th>
            <th><strong>Waist to hip</strong></th>
            <th><strong>Front shoulder to waist</strong></th>
            <th><strong>Outside Leg</strong></th>
            <th><strong>Inside Legs</strong></th>
            <th><strong>Edit</strong></th>
            <th><strong>Delete</strong></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $veiwby =$_SESSION["username"];
        $count=1;
        $sel_query="Select * from new_record WHERE submittedby = '$veiwby' ORDER BY id desc;";
        $result = mysqli_query($con,$sel_query);
        while($row = mysqli_fetch_assoc($result)) { ?>
            <tr><td align="center"><?php echo $count; ?></td>
                <td align="center"><?php echo $row["burst"]; ?></td>
                <td align="center"><?php echo $row["waist"]; ?></td>
                <td align="center"><?php echo $row["hips"]; ?></td>
                <td align="center"><?php echo $row["backwidth"]; ?></td>
                <td align="center"><?php echo $row["frontchest"]; ?></td>
                <td align="center"><?php echo $row["shoulder"]; ?></td>
                <td align="center"><?php echo $row["neck"]; ?></td>
                <td align="center"><?php echo $row["sleeve"]; ?></td>
                <td align="center"><?php echo $row["underburst"]; ?></td>
                <td align="center"><?php echo $row["wrist"]; ?></td>
                <td align="center"><?php echo $row["upperarm"]; ?></td>
                <td align="center"><?php echo $row["calf"]; ?></td>
                <td align="center"><?php echo $row["ankle"]; ?></td>
                <td align="center"><?php echo $row["napewaist"]; ?></td>
                <td align="center"><?php echo $row["waisthip"]; ?></td>
                <td align="center"><?php echo $row["shoulderwaist"]; ?></td>
                <td align="center"><?php echo $row["outsideleg"]; ?></td>
                <td align="center"><?php echo $row["insideleg"]; ?></td>
                <td align="center">
                    <a href="edit.php?id=<?php echo $row[">Edit</a>
                </td>
                <td align="center">
                    <a href="delete.php?id=<?php echo $row[">Delete</a>
                </td>
            </tr>
            <?php $count++; } ?>
        </tbody>
    </table>
</div>
</main>
</body>
</html>