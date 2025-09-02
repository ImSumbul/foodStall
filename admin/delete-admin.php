<?php
include_once('partials/connection.php');
// get id 
$id = $_POST['id'];
// echo($id);
// die();
// delete query 
$sql = "delete from admin where id = $id";
$result = mysqli_query($conn,$sql);
// redirect to manage-admin page 
if($result)
{
    $_SESSION['delete'] = "Admin deleted successfully.";
    header('Location:manage-admin.php');
}
else
{
    $_SESSION['delete'] = "Failed to delete admin. Try again later.";
    header('Location:manage-admin.php');
}

?>