<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: index.php');
}
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD PAGE</title>
</head>
<body>
    <button><a href="logout.php">Logout</a></button>
    <div class="menu">
        <ul>
            <li><a href="dashboard.php">HOME</a></li>
            <li><a href="fatherinfo.php">Father Information</a></li>
            <li><a href="motherinfo.php">Mother Information</a></li>
            <li><a href="childinfo.php">Childs Information</a></li>
            <li><a href="fmembers.php">Other family member(s)</a></li>
            <li><a href="location.php">Home Location</a></li>
            <li><a href="allfamily.php">Summary</a></li>
        </ul>
    </div><br>
    <div class="main">
        <table border="1">
            <thead>
                <th style="padding: 10px;">Child ID</th>
                <th style="padding: 10px;">First Name</th>
                <th style="padding: 10px;">Last Name</th>
                <th style="padding: 10px;">Insurance Name</th>
                <th style="padding: 10px;">Insurance Number</th>
                <th style="padding: 10px;">National ID</th>
                <th style="padding: 10px;">Passport ID</th>
                <th style="padding: 10px;">Father</th>
                <th style="padding: 10px;" colspan="2">Operation</th>
            </thead>
<?php
$user= $_SESSION['username'];
$query= mysqli_query($conn, "SELECT * FROM fam_childs WHERE username= '$user'");
if ($query) {
    while ($row= mysqli_fetch_array($query)) {
?>
            <tr>
                <td style="padding: 10px;"><?php echo $row['ch_id'];?></td>
                <td style="padding: 10px;"><?php echo strtoupper($row['ch_firstname']);?></td>
                <td style="padding: 10px;"><?php echo $row['ch_lastname'];?></td>
                <td style="padding: 10px;"><?php echo $row['ch_insurance'];?></td>
                <td style="padding: 10px;"><?php echo $row['ch_insurance_nber'];?></td>
                <td style="padding: 10px;"><?php echo $row['ch_nat_id'];?></td>
                <td style="padding: 10px;"><?php echo $row['ch_pass_id'];?></td>
                <td style="padding: 10px;"><?php echo strtoupper($row['father']);?></td>
                <td style="padding: 10px;"><button><a href="operations.php?delete_child=<?php echo $row['ch_id'];?>">Delete</a></button></td>
                <td style="padding: 10px;"><button><a href="operations.php?update_child=<?php echo $row['ch_id'];?>">Update</a></button></td>
            </tr>
<?php
    }
}
?>
        </table>
    </div>
</body>
</html>