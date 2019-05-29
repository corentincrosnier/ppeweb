<?php
require('controller/controller.php');

session_start();

try{
	if(isset($_SESSION['isLogged']) && $_SESSION['isLogged']==true){
		if(isset($_GET['action'])){
			if($_GET['action']=='lp'){
				listPraticien();
			}
			elseif($_GET['action']=='edt' && $_SESSION['user']=='admin'){
				if(isset($_GET['id']) && $_GET['id']>0){
					editPraticien($_GET['id']);
				}
				else{
					throw new Exception('Aucun identifiant envoyé');
				}
			}
			elseif($_GET['action']=='dlt' && $_SESSION['user']=='admin'){
				if(isset($_GET['id']) && $_GET['id']>0){
					deletePraticien($_GET['id']);
				}
				else{
					throw new Exception('Aucun identifiant envoyé');
				}
			}
			elseif($_GET['action']=='post'){
				if(isset($_GET['id']) && $_GET['id']>0){
					post();
				}
				else{
					throw new Exception('Aucun identifiant de billet envoyé');
				}
			}
			elseif($_GET['action']=='info'){
				if(isset($_GET['id']) && $_GET['id']>0){
					infoPraticien($_GET['id']);
				}
				else{
					throw new Exception('Aucun identifiant envoyé');
				}
			}
		}
		else{
			listPraticien();
		}
	}
	else{
		loginForm();
	}
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
