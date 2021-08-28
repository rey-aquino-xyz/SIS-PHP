<?php
session_start();
require_once '/xampp/htdocs/sis/helper/dbhelper.php';
DBHelper::CreateDatabase();
$message = '';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SIS | Login</title>
</head>

<body class="center">
    <br /><br /><br />
    <div class="container mt-5" style="width: 350px;">
        <form method="POST">
            <div class="container text-center">
                <img src="assets/code.png" alt="" width="72" height="72">
            </div>
            <h1 class="h3 mb-3 fw-normal text-center">{ Please sign in }</h1>
            <?php if (isset($message)) { ?>          
              <div class="form-floating">
                <input type="text" name="username" class="form-control  <?php echo $message; ?>" id="floatingInput<?php echo $message; ?>" placeholder="Username" 
                    required>
                <label for="floatingInput<?php echo $message; ?>">Username</label>
            </div>
             <div class="form-floating mt-2">
                <input type="password" name="password" class="form-control <?php echo $message; ?>" id="floatingPassword<?php echo $message; ?>" placeholder="Password"
                    required>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>