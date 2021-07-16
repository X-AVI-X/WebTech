<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>

	<?php include_once 'h1.php' ?>
 	<?php include_once '../Controller/reg-check.php' ?>

</head>
<body>
 <h3 style="color: red; background-color: yellow;" align="center">Please fill-up the all info </h3>
	<fieldset > 
			<legend align="center" ><h2><u>Registration From</u></h2></legend>
      <div align="center">
		<form action="reg.php" method="POST" autocomplete="off" novalidate>

		<label for="name"> Name:</label>
		<input type="text" id="name" name="name" value="<?php echo $name;?>" required >
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
		<select id="city" name="city"> 
			<option value="" selected>Select One</option>
			<option value="dhaka">Dhaka</option>
			<option value="cumilla">Cumilla</option>
			<option value="mymensingh">Mymensingh </option>
			<option value="rajshahi">Rajshahi</option>
			<option value="khulna">
Khulna</option>
			<option value="chattagram">Chattagram</option>
			<option value="sylhet">Sylhet</option>
		</select>

		<br><br>
		<label for="fname">Present Address:</label>
		<input type="text" id="paddress" name="paddress">

		<br><br>


		<label for="lname">Permanet Address:</label>
		<input type="text" id="peraddress" name="peraddress">

		<br><br>
		 <label for="Phone">Phone Number: </label>
		<input type="text" name="phone" required="+">
		<br><br>


		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="<?php echo $email;?>">
  <span class="error">*<?php echo $emailErr;?></span>
		<br><br>
		
		<label for="uname">Username: </label>
		<input type="text" id="uname"name="uname" value="<?php echo $uname;?>">
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


		<button type="submit"name="submit" value="">SIGN-UP</button></div>
		Already a user? Sign-in <a href="signin.php">here</a>
		
	</form>

	</fieldset>
  <?php include 'footer.php' ?>

</body>
</html>