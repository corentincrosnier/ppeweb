<?php ob_start(); ?>
<div id="cont" class="container-fluid">
	<h1>Mon super blog !</h1>
	<p>Derniers billets du blog :</p>

	<table id="table" width="100%" class="table table-striped table-bordered">
		<thead>
			<tr role="row">
				<th class="dhide">PRA_NUM_PRATICIEN</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th class="consult"></th>
			</tr>
		</thead>
	</table>
</div>
    <!--<div class="news">
        <h3>
            <?= htmlspecialchars($data['PRA_NOM_PRATICIEN']) ?>
            <em>le <?= $data['PRA_PRENOM_PRATICIEN'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['PRA_VILLE_PRATICIEN'])) ?>
            <br />
            <em><a href="post.php?id=<?= $data['PRA_NUM_PRATICIEN'] ?>">Commentaires</a></em>
        </p>
    </div>-->
	<script>
		$(document).ready(function(){
			var datatable = $('#table').DataTable({
				"paging": true,
				"autoWidth": true,
				"scrollCollapse": true,
				"language": {
					processing: "Traitement en cours...",
					search: "Rechercher&nbsp;:",
					lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
					info: "",
					infoEmpty: "Aucune données trouvées",
					infoFiltered: "",
					infoPostFix: "",
					loadingRecords: "Chargement en cours...",
					zeroRecords: "",
					emptyTable: "",
					paginate: {
						first: "Premier",
						previous: "Pr&eacute;c&eacute;dent",
						next: "Suivant",
						last: "Dernier"
					},
				},
				aria: {
					sortAscending: ": activer pour trier la colonne par ordre croissant",
					sortDescending: ": activer pour trier la colonne par ordre décroissant"
				},
				"scrollCollapse": true,
				"processing": false,
				"serverSide": false,
				/*"ajax": {
					url: 'datatable.php?id=%ID%',
					type: 'json'
				},*/
				data: JSON.parse('<?= $listPraticien ?>'),
				columns: [
					{data: "PRA_NUM_PRATICIEN"},
					{data: "PRA_NOM_PRATICIEN"},
					{data: "PRA_PRENOM_PRATICIEN"},
					{}
				],
				columnDefs: [
					{
						"targets": "dhide",
						"visible": false,
						"searchable": false
					},{
						"targets": "consult",
						"searchable": false,
						"width":"10%",
						"render": function(data, type, row) {
							return '<button class="btn-consult" onClick="location.href=\'index.php?action=consult&id='+row['PRA_NUM_PRATICIEN']+'\'">CONSULTER</button>';
							//return '<button>CONSULTER</button>';
						}
							//return '<a class="" target="_blank" s style="background:#fab62d;color:white;border:none;cursor:pointer;padding:13px 10px 5px;margin-right: 10px;" href="generator.php?facture=' + row['NUMERO_DEVIS'] + '&tf=' + 1 + '"><img src="icon/eye.png" style="width:20px;height:20px;"/></a>';
					}/*
						
						},{
						"targets": "supp",
						"searchable": false,
						"render": function (data, type, row) {
						  return '<button style="background:#F44336;;color:white;border:none;cursor:pointer;padding:5px 10px;" request="Suppdev" sup="' + row['ID_DEVIS'] + '"><img style="width:20px;height:20px;" src="icon/trash.png"/></button>';
						}
						},*/
					],
			});
		});
	</script>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>