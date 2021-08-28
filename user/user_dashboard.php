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
    $r_id = $row['Id'];
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
    <link href="../assets/css/bootstrap.5.0.2.min.css" rel="stylesheet">

    <title>SIS | Admin</title>
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
                <li><a href="../home.php" class="nav-link nav-pill px-2 link-primary">Home</a></li>
                <li><a href="../about.php" class="nav-link px-2 link-dark">About</a></li>
            </ul>
            <?php if (isset($_SESSION['username'])) { ?>
            <div class="col-md-3 text-end">
                <a href="../logout.php" style="text-decoration: none;">
                    <button type="button" class="btn btn-outline-danger">Logout
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                    </button>
                </a>
            </div>
        </header>
    </div>
    <div class="container mt-5" style="width: 350px;">
        <form method="POST">
            <h1 class="h3 mb-3 fw-normal text-center">{ Admin account }</h1>
            <?php if (isset($message)) { ?>
            <h5 class="mb-3 fw-normal text-danger text-center">
                <?php echo $message; ?>
            </h5>
            <?php } ?>
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username"
                    value="<?php echo $username; ?>" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"
                    value="<?php echo $password; ?>" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" name="update" type="submit">Update</button>

            <a href="user_delete.php?id=<?php echo $r_id; ?>"
                onClick="return confirm('Are you sure you want to delete?')"><button type="button"
                    class="w-100 mt-3 btn btn-lg btn-outline-danger">Delete Account</button></a>
            <p class="mt-5 mb-3 text-muted text-center">&copy; Rey Aquino&trade;</p>
        </form>

    </div>
    <?php } else {header('Location:index.php');} ?>
    <script src="../assets/js/bootstrap.5.0.2.js"></script>
</body>

</html>