<?php include_once('partials/menu.php'); ?>

<?php
// Displaying Alert after adding admin 
if(isset($_SESSION['add'])){
    $color = $_SESSION['add'] == 'Admin added successfully.' ? 'success':'danger';
        echo '<div class="alert alert-'.$color.' alert-dismissible fade show" role="alert">
                <strong>Success!</strong> '.$_SESSION['add'].'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        unset($_SESSION['add']);    
    }

// Select data to display in table below
$sql = "select * from admin;";
$result = mysqli_query($conn, $sql);    
if(mysqli_num_rows($result) > 0)
{
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

    <!-- Main content section Starts here  -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br/><br/>
            <!-- Button to add a new admin  -->
             <a href="add-admin.php" class="btn-primary">Add New Admin</a>
             <br/><br/><br/>
            <table class="tbl-full">
                <tr>
                    <th>S.no.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                <?php
                $count = 1;
                foreach($rows as $row){ ?>
                <tr>
                    <td><?= $count++; ?>.</td>
                    <td><?= htmlspecialchars($row['full_name']) ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td>
                        <a href="update-admin.php?id=<?=$row['id']?>" class="btn-success">Update</a>
                        <a href="delete-admin.php?id=<?=$row['id']?>" class="btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <!-- Delete modal starts here  -->
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Delete modal ends here  -->

    <!--  Main content section ends here  -->

   <?php include_once('partials/footer.php'); ?>