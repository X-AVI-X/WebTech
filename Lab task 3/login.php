<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <?php
        $username = $password = "";
        $userError = $passError = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            //username validation
            $username=$_POST['username'];

            if(strlen($_POST['username'])<2)
            {
                $userError="Username can not be less than 2 characters!";
            }
            else if (!preg_match('/[0-9A-Za-z_.-]$/',$username))
            {
                $userError = "User Name can only contain alpha numeric characters, period, dash or 
                underscore only";
            }
            else 
            {
                $userError="";
            }
            $password = $_POST['password'];

            //password validation
            if (strlen($password)<8)
            {
                $passError="Password must not be less than eight (8) characters";
            }
            else if (!preg_match("/.*[@#$%]/",$password))
            {
                $passError="Password must contain at least one of the special characters (@, #, $,
                %)";
            }
        }
        ?>
    <fieldset>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <legend><h2><b>LOGIN</b></h2></legend>
        <br>
        User Name: <input type="text" name="username" value="<?php echo $username; ?>"> <?php echo $userError; ?>
        <br>
        Password: <input type="password" name="password" value="<?php echo $password; ?>"> <?php echo $passError; ?>
        <br><br>
        <input type="checkbox" name="remember" id="remember"> Remember Me
        <br><br>
        <input type="submit" value="Submit">
        <a href="">Forgot Password?</a>

    </form>
    </fieldset>

</body>
</html>