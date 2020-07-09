<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8" />
	<title><?php echo $titulo; ?></title>
	<link rel="stylesheet" href=<?php echo base_url('assets/css/normalize.css') ?>/>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href=<?php echo base_url('assets/css/estilo.css') ?> />
</head>
<body>
	<div class="header">
		<div class="linha">
			<header>
				<div class="coluna col4">
					<h1 class="logo">RBernardi</h1>
				</div>
				<div class="coluna col8">
					<nav>
						<ul class="menu inline sem-marcador">
							<li><a href=<?php echo base_url() ?>>home</a></li>
							<li><a href=<?php echo base_url('clientes') ?>>clientes</a></li>
							<li><a href=<?php echo base_url('servicos') ?>>serviços</a></li>
							<li><a href=<?php echo base_url('sobre') ?>>sobre</a></li>
							<li><a href=<?php echo base_url('contato') ?>>contato</a></li>
						</ul>
					</nav>
				</div>
			</header>
		</div>
	</div>