<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: index.php');
}
include 'connection.php';
?>



<!-- DELETE PART FOR ALL TABLES -->


<!-- DELETE FOR FATHER TABLES -->
<?php
if (isset($_GET['delete'])) {
    $id= $_GET['delete'];

    $query= mysqli_query($conn, "DELETE FROM famownerinfo WHERE fo_id= '$id'");
    if ($query == true) {
        header('location: fatherinfo.php');
    }
}
?>

<!-- DELETE FOR MOTHER TABLES -->

<?php
if (isset($_GET['delete_wife'])) {
    $id= $_GET['delete_wife'];

    $query= mysqli_query($conn, "DELETE FROM fam_wife WHERE wife_id= '$id'");
    if ($query == true) {
        header('location: motherinfo.php');
    }
}
?>

<!-- DELETE FOR CHILDS TABLE -->

<?php
if (isset($_GET['delete_child'])) {
    $id= $_GET['delete_child'];

    $query= mysqli_query($conn, "DELETE FROM fam_childs WHERE ch_id= '$id'");
    if ($query == true) {
        header('location: childinfo.php');
    }
}
?>

<!-- DELETE FOR FAMILY MEMBERS TABLE -->

<?php
if (isset($_GET['delete_member'])) {
    $id= $_GET['delete_member'];

    $query= mysqli_query($conn, "DELETE FROM fam_members WHERE m_id= '$id'");
    if ($query == true) {
        header('location: fmembers.php');
    }
}
?>

<!-- DELETE FOR FAMILY LOCATIONS -->

<?php
if (isset($_GET['delete_location'])) {
    $id= $_GET['delete_location'];

    $query= mysqli_query($conn, "DELETE FROM fam_location WHERE loc_id= '$id'");
    if ($query == true) {
        header('location: location.php');
    }
}
?>




<!-- END OF DELETE PART -->

<!-- START FOR UPDATE TABLE PART -->



<!-- UPDATE FOR FATHER TABLE -->
<?php
if (isset($_GET['update'])) {
    $id= $_GET['update'];

    $sql= mysqli_query($conn, "SELECT * FROM famownerinfo WHERE fo_id= '$id'");
    if ($sql) {
    while ($count= mysqli_fetch_array($sql)) {
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
    <div class="main">
        <form action="" method="post">
            <label for="">First Name:</label>
            <input type="text" name="fa_firstname" title="Enter your First name!" required value="<?php echo $count['fa_firstname'];?>"> <br><br>
            <label for="">Last Name:</label>
            <input type="text" name="fa_lastname" title="Enter your Last name!" required value="<?php echo $count['fa_lastname'];?>"> <br><br>
            <label for="">Insurance:</label>
            <select name="insurance" id="" required>
                <option value="<?php echo $count['insurance'];?>"><?php echo $count['insurance'];?></option>
                <option value="N/A">Have no insurance</option>
                <option value="PRIVATE">PRIVATE</option>
<?php
$insurance= mysqli_query($conn, "SELECT * FROM avinsurance");
if ($insurance) {
while ($row= mysqli_fetch_array($insurance)) {
?>
                <option value="<?php echo $row['insurance'];?>"><?php echo $row['insurance'];?></option>
<?php
}}
?>
            </select><br><br>
            <label for="">Insurance Number:</label>
            <input type="text" name="insurance_nber" title="Enter your Insurance Number!" value="<?php if (!empty($count['insurance_nber'])) {echo $count['insurance_nber'];}  else {echo "N/A";}?>"> <br><br>
            <label for="">Place of grade:</label>
            <input type="text" name="placeOf_grade" title="Enter the place you took your grade!" value="<?php if (!empty($count['placeOf_grade'])) {echo $count['placeOf_grade'];}  else {echo "N/A";}?>"> <br><br>
            <label for="">Number of grade:</label>
            <select name="grade_nber" id="">
                <option value="<?php echo $count['grade_nber'];?>"><?php echo $count['grade_nber'];?></option>
                <option value="N/A">NO Grade</option>
                <option value="first grade(1)">Grade 1</option>
                <option value="second grade(2)">Grade 2</option>
                <option value="third grade(3)">Grade 3</option>
                <option value="fourth grade(4)">Grade 4</option>
                <option value="fith grade(5)">Grade 5</option> 
            </select><br><br>
            <label for="">Telephone Number:</label>
            <input type="text" name="fa_telephone" title="Your Phone Number" placeholder="e.g:0788888888" required value="<?php echo $count['fa_telephone'];?>"> <br><br>
            <label for="">National ID</label>
            <input type="text" name="fa_nat_id" title="Your National ID" value="<?php if (!empty($count['fa_nat_id'])) {echo $count['fa_nat_id'];}  else {echo "N/A";}?>"><br><br>
            <label for="">Passport ID</label>
            <input type="text" name="fa_pass_id" title="Your Passport ID" value="<?php if (!empty($count['fa_pass_id'])) {echo $count['fa_pass_id'];}  else {echo "N/A";}?>"> <br><br>
            <input type="hidden" name="username" value="<?php echo $count['username'];?>">
<!-- date is automatic -->
            <button type="submit" name="submit">SAVE</button>
            <button type="reset">CANCEL</button>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $fname= $_POST['fa_firstname'];
    $lname= $_POST['fa_lastname'];
    $insurance= $_POST['insurance'];
    $ins_nber= $_POST['insurance_nber'];
    $pograde= $_POST['placeOf_grade'];
    $grade_nber= $_POST['grade_nber'];
    $phone= $_POST['fa_telephone'];
    $national= $_POST['fa_nat_id'];
    $passport= $_POST['fa_pass_id'];
    $user= $_POST['username'];

    $query= "UPDATE famownerinfo SET fa_firstname= '$fname', fa_lastname= '$lname', insurance= '$insurance', insurance_nber= '$ins_nber', placeOf_grade= '$pograde', grade_nber= '$grade_nber', fa_telephone= '$phone', fa_nat_id= '$national', fa_pass_id= '$passport', username= '$user' WHERE fo_id= '$id'";
    $result= mysqli_query($conn, $query);
    if ($result == true) {
        header('location: fatherinfo.php');
    }
}
?>

<?php
}}}
?>


