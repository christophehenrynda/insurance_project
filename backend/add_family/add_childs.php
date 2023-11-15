<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: index.php');
}
include '../connection.php';
?>
<?php
if (isset($_GET['childs'])) {
    $id= $_GET['childs'];

    $sql= mysqli_query($conn, "SELECT * FROM famownerinfo WHERE fo_id= '$id'");
    if ($sql == true) {
?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="stylee.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Responsive Regisration Form </title>
    <style>
.container header::after{
    content: "";
    position: absolute;
    left: 52px;
    bottom: -2px;
    height: 3px;
    width: 85px;
    border-radius: 8px;
    background-color: #f4f140;
}
/* .container form{
    position: relative;
    margin-top: 16px;
    min-height: 280px;
    background-color: #ffffff;
    overflow: hidden;
} */
    </style>  
</head>
<body>
    <div class="container">
        <header>Your Children</header>

        <form action="#" method="post" class="child">
            <div class="form first">
                <span class="title">Family Childs Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" name="ch_firstname" title="Enter child First name!" placeholder="Enter child firstname" required>
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" name="ch_lastname" title="Enter child Last name!" placeholder="Enter child lastname" required>
                        </div>

                        <div class="input-field">
                            <label>Insurance</label>
                            <select name="ch_insurance" id="" required>
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
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Insurance ID</label>
                            <input type="text" name="ch_insurance_nber" title="Enter child Insurance Number!" placeholder="Enter child insurance number">
                        </div>


                        <div class="input-field">
                            <label>National ID</label>
                            <input type="text" name="ch_nat_id" title="child National ID" placeholder="Enter child national ID" spellcheck="false" maxlength="16">
                        </div>

                        <div class="input-field">
                            <label>Passport ID</label>
                            <input type="text" name="ch_pass_id" title="child Passport ID" placeholder="Enter child passport ID">
                        </div>
                    </div>

<?php
while ($count= mysqli_fetch_array($sql)) {
?>
            <input type="hidden" name="father" value="<?php echo $count['fa_firstname']; echo ' '. $count['fa_lastname'];?>">
            <input type="hidden" name="username" value="<?php echo $count['username'];?>">
<?php
}
?>
                    <button class="nextBtn" type="submit" name="submit">
                        <span class="btnText">SAVE</span>
                        <i class="uil uil-navigator"></i>
                    </button>
            </div>
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
    $father= $_POST['father'];
    $national= $_POST['ch_nat_id'];
    $passport= $_POST['ch_pass_id'];
    $value= $id;
    $user= $_POST['username'];

    $sql= "INSERT INTO fam_childs(ch_firstname, ch_lastname, ch_insurance, ch_insurance_nber, father, ch_nat_id, ch_pass_id, fo_id, username) VALUES('$fname', '$lname', '$insurance', '$ins_nber', '$father', '$national', '$passport', '$value', '$user')";
    $result= mysqli_query($conn, $sql);
    if ($result == true) {
        echo "<script>location.href= '../childinfo.php';</script>";
    }
}
?>
<?php
}}
?>