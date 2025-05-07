<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="attendance.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="../footer/footer.css">
</head>
<?php
include("header.php");
?>

<body style="display: block;">
    <form class="container" action="attendance.php" method="post">
        <div class="container-lg">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">Student Roll</th>
                        <th class="text-center">Student Name</th>
                        <th class="text-center">
                            <form method="post">
                                <select name="week" id="semester" onchange="this.form.submit();">
                                    <option value="all" selected>All Semester</option>
                                    <option value="Semester1" <?php if (isset($_POST['week']) && $_POST['week'] == "Semester1") {
                                                                    echo "selected";
                                                                } ?>>Semester I</option>
                                    <option value="Semester2" <?php if (isset($_POST['week']) && $_POST['week'] == "Semester2") {
                                                                    echo "selected";
                                                                } ?>>Semester II</option>
                                    <option value="Semester3" <?php if (isset($_POST['week']) && $_POST['week'] == "Semester3") {
                                                                    echo "selected";
                                                                } ?>>Semester III</option>
                                    <option value="Semester4" <?php if (isset($_POST['week']) && $_POST['week'] == "Semester4") {
                                                                    echo "selected";
                                                                } ?>>Semester IV</option>
                                    <option value="Semester5" <?php if (isset($_POST['week']) && $_POST['week'] == "Semester5") {
                                                                    echo "selected";
                                                                } ?>>Semester V</option>
                                    <option value="Semester6" <?php if (isset($_POST['week']) && $_POST['week'] == "Semester6") {
                                                                    echo "selected";
                                                                } ?>>Semester VI</option>
                                </select>
                            </form>
                        </th>
                    </tr>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "collage");
                    if (isset($_POST['week'])) {
                        if ($_POST['week'] == "Semester1" || $_POST['week'] == "Semester2") {
                            $_SESSION['current_year'] = "first";
                        } elseif ($_POST['week'] == "Semester3" || $_POST['week'] == "Semester4") {
                            $_SESSION['current_year'] = "second";
                        } elseif ($_POST['week'] == "Semester5" || $_POST['week'] == "Semester6") {
                            $_SESSION['current_year'] = "third";
                        }
                    }
                    if (!isset($_SESSION['current_year'])) {
                        $_SESSION['current_year'] = "third";
                    }
                    $query = "SELECT Name,Roll FROM " . $_SESSION['current_year'] . " order by Roll asc";
                    if (isset($_POST['current_year'])) {
                        if ($_POST['week'] == "all") {
                            $query = "SELECT Name,Roll FROM first union SELECT Name,Roll FROM second union
                     SELECT Name,Roll FROM third;";
                        }
                    }
                    $run = mysqli_query($conn, $query);
                    if (mysqli_num_rows($run) > 0) {
                        while ($data = mysqli_fetch_assoc($run)) {
                            echo '<tr>';
                            echo '<td  style="font-weight:600">' . $data['Roll'] . '</td>';
                            echo '<td>' . $data['Name'] . '</td>';
                            $name = $data['Name'];
                            $name = str_replace(" ", "", $name);
                            echo '<td class="w-auto"><input type="checkbox" name="' . $name . '" id="attend"></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo "<script>window.alert('No data found'); </script>";
                    }

                    // mysqli_close($conn);
                    ?>
                </table>
            </div>
        </div>
        <input type="submit" value="Submit" name="attend" id="attendance">
    </form>
    <?php
    include("../footer/footer.php");
    ?>
</body>

</html>
<?php
if (isset($_POST['attend'])) {
    $conn = mysqli_connect("localhost", "root", "", "collage");
    $query = "SELECT Roll,Name,presense from third";
    $run = mysqli_query($conn, $query);
    if (mysqli_num_rows($run) > 0) {
        while ($data = mysqli_fetch_assoc($run)) {
            $name = $data['Name'];
            $name = str_replace(" ", "", $name);
            if (isset($_POST[$name])) {
                $var = $_POST[$name];
                $roll = $data['Roll'];
                $count = $data['presense'];
                $update = "UPDATE third set presense=$count+1 where Roll='$roll';";
                $run2 = mysqli_query($conn, $update);
            }
        }
        if ($run2) {
            echo "<script>
                window.alert('Successfull');
            </script>;";
        }
    }
}
mysqli_close($conn);
?>