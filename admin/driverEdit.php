<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Driver.php'; ?> 


<?php 
    if (!isset($_GET['driverid']) || $_GET['driverid'] == NULL) {
        echo "<script>window.location='driverList.php';</script>";
    }else{
       $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['driverid']);
    }

    $dv = new Driver();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updateDriver = $dv->driverUpdate($_POST,$_FILES,$id);
    }


?> 

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Driver</h2>
        <div class="block">     
        <?php 
            if (isset($updateDriver)) {
                echo $updateDriver;
            }
         ?>     

         <?php 
            $getDriver = $dv->getDriverById($id);
            if ($getDriver) {
                while ($value = $getDriver->fetch_assoc()) {
?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="driverName" value="<?php echo $value['driverName'];?>" class="medium" />
                    </td>
                </tr>

               <tr>
                    <td>
                        <label>Driving Licence</label>
                    </td>
                    <td>
                        <input type="text" name="drivingLic" value="<?php echo $value['drivingLic'];?>" class="medium" />
                    </td>
                </tr> 

                <tr>
                    <td>
                        <label>Driving Address</label>
                    </td>
                    <td>
                        <input type="text" name="driverAdd" value="<?php echo $value['driverAdd'];?>" class="medium" />
                    </td>
                </tr>
               <tr>
                    <td>
                        <label>Phone Number</label>
                    </td>
                    <td>
                        <input type="text" name="phone" value="<?php echo $value['phone'];?>" class="medium" />
                    </td>
                </tr>
			
		
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['image']; ?>"  height="80px" width="200px"><br/>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
			
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>



