<?php
	include_once "../Controller/header-check.php"
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style.css">
	<title>E-shop.com</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div style="width: 100% ; background-color:white;">
		<div style="color:gray;"  align="center" >
			<h1>E-Shop.com</h1> <hr>
		</div>
		<fieldset>
			<div class="header"> 
				<a href="../View/home-customer.php">Home</a>
				<a href="../View/history-customer.php">History</a>
				<a href="../View/profile-customer.php">Profile</a>
			</div>

			<div class="searchbox">
				<?php include_once '../View/search-product.php' ?>
			</div>

			<div align="right">
				Welcome, <?php echo $_SESSION['name']?><a href="logout.php">|Log-out</a>
			</div>
		</fieldset>
	</div>
</body>
</html>
<?php echo "<br>"; ?>