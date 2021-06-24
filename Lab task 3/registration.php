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

        <?php
        // define variables and set to empty values
        $passErr= $confirmPassErr= $UserError= $nameErr = $dobErr = $emailErr = $genderErr = $websiteErr = $bgErr= $degErr="";
        $confirmPass= $password=$username= $name = $email = $gender = $comment = $website = $dob = $bg= $deg[0]= $deg[1]= $deg[2]= $deg[3]="";
        $checkValid = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
          if (!empty($_POST["name"])) 
          {
              $nametest = test_input($_POST["name"]);
              $checkValid = 0;

              if (str_word_count($_POST["name"]) > 2) 
              {
                  $checkValid = 0;
                  $nameErr = "Max 2 words only";
              } 
                // check if name only contains letters and whitespace
              else if (!preg_match("/^[a-zA-Z-'. ]*$/",$name)) 
                {
                    $checkValid = 0;
                    $nameErr = "Only letters and white space allowed";
                }
              else
              {
                $name=$nametest;
                $checkValid=1;

              }
          }
        
          else if (empty($_POST['name']))
          {
            $checkValid = 0;
              $nameErr = "Name is required";
          }

          // email validation
          
          else if (empty($_POST["email"])) {
            $checkValid = 0;
              $emailErr = "Email is required";

          } else {
              $emailtest = test_input($_POST["email"]);
              // check if e-mail address is well-formed
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
              {
                $checkValid = 0;
                $emailErr = "Invalid email format";
                $email = "";
              }
              else
              {
                $email=$emailtest;
                $checkValid = 1;
              }
          }

          //gender validation

          if (empty($_POST["gender"])) {
            $checkValid = 0;
              $genderErr = "Gender is required";
          } else {
              $gender = test_input($_POST["gender"]);
              $checkValid = 1;
          }
          
          //dob validation

         if (empty($_POST["dob"])){
              $dobErr="Date of birth is required";
              $checkValid = 0;
          }
          else {
              $dobErr = "" ;
              $dob = $_POST["dob"];
              $checkValid = 1;
          }

            // password validation
         if (empty($_POST['password'])){
              $passErr="Input password";
              $checkValid = 0;
          }
          else 
          {
            $checkValid = 1;
          }

          //confirm pass validation

          if (empty($_POST['confirmPass'])){
              $confirmPassErr="Input confirm password again";
              $checkValid = 0;
          } else $checkValid = 1;

          //password validation
          if (strlen($_POST['password'])<8)
          {
              $passErr="Password must not be less than eight (8) characters";
              $checkValid = 0;
          }
          else if (!preg_match("/.*[@#$%]/",$_POST['password']))
          {
              $passErr="Password must contain at least one of the special characters (@, #, $,
              %)";
              $checkValid = 0;
          }

          if ($_POST['password']!=$_POST['confirmPass'])
          {
            $confirmPassErr="Both password must be matched.";
            $checkValid = 0;
          }
          else {
            $checkValid = 1;
            $password=$_POST['password'];
          }

          if (empty($_POST['username']))
          {
            $userError="Username is required.";
            $checkValid = 0;
          }

            if(strlen($_POST['username'])<2)
            {
                $userError="Username can not be less than 2 characters!";
                $checkValid = 0;
            }
            else if (!preg_match('/[0-9A-Za-z_.-]$/',$username))
            {
                $userError = "User Name can only contain alpha numeric characters, period, dash or 
                underscore only";
                $checkValid = 0;
            }
            else 
            {
              $checkValid = 1;
                $userError="";
                $username = $_POST['username'];
            }
           
        }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        ?>
        
    <fieldset>
        <legend align='Left'>  <h2>REGISTRATION</h2> </legend> 
          <p><span class="error">* required field</span></p>
          <form method="post" align='left' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
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
            E-mail: <input type="email" name="email" value = "<?php echo $email;?>">
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

    </fieldset>
</body>
<?php  
 $message = '';  
 $error = '';  
 
           if(file_exists('data.json') && $checkValid == 1)  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'                       =>     $name,  
                     'email'                  =>     $email,  
                     'username'           =>     $username,  
                     'gender'          =>     $gender,  
                     'dob'          =>     $dob,
                     'password'=>     $password
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }   
 echo $message;  
 ?> 

</html>