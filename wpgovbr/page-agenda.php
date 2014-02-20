<?php /* Template Name: Agenda */ ?>
<?php get_header(); ?>
<div id="portal-columns" class="row">
	<div id="portal-breadcrumbs"
		<?php if(function_exists('bcn_display'))
		{
			bcn_display();
		}?>
	</div>
	<?php include (TEMPLATEPATH . '/navigation.php'); ?>
	<!-- Conteudo -->
    <div id="portal-column-content" class="cell width-1:2 position-1:4">
        <a name="acontent" id="acontent"></a>
        <div class="">
            <dl class="portalMessage info" id="kssPortalMessage" style="display:none"><dt>Info</dt>
                <dd></dd>
            </dl>
			<div id="content">
				<div class="tileItem visualIEFloatFix tile-image">
					<div class="tileContent" style="border-bottom:1px solid #dfdfdf; margin-bottom: 5px;">
						<h2 class="tileHeadline">
							<a href="<?php the_permalink() ?>" class="summary url">Agenda</a>
						</h2>
							<p><span class="description">
							<h4>Reuni&atilde;o do Comite Executivo</h4>

							<?php

							if (isset($_GET['data'])) {
								$params = ' start="'. $_GET['data'] . '" end="'. $_GET['data'] . '" whitelabel="true" limit="none" noresults="Sem agenda informada" ';
							} else {
								$params = '" whitelabel="true" limit="none" noresults="Sem agenda para o dia de hoje" ';
							}
							echo do_shortcode('[eventlist ' . $params . ' categories="1"]'); ?>
							</span></p>

							<h4>Reuni�o Plen&aacute;ria</h4>

							<?php

							if (isset($_GET['data'])) {
								$params = ' start="'. $_GET['data'] . '" end="'. $_GET['data'] . '" whitelabel="true" limit="none" noresults="Sem agenda informada" ';
							} else {
								$params = '" whitelabel="true" limit="none" noresults="Sem agenda para o dia de hoje" ';
							}
							echo do_shortcode('[eventlist ' . $params . ' categories="3"]'); ?>
							</span></p>

							<div class="keywords">
								<?php the_tags('Tags: <span>', '</span>, <span>', '</span>'); ?>
							</div>
					</div>
					<span class="documentByLine">
								<span class="hiddenStructure">
									publicado
								</span>
								<span class="summary-view-icon">
									<i class="icon-day"></i>
									<?php the_date('d/m/Y'); ?>
								</span>
								<span class="summary-view-icon">
									<i class="icon-hour"></i>
									<?php the_time('G:i'); ?>
								</span>
					</span>
				</div>
			</div><!-- content -->
		</div>
	</div>
	<div id="portal-column-two" class="cell width-1:4 position-3:4">
		<div id="content">
        <?php include (TEMPLATEPATH . '/calendario.php'); ?>
		<?php // include (TEMPLATEPATH . '/media.php'); ?>
		<?php // include (TEMPLATEPATH . '/news.php'); ?>
		</div><!-- content -->
	</div>
</div>
<?php get_footer(); ?>

