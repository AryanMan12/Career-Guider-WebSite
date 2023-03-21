<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../styles/admin_panel.css?<?php echo time(); ?>">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><button name="dashb" onclick="switchToPage('dashboard')" class="active">Dashboard</button></li>
                <li><button name="add_clg" onclick="switchToPage('addCollege')">Add College</button></li>
                <li><button name="view_clg" onclick="switchToPage('viewCollege')">View Colleges</button></li>
                <li><button name="add_qts" onclick="switchToPage('addQuestions')">Add Questions</button></li>
                <li><button name="view_qts" onclick="switchToPage('viewQuestions')">View Questions</button></li>
            </ul>
        </div>
        <div class="content">
            <div class="topbar">
                <div class="left">
                    <span class="logo">Course Guider</span>
                </div>
                <div class="right">
                    <ul>
                        <li><a href="./change_password.php">Change
                                Password</a></li>
                        <li><a href="./admin.php">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="main" id="main">
            </div>
            <div class="mainChild" id="dashboard">
                <div id="dashboardPage">
                    <h1>This is the Admin Panel</h1>
                </div>
            </div>
            <div class="mainChild" id="addCollege">
                <div id="addClgForm">
                    <form class="form" method="post">
                        <div class="title">Add College</div>
                        <div class="subtitle">Add College to your database...</div>
                        <div class="input-container ic1">
                            <input id="college_name" name="college_name" class="input" type="text" placeholder=" " />
                            <div class="cut"></div>
                            <label for="college_name" class="placeholder">College name</label>
                        </div>
                        <div class="input-container ic2">
                            <input id="college_description" name="college_desc" class="input" type="text" placeholder=" " />
                            <div class="cut"></div>
                            <label for="college_description" class="placeholder">College Description</label>
                        </div>
                        <div class="input-container ic2">
                            <input id="college_photo" name="college_photo" class="input" type="text" placeholder=" " />
                            <div class="cut"></div>
                            <label for="college_photo" class="placeholder">College Image Link</>
                        </div>
                        <div class="input-container ic2">
                            <input id="college_link" name="college_link" class="input" type="text" placeholder=" " />
                            <div class="cut"></div>
                            <label for="college_link" class="placeholder">College Website Link</>
                        </div>
                        <button name="addCollege" type="submit" class="submit">Add</button>
                    </form>
                </div>
            </div>
            <div class="mainChild" id="viewCollege">
                <div id="viewCollegePage" class="tableContainer">
                    <?php
                    makeCollegeTable()
                    ?>
                </div>
            </div>
            <div class="mainChild" id="addQuestions">
                <div id="addClgForm">
                    <form class="form2" method="post">
                        <div class="title">Add Question</div>
                        <div class="subtitle">Add Questions for Aptitue Test...</div>
                        <div class="input-container ic1">
                            <input name="question" id="question" class="input" type="text" placeholder=" " />
                            <div class="cut"></div>
                            <label for="question" class="placeholder">Question</label>
                        </div>
                        <div class="input-container ic2">
                            <input name="answer1" id="answer1" class="input inp2" type="text" placeholder=" " />
                            <div class="cut"></div>
                            <label for="answer1" class="placeholder">Answer 1</label>

                            <input name="career1" id="career1" class="inp2" type="text" placeholder=" " />
                            <div class="cut2"></div>
                            <label for="career1" class="placeholder2">Career</label>
                        </div>
                        <div class="input-container ic2">
                            <input name="answer2" id="answer2" class="input inp2" type="text" placeholder=" " />
                            <div class="cut"></div>
                            <label for="answer2" class="placeholder">Answer 2</label>

                            <input name="career2" id="career2" class="inp2" type="text" placeholder=" " />
                            <div class="cut2"></div>
                            <label for="career2" class="placeholder2">Career</label>
                        </div>
                        <div class="input-container ic2">
                            <input name="answer3" id="answer3" class="input inp2" type="text" placeholder=" " />
                            <div class="cut"></div>
                            <label for="answer3" class="placeholder">Answer 3</label>

                            <input name="career3" id="career3" class="inp2" type="text" placeholder=" " />
                            <div class="cut2"></div>
                            <label for="career3" class="placeholder2">Career</label>
                        </div>
                        <div class="input-container ic2">
                            <input name="answer4" id="answer4" class="input inp2" type="text" placeholder=" " />
                            <div class="cut"></div>
                            <label for="answer4" class="placeholder">Answer 4</label>

                            <input name="career4" id="career4" class="inp2" type="text" placeholder=" " />
                            <div class="cut2"></div>
                            <label for="career4" class="placeholder2">Career</label>
                        </div>
                        <button name="addQuestion" type="submit" class="submit">Add</button>
                    </form>
                </div>
            </div>
            <div class="mainChild" id="viewQuestions">
                <div id="viewCollegePage" class="tableContainer">
                    <?php
                    makeQuestionsTable()
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/admin_panel.js"></script>
</body>

