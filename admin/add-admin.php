<?php include_once('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Enter your username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter your password"></td>
                </tr>
                <tr>
                    <td colspan="2">
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

if(isset($_POST['submit']))
{
    $name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); 

    $sql = "insert into admin (full_name,username,password) values('$name','$username','$password');";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if($result)
    {
        $_SESSION['add'] = 'Admin added successfully.';
        header('Location:manage-admin.php');
    }
    else
    {
        $_SESSION['add'] = 'Failed to add Admin.';
        header('Location:manage-admin.php');   
    }
}

?>