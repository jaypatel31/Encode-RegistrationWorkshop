<?php session_start();
require_once('pdo.php');
?>
<?php require 'header.php'?>
<body>
<?php require 'navbar.php' ?>

<?php if(isset($_SESSION['username'])){ ?>
<div class="col-sm-9">
      <h1>Admin Portal</h1>
	  <hr>
	<h3>Accepted Mode</h3>
<?php
	$sql = "SELECT user_master.name,user_master.roll,user_master.email,user_master.phone,branch.branch_name,semester.semester_name FROM user_master INNER JOIN semester JOIN branch ON user_master.Branch_id = branch.branch_id AND user_master.Sem_id = semester.semester_id WHERE user_master.Type='1'";
	$stmt = $pdo->query($sql);
	if($stmt->rowCount()>0){
	echo "<table class='table table-responsive'>";
			echo "<tr class='bg-info'>";
				echo "<th>Name</th>";
				echo "<th>Roll</th>";
				echo "<th>email</th>";
				echo "<th>phone</th>";
				echo "<th>Branch</th>";
				echo "<th>Semester</th>";
				echo "<th>Action</th>";
			echo "</tr>";
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['roll']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['phone']."</td>";
			echo "<td>".$row['branch_name']."</td>";
			echo "<td>".$row['semester_name']."</td>";
			echo '<td class="text-success">Accepted</td>';
		echo "</tr>";
		
	}
	echo "</table>";
	}
	else{
		echo "<p class='text-primary lead'>Not Accepted Any Requestes</p>";
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