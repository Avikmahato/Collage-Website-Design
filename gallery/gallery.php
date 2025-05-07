<?php
include("../nav.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="gallery.css">
    <link rel="stylesheet" href="../Home/style.css">
    <link rel="stylesheet" href="../footer/footer.css">
</head>

<body>
    <header>
        <h2>Collage Gallery</h2>
    </header>
    <?php
    include("../connection.php");
    $query = "SELECT * FROM gallery;";
    $run = mysqli_query($connection, $query);
    echo '<div id="gallery">';
    if(mysqli_num_rows($run)>0){
        while($data=mysqli_fetch_assoc($run)){
            echo '<div class="images">';
            echo '<img src="images/'.$data['Image'].'" alt="fatal error">';
            echo '<p --paragraphs="'.$data['paragraph'].'"></p>';
            echo '</div>';
        }
    }
    else{
        echo '<div id="gallery">';
        echo '<div class="images">';
        echo '<img src="images/" alt="fatal error">';
        echo '<p --paragraphs="No Image Found"></p>';
        echo '</div>';
    }
    mysqli_close($connection);
    ?>
    <!-- <div class="images">
            <img src="images/image (2).jpg" alt="fatal error">
            <p --paragraphs="After Examination In JK Collage"></p>
        </div>
        <div class="images">
            <img src="images/image (3).jpg" alt="fatal error">
            <p --paragraphs="Mahesh and Arnab After Exam"></p>
        </div>
        <div class="images">
            <img src="images/image (4).jpg" alt="fatal error">
            <p --paragraphs="Subhash Park Servey"></p>
        </div>
        <div class="images">
            <img src="images/image (5).jpg" alt="fatal error">
            <p --paragraphs="First Day In Collage"></p>
        </div>
        <div class="images">
            <img src="images/image (6).jpg" alt="fatal error">
            <p --paragraphs="Last Class Of Second Semester"></p>
        </div>
        <div class="images">
            <img src="images/image (7).jpg" alt="fatal error">
            <p --paragraphs="Last Class Of Second Semester"></p>
        </div>
        <div class="images">
            <img src="images/image (8).jpg" alt="fatal error">
            <p --paragraphs="Before The Thunder Storm."></p>
        </div>
        <div class="images">
            <img src="images/image (9).jpg" alt="fatal error">
            <p --paragraphs="Lets Party"></p>
        </div>
        <div class="images">
            <img src="images/image (10).jpg" alt="fatal error">
            <p --paragraphs="Friendship Attractions"></p>
        </div>
        <div class="images">
            <img src="images/image (11).jpg" alt="fatal error">
            <p --paragraphs="Practice Time,University Inter-Collage Cricket Tournament"></p>
        </div>
        <div class="images">
            <img src="images/image (12).jpg" alt="fatal error">
            <p --paragraphs="Bapi Feels Shub Shub"></p>
        </div>
        <div class="images">
            <img src="images/image (13).jpg" alt="fatal error">
            <p --paragraphs="Its Selfie Time"></p>
        </div>
        <div class="images">
            <img src="images/image (14).jpg" alt="fatal error">
            <p --paragraphs="Lab Is The Place Where We Can Implement Out Thoughts"></p>
        </div>
        <div class="images">
            <img src="images/image (15).jpg" alt="fatal error">
            <p --paragraphs="Bapi needs some <br> "></p>
        </div>
        <div class="images">
            <a href="images/image (16).jpg"></a>
            <img download src="images/image (16).jpg" alt="fatal error">
            <p --paragraphs="After Completing Web Project, Its Rest Time"></p>
        </div> -->
    <?php
    if ($_SESSION['role'] == "professor") {
        echo '<form class="images" action="gallery.php" method="post" enctype="multipart/form-data">';
        echo '<label for="add_image">';
        echo '<img src="images/add_image.png" alt="404 not found" id="out">';
        echo '</label>';
        echo '<input type="text" name="paragraph" id="" placeholder="ABOUT THE IMAGE">';
        echo '<label for="upload">';
        echo '<p>Add Memories</p>';
        echo '</label>';
        echo '<input type="file" name="add_image" id="add_image" style="display: none;" required>';
        echo '<input type="submit" name="submit" id="upload" style="display: none;">';
        echo '</form>';
    }
    ?>
    </div>
    <?php 
        include("../footer/footer.php");
    ?>
    <script>
        document.getElementById("add_image").onchange=()=>{
            let output=document.getElementById("out");
            output.src=URL.createObjectURL(document.getElementById("add_image").files[0]);
        }
    </script>

</body>

</html>
<?php
include("../connection.php");
if ($connection) {
    if (isset($_POST['submit'])) {
        $paragraph = $_POST['paragraph'];
        $file_name = $_FILES['add_image']['name'];
        $temp_name = $_FILES['add_image']['tmp_name'];
        $path = 'images/' . $file_name;
        move_uploaded_file($temp_name, $path);
        $query = "INSERT INTO gallery(Image,paragraph)
                VALUES
                ('$file_name','$paragraph');";
        $run = mysqli_query($connection, $query);
        if ($run) {
            echo "<script>
           window.alert('Image Uploaded');
        </script>";
        sleep(1);
            echo "<script>
           window.location.href='../gallery/gallery.php';
        </script>";
        } else {
            echo "<script>
           window.alert('Upload Failed');
        </script>";
        }
    }
}
?>