<!-- UPDATE FOR MOTHER TABLE -->

<?php
if (isset($_GET['update_wife'])) {
    $id= $_GET['update_wife'];

    $sql= mysqli_query($conn, "SELECT * FROM fam_wife WHERE wife_id= '$id'");
    if ($sql) {
        while ($count= mysqli_fetch_array($sql)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add your wife</title>
</head>
<body>
    <div class="main">
        <form action="" method="post">
        <label for="">First Name:</label>
            <input type="text" name="wife_firstname" title="Enter here First name!" value="<?php echo $count['wife_firstname'];?>" required> <br><br>
            <label for="">Last Name:</label>
            <input type="text" name="wife_lastname" title="Enter here Last name!" value="<?php echo $count['wife_lastname'];?>" required> <br><br>
            <label for="">Insurance:</label>
            <select name="wife_insurance" id="" required>
                <option value="<?php echo $count['wife_insurance'];?>"><?php echo $count['wife_insurance'];?></option>
                <option value="N/A">Have no insurance</option>
                <option value="PRIVATE">PRIVATE</option>
            <?php
$insurance= mysqli_query($conn, "SELECT * FROM avinsurance");
if ($insurance) {
while ($row= mysqli_fetch_array($insurance)) {
?>
                <option value="<?php echo $row['insurance'];?>"><?php echo $row['insurance'];?></option>
<?php
}}
?>
            </select><br><br>
            <label for="">Insurance Number:</label>
            <input type="text" name="wife_insurance_nber" title="Enter here Insurance Number!" value="<?php echo $count['wife_insurance_nber'];?>"> <br><br>
            <label for="">Telephone Number:</label>
            <input type="text" name="wife_telephone" title="here Phone Number" placeholder="e.g:0788888888" value="<?php echo $count['wife_telephone'];?>" required> <br><br>
            <label for="">National ID</label>
            <input type="text" name="wife_nat_id" title="here National ID" value="<?php echo $count['wife_nat_id'];?>"><br><br>
            <label for="">Passport ID</label>
            <input type="text" name="wife_pass_id" title="here Passport ID" value="<?php echo $count['wife_pass_id'];?>"> <br><br>
            <button type="submit" name="submit">SAVE</button>
            <button type="reset">CANCEL</button>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $fname= $_POST['wife_firstname'];
    $lname= $_POST['wife_lastname'];
    $insurance= $_POST['wife_insurance'];
    $ins_nber= $_POST['wife_insurance_nber'];
    $phone= $_POST['wife_telephone'];
    $national= $_POST['wife_nat_id'];
    $passport= $_POST['wife_pass_id'];

    $query= "UPDATE fam_wife SET wife_firstname= '$fname', wife_lastname= '$lname', wife_insurance= '$insurance', wife_insurance_nber= '$ins_nber', wife_telephone= '$phone', wife_nat_id= '$national', wife_pass_id= '$passport' WHERE wife_id= '$id'";
    $result= mysqli_query($conn, $query);
    if ($result == true) {
        header('location: motherinfo.php');
    }
}
?>
<?php
        }
    }
}
?>


