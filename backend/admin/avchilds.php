<?php
session_start();
if (!isset($_SESSION['valid'])) {
    header('location: index.php');
}
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total children</title>
</head>
<body>
<button><a href="logout.php">Logout</a></button>
    <div class="menu">
        <ul>
            <li><a href="dashboard.php">HOME</a></li>
            <li><a href="users.php">Available Users</a></li>
            <li><a href="avfathers.php">Available Family owners</a></li>
            <li><a href="avmothers.php">Available wives</a></li>
            <li><a href="avchilds.php">Available childs</a></li>
            <li><a href="avmembers.php">Available family members</a></li>
            <li><a href="insurances.php">Available insurance</a></li>
            <li><a href="locations.php">Available Location</a></li>
            <li><a href="summary.php">Full available info</a></li>
        </ul>
    </div><br>
    <div class="main">
        <table border="1">
            <thead>
                <th style="padding: 7px;">Child ID</th>
                <th style="padding: 7px;">First Name</th>
                <th style="padding: 7px;">Last Name</th>
                <th style="padding: 7px;">Insurance Name</th>
                <th style="padding: 7px;">Insurance Number</th>
                <th style="padding: 7px;">National ID</th>
                <th style="padding: 7px;">Passport ID</th>
                <th style="padding: 7px;">Father Names</th>
            </thead>
<?php
$query= mysqli_query($conn, "SELECT * FROM fam_childs");
if ($query) {
    while ($row= mysqli_fetch_array($query)) {
?>
            <tr>
                <td style="padding: 7px;"><?php echo $row['ch_id'];?></td>
                <td style="padding: 7px;"><?php echo strtoupper($row['ch_firstname']);?></td>
                <td style="padding: 7px;"><?php echo $row['ch_lastname'];?></td>
                <td style="padding: 7px;"><?php echo $row['ch_insurance'];?></td>
                <td style="padding: 7px;"><?php echo $row['ch_insurance_nber'];?></td>
                <td style="padding: 7px;"><?php echo $row['ch_nat_id'];?></td>
                <td style="padding: 7px;"><?php echo $row['ch_pass_id'];?></td>
                <td style="padding: 7px;"><?php echo strtoupper($row['father']);?></td>
            </tr>
<?php
    }
}
?>
        </table>
    </div>
</body>
</html>