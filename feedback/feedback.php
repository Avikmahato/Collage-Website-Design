<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedback</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .feedback {
            width: 100dvw;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .feedback li {
            max-width: 90dvw;
            margin-inline: auto;
            padding: .5rem .5rem;
            margin: 1rem 0rem;
            border-radius: .5rem;
            background-image: linear-gradient(60deg, #96deda 0%, #50c9c3 100%);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.26);
        }

        .profile {
            width: 80dvw;
            display: flex;
            align-items: center;
            gap: 1rem;
            color: rgb(255, 255, 255);
            text-shadow: 1px 1px 1px rgb(0, 0, 0);
            padding: .3rem 1rem;
        }

        .profile>div {
            display: flex;
            flex-direction: column;
        }

        .profile img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background-position: center;
            transition: transform .5s ease-out;
        }
        .profile img:hover{
            transform: scale(1.5);
        }
        #feed {
            width: 400px;
            padding: .5rem 1rem;
            border: none;
            border-radius: .3rem;
        }

        .message {
            width: 80dvw;
            padding: .1rem 1rem;
            color: white;
        }

        .image1 {
            width: 40px;
            height: 40px;
            overflow-y: hidden;
            overflow-x: hidden;
            border-radius: 50%;
        }

        .message>p {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            padding: .1rem 1.5rem;
            color: rgb(75, 75, 75);
        }

        .head {
            color: white;
            text-align: center;
            padding: 1rem 0rem;
            background-color: rgb(22, 82, 160);
        }
        .feedback ul{
            height: 500px;
            overflow-y: scroll;
            scrollbar-color:rgba(150, 222, 219, 0.49);
        }
        .login {
            width: 5rem;
            min-height: 2rem;
            height: 40px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            position: relative;
            margin: 0rem 1rem;
            transition: .5s ease-in-out;
            z-index: 121;
        }
    </style>
    <link rel="stylesheet" href="../course/">
</head>

<body>
    <div class="head">
        <h1>
            Student Feedback
        </h1>
    </div>
    <div class="feedback">
            <?php
                include("../connection.php");
                echo '
                <ul>
                <li style="list-style: none;">';
            if ($_SESSION['role'] == "student") {
                echo '
                <form action="#" method="post">
                <div class="profile">
                <div class="image1">
                <img src="../profiles/' . $_SESSION['profile_pic'] . '" alt="">
                </div>
                <div>
                <big style="font-weight: 600;">' . $_SESSION['p_name'] . '</big>
                <smaLL>' . $_SESSION['p_dept'] . '</smaLL>
                </div>
                <input type="text" name="feed" id="feed" placeholder="HOW IT IS">
                <input type="submit" name="feedback" value="Submit" class="login">
                </div>
                </form>
                    ';
                }
                echo '
                </li>
                ';
                $fetch_query = "SELECT * FROM feedback;";
                $run = mysqli_query($connection, $fetch_query);
                if ($run) {
                    if (mysqli_num_rows($run) > 0) {
                        while ($data = mysqli_fetch_assoc($run)) {
                            echo '
                            <li style="list-style: none;">
                            <div class="profile">
                            <div class="image1" ">
                            <img src="../profiles/' . $data['profile'] . '" alt="">
                            </div>
                            <div>
                            <div>
                            <big style="font-weight: 600;">' . $data['Name'] . '</big>
                            </div>
                            <smaLL>' . $data['Department'] . '</smaLL>
                            </div>
                            </div>
                            <div class="message">
                            <p>' . $data['message'] . '</p>
                            </div>
                            </li>';
                        }
                    } else {
                        echo '
                        <li style="list-style: none;">
                            <p style="text-align:center; color:white;">No Feedback</p>
                        </li>';
                    }
                }
            if (isset($_POST['feedback'])) {
                $p_id = $_SESSION['p_id'];
                $name = $_SESSION['p_name'];
                $profile = $_SESSION['profile_pic'];
                $message = $_POST['feed'];
                $message = mysqli_real_escape_string($connection, $message);
                $dept = $_SESSION['p_dept'];
                $query = "INSERT INTO feedback (student_id,profile,Name,Department,message)
            VALUES
            ('$p_id','$profile','$name','$dept','$message')";
                $run = mysqli_query($connection, $query);
                if ($run) {
                    echo "
                    <script>
                    Swal.fire({
                        imageUrl: '../success.gif',
                        imageHeight: 250,
                        title:'Succesfull',
                        text:'Feedback Is Submited.',
                        imageAlt: 'A tall image'
                    }).then(()=>{
                        window.location.href='index.php';
                    });
                    </script>";
                } else {
                    echo "<script>
                window.alert('Not Submitted');
                </script>";
                }
            }
            // mysqli_close($connection);
            ?>
        </ul>
    </div>
</body>

</html>