<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>question</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../footer/footer.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        #submit {
            width: fit-content;
            height: fit-content;
            padding: .3rem 1rem;
            font-weight: 600;

        }

        .sems {
            display: flex;
            align-items: center;
            gap: 1rem;

        }

        .cont {
            min-height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            background-color: rgb(22, 82, 160);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.445);
            padding: 1rem 0rem;
            border-radius: .5rem;
        }

        #submit {
            height: 50px;
            width: 120px;
            position: relative;
            border-radius: .5rem;
            isolation: isolate;
            font-size: larger;
            font-weight: 700;
            transition: 500ms ease-in-out;
            overflow: hidden;
        }

        #submit::before {
            content: "";
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: hsl(0, 100.00%, 56.90%);
            border-radius: 50%;
            left: 0;
            top: 0;
            visibility: hidden;
            z-index: -1;
            transition: transform 200ms ease-in-out;
        }

        #submit>span:first-child {
            content: "";
            border-radius: .5rem;
            width: 100%;
            height: 100%;
            background-color: rgb(120, 255, 93);
            position: absolute;
            left: 0;
            top: 0;
            transform: translateX(-130px);
            transition: transform 150ms ease-in;
            z-index: -1;
        }

        #submit>span:last-child {
            content: "";
            border-radius: .5rem;
            width: 100%;
            height: 100%;
            background-color: rgb(0, 204, 27);
            position: absolute;
            left: 0;
            top: 0;
            transform: translateX(130px);
            transition: transform 300ms ease-in;
            z-index: -1;
        }

        #submit:hover::before {
            visibility: visible;
            transform: scale(50);
        }

        #submit:hover span:first-child {
            transform: translateX(0px);
        }

        #submit:hover span:last-child {
            transform: translateX(0px);
        }

        #submit:hover {
            color: rgb(255, 255, 255);
        }

        .content select {
            border: 1px solid white;
            background-color: #ffffff79;
            border-radius: .2rem;
            transition: transform .3s ease-in-out;
        }

        #Title {
            border: 1px solid white;
            background-color: #ffffff79;
            border-radius: .2rem;
            padding: .1rem .5rem;
            transition: transform .3s ease-in-out;
        }

        #Title:hover {
            transform: translateX(10px);
            box-shadow: 0 0 10px rgba(63, 63, 63, 0.288);
        }

        .content select:hover {
            transform: translateX(10px);
            box-shadow: 0 0 10px rgba(63, 63, 63, 0.288);
        }

        #Title::placeholder {
            color: black;
            padding: .1rem .2rem;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <?php
    include("../nav.php");
    include("../connection.php");

    ?>
    <div style="background-image: linear-gradient(60deg, #96deda 0%, #50c9c3 100%);;">
        <h1 class="text-center text-black font-weight-bold p-3 display-4">
            Questions
        </h1>
    </div>
    <?php
    if ($_SESSION['role'] == "student" || $_SESSION['role'] == "professor") {
        echo '
        <div class="container mt-4">
        <div class="table-responsive">
            <table class="table border-radius-1 table-bordered table-hover">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="p-2 text-center">
                            Question No
                        </th>
                        <th class="p-2 text-center">
                            Name
                        </th>
                        <th class="p-2 text-center">
                            File
                        </th>
                        <th class="p-2 text-center">
                            Date
                        </th>
                        ';
                        if($_SESSION['role']!="student"){

                            echo '<th class="p-2 text-center">
                            Delete
                            </th>';
                        }
                        echo '
                    </tr>
                </thead>
                <tbody>';
                    $sem=$_SESSION['p_sem'];
                    $query = "SELECT * FROM questions $sem;";
                    try {
                        $run = mysqli_query($connection, $query);
                    } catch (Exception $e) {
                    echo "<tr>
                        " . $e . "
                    </tr>";
                    echo 
                        die();
                    }
                    if (mysqli_num_rows($run) > 0) {
                        while ($data = mysqli_fetch_assoc($run)) {
                            echo '
                            <tr>
                                <td class="p-2 text-center">
                                    ' . $data['question_no'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Title'] . '
                                </td>
                                <td class="p-2 text-center">
                                <a href="../docs/' . $data['File'] . '" download>
                                ' . $data['File'] . '</a>
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['date'] . '
                                </td>
                                ';
                                if($_SESSION['role']!="student"){
                                    echo '
                                <td class="p-2 text-center">
                                    <a href="question.php?id=' . $data['question_no'] . '&path=../docs/' . $data['File'] . '">
                                        <button id="submit">Remove</button>
                                    </a>
                                </td>
                                </tr>';
                                } 
                        }
                        } else {
                        echo '
                        <tr>
                            <p>No Question Found.</p>
                        </tr>';
                    }
                   echo '         </tr>
                        </tbody>
                    </table>
                </div>
            </div>';
    }
    if ($_SESSION['role'] == "professor") {
        echo '<div class="container">
        <form action="question.php" method="post" enctype="multipart/form-data" class="m-5 text-white cont">
            <div class="pl-5 pt-3">
                <label for="Titile" class="font-weight-bold">Question Title</label>
                <input type="text" name="qname" id="Title" placeholder="Question Title" required>
            </div>
            <div class="pl-5 pt-3 sems font-weight-bold">
                Department
                <select name="dept" required>
                    <option value="">Choose Department</option>
                    <option value="BCA">BCA</option>
                    <option value="BBA">BBA</option>
                    <option value="MCA">MCA</option>
                    <option value="MBA">MBA</option>
                    <option value="BCS">BSc CS</option>
                    <option value="DCA">DCA</option>
                    <option value="EE">BTECH-EE</option>
                    <option value="CSE">BTECH-CSE</option>
                    <option value="CE">BTECH-ME</option>
                    <option value="ME">BTECH-CE</option>
                </select>

            </div>
            <div class="pl-5 pt-3 pb-3 sems text-white font-weight-bold">
                Semester
                <select name="semester" required>
                    <option value="">Choose Semester</option>
                    <option value="First">First Semester</option>
                    <option value="Second">Second Semester</option>
                    <option value="Third">Third Semester</option>
                    <option value="Fourth">Fourth Semester</option>
                    <option value="Fifth">Fifth Semester</option>
                    <option value="Sixth">Sixth Semester</option>
                </select>
            </div>
            <div class="pl-5">
                <label for="filedocs" class="font-weight-bold">Upload Document
                    <img src="../profiles/folder.png" alt="" width="30px" style="cursor: pointer;">
                </label>
                <input type="file" name="docs" id="filedocs" style="display: none;" required>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" id="submit">
                    <span></span>
                    Submit
                    <span></span>
                </button>
            </div>
        </form>
    </div>';
    }
    include("../footer/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module">
        import Swal from 'sweetalert2';
    </script>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $titile = $_POST['qname'];
    $dept = $_POST['dept'];
    $sem = $_POST['semester'];
    $docs_name = $_FILES['docs']['name'];
    $docs_type = $_FILES['docs']['type'];
    $path = "../docs/" . $docs_name;
    if ($docs_type == "application/pdf") {
        $query = "INSERT INTO questions(Title,Department,Semester,File)
                VALUES
                ('$titile','$dept','$sem','$docs_name');";
        try {
            $run = mysqli_query($connection, $query);
        } catch (Exception $e) {
            echo "<p>
                " . $e . "
            </p>";
            echo "
            <script>
                window.alert($e);
            </script>";
            die();
        }
        move_uploaded_file($_FILES['docs']['tmp_name'], $path);
        echo "
            <script>
            Swal.fire({
                imageUrl: '../success.gif',
                imageHeight: 250,
                title:'Succesfull',
                text:'Question Added',
                imageAlt: 'A tall image'
            }).then(()=>{
                window.location.href='question.php';
            });
            </script>
        ";
    } else {
        echo '
        <script>
        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "The File Type Must Be Application/pdf",
        });
        </script>
        ';
    }
}
if (isset($_REQUEST['id']) && isset($_REQUEST['path'])) {
    $id = $_REQUEST['id'];
    $file_name = $_REQUEST['path'];
    if ($id) {
        $query = "DELETE FROM questions WHERE question_no='$id';";
        $run = mysqli_query($connection, $query);
        if ($run) {
            $val = unlink($file_name);
            echo "
            <script>
                Swal.fire({
                imageUrl: '../success.gif',
                imageHeight: 250,
                title:'Successfull',
                text:'File Is Deleted',
                imageAlt: 'A tall image'
            }).then(()=>{
                window.location.href='question.php';
            });
            </script>";
        }
    }
}
mysqli_close($connection);
?>