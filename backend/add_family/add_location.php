<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: index.php');
}
include '../connection.php';
?>
<?php
if (isset($_GET['location'])) {
    $id= $_GET['location'];

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
    min-height: 290px;
    background-color: #ffffff;
    overflow: hidden;
} */
    </style> 
</head>
<body>
    <div class="container">
        <header>Your Location</header>

        <form action="#" method="post" class="location">
            <div class="form first">
                <span class="title">Family Location</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Country</label>
                            <input type="text" value="RWANDA" disabled>
                        </div>

                        <div class="input-field">
                            <label>Province</label>
                            <select name="province" id="" required>
                                <option value="KIGALI CITY">Kigali City</option>
                                <option value="NORTH">Northern Province</option>
                                <option value="SOUTH">Southern Province</option>
                                <option value="WEST">Western Province</option>
                                <option value="EAST">Eastern Province</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>District</label>
                            <input type="text" name="district" title="Enter your district!" placeholder="Enter your district" required>
                        </div>

                        <div class="input-field">
                            <label>Sector</label>
                            <input type="text" name="sector" title="Enter your sector!" placeholder="Enter your sector" required>
                        </div>

                        <div class="input-field">
                            <label>Cell</label>
                            <input type="text" name="cell" title="Enter your cell!" placeholder="Enter your cell" required>
                        </div>

                        <div class="input-field">
                            <label>Village</label>
                            <input type="text" name="village" title="Enter your village!" placeholder="Enter your village" required>
                        </div>
                    </div>

<?php
while ($count= mysqli_fetch_array($sql)) {
?>
            <input type="hidden" name="fam_owners" value="<?php echo $count['fa_firstname']; echo ' '. $count['fa_lastname'];?>">
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
    $province= $_POST['province'];
    $district= $_POST['district'];
    $sector= $_POST['sector'];
    $cell= $_POST['cell'];
    $village= $_POST['village'];
    $fam= $_POST['fam_owners'];
    $value= $id;
    $user= $_POST['username'];

    $sql= "INSERT INTO fam_location(province, district, sector, cell, village, fam_owners, fo_id, username) VALUES('$province', '$district', '$sector', '$cell', '$village', '$fam', '$value', '$user')";
    $result= mysqli_query($conn, $sql);
    if ($result == true) {
        echo "<script>location.href= '../location.php'</script>";
    }
}
?>
<?php
}}
?>