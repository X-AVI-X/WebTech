<?php 
	
	$name =								 "";
	$email=							"";
	$gender=					"";
	$phone=					"";
	$city=				"";
	$paddress=		"";
	$peraddress="";
/*
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
		*/

					$uname=$_SESSION['row']['uname'];
                	$_SESSION['name'] = $_SESSION['row']['name'];
					$name =								 $_SESSION['row']['name'];
					$email=							$_SESSION['row']['email'];
					$gender=					$_SESSION['row']['gender'];
					$phone=					$_SESSION['row']['phone'];
					$city=				$_SESSION['row']['city'];
					$paddress=		$_SESSION['row']['paddress'];
					$peraddress=$_SESSION['row']['peraddress'];
        
?>
