<?php
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp & LogIn Page</title>
    <link rel="shortcut icon" href="images/symbol.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">

    <link rel="stylesheet" href="css/style.css">

    <script src="js/script.js" defer></script>
</head>
<body>
<div id="home" class="crossfade">
        <figure></figure>
        <figure></figure>
        <figure></figure>
        <figure></figure>
        <figure></figure>
        <figure></figure>
        <figure></figure>
        <figure></figure>
    </div>
    <header>
        <nav class="navbar">
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            <a href="index.php" class="logo">
                <img src="images/symbol.png" alt="logo">
                <h2>Insurance Census System</h2>
            </a>
            <ul class="links">
                <span class="close-btn material-symbols-rounded">close</span>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
            <button class="login-btn">LOG IN</button>
        </nav>
    </header>

    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn material-symbols-rounded">close</span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome Back</h2>
                <p>Please log in using your personal information to stay connected with us.</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="" method="post">
<?php
$sql= mysqli_query($conn, "SELECT * FROM user_account");
if ($sql) {
    while ($row= mysqli_fetch_array($sql)) {
?>
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
<?php
    }
}
?>
                    <div class="input-field">
                        <input type="text" name="username" required>
                        <label>Username</label>
                    </div>
                    <div class="input-field">
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <a href="#" class="forgot-pass-link">Forgot password?</a>
                    <button type="submit" name="login">Log In</button>
                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="#" id="signup-link">Signup</a>
                </div>
            </div>
        </div>
        <div class="form-box signup">
            <div class="form-details">
                <h2>Create Account</h2>
                <p>To become a part of our community, please sign up using your personal information.</p>
            </div>
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form action="" method="post">
                <div class="input-field">
                        <input type="text" name="username" required>
                        <label>Username</label>
                    </div>
                    <div class="input-field">
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <div class="policy-text">
                        <input type="checkbox" id="policy">
                        <label for="policy">I agree the<a href="#" class="option">Terms & Conditions</a>
                        </label>
                    </div>
                    <button type="submit" name="submit">Sign Up</button>
                </form>
                <div class="bottom-link">
                    Already have an account? 
                    <a href="#" id="login-link">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $name= $_POST['username'];
    $email= $_POST['email'];
    $pwd= md5($_POST['password']);

    $query= mysqli_query($conn, "INSERT INTO user_account(username, email, password) VALUES('$name', '$email', '$pwd')");

    if ($query == true) {
        header('location: index.php');
    }
}
?>


<?php
if (isset($_POST['login'])) {
    $id= $_POST['id'];
    $name= $_POST['username'];
    $email= $_POST['email'];
    $pwd= md5($_POST['password']);
    $_SESSION['userid']= $id;
    $_SESSION['username']= $name;

    $query= mysqli_query($conn, "SELECT * FROM user_account WHERE username= '$name' AND email= '$email' AND password= '$pwd'");
    if ($query == true) {
        if (mysqli_fetch_array($query)) {
            if (isset($_SESSION['userid'])) {
                echo "<script>location.href= 'dashboard.php';</script>";
            }
        }
    }
}
?>