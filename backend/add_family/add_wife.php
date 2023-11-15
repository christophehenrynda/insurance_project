<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: index.php');
}
include '../connection.php';
?>
<?php
if (isset($_GET['wife'])) {
    $id= $_GET['wife'];

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
    width: 45px;
    border-radius: 8px;
    background-color: #f4f140;
}
/* .container form{
    position: relative;
    margin-top: 16px;
    min-height: 380px;
    background-color: #ffffff;
    overflow: hidden;
} */
    </style>  
</head>
<body>
    <div class="container">
        <header>Your Wife</header>

        <form action="#" method="post" class="mother">
            <div class="form first">
                <span class="title">Family Wife Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" name="wife_firstname" title="Enter Here First name!" placeholder="Enter Here firstname" required>
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" name="wife_lastname" title="Enter Here Last name!" placeholder="Enter Here lastname" required>
                        </div>

                        <div class="input-field">
                            <label>Insurance</label>
                            <select name="wife_insurance" id="" required>
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
                            <input type="text" name="wife_insurance_nber" title="Enter Here Insurance Number!" placeholder="Enter Here insurance number">
                        </div>

                        <div class="input-field">
                            <label>Telephone Number</label>
                            <input type="text" name="wife_telephone" title="Here Phone Number" placeholder="e.g:0788888888" placeholder="Enter Here phone number" spellcheck="false" maxlength="10" required>
                        </div>


                        <div class="input-field">
                            <label>National ID</label>
                            <input type="text" name="wife_nat_id" title="Here National ID" placeholder="Enter Here national ID" spellcheck="false" maxlength="16">
                        </div>

                        <div class="input-field">
                            <label>Passport ID</label>
                            <input type="text" name="wife_pass_id" title="Here Passport ID" placeholder="Enter Here passport ID">
                        </div>
                    </div>

                    <?php
while ($count= mysqli_fetch_array($sql)) {
?>
            <input type="hidden" name="husband" value="<?php echo $count['fa_firstname']; echo ' '. $count['fa_lastname'];?>">
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
if (isset($_POST['submit'])) {
    $fname= $_POST['wife_firstname'];
    $lname= $_POST['wife_lastname'];
    $insurance= $_POST['wife_insurance'];
    $ins_nber= $_POST['wife_insurance_nber'];
    $phone= $_POST['wife_telephone'];
    $national= $_POST['wife_nat_id'];
    $passport= $_POST['wife_pass_id'];
    $value= $id;
    $husband= $_POST['husband'];
    $user= $_POST['username'];

    $sql= "INSERT INTO fam_wife(wife_firstname, wife_lastname, wife_insurance, wife_insurance_nber, wife_telephone, wife_nat_id, wife_pass_id, fo_id, husband, username) VALUES('$fname', '$lname', '$insurance', '$ins_nber', '$phone', '$national', '$passport', '$value', '$husband', '$user')";
    $result= mysqli_query($conn, $sql);
    if ($result == true) {
        echo "<script>location.href= '../motherinfo.php'</script>";
    }
}
?>
<?php
}}
?>