<div class="container">
    <!-- Marketing Icons Section -->
    <div class="row">
        <?php
        foreach ($myWidgets as $item) {
        ?>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-check"></i> <?= $item['titulo'] ?></h4>
                </div>
                <div class="panel-body">
                    <p><?=$item['descricao']?></p>
                    <a href="<?=$item['id']?>" class="btn btn-default">Saber mais</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <!-- /.row -->
</div>