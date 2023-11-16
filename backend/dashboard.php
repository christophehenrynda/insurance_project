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
    <link rel="stylesheet" href="css/side.css" />
    <!-- Boxicons CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      <div class="text">Dashboard</div>
    </section>

    <script src="js/side.js"></script>
  </body>
</html>