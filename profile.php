<?php include 'inc/header.php';?>
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all"/>

<?php
    $login = Session::get("cuslogin");
    if($login == false){
        header("Location:login.php");
    }
 ?>
 <style type="text/css">
     .tblone{width: 600px;margin:0 auto; border:2px solid #ddd; }
     .tblone tr td{text-align: justify;}
     .caption1{font-size: 20px; font-weight: bold; color:black;}
 </style>
 <div class="main">
    <div class="content">
    	<div class="section group">
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
                <td>Address</td>
                <td>:</td>
                <td><?php echo $result['address']; ?></td>
              </tr>
              <tr>
                <td>City</td>
                <td>:</td>
                <td><?php echo $result['city']; ?></td>
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
   

<?php include 'inc/footer.php';?>