<?php
//TABLE CONSTANT
	if (!defined('PARTICIPANT1')) define('PARTICIPANT1', 'user_master');
	if (!defined('BRANCH')) define('BRANCH', 'branch_name');
	if (!defined('SEMESTER')) define('SEMESTER', 'semester_name');
//FILE CONSTANT
	if (!defined('HEAD')) define('HEAD', 'header.php');
	if (!defined('NAVBAR')) define('NAVBAR', 'navbar.php');
	if (!defined('PDO')) define('PDO', 'pdo.php');
	if (!defined('P_NAVBAR')) define('P_NAVBAR', 'participant_navbar.php');
	if (!defined('P_MODEL')) define('P_MODEL', '../Model/participant_Model.php');
	if (!defined('P_CONTROLLER')) define('P_CONTROLLER', '../Controller/participant_controller.php');
	if (!defined('CONTROLLER')) define('CONTROLLER', '../Controller/Controller.php');
	if (!defined('REGISTRATION')) define('REGISTRATION', '../View/registration.php');
	if (!defined('LOGIN')) define('LOGIN', '../View/login.php');
	if (!defined('PARTICIPANT')) define('PARTICIPANT', '../View/participant.php');
	if (!defined('PENDING')) define('PENDING', '../View/pending.php');
	if (!defined('ACCEPTED')) define('ACCEPTED', '../View/accepted.php');
	if (!defined('LOGOUT')) define('LOGOUT', '../View/logout.php');
	if (!defined('VIEW')) define('VIEW', '../View/view.php');
?>