<!-- UPDATE FOR CHILDREN TABLE -->

<?php
if (isset($_GET['update_child'])) {
    $id= $_GET['update_child'];

    $sql= mysqli_query($conn, "SELECT * FROM fam_childs WHERE ch_id= '$id'");
    if ($sql) {
        while ($count= mysqli_fetch_array($sql)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add your chldren</title>
</head>
<body>
    <div class="main">
        <form action="" method="post">
        <label for="">First Name:</label>
            <input type="text" name="ch_firstname" title="Enter child First name!" value="<?php echo $count['ch_firstname'];?>" required> <br><br>
            <label for="">Last Name:</label>
            <input type="text" name="ch_lastname" title="Enter child Last name!" value="<?php echo $count['ch_lastname'];?>" required> <br><br>
            <label for="">Insurance:</label>
            <select name="ch_insurance" id="" required>
                <option value="<?php echo $count['ch_insurance'];?>"><?php echo $count['ch_insurance'];?></option>
                <option value="N/A">Have no insurance</option>
                <option value="PRIVATE">PRIVATE</option>
            <?php
$insurance= mysqli_query($conn, "SELECT * FROM avinsurance");
if ($insurance) {
while ($row= mysqli_fetch_array($insurance)) {
?>
                <option value="<?php echo $row['insurance'];?>"><?php echo $row['insurance'];?></option>
<?php
}}
?>
            </select><br><br>
            <label for="">Insurance Number:</label>
            <input type="text" name="ch_insurance_nber" title="Enter child Insurance Number!" value="<?php echo $count['ch_insurance_nber'];?>"> <br><br>
            <label for="">National ID</label>
            <input type="text" name="ch_nat_id" title="child National ID" value="<?php echo $count['ch_nat_id'];?>"><br><br>
            <label for="">Passport ID</label>
            <input type="text" name="ch_pass_id" title="child Passport ID" value="<?php echo $count['ch_pass_id'];?>"> <br><br>

            <button type="submit" name="submit">SAVE</button>
            <button type="reset">CANCEL</button>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['submit'])){
    $fname= $_POST['ch_firstname'];
    $lname= $_POST['ch_lastname'];
    $insurance= $_POST['ch_insurance'];
    $ins_nber= $_POST['ch_insurance_nber'];
    $national= $_POST['ch_nat_id'];
    $passport= $_POST['ch_pass_id'];

    $query= "UPDATE fam_childs SET ch_firstname= '$fname', ch_lastname= '$lname', ch_insurance= '$insurance', ch_insurance_nber= '$ins_nber', ch_nat_id= '$national', ch_pass_id= '$passport' WHERE ch_id= '$id'";
    $result= mysqli_query($conn, $query);
    if ($result == true) {
        header('location: childinfo.php');
    }
}
?>
<?php
        }
    }
}
?>

<!-- UPDATE FOR FAMILY MEMBERS TABLE -->

