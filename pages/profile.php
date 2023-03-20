<?php
session_start();

$server = "localhost";
$username = "root";
$password = "aryan1212";
$database = "stream_analysis";

$uName = $_SESSION['username'];
$email = $_SESSION['email'];

$dbName = "";
$about = "";
$prof_url = "";
$hobbies = "";

$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    echo "Not connected";
}

$sql3 = "SELECT * FROM `user_info` WHERE `username`='$uName'";
$query = mysqli_query($con, $sql3);
if (!$query) {
    echo "";
} else {
    $row = mysqli_fetch_assoc($query);
    $dbName = $row['name'];
    $about = $row['about'];
    $prof_url = $row['profile_url'];
    $hobbies = $row['hobbies'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="../styles/profile.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">

                    <div class="text-center">
                        <?php

                        echo "<img src='$prof_url' width='100' object-fit='cover' class='rounded-circle'>";
                        ?>
                    </div>
                    <div class="text-center mt-3">
                        <span class="bg-secondary p-1 px-4 rounded text-white">Student</span>
                        <?php

                        echo "<h5 class='mt-2 mb-0'>$dbName</h5>
                        <span>$hobbies</span>
                        <div class='px-4 mt-1'>
                            <p class='fonts'>$about</p>
                        </div>";
                        ?>
                        <div class="buttons">
                            <button onclick="javascript:history.go(-1)" class="btn btn-outline-primary px-4">Go
                                Back</button>
                            <button class="btn btn-primary px-4 ms-3"><a href="./edit_profile.php">Edit</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>