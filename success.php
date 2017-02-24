<?php include 'inc/header.php';?>
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all"/>

<?php
    $login = Session::get("cuslogin");
    if($login == false){
        header("Location:login.php");
    }
 ?>
 <style type="text/css">
     .psuccess{width: 500px; min-height: 200px; text-align: center;border:1px solid #ddd;margin: 0 auto;
      padding: 20px 50px 70px 40px;;}
     .psuccess h2{border-bottom: 1px solid #ddd; margin-bottom: 40px; padding-bottom: 10px;}
     .psuccess p {line-height: 25px; font-size: 18px; text-align: left;}
 </style>
 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="psuccess">
            <h2>Success</h2>
            <?php 
                 $cusId = Session::get("cusId");
                 $amount= $res->PayableAmount($cusId);
                 if($amount){
                  $sum = 0; 
                  while($result = $amount->fetch_assoc()){
                    $rate = $result['rate']; 
                    $sum = $sum + $rate;
                  }
                 }
             ?>
            <p style="color:red">Total Paybale Amount(Including Everyting): $
              <?php echo $sum; ?>
            </p>

            <p>Thanks for Booking. Receive Your Booking Successfully.We will Contact
            with ASAP.Here is your booking details... <a href="bookingdetails.php" title="">Click Here</a></p>

            **Extra hour charge have to pay manually.  
        </div>

 		</div>
 	</div>
	</div>
   

<?php include 'inc/footer.php';?>