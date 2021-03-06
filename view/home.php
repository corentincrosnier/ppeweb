<?php ob_start(); ?>
<div id="cont" class="container-fluid">
	<h1>GSB</h1>
	<!--<button id="dlt-button">Supprimer</button>-->
	<table id="table" width="100%" class="table table-striped table-bordered">
		<thead>
			<tr role="row">
				<th class="dhide">PRA_NUM_PRATICIEN</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>CP</th>
				<th>Ville</th>
				<th>Coefficient notoriété</th>
				<th>Domaine</th>
				<?php if($_SESSION['user']=='admin'): ?>
					<th class="edit"></th>
					<th class="delete"></th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
	<script>
		$.extend($.fn.dataTable.defaults,{
			responsive:true
		});
		$(document).ready(function(){
			var datatable=$('#table').DataTable({
				"paging": true,
				//"autoWidth": true,
				"width": "70%",
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
					{data: "PRA_CP_PRATICIEN"},
					{data: "PRA_VILLE_PRATICIEN"},
					{data: "PRA_COEFNOTORIETE_PRATICIEN"},
					{data: "TYP_LIBELLE_TYPE_PRATICIEN"},
					<?php echo ($_SESSION['user']=='admin')?"{},{}":"";?>
				],
				columnDefs: [
					{
						"targets": "dhide",
						"visible": false,
						"searchable": false
					},{
						"targets": "edit",
						"searchable": false,
						"width":"10%",
						"render": function(data, type, row) {
							return '<button type="button" class="btn btn-info" onClick="location.href=\'index.php?action=edt&id='+row['PRA_NUM_PRATICIEN']+'\'">Modifier</button>';
							//return '<button>CONSULTER</button>';
						}
							//return '<a class="" target="_blank" s style="background:#fab62d;color:white;border:none;cursor:pointer;padding:13px 10px 5px;margin-right: 10px;" href="generator.php?facture=' + row['NUMERO_DEVIS'] + '&tf=' + 1 + '"><img src="icon/eye.png" style="width:20px;height:20px;"/></a>';
					},{
						"targets": "delete",
						"searchable": false,
						"width":"10%",
						"render": function(data, type, row) {
							return '<button type="button" class="btn btn-danger"  onClick="location.href=\'index.php?action=dlt&id='+row['PRA_NUM_PRATICIEN']+'\'">Supprimer</button>';
						}
					}
				],
			});
			$('#table tbody').on( 'click', 'tr', function () {
				if($(this).hasClass('selected')){
					$(this).removeClass('selected');
				}
				else{
					datatable.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			/*$('#dlt-button').click(function(){
				datatable.row('.selected').remove({
					buttons:[
						{label: 'Cancel',fn:function(){this.close();}},
						'Delete'
					]
				}).draw(false);
			});*/
			/*$('#table').on('click','tbody tr',function(){
				datatable.row(this).delete({
					buttons:[
						{label: 'Cancel',fn:function(){this.close();}},
						'Delete'
					]
				});
			});*/
		});
	</script>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>