<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
.error {color: red;}
.success {color: green;}
</style>
    <title>Signin</title>
    
    <?php include_once 'h1.php' ?>
    <?php include_once '../Controller/signin-check.php' ?>
       
</head>
<body>
        <h2>Welcome to Our Shop!</h2>
    <fieldset>
    <legend><h2>Log-in</h2></legend>
    <form method="post" >
        <br>
            <table>
                <tr>
                     <td> User Name </td>
                        <td> <input type="text" name="uname" value="<?php if(isset($_COOKIE["uname"])){ echo $_COOKIE["uname"];} ?>"> </td>
                </tr>
                <tr>
                    <td> Password </td>
                    <td> <input type="password" name="password" value="<?php if(isset($_COOKIE["password"])){ echo $_COOKIE["password"];} ?>"> </td>
                </tr>
                </table>
            <span class="error"><?php echo $error;?></span><span class="success"><?php echo $success;?></span>      
            <br>
               
       <input type="checkbox" name="remindMe" <?php if(isset($remindMe) && $remindMe=="Remind Me") echo "checked";?> value="Remind Me">Remind Me
       <br><br>
            <input type="submit" name="submit" value="Submit"> <a href="ForgetPassword.php">Forget Password?</a>
            <br><br>
            Not a member yet? <a href="reg.php">Sign up</a>
           
    </fieldset>
    </form>

    <?php include 'footer.php' ?>

   

</body>
</html>