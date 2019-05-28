<?php
include "main.php";

switch($_GET['data']){
	case 'med':
		echo json_encode(fetchAll("SELECT * FROM medicament;"));
		break;
}
?>