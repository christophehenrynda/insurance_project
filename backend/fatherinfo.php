<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: index.php');
}
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Responsive Sidebar Menu HTML CSS | CodingNepal</title>
    <link rel="shortcut icon" href="images/symbol.png" type="image/x-icon">
    <link rel="stylesheet" href="css/.css" />
    <!-- Boxicons CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        /* Google Font Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
.sidebar{
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 78px;
  background: #11101D;
  padding: 6px 14px;
  z-index: 99;
  transition: all 0.5s ease;
}
.sidebar.open{
  width: 250px;
}
.sidebar .logo-details{
  height: 60px;
  display: flex;
  align-items: center;
  position: relative;
}
.sidebar .logo-details .icon{
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details .icon,
.sidebar.open .logo-details .logo_name{
  opacity: 1;
}
.sidebar .logo-details #btn{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  font-size: 22px;
  transition: all 0.4s ease;
  font-size: 23px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details #btn{
  text-align: right;
}
.sidebar i{
  color: #fff;
  height: 60px;
  min-width: 50px;
  font-size: 28px;
  text-align: center;
  line-height: 60px;
}
.sidebar .nav-list{
  margin-top: 20px;
  height: 100%;
}
.sidebar li{
  position: relative;
  margin: 8px 0;
  list-style: none;
}
.sidebar li .tooltip{
  position: absolute;
  top: -20px;
  left: calc(100% + 15px);
  z-index: 3;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 15px;
  font-weight: 400;
  opacity: 0;
  white-space: nowrap;
  pointer-events: none;
  transition: 0s;
}
.sidebar li:hover .tooltip{
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
  top: 50%;
  transform: translateY(-50%);
}
.sidebar.open li .tooltip{
  display: none;
}
.sidebar input{
  font-size: 15px;
  color: #FFF;
  font-weight: 400;
  outline: none;
  height: 50px;
  width: 100%;
  width: 50px;
  border: none;
  border-radius: 12px;
  transition: all 0.5s ease;
  background: #1d1b31;
}
.sidebar.open input{
  padding: 0 20px 0 50px;
  width: 100%;
}
.sidebar .bx-search{
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  font-size: 22px;
  background: #1d1b31;
  color: #FFF;
}
.sidebar.open .bx-search:hover{
  background: #1d1b31;
  color: #FFF;
}
.sidebar .bx-search:hover{
  background: #FFF;
  color: #11101d;
}
.sidebar li a{
  display: flex;
  height: 100%;
  width: 100%;
  border-radius: 12px;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
  background: #11101D;
}
.sidebar li a:hover{
  background: #FFF;
}
.sidebar li a .links_name{
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: 0.4s;
}
.sidebar.open li a .links_name{
  opacity: 1;
  pointer-events: auto;
}
.sidebar li a:hover .links_name,
.sidebar li a:hover i{
  transition: all 0.5s ease;
  color: #11101D;
}
.sidebar li i{
  height: 50px;
  line-height: 50px;
  font-size: 18px;
  border-radius: 12px;
}
.sidebar li.profile{
  position: fixed;
  height: 60px;
  width: 78px;
  left: 0;
  bottom: -8px;
  padding: 10px 14px;
  background: #1d1b31;
  transition: all 0.5s ease;
  overflow: hidden;
}
.sidebar.open li.profile{
  width: 250px;
}
.sidebar li .profile-details{
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
}
.sidebar li img{
  height: 45px;
  width: 45px;
  object-fit: cover;
  border-radius: 6px;
  margin-right: 10px;
}
.sidebar li.profile .name,
.sidebar li.profile .job{
  font-size: 15px;
  font-weight: 400;
  color: #fff;
  white-space: nowrap;
}
.sidebar li.profile .job{
  font-size: 12px;
}
.sidebar .profile #log_out{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  background: #1d1b31;
  width: 100%;
  height: 60px;
  line-height: 60px;
  border-radius: 0px;
  transition: all 0.5s ease;
}
.sidebar.open .profile #log_out{
  width: 50px;
  background: none;
}
.home-section{
  position: relative;
  background: #E4E9F7;
  min-height: 100vh;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
}
.sidebar.open ~ .home-section{
  left: 250px;
  width: calc(100% - 250px);
}
.home-section .text{
  display: inline-block;
  color: #11101d;
  margin: 18px;
}
@media (max-width: 420px) {
  .sidebar li .tooltip{
    display: none;
  }
}

    </style>
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus icon"></i>
        <div class="logo_name">Insurance</div>
        <i class="bx bx-menu" id="btn"></i>
      </div>
      <ul class="nav-list">
        <li>
          <i class="bx bx-search"></i>
          <input type="text" placeholder="Search..." />
          <span class="tooltip">Search</span>
        </li>
        <li>
          <a href="dashboard.php">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Home</span>
          </a>
          <span class="tooltip">Home</span>
        </li>
        <li>
          <a href="fatherinfo.php">
          <i class="fa-solid fa-user"></i>
            <span class="links_name">Father Information</span>
          </a>
          <span class="tooltip">Father Information</span>
        </li>
        <li>
          <a href="motherinfo.php">
          <i class="fa-solid fa-person-dress"></i>
            <span class="links_name">Mother Information</span>
          </a>
          <span class="tooltip">Mother Information</span>
        </li>
        <li>
          <a href="childinfo.php">
          <i class="fa-solid fa-children"></i>
            <span class="links_name">Childs Information</span>
          </a>
          <span class="tooltip">Childs Information</span>
        </li>
        <li>
          <a href="fmembers.php">
          <i class="fa-solid fa-users"></i>
            <span class="links_name">Family Member(s)</span>
          </a>
          <span class="tooltip">Family Member(s)</span>
        </li>
        <li>
          <a href="location.php">
          <i class="fa-solid fa-location-dot"></i>
            <span class="links_name">Location</span>
          </a>
          <span class="tooltip">Location</span>
        </li>
        <li class="profile">
            <div class="profile-details">
                <img src="images/user.png" alt="profileImg" />
                <div class="name_job">
                    <div class="name"><?php echo strtoupper($_SESSION['username']);?></div>
                    <div class="job">Insurance System</div>
                </div>
          </div>
          <a href="logout.php"><i class="bx bx-log-out" id="log_out"></i></a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <div class="text">
      <div class="btn">
        <button><a href="add_family/add_father.php">Add your Information</a></button>
    </div>
    <div class="main">
        <table border="1">
            <thead>
                <th style="padding: 10px;">Father ID</th>
                <th style="padding: 10px;">First Name</th>
                <th style="padding: 10px;">Last Name</th>
                <th style="padding: 10px;">Father Insurance</th>
                <th style="padding: 10px;">Insurance Number</th>
                <th style="padding: 10px;">Place Of Grade</th>
                <th style="padding: 10px;">Grade Number</th>
                <th style="padding: 10px;">Telephone</th>
                <th style="padding: 10px;">National ID</th>
                <th style="padding: 10px;">Passport ID</th>
                <th style="padding: 10px;">Username</th>
                <th style="padding: 10px;">DATE</th>
                <th style="padding: 10px;" colspan="2">Operation</th>
            </thead>
<?php
$user= $_SESSION['username'];
$query= mysqli_query($conn, "SELECT * FROM famownerinfo WHERE username= '$user'");
if ($query) {
    while ($row= mysqli_fetch_array($query)) {
?>
            <tr>
                <td style="padding: 10px;"><?php echo $row['fo_id'];?></td>
                <td style="padding: 10px;"><?php echo $row['fa_firstname'];?></td>
                <td style="padding: 10px;"><?php echo $row['fa_lastname'];?></td>
                <td style="padding: 10px;"><?php echo $row['insurance'];?></td>
                <td style="padding: 10px;"><?php echo $row['insurance_nber'];?></td>
                <td style="padding: 10px;"><?php echo $row['placeOf_grade'];?></td>
                <td style="padding: 10px;"><?php echo $row['grade_nber'];?></td>
                <td style="padding: 10px;"><?php echo $row['fa_telephone'];?></td>
                <td style="padding: 10px;"><?php echo $row['fa_nat_id'];?></td>
                <td style="padding: 10px;"><?php echo $row['fa_pass_id'];?></td>
                <td style="padding: 10px;"><?php echo $row['username'];?></td>
                <td style="padding: 10px;"><?php echo $row['date'];?></td>
                <td style="padding: 10px;"><button><a href="operations.php?delete=<?php echo $row['fo_id'];?>">Delete</a></button></td>
                <td style="padding: 10px;"><button><a href="operations.php?update=<?php echo $row['fo_id'];?>">Update</a></button></td>
            </tr>
        </table>
    </div><br><br>
    <div class="button">
        <button><a href="add_family/add_location.php?location=<?php echo $row['fo_id'];?>">ADD Location</a></button>
        <button><a href="add_family/add_wife.php?wife=<?php echo $row['fo_id'];?>">ADD your wife</a></button>
        <button><a href="add_family/add_childs.php?childs=<?php echo $row['fo_id'];?>">ADD your childs</a></button>
        <button><a href="add_family/add_members.php?members=<?php echo $row['fo_id'];?>">ADD other family members</a></button>
    </div>
<?php
    }
}
?>
      </div>
    </section>
    <script src="js/side.js"></script>
  </body>
</html>
