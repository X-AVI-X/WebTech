<?php      
    include('connection.php');  
        
    function login($username, $password)
    {
            //to prevent from mysqli injection  
            $con=my_conn();

            $username = stripcslashes($username);  
            $password = stripcslashes($password);  
            $username = mysqli_real_escape_string($con, $username);  
            $password = mysqli_real_escape_string($con, $password); 

         $sql = "select *from user_info where uname = '$username' and password = '$password'";  

        $result = mysqli_query($con, $sql);  

        $_SESSION['row']=$row = mysqli_fetch_assoc($result);  
        $count = mysqli_num_rows($result); 
          
        if($count > 0){  
            return true;  
        }  
        else{ 
            return false; 
        }
    }
?>  