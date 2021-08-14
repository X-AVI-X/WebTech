
<!DOCTYPE html>
<html>
<head>
	<title>My Profile</title>
  <?php 
  
  include_once 'header.php';
  include_once ('../Controller/edit-profile-customer-check.php');
  require_once '../Model/db_connect.php';
  include_once '../Controller/edit-profile-customer-check.php';
  require_once '../Model/mysqli-model.php';

?>
  <link rel="stylesheet" href="../style.css">
	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 40%;
  margin-left: auto;
  margin-right: auto;

}
td, th {
  border: 0px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>
</head>
<body>
 
 <div>
 	   <h3 class="title">Edit Profile</h3>
 </div>

 <form action="./edit-profile-customer.php" id="reg-form" method="POST" autocomplete="off" novalidate>

			<label for="name">Full Name:</label>
			<input type="text" id="name" name="name" value="<?php echo $_SESSION['row']['name'];?>" >
			<span class="error">*<?php echo $nameErr;?></span>

			<br><br>

			<input type="radio" id="male" name="gender" value="Male">
			<label for="male">Male</label>
			
			<input type="radio" id="female" name="gender" value="Female">
			<label for="female">Female</label>
			
			<input type="radio" id="other" name="gender" value="Other">
			<label for="other">Other</label>
			<span class="error">*<?php echo $genderErr;?></span>

			<br><br>

			<label for="city">City:</label>
			<select id="city" name="city" value="<?php echo $_SESSION['row']['city'] ?>"> 
				<option value="" selected>Select One</option>
				<option value="dhaka">Dhaka</option>
				<option value="cumilla">Cumilla</option>
				<option value="mymensingh">Mymensingh </option>
				<option value="rajshahi">Rajshahi</option>
				<option value="khulna">Khulna</option>
				<option value="chattagram">Chattagram</option>
				<option value="sylhet">Sylhet</option>
			</select>

			<br><br>
			<label for="paddress">Present Address:</label>
			<input type="text" id="paddress" name="paddress"value="<?php echo $_SESSION['row']['paddress'];?>">

			<br><br>

			<label for="peraddress">Permanet Address:</label>
			<input type="text" id="peraddress" name="peraddress"value="<?php echo $_SESSION ['row']['peraddress'];?>">

			<br><br>
			<label for="phone">Phone Number: </label>
			<input type="text" name="phone" id="phone" value="<?php echo $_SESSION['row']['phone'];?>">
			<br><br>

			<label for="email">Email:</label>
			<input type="email" id="email" name="email" value="<?php echo $_SESSION['row']['email'];?>">
			<span class="error">*<?php echo $emailErr;?></span>
			<br><br>
			
			<label for="uname">Username: </label>
			<input type="text" id="uname"name="uname" value="<?php echo $_SESSION ['row']['uname'];?>" <?php echo "readonly";?>>
			<span class="error">*<?php echo $unameErr;?> </span>
			<br><br>
			<label for="password">Password: </label>
			<input type="password" id="password" name="password" valu="<?php echo $password;?>"required>
			<span class="error">*<?php echo $passwordErr;?> </span>
			<br><br>
			<label for="cpassword">Confirm Password: </label>
			<input type="password" id="cpassword" name="cpassword" valu="<?php echo $cpassword;?>"required>
			<span class="error">*<?php echo $cpasswordErr;?> </span>
			<br><br>

			<button type="submit"name="submit" value="">Confirm</button>
		</div>
		<br>
	</form>
<br>

<script src='./javascript/registration.js'></script>
  <?php include_once 'footer.php' ?>

</body>
</html>