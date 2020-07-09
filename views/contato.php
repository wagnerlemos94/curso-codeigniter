<?php $this->load->view('header') ?>	
	<div class="linha">
		<section>
			<div class="coluna col5 sidebar">
				<h3>Localização</h3>
				<img src="<?php echo base_url('assets/img/mapa.jpg') ?>" alt="" />
				<ul class="sem-padding sem-marcador">
					<li>Rua Machado de Assis, 121</li>
					<li>Bairo Moinhos</li>
					<li>Possibilândia - UF</li>
				</ul>
				<h3>Contato direto</h3>
				<ul class="sem-padding sem-marcador">
					<li>Fone: <strong>(00) 9999-9999</strong></li>
					<li>Email: <strong>contato@rbernardi.com</strong></li>
					<li>Skype: <strong>login.skype</strong></li>
				</ul>
			</div>
			<div class="coluna col7 contato">
				<h2>Envie uma mensagem</h2>
				<?php
					if($formerror):
						echo '<p>'.$formerror.'</p>';
					endif;
					echo form_open('pagina/contato');
					echo form_label('Seu nome:', 'nome');
					echo form_input('nome', set_value('nome'));
					echo form_label('Seu email:', 'email');
					echo form_input('email', set_value('email'));
					echo form_label('Assunto:', 'assunto');
					echo form_input('assunto', set_value('assunto'));
					echo form_label('Mensagem:', 'mensagem');
					echo form_textarea('mensagem', set_value('mensagem'));
					echo form_submit('enviar', 'Enviar mensagem >>', array('class' => 'botao'));
					echo form_close();
				?>
			</div>
		</section>
	</div>
	<div class="conteudo-extra">
		<div class="linha">
			<div class="coluna col7">
				<section>
					<h2>Método alternativo de contato</h2>
					<p>Caso não consiga me contatar por alguns dos meio acima, possivelmente eu estarei em uma ilha deserta em algum lugar do pacífico. Neste caso há duas possibilidades:</p>
					<ol>
						<li>Enviar uma mensagem em uma garrafa</li>
						<li>Tentar um sinal de fumaça</li>
					</ol>
					<p>Mas sinceramente não sei se algum desses métodos será eficiente, tente por sua conta e risco :D</p>
				</section>
			</div>
			<div class="coluna col5">
				<?php require_once('noticias.php'); ?>
			</div>
		</div>
	</div>

<?php $this->load->view('footer') ?>