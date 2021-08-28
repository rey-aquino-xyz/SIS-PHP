<?php
require_once '/xampp/htdocs/sis/helper/dbhelper.php';

$id = $_GET['id'];

DBHelper::ExecuteCommandWithParam('DELETE FROM student WHERE Id = ?', [$id]);

header('Location: ../home.php');
?>
