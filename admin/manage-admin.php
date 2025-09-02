<?php include_once('partials/menu.php'); ?>

<?php
// Displaying Alert after adding admin 
if(isset($_SESSION['add'])){
    $color = $_SESSION['add'] == 'Admin added successfully.' ? 'success':'danger';
    $boldText = $color == 'danger' ? 'Failed!':'Success!';
        echo '<div class="alert alert-'.$color.' alert-dismissible fade show" role="alert">
                <strong>'.$boldText.'</strong> '.$_SESSION['add'].'
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        unset($_SESSION['add']);    
    }
 
if(isset($_SESSION['delete'])){
    $color = $_SESSION['delete'] == 'Admin deleted successfully.' ? 'success':'danger';
    $boldText = $color == 'danger' ? 'Failed!':'Success!';
        echo '<div class="alert alert-'.$color.' alert-dismissible fade show" role="alert">
                <strong>'.$boldText.'</strong> '.$_SESSION['delete'].'
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        unset($_SESSION['delete']);
}  

if(isset($_SESSION['update'])){
    $color = $_SESSION['update'] == 'Admin updated successfully.' ? 'success':'danger';
    $boldText = $color == 'danger' ? 'Failed!':'Success!';
        echo '<div class="alert alert-'.$color.' alert-dismissible fade show" role="alert">
                <strong>'.$boldText.'</strong> '.$_SESSION['update'].'
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        unset($_SESSION['update']);
} 

if(isset($_SESSION['is-user-found'])){
    $color = $_SESSION['is-user-found'] == 'Password Updated Successfully.' ? 'success':'danger';
    $boldText = $color == 'danger' ? 'Failed!':'Success!';
        echo '<div class="alert alert-'.$color.' alert-dismissible fade show" role="alert">
                <strong>'.$boldText.'</strong> '.$_SESSION['is-user-found'].'
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        unset($_SESSION['is-user-found']);
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
                        <a href="update-password.php?id=<?=$row['id']?>" class="btn-primary">Change Password</a>
                        <a href="update-admin.php?id=<?=$row['id']?>" class="btn-success">Update</a>
                        <a href="#" class="btn-danger btn" data-id="<?= $row['id'] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <!-- Delete modal starts here -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="delete-admin.php" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p>Are you sure you want to delete this admin?</p>
                    <input type="hidden" name="id" id="delete_id">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Save Changes">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Delete modal ends here -->


    <!--  Main content section ends here  -->

   <?php include_once('partials/footer.php'); ?>

   <!-- jQuery CDN (only if using jQuery) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).on('click', '.btn-danger', function () {
    var id = $(this).data('id');
    $('#delete_id').val(id);
});
</script>
