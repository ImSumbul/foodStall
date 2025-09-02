<?php include_once('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper-container">
        <h1>Change Password</h1>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Current Password</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td><input type="password" name="new_password" placeholder="New Password"></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" id="<?php echo $_GET['id']?>">
                        <input type="submit" name="submit" value="submit" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include_once('partials/footer.php'); ?>

<!-- Php code after submit button is clicked  -->

<?php
// Get the data from form 
if(isset($_POST['submit']))
{
    $id = $_GET['id'];
    $currPass = md5($_POST['current_password']);
    $newPass = md5($_POST['new_password']);
    $confirm_pass = md5($_POST['confirm_password']);
    // check whether the user with current ID and current Password exists or not 
    $sql = "select * from admin where password = '$currPass' and id = $id";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1)
    {
        // check whether the new password and confirm password match or not 
        if($newPass === $confirm_pass)
        {
            // change password if all above conditions are true 
            $sql = "update admin set password = '$newPass' where id = $id";
            $_SESSION['is-user-found'] = "Password Updated Successfully.";
            header('Location:manage-admin.php');
        }
        else{
            $_SESSION['is-user-found'] = "Password does not match.";
            header('Location:manage-admin.php');
        }
    }
    else
    {
        $_SESSION['is-user-found'] = "User not found/current password you entered is not correct";
        header('Location:manage-admin.php');
    }
}
?>
