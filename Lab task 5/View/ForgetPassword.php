<!DOCTYPE html>
<html>
<head>
	    <style>
.error {color: red;}
.success {color: green;}
</style>
	<title>Forgetpassword</title>

    <?php include_once 'h1.php' ?>
    <?php include_once '../Controller/forgetpass-check.php' ?>
</head>
<body>
	<fieldset>
		<legend><h3>Forget password</h3></legend>
		<form method="post">
			<table>
				<tr>
					<td><label for="email">Email:</label></td>
					<td><input type="email" id="email" name="email" value="<?php echo $email;?>"></td>
					<td><span class="error">*<?php echo $emailErr;?></span></td>
				</tr>
				<tr>
					<td><label for="password">Password: </label></td>
					<td><input type="password" id="password" name="password" valu="<?php echo $password;?>"required></td>
					<td><span class="error">*<?php echo $passwordErr;?> </span></td>
				</tr>
				<tr>
					<td><label for="cpassword">Confirm Password: </label></td>
					<td><input type="password" id="cpassword" name="cpassword" valu="<?php echo $cpassword;?>"required></td>
					<td><span class="error">*<?php echo $cpasswordErr;?> </span></td>
				</tr>
			</table>
			<br>
			<input type="submit" name="submit" value="Submit"> Go to <a href="home.php">Sign in</a>
		</form> 
	</fieldset>

<?php include_once 'footer.php' ?>

</body>
</html>