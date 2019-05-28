<?php
require('../model/model.php');

if(isset($_POST['form']) && $_POST['form']=='login'){
	if(isset($_POST['nom']) && isset($_POST['matricule'])){
		$logState=login($_POST['nom'],$_POST['matricule']);
		if($logState=='admin'){
			session_start();
			$_SESSION['user']='admin';
			$_SESSION['isLogged']=true;
		}
		elseif(is_array($logState)){
			session_start();
			$_SESSION['user']=$logState;
			$_SESSION['isLogged']=true;
		}
		header('location: ../index.php');
	}
}

if(isset($_POST['form']) && $_POST['form']=='logout'){
	session_start();
	session_destroy();
	header('location: ../index.php');
}
?>