<?php
	require '../Common/'.PDO;
	function addParticipant($name,$lastname,$pass,$email,$phone,$roll,$bh_id,$sem_id,$img){
		global $pdo;
		$type=2;
		$sql= "INSERT INTO user_master (roll,name,lname,user_password,email,phone,Branch_id,Sem_id,Type,Image) VALUES (:roll, :name, :lname, :upass, :email, :phone, :branch, :sem, :tp, :img)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(
			':roll' => $roll,
			':name' => ucfirst($name),
			':lname' => ucfirst($lastname),
			':upass' => $pass,
			':email' => $email,
			':phone' => $phone,
			':branch' => $bh_id,
			':sem' => $sem_id,
			':tp' => $type,
			':img' => $img
		));
		return $stmt;
	}
	function AddStatus($id,$action){
		global $pdo;
		if($action=='accept'){
			$type=1;
		}
		else{
			$type=3;
		}
		$sql = "UPDATE user_master SET Type='$type' WHERE user_id IN ($id)";
		$stmt = $pdo->query($sql);
		return $stmt;
	}
	function GetParticipantByCondition($where){
		global $pdo;
		$sql = "SELECT user_master.Type,user_master.user_id,user_master.name,user_master.roll,user_master.email,user_master.phone,branch.branch_name,semester.semester_name FROM user_master INNER JOIN semester JOIN branch ON user_master.Branch_id = branch.branch_id AND user_master.Sem_id = semester.semester_id WHERE ".$where;
		$stmt = $pdo->query($sql);
		return $stmt;
	}
?>