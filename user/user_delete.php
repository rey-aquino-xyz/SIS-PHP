<?php
require_once '/xampp/htdocs/sis/helper/dbhelper.php';
session_start();
$id = $_GET['id'];
DBHelper::ExecuteCommandWithParam('DELETE FROM user WHERE Id = ?', [$id]);
unset($_SESSION['username']);
unset($_SESSION['id']);
session_destroy();
header('Location:../index.php');
?>
