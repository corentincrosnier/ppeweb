<?php
require('controller/controller.php');

session_start();

try{
	if(isset($_SESSION['isLogged']) && $_SESSION['isLogged']==true){
		if(isset($_GET['action'])){
			if($_GET['action']=='lp'){
				listPraticien();
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
					/*if(!empty($_POST['author']) && !empty($_POST['comment'])){
						addComment($_GET['id'],$_POST['author'],$_POST['comment']);
					}
					else{
						// Autre exception
						throw new Exception('Tous les champs ne sont pas remplis !');
					}*/
					infoPraticien($_GET['id']);
				}
				else{
					// Autre exception
					throw new Exception('Aucun identifiant de praticien envoyé');
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
