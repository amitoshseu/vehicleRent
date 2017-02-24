<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Driver.php'; ?> 

<?php 
    $dv = new Driver();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertDriver = $dv->driverInsert($_POST,$_FILES);
    }


?> 

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Driver</h2>
        <div class="block">     
        <?php 
            if (isset($insertDriver)) {
                echo $insertDriver;
            }
         ?>     
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                
                    <td>
                        <label>Driver Name</label>
                    </td>
                    <td>
                        <input type="text" name="driverName" placeholder="Enter Driver name" class="medium" />
                    </td>
                </tr>

                
                <tr>
                    <td>
                        <label>Driving Licence</label>
                    </td>
                    <td>
                        <input type="text" name="drivingLic" placeholder="Enter Driving Licence..." class="medium" />
                    </td>
                </tr>

              <tr>
                    <td>
                        <label>Driver Address</label>
                    </td>
                    <td>
                        <input type="text" name="driverAdd" placeholder="Enter Driver Address..." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Phone Number</label>
                    </td>
                    <td>
                        <input type="text" name="phone" placeholder="Enter Driver Phone Number..." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
                   
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>



