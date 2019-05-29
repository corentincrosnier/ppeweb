<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GSB</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/datatables/datatables.min.js"></script>
        <link href="vendor/datatables/datatables.min.css" rel="stylesheet" />
        <link href="public/css/style.css" rel="stylesheet" />
    </head>
        
    <body>
		<form action="controller/process_form.php" method="POST">
			<input type="hidden" name="form" value="logout">
			<input type="submit" value="Déconnecter">
		<!--<button onClick="location.href='controller/logout.php';">Déconnecter</button>-->
		</form>
        <?= $content ?>
    </body>
</html>