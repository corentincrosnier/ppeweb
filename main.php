<?php
global 
	$db;

$db=new PDO('mysql:host=localhost;dbname=ppegsb', 'root', '');

function fetch($request){
	global $db;
	return $db->query($request)->fetch();
}

function fetchAll($request){
	global $db;
	return $db->query($request)->fetchAll();
}
?>