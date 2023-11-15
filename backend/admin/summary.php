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
    <title>SUMMARY REPORT</title>
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
                <th style="padding: 5px;" colspan="7">FATHER</th>
                <th style="padding: 5px;" colspan="7">MOTHER</th>
                <th style="padding: 5px;" colspan="6">CHILDRENS</th>
                <th style="padding: 5px;" colspan="6">FAMILY MEMBERS</th>
                <th style="padding: 5px;" colspan="6">LOCATION</th>
                <th style="padding: 5px;" colspan="4">OTHER</th>
            </thead>
            <tr>
                <!-- father part -->
                <th>FirstName</th>
                <th>LastName</th>
                <th>Insurance</th>
                <th>InsuranceID</th>
                <th>PhoneNumber</th>
                <th>NationalID</th>
                <th>PassportID</th>

                <!-- mother part -->

                <th>FirstName</th>
                <th>LastName</th>
                <th>Insurance</th>
                <th>InsuranceID</th>
                <th>PhoneNumber</th>
                <th>NationalID</th>
                <th>PassportID</th>

                <!-- children part -->

                <th>FirstName</th>
                <th>LastName</th>
                <th>Insurance</th>
                <th>InsuranceID</th>
                <th>NationalID</th>
                <th>PassportID</th>

                <!-- other members part -->

                <th>FirstName</th>
                <th>LastName</th>
                <th>Insurance</th>
                <th>InsuranceID</th>
                <th>NationalID</th>
                <th>PassportID</th>

                <!-- location part -->

                <th>Country</th>
                <th>Province</th>
                <th>District</th>
                <th>Sector</th>
                <th>Cell</th>
                <th>Village</th>
                <th>PlaceOFGRADE</th>
                <th>GradeNumber</th>
                <th>DATE</th>
                <th>User_Account</th>
            </tr>
<?php
$query= "SELECT father.fa_firstname, father.fa_lastname, father.insurance, father.insurance_nber, father.fa_telephone, father.fa_nat_id, father.fa_pass_id, mother.wife_firstname, mother.wife_lastname, mother.wife_insurance, mother.wife_insurance_nber, mother.wife_telephone, mother.wife_nat_id, mother.wife_pass_id, child.ch_firstname, child.ch_lastname, child.ch_insurance, child.ch_insurance_nber, child.ch_nat_id, child.ch_pass_id, member.m_firstname, member.m_lastname, member.m_insurance, member.m_insurance_nber, member.m_nat_id, member.m_pass_id, location.country, location.province, location.district, location.sector, location.cell, location.village, father.placeOf_grade, father.grade_nber, father.date, father.username
FROM famownerinfo AS father
LEFT JOIN fam_wife AS mother ON father.fo_id = mother.fo_id
LEFT JOIN fam_childs AS child ON father.fo_id = child.fo_id
LEFT JOIN fam_members AS member ON father.fo_id = member.fo_id
LEFT JOIN fam_location AS location ON father.fo_id = location.fo_id

UNION

SELECT father.fa_firstname, father.fa_lastname, father.insurance, father.insurance_nber, father.fa_telephone, father.fa_nat_id, father.fa_pass_id, mother.wife_firstname, mother.wife_lastname, mother.wife_insurance, mother.wife_insurance_nber, mother.wife_telephone, mother.wife_nat_id, mother.wife_pass_id, child.ch_firstname, child.ch_lastname, child.ch_insurance, child.ch_insurance_nber, child.ch_nat_id, child.ch_pass_id, member.m_firstname, member.m_lastname, member.m_insurance, member.m_insurance_nber, member.m_nat_id, member.m_pass_id, location.country, location.province, location.district, location.sector, location.cell, location.village, father.placeOf_grade, father.grade_nber, father.date, father.username
FROM famownerinfo AS father
RIGHT JOIN fam_wife AS mother ON father.fo_id = mother.fo_id
RIGHT JOIN fam_childs AS child ON father.fo_id = child.fo_id
RIGHT JOIN fam_members AS member ON father.fo_id = member.fo_id
RIGHT JOIN fam_location AS location ON father.fo_id = location.fo_id";

$result= mysqli_query($conn, $query);
if ($result == true) {
    while ($row= mysqli_fetch_array($result)) {
?>
            <tr>
                <!-- father part -->
                <td><?php echo $row['fa_firstname'];?></td>
                <td><?php echo $row['fa_lastname'];?></td>
                <td><?php echo $row['insurance'];?></td>
                <td><?php echo $row['insurance_nber'];?></td>
                <td><?php echo $row['fa_telephone'];?></td>
                <td><?php echo $row['fa_nat_id'];?></td>
                <td><?php echo $row['fa_pass_id'];?></td>

                <!-- mother part -->

                <td><?php echo $row['wife_firstname'];?></td>
                <td><?php echo $row['wife_lastname'];?></td>
                <td><?php echo $row['wife_insurance'];?></td>
                <td><?php echo $row['wife_insurance_nber'];?></td>
                <td><?php echo $row['wife_telephone'];?></td>
                <td><?php echo $row['wife_nat_id'];?></td>
                <td><?php echo $row['wife_pass_id'];?></td>

                <!-- children part -->

                <td><?php echo $row['ch_firstname'];?></td>
                <td><?php echo $row['ch_lastname'];?></td>
                <td><?php echo $row['ch_insurance'];?></td>
                <td><?php echo $row['ch_insurance_nber'];?></td>
                <td><?php echo $row['ch_nat_id'];?></td>
                <td><?php echo $row['ch_pass_id'];?></td>

                <!-- members part -->

                <td><?php echo $row['m_firstname'];?></td>
                <td><?php echo $row['m_lastname'];?></td>
                <td><?php echo $row['m_insurance'];?></td>
                <td><?php echo $row['m_insurance_nber'];?></td>
                <td><?php echo $row['m_nat_id'];?></td>
                <td><?php echo $row['m_pass_id'];?></td>

                <!-- location part -->

                <td><?php echo $row['country'];?></td>
                <td><?php echo $row['province'];?></td>
                <td><?php echo $row['district'];?></td>
                <td><?php echo $row['sector'];?></td>
                <td><?php echo $row['cell'];?></td>
                <td><?php echo $row['village'];?></td>

                <!-- other attributes -->
                <td><?php echo $row['placeOf_grade'];?></td>
                <td><?php echo $row['grade_nber'];?></td>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['username'];?></td>
            </tr>
<?php
    }
}
?>
        </table>
    </div>
</body>
</html>