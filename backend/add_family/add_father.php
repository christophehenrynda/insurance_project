<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: index.php');
}
include '../connection.php';
?>
<!DOCTYPE html>
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
    width: 120px;
    border-radius: 8px;
    background-color: #f4f140;
}
/* .container form{
    position: relative;
    margin-top: 16px;
    min-height: 390px;
    background-color: #ffffff;
    overflow: hidden;
} */
    </style>  
</head>
<body>
    <div class="container">
        <header>Your Information</header>

        <form action="#" method="post" class="father">
            <div class="form first">
                <span class="title">Family Owner Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" name="fa_firstname" title="Enter your First name!" placeholder="Enter your firstname" required>
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" name="fa_lastname" title="Enter your Last name!" placeholder="Enter your lastname" required>
                        </div>

                        <div class="input-field">
                            <label>Insurance</label>
                            <select name="insurance" id="" required>
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
                            <input type="text" name="insurance_nber" title="Enter your Insurance Number!" placeholder="Enter your insurance number">
                        </div>

                        <div class="input-field">
                            <label>Place of Grade</label>
                            <input type="text" name="placeOf_grade" title="Enter the place you took your grade!" placeholder="Enter the place you took ur grade">
                        </div>

                        <div class="input-field">
                            <label>Typr of Grade</label>
                            <select name="grade_nber" id="" required>
                                <option value="N/A">NO Grade</option>
                                <option value="first grade(1)">Grade 1</option>
                                <option value="second grade(2)">Grade 2</option>
                                <option value="third grade(3)">Grade 3</option>
                                <option value="fourth grade(4)">Grade 4</option>
                                <option value="fith grade(5)">Grade 5</option> 
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Telephone Number</label>
                            <input type="text" name="fa_telephone" title="Your Phone Number" placeholder="e.g:0788888888" placeholder="Enter your phone number" spellcheck="false" maxlength="10" required>
                        </div>
                        <div class="input-field">
                            <label>National ID</label>
                            <input type="text" name="fa_nat_id" title="Your National ID" placeholder="Enter your national ID" spellcheck="false" maxlength="16">
                        </div>

                        <div class="input-field">
                            <label>Passport ID</label>
                            <input type="text" name="fa_pass_id" title="Your Passport ID" placeholder="Enter your passport ID">
                        </div>
                    </div>

<?php
$user= $_SESSION['username'];
$sql= mysqli_query($conn, "SELECT * FROM user_account WHERE username= '$user'");
if ($sql) {
while ($row= mysqli_fetch_array($sql)) {
?>
            <input type="hidden" name="username" value="<?php echo $row['username'];?>">
<?php
}}
?>
<!-- date is automatic -->
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
    $date= date("y-m-d");

    $query= "INSERT INTO famOwnerinfo(fa_firstname, fa_lastname, insurance, insurance_nber, placeOf_grade, grade_nber, fa_telephone, fa_nat_id, fa_pass_id, username, date) VALUES('$fname', '$lname', '$insurance', '$ins_nber', '$pograde', '$grade_nber', '$phone', '$national', '$passport', '$user', '$date')";
    $result= mysqli_query($conn, $query);
    if ($result == true) {
        echo "<script>location.href= '../fatherinfo.php';</script>";
    }

}
?>