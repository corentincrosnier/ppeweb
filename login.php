<?php
include "main.php";

if($_POST['name']=='admin' && $_POST['passwd']=='admin'){
	session_start();
	$_SESSION['user']=array('VIS_MATRICULE_VISITEUR'=>0,'VIS_NOM_VISITEUR'=>'admin');
	header('location: home.html');
}
$user=fetch("SELECT * FROM visiteur WHERE VIS_NOM_VISITEUR='".$_POST['name']."' AND VIS_MATRICULE_VISITEUR='".$_POST['passwd']."'");
if(sizeof($user)>0){
	session_start();
	$_SESSION['user']=$user;
	header('location: home.html');
}
?>