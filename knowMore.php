<?php include 'inc/header.php';?>
<link href="css/service.css" rel="stylesheet" type="text/css" media="all"/>
<link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">

<?php 
    
    if (!isset($_GET['knowmoreid']) || $_GET['knowmoreid'] == NULL) {
        echo "<script>window.location='404.php';</script>";
    }else{
       $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['knowmoreid']);
    }

?>
          
 <div align="center" class="blockAboutFull">


	
				<?php 
					$getNews = $mess->getNewsById($id);
					if($getNews){
						while ($result = $getNews->fetch_assoc()) {
	
				 ?>		

			<h2><?php echo $result['title']; ?></h2>
			<p><b>Author:</b><?php echo $result['author']; ?></p>
			<p><b>Time:</b><?php echo $fm->formatDate($result['date']); ?></p>
			<?php echo $result['body']; ?>
	

		<?php  } }?>	

</div>
   

<br><br><br><br>

<?php include 'inc/footer.php';?>