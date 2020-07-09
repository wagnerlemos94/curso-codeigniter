<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8" />
	<title><?php echo $titulo; ?></title>
	<link rel="stylesheet" href=<?php echo base_url('assets/css/normalize.css') ?>/>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href=<?php echo base_url('assets/css/estilo.css') ?> />
	<link rel="stylesheet" href=<?php echo base_url('assets/css/painel.css') ?> />
</head>
<body>
    <div class="linha">
        <div class="coluna col4">&nbsp;</div>
        <div class="coluna col4">
            <h2><?php echo $h2; ?></h2>
            <?php    
                if($msg = get_msg()):
                    echo '<div class="msg-box">'.$msg.'</div>';
                endif;
                echo form_open();
                echo form_label('Usuário', 'login');
                echo form_input('login', set_value('login'), array('autofocus' => 'autofocus'));
                echo form_label('Senha:', 'senha');
                echo form_password('senha');
                echo form_submit('enviar', 'Autenticar', array('class' => 'botao'));
                echo form_close();
            ?>
        </div>
        <div class="coluna col4">&nbsp;</div>
    </div>
</body>
</html>