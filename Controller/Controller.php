<?php
session_start();
require('../Common/Const.php');
require '../Common/'.PDO;
require P_MODEL;
if(isset($_POST['submit'])){
	$Fname = htmlentities($_POST['fname']);
	$Lname = htmlentities($_POST['lname']);
	$Roll = htmlentities($_POST['enroll']);
	$Sem = $_POST['sem'];
	$sql = "SELECT roll FROM user_master WHERE roll='$Roll' AND Sem_id='$Sem'";
	$stmt = $pdo->query($sql);
	if($stmt->rowCount()>0){
		$_SESSION['error'] = "User Already Exist";
		header('Location: '.REGISTRATION);
		return;
	}
	$pass1 = htmlentities($_POST['pass']);
	$pass2 = htmlentities($_POST['repass']);
	
	if(is_numeric($_POST['phone']) && (strlen($_POST['phone'])==10)){
		$Phone = $_POST['phone'];
	}
	else{
		$_SESSION['error'] = "Please Input Valid Mobile Number";
		header('Location: '.REGISTRATION);
		return;
	}
	$Email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
	if(!$Email){
		$_SESSION['error'] = "Please Input Valid Email Address";
		header('Location: '.REGISTRATION);
		return;
	}
	$branch = $_POST['branch'];
	$Sem = $_POST['sem'];
	$file = $_FILES['filename']['name'];
	if($pass1 == $pass2){
		if($_FILES['filename']['type'] !== 'image/jpeg' ){
			$_SESSION['error'] = 'Inavlid Format(Supported Only JPEG)';
			header('Location: '.REGISTRATION);
			return;
		}
		else{
			move_uploaded_file($_FILES['filename']['tmp_name'],'../upload/'.$file);
			$content = '../upload/'.$file;
			$result = addParticipant($Fname,$Lname,$pass1,$Email,$Phone,$Roll,$branch,$Sem,$content);
			$msg= "ACCOUNT CREATED SUCCESFULLY, Use Your RollNumber As User Name";
			header('Location: '.LOGIN.'?msg='.$msg);
		}
	}
	else{
		$_SESSION['error'] = "Password Doesn't Match!!";
		header('Location: '.REGISTRATION);
		return;
	}
}

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
		<style>
            body {font-family:Arial, Helvetica, sans-serif;}
            table {border: 1px solid black;}
            th {border: 1px solid black;padding:4px;background-barcode:cornsilk;}
            td {border: 1px solid black;padding:4px;}
            h3 {color:darkblue;}
            h4 {color:darkgreen;}
            h4 span  {color:firebrick;}
			#logo{
				width:150px;
			}
			#heading{
				display:inline-block;
			}
			.aqua{
				color:aqua;
			}
        </style>
		<script src="../js/main.js"></script>
</head>
<body class="bg-light">
<div class="jumbotron text-center text-white bg-primary">
<img id="logo" class="pb-1" src="../image/logo.jpg" alt="LOGO">
<h2 id="heading">IDENTITY CARD</h2>
<i onclick="change(event)" class="fas fa-moon fa-2x icon1" id="two"></i>
  	<i onclick="change(event)" class="fas fa-sun fa-2x icon1" ></i>
</div>
