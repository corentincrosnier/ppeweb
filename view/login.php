<?php ob_start(); ?>

<div class="container">
	<!--<h1>GSB</h1>-->
	<div class="row col-center">
		<div class="col-sm-2"></div>
		<div class="col-sm-4">
			<img src="public/img/gsb_logo.png"></img>
		</div>
		<div class="col-sm-4">
			<form action="controller/process_form.php" method="POST">
				<input type="hidden" name="form" value="login">
				<div class="form_element">
					<label>Nom :</label><br>
					<input type="text" name="nom" required placeholder="Nom">
				</div>
				<div class="form_element">
					<label>Mot de passe (matricule):</label><br>
					<input type="password" name="matricule" required>
				</div>
				<input id="conn" type="submit" value="connexion">
			</form>
		</div>
		<div class="col-sm-2"></div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>