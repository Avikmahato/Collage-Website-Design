<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="attendance.css">
    <link rel="stylesheet" href="../attendance/css/bootstrap.css">
</head>
<?php
include("header.php");
session_start();
if (
    !isset($_SESSION['semester']) || !isset($_SESSION['current_year']) || !isset($_SESSION['condition'])
    || !isset($_SESSION['current_sem'])
) {
    $_SESSION['semester'] = "all";
    $_SESSION['condition'] = "";
    $_SESSION['current_year'] = "";
    $_SESSION['current_sem'] = "";
}
?>

<body style="display: block;">
    <div class="fs-6 display-4 text-center text-info font-weight-bold"><?php if (isset($_POST['choose'])) {
                                                                            if ($_POST['choose'] == "semester1" || $_POST['choose'] == "semester2") {
                                                                                echo "First Year";
                                                                            } elseif ($_POST['choose'] == "semester3" || $_POST['choose'] == "semester4") {
                                                                                echo "Second Year";
                                                                            } elseif ($_POST['choose'] == "semester5" || $_POST['choose'] == "semester6") {
                                                                                echo "Third Year";
                                                                            }
                                                                            if ($_POST['choose'] == "all") {
                                                                                echo "All Year";
                                                                            }
                                                                        }
                                                                        ?></div>
    <form method="post" class="d-flex justify-content-center">
        <select name="choose" id="semester" class="mt-4" onchange="this.form.submit();">
            <option value="all" selected>ALL SEMESTER</option>
            <option value="semester1" <?php if (isset($_POST['choose']) && $_POST['choose'] == "semester1") {
                                            echo "selected";
                                        } ?>>Semester I</option>
            <option value="semester2" <?php if (isset($_POST['choose']) && $_POST['choose'] == "semester2") {
                                            echo "selected";
                                        } ?>>Semester II</option>
            <option value="semester3" <?php if (isset($_POST['choose']) && $_POST['choose'] == "semester3") {
                                            echo "selected";
                                        } ?>>Semester III</option>
            <option value="semester4" <?php if (isset($_POST['choose']) && $_POST['choose'] == "semester4") {
                                            echo "selected";
                                        } ?>>Semester IV</option>
            <option value="semester5" <?php if (isset($_POST['choose']) && $_POST['choose'] == "semester5") {
                                            echo "selected";
                                        } ?>>Semester V</option>
            <option value="semester6" <?php if (isset($_POST['choose']) && $_POST['choose'] == "semester6") {
                                            echo "selected";
                                        } ?>>Semester VI</option>
        </select>
    </form>
    <form action="view_student.php" method="post" class="container">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr class="bg-danger">
                        <th class="text-center">Roll</th>
                        <th class="text-center">No</th>
                        <th class="text-center">Registration</th>
                        <th class="text-center">Class Roll</th>
                        <th class="text-center">Student Name</th>
                        <th class="text-center">Presence</th>
                    </tr>
                    <?php
                    include("../connection.php");
                    if (isset($_POST['choose'])) {
                        $_SESSION['semester'] = $_POST['choose'];
                    }
                    if ($_SESSION['semester'] == "all") {
                        $_SESSION['condition'] = "";
                        $_SESSION['current_year'] = "";
                        $_SESSION['current_sem'] = "";
                    } elseif ($_SESSION['semester'] == "semester1") {
                        $_SESSION['condition'] = "and Semester='First'";
                        $_SESSION['current_year'] = "first";
                        $_SESSION['current_sem'] = "First";
                    } elseif ($_SESSION['semester'] == "semester2") {
                        $_SESSION['condition'] = "and Semester='Second'";
                        $_SESSION['current_sem'] = "Second";
                        $_SESSION['current_year'] = "first";
                    } elseif ($_SESSION['semester'] == "semester3") {
                        $_SESSION['condition'] = "and Semester='Third'";
                        $_SESSION['current_sem'] = "Third";
                        $_SESSION['current_year'] = "second";
                    } elseif ($_SESSION['semester'] == "semester4") {
                        $_SESSION['condition'] = "and Semester='Fourth'";
                        $_SESSION['current_sem'] = "Fourth";
                        $_SESSION['current_year'] = "second";
                    } elseif ($_SESSION['semester'] == "semester5") {
                        $_SESSION['condition'] = "and Semester='Fifth'";
                        $_SESSION['current_sem'] = "Fifth";
                        $_SESSION['current_year'] = "third";
                    } elseif ($_SESSION['semester'] == "semester6") {
                        $_SESSION['condition'] = "and Semester='Sixth'";
                        $_SESSION['current_sem'] = "Sixth";
                        $_SESSION['current_year'] = "third";
                    }
                    $subquery = $_SESSION['condition'];
                    $query = "SELECT students.Name,students.Roll,No,Class_Roll,Registration,Presense FROM students," . $_SESSION['current_year'] . " 
            where students.Class_Roll=" . $_SESSION['current_year'] . ".Roll " . $subquery . " order by " . $_SESSION['current_year'] . ".Roll asc;";
                    if ($_SESSION['semester'] == "all") {
                        $query = "SELECT students.Name,students.Roll,No,Class_Roll,Registration,Presense FROM students,first where students.Class_Roll=first.Roll
            union 
            SELECT students.Name,students.Roll,No,Class_Roll,Registration,Presense FROM students,second where students.Class_Roll=second.Roll
            union
            SELECT students.Name,students.Roll,No,Class_Roll,Registration,Presense FROM students,third where students.Class_Roll=third.Roll";
                    }
                    $run = mysqli_query($connection, $query);
                    if ($run) {
                        if (mysqli_num_rows($run) > 0) {
                            while ($data = mysqli_fetch_assoc($run)) {
                                $_SESSION['roll'] = $data['Roll'];
                                echo '<tr class="">';
                                echo '<td>' . $data['Roll'] . '</td>';
                                echo '<td>' . $data['No'] . '</td>';
                                echo '<td>' . $data['Registration'] . '</td>';
                                echo '<td>' . $data['Class_Roll'] . '</td>';
                                echo '<td>' . $data['Name'] . '</td>';
                                echo '<td>' . $data['Presense'] . '</td>';
                                echo '</tr>';
                            }
                        }
                    }
                    if ($_SESSION['semester'] != "all") {
                        echo '<tr>';
                        echo '<td><input type="text" name="roll" placeholder="ROLL" required
                value="">
                <br>
                <input type="text" name="no" placeholder="NO" required >
                </td>';
                        echo '<td><input type="text" name="reg" placeholder="REGISTRATION" required>
                    <br>
                       <input type="text" name="croll" placeholder="CLASS ROLL" required>
                       </td>';
                        echo '<td>
                       <input type="text" name="mobile" placeholder="MOBILE NO" required>
                       <br>
                        <select name="s_sem" id="sem_inp" class="mt-4" required>
                        <option value="">SELECT SEMESTER</option>
                        <option value="First">First Semester</option>
                        <option value="Second">Second Semester</option>
                        <option value="Third">Third Semester</option>
                        <option value="Fourth">Fourth Semester</option>
                        <option value="Fifth">Fifth Semester</option>
                        <option value="Sixth">Sixth Semester</option>
                        </select>
             </td>';
                        echo '<td>
                <input type="text" name="s_id" placeholder="STUDENT ID" required>
                <br>
                <input type="text" name="name" id="" placeholder="NAME" required>
                </td>';
                        echo '<td><input type="text" name="email" placeholder="EMAIL" required>
                <br>
                <input type="text" name="passw" placeholder="PASSWORD" required>    
                </td>';
                        echo '<td><input type="submit" value="ADD" name="add" id="attendance"></td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
            </div>
    </form>
</body>

</html>
<?php
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $no = $_POST['no'];
    $croll = $_POST['croll'];
    $reg = $_POST['reg'];
    $sem = $_POST['s_sem'];
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_VALIDATE_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['passw'];
    $s_id = $_POST['s_id'];
    $query = "INSERT INTO students(student_id,Name,Roll,No,Class_Roll,Registration,Semester,Mobile,Email,password) VALUES
    ('$s_id','$name','$roll','$no','$croll','$reg','$sem','$mobile','$email','$password');";
    $run = mysqli_query($connection, $query);
    if ($run) {
        if ($sem == "First" || $sem == "Second") {
            mysqli_query($connection, "
            INSERT INTO first(Roll,Name)VALUES('$croll','$name');");
        } elseif ($sem == "Third" || $sem == "Fourth") {
            mysqli_query($connection, "
            INSERT INTO second(Roll,Name)VALUES('$croll','$name');");
        } elseif ($sem == "Fifth" || $sem == "Sixth") {
            mysqli_query($connection, "
            INSERT INTO third(Roll,Name)VALUES('$croll','$name');");
        }
        echo "
            <script>
            Swal.fire({
                imageUrl: '../success.gif',
                imageHeight: 250,
                title:'Succesfull',
                text:'Question Added',
                imageAlt: 'A tall image'
            }).then(()=>{
                window.location.href='view_student.php';
            });
            </script>
        ";
    }
}
if (isset($_POST['choose'])) {
    $sems = $_POST['choose'];
}
mysqli_close($connection);
?>