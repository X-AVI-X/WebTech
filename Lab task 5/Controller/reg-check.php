<?php

$nameErr = $emailErr = $unameErr = $genderErr = $passwordErr = $cpasswordErr = $error = "";
$name = $email = $uname  = $gender = $password = $cpassword = $success = "";



if (isset($_POST['submit'])) 
{
    if (empty($_POST["name"])) 
    {
        $nameErr = "Name is required";
    } 
    else 
    {
        $name = $_POST["name"];
        if (preg_match("/^[a-zA-Z -]*$/",$name)) 
        {
            if (str_word_count($name) >= 2) 
            {
            }
            else
            {
                $nameErr = "Atleast two word needed";
                $name="";
            }
        }
        else
        {
            $nameErr = "Only A-Z, a-z, Dash(-) and Period( ) are allowed";
            $name="";
        }
    }

    if (empty($_POST["email"])) 
    {
        $emailErr = "Email is required";
    } 
    else 
    {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $emailErr = "Invalid email format";
            $email ="";
        }
    }

    if (empty($_POST["uname"])) 
    {
        $unameErr = "Username is required";
    } 
    else 
    {
        $uname = $_POST["uname"];
        if (preg_match("/^[a-z-_0-9]*$/",$uname)) 
        {
            if(strlen($uname) >= 2)
            {
            }
            else
            {
                $unameErr = "Username must contain atleast 2 charecters";
                $uname="";
            }
        }
        else
        {
            $unameErr = "Only a-z, 0-9, Dash(-) and Underscore(_) are allowed";
            $uname="";
        }
    }

    if (empty($_POST["password"])) 
    {
        $passwordErr = "Password is required";
    } 
    else 
    {
        $password = $_POST["password"];
        if (strlen($password) >= 8) 
        {
        }
        else
        {
            $passwordErr = "Password  must contain atleast 8 charecters";
            $password = "";
        }
    }

    if (empty($_POST["cpassword"])) 
    {
        $cpasswordErr = "Confirm password is required";
    } 
    else 
    {
        $cpassword = $_POST["cpassword"];
        if ($cpassword == $password) 
        {
        }
        else
        {
            $cpasswordErr = "Password and confirm passward did not match";
            $password = "";
            $cpassword= "";
        }
    }

    if (empty($_POST["gender"])) 
    {
        $genderErr = "Gender is required";
    } 
    else 
    {
        $gender = $_POST["gender"];
    }

  

    if(file_exists('../Model/data.json'))  
    {  
        if(empty($name))  
          {  
              $error = "Failed";  
         }
          else if(empty($email))  
          {  
               $error = "Failed";   
          }  
          else if(empty($uname)) 
          {  
               $error = "Failed";  
          }  
          else if(empty($password))  
          {  
               $error = "Failed"; 
          }
          else if(empty($cpassword))  
          {  
               $error = "Failed"; 
          } 
          else if(empty($gender))  
          {  
               $error = "Failed"; 
          } 

        else
        {
            $current_data = file_get_contents('../Model/data.json');  
            $array_data = json_decode($current_data, true);  
            $extra = array('name'               =>     $name,  
                            'e-mail'          =>     $email,  
                            'username'     =>     $uname,
                            'password'  =>     $password, 
                            'gender' =>     $gender,  
                            'peraddress' => $_POST['peraddress'],
                            'paddress'=>$_POST['paddress'],
                            'city'=>$_POST['paddress'],
                            'phone'=> $_POST['phone']
                           );   

            $array_data[] = $extra;  
            $final_data = json_encode($array_data, JSON_PRETTY_PRINT);  
            if(file_put_contents('../Model/data.json', $final_data))  
            {  
                $success = "Registration successful";
                header("location:../View/signin.php");
            }    
               else  
               {  
                $error = "JSON File doesn't exits";  
               }
        }
    }
}
?>