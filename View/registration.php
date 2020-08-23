<?php
session_start();
require('../Common/Const.php');
require '../Common/'.PDO;
?>
<!DOCTYPE html>
<html>
<head><title>Encode Workshop Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://kit.fontawesome.com/e55efccdcb.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../css/main.css">
</head>
<!--HEADING-->
<body class="bg-light">
<div class="jumbotron text-center text-white bg-primary">
<img id="logo" class="pb-1" src="../image/logo.jpg" alt="LOGO">
<h2 id="heading">Registration Form</h2>
<i onclick="change(event)" class="fas fa-moon fa-2x icon1" id="two"></i>
  	<i onclick="change(event)" class="fas fa-sun fa-2x icon1" ></i>
</div>
<!--HEADING ENDS-->
<!--MAIN BODY-->
<div class="container ">
<?php 
// IF CONTROLLER PAGE WILL RETURN ANY ERROR
if(isset($_SESSION['error'])){
		echo "<p style='color:red'>".$_SESSION['error']."</p>";
		$_SESSION['error']="";
}
?>
<form action="../Controller/Controller.php" method="post" enctype="multipart/form-data">
  <label for="fname">First name : </label>
  <input type="text" id="fname" name="fname" required placeholder="Magnus"><br><br>
  <label for="lname">Last name : </label>
   <input type="text" id="lname" name="lname" required placeholder="Carlsen"><br><br>
  <label for="pass">Password : </label>
  <input type="password" id="pass" name="pass" required placeholder="(a-b) (@#$%&) (0-9)"><br><br>
  <label for="repass">Re-enter Password : </label>
  <input type="password" id="repass" name="repass" required ><br><br>
   <label for="lname">Email : </label>
  <input type="email" id="lname" name="email" required placeholder="abc@gmail.com"><br><br>
  <label for="ph">Mobile Number : </label>
  <input type="text" id="ph" name="phone" required><br><br>
  <label for="roll">Roll Number : </label>
  <input type="text" id="roll" name="enroll" required placeholder="19BITXX"><br><br>
  <label for="branch">Branch :</label>
  <?php 
	$sql = 'SELECT * FROM branch';
	$stmt = $pdo->query($sql);
	echo "<select name='branch'>";
	while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
		
			echo "<option value='".$rows['branch_id']."'>".$rows['branch_name']."</option>";
		
	}
	echo "</select>";

?>
 <br><br>
   <label for="branch">Semester :</label>
   <?php 
	$sql = 'SELECT * FROM semester';
	$stmt = $pdo->query($sql);
	echo "<select name='sem'>";
	while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
			echo "<option value='".$rows['semester_id']."'>".$rows['semester_name']."</option>";
	}
	echo "</select>";

?>
 <br><br>
  <label for="img">Image : </label>
  <input type="file" id="img" name="filename"  required><br><br>
  <input type="submit" class="btn btn-primary" name="submit" value="Submit">
  <a class="btn btn-primary" href="login.php">Back</a>
</form> 
</div>
<!--MAIN BODY ENDS-->
</body>
<script src="../js/main.js"></script>
</html>
