<?php $this->load->view('header') ?>

	<div class="linha">
		<section>
			<div class="coluna col8">
				<h2><?php echo $not_titulo; ?></h2>
				<?php echo $not_conteudo; ?>
			</div>
			<div class="coluna col4 sidebar">
				<h3>Dados do post</h3>
				<img src="<?php echo base_url('uploads/'.$not_imagem); ?>" alt="" />
				<ul>
					<li>Publicado em: </li>
					<li>Autor: </li>
				</ul>
			</div>
		</section>
	</div>
	<div class="conteudo-extra">
		<div class="linha">
			<div class="coluna col7">
				<section>
					<h2>Curiosidade</h2>
					<p>Meu primeiro contato com um computador foi em meados de 2000, e para poder fazer meu primeiro "cursinho de informática" eu precisava levar minha bicicleta no bagageiro do ônibus escolar para ter como voltar pra casa após o curso.</p>
					<p>Eu morava a 12Km da cidade, e quando meu curso terminava por volta das 17:00 horas eu ainda tinha muita estrada pela frente até chegar em casa e descansar.</p>
					<p>O problema é que quando eu finalmente chegava em casa, precisava ajudar meus pais a tirar leite e tratar o gado que na época trazia nosso sustento e pagava meu curso.</p>
					<p>Resumo da história: eu somente podia descansar por volta das 22:00 horas. Já era hora de dormir pois no outro dia as 5:00 da madrugada começava tudo de novo...</p>
				</section>
			</div>
			<div class="coluna col5">
				<?php $this->load->view('noticias'); ?>
			</div>
		</div>
	</div>

<?php $this->load->view('footer') ?>