<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<br>
<br>
<div class="container-fluid">
	<form action="<?=base_url()?>frota" class="form-inline" method="get">
		<div class="form-group">
			<select id="search_field" name="search_field" class="form-control">
				<option value="modelo" <?=set_select('search_field','modelo'); ?> >Modelo</option>
				<option value="matricula" <?=set_select('search_field','matricula'); ?> >Matricula</option>
				<option value="fabricante" <?=set_select('search_field','fabricante'); ?> >Fabricante</option>
			</select>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="search_value" name="search_value" value="<?=$search_value?>" placeholder="Pesquisa">
		</div>
		<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
		<a href="<?=base_url()?>frota/edit"><i class="fa fa-plus"></i></a>
	</form>
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
					<?php if($loginuser){?>
						<th>Acções</th>
					<?php }?>
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
					<td><?=$car->disponibilidade == 0 ? 'Indisponível' : 'Disponível'; ?></td>
					<?php if($loginuser){?>
						<td>
							<a href="<?=base_url()?>frota/edit/<?=$car->id?>">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</a>
							&nbsp;&nbsp;&nbsp;
							<a class="js-delete-car" data-item="<?=$car->marca.','.$car->matricula ?>" data-url="<?=base_url()?>frota/delete/<?=$car->id?>">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</a>
						</td>
					<?php }?>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?=$pagination ?>
	</div>
</div>

<!-- Modal para remover-->
<div id="modal" class="modal fade" tabindex="-1" role="dialog">
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