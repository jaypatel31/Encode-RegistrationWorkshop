<?php session_start();
require('../Common/Const.php');
require_once('../Common/'.PDO);
require(P_MODEL);
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
<?php if(!isset($_SESSION['username'])){ 
	header('Location: '.LOGIN.'?Access Forbidden');
}
else{
 ?>
<?php require '../Common/'.HEAD?>
 
<body>
<?php require '../Common/'.NAVBAR?>


<div class="col-md-9">
<span id="cls2"  class="text-primary" onclick="openNav()">&#9776; </span>
      <h1>Admin Portal</h1>
	  <hr>
	<h3>Pending Mode</h3>
	<div class="mb-5">
		<div id="msg" style="display:none;">
			<div class='alert alert-success alert-dismissible'>Succesfully Updated Status
			<button type="button" class="close" data-dismiss="alert">&times;</button></div>	
		</div>
		<button type="button" class="btn btn-primary" onclick="AcceptAll('accept')">Accept All</button>
		<button type="button" class="btn btn-primary" onclick="AcceptAll('reject')">Reject All</button>
		<input  style="font-family: FontAwesome;border:1px solid black;background-color:#f1f1f1;color:black;" type="text" placeholder='&#xf002; Search...' id="se" onkeyup="fd()">
	</div>
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
		if($_SESSION['error']!=""){
			echo "<div class='alert alert-danger alert-dismissible'>".$_SESSION['error'];
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
		}
	}
	$where = "user_master.Type='2'";
	$stmt = GetParticipantByCondition($where);
	$totalStudent = $stmt->rowCount();
	if($stmt->rowCount()>0){
	echo "<table class='table table-hover'>";
		echo "<thead>";
			echo "<tr class='bg-info'>";
				echo '<th><input id="checkAll" class="form-check-input" type="checkbox" name="check">&nbsp;&nbsp;Check</th>';
				echo "<th class='hide1'>Name</th>";
				echo "<th>Roll</th>";
				echo "<th class='hidden-xs'>email</th>";
				echo "<th class='hide1'>phone</th>";
				echo "<th>More Details</th>";
				//echo "<th>Branch</th>";
				//echo "<th class='hide1'>Semester</th>";
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
		echo "<tr id='table_".$row[$i]['user_id']."'>";
			echo '<td><input class="check" type="checkbox" id="inlineCheckbox1" name="num[]" value="'.$row[$i]['user_id'].'"></td>';
			echo "<td class='hide1'>"."<span class='bold'>".++$k."</span>) ".$row[$i]['name']."</td>";
			echo "<td class='search'>".$row[$i]['roll']."</td>";
			echo "<td class='hidden-xs'>".$row[$i]['email']."</td>";
			echo "<td class='hide1'>".$row[$i]['phone']."</td>";
			echo "<td onclick='getDetails(\"".$row[$i]['name'].",".$row[$i]['lname'].",".$row[$i]['email'].",".$row[$i]['phone'].",".$row[$i]['branch_name'].",".$row[$i]['semester_name'].",".$row[$i]['Image']."\")'>
						<button type='button' class='btn btn-info' data-toggle='modal' data-target='#exampleModal".$row[$i]['user_id']."'>
							View More
						</button>
					</td>";
			//MODEL--START
			echo '<div class="modal fade" id="exampleModal'.$row[$i]['user_id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">'.$row[$i]['name']." ".$row[$i]['lname'].'</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<div style="display:inline-block;width:45%">
						<a href="'.$row[$i]['Image'].'" target="_blank">
							<img class="wr" src='.$row[$i]['Image'].'>
						</a>
					</div>
					<div style="display:inline-block;width:50%;vertical-align:top;">
						<div class="v-top">Roll Number : '.$row[$i]['roll'].'</div>
						<div class="v-top">Branch : '.$row[$i]['branch_name'].'</div>
						<div class="v-top">Semester : '.$row[$i]['semester_name'].'</div>
						<div class="v-top">Email : '.$row[$i]['email'].'</div>
						<div class="v-top">Phone : '.$row[$i]['phone'].'</div>
					</div>
				  </div>
				  <div style="clear:both" class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					
				  </div>
				</div>
			  </div>
			</div>';
			//MODAL--END
			//echo "<td >".$row[$i]['branch_name']."</td>";
			//echo "<td class='hide1' class='text-center'>".$row[$i]['semester_name']."</td>";
			echo '<td>
				<form method="get">
					<input type="text" hidden value="'.$row[$i]['user_id'].'" name="id">
					<button class="btn btn-success" type="submit" name="status" value="accept"><i class="fas fa-check"></i></button>  
					<button class="btn btn-danger" type="submit" name="status" value="reject"><i class="fas fa-times"></i></button>
				</form>
				</td>';
		echo "</tr>";
		
	}
	echo "</table>";
		echo '<nav aria-label="...">
					  <ul id="pagin" class="pagination justify-content-center">
						<li class="page-item ">
						  <a class="page-link" href="pending.php?page='.($prev-1).'" tabindex="-1">Previous</a>
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
							echo '<li class="page-item '.$class.'"><a class="page-link" href="pending.php?page='.($i+1).'">'.($i+1).'</a></li>';
							$class="";
						}
						echo '<li class="page-item">
						  <a class="page-link" href="pending.php?page='.($nex+1).'">Next</a>
						</li>
					  </ul>
					</nav>';
	}
	else{
		echo "<p class='text-primary lead'>No Pending Requestes</p>";
	}
?>
</div>
</body>
<script src="../participant.js"></script>
<script src="../js/admin.js"></script>
</html>
<?php }
?>