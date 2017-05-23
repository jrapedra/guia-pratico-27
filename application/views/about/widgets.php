<br />
<div class="container">
    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-check"></i> <?= $myMission['titulo'] ?></h4>
                </div>
                <div class="panel-body">
                    <p><?=$myMission['descricao']?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-check"></i> <?= $myObjectives['titulo'] ?></h4>
                </div>
                <div class="panel-body">
                    <p><?=$myObjectives['descricao']?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-check"></i> <?= $myDates['titulo'] ?></h4>
                </div>
                <div class="panel-body">
                    <p><?=$myDates['descricao']?></p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-check"></i> <?= $myHistory['titulo'] ?></h4>
                </div>
                <div class="panel-body">
                    <p><?=$myHistory['descricao']?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>