<?php
if (isset($_GET['update_member'])) {
    $id= $_GET['update_member'];

    $sql= mysqli_query($conn, "SELECT * FROM fam_members WHERE m_id= '$id'");
    if ($sql) {
        while ($count= mysqli_fetch_array($sql)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add your chldren</title>
</head>
<body>
    <div class="main">
        <form action="" method="post">
        <label for="">First Name:</label>
            <input type="text" name="m_firstname" title="Enter member First name!" value="<?php echo $count['m_firstname'];?>" required> <br><br>
            <label for="">Last Name:</label>
            <input type="text" name="m_lastname" title="Enter member Last name!" value="<?php echo $count['m_lastname'];?>" required> <br><br>
            <label for="">Insurance:</label>
            <select name="m_insurance" id="" required>
                <option value="<?php echo $count['m_insurance'];?>"><?php echo $count['m_insurance'];?></option>
                <option value="N/A">Have no insurance</option>
                <option value="PRIVATE">PRIVATE</option>
            <?php
$insurance= mysqli_query($conn, "SELECT * FROM avinsurance");
if ($insurance) {
while ($row= mysqli_fetch_array($insurance)) {
?>
                <option value="<?php echo $row['insurance'];?>"><?php echo $row['insurance'];?></option>
<?php
}}
?>
            </select><br><br>
            <label for="">Insurance Number:</label>
            <input type="text" name="m_insurance_nber" title="Enter member Insurance Number!" value="<?php echo $count['m_insurance_nber'];?>"> <br><br>
            <label for="">National ID</label>
            <input type="text" name="m_nat_id" title="member National ID" value="<?php echo $count['m_nat_id'];?>"><br><br>
            <label for="">Passport ID</label>
            <input type="text" name="m_pass_id" title="member Passport ID" value="<?php echo $count['m_pass_id'];?>"> <br><br>
            <button type="submit" name="submit">SAVE</button>
            <button type="reset">CANCEL</button>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['submit'])){
    $fname= $_POST['m_firstname'];
    $lname= $_POST['m_lastname'];
    $insurance= $_POST['m_insurance'];
    $ins_nber= $_POST['m_insurance_nber'];
    $national= $_POST['m_nat_id'];
    $passport= $_POST['m_pass_id'];

    $query= "UPDATE fam_members SET m_firstname= '$fname', m_lastname= '$lname', m_insurance= '$insurance', m_insurance_nber= '$ins_nber', m_nat_id= '$national', m_pass_id= '$passport' WHERE m_id= '$id'";
    $result= mysqli_query($conn, $query);
    if ($result == true) {
        header('location: fmembers.php');
    }
}
?>
<?php
        }
    }
}
?>

<!-- UPDATE FOR LOCATIONS TABLE -->

<?php
if (isset($_GET['update_location'])) {
    $id= $_GET['update_location'];

    $sql= mysqli_query($conn, "SELECT * FROM fam_location WHERE loc_id= '$id'");
    if ($sql) {
        while ($count= mysqli_fetch_array($sql)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add your location</title>
</head>
<body>
    <div class="main">
        <form action="" method="post">
            <label for="">Country:</label>
            <input type="text" value="RWANDA" disabled> <br><br>
            <label for="">Province:</label>
            <select name="province" id="" required>
                <option value="<?php echo $count['province'];?>"><?php echo $count['province'];?></option>
                <option value="KIGALI CITY">Kigali City</option>
                <option value="NORTH">Northern Province</option>
                <option value="SOUTH">Southern Province</option>
                <option value="WEST">Western Province</option>
                <option value="EAST">Eastern Province</option>
            </select><br><br>
            <label for="">District:</label>
            <input type="text" name="district" title="Enter your district!" value="<?php echo $count['district'];?>" required> <br><br>
            <label for="">Sector:</label>
            <input type="text" name="sector" title="Enter your sector!" value="<?php echo $count['sector'];?>" required> <br><br>
            <label for="">Cell:</label>
            <input type="text" name="cell" title="Enter your cell!" value="<?php echo $count['cell'];?>" required> <br><br>
            <label for="">Village:</label>
            <input type="text" name="village" title="Enter your village!" value="<?php echo $count['village'];?>" required> <br><br>
            <button type="submit" name="submit">SAVE</button>
            <button type="reset">CANCEL</button>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $province= $_POST['province'];
    $district= $_POST['district'];
    $sector= $_POST['sector'];
    $cell= $_POST['cell'];
    $village= $_POST['village'];

    $query= "UPDATE fam_location SET province= '$province', district= '$district', sector= '$sector', cell= '$cell', village= '$village' WHERE loc_id= '$id'";
    $result= mysqli_query($conn, $query);
    if ($result == true) {
        header('location: location.php');
    }
}
?>
<?php
        }
    }
}
?>


<!-- END OF UPDATE PART -->