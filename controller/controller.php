<?php
require("model/model.php");

function deletePraticien($id){
	deletePraticienDb($id);
	header('location: index.php');
}

function editPraticien($id){
	$types=getTypes();
	$praticien=getPraticien($id)->fetch();
	require('view/edit.php');
}

function loginForm(){
	require('view/login.php');
}

function listPraticien(){
	$listPraticien=json_encode(getListPraticien());
	require('view/home.php');
}

function infoPraticien($numPraticien){
	$praticien=getPraticien($numPraticien)->fetch();
	require('view/consult.php');
}
?>