<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="../styles/change_pass.css">
</head>

<body>
    <div class="mainDiv">
        <div class="cardStyle">
            <form method="post" name="signupForm" id="signupForm">

                <h2 class="formTitle">
                    Change Password
                </h2>

                <div class="inputDiv">
                    <label class="inputLabel" for="password">New Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="inputDiv">
                    <label class="inputLabel" for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword">
                </div>

                <div class="buttonWrapper">
                    <button type="submit" id="submitButton" name="changePass" class="submitButton pure-button pure-button-primary">
                        <span>Continue</span>
                    </button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>

<?php
$server = "localhost";
$username = "root";
$password = "aryan1212";
$database = "stream_analysis";


if (isset($_POST['changePass'])) {
    changePassword($server, $username, $password, $database);
}

function changePassword($server, $username, $password, $database)
{

    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
        echo "Not connected";
    }

    $username = $_SESSION['username'];
    $pass = $_POST['password'];
    $cPass = $_POST['confirmPassword'];


    if (strcmp($_SESSION['isStudent'], 'true') == 0) {
        $sql1 = "SELECT username FROM user_info WHERE username = '$username'";
    } else {
        $sql1 = "SELECT username FROM admin_info WHERE username = '$username'";
    }
    $query = mysqli_query($con, $sql1);
    if ($username == "") {
        echo "<script>alert('No User Found'); window.location.replace('login.php');</script>";
    } else if ($query->num_rows == 0) {
        echo "<script>alert('No User Found'); window.location.replace('login.php');
        </script>";
    } else if (strcmp($pass, $cPass) == 0) {
        if (strcmp($_SESSION['isStudent'], 'true') == 0) {
            $passwd = password_hash($pass, PASSWORD_DEFAULT);
            $sql = $con->prepare("UPDATE `user_info` SET `password` = ? WHERE username='$username'");
        } else {
            $passwd = $pass;
            $sql = $con->prepare("UPDATE `admin_info` SET `password` = ? WHERE username='$username'");
        }
        $sql->bind_param("s", $passwd);
        echo "<script>alert('Password Changed Successfully...');</script>";
        $sql->execute();
    } else {
        echo "<script>alert('Password did not matched!'); window.location.replace('change_password.php');
        </script>";
    }
    $con->close();
}


?>