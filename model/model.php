<?php

function getPraticien($numPraticien){
	$db=connect();
	$request="SELECT p.*,tp.TYP_LIBELLE_TYPE_PRATICIEN FROM praticien p,type_praticien tp."
		."WHERE p.PRA_NUM_PRATICIEN=:numPraticien AND tp.TYP_CODE_TYPE_PRATICIEN=p.TYP_CODE_TYPE_PRATICIEN";
	$stmt=$db->prepare($request);
	$stmt->bindParam(":numPraticien",$numPraticien);
	$stmt->execute();
	return $stmt;
}

function getListPraticien(){
	$db=connect();
	$request="SELECT p.*,tp.TYP_LIBELLE_TYPE_PRATICIEN FROM praticien p,type_praticien tp "
		."WHERE tp.TYP_CODE_TYPE_PRATICIEN=p.TYP_CODE_TYPE_PRATICIEN ORDER BY p.PRA_NOM_PRATICIEN";
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