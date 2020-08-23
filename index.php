<?php
session_start();
require('Common/Const.php');
require 'Common/'.PDO;
if(empty($_SESSION['username'])){
	header('Location: View/'.LOGIN);
}
else{
	$sql = "SELECT * From user_master WHERE Type='1'";
	$stmt= $pdo->query($sql);
	$rows = $stmt->fetch(PDO::FETCH_ASSOC);
	$accepted = $stmt->rowCount();
	
	$sql2 = "SELECT * From user_master WHERE Type='2'";
	$stmt2= $pdo->query($sql2);
	$rows2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$pending = $stmt2->rowCount();
?>
<html>
<?php require('Common/'.HEAD)?>
<body>

<?php require('Common/'.NAVBAR)?>

    <div class="col-sm-9">
	<span id="cls2"  class="text-primary" onclick="openNav()">&#9776; </span>
      <h1>Admin Portal</h1>
	  <hr>
		<p>Welcome to the admin portal</p>
		<p class='text-primary'>Number of Accepted Participant in this system : <?php echo $accepted?></p>
		<p class='text-danger'>Number of Pending Participant in this system : <?php echo $pending?></p>
		<p>Click On the Navigation bar to do Tasks.</p>
    </div>
  </div>
</div>

</body>
</html>
<?php }
?>