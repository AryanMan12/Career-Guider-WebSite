<?php
session_start();

$server = "localhost";
$username = "root";
$password = "aryan1212";
$database = "stream_analysis";

$uName = $_SESSION['username'];

$question = "";
$ans1 = "";
$ans2 = "";
$ans3 = "";
$ans4 = "";


$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    echo "Not connected";
}

$sql3 = "SELECT * FROM `test_questions`";
$query = mysqli_query($con, $sql3);
if (!$query) {
    echo "<h1>No Questions yet...</h1>";
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Test Page</title>
        <link rel="stylesheet" href="../styles/test_page.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>

    <body>
        <form class="container mt-sm-5 my-1" method="post">
            <h1 id="pagetitle">Welcome to the Test</h1>
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <?php
                while ($row = mysqli_fetch_assoc($query)) {
                    $question = $row['questions'];
                    $ans1 = $row['opt1'];
                    $ans2 = $row['opt2'];
                    $ans3 = $row['opt3'];
                    $ans4 = $row['opt4'];
                    $car1 = $row['opt1'];
                    $car2 = $row['opt2'];
                    $car3 = $row['opt3'];
                    $car4 = $row['opt4'];
                    echo "<div class='py-2 h5'><b>'$question'</b></div>";
                ?>
                    <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                        <?php
                        echo "<label class='options'>'$ans1'";
                        echo "<input type='radio' value='$car1' name=$question>";
                        ?>
                        <span class="checkmark"></span>
                        </label>
                        <?php
                        echo "<label class='options'>'$ans2'";
                        echo "<input type='radio' value='$car2' name=$question>";
                        ?>
                        <span class="checkmark"></span>
                        </label>
                        <?php
                        echo "<label class='options'>'$ans3'";
                        echo "<input type='radio' value='$car3' name=$question>";
                        ?>
                        <span class="checkmark"></span>
                        </label>
                        <?php
                        echo "<label class='options'>'$ans4'";
                        echo "<input type='radio' value='$car4' name=$question>";
                        ?>
                        <span class="checkmark"></span>
                        </label>
                    </div>
            <?php
                }
            }

            ?>
            </div>
            <div class="ml-auto mr-sm-5">
                <button class="btn btn-success" type="submit" name="results">Show Results</button>
            </div>
        </form>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>

    </html>

    <?php

    if (isset($_POST['results'])) {
        calcResults($server, $username, $password, $database);
    }

    function calcResults($server, $username, $password, $database)
    {

        $con = mysqli_connect($server, $username, $password, $database);
        if (!$con) {
            echo "Not connected";
        }
        $sql3 = "SELECT * FROM `test_questions`";
        $query = mysqli_query($con, $sql3);
        if (!$query) {
            echo "<h1>No Questions yet...</h1>";
        } else {
            $answers = array();
            while ($row = mysqli_fetch_assoc($query)) {
                $quest = $row['questions'];
                $val = $_POST[$quest];
                array_push($answers, $val);
            }
            $counts = array_count_values($answers);
            $top = array_keys($counts);
            $_SESSION["Result"] = $top[0];
            header('Location:' . 'results_page.php');
        }
        $con->close();
    }


    ?>