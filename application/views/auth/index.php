<br />
<!-- Top content -->
<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1>Formulários de Login &amp; Registo</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Acesso ao sistema</h3>
                                <p>Digite o nome de utilizador e password:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="<?php echo base_url(); ?>auth/login" method="post" class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Nome de utilizador</label>
                                    <input type="text" name="form-username" placeholder="Nome de utilizador..." class="form-username form-control" id="form-username">
                                    <span class="text-danger"><?php echo form_error('form-username'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
                                    <span class="text-danger"><?php echo form_error('form-password'); ?></span>
                                </div>
                                <button name="btn_login" type="submit" class="btn">Aceder!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1 middle-border"></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Registe-se agora</h3>
                                <p>Obtenha acesso imediato:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-pencil"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="<?php echo base_url(); ?>auth/register" method="post" class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">Primeiro nome</label>
                                    <input type="text" name="form-first-name" placeholder="Primeiro nome..." class="form-first-name form-control" id="form-first-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-last-name">Último nome</label>
                                    <input type="text" name="form-last-name" placeholder="Último nome..." class="form-last-name form-control" id="form-last-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">E-mail</label>
                                    <input type="text" name="form-email" placeholder="E-mail..." class="form-email form-control" id="form-email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-about-yourself">Sobre si</label>
                                    <textarea name="form-about-yourself" placeholder="Sobre si..."
                                                class="form-about-yourself form-control" id="form-about-yourself"></textarea>
                                </div>
                                <button name="btn_register" type="submit" class="btn">Registar-se!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>