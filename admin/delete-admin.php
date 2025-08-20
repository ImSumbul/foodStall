<?php
include_once('partials/connection.php');
// get id 
$id = $_POST['id'];
// echo($id);
// die();
// delete query 
$sql = "delete from admin where id = $id";
$mysqli_query($conn,$sql);
// redirect to manage-admin page 
header('Location:manage-admin.php');
?>