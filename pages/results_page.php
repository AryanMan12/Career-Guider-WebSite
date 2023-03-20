<?php
session_start();

$uName = $_SESSION['username'];
$res = $_SESSION['Result'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Results</title>
    <link rel="stylesheet" href="../styles/results.css">
</head>

<body>
    <div class="container">
        <p class="container-title">Well Answered <br> this is your Result</p>

        <div class="gradient-cards">
            <div class="card">
                <div class="container-card bg-green-box">

                    <?php echo "<p class='card-title'>$res</p>";
                    ?>
                </div>
            </div>

        </div>
    </div>
</body>

</html>