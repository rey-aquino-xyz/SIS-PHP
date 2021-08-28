<?php
session_start();
require_once '../sis/helper/dbhelper.php';
DBHelper::CreateDatabase();
$message = '';
$g_username = '';
$g_password = '';
try {
    if (isset($_POST['login'])) {
        $query = 'SELECT * FROM user WHERE Username = ? AND Password = ?';
        $login_param = [$_POST['username'], $_POST['password']];
        $sth = DBHelper::CheckIfExist($query, $login_param);
        if ($sth > 0) {
            foreach (DBHelper::GetDataWithParam($query, $login_param) as $row) {
                $_SESSION['id'] = $row['Id'];
            }
            $_SESSION['username'] = $_POST['username'];
            header('location:home.php');
        } else {
            $message = 'is-invalid';
            $g_username = $_POST['username'];
            $g_password = $_POST['password'];
        }
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
    <link href="../sis/assets/css/bootstrap.5.0.2.min.css"  rel="stylesheet" type="text/css">
    <title>SIS | Login</title>
</head>

<body class="center">
    <br /><br /><br />
    <div class="container mt-5" style="width: 350px;">
        <form method="POST">
            <div class="container text-center">
                <img src="assets/code.png" alt="" width="72" height="72">
            </div>
            <h1 class="h3 mb-3 fw-normal text-center">Login to your account</h1>
            <?php if (isset($message)) { ?>          
              <div class="form-floating">
                <input type="text" name="username" class="form-control  <?php echo $message; ?>" id="floatingInput<?php echo $message; ?>" placeholder="Username" 
                   value="<?php if (isset($g_username)) {
                       echo $g_username;
                   } ?>" required>
                <label for="floatingInput<?php echo $message; ?>">Username</label>
            </div>
             <div class="form-floating mt-2">
                <input type="password" name="password" class="form-control <?php echo $message; ?>" id="floatingPassword<?php echo $message; ?>" placeholder="Password"
                   value="<?php if (isset($g_password)) {
                       echo $g_password;
                   } ?>" required>
                <label for="floatingPassword<?php echo $message; ?>">Password</label>
            </div>
            <?php } ?>
            <div class="mt-3 mb-3 text-center">
                <label>
                    Don't have account? <a href="user/user_register.php">Create one!</a>
                </label>
            </div>
           
            <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2021-2022</p>
        </form>
    </div>
    <script src="../sis/assets/js/bootstrap.5.0.2.js"></script>
</body>
</html>