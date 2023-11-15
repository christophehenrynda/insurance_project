<?php
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h2>Login here...</h2>
    <form action="" method="post">
<?php
$sql= mysqli_query($conn, "SELECT * FROM admin");
if ($sql) {
    while ($row= mysqli_fetch_array($sql)) {
?>
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
<?php
    }
}
?>
        <input type="text" name="username" placeholder="Username" required autocomplete="on" spellcheck="false" minlength="5"><br><br>
        <input type="email" name="email" placeholder="Email" required autocomplete="on"><br><br>
        <div class="login">
            <input  class="show" type="password" name="password" placeholder="Password" required autocomplete="on" spellcheck="false">
        </div><br>
        <button type="submit" name="submit">Login</button>
        <button type="reset">Cancel</button>
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $id= $_POST['id'];
    $name= $_POST['username'];
    $email= $_POST['email'];
    $pwd= $_POST['password'];
    $_SESSION['valid']= $id;
    $_SESSION['name']= $name;

    $query= mysqli_query($conn, "SELECT * FROM admin WHERE username= '$name' AND email= '$email' AND password= '$pwd'");
    if ($query == true) {
        if (mysqli_fetch_array($query)) {
            if (isset($_SESSION['valid'])) {
                header('location: dashboard.php');
            }
        }
    }
}
?>
    <!-- <h2>Login here...</h2>
    <form action="" method="post">
    <div class="container">
      <div class="input-box">
        <input type="password" spellcheck="false" required />
        <label for="">Password</label>
        <i class="uil uil-eye-slash toggle"></i>
      </div>
    </div> -->

