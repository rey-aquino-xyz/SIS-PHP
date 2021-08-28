<?php
session_start();
require_once '/xampp/htdocs/sis/helper/dbhelper.php';
$message = '';
try {
    if (isset($_POST['register'])) {
        DBHelper::ExecuteCommandWithParam(
            'INSERT INTO user (Username, Password) VALUES (?,?)',
            [$_POST['username'], $_POST['password']]
        );
        header('location:../index.php');
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
?>

<?php DBHelper::CreateDatabase(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.5.0.2.min.css"  rel="stylesheet" type="text/css">
    <title>SIS | Register</title>
</head>

<body class="center">
    <br/><br/><br/>
    <div class="container mt-5" style="width: 350px;">
        <form method="POST">    
                <div class="container text-center">
                <img src="../assets/code.png" alt="" width="72" height="72">
            </div> 
          
            <h1 class="h3 mb-3 fw-normal text-center">Create account</h1>
            <?php if (isset($message)) { ?>
            <h5 class="mb-3 fw-normal text-danger text-center"> <?php echo $message; ?></h5>
            <?php } ?>
            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mt-2 mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword"
                    placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" name="register" type="submit">Register</button>
               <div class="mt-3 mb-3 text-center">
                <label>
                    Already registered? <a href="../index.php">Login</a>
                </label>
            </div>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2021-2022;</p>
        </form>

    </div>

     <script src="../assets/js/bootstrap.5.0.2.js"></script>
</body>

</html>
