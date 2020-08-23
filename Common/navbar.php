<div class="container-fluid">
  <div class="row content">
    <div id="mySidenav" class="col-md-3 sidenav">
	 <a id="cls1" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <h4 >Admin Portal</h4>
	 <?php
		$home_class = $view_class = $add_class = $update_class ="";
		$basename = basename($_SERVER['SCRIPT_NAME']);
		if($basename == "index.php"){
			$home_class = 'class="active"';
			
		}else if($basename == "view.php"){
			$view_class = 'class="active"';
		}else if($basename == "accepted.php"){
			$add_class = 'class="active"';
		}else if($basename == "pending.php"){
			$update_class = 'class="active"';
		}
		if($basename == "index.php"){
			$href1 = 'index.php';
			$href2 = 'View/view.php';
			$href3 = 'View/accepted.php';
			$href4 = 'View/pending.php';
			$href5 = 'View/logout.php';
		}
		else{
			$href1 = '../index.php';
			$href2 = 'view.php';
			$href3 = 'accepted.php';
			$href4 = 'pending.php';
			$href5 = 'logout.php';
		}
		$sql9 = "SELECT * FROM user_master WHERE Type='2'";
		$stmt9 = $pdo->query($sql9);
		if($stmt9->rowCount()>0){
			$acc = "Pending<span  id='pop'>".$stmt9->rowCount()."<span>";
		}
		else{
			$acc ="Pending";
		}
	  ?>
      <ul id="nav" class="nav nav-pills nav-stacked nav">
        <li <?php echo $home_class ?>><a href="<?php echo $href1 ?>">Home</a></li>
        <li <?php echo $view_class ?>><a href="<?php echo $href2 ?>">View</a></li>
        <li <?php echo $add_class ?>><a href="<?php echo $href3 ?>">Accepted</a></li>
        <li <?php echo $update_class ?>><a href="<?php echo $href4 ?>"><?php echo $acc; ?></a></li>
		<li ><a href="<?php echo $href5 ?>">Logout</a></li>
      </ul><br>
    </div>
	
	