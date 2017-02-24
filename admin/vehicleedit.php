<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'; ?> 
<?php include '../classes/Vehicle.php'; ?> 
<?php include '../classes/Brand.php'; ?> 

<?php 
    if (!isset($_GET['vehicleid']) || $_GET['vehicleid'] == NULL) {
        echo "<script>window.location='vehiclelist.php';</script>";
    }else{
       $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['vehicleid']);
    }

    $vehi = new Vehicle();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updateVehicle = $vehi->vehicleUpdate($_POST,$_FILES,$id);
    }


?> 

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Vehicle</h2>
        <div class="block">     
        <?php 
            if (isset($updateVehicle)) {
                echo $updateVehicle;
            }
         ?>     

         <?php 
            $getVehicle = $vehi->getVehicleById($id);
            if ($getVehicle) {
                while ($value = $getVehicle->fetch_assoc()) {
?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="vehicleName" value="<?php echo $value['vehicleName'];?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php 
                                $cat = new Category();
                                $getCat = $cat->getAllCat();
                                if ($getCat) {
                                    while ( $result = $getCat->fetch_assoc()) {
                           
                             ?>
                            <option 
                            <?php 
                                if($value['catId'] == $result['catId']){ ?>
                                    selected="selected"
                           <?php } ?>
                            value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?>
                                
                            </option>
                            <?php } } ?>

                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                             <?php 
                                $brand = new Brand();
                                $getBrand = $brand->getAllBrand();
                                if ($getBrand) {
                                    while ( $result = $getBrand->fetch_assoc()) {
                           
                             ?>
                            <option 
                            <?php 
                                if($value['brandId'] == $result['brandId']){ ?>
                                    selected="selected"
                           <?php } ?>
                            value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?>
                                
                            </option>
                            <?php } } ?>    

                            </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                            <?php echo $value['body']; ?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Rate/Hour</label>
                    </td>
                    <td>
                        <input type="text" name="rate" value=" <?php echo $value['rate']; ?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Rate/Day</label>
                    </td>
                    <td>
                        <input type="text" name="rateDay" value=" <?php echo $value['rateDay']; ?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Rate/Airport Transfer</label>
                    </td>
                    <td>
                        <input type="text" name="rateAirport" value=" <?php echo $value['rateAirport']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Total Seat</label>
                    </td>
                    <td>
                        <input type="text" name="seat" value=" <?php echo $value['seat']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                <td>
                        <label>Condition</label>
                    </td>
                    <td>
                        <input type="text" name="vehiCondition" value=" <?php echo $value['vehiCondition']; ?>" class="medium" />
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
                    <td>
                        <label>Vehicle Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php if ($value['type']==0) { ?>
                            <option selected="selected" value="0">Economy</option>
                            <option value="1">Standard</option>
                            <option value="2">Luxury</option>
                      <?php } else if ($value['type']==1) { ?>
                            <option selected="selected" value="1">Standard</option>
                            <option value="0">Economy</option>
                            <option value="2">Luxury</option>
                      <?php      }else { ?>
                            <option  selected="selected" value="2">Luxury</option>
                            <option value="0">Economy</option>
                            <option value="1">Standard</option>
                            <?php } ?>
                        </select>
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>



