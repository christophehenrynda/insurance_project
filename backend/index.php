<?php
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/forms.css">
</head>
<body>
    <div id="container" class="container">
<!-- FORM SECTION -->
		<div class="row">
			<!-- SIGN UP -->
            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-up">
                        <form action="" method="post">
                            <div class="input-group">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" name="username" placeholder="Username" required>
                            </div>
                            <div class="input-group">
                                <i class="fa-solid fa-envelope"></i>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="input-group">
                            <i class="fa-solid fa-lock"></i>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>
                            <!-- <div class="input-group">
                                <i class="fa-solid fa-unlock"></i>
                                <input type="password" placeholder="Confirm password" required>
                            </div> -->
                            <button type="submit" name="submit">Sign up</button>
                            <p>
                                <span>Already have an account?</span>
                                <b onclick="toggle()" class="pointer">Sign in here</b>
                            </p>
                        </form>
                    </div>
                </div>
            
            </div>
			<!-- END SIGN UP -->


			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
				<div class="form-wrapper align-items-center">
					<div class="form sign-in">
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
                            <div class="input-group">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" name="username" placeholder="Username" required>
                            </div>
                            <div class="input-group">
                                <i class="fa-solid fa-envelope"></i>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="input-group">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" name="login">Sign in</button>
                            <!-- <p>
                                <b>
                                    Forgot password?
                                </b>
                            </p> -->
                            <p>
                                <span>Don't have an account?</span>
                                <b onclick="toggle()" class="pointer">Sign up here</b>
                            </p>
                        </form>
					</div>
				</div>
				<div class="form-wrapper">

				</div>
			</div>
			<!-- END SIGN IN -->
		</div>
<!-- END FORM SECTION -->



<!-- CONTENT SECTION -->
		<div class="row content-row">
			<!-- SIGN IN CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2>
						Welcome
					</h2>
	
				</div>
				<div class="img sign-in">
		
				</div>
			</div>
			<!-- END SIGN IN CONTENT -->

			<!-- SIGN UP CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="img sign-up">
				
				</div>
				<div class="text sign-up">
					<h2>
						Create Your Account
					</h2>
	
				</div>
			</div>
			<!-- END SIGN UP CONTENT -->
		</div>
<!-- END CONTENT SECTION -->
	</div>
    <script src="js/forms.js"></script>
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