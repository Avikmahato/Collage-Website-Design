<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <i class="fa-solid fa-house"></i>
                    <a href="../Home/index.php">
                        Home
                    </a>
                </li>
                <li onclick="choose(1)">
                    <i class="fa-solid fa-person-chalkboard"></i>
                    <a>
                        Student Login
                    </a>
                </li>
                <li onclick="choose(2)">
                    <i class="fa-solid fa-user-plus"></i>
                    <a>
                        Faculty Login
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="login.php" method="post" class="container1" id="login_content">
            <div class="student_id">
                <div for="student_id">
                    <i class="fa-solid fa-user"></i>
                    <input name="s_id" type="text" placeholder="STUDENT ID" id="student_id" required/>
                </div>
            </div>
            <div class="student_reg">
                <div for="student_reg">
                    <input name="reg_no" type="text" placeholder="REGISTRATION NO" id="student_reg" required/>
                    <i class="fa-solid fa-registered"></i>
                </div>
            </div>
            <div class="semail">
                <div for="semail">
                    <i class="fa-solid fa-at"></i>
                    <input type="text" placeholder="EMAIL" id="semail" name="email" required/>
                </div>
            </div>
            <div class="password">
                <div for="password">
                    <input name="pass" type="password" placeholder="PASSWORD" id="password" required/>
                    <i class="fa-solid fa-key"></i>
                </div>
            </div>
            <div id="check">
                <input type="checkbox" id="mustchecked" name="check">
                <p>Remember me</p>
            </div>
            <div class="login">
                <input type="submit" name="submit" value="login" id="switch">
            </div>
        </form>
        <form action="login.php" method="post" class="container2" id="NEW_USER_content">
            <div class="student_id">
                <div for="student_id">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="FACULTY ID" id="student_id" name="f_id" required/>
                </div>
            </div>
            <div class="email">
                <div for="email">
                    <input type="text" placeholder="EMAIL" id="email" name="email" required/>
                    <i class="fa-solid fa-at"></i>
                </div>
            </div>
            <div class="mobile">
                <div for="mobile">
                    <i class="fa-solid fa-mobile-screen"></i>
                    <input minlength="10" maxlength="10" type="text" placeholder="MOBILE" id="mobile" name="mobile" required/>
                </div>
            </div>
            <div class="password">
                <div for="password">
                    <input minlength="8" type="password" placeholder="PASSWORD" id="password" name="password" required/>
                    <i class="fa-solid fa-lock"></i>
                </div>
            </div>
            <div id="check">
                <input type="checkbox" id="mustchecked" name="check">
                <p>Remember me</p>
            </div>
            <div class="login">
                <input type="submit" name="Login" value="LOGIN" id="switch">
            </div>
            <div class="result">
                <!-- <p>Login Failed</p> -->
            </div>
        </form>
    </main>
    <script src="script.js"></script>
</body>

</html>
