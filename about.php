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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
                    <button type="button" class="btn btn-light"><i class="bi bi-person-circle"></i>
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
      <p class="lead mb-4">A simple student information system with login/logout that is developed in PHP and MySQL.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <a href="https://github.com/rey-aquino-xyz/SIS-PHP">
           <button type="button" class="btn btn-primary btn-md px-4 gap-3"><i class="bi bi-github"></i> Github Repository</button>
        </a>
       
      </div>
    </div>
  </div>
    <?php } else {header('Location:index.php');} ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>