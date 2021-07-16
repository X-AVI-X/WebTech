<!DOCTYPE html>
<html>
<head>
	<title>My Profile</title>
  <?php include_once 'header.php' ?>
  <?php include_once ('../Controller/profile-check.php'); ?>
	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 40%;
  margin-left: auto;
  margin-right: auto;

}
td, th {
  border: 0px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>
</head>
<body>
 
 <div>
 	   <h3 style="color: red; background-color: yellow;" align="center">My Profile</h3>
 </div>

 <table>
  
  <tr>
    <td> <b>Name</b></td>
	<td>:</td>
    <td> <?php echo $name ?> </td>
   
  </tr>
  <tr>
    <td><b>Username</b></td>
	<td>:</td>
    <td> <?php echo $uname ?> </td>

  </tr>
  <tr>
    <td><b>E-mail</b></td>
	<td>:</td>
    <td> <?php echo $email ?> </td>

  </tr>
  <tr>
    <td><b>Gender</b></td>
	<td>:</td>
    <td> <?php echo $gender ?> </td>

  </tr>
  <tr>
    <td><b>Phone number</td>
	<td>:</td>
    <td> <?php echo $phone ?> </td>

  </tr>
  <tr>
    <td><b>City</td>
	<td>:</td>
    <td> <?php echo $city ?> </td>

  </tr>
  <tr>
    <td><b>Present Address</td>
	<td>:</td>
    <td> <?php echo $paddress ?> </td>

  </tr>
  <tr>
    <td><b>Permanent Address</td>
	<td>:</td>
    <td> <?php echo $peraddress ?> </td>

  </tr>
</table>
<br>

<p align="center"> <a href="./edit-profile.php">Edit</a> </p>


  <?php include_once 'footer.php' ?>

</body>
</html>