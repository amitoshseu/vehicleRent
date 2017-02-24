<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'; ?> 
<?php include '../classes/Vehicle.php'; ?> 
<?php include '../classes/Brand.php'; ?> 

<?php 
    $vehi = new Vehicle();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertVehicle = $vehi->vehicleInsert($_POST,$_FILES);
    }


?> 

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Vehicle</h2>
        <div class="block">     
        <?php 
            if (isset($insertVehicle)) {
                echo $insertVehicle;
            }
         ?>     
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="vehicleName" placeholder="Enter Vehicle Name..." class="medium" />
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
                            <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></option>
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
                            <option value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></option>
                            <?php } } ?>    

                            </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Rate/Hour</label>
                    </td>
                    <td>
                        <input type="text" name="rate" placeholder="Enter Rate/Hour..." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Rate/Day</label>
                    </td>
                    <td>
                        <input type="text" name="rateDay" placeholder="Enter Rate/Day..." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Rate/Airport Transfer</label>
                    </td>
                    <td>
                        <input type="text" name="rateAirport" placeholder="Enter Rate/Airport Transfer..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Total Seat</label>
                    </td>
                    <td>
                        <input type="text" name="seat" placeholder="Enter Seat Number" class="medium" />
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Condition</label>
                    </td>
                    <td>
                        <input type="text" name="vehiCondition" placeholder="Enter Vehicle Condition..." class="medium" />
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
                    <td>
                        <label>Vehicle Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Economy</option>
                            <option value="1">Standard</option>
                            <option value="2">Luxury</option>
                        </select>
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



