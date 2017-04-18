<?php    ini_set('display_errors', 1);
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/31/2017
 * Time: 6:19 PM
 */
require('../db.php');

include('dashboard.php')
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<main>

    <div class="">
    <h2>View Records</h2>
        <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Order.No</th>
            <th>Username</th>
            <th>Burst</th>
            <th>Waist</th>
            <th>Hips</th>
            <th>Back Width</th>
            <th>Front chest</th>
            <th>Shoulder</th>
            <th>Neck Size</th>
            <th>Sleeve</th>
            <th>Under Burst</th>
            <th>Wrist</th>
            <th>Upper Arm</th>
            <th>Calf</th>
            <th>Ankle</th>
            <th>Nape to waist</th>
            <th>Waist to hip</th>
            <th>Front shoulder to waist</th>
            <th>Outside Leg</th>
            <th>Inside Legs</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>veiw Sketch</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $count=1;
        $sel_query="Select * from new_record ORDER BY id desc;";
        $result = mysqli_query($con,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {  $users=$row["submittedby"]; ?>
            <tr><td align="center"><?php echo $count; ?></td>
                <td><?php echo $row["submittedby"]; ?></td>
                <td ><?php echo $row["burst"]; ?></td>
                <td ><?php echo $row["waist"]; ?></td>
                <td ><?php echo $row["hips"]; ?></td>
                <td ><?php echo $row["backwidth"]; ?></td>
                <td ><?php echo $row["frontchest"]; ?></td>
                <td ><?php echo $row["shoulder"]; ?></td>
                <td ><?php echo $row["neck"]; ?></td>
                <td ><?php echo $row["sleeve"]; ?></td>
                <td ><?php echo $row["underburst"]; ?></td>
                <td ><?php echo $row["wrist"]; ?></td>
                <td ><?php echo $row["upperarm"]; ?></td>
                <td ><?php echo $row["calf"]; ?></td>
                <td ><?php echo $row["ankle"]; ?></td>
                <td ><?php echo $row["napewaist"]; ?></td>
                <td ><?php echo $row["waisthip"]; ?></td>
                <td ><?php echo $row["shoulderwaist"]; ?></td>
                <td ><?php echo $row["outsideleg"]; ?></td>
                <td ><?php echo $row["insideleg"]; ?></td>
                <td align="center">
                    <a href="../edit.php?id=<?php echo $row["id"]?>">Edit</a>
                </td>
                <td align="center">
                    <a href="../delete.php?id=<?php echo $row["id"]?>">Delete</a>
                </td>
                <td>
                    <?php  $username = $users;
                    $sql2 = "select filename from tbl_files WHERE username = '$username'";
                    $result2 = mysqli_query($con, $sql2);
                    $row2 = mysqli_fetch_assoc($result2); ?>
                    <a href="upload/<?php echo $row2['filename']; ?>" target="_blank">design veiw</a>
                </td>
            </tr>
            <?php $count++; } ?>
        </tbody>
    </table>
            </div>
</div>
</main>
</body>
</html>