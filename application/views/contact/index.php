<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br />
<div class="container">
    <?php echo form_open(base_url( 'welcome/contact' ), array( 'id' => 'form-contact', 'class' => 'form-horizontal' ));?>
    <!--<form id="form-contact" class="form-horizontal" role="form" action="<?php base_url() ?>contact" method="POST">-->
        <div class="row">
            <div class="col-md-6 col-md-offset-3 well">
                <fieldset>
                <legend>Formulário de contacto</legend>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name" class="control-label">Nome</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="name" placeholder="O seu nome completo" type="text" value="<?php echo set_value('name'); ?>" />
                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="email" class="control-label">Email</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="email" placeholder="O seu endereço de e-mail" type="text" value="<?php echo set_value('email'); ?>" />
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="subject" class="control-label">Assunto</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="subject" placeholder="O seu assunto" type="text" value="<?php echo set_value('subject'); ?>" />
                        <span class="text-danger"><?php echo form_error('subject'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="message" class="control-label">Mensagem</label>
                    </div>
                    <div class="col-md-12">
                        <textarea class="form-control" name="message" rows="4" placeholder="A sua mensagem"><?php echo set_value('message'); ?></textarea>
                        <span class="text-danger"><?php echo form_error('message'); ?></span>
                    </div>
                </div>
                <div class="g-recaptcha" data-sitekey="6LdvCSMUAAAAAAuCam65RX3YBsSMXLUwkSMILZw0"></div>
                <span class="text-danger"><?php echo form_error('g-recaptcha-response'); ?></span>
                <!--
                <script type="text/javascript">
                    var onSubmit = function(token) {
                      console.log('success!');
                    };
                    var onloadCallback = function() {
                      grecaptcha.render('submit', {
                        'sitekey' : '6LdvCSMUAAAAAAuCam65RX3YBsSMXLUwkSMILZw0',
                        'callback' : onSubmit
                      });
                    };
                </script>
                -->
                <div class="form-group">
                    <div class="col-md-12">
                        <input name="submit" type="submit" class="btn btn-primary" value="Enviar" />
                        <!--
                        <button class="g-recaptcha btn btn-primary" data-sitekey="6LfTSCMUAAAAACQwoOR1r3PWiMULmq2r_LoKRCa2" data-callback="onloadCallback">
                            Enviar
                        </button>
                        -->
                    </div>
                </div>
                </fieldset>
            </div>
        </div>
    </form>
</div>