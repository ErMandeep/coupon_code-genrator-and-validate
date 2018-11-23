<?php include"db.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Coupon Code Genrater</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<?php 
	 $query = "SELECT * FROM codes WHERE used ='0'";
        $select_image = mysqli_query($connection, $query); 
            
      while($row = mysqli_fetch_assoc($select_image)){
          $id = $row['id'];
          $code = $row['codes'];
          $amount = $row['amount'];
?>



<div class="form-control">
		<input class="form-control" value="<?php echo $code; ?>">
		</div>

<?php } ?>

	<!-- <div class="container"> -->

		<div class="row">
			<!-- <div class="col-md-12"> -->
	<form action="" method="post" id="coupon_form">


		<div class="form-control">
			Discount Amount:<input type="text" name="amount">
		</div>

		<div class="form-control">
		<!-- <input class="form-control" placeholder="Result here" id="result" rows="3" value=""> -->
			
		<input type="submit" name="submit" value="Genrate Code">	
		</div>
		<!-- </div> -->
		<!-- </div> -->

	</form>
	<!-- <?php echo (rand()); ?> -->

</div>


</body>
</html>



<?php 
 if(isset($_POST['submit'])){

$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$res = "";
for ($i = 0; $i < 10; $i++) {
    $res .= $chars[mt_rand(0, strlen($chars)-1)];
}
	
	$amount = $_POST['amount'];

	$query = "INSERT INTO codes (amount, codes) VALUES('{$amount}','{$res}')";

	$result = mysqli_query($connection, $query);
	
	if($result){
		header('Location: coupon_code genrator.php');
	}

}
 
 ?>

 