<?php include_once('partials/menu.php'); ?>

    <!-- Main content section Starts here  -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food</h1>
            <br/><br/>
            <!-- Button to add a new food item  -->
             <a href="#" class="btn-primary">Add New Food Item</a>
             <br/><br/><br/>
            <table class="tbl-full">
                <tr>
                    <th>S.no.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>Sumbul Yasmeen</td>
                    <td>sumbulareeb</td>
                    <td>
                        <a href="#" class="btn-success">Update</a>
                        <a href="#" class="btn-danger">Delete</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <!--  Main content section ends here  -->

   <?php include_once('partials/footer.php'); ?>