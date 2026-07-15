<?php
session_start();
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','my-secret-pw');
define('DB_NAME','foodStall');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD,  DB_NAME) or die(mysqli_connect_error());
?>