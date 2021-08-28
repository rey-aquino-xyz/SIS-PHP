<?php
require_once '/xampp/htdocs/sis/helper/dbhelper.php';
session_start();

$message = '';
try {
    if (isset($_POST['register'])) {
        $p_param = [
            $_POST['firstname'],
            $_POST['middlename'],
            $_POST['lastname'],
            $_POST['course'],
            $_POST['year'],
            $_POST['section'],
        ];
        $user =
            'INSERT INTO student (Firstname, Middlename, Lastname, Course, Year, Section) VALUES ( ?, ?, ?, ?, ?, ?)';
        DBHelper::ExecuteCommandWithParam($user, $p_param);
        header('Location:../home.php');
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.5.0.2.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.1.5.0-icons.css" rel="stylesheet">
    <title>SIS | Register Student</title>
</head>

<body>
    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="../home.php"
                class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor"
                    class="bi bi-code-slash" viewBox="0 0 16 16">
                    <path
                        d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z" />
                </svg>
                <strong>Student Information System</strong>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../home.php" data-toggle="modal" class="nav-link nav-pill px-2 link-primary">Home</a></li>
                <li><a href="../about.php" class="nav-link px-2 link-dark">About</a></li>
            </ul>
            <?php if (isset($_SESSION['username'])) { ?>
            <div class="col-md-3 text-end">
                <a href="../user/user_dashboard.php?id=<?php echo $_SESSION[
                    'id'
                ]; ?>" style="text-decoration: none;">
                    <button type="button" class="btn btn-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        <strong>
                            <?php echo $_SESSION['username']; ?></button>
                </a>
            </div>
        </header>
    </div>

    <div class="container">
        <form method="POST">
            <h1 class="h3 mb-3 fw-normal text-center">{ Register Student }</h1>
            <?php if (isset($message)) { ?>
            <h5 class="mb-3 fw-normal text-danger text-center">
                <?php echo $message; ?>
            </h5>
            <?php } ?>

            <div class="row">
                <div class="col-lg col-md col-sm">
                    <div class="form-floating">
                        <input type="text" name="firstname" class="form-control" id="floatingInput"
                            placeholder="Firstname" required>
                        <label for="floatingInput">Firstname</label>
                    </div>
                </div>
                <div class="col-lg col-md col-sm">
                    <div class="form-floating">
                        <input type="text" name="middlename" class="form-control" id="floatingInput"
                            placeholder="Middlename" required>
                        <label for="floatingInput">Middlename</label>
                    </div>
                </div>
                <div class="col-lg col-md col-sm">
                    <div class="form-floating">
                        <input type="text" name="lastname" class="form-control" id="floatingInput"
                            placeholder="Lastname" required>
                        <label for="floatingInput">Lastname</label>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg col-md col-sm">
                    <div class="form-floating">
                        <input type="text" name="course" class="form-control" id="floatingInput" placeholder="Course"
                            required>
                        <label for="floatingInput">Course</label>
                    </div>
                </div>
                <div class="col-lg col-md col-sm">
                    <div class="form-floating">
                        <input type="text" name="year" class="form-control" id="floatingInput" placeholder="Year"
                            required>
                        <label for="floatingInput">Year</label>
                    </div>
                </div>
                <div class="col-lg col-md col-sm">
                    <div class="form-floating">
                        <input type="text" name="section" class="form-control" id="floatingInput" placeholder="Section"
                            required>
                        <label for="floatingInput">Section</label>
                    </div>
                </div>
            </div>
            <br />
            <div class="container" style="width: 200px;">
                <button class="w-100 btn btn-lg btn-primary" name="register" type="submit">Register</button>
            </div>

            <p class="mt-3 mb-3 text-muted text-center">&copy; Rey Aquino&trade;</p>
        </form>
    </div>
    <?php } else {header('Location:../index.php');} ?>
    <script src="../assets/js/bootstrap.5.0.2.js"></script>
</body>

</html>