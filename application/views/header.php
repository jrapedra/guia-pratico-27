<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>welcome/">Rent-a-Car</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li <?php echo setMenuActiveItem($active_menu=='home') ?>>
                    <a href="<?php echo base_url(); ?>welcome/">Home</a>
                </li>
                <li <?php echo setMenuActiveItem($active_menu=='about') ?>>
                    <a href="<?php echo base_url(); ?>welcome/about/">Sobre</a>
                </li>
                <li <?php echo setMenuActiveItem($active_menu=='frota') ?>>
                    <a href="<?php echo base_url(); ?>frota/">Frota Automóvel</a>
                </li>
                <li <?php echo setMenuActiveItem($active_menu=='contact') ?>>
                    <a href="<?php echo base_url(); ?>welcome/contact/">Contacto</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>