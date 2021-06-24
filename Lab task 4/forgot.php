<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<?php
$email="";
?>
<body>
    <?php include "header.php";?>
    <fieldset>
        <legend><h2>FORGOT PASSWORD</h2></legend>
        <br>
        Enter Email: <input type = "email" name="email" value ="<?php echo $email;?>"> 
        <br><br>
        <input type="submit" name="Submit">
    </fieldset>
    <?php include "footer.php";?>
</body>
</html>