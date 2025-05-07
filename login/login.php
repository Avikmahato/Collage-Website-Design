<?php
include("../connection.php");
if (isset($_POST['Login'])) {
    $f_id = $_POST['f_id'];
    $password = $_POST['password'];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_VALIDATE_INT);
    $query = "SELECT f_id,profile,Name,email,mobile,password,role from professors where f_id='$f_id';";
    // $check=$_POST['check'];
    $run = mysqli_query($connection, $query);
    if ($run) {
        if (mysqli_num_rows($run) > 0) {
            while ($data = mysqli_fetch_assoc($run)) {
                if (
                    $f_id == $data['f_id'] && $email == $data['email'] && $mobile == $data['mobile']
                    && $password == $data['password']
                ) {
                    session_start();
                    $_SESSION['p_id'] = $f_id;
                    $_SESSION['profile_pic'] = $data['profile'];
                    $_SESSION['role'] = $data['role'];
                    $_SESSION['p_name'] = $data['Name'];
                    $_SESSION['p_sem'] = '';
                    echo "
                    <script>
                    window.location.href='../home/index.php';
                    </script>";
                } else {
                    echo "
                    <script>
                    Swal.fire({
                    imageUrl: '../failed.gif',
                    imageHeight: 150,
                    title:'Login Failed!!!',
                    text:'Something Is Wrong',
                    imageAlt: 'A tall image'
                    }).then(()=>{
                    window.location.href='../login/index.php';
                    });
                    </script>";
                }
            }
        }
    } else {
        echo "
        <script>
        window.alert('Something Is Wrong');
        </script>;";
    }
}
if (isset($_POST['submit'])) {
    try{
        $student_id = $_POST['s_id'];
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $reg = $_POST['reg_no'];
        $password = $_POST['pass'];
        // $check=$_POST['check'];
        $query = "SELECT student_id,profile_picture,Name,Registration,Department,Semester,email,password FROM students where student_id='$student_id';";
        $run = mysqli_query($connection, $query);
        if ($run) {
            if (mysqli_num_rows($run) > 0) {
                $data = mysqli_fetch_assoc($run);
                if ($email == $data['email'] && $reg == $data['Registration'] && $password == $data['password']) {
                    session_start();
                    $_SESSION['p_id'] = $student_id;
                    $_SESSION['profile_pic'] = $data['profile_picture'];
                    $_SESSION['role'] = "student";
                    $_SESSION['p_name'] = $data['Name'];
                    $_SESSION['p_dept'] = $data['Department'];
                    $_SESSION['p_sem'] = 'WHERE Semester=\'' . $data['Semester'] . '\'';
                    echo "
                    <script>
                    window.location.href='../home/index.php';
                    </script>";
                } else {
                    echo "<script>
                        Swal.fire({
                        imageUrl: '../failed.gif',
                        imageHeight: 150,
                        title:'Login Failed!!!',
                        text:'Something Is Wrong',
                        imageAlt: 'A tall image'
                        }).then(()=>{
                        window.location.href='../login/index.php';
                        });
                    </script>";
                }
            } else {
                echo '<script>
                Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
                footer: /"<a href="#">Why do I have this issue?</a>/"
                });
                </script>';
            }
        } else {
            echo "<script>
            window.alert('Login Golmaal');
            </script>";
        }
    }catch(Exception $e){
        echo '<script>
        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "'.$e.'",
        footer: /"<a href="#">Why do I have this issue?</a>/"
        });
        </script>';
    }
}
?>