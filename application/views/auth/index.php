<br />
<!-- Top content -->
<div class="top-content">
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
                        <?php echo form_open(base_url( 'auth/login' ), array( 'name' => 'form-login', 'class' => 'login-form' ));?>
                        <!--<form name="namerole="form-login="<?php echo base_url(); ?>auth/login" method="post" class="login-form">-->
                            <div class="form-group">
                                <label class="sr-only" for="form-login-username">Nome de utilizador</label>
                                <input type="text" name="form-login-username" placeholder="Nome de utilizador..." class="for-username form-control" id="form-login-username">
                                <span class="text-danger"><?php echo form_error('form-login-username'); ?></span>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-login-password">Password</label>
                                <input type="password" name="form-login-password" placeholder="Password..." class="form-password form-control" id="form-login-password">
                                <span class="text-danger"><?php echo form_error('form-login-password'); ?></span>
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
                        <?php echo form_open(base_url( 'auth/register' ), array( 'name' => 'form-register', 'class' => 'registration-form' ));?>
                        <!--<form name="form-register" role="form" action="<?php echo base_url(); ?>auth/register" method="post" class="registration-form">-->
                            <div class="form-group">
                                <label class="sr-only" for="form-register-firstname">Primeiro nome</label>
                                <input type="text" name="form-register-firstname" placeholder="Primeiro nome..." class="form-username form-control" id="form-register-firstname" value="<?php echo set_value('form-register-firstname'); ?>">
                                <span class="text-danger"><?php echo form_error('form-register-firstname'); ?></span>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-register-lastname">Último nome</label>
                                <input type="text" name="form-register-lastname" placeholder="Último nome..." class="form-username form-control" id="form-register-lastname" value="<?php echo set_value('form-register-lastname'); ?>">
                                <span class="text-danger"><?php echo form_error('form-register-lastname'); ?></span>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-register-username">Nome de utilizador</label>
                                <input type="text" name="form-register-username" placeholder="Nome de utilizador..." class="form-username form-control" id="form-register-username" value="<?php echo set_value('form-register-username'); ?>">
                                <span class="text-danger"><?php echo form_error('form-register-username'); ?></span>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-register-email">E-mail</label>
                                <input type="text" name="form-register-email" placeholder="E-mail..." class="form-email form-control" id="form-register-email" value="<?php echo set_value('form-register-email'); ?>">
                                <span class="text-danger"><?php echo form_error('form-register-email'); ?></span>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-register-password">Password</label>
                                <input type="password" name="form-register-password" placeholder="Password..." class="form-password form-control" id="form-register-password" value="<?php echo set_value('form-register-password'); ?>">
                                <span class="text-danger"><?php echo form_error('form-register-password'); ?></span>
                            </div>
                            <button name="btn_register" type="submit" class="btn">Registar-se!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>