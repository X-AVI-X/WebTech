<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $dobErr = $emailErr = $genderErr = $websiteErr = $bgErr= $degErr="";
$name = $email = $gender = $comment = $website = $dob = $bg= $deg[0]= $deg[1]= $deg[2]= $deg[3]="";


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
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
      $website = "";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
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
  if (!empty($_POST['deg'])){
    if (sizeof($_POST["deg"])<2){
    $degErr="Please select at least two fields";
    }else{
    $degErr="";
    $deg=$_POST['deg'];
    }
  }else $degErr="Please select at least two fields";

  if (($_POST['bg'])==""){
    $bgErr="Blood group is requied";
  } else {
    $bgErr="";
    $bg=$_POST['bg'];
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Date of birth:<input type='date' id='dob'name='dob' min="1953-01-01" max="1998-12-31" value="<?php echo $dob;?>">
  <span class="error">* <?php echo $dobErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Other") echo "checked";?> value="Other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Degree: 
  <input type="checkbox" name="deg[0]" value="SSC" <?php if(isset($_POST['deg'][0])) echo "checked"; ?> >SSC 
  <input type="checkbox" name="deg[1]" value="HSC" <?php if(isset($_POST['deg'][1])) echo "checked"; ?> >HSC 
  <input type="checkbox" name="deg[2]" value="BSc" <?php if(isset($_POST['deg'][2])) echo "checked"; ?> >BSc 
  <input type="checkbox" name="deg[3]" value="MSc" <?php if(isset($_POST['deg'][3])) echo "checked"; ?> >MSc
  <span class="error">* <?php echo $degErr;?></span> 
  <br><br>
  <label for="bg"> Blood group:</label>
  <select id="bg" name="bg">
    <option value=""></option>
    <option value="A+" <?php if($bg == 'A+'){ echo ' selected="selected"'; } ?> >A+</option>
    <option value="B+" <?php if($bg == 'B+'){ echo ' selected="selected"'; } ?> >B+</option>
    <option value="O+" <?php if($bg == 'O+'){ echo ' selected="selected"'; } ?> >O+</option>
    <option value="A-" <?php if($bg == 'A-'){ echo ' selected="selected"'; } ?> >A-</option>
    <option value="B-" <?php if($bg == 'B-'){ echo ' selected="selected"'; } ?> >B-</option>
    <option value="O-" <?php if($bg == 'O-'){ echo ' selected="selected"'; } ?> >O-</option>
    <option value="AB+" <?php if($bg == 'AB+'){ echo ' selected="selected"'; } ?> >AB+</option>
    <option value="AB-" <?php if($bg == 'AB-'){ echo ' selected="selected"'; } ?> >AB-</option>
  </select> 
  <span class="error">* <?php echo $bgErr;?></span>
  <br> <br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo "<b>Name: </b>".$name;
echo "<br>";
echo "<b>Email: </b>".$email;
echo "<br>";
echo "<b>Website: </b>".$website;
echo "<br>";
echo "<b>Comment: </b>".$comment;
echo "<br>";
echo "<b>Gender: </b>".$gender;
echo "<br>";
echo "<b>Date of Birth: </b>".$dob;
echo "<br>";
echo "<b>Degrees:</b> ";
if (isset($_POST['deg'])){
  foreach($_POST['deg'] as $value)
  {
    echo $value.' ';
  }
  }
echo "<br>";
echo "<b>Blood group: </b>".$bg;
?>

</body>
</html>