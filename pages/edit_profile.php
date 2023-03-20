<?php
session_start();
$uName = $_SESSION['username'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../styles/edit_profile.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <form class="row" method="post">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <?php
                    echo "<span class='font-weight-bold'>$uName</span>";
                    echo "<span class='text-black-50'>$email</span>";
                    ?>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Edit Profile</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="enter name">
                        </div>
                        <div class="col-md-12"><label class="labels">Profile Image</label>
                            <input type="text" name="img" class="form-control" placeholder="Image Url">
                        </div>
                        <div class="col-md-12"><label class="labels">About</label>
                            <input type="text" name="about" class="form-control" placeholder="enter about yourself">
                        </div>
                        <div class="col-md-12"><label class="labels">Email</label>
                            <?php
                            echo "<input type='text' name='email' class='form-control' placeholder= '$email' disabled>";
                            ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                            Hobbies</span></div><br>
                    <div class="col-md-12"><label class="labels">Hobbies</label>
                        <input type="text" name="hobbies" class="form-control" placeholder="enter Hobbies">
                    </div> <br>
                </div>
            </div>
            <div class="mt-5 text-center">
                <button name="save" class="btn btn-primary profile-button" type="submit">Save
                    Profile</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>

<?php
$server = "localhost";
$username = "root";
$password = "aryan1212";
$database = "stream_analysis";

if (isset($_POST['save'])) {
    SaveProfile($server, $username, $password, $database);
}

function SaveProfile($server, $username, $password, $database)
{
    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
        echo "Not connected";
    }
    $uName = $_SESSION['username'];

    $name = $_POST['name'];
    $img = $_POST['img'];
    $hobbies = $_POST['hobbies'];
    $about = $_POST['about'];


    $sql = "UPDATE `user_info` SET name= '$name', profile_url= '$img', about= '$about', hobbies= '$hobbies' WHERE username = '$uName'";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Profile Changed'); window.location.replace('edit_profile.php');</script>";
    } else {
        echo "<script>alert('Error!!'); window.location.replace('edit_profile.php');</script>";
    }

    $con->close();
}
?>