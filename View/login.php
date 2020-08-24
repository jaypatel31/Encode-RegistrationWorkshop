<?php
	session_start();
	require('../Common/Const.php');
	require_once('../Common/'.PDO);
	if(isset($_POST['submit'])){
		$sql = "SELECT * FROM user_master WHERE roll = :user AND user_password = :pass";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(
			':user' => $_POST['username'],
			':pass' => $_POST['password']
		));
		
		$rows = $stmt->fetch(PDO::FETCH_ASSOC);
		if($rows!== false){
			$_SESSION['username'] = $rows['roll'];
			$type =$rows['Type'];
			if($type==0){
				header('Location: ../index.php');
			}
			else if($type==1 || $type==2 || $type==3){
				header('Location: '.PARTICIPANT);
			}
		}
		else{
			header('Location: '.LOGIN.'?error=INVALID CREDENTIALS');
			return;
		}
	}
	if(isset($_GET['mode'])){
		if($_GET['mode']=='dark'){
			$_SESSION['mode'] = 'dark';
		}
		else{
			$_SESSION['mode'] = 'light';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Encode-Registration</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <script src="https://kit.fontawesome.com/e55efccdcb.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../css/main.css">
<style>
body {
	color: #fff;
	
}
.img-bg{
	width: 100%;
  height: 100%;
  position: absolute;
  left: 0px;
  top: 0px;
  z-index: -1;
}
.form-control {
	min-height: 41px;
	background: #f2f2f2;
	box-shadow: none !important;
	border: transparent;
}
.form-control:focus {
	background: #e2e2e2;
}
.form-control, .btn {        
	border-radius: 2px;
}
.login-form {
	width: 350px;
	margin: 30px auto;
	text-align: center;
}
.login-form h2 {
	margin: 10px 0 25px;
}
.login-form form {
	position:relative;
	color: #7a7a7a;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.login-form .btn {        
	font-size: 16px;
	font-weight: bold;
	background: #3598dc;
	border: none;
	outline: none !important;
}
.login-form .btn:hover, .login-form .btn:focus {
	background: #2389cd;
}
.login-form a {
	color: #fff;
	text-decoration: underline;
}
.login-form a:hover {
	text-decoration: none;
}
.login-form form a {
	color: #7a7a7a;
	text-decoration: none;
}
.login-form form a:hover {
	text-decoration: underline;
}
#sm-logo{
	width:40px;
	border-radius:50%;
	position:absolute;
	top:2%;
	right:5%;
}
@media only screen and (max-width:400px){
	.login-form {
		width: 300px;
	}
}
.icon1{
	top:2%;
	bottom:auto;
}
<?php 
	if(isset($_SESSION['mode'])){
		if($_SESSION['mode']=='dark'){
		?>
#one{
	display:none;
}

#form1{
	background-color:#343a40;
	color:white;
}
<?php		
		}
	}
?>	
</style>

</head>
<body>
<img class="img-bg" id="img-bg" src="../image/background.jpg"> </img>
<div class="login-form">
	
    <form method="post" id="form1" >
	<a href="login.php?mode=light">
	<i class="fas fa-moon fa-2x icon1" id="two"></i></a>
	<a href="login.php?mode=dark">
  	<i class="fas fa-sun fa-2x icon1" id="one"></i></a>
	<img id="sm-logo" src="../image/login_logo.jpg" title="Encode" alt="Logo">
	<?php
		if(isset($_GET['error'])){
			echo "<p style='color:red'>".$_GET['error']."</p>";
		}
		if(isset($_GET['msg'])){
			echo "<p class='text-success mt-3'>".$_GET['msg']."</p>";
		}
	?>
        <h2 class="text-center">Login</h2>   
        <div class="form-group has-error">
        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Sign in</button>
        </div>
		<div class="form-group">
		<a href="registration.php" class="btn btn-primary btn-lg btn-block text-white"> Register</a>
        </div>
    </form>
</div>
</body>
</html>