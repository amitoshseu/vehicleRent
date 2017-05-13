<link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
<?php 
    include 'lib/Session.php'; 
    Session::init();
    include 'lib/Database.php'; 
    include 'helpers/Format.php'; 

    spl_autoload_register(function($class){
      include_once "classes/".$class.".php";

    });

    $db   = new Database();
    $fm   = new Format();
    $vehi = new Vehicle();
    $cmr  = new Customer();
    $res  = new Reserve();
    $mess = new Message();
    
 ?>


<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE html>
<html>
<head>
<meta content="text/html;"/>
<title>Car Rent</title>
<link rel="icon" type="image/png" href="titleCar.png" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>


<!-- +++++++++++++++++++++++++++++++++++++++++++++++
   MENU PART
++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<div class="menu-wrap">
  <div class="menu">
    <ul>
      <li><a href="index.php" class="active">Home</a></li>
      <li><a href="services.php">Services</a></li>
      <li class="dropdown">
        <a href="#" class="dropbtn">Gallery ▼</a>
          <div class="dropdown-content">
            <a href="cars.php">Car</a>
            <a href="minitruck.php">Mini Truck</a>
            <a href="bike.php">Motorcycle</a> 
          </div>
      </li> 
      <?php 
          $chkReserve = $res->checkReserveTable();
          if ($chkReserve) { ?>
            <li><a href="reserve.php">Pre-Book</a></li>
            <li><a href="payment.php">Payment</a></li>
      <?php    } ?>
            
       <?php 
          $cusId = Session::get("cusId");
          $chkBooking = $res->checkOrder($cusId);
          if ($chkBooking) { ?>
            <li><a href="bookingdetails.php">Booking</a></li>
      <?php    } ?>


      <?php 
          $login = Session::get("cuslogin");
          if ($login == true) { ?>
          <li><a href="profile.php">Profile</a></li>
      <?php   } ?>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </div>
</div>
            
      




<!-- +++++++++++++++++++++++++++++++++++++++++++++++
    NAME and LOGO PART
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->


<div class="header">
  <div class="logo">
    <h1>Vehicle<span>Rent</span></h1>
  </div>

  <?php 
    if(isset($_GET['cid'])){
      $delData = $res->delCustomerReservation();
      Session::destroy();
    }

   ?>
  <div class="social">

  <?php
    $login = Session::get("cuslogin");
    if($login == false){ ?>
       <a href="login.php" class="loginBtn">Login</a> 
    <?php }else { ?>
      <a href="?cid=<?php Session::get('cusId') ?>" class="loginBtn">Logout</a> 
  <?php } ?>

  </div>
</div>
