<?php
session_start();
require_once '/xampp/htdocs/sis/helper/dbhelper.php';
$message = '';
try {
    $id = $_GET['id'];
    if (isset($_POST['update'])) {
        $p_param = [$_POST['username'], $_POST['password'], $id];
        $user = 'UPDATE user SET Username = ?, Password = ? WHERE Id = ?';
        DBHelper::ExecuteCommandWithParam($user, $p_param);
        header("Location:user_dashboard.php?id=$id");
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
?>
<?php
$id = $_GET['id'];
$param = [$id];
$query = 'SELECT * FROM user WHERE Id =?';
foreach (DBHelper::GetDataWithParam($query, $param) as $row) {
    $username = $row['Username'];
    $password = $row['Password'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>SIS | Admin</title>
</head>

<body>
    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="../home.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor"
                    class="bi bi-code-slash" viewBox="0 0 16 16">
                    <path
                        d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z" />
                </svg>
                <strong>Student Information System</strong>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../home.php" class="nav-link nav-pill px-2 link-primary">Home</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
            </ul>
            <?php if (isset($_SESSION['username'])) { ?>
            <div class="col-md-3 text-end">
                <a href="../logout.php" style="text-decoration: none;">
                    <button type="button" class="btn btn-danger">Logout <i class="bi bi-box-arrow-right"></i></button>
                </a>
            </div>
        </header>
    </div>
    <div class="container mt-5" style="width: 350px;">
        <form method="POST">    
            <h1 class="h3 mb-3 fw-normal text-center">{ Admin account }</h1>
            <?php if (isset($message)) { ?>
            <h5 class="mb-3 fw-normal text-danger text-center"> <?php echo $message; ?></h5>
            <?php } ?>
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" value="<?php echo $username; ?>" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword"
                    placeholder="Password" value="<?php echo $password; ?>" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" name="update" type="submit">Update</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; Mark D. Dela Rosa &trade;</p>
        </form>

    </div>
  <?php } else {header('Location:index.php');} ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>