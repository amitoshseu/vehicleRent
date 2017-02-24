<?php include 'inc/header.php';?>
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all"/>

<?php
    $login = Session::get("cuslogin");
    if($login == false){
        header("Location:login.php");
    }
 ?>

 <?php 
    if (isset($_GET['bookingid']) && $_GET['bookingid'] =='booking' ) {
      $cusId = Session::get("cusId");
      $insertBooking = $res->bookVehicle($cusId);
      $delData = $res->delCustomerReservation();
      header("Location:success.php"); 
    }
  ?>
 <style type="text/css">
     .division{width: 50%; float:left;}
     .tblone{width: 95%;margin:0 auto; border:2px solid #ddd; }
     .tblone tr td{text-align: justify;}
     .caption1{font-size: 20px; font-weight: bold; color:black;}
     .tbltwo{float:right;text-align:left; width:40%; margin-right: 14px; margin-top: 12px;}
     .tbltwo tr td{text-align: justify;padding:5px 10px; }
     .booking{padding-bottom: 50px; padding-top: 50px;}
     .booking a{width: 160px; margin:5px auto 0; padding:7px 0; text-align: 
      center; display: block; background:#ff0000;border:1px solid #333; color: #fff; border-radius: 3px; font-size: 25px;}
 </style>

 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="division">

          <table class="tblone">
              <tr>
                <th width="3%">SL</th>
                <th width="20%">Vehicle Name</th>
                <th width="15%">PickUp Add</th>
                <th width="8%">Date</th>
                <th width="5%">Time</th>
                <th width="3%">V.N</th>
                <th width="5%">T.Amount</th>

              </tr>

              
              <?php
                $getVehi = $res->getReserveVehicle();
                if($getVehi){
                  $i=0;
                  $sum = 0;
                  while($result = $getVehi->fetch_assoc()){
                    $i++;
              ?>
 
                 <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $result['vehicleName'];?></td>
                <td><?php echo $result['pickAdd'];?></td>
                <td><?php echo $result['datePick'];?></td>
                <td><?php echo $result['timePick'];?></td>
                <td><?php echo $result['vehicleNumber'];?></td>
                <td><?php 
                $total = $result['rate']* $result['tryTrip'] * $result['vehicleNumber']; 
                echo $total;?></td>
              </tr>
              <?php 
                $sum = $sum+ $total;
              ?>
              
              <?php } }?>
            </table>

            <table class="tbltwo" >
              <tr>
                <th>Grand Total: </th>
                <td>TK. <?php echo $sum;?></td>
              </tr>
              
             </table>
        </div>

        <div class="division" >
          <?php 
            $id = Session::get("cusId");
            $getdata = $cmr->getCustomerData($id);
            if($getdata){
                while ($result = $getdata->fetch_assoc()){
 
         ?>
          <table class="tblone">
              <tr>
                <td colspan="3" class="caption1">Your Profile Details</td>
              </tr>
              <tr>
                <td>Name</td>
                <td>:</td>
                <td><?php echo $result['name']; ?></td>
              </tr>
              <tr>
                <td>Phone</td>
                <td>:</td>
                <td><?php echo $result['phone']; ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $result['email']; ?></td>
              </tr>
              
              <tr>
                <td></td>
                <td></td>
                <td><a href="editprofile.php" title="">Update Details</a></td>
              </tr>

          </table>
          <?php } } ?>
        </div>
 		</div>
 	</div>
  <div class="booking">
          <a href="?bookingid=booking" title="">Booking Now</a>
        </div>
	</div>
   

<?php include 'inc/footer.php';?>