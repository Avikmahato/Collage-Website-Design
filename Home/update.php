<?php
include("../connection.php");
// include("../success.php");
session_start();
if ($connection) {
    if (isset($_POST['save'])) {
        $p_id=$_SESSION['p_id'];
        echo "PID Is ".$p_id;
        $fathername = $_POST['father'];
        $mothername = $_POST['mother'];
        $bgroup = $_POST['blood'];
        $gender = $_POST['gender'];
        $village = $_POST['village'];
        $pstation = $_POST['police'];
        $district = $_POST['district'];
        $state = $_POST['state'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $profile_name = $_FILES['profile']['name'];
        $profile_tmpname = $_FILES['profile']['tmp_name'];
        $path = "../profiles/" . $profile_name;
        $query = "UPDATE students set profile_picture='$profile_name',Father='$fathername',Mother='$mothername',
        Blood='$bgroup',Gender='$gender',Village='$village',Police_Station='$pstation',District='$district',State='$state',Mobile='$mobile',Email='$email'
        WHERE student_id='$p_id';";
        $update_profile="UPDATE feedback set profile='$profile_name'
        WHERE student_id='$p_id';";
        $run = mysqli_query($connection, $query);
        if ($run) {
            $update=mysqli_query($connection,$update_profile);
            move_uploaded_file($profile_tmpname, $path);
            $_SESSION['profile_pic']=$profile_name;
            echo "
            <script>
            Swal.fire({
                imageUrl: '../success.gif',
                imageHeight: 250,
                title:'Update Succesfull',
                text:'Your Information is Updated',
                imageAlt: 'A tall image'
            }).then(()=>{
                window.location.href='index.php';
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
            imageUrl: '../failed.gif',
            imageHeight: 150,
            title:'Update Failed',
            text:'Your Information Is/'s Updated.',
            imageAlt: 'A tall image'
            }).then(()=>{
            window.location.href='index.php';
            });
        </script>";
        }
    }
}
