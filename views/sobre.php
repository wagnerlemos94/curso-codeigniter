<?php $this->load->view('header') ?>

	<div class="linha">
		<section>
			<div class="coluna col8">
				<h2>Sobre mim</h2>
				<p>Me chamo Ricardo Bernardi, nasci em 1985 em uma pequena cidade o interior do Rio Grande do Sul. As dificuldades do lugar me fizeram migrar para a região metropolitana para ingressar no mercado de trabalho e buscar meu "lugar ao sol".</p>
				<p>Conheci a área de tecnologia, mais precisamente o desenvolvimento web, em 2005, e a partir de então tive certeza absoluta do que eu queria fazer o resto da minha vida: criar uma vida digital para as empresas.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam repellendus eum ratione eos at tenetur quidem autem quaerat labore porro. Magni ratione repudiandae porro sequi!</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam repellendus eum ratione eos at tenetur quidem autem quaerat labore porro. Magni ratione repudiandae porro sequi!</p>
				<h2>Porque trabalho com web</h2>
				<p>Acredito que qualquer empresa atualmente precisa de uma boa estratégia de marketing digital para sobreviver em um mercado cada vez mais restrito e concorrido.</p>
				<p>Um profissional que apenas cria sites trabalha somente com o DIGITAL, por isso eu me especializei em MARKETING para poder ofercer o que as empresas realmente precisam para ter presença na internet de hoje.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam repellendus eum ratione eos at tenetur quidem autem quaerat labore porro. Magni ratione repudiandae porro sequi!</p>
			</div>
			<div class="coluna col4 sidebar">
				<h3>Formação profissional</h3>
				<img src="<?php echo base_url('assets/img/formatura.jpg') ?>" alt="" />
				<ul>
					<li>Graduado em análise e desenvolvimento de sistemas para web pela universidade ABC</li>
					<li>Especialização em marketing de conteúdo</li>
				</ul>
				<h3>Áreas de conhecimento</h3>
				<ul>
					<li>HTML e CSS</li>
					<li>Javascript e jQuery</li>
					<li>PHP</li>
					<li>Wordpress</li>
					<li>Codeigniter</li>
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
				<?php require_once('noticias.php'); ?>
			</div>
		</div>
	</div>

<?php $this->load->view('footer') ?>