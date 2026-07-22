<?php include_once('partials/menu.php'); ?>
<?php
$sql = "select COUNT(1) cnt from category";
$result = $conn->query($sql);
$category_count = $result->fetch_assoc()['cnt'];

$sql_users = "select COUNT(1) cnt from users";
$result_users = $conn->query($sql_users);
$users_count = $result_users->fetch_assoc()['cnt'];
?>


    <!-- Main content section Starts here  -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Dashboard</h1>
            <div class="col-4 text-center">
                <h1><?= $category_count ?></h1>
                <br/>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1><?= $users_count ?></h1>
                <br/>
                Users
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                Categories
            </div>
            <div class="clearfix">

            </div>
        </div>
    </div>
    <!--  Main content section ends here  -->

   <?php include_once('partials/footer.php'); ?>