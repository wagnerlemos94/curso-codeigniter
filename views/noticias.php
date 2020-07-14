				<h3>Últimas notícias</h3>
				<ul class="sem-marcador sem-padding noticias">
					<?php
					if($noticias = $this->noticia->get(3)):
						foreach($noticias as $linha):
							?>
							<li>
								<img src="<?php echo base_url('uploads/'.$linha->imagem); ?>" alt="" />
								<h4><?php echo to_html($linha->titulo); ?></h4>
								<p><?php echo resumo_post($linha->conteudo); ?>...
								<a href="<?php echo base_url('post/'.$linha->id); ?>">Leia mais &raquo;</a>
							 	</p>
							<li>
							<?php
						endforeach;
					else:
						echo '<p>Nenhum notícia cadastrada!</p>';
					endif;
					?>
				</ul>