</html>

<?php

$server = "localhost";
$username = "root";
$password = "aryan1212";
$database = "stream_analysis";

if (isset($_POST['addCollege'])) {
    addClgData($server, $username, $password, $database);
} else if (isset($_POST['addQuestion'])) {
    addTestData($server, $username, $password, $database);
}
function addClgData($server, $username, $password, $database)
{
    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
        echo "Not connected";
    }
    $college_name = $_POST['college_name'];
    $college_photo = $_POST['college_photo'];
    $college_desc = $_POST['college_desc'];
    $college_link = $_POST['college_link'];

    if (empty($college_desc) || empty($college_link) || empty($college_photo) || empty($college_name)) {
        echo "<script>alert('Fields cannot be empty'); window.location.replace('admin_panel.php');</script>";
    } else {
        $sql3 = "SELECT * FROM  college_info WHERE college_name = '$college_name'";
        $query = mysqli_query($con, $sql3);
        if ($query->num_rows > 0) {
            echo "<script>alert('College Already There!'); window.location.replace('admin_panel.php');</script>";
        } else {
            $sql = $con->prepare("INSERT INTO `college_info` (`college_name`, `college_desc`, `college_link`, `college_photo_url`) VALUES (?,?,?,?)");
            $sql->bind_param("ssss", $college_name, $college_desc, $college_link, $college_photo);
            echo "<script>alert('College Added')</script>";
            $sql->execute();
        }
    }
    $con->close();
}

function addTestData($server, $username, $password, $database)
{
    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
        echo "Not connected";
    }
    $question = $_POST['question'];

    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
    $answer3 = $_POST['answer3'];
    $answer4 = $_POST['answer4'];

    $career1 = $_POST['career1'];
    $career2 = $_POST['career2'];
    $career3 = $_POST['career3'];
    $career4 = $_POST['career4'];

    if (empty($answer1) || empty($answer2) || empty($answer3) || empty($answer4) || empty($career1) || empty($career2) || empty($career3) || empty($career4)) {
        echo "<script>alert('Fields cannot be empty'); window.location.replace('admin_panel.php');</script>";
    } else {
        $sql3 = "SELECT * FROM  test_questions WHERE questions = '$question'";
        $query = mysqli_query($con, $sql3);
        if ($query->num_rows > 0) {
            echo "<script>alert('Question Already Exists!'); window.location.replace('admin_panel.php');</script>";
        } else {
            $sql = $con->prepare("INSERT INTO `test_questions` (`questions`, `opt1`, `opt2`, `opt3`, `opt4`, `car1`, `car2`, `car3`, `car4`) VALUES (?,?,?,?,?,?,?,?,?)");
            $sql->bind_param("sssssssss", $question, $answer1, $answer2, $answer3, $answer4, $career1, $career2, $career3, $career4);
            echo "<script>alert('Question Added'); window.location.replace('admin_panel.php');</script>";
            $sql->execute();
        }
    }
    $con->close();
}

function makeCollegeTable()
{
    $server = "localhost";
    $username = "root";
    $password = "aryan1212";
    $database = "stream_analysis";
    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
        echo "Not connected";
    }
    $sql3 = "SELECT * FROM  college_info";
    $query = mysqli_query($con, $sql3);
    if (!$query) {
        echo "<h1>No College Data yet...</h1>";
    } else {
?>
        <table>
            <thead>
                <tr>
                    <th>College Name</th>
                    <th>College Description</th>
                    <th>College Url</th>
                    <th>College Photo Url</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr><td>{$row['college_name']}</td><td>{$row['college_desc']}</td><td>{$row['college_link']}</td><td>{$row['college_photo_url']}</td></tr>\n";
                }
                ?>
            </tbody>
        </table>

    <?php
    }
    $con->close();
}


function makeQuestionsTable()
{
    $server = "localhost";
    $username = "root";
    $password = "aryan1212";
    $database = "stream_analysis";
    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
        echo "Not connected";
    }
    $sql3 = "SELECT * FROM  test_questions";
    $query = mysqli_query($con, $sql3);
    if (!$query) {
        echo "<h1>No Questions yet...</h1>";
    } else {
    ?>
        <table>
            <thead>
                <tr>
                    <th>Questions</th>
                    <th>Option1</th>
                    <th>Option2</th>
                    <th>Option3</th>
                    <th>Option4</th>
                    <th>Career1</th>
                    <th>Career2</th>
                    <th>Career3</th>
                    <th>Career4</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr><td>{$row['questions']}</td><td>{$row['opt1']}</td><td>{$row['opt2']}</td><td>{$row['opt3']}</td><td>{$row['opt4']}</td><td>{$row['car1']}</td><td>{$row['car2']}</td><td>{$row['car3']}</td><td>{$row['car4']}</td></tr>\n";
                }
                ?>
            </tbody>
        </table>

<?php
    }
    $con->close();
}
?>