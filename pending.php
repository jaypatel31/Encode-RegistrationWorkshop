<?php session_start();
require_once('pdo.php');
if(isset($_GET['status'])){
	if($_GET['status']=="accept"){
		$type='1';
		$id = $_GET['id'];
		$sql = "UPDATE `user_master` SET `Type` = '$type' WHERE `user_id` = $id";
		$stmt= $pdo->query($sql);
		$_SESSION['msg55']= "Succesfully Accepted Requests";
	}
	else if($_GET['status']=='reject'){
		$type='3';
		$id = $_GET['id'];
		$sql = "UPDATE `user_master` SET `Type` = '$type' WHERE `user_master`.`user_id` = $id";
		$stmt= $pdo->query($sql);
		$_SESSION['msg55']= "Succesfully Rejected Requests";
	}
	else{
		$_SESSION['error'] = "Something Gets Wrong";
	}
	header('Location: pending.php');
	return;
}
?>
<?php require 'header.php'?>
<body>
<?php require 'navbar.php' ?>

<?php if(isset($_SESSION['username'])){ 

 ?>
<div class="col-md-9">
<span id="cls2"  class="text-primary" onclick="openNav()">&#9776; </span>
      <h1>Admin Portal</h1>
	  <hr>
	<h3>Pending Mode</h3>
<?php
	if(isset($_SESSION['msg55'])){
		//echo $_SESSION['msg55'];
		if($_SESSION['msg55']!=""){
			echo "<div class='alert alert-success alert-dismissible'>".$_SESSION['msg55'];
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button></div>';	
			$_SESSION['msg55']= "";
		}
	}
	if(isset($_SESSION['error'])){
		echo "<div class='alert alert-danger alert-dismissible'>".$_SESSION['error'];
		echo '<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
		
	}
	$sql = "SELECT user_master.user_id,user_master.name,user_master.roll,user_master.email,user_master.phone,branch.branch_name,semester.semester_name FROM user_master INNER JOIN semester JOIN branch ON user_master.Branch_id = branch.branch_id AND user_master.Sem_id = semester.semester_id WHERE user_master.Type='2'";
	$stmt = $pdo->query($sql);
	if($stmt->rowCount()>0){
	echo "<table class='table'>";
			echo "<tr class='bg-info'>";
				echo "<th>Name</th>";
				echo "<th>Roll</th>";
				echo "<th class='hidden-xs'>email</th>";
				echo "<th class='hide1'>phone</th>";
				echo "<th>Branch</th>";
				echo "<th>Semester</th>";
				echo "<th>Action</th>";
			echo "</tr>";
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['roll']."</td>";
			echo "<td class='hidden-xs'>".$row['email']."</td>";
			echo "<td class='hide1'>".$row['phone']."</td>";
			echo "<td>".$row['branch_name']."</td>";
			echo "<td>".$row['semester_name']."</td>";
			echo '<td>
				<form method="get">
					<input type="text" hidden value="'.$row['user_id'].'" name="id">
					<button class="btn btn-success" type="submit" name="status" value="accept"><i class="fas fa-check"></i></button>  
					<button class="btn btn-danger" type="submit" name="status" value="reject"><i class="fas fa-times"></i></button>
				</form>
				</td>';
		echo "</tr>";
		
	}
	echo "</table>";
	}
	else{
		echo "<p class='text-primary lead'>No Pending Requestes</p>";
	}
?>
</div>
</body>
</html>
<?php }
	else{
		header('Location: login.php?error=Access Frsobidden');
	}
?>