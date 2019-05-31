<?php
require("model/model.php");

function deletePraticien($id){

}

function loginForm(){
	require('view/login.php');
}

function listPraticien(){
	$listPraticien=json_encode(getListPraticien());
	require('view/home.php');
}

function infoPraticien($numPraticien){
	$praticien=getPraticien($numPraticien);
	require('view/home.php');
}
?>