<?php include 'inc/header.php';?>
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all"/>
<style type="text/css">
.vehicleDetails{
    height: auto;
    text-align: center;
    margin: 10px;
    text-align: justify;
    font-family: 'Vollkorn', serif;
    font-size: 20px;
}    

</style>
<?php 
    
    if (!isset($_GET['vehicleid']) || $_GET['vehicleid'] == NULL) {
        echo "<script>window.location='404.php';</script>";
    }else{
       $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['vehicleid']);
    }

 
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     $brandName  = $_POST['brandName'];
    //     $updateBrand = $brand->brandUpdate($brandName,$id);
    // }

    $res= new Reserve();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reserveNow'])) {
        $addReserve = $res->addToReserve($_POST,$id);
    }


?>
            <span style="color:red; font-size: 30px; font-style:italic;">
                 <?php 
                    if(isset($addReserve)){
                        echo $addReserve;
                    }
                  ?>
            </span> 
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">		
				<?php 
					$getVehi = $vehi->getSingleVehicle($id);
					if($getVehi){
						while ($result = $getVehi->fetch_assoc()) {
	
				 ?>		
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $result['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">

                <table class="price">
                <tr>
                    <td colspan="2" rowspan="" headers=""><h2><?php echo $result['vehicleName']; ?></h2></td>
                </tr>
                <tr>
                    <td colspan="" rowspan="" headers=""> --------------------------------------------------- </td>
                    <td colspan="" rowspan="" headers=""> ------------------- </td>
                </tr>
                <tr>
                    <td colspan="" rowspan="" headers="">Category: </td>
                    <td colspan="" rowspan="" headers=""><p><span><?php echo $result['catName']; ?></span></p></td>
                </tr>

                <tr>
                    <td colspan="" rowspan="" headers=""> -------- </td>
                    <td colspan="" rowspan="" headers=""> -------- </td>
                </tr>

                <tr>
                    <td colspan="" rowspan="" headers="">Rate/Hour:(Inside Dhaka) </td>
                    <td colspan="" rowspan="" headers=""><p><span><?php echo $result['rate']; ?></span></p></td>
                </tr> 
                <tr>
                    <td colspan="" rowspan="" headers="">Rate/Day:(Inside Dhaka) </td>
                    <td colspan="" rowspan="" headers=""><p><span><?php echo $result['rateDay']; ?></span></p></td>
                </tr>

                <tr>
                    <td colspan="" rowspan="" headers="">Airport Pickup:(Inside Dhaka) </td>
                    <td colspan="" rowspan="" headers=""><p><span><?php echo $result['rateAirport']; ?></span></p></td>
                </tr> 
                <tr>
                    <td colspan="" rowspan="" headers="">Airport Pickup(Dhaka Dist): </td>
                    <td colspan="" rowspan="" headers=""><p><span><?php echo $result['rateAirport']*3; ?></span></p></td>
                </tr>

                <tr>
                    <td colspan="" rowspan="" headers=""> --------------------------------------------------- </td>
                    <td colspan="" rowspan="" headers=""> ------------------- </td>
                </tr>
                <tr>
                    <td colspan="" rowspan="" headers="">Total seat</td>
                    <td colspan="" rowspan="" headers=""><p><span><?php echo $result['seat']; ?></span></p></td>
                </tr>

                <tr>
                    <td colspan="" rowspan="" headers="">Vehice Condition</td>
                    <td colspan="2" rowspan="" headers=""><p><span><?php echo $result['vehiCondition']; ?></span></p></td>
                </tr>
                <tr>
                    <td colspan="" rowspan="" headers="">Brand</td>
                    <td colspan="2" rowspan="" headers=""><p><span><?php echo $result['brandName']; ?></span></p></td>
                </tr>


            </table>
                

            </div>
            <br><br>
			

			<div class="product-desc">
			<h2>Vehicle Details</h2> 
            <div class="vehicleDetails">
                
            <?php echo $result['body']; ?>
            </div>
	    </div>

		<?php  } }?>	

	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>Brand</h2>
					<ul>

                        <?php 
                            $bnd = new Brand();
                            $getBrand = $bnd->getAllBrand();
                            if($getBrand){
                                while($result = $getBrand->fetch_assoc()){
                         ?>
				      <li><a href="vehiclebybrand.php?brandId=<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></a></li>
				    <?php } } ?>
    				</ul>
    		</div>
 		</div>
 	</div>
	</div>
   


<div class="details">
	

  <form action="" method="post">
   
    <select name="tryTrip" required class="selectHire">
        <option value="" selected>Try Trip</option>
        <option value="1">1 Hour</option>
        <option value="2">2 Hour</option>
        <option value="3">3 Hour</option>
        <option value="4">4 Hour</option>
        <option value="5">5 Hour</option>
        <option value="6">6 Hour</option>
        <option value="7">7 Hour</option>
        <option value="8">8 Hour</option>
        <option value="9">9 Hour</option>
        <option value="10">Per Day</option>
        <option value="20">Two Day</option>
        <option value="4">Airtport Transfer(Inside Dhaka)</option>
        <option value="6">Airtport Transfer(Dhaka Dist)</option>
    </select>
    <select name="vehicleNumber" required class="numOfVehicle">
        <option value="" selected>Num Of Vehicle</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
    
    <input type="date" required name="datePick" placeholder="" class="dateSelect">
    <select name="timePick" required class="timeSelect">
        <option value="" selected>Time</option>
        <option value="6:00am">6:00am</option>
        <option value="6:30am">6:30am</option>
        <option value="7:00am">7:00am</option>
        <option value="7:30am">7:30am</option>
        <option value="8:00am">8:00am</option>
        <option value="8:30am">8:30am</option>
        <option value="9:00am">9:00am</option>
        <option value="9:30am">9:30am</option>
        <option value="10:00am">10:00am</option>
        <option value="10:30am">10:30am</option>
        <option value="11:00am">11:00am</option>
        <option value="11:30am">11:30am</option>
        <option value="12:00pm">12:00pm</option>
        <option value="12:30pm">12:30pm</option>
        <option value="1:00pm">1:00pm</option>
        <option value="1:30pm">1:30pm</option>
        <option value="2:00pm">2:00pm</option>
        <option value="2:30pm">2:30pm</option>
        <option value="3:00pm">3:00pm</option>
        <option value="3:30pm">3:30pm</option>
        <option value="4:00pm">4:00pm</option>
        <option value="4:30pm">4:30pm</option>
        <option value="5:00pm">5:00pm</option>
        <option value="5:30pm">5:30pm</option>
        <option value="6:00pm">6:00pm</option>
        <option value="6:30pm">6:30pm</option>
        <option value="7:00pm">7:00pm</option>
        <option value="7:30pm">7:30pm</option>
        <option value="8:00pm">8:00pm</option>
        <option value="8:30pm">8:30pm</option>
        <option value="9:00pm">9:00pm</option>
        <option value="9:30pm">9:30pm</option>
        <option value="10:00pm">10:00pm</option>
        <option value="10:30pm">10:30pm</option>
        <option value="11:00pm">11:00pm</option>
        <option value="11:30pm">11:30pm</option>
        <option value="12:00am">12:00am</option>

    </select>
    
	<input type="text" required name="pickAdd" placeholder="Pick Up Address" class="endAddress">
	
    <input type="text" required name="endAdd" placeholder="End Address" class="pickupTextField">
    <input type="submit" name="reserveNow" value="Reserve Now" class="submit1">
 </form>

</div>

<br><br><br><br>

<?php include 'inc/footer.php';?>