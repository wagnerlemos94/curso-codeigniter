<?php
function carrega_pagina(){
	(isset($_GET['p'])) ? $pagina = $_GET['p'] : $pagina = 'home';
	if(file_exists('page_'.$pagina.'.php')):
		require_once('page_'.$pagina.'.php');
	else:
		require_once('page_home.php');
	endif;
}

function gera_titulos(){
	(isset($_GET['p'])) ? $pagina = $_GET['p'] : $pagina = 'home';
	switch ($pagina):
		case 'home':
			$titulo = 'RBernardi - Desenvolvimento Web';
			break;

		case 'clientes':
			$titulo = 'Clientes - RBernardi Desenvolvimento Web';
			break;

		case 'servicos':
			$titulo = 'O que fazemos - RBernardi Desenvolvimento Web';
			break;

		case 'sobre':
			$titulo = 'Sobre mim - RBernardi Desenvolvimento Web';
			break;

		case 'contato':
			$titulo = 'Fale comigo - RBernardi Desenvolvimento Web';
			break;
		
		default:
			$titulo = 'RBernardi - Desenvolvimento Web';
			break;
	endswitch;
	return $titulo;
}