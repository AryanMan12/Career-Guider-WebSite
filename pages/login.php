<?php
session_start();
$_SESSION['isStudent'] = 'true';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/login.css?<?php echo time(); ?>">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input name="username" type="text" placeholder="Username" />
                <input name="email" type="email" placeholder="Email" />
                <input name="password" type="password" placeholder="Password" />
                <button type="submit" name="sign_up">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input name="email" type="email" placeholder="Email" />
                <input name="password" type="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button type="submit" name="sign_in">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/8b2513931f.js" crossorigin="anonymous"></script>
    <script src="../js/front_end.js"></script>
</body>

</html>

<?php

$server = "localhost";
$username = "root";
$password = "aryan1212";
$database = "stream_analysis";


if (isset($_POST['sign_in'])) {
    Login($server, $username, $password, $database);
} else if (isset($_POST['sign_up'])) {
    SignUp($server, $username, $password, $database);
}

function Login($server, $username, $password, $database)
{
    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
        echo "Not connected";
    }
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql3 = mysqli_query($con, "SELECT * FROM  user_info WHERE email = '$email'");

    if (mysqli_num_rows($sql3) > 0) {
        $row = mysqli_fetch_assoc($sql3);
        $verify = password_verify($password, $row['password']);
        if ($verify == 1) {
            header('Location:' . 'home.php');
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $email;
        } else {
            echo "<script>alert('Incorrect Password'); window.location.replace('login.php');</script>";
        }
    } else {
        echo "<script>alert('Invalid Username'); window.location.replace('login.php');</script>";
    }
    $con->close();
}

function SignUp($server, $username, $password, $database)
{

    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
        echo "Not connected";
    }
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql1 = "SELECT username FROM user_info WHERE username = '$name'";
    $query = mysqli_query($con, $sql1);
    if ($name == "") {
        echo "<script>alert('Enter Valid Details'); window.location.replace('login.php');</script>";
    } else if ($query->num_rows > 0) {
        echo "<script>alert('Username already exists'); window.location.replace('login.php');
        </script>";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = $con->prepare("INSERT INTO `user_info` (`username`, `email`, `password`) VALUES (?,?,?)");
        $sql->bind_param("sss", $name, $email, $password);
        echo "<script>alert('Registered Sucessfully...');</script>";
        header('Location:' . 'home.php', true);
        $_SESSION['username'] = $name;
        $_SESSION['email'] = $email;
        $sql->execute();
    }
    $con->close();
}
?>