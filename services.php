<?php include 'inc/header.php';?>
<link href="css/service.css" rel="stylesheet" type="text/css" media="all"/>
<link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">


<div class="blockAbout">
 <?php 
      $gn = $mess->getNews();
      if ($gn) {
        while ( $result = $gn->fetch_assoc()) {


     ?>

  <h2 style="font-size: 35px;"><?php echo $fm->textShorten($result['title'],40); ?></h2>
  <?php echo $fm->textShorten($result['body'],150); ?>
<br>
 


<button onclick="window.location.href='knowMore.php?knowmoreid=<?php echo $result['id']; ?>'" style="padding: 7px 15px; font-size: 14px; background-color: #008CBA; color: white; margin-left:auto;margin-right:auto;display:block;">Read More</button></b>
<?php } } ?>
</div>


<div class="blockAbout">
 <?php 
      $gn = $mess->getNews2();
      if ($gn) {
        while ( $result = $gn->fetch_assoc()) {


     ?>

   <h2 style="font-size: 35px;"><?php echo $fm->textShorten($result['title'],40); ?></h2>
  <?php echo $fm->textShorten($result['body'],150); ?>
<br>
 


<button onclick="window.location.href='knowMore.php?knowmoreid=<?php echo $result['id']; ?>'" style="padding: 7px 15px; font-size: 14px; background-color: #008CBA; color: white; margin-left:auto;margin-right:auto;display:block;">Read More</button></b>
<?php } } ?>
</div>


<div class="testimonial" >
  <h2>Testimonial</h2>
    
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
  <p>-------Tamim Khan</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
  <p>-------Shoeb Akter</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
  <p>-------Anitosh Dhulakia</p>


 

</div>


<div class="blockAboutFreeSpace"></div>
<div class="blockAboutFreeSpace"></div>


<div class="containerCard2">
  <div class="avatar-flip2">
    <img src="images/carDemand.jpg" height="150" width="150">
  </div>
  <h2>CAR ON DEMAND</h2>
  <p>Our Vehicle rent website always try tu fulfill our customer Demans. Request a ride and they will arrive in time. Enjoy the ride and pay cash (Limited Service).</p>
</div>

<div class="containerCard2">
  <div class="avatar-flip2">
    <img src="images/preReserve.jpg" height="150" width="150">
  </div>
  <h2>PRE-RESERVATION</h2>
  <p>Reserve car, motorcycle and minitruck by our website, Phone, SMS, FB Messenger and email. You will see your car Just In Time.</p>
</div>

<div class="containerCard2">
  <div class="avatar-flip2">
    <img src="images/plane.jpg" height="150" width="150">
  </div>
  <h2>AIRPORT PICKUP</h2>
  <p>Our drivers are always ready for Airport drop off and pick up. Just provide your flight information and Our driver will be there accordingly.</p>
</div>




<h2 align="center"  style="font-size: 35px; clear: left" >Advantages</h2>
<h3 align="center">Because we care our customer</h3>
<p align="center">-----------------------------</p>

<div class="blockAboutFreeSpace"></div>



<div class="containerCard">
  <div class="avatar-flip">
    <img src="images/run.png" height="150" width="150">
  </div>
  <h2>COMPETITIVE FARE</h2>
  <p>We fare are calculated based on base fee, time, distance, and Trust & Safety Fee. We frequently change our price based on demand and supply. So, Our fare is always competitive compared to other similar transportation services.</p>
</div>

<div class="containerCard">
  <div class="avatar-flip">
    <img src="images/driver.png" height="150" width="150">
</div>
  <h2>RELIABLE DRIVER</h2>
  <p>Our drivers have minimum 5 years driving experience, able to speak Basic English, polite and co-operative. We provide you best service. We strive to provide you with the best service and experience.</p>
</div>

<div class="containerCard">
  <div class="avatar-flip">
    <img src="images/gtCar.jpg" height="150" width="150">
</div>

  <h2>GREAT CAR</h2>
  <p>We uses,newer model and upscale/renowned branded cars, byke, and minitruck. Each car is clean and well maintained to ensure you a comfortable and safe ride.</p>
</div>

<div class="containerCard">
  <div class="avatar-flip">
    <img src="images/minute.jpg" height="150" width="150">
</div>
  <h2>ETA 30 MINUTES AND UP</h2>
  <p>We are working hard to ensure your car arrives in 30 minutes on average whenever you request a car. We are adding new drivers every day in our system to ensure you prompt service.</p>
</div>



<?php include 'inc/footer.php';?>