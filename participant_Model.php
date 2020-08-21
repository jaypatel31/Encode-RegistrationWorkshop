<?php
	require 'pdo.php';
	function addParticipant($name,$lastname,$pass,$email,$phone,$roll,$bh_id,$sem_id,$img){
		global $pdo;
		$type=2;
		$sql= "INSERT INTO user_master (roll,name,user_password,email,phone,Branch_id,Sem_id,Type,Image) VALUES (:roll, :name, :upass, :email, :phone, :branch, :sem, :tp, :img)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(
			':roll' => $roll,
			':name' => $name,
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
?>