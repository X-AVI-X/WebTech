<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
        <style>
            .newpass{
                color:green;
            }
            .retypepass{
                color:red;
            }
        </style>
</head>
<body>
    <fieldset>
    <legend><h2><b>CHANGE PASSWORD</b></h2></legend>
    <form action="" method="post">
        Current Password : <input type="password" name="password" id="password">
        <br>
        
        <span class="newpass">New Password : </span> <input type="password" name="newpass" id="newpass">
        <br>
        <span class="retypepass">Retype New Password : </span> <input type="password" name="retypepass" id="retypepass">
        <br>
        <p color:red> <?php echo $warning;?> </p>
        <br>
        <input type="submit" value="Submit">
    </form>
    </fieldset>
<?php
if ($_POST['newpass'] != $_POST['retypepass']){
    $warning="Password doesn't match!";
}
else $warning='';
?>
</body>

</html>