<?php
include("index.html");
include("../connection.php");
if($connection){
    if($_POST['save']){
        $name="Avik Mahato";
        $dept="BCA";
        $sem="Sixth";
        $reg="004000";
        $roll="42";
        $fathername=$_POST['father'];
        $mothername=$_POST['mother'];
        $bgroup=$_POST['blood'];
        $gender=$_POST['gender'];
        $village=$_POST['village'];
        $pstation=$_POST['police'];
        $district=$_POST['district'];
        $state=$_POST['state'];
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];
        $profile_name=$_FILES['profile']['name'];
        $profile_tmpname=$_FILES['profile']['tmp_name'];
        $path="profiles/".$profile_name;
        $query="INSERT INTO students(profile_picture,Name,Roll,Registration,Department,
        Semester,Father,Mother,Blood,Gender,Village,Police_Station,District,State,
        Mobile,Email)
        VALUES
        ('$profile_name','$name','$roll','$reg','$dept','$sem','$fathername','$mothername','$bgroup'
        ,'$gender','$village','$pstation','$district','$state','$mobile','$email')";
    $run=mysqli_query($connection,$query);
    if($run){
        move_uploaded_file($profile_tmpname,$path);
        echo "<script>
            window.alert('Regsitred Succesfull');
        </script>";
        sleep(1);
        echo "<script>
            window.locationnn.href='index.html';
        </script>";

    } 
    else{
        echo "<script>
        window.alert('Something Is Wrong');
    </script>";
    }   
}
}
?>