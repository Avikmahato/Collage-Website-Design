<?php
session_start();
if (!isset($_SESSION['role'])) {
    $_SESSION['p_id'] = "7777N";
    $_SESSION['p_name'] = "BIST";
    $_SESSION['profile_pic'] = "profile.jpg";
    $_SESSION['role'] = 'public';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Home/style.css">
    <link rel="stylesheet" href="./attendance/css/bootstrap.css">
</head>
<body>

    <header>
        <div>
            <big>B</big>
            <small>engal</small>
        </div>
        <div>
            <big>I</big>
            <small>nstitute Of</small>
        </div>
        <div>
            <big>S</big>
            <small>cience And</small>
        </div>
        <div>
            <big>T</big>
            <small>echnology</small>
        </div>
    </header>
    <nav>
        <?php
        if ($_SESSION['role'] != 'public') {
            echo '<div>';
            echo '<i class="fa-solid fa-bars" id="menu" onclick="op()"></i>';
            echo '</div>';
        }
        ?>
        <label for="respon">
            <?php
            echo '<img src="../profiles/' . $_SESSION['profile_pic'] . '" alt="error">';
            echo '<div>';
            echo '<p>' . $_SESSION['p_id'] . '</p>';
            echo '<p>' . $_SESSION['p_name'] . '</p>';
            echo '<p>' . $_SESSION['role'] . '</p>';
            ?>
            </div>
        </label>
        <input type="checkbox" id="respon" style="display: none;">
        <ul id="resp">
            <li>
                <a href="../Home/index.php">Home</a>
            </li>
            <li>
                <a href="../gallery/gallery.php">Gallery</a>
            </li>
            <li>
                <a href="../faculty/faculty.php">Faculty</a>
            </li>
            <li>
                <a href="../course/course.php">Courses</a>
            </li>
            <li>
                <a href="../contact/contact.php">Contact</a>
            <li>
            <li>
                <a href="../about/about.php">About Us</a>
            <li>
        </ul>
        <ul>
            <li>
                <a href="../Home/index.php">Home</a>
            </li>
            <li>
                <a href="../gallery/gallery.php">Gallery</a>
            </li>
            <li>
                <a href="../faculty/faculty.php">Faculty</a>
            </li>
            <li>
                <a href="../course/course.php">Courses</a>
            </li>
            <li>
                <a href="../contact/contact.php">Contact</a>
            <li>
            <li>
                <a href="../about/about.php">About Us</a>
            <li>
        </ul>
        <?php
        if ($_SESSION['role'] == "public") {
            echo '<div class="login">
            <a href="../login/index.php">
            <button type="button">Login</button>
            </a>
            </div>';
        }
        ?>
    </nav>
    <script src="https://cdn.botpress.cloud/webchat/v2.4/inject.js"></script>
    <script src="https://files.bpcontent.cloud/2025/05/07/18/20250507180202-4JGRDXR7.js"></script>
    <script src="home/script.js"></script>
</body>

</html>