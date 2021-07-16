<?php 
	
	$name =								 "";
	$email=							"";
	$gender=					"";
	$phone=					"";
	$city=				"";
	$paddress=		"";
	$peraddress="";

 $data = file_get_contents("../Model/data.json");  
        $data = json_decode($data, true);  
                
        foreach($data as $row)  
        {  
            if ($row["username"] == $_SESSION['uname'] && $row["password"] == $_SESSION['password']) 
            {

                 	$uname=$_SESSION['uname'];
                	$password=$_SESSION['password'];
                	$_SESSION['name'] = $row['name'];
					$name =								 $row['name'];
					$email=							$row['e-mail'];
					$gender=					$row['gender'];
					$phone=					$row['phone'];
					$city=				$row['city'];
					$paddress=		$row['paddress'];
					$peraddress=$row['peraddress'];
				
            }

		}
        
?>