<section id="content" class="col span_9_of_12">

	<?php breadcrumbs(); ?>

	<article class="post" id="agenda">

		<?php
		if (isset($_GET['data'])) {
			$data = explode("-", $_GET['data']);
			$data = " - " . $data[2] . "/" . $data[1] . "/" . $data[0];
		} else {
			$data = " - " . date('d/m/Y');
		}
		?>
		<h2><a href="/agenda-das-autoridades">Agenda das autoridades <?= $data ?></a></h2>

		<h2 class="setor">Ministério da Previdência Social (MPS)</h2>

		<div id="mps" class="agenda">
		<br/>

		<h3>Gabinete do Ministro</h3>

		<br/>

		<h4>Reuni&atilde;o do Comite Executivo</h4>

		<?php

		if (isset($_GET['data'])) {
			$params = ' start="'. $_GET['data'] . '" end="'. $_GET['data'] . '" whitelabel="true" limit="none" noresults="Sem agenda informada" ';
		} else {
			$params = '" whitelabel="true" limit="none" noresults="Sem agenda para o dia de hoje" ';
		}

		echo do_shortcode('[eventlist ' . $params . ' categories="1"]'); ?>

		<br/>


		<h4>Chefe de Gabinete</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="10"]'); ?>

		<br/>

		<h4>Assessor Especial e Coordenador-Geral da Assessoria de Comunicação Social</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="11"]'); ?>

		<br/>

		<h4>Assessora Especial e Coordenadora da Assessoria Internacional</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="12"]'); ?>

		<br/>

		<h4>Assessor Especial de Controle Interno</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="13"]'); ?>

		<br/>

		<h4>Assessor Especial</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="14"]'); ?>

		<br/>

		<h3>Secretaria Executiva</h3>

		<br/>

		<h4>Secretário-Executivo</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="4"]'); ?>

		<br/>

		<h4>Secretária-Executiva Adjunta</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="5"]'); ?>

		<br/>

		<h4>Subsecretário de Orçamento e Administração</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="15"]'); ?>

		<br/>

		<h3>Consultoria Jurídica</h3>

		<br/>

		<h4>Consultor Jurídico</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="16"]'); ?>

		<br/>

		<h3>Secretaria de Políticas de Previdência Social</h3>

		<br/>

		<h4>Secretário de Políticas de Previdência Social</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="6"]'); ?>

		<br/>

		<h4>Diretor do Departamento do Regime Geral de Previdência Social</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="17"]'); ?>

		<br/>

		<h4>Diretor do Departamento dos Regimes de Previdência no Serviço Público</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="18"]'); ?>

		<br/>

		<h4>Diretor do Departamento de Políticas de Saúde e Segurança Ocupacional</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="19"]'); ?>

		<br/>

		<h3>Secretaria de Políticas de Previdência Complementar</h3>

		<br/>

		<h4>Secretário de Políticas de Previdência Complementar</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="9"]'); ?>

		<br/>

		<h4>Secretário-Adjunto</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="20"]'); ?>

		<br/>

		<h4>Diretor do Departamento de Políticas e Diretrizes de Previdência Complementar</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="21"]'); ?>

		</div>
		<hr/>

		<h2 class="setor">Instituto Nacional do Seguro Social (INSS)</h2>

		<div id="inss" class="agenda">
		<br/>

		<h4>Presidente</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="7"]'); ?>

		<br/>

		<h4>Diretor de Orçamento, Finanças e Logísticas</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="22"]'); ?>

		<br/>

		<h4>Diretor de Gestão de Pessoas</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="23"]'); ?>

		<br/>

		<h4>Diretor de Benefícios</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="24"]'); ?>

		<br/>

		<h4>Diretor de Saúde do Trabalhador</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="25"]'); ?>

		<br/>

		<h4>Diretora de Atendimento</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="26"]'); ?>

		<br/>

		<h4>Procurador-Geral</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="27"]'); ?>

		<br/>

		<h4>Auditora-Geral</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="28"]'); ?>
		</div>

		<hr/>

		<h2 class="setor"><a name="previc">Superitendência Nacional de Previdência Complementar (Previc)</a></h2>

		<div id="previc" class="agenda">
		<br/>

		<h4>Diretor-Superintendente</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="8"]'); ?>

		<br/>

		<h4>Diretor de Administração</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="29"]'); ?>

		<br/>

		<h4>Diretor de Análise Técnica</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="30"]'); ?>

		<br/>

		<h4>Diretor de Assuntos Atuariais, Contábeis e Econômicos</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="31"]'); ?>

		<br/>

		<h4>Diretor de Fiscalização</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="32"]'); ?>

		<br/>

		<h4>Procurador-Chefe</h4>

		<?php echo do_shortcode('[eventlist ' . $params . ' categories="33"]'); ?>
		</div>
	</article>

</section>

<?php get_footer(); ?>