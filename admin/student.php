<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student-list</title>
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

        .table-responsive-wrapper {
            overflow-x: auto;
            /* Enable horizontal scrolling */
            transform: scaleY(-1);
            /* Flip the container vertically */
        }

        .table-responsive-wrapper>.table-responsive {
            transform: scaleY(-1);
            /* Flip the table-responsive back to normal */
        }

        .table-responsive-wrapper>.table-responsive>.table {
            transform: scaleY(-1);
            /* Flip the table back to normal */
        }
    </style>
</head>

<body>
    <div style="background-image: linear-gradient(60deg, #96deda 0%, #50c9c3 100%);;">
        <h1 class="text-center text-black font-weight-bold p-3 display-4">
            Students
        </h1>
    </div>
    <div class="container mt-2">
        <div class="table-responsive">
            <table class="table border-radius-1 table-bordered table-hover">
                <thead class="bg-danger text-white">
                    <tr>
                        <th class="p-2 text-center">
                            Student Id
                        </th>
                        <th class="p-2 text-center">
                            Profile
                        </th>
                        <th class="p-2 text-center">
                            Name
                        </th>
                        <th class="p-2 text-center">
                            Roll
                        </th>
                        <th class="p-2 text-center">
                            No
                        </th>
                        <th class="p-2 text-center">
                            Class Roll
                        </th>
                        <th class="p-2 text-center">
                            Regsitration No
                        </th>
                        <th class="p-2 text-center">
                            Department
                        </th>
                        <th class="p-2 text-center">
                            Semester
                        </th>
                        <th class="p-2 text-center">
                            Father Name
                        </th>
                        <th class="p-2 text-center">
                            Mother Name
                        </th>
                        <th class="p-2 text-center">
                            Blood Group
                        </th>
                        <th class="p-2 text-center">
                            Gender
                        </th>
                        <th class="p-2 text-center">
                            Village
                        </th>
                        <th class="p-2 text-center">
                            Police Station
                        </th>
                        <th class="p-2 text-center">
                            District
                        </th>
                        <th class="p-2 text-center">
                            State
                        </th>
                        <th class="p-2 text-center">
                            Mobile
                        </th>
                        <th class="p-2 text-center">
                            Email
                        </th>
                        <th class="p-2 text-center">
                            Password
                        </th>
                        <th class="p-2 text-center">
                            Registered Date
                        </th>
                        <th>
                            Remove
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include("../connection.php");
                    try {
                        $query = 'SELECT * FROM students';
                        $run = mysqli_query($connection, $query);
                        if ($run && mysqli_num_rows($run) > 0) {
                            while ($data = mysqli_fetch_assoc($run)) {
                                echo '
                            <tr>
                                <td class="p-2 text-center">
                                    ' . $data['student_id'] . '
                                </td>
                                <td class="p-2 text-center">
                                    <img src="../profiles/' . $data['profile_picture'] . '" alt="" width="100px">
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Name'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Roll'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['No'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Class_Roll'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Registration'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Department'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Semester'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Father'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Mother'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Blood'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Gender'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Village'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Police_Station'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['District'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['State'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Mobile'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Email'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['password'] . '
                                </td>
                                <td class="p-2 text-center">
                                    ' . $data['Registry_Date'] . '
                                </td>
                                <td>
                                    <a href="student.php?id=' . $data['student_id'] . '&path=../profiles/' . $data['profile_picture'] . '&sem=' . $data['Semester'] . '&croll=' . $data['Class_Roll'] . '">
                                        <button id="submit">Remove</button>
                                    </a>
                                </td>
                            </tr>';
                            }
                        }
                    } catch (Exception $e) {
                        echo '
                            <script>
                                Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong!",
                                });
                            </script>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_REQUEST['id']) && isset($_REQUEST['path']) && isset($_REQUEST['sem']) && isset($_REQUEST['croll'])) {
    $id = $_REQUEST['id'];
    $file_name = $_REQUEST['path'];
    $sem = $_REQUEST['sem'];
    $croll = $_REQUEST['croll'];
    $query = "DELETE FROM students WHERE student_id='$id';";
    if ($sem == "First" || $sem == 'Second') {
        $year = "first";
    } else if ($sem == "Third" || $sem == 'Fourth') {
        $year = "second";
    } else if ($sem == "Fifth" || $sem == 'Sixth') {
        $year = "third";
    }
    $query_2 = "DELETE FROM $year WHERE Roll='$croll';";
    $run = mysqli_query($connection, $query);
        $run = mysqli_query($connection, $query_2);
        $val = unlink($file_name);
        echo "
            <script>
                Swal.fire({
                imageUrl: '../success.gif',
                imageHeight: 250,
                title:'Deleted!',
                text:'Student Information Is Deleted',
                imageAlt: 'A tall image'
            }).then(()=>{
                window.location.href='student.php';
            });
            </script>";
}
mysqli_close($connection);
?>