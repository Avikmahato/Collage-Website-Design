<?php
session_start();
if (!isset($_SESSION['role'])) {
    $_SESSION['p_id'] = "7777N";
    $_SESSION['p_name'] = "BIST";
    $_SESSION['profile_pic'] = "profile.png";
    $_SESSION['role'] = 'public';
    $_SESSION['p_dept'] = '';
    $_SESSION['p_sem'] = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIST</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="student_view.css">
    <link rel="stylesheet" href="an_style.css">
    <link rel="stylesheet" href="../footer/footer.css">
</head>
<body>
    <div class="admission-form">
        <a href="../form/form.html">
            <img src="../profiles/signing.png" alt="" id="form-icon">
        </a>
    </div>
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
            // session_start();
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
                <a href="../faculty/faculty.php">Faculty</a>
            </li>
            <li>
                <a href="../course/course.php">Courses</a>
            </li>
            <li>
                <a href="../gallery/gallery.php">Gallery</a>
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
                <a href="../faculty/faculty.php">Faculty</a>
            </li>
            <li>
                <a href="../course/course.php">Courses</a>
            </li>
            <li>
                <a href="../gallery/gallery.php">Gallery</a>
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
    <main>
        <aside id="sidebar">
            <div>
                <i class="fa-solid fa-xmark" id="close" onclick="clo()"></i>
            </div>

            <?php
            if ($_SESSION['role'] == "student") {

                echo '<a href="index.php" >Home</a>';
                echo '<a href="#" onclick="choose(2)">Student Information</a>';
                echo '<a href="#" onclick="choose(3)">Edit Information</a>';
                echo '<a href="../results/result.php">Your Resuslt</a>';
                echo '<a href="#">Your Attendance</a>';
                echo '<a href="../question/question.php">Today Questions</a>';
                echo '<a href="../signout.php">Log Out</a>';
            } elseif ($_SESSION['role'] == "professor") {
                echo '<a href="index.php" >Home</a>';
                echo '<a href="#" onclick="choose(4)">Professor Information</a>';
                echo '<a href="../attendance/view_student.php">View Students</a>';
                echo '<a href="../attendance/attendance.php">Student Attendance</a>';
                echo '<a href="#">Your Rating</a>';
                echo '<a href="../question/question.php">Add Questions</a>';
                echo '<a href="../signout.php">Log Out</a>';
            } elseif ($_SESSION['role'] == "admin") {
                echo '<a href="index.php" >Home</a>';
                echo '<a href="../attendance/attendance.php">View Students</a>';
                echo '<a href="../attendance/view_student.php">Student Attendance</a>';
                echo '<a href="../question/question.php">Add Questions</a>';
                echo '<a href="../signout.php">Log Out</a>';
            }
            ?>
        </aside>
        <div class="imagesetup" id="home">
            <div class="left">
                <img src="arrow.png" alt="error">
            </div>
            <div class="frame">
                <div class="photo">
                    <img src="../bist/bist.jpg" alt="error" class="image">
                    <img src="../bist/bist (1).jpg" alt="error" class="image">
                    <img src="../bist/bist (2).jpg" alt="error" class="image">
                    <img src="../bist/bist (3).jpg" alt="error" class="image">
                    <img src="../bist/bist (4).jpg" alt="error" class="image">
                    <!-- <img src="images/a (5).jpg" alt="error" class="image">
                    <img src="images/a (6).jpg" alt="error" class="image">
                    <img src="images/a (7).jpg" alt="error" class="image">
                    <img src="images/a (8).jpg" alt="error" class="image">
                    <img src="images/a (9).jpg" alt="error" class="image">
                    <img src="images/a (10).jpg" alt="error" class="image"> -->
                </div>
            </div>
            <div class="right">
                <img src="arrow.png" alt="error">
            </div>
        </div>
        <div class="notices" id="notice">
            <div class="n_head">
                <h2>Welcome To BIST</h2>
                <div class="n_contents">
                    <p>Bengal Institute Of Science And Technology being the premier institution of the district in the field of higher education,
                        it behoves us to become the beacon light of learning in the district, and constantly create
                        and protect the ambience of search for truth and knowledge. The mission of the College is
                        'Pursuit of Knowledge', both theoretical and applied, technical and spiritual, both within
                        and outside the institution. The College received COLLEGE WITH POTENTIAL FOR EXCELLENCE (CPE)
                        status from UGC. The College is affiliated to the Sidho-Kanho-Birsha University,
                        Purulia. At present the college is offering 2 Undergraduate programmes.</p>
                </div>
            </div>
            <div class="principle">
                <div class="about">
                    <i class="fa-solid fa-user-tie"></i>
                    <p>Bengal Institute Of Science And Technology, Purulia is one of the leading colleges in West Bengal & India. Established in 2001, the college appeared as the premier institution
                        in the field of higher education in this district, and over the last 24 years it has come up as the lead college of the district. This college produced a huge number of Ethical Hackers and Developers, as well as Software Engineer, CAs, HRs, Investment Banker and Financial Officer.</p>
                </div>
                <div class="news">
                    <ul>
                        <li>The result of semester V will be publised on 27mar</li>
                        <li>The Yearly Unique BFest Program will be held on 14 April</li>
                        <li>Every Student Of the student must wear collage uniform properly</li>
                        <li>Congratulations! Bapi Das and Gourab Singh Modak for obtained the highest marks in Collage Exam</li>
                        <li>The Project presentation program will held on 2 June</li>
                        <li>Every Student must complete their 75% attendance otherwise ...</li>
                        <li>The Yearly Unique BFest Program will be held on 14 April</li>
                        <li>Every Student Of the student must wear collage uniform properly</li>
                        <li>Congratulations! Bapi Das and Gourab Singh Modak for obtained the highest marks in Collage Exam</li>
                        <li>The Project presentation program will held on 2 June</li>
                        <li>Every Student must complete their 75% attendance otherwise ...</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="student_view">
            <div class="part_one">
                <?php
                include("../connection.php");
                $p_id = $_SESSION['p_id'];
                $query = "SELECT * FROM students where student_id='$p_id';";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);
                mysqli_close($connection);
                echo '<p>Student ID :' . $row['student_id'] . '</p>';
                echo '<img id="profile" src="../profiles/' . $row['profile_picture'] . '" alt="404 error">';
                echo '<p>Name : ' . $row['Name'] . '</p>';
                echo '<p>Roll :' . $row['Roll'] . '</p>';
                echo '<p>Registration :' . $row['Registration'] . '</p>';
                echo '<p>Department :' . $row['Department'] . '</p>';
                echo '<p>Semester :' . $row['Semester'] . '</p>';
                echo '</div>';
                echo '<div class="part_two">';
                echo '<div>
                        <p>Father Name :' . $row['Father'] . '</p>
                    </div>
                    <div>
                        <p>Mother Name :' . $row['Mother'] . '</p>
                    </div>
                    <div>
                        <p id="blood">Blood Group : ' . $row['Blood'] . '</p>
                    </div>
                    <div >
                        <p>Gender : ' . $row['Gender'] . '</p>
                    </div>
                    <div>
                        <p >Village : ' . $row['Village'] . '</p>
                    </div>
                    <div>
                        <p>Police Station : ' . $row['Police_Station'] . '</p>
                    </div>
                    <div>
                        <p >district : ' . $row['District'] . '</p>
                    </div>
                    <div>
                        <p >State : ' . $row['State'] . '</p>
                    </div>
                    <div>
                        <p >Mobile No : ' . $row['Mobile'] . '</p>
                    </div>
                    <div>
                        <p>Email : ' . $row['Email'] . '</p>
                    </div>
                </div>';
                ?>
                <div class="atd">
                    <div id="attendance">
                        <p>Attendance</p>
                    </div>
                    <div class="part_three">
                        <div class="jan">
                            <p>January</p>
                            <p>Present :21</p>
                            <p>Absent : 10</p>
                        </div>
                        <div class="feb">
                            <p>February</p>
                            <p>Present :21</p>
                            <p>Absent : 10</p>
                        </div>
                        <div class="mar">
                            <p>March</p>
                            <p>Present :21</p>
                            <p>Absent : 10</p>
                        </div>
                        <div class="apr">
                            <p>April</p>
                            <p>Present :21</p>
                            <p>Absent : 10</p>
                        </div>
                        <div class="may">
                            <p>May</p>
                            <p>Present :21</p>
                            <p>Absent : 10</p>
                        </div>
                        <div class="jun">
                            <p>June</p>
                            <p>Present :21</p>
                            <p>Absent : 10</p>
                        </div>
                        <div class="jul">
                            <p>July</p>
                            <p>Present :21</p>
                            <p>Absent : 10</p>
                        </div>
                        <div class="aug">
                            <p>August</p>
                            <p>Present :21</p>
                            <p>Absent : 10</p>
                        </div>
                        <div class="sep">
                            <p>September</p>
                            <p>Present :21</p>
                            <p>Absent : 10</p>
                        </div>
                        <div class="oct">
                            <p>October</p>
                            <p>Present :21</p>
                            <p>Absent : 10</p>
                        </div>
                        <div class="nov">
                            <p>November</p>
                            <p>Present :21</p>
                            <p>Absent : 10</p>
                        </div>
                        <div class="dec">
                            <p>December</p>
                            <p>Present :21</p>
                            <p>Absent : 10</p>
                        </div>
                    </div>
                </div>
                <a href="mailto:"></a>
            </div>
        </div>
        <div class="professor_view">
            <div class="part_one">
                <?php
                try {
                    include("../connection.php");
                    $p_id = $_SESSION['p_id'];
                    $query = "SELECT * FROM professors where f_id='$p_id';";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    mysqli_close($connection);
                    echo '<p>Professor ID :' . $row['f_id'] . '</p>';
                    echo '<img id="profile" src="../profiles/' . $row['profile'] . '" alt="404 error">';
                    echo '<p>Name : ' . $row['Name'] . '</p>';
                    echo '<p>Gender :' . $row['Gender'] . '</p>';
                    echo '<p>Age :' . $row['Age'] . '</p>';
                    echo '<p>Mobile :
                    <a href="tel:' . $row['mobile'] . '">' . $row['mobile'] . '</a></p>';
                    echo '<p>Email :
                    <a href="mailto:' . $row['email'] . '">' . $row['email'] . '</a>
                    </p>';
                    echo '<p>Department :' . $row['Department'] . '</p>';
                    echo '</div>';
                    echo '<div class="part_two">';
                    echo '<div>
                                <p>Designation :' . $row['Designation'] . '</p>
                            </div>
                            <div>
                                <p>Specialize In :' . $row['Specialization'] . '</p>
                            </div>
                            <div>
                                <p id="blood">Qualification : ' . $row['Qualification'] . '</p>
                            </div>
                            <div >
                                <p>Experience : ' . $row['Experience'] . '</p>
                            </div>
            </div>';
                } catch (Exception $e) {
                    echo '<script>
                    Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "' . $e . '",
                    footer: /"<a href="#">Why do I have this issue?</a>/"
                    });
                    </script>';
                }
                ?>
            </div>
            <div class="student">
                <form class="student_profile" action="update.php" method="post" enctype="multipart/form-data">
                    <div class="picture">
                        <?php
                        include("../connection.php");
                        $s_id = $_SESSION['p_id'];
                        $query = "SELECT * FROM students where student_id='$p_id';";
                        $run = mysqli_query($connection, $query);
                        $data = mysqli_fetch_assoc($run);
                        echo '<p>Student ID : ' . $data['student_id'] . '</p>';
                        ?>
                        <div class="editable_image">
                            <img id="profile" src="../profiles/<?php echo $data['profile_picture']; ?>" alt="404 error">
                            <label for="add_profile">
                                <img src="edit.png" alt="error" id="edit">
                            </label>
                            <input type="file" name="profile" id="add_profile" style="display: none;">
                        </div>
                        <?php
                        echo '<p>Name : ' . $data['Name'] . '</p>';
                        echo '<p>Roll : ' . $data['Roll'] . '</p>';
                        echo '<p>Registration : ' . $data['Registration'] . '</p>';
                        echo '<p>Department : ' . $data['Department'] . '</p>';
                        echo '<p>Semester : ' . $data['Semester'] . '</p>';
                        ?>
                    </div>
                    <div class="details">
                        <div>
                            <label for="fathername">Father Name :</label>
                            <input type="text" name="father" id="father"
                                value="<?php echo $data['Father'] ?>">
                        </div>
                        <div>
                            <label for="mothername">Mother Name :</label>
                            <input type="text" name="mother" id="mother"
                                value="<?php echo $data['Mother'] ?>">
                        </div>
                        <div>
                            <p>Blood Group </p>
                            <select name="blood" id="blood"
                                value="<?php echo $data['Blood'] ?>">
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="B+">B+</option>
                                <option value="AB+">AB+</option>
                                <option value="O+">O+</option>
                                <option value="A-">A-</option>
                                <option value="B-">B-</option>
                                <option value="AB-">AB-</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        <div id="genderdiv">
                            <p>Gender :</p>
                            <div>
                                <input type="radio" name="gender" id="gender" checked value="" style="display: none;">
                                Male
                                <input type="radio" name="gender" id="gender" value="Male"
                                    <?php if ($data['Gender'] == "Male") {
                                        echo "checked";
                                    }
                                    ?>>
                                Female
                                <input type="radio" name="gender" id="gender" value="Female"
                                    <?php if ($data['Gender'] == "Female") {
                                        echo "checked";
                                    }
                                    ?>>
                                Transgender
                                <input type="radio" name="gender" id="gender" value="Transgender"
                                    <?php if ($data['Gender'] == "Transgender") {
                                        echo "checked";
                                    }
                                    ?>>
                                Other
                                <input type="radio" name="gender" id="gender" value="Other"
                                    <?php if ($data['Gender'] == "Other") {
                                        echo "checked";
                                    }
                                    ?>>
                            </div>
                        </div>
                        <div>
                            <label for="village">Village </label>
                            <input type="text" id="village" name="village"
                                value="<?php
                                        echo $data['Village'];
                                        ?>">
                        </div>
                        <div>
                            <label for="police">Police Station </label>
                            <input type="text" id="police" name="police"
                                value="<?php
                                        echo $data['Police_Station'];
                                        ?>">
                        </div>
                        <div>
                            <label for="district">district </label>
                            <input type="text" id="village" name="district"
                                value="<?php
                                        echo $data['District'];
                                        ?>">
                        </div>
                        <div>
                            <label for="state">State </label>
                            <input type="text" id="state" name="state"
                                value="<?php
                                        echo $data['State'];
                                        ?>">
                        </div>
                        <div>
                            <label for="mobile">Mobile No </label>
                            <input type="text" id="mobile" name="mobile"
                                value="<?php
                                        echo $data['Mobile'];
                                        ?>">
                        </div>
                        <div>
                            <label for="email">Email </label>
                            <input type="text" id="email" name="email"
                                value="<?php
                                        echo $data['Email'];
                                        ?>">
                        </div>
                        <div id="save">
                            <input type="submit" name="save">
                        </div>
                    </div>
                    <?php
                    mysqli_close($connection);
                    ?>
                </form>
            </div>
            <?php
            include("../feedback/feedback.php");
            ?>
    </main>
    <?php
    include("../footer/footer.php");
    ?>
    <script src="script.js">
        let set_profile = document.getElementById("add_profile");
        set_profile.onchange = () => {
            let profile = document.getElementById("profile");
            profile.src = URL.createObjectURL(set_profile.files[0]);
        };
    </script>
    <script src="https://cdn.botpress.cloud/webchat/v2.4/inject.js"></script>
    <script src="https://files.bpcontent.cloud/2025/05/07/18/20250507180202-4JGRDXR7.js"></script>
</body>

</html>