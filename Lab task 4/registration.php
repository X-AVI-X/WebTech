<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        .error {color: #FF0000;}
        </style>
</head>
<body>
    <?php include 'header.php'?>

    <fieldset> 

        <?php
        // define variables and set to empty values
        $passErr= $confirmPassErr= $UserError= $nameErr = $dobErr = $emailErr = $genderErr = $websiteErr = $bgErr= $degErr="";
        $confirmPass= $password=$username= $name = $email = $gender = $comment = $website = $dob = $bg= $deg[0]= $deg[1]= $deg[2]= $deg[3]="";


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } 
        
        if (str_word_count($_POST["name"]) > 2) {
            $nameErr = "Max 2 words only";
        } 
        else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-'. ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            $name = "";
            }

        }
        
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $email = "";
            }
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (empty($_POST["dob"])){
            $dobErr="Date of birth is required";
        }
        else {
            $dobErr = "" ;
            $dob = $_POST["dob"];
        }

        if (empty($_POST['password'])){
            $passErr="Input password";
        }

        if (empty($_POST['confirmPass'])){
            $confirmPassErr="Input confirm password again";
        }
        ////////////////////////////////////////////////////
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
                $passErr="Password must not be less than eight (8) characters";
            }
            else if (!preg_match("/.*[@#$%]/",$password))
            {
                $passErr="Password must contain at least one of the special characters (@, #, $,
                %)";
            }
        }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        ?>
        <legend align='Left'>  <h2>REGISTRATION</h2> </legend> 
        <p><span class="error">* required field</span></p>
        <form method="post" align='center' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Name: <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        User Name: <input type="text" name="username" value="<?php echo $username;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        Password: <input type="password" name="password" value="<?php echo $password;?>">
        <span class="error">* <?php echo $passErr;?></span>
        <br><br>
        Confirm Password: <input type="password" name="confirmPass" value="<?php echo $confirmPass;?>">
        <span class="error">* <?php echo $confirmPassErr;?></span>
        <br><br>
        E-mail: <input type="email" name="email" value = "<?php echo $email;?>"
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>

        Date of birth:<input type='date' id='dob'name='dob' min="1953-01-01" max="1998-12-31" value="<?php echo $dob;?>">
        <span class="error">* <?php echo $dobErr;?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Other") echo "checked";?> value="Other">Other  
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>
        <br> <br>
        <input type="submit" name="submit" value="Submit">  
        </form>

        <?php
        echo "<h2>Your Input:</h2>";
        echo "<b>Name: </b>".$name;
        echo "<br>";
        echo "<b>Email: </b>".$email;
        echo "<br>";
        echo "<b>Gender: </b>".$gender;
        echo "<br>";
        echo "<b>Date of Birth: </b>".$dob;
        echo "<br>";
        ?>

    </fieldset>

    <?php include 'footer.php'?>
</body>
</html>