<?php
session_start();
require('../Common/Const.php');
require(P_MODEL);
if(isset($_GET)){
	if($_GET['action']=='accept' || $_GET['action']=="reject"){
		$action = $_GET['action'];
		$id = $_GET['id'];
		$result = AddStatus($id,$action);
	}
}
?>