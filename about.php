<?php
require_once '/xampp/htdocs/sis/helper/dbhelper.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../sis/assets/css/bootstrap.5.0.2.min.css" rel="stylesheet">
    <title>SIS | About</title>
</head>

<body>

    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="home.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor"
                    class="bi bi-code-slash" viewBox="0 0 16 16">
                    <path
                        d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z" />
                </svg>
                <strong>Student Information System</strong>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="home.php" class="nav-link nav-pill px-2 link-primary">Home</a></li>
                <li><a href="about.php" class="nav-link px-2 link-dark">About</a></li>
            </ul>
            <?php if (isset($_SESSION['username'])) { ?>
            <div class="col-md-3 text-end">
                <a href="user/user_dashboard.php?id=<?php echo $_SESSION[
                    'id'
                ]; ?>" style="text-decoration: none;">
                    <button type="button" class="btn btn-light"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="40"
                            height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        <?php echo $_SESSION['username']; ?>
                    </button>
                </a>
            </div>
        </header>
    </div>
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="assets/code.png" alt="" width="72" height="72">
        <h1 class="display-5 fw-bold">SIS | Student Information System</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">A simple student information system with login/logout that is developed in PHP and
                MySQL.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="https://github.com/rey-aquino-xyz/SIS-PHP">
                    <button type="button" class="btn btn-primary btn-md px-4 gap-3"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-github" viewBox="0 0 16 16">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                        </svg> Github Repository</button>
                </a>

            </div>
        </div>
    </div>
    <?php } else {header('Location:index.php');} ?>
    <script src="../sis/assets/js/bootstrap.5.0.2.js"></script>
</body>

</html>