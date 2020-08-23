<?php session_start();
require('../Common/Const.php');
require_once('../Common/'.PDO);
require(P_MODEL);
?>
<?php if(!isset($_SESSION['username'])){ 
	header('Location: '.LOGIN.'?Access Forbidden');}
else{
 ?>
<?php require '../Common/'.HEAD?>
<body>
<?php require '../Common/'.NAVBAR?>

<div class="col-md-9">
<span id="cls2"  class="text-primary" onclick="openNav()">&#9776; </span>

      <h1>Admin Portal</h1>
	  <hr>
	<h3>Accepted Mode</h3>
<?php
	$where = "user_master.Type='1'";
	$stmt = GetParticipantByCondition($where);
	$totalStudent = $stmt->rowCount();
	if($stmt->rowCount()>0){
	echo "<table class='table table-hover'>";
		echo "<thead>";
			echo "<tr class='bg-info'>";
				echo "<th>Name</th>";
				echo "<th>Roll</th>";
				echo "<th class='hidden-xs'>email</th>";
				echo "<th class='hide1'>phone</th>";
				echo "<th>Branch</th>";
				echo "<th>Semester</th>";
				echo "<th>Action</th>";
			echo "</tr>";
		echo "</thead>";
		$k=0;
						$page = ceil($totalStudent/5);
						$p=5;
						$u=0;
						$prev=2;
						$nex =$page-1; 
						if($totalStudent > $p){
							
						}
						else{
							$p = $totalStudent;
						};
						if(isset($_GET['page'])){
							$u = 5*($_GET['page']-1);
							$p = $p*($_GET['page']);
							if($_GET['page']!=1){
								$prev=$_GET['page'];
							}
							if($_GET['page']!=$page){
								$nex = $_GET['page'];
							}
							if($totalStudent > $p){}
							else{$p = $totalStudent;}
						}
						else{
							if($page>1){
							$nex =1;
							}
							else{
								$nex=0;
							}
						}
						$row = $stmt->fetchALL();
					for($i=$u;$i<count($row);$i++){
						if($u==$p){ 
							break; 	
						}
						$u++;
		echo "<tr>";
			echo "<td>"."<span class='bold'>".++$k."</span>) ".$row[$i]['name']."</td>";
			echo "<td>".$row[$i]['roll']."</td>";
			echo "<td class='hidden-xs'>".$row[$i]['email']."</td>";
			echo "<td class='hide1'>".$row[$i]['phone']."</td>";
			echo "<td>".$row[$i]['branch_name']."</td>";
			echo "<td class='text-center'>".$row[$i]['semester_name']."</td>";
			echo '<td class="text-success">Accepted</td>';
		echo "</tr>";
		
	}
	echo "</table>";
		echo '<nav aria-label="...">
					  <ul id="pagin" class="pagination justify-content-center">
						<li class="page-item ">
						  <a class="page-link" href="accepted.php?page='.($prev-1).'" tabindex="-1">Previous</a>
						</li>';
						$class="";
						for($i=0;$i<$page;$i++){
							if(isset($_GET['page'])){
								if($_GET['page'] == $i+1){
									$class="active";
								}	
							}
							else{
								if($i==0)
								$class="active";
							}
							echo '<li class="page-item '.$class.'"><a class="page-link" href="accepted.php?page='.($i+1).'">'.($i+1).'</a></li>';
							$class="";
						}
						echo '<li class="page-item">
						  <a class="page-link" href="accepted.php?page='.($nex+1).'">Next</a>
						</li>
					  </ul>
					</nav>';
	}
	else{
		echo "<p class='text-primary lead'>Not Accepted Any Requestes</p>";
	}
?>
</div>
</body>
</html>
<?php }
?>