<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<br>
<br>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Fabricante</th>
					<th>Modelo</th>
					<th>Cor</th>
					<th>Matricula</th>
					<th>Disponíbilidade</th>
					<th>Acções</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($cars as $car){?>
				<tr class="<?= $car->disponibilidade == 0 ? 'warning' : ''; ?>" >
					<td><?=$car->id ?></td>
					<td><?=$car->marca ?></td>
					<td><?=$car->modelo ?></td>
					<td><?=$car->cor ?></td>
					<td><?=$car->matricula ?></td>
					<td><?=$car->disponibilidade ?></td>
					<td>
						<a class="js-delete" data-item="<?=$car->marca.','.$car->matricula ?>" data-url="<?=base_url()?>frota/delete/<?=$car->id?>">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a>
						<a href="<?=base_url()?>frota/delete/<?=$car->id?>">
							<i class="fa fa-trash" aria-hidden="true"></i>
						</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?=$pagination ?>
	</div>
</div>

<!-- Modal para remover-->
<div id="modal-delete" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Pretende remover</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" id="delete">Apagar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->