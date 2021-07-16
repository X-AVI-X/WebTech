<?php

$error = $success =  "";
$uname = $password = "";

session_start();

if (isset($_POST['submit']))
{
    if (empty($_POST["uname"]) && empty($_POST["password"])) 
    {
        $error = "Both username and password required";
    } 
    else 
    {
        $uname = $_POST["uname"];
        $password = $_POST["password"]; 
        $data = file_get_contents("../Model/data.json");  
        $data = json_decode($data, true);  
                
        foreach($data as $row)  
        {  
            if ($row["username"] == $uname && $row["password"] == $password) 
            {

                $success = "Login successful";
                $_SESSION['uname'] = $uname;
                $_SESSION['password'] = $password;
                $_SESSION['name'] = $row['name'];
                header("location:home.php");
                if(empty($success))
                {
                    $error = "Invalid username/password";
                }
                else
                {
                    $error = "";
                }
            }
            else
            {
                $error = "Invalid Username/Password";
            }
        }
    }

    if(empty($_POST["remindMe"]))
    {
    setcookie("username","");
    setcookie("password","");
    }
    else
    {
        setcookie ("uname",$_POST["uname"],time()+ 100);
        setcookie ("password",$_POST["password"],time()+ 100);
    } 
}
?>