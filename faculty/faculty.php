<?php
include("../nav.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculties</title>
    <link rel="stylesheet" href="faculty.css">
    <link rel="stylesheet" href="../footer/footer.css">
</head>

<body>
    <header>
        <h3>Our Faculties</h3>
    </header>
    <main>
        <?php
        $connect = mysqli_connect("localhost", "root", "", "collage");
        $query = "SELECT Profile,Name,Specialization From professors;";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<div class='profs'>";
                echo '<div class="faculty_image">';
                echo "<img src='../profiles/".$data['Profile']."' alt=''>";
                echo '</div>';
                echo '<div class="namedeg"> ';
                echo "<big style='font-weight:600;'>" . $data['Name'] . "</big>";
                echo "<small>" . $data['Specialization'] . "</small>";
                echo '</div>';
                echo "</div>";
            }
        } else {
            echo "<div class='profs'>";
            echo "<big>No Data Found</big>";
            echo "</div>";
        }
        mysqli_close($connect);
        ?>
        <?php
            if($_SESSION['role']=="admin"){

                echo '<a href="addfaculty.php" class="addprofs">
                    <img src="male.png" alt="">
                    <big>Add Professor</big>
                </a>';
            }
        ?>
    </main>
    <?php
        include("../footer/footer.php");
    ?>
    <script src="faculty.css"></script>
</body>

</html>