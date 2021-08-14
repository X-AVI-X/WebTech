<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
	<title>Forgetpassword</title>

    <?php include_once 'h1.php' ?>
    <?php include_once '../Controller/forgetpass-check.php' ?>
</head>
<body>
	<fieldset>
		<legend><h3>Forget password</h3></legend>
		<form method="post" id='form'>
			<table>
				<tr>
					<td><label for="email">Email:</label></td>
					<td><input type="text" id="email" name="email" value="<?php echo $email;?>"></td>
					<td><span class="error">*<?php echo $emailErr;?></span></td>
				</tr>
				<tr>
					<td><label for="password">Password: </label></td>
					<td><input type="password" id="password" name="password" value="<?php echo $password;?>"></td>
					<td><span class="error">*<?php echo $passwordErr;?> </span></td>
				</tr>
				<tr>
					<td><label for="cpassword">Confirm Password: </label></td>
					<td><input type="password" id="cpassword" name="cpassword" value="<?php echo $cpassword;?>"></td>
					<td><span class="error">*<?php echo $cpasswordErr;?> </span></td>
				</tr>
			</table>
			<br>
			<input type="submit" name="submit" value="Submit"> Go to <a href="home-customer.php">Sign in</a>
		</form> 
	</fieldset>


<?php include_once 'footer.php' ?>
<script src='./javascript/forgot-pass.js'></script>
</body>
</html>