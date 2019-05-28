<?php

function getPraticien($numPraticien){
	$db=connect();
	$request="SELECT * FROM praticien WHERE PRA_NUM_PRATICIEN=:numPraticien";
	$stmt=$db->prepare($request);
	$stmt->bindParam(":numPraticien",$numPraticien);
	$stmt->execute();
	return $stmt;
}

function getListPraticien(){
	$db=connect();
	$request="SELECT * FROM praticien";
	$stmt=$db->prepare($request);
	$stmt->execute();
	$list=$stmt->fetchAll();
	return $list;
}

function isLogged($nom,$matricule){
}

function login($nom,$matricule){
	if($nom=='admin' && $matricule=='admin')
		return 'admin';
	$db=connect();
	$stmt=$db->prepare("SELECT * FROM visiteur WHERE VIS_NOM_VISITEUR=:nom AND VIS_MATRICULE_VISITEUR=:matricule");
	$stmt->bindParam(':nom',$nom);
	$stmt->bindParam(':matricule',$matricule);
	$stmt->execute();
	$res=$stmt->fetchAll();
	if(sizeof($res)==1){
		return $res;
	}
	else{
		return 'invalid information';
	}
	
}

function connect(){
	$db = new PDO('mysql:host=localhost;dbname=ppegsb;charset=utf8', 'root', '');
	return $db;
}

/*
function connect(){
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=ppegsb;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}*/
?>