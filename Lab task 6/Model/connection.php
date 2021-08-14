<?php
function my_conn()
{      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "eshop";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
    return $con;
}  
?>  