<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Customer.php'; ?> 

<?php 
    $cmr = new Customer();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adminReg'])) {
        $adminReg = $cmr->adminRegistration($_POST);
    }
?> 

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Admin</h2>
        <div class="block">     
        <?php 
            if (isset($adminReg)) {
                echo $adminReg;
            }
         ?>     
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                
                    <td>
                        <label>Admin Name</label>
                    </td>
                    <td>
                        <input type="text" required name="adminName" placeholder="Enter Admin Name" class="medium" />
                    </td>
                </tr>

                
                <tr>
                    <td>
                        <label>Admin Username</label>
                    </td>
                    <td>
                        <input type="text" name="adminUser" required placeholder="Enter Admin Username..." class="medium" />
                    </td>
                </tr>

              <tr>
                    <td>
                        <label>Admin Email</label>
                    </td>
                    <td>
                        <input type="text" name="adminEmail" required placeholder="Enter Admin Email..." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>

                         <input type="password" required  name="adminPass" placeholder="Enter Password" class="medium">

                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Confirm Password</label>
                    </td>
                    <td>
                          <input type="password" required  name="conPass" placeholder="Confirm Password" class="medium">
                    </td>
                </tr>
                   
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="adminReg" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>



