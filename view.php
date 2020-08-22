<?php session_start();
require_once('pdo.php');
?>
<?php require 'header.php'?>
<body>
<?php require 'navbar.php' ?>

<?php if(isset($_SESSION['username'])){ ?>
<div class="col-md-9">
<span id="cls2"  class="text-primary" onclick="openNav()">&#9776; </span>
      <h1>Admin Portal</h1>
	  <hr>
	<h3>View Mode</h3>
<?php
	$sql = "SELECT user_master.name,user_master.roll,user_master.email,user_master.phone,user_master.Type,branch.branch_name,semester.semester_name FROM user_master INNER JOIN semester JOIN branch ON user_master.Branch_id = branch.branch_id AND user_master.Sem_id = semester.semester_id WHERE user_master.Type = '1' OR user_master.Type='2' OR user_master.Type='3'";
	$stmt = $pdo->query($sql);
	echo "<table class='table'>";
			echo "<tr class='bg-info '>";
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
			if($row['Type']==1){
				echo '<td class="text-success">Accepted</td>';
			}
			else if($row['Type']==2){
				echo '<td class="text-info">Pending</td>';
			}
			else{
				echo '<td class="text-danger">Rejected</td>';
			}
		echo "</tr>";
		
	}
	echo "</table>";
?>
</div>
</body>
</html>
<?php }
	else{
		header('Location: login.php?error=Access Frsobidden');
	}
?>