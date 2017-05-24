<br>
<br>
<br>
<br>
<div class="container">
    <form id="form-car" class="form-horizontal" role="form" action="<?php base_url() ?>frota/save/<?=$carInfo->id?>" method="POST">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 well">
                <fieldset>
                <legend><?=$form_title?></legend>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="fabricante" class="control-label">Fabricante</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-control" id="fabricante" name="fabricante">
                        <?php
                        foreach($fabricantes as $fabricante){?>
                            <option <?=set_select('fabricante',$fabricante->id)?> value="<?=$fabricante->id?>"><?=$fabricante->nome?></option>
                        <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="modelo" class="control-label">Modelo</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-control" id="modelo" name="modelo">
                        <?php foreach($modelos as $modelo){?>
                            <option <?=set_select('modelo',$modelo->id)?> data-parent="<?=$modelo->fabricante_id?>" value="<?=$modelo->id?>"><?=$modelo->nome?></option>
                        <?php }?>
                        </select>
                        <span class="text-danger"><?php echo form_error('modelo'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="modelo" class="control-label">Cor</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-control" id="cor" name="cor">
                        <?php foreach($cores as $cor){?>
                            <option <?=set_select('cor',$cor->id)?> value="<?=$cor->id?>"><?=$cor->nome?></option>
                        <?php }?>
                        </select>
                        <span class="text-danger"><?php echo form_error('cor'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="matricula" class="control-label">Matrícula</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="matricula" id="matricula" pattern="[0-9][A-Z]{2}-[0-9][A-Z]{2}-[0-9][A-Z]{2}" placeholder="XX-XX-XX" type="text" value="<?=$carInfo->matricula ?>" />
                        <span class="text-danger"><?php echo form_error('matricula'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="disponibilidade" class="control-label">Disponibilidade</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-control" id="disponibilidade" name="disponibilidade">
                            <option value="1" <?=$carInfo->disponibilidade == 1 ? 'selected="selected"' : '' ?>>Disponível</option>
                            <option value="0" <?=$carInfo->disponibilidade == 0 ? 'selected="selected"' : '' ?>>Indisponível</option>
                        </select>
                        <span class="text-danger"><?php echo form_error('disponibilidade'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input name="submit" type="submit" class="btn btn-primary" value="Enviar" />
                    </div>
                </div>
                </fieldset>
            </div>
        </div>
    </form>
</div>