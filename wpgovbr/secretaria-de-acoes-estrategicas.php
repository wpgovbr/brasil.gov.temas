<?php /* Template Name: subsecretaria-de-acoes-estrategicas */ ?>
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
	<div id="portal-column-content" class="cell width-3:4 position-1:4"">
		<a name="acontent" id="acontent"></a>
		<div class="">
			<dl class="portalMessage info" id="kssPortalMessage" style="display:none"><dt>Info</dt>
				<dd></dd>
			</dl>
			<div id="content">
				<div class="cell width-5 position-10">
					<?php include (TEMPLATEPATH . '/news.php'); ?>
				</div>
				<div class="row" data-layout-type="row">
					<div class="cell width-10 position-0">
						<div>
							<h2 class="tileHeadline">
								Secretaria de A&ccedil;&otilde;es Estrat&eacute;gicas
							</h2>
							<p>
									A Secretaria de A&ccedil;&otilde;es Estrat&eacute;gicas tem como objetivo elaborar propostas para subsidiar o governo brasileiro quanto a formula&ccedil;&atilde;o, aprimoramento, avalia&ccedil;&atilde;o e implementa&ccedil;&atilde;o de pol&iacute;&shy;ticas p&uacute;blicas que estimulem o desenvolvimento do Pa&iacute;&shy;s e que promovam a redu&ccedil;&atilde;o das desigualdades sociais e da pobreza. Esta Secretaria atua na identifica&ccedil;&atilde;o de quest&iacute;&micro;es sociais emergentes, buscando avan&ccedil;ar em &aacute;reas estrat&eacute;gicas que sejam capazes de manter a trajet&oacute;ria de crescimento conquistada pelos brasileiros na &uacute;ltima d&eacute;cada. Suas atividades se concentram, atualmente, nas seguintes &aacute;reas:
							</p>

						</div>
					</div>
<?php // -------------------------------------------Classe Média--------------------------------------------------------------------------- ?>
					<?php $SlugCategoria = 'classe-media' ?>
							<div class="visualClear"><!-- --></div>
							<div class="cell width-10 position-0 " data-panel="">
								<div class="tile <?php echo $SlugCategoria ?>" data-tile="" id="">
									<div class="outstanding-header">       		
										<h2 class="outstanding-title">Classe M&eacute;dia</h2>
									</div>
								</div>
							</div>
<?php // ----------------------------------------- Lista de Sub-Categorias (Projetos) 
								$Category = get_category_by_slug($SlugCategoria);
								$cat_ID = $Category->term_id ;
								$args = array(
									'child_of'                 => $cat_ID,
									'orderby'                  => 'name',
									'order'                    => 'ASC',
									'hide_empty'			   => 0
								); 
								$subCategories = get_categories($args); 								
?>
							<div class="visualClear"><!-- --></div>
							<?php 
							$count = '1';
							foreach ($subCategories as $subCategory) 
							{
								// para cada subcategoria do assunto principal
								// se for o caso testar por bit ($count & 1)
								if ($count % 2 == 0) {
									//par
									$position = '5';
								} 
								else 
								{
									//impar ($count % 2 != 0)
									$position = '0';
								}
								$subCatLink = esc_url(get_category_link( $subCategory->cat_ID ));
								//caixa dos projetos
								?>
								<div class="cell width-5 position-<?php echo $position ?> " data-panel="">
									<div style="margin-bottom:20px;">
										<a href="<?php echo $subCatLink ?>" title="<?php echo $subCategory->name ?>">
											<div class="banner-projeto" data-tile="<?php echo $subCategory->name ?>" id="banner-<?php echo $count ?>">
												<h3><?php echo $subCategory->name ?></h3>
											</div>
										</a>
									</div>
								</div>
								 <?php 
								if ($count % 2 == 0) 
								{
									//quebra a linha depois da segunda caixa
									echo '<div class="tile fio-separador"><!-- --></div>';
									echo '<div class="visualClear"><!-- --></div>';
								} 
								$count ++;
							} // fim do foreach
							
							?>
							<div class="visualClear"><!-- --></div>
							  <div class="cell width-10 position-0 " data-panel="">
								 <div class="tile <?php echo $SlugCategoria ?>">
									<div class="outstanding-header"><a class="outstanding-link" href="http://10.211.2.95/portal/category/assuntos/<?php echo $SlugCategoria ?>/">Saiba mais</a></div>
								 </div>
							  </div>
							<div class="visualClear"><!-- --></div>
<?php // --------------------------------------Imigração---------------------------------------------------------------------------?>
						<?php $SlugCategoria = 'imigracao' ?>
						<div class="row" data-layout-type="row">	
							<div class="cell width-10 position-0 " data-panel="">
								<div class="tile <?php echo $SlugCategoria ?>" data-tile="" id="">
									<div class="outstanding-header">       		
										<h2 class="outstanding-title">Imigra&ccedil;&atilde;o</h2>
									</div>
								</div>
							</div>
						</div>
<?php // ----------------------------------------- Lista de Sub-Categorias (Projetos) 
								$Category = get_category_by_slug($SlugCategoria);
								$cat_ID = $Category->term_id ;
								$args = array(
									'child_of'                 => $cat_ID,
									'orderby'                  => 'name',
									'order'                    => 'ASC',
									'hide_empty'			   => 0
								); 
								$subCategories = get_categories($args); 								
?>
							<div class="visualClear"><!-- --></div>
							<?php 
							$count = '1';
							echo '<div class="row" data-layout-type="row">';
							foreach ($subCategories as $subCategory) 
							{
								// para cada subcategoria do assunto principal
								// se for o caso testar por bit ($count & 1)
								if ($count % 2 == 0) {
									//par
									$position = '5';
								} 
								else 
								{
									//impar ($count % 2 != 0)
									$position = '0';
								}
								$subCatLink = esc_url(get_category_link( $subCategory->cat_ID ));
								//caixa dos projetos
								?>
								<div class="cell width-5 position-<?php echo $position ?> " data-panel="">
									<div style="margin-bottom:20px;">
										<a href="<?php echo $subCatLink ?>" title="<?php echo $subCategory->name ?>">
											<div class="banner-projeto" data-tile="<?php echo $subCategory->name ?>" id="banner-<?php echo $count ?>">
												<h3><?php echo $subCategory->name ?></h3>
											</div>
										</a>
									</div>
								</div>
								 <?php 
								if ($count % 2 == 0) 
								{
									//quebra a linha depois da segunda caixa
									echo '<div class="tile fio-separador"><!-- --></div>';
									echo '<div class="visualClear"><!-- --></div>';
								} 
								$count ++;
							} // fim do foreach
							echo '</div>';
							?>		
							<div class="visualClear"><!-- --></div>
							<div class="row" data-layout-type="row">
							  <div class="cell width-10 position-0 " data-panel="">
								 <div class="tile <?php echo $SlugCategoria ?>">
									<div class="outstanding-header"><a class="outstanding-link" href="http://10.211.2.95/portal/category/assuntos/<?php echo $SlugCategoria ?>/">Saiba mais</a></div>
								 </div>
							  </div>
							</div>
<?php // --------------------------------------Social---------------------------------------------------------------------------?>
						<?php $SlugCategoria = 'social' ?>
						<div class="row" data-layout-type="row">	
							<div class="cell width-10 position-0 " data-panel="">
								<div class="tile <?php echo $SlugCategoria ?>" data-tile="" id="">
									<div class="outstanding-header">       		
										<h2 class="outstanding-title">Social</h2>
									</div>
								</div>
							</div>
						</div>

<?php // ----------------------------------------- Lista de Sub-Categorias (Projetos) 
								$Category = get_category_by_slug($SlugCategoria);
								$cat_ID = $Category->term_id ;
								$args = array(
									'child_of'                 => $cat_ID,
									'orderby'                  => 'name',
									'order'                    => 'ASC',
									'hide_empty'			   => 0
								); 
								$subCategories = get_categories($args); 								
?>
							<div class="visualClear"><!-- --></div>

							<?php 
							$count = '1';
							echo '<div class="row" data-layout-type="row">';
							foreach ($subCategories as $subCategory) 
							{
								// para cada subcategoria do assunto principal
								// se for o caso testar por bit ($count & 1)
								if ($count % 2 == 0) {
									//par
									$position = '5';
								} 
								else 
								{
									//impar ($count % 2 != 0)
									$position = '0';
								}
								$subCatLink = esc_url(get_category_link( $subCategory->cat_ID ));
								//caixa dos projetos
								?>
								<div class="cell width-5 position-<?php echo $position ?> " data-panel="">
									<div style="margin-bottom:20px;">
										<a href="<?php echo $subCatLink ?>" title="<?php echo $subCategory->name ?>">
											<div class="banner-projeto" data-tile="<?php echo $subCategory->name ?>" id="banner-<?php echo $count ?>">
												<h3><?php echo $subCategory->name ?></h3>
											</div>
										</a>
									</div>
								</div>
								 <?php 
								if ($count % 2 == 0) 
								{
									//quebra a linha depois da segunda caixa
									echo '<div class="tile fio-separador"><!-- --></div>';
									echo '<div class="visualClear"><!-- --></div>';
								} 
								$count ++;
							} // fim do foreach
							echo '</div>';
							?>		
							<div class="visualClear"><!-- --></div>
							<div class="row" data-layout-type="row">
							  <div class="cell width-10 position-0 " data-panel="">
								 <div class="tile <?php echo $SlugCategoria ?>">
									<div class="outstanding-header"><a class="outstanding-link" href="http://10.211.2.95/portal/category/assuntos/<?php echo $SlugCategoria ?>/">Saiba mais</a></div>
								 </div>
							  </div>
							</div>
<?php //--------------------------------------Juventude---------------------------------------------------------------------------?>
						<?php $SlugCategoria = 'juventude' ?>
						<div class="row" data-layout-type="row">	
							<div class="cell width-10 position-0 " data-panel="">
								<div class="tile <?php echo $SlugCategoria ?>" data-tile="" id="">
									<div class="outstanding-header">       		
										<h2 class="outstanding-title">Juventude</h2>
									</div>
								</div>
							</div>
						</div>

<?php // ----------------------------------------- Lista de Sub-Categorias (Projetos) 
								$Category = get_category_by_slug($SlugCategoria);
								$cat_ID = $Category->term_id ;
								$args = array(
									'child_of'                 => $cat_ID,
									'orderby'                  => 'name',
									'order'                    => 'ASC',
									'hide_empty'			   => 0
								); 
								$subCategories = get_categories($args); 								
?>
							<div class="visualClear"><!-- --></div>

							<?php 
							$count = '1';
							echo '<div class="row" data-layout-type="row">';
							foreach ($subCategories as $subCategory) 
							{
								// para cada subcategoria do assunto principal
								// se for o caso testar por bit ($count & 1)
								if ($count % 2 == 0) {
									//par
									$position = '5';
								} 
								else 
								{
									//impar ($count % 2 != 0)
									$position = '0';
								}
								$subCatLink = esc_url(get_category_link( $subCategory->cat_ID ));
								//caixa dos projetos
								?>
								<div class="cell width-5 position-<?php echo $position ?> " data-panel="">
									<div style="margin-bottom:20px;">
										<a href="<?php echo $subCatLink ?>" title="<?php echo $subCategory->name ?>">
											<div class="banner-projeto" data-tile="<?php echo $subCategory->name ?>" id="banner-<?php echo $count ?>">
												<h3><?php echo $subCategory->name ?></h3>
											</div>
										</a>
									</div>
								</div>
								 <?php 
								if ($count % 2 == 0) 
								{
									//quebra a linha depois da segunda caixa
									echo '<div class="tile fio-separador"><!-- --></div>';
									echo '<div class="visualClear"><!-- --></div>';
								} 
								$count ++;
							} // fim do foreach
							echo '</div>';
							?>		
							<div class="visualClear"><!-- --></div>
							<div class="row" data-layout-type="row">
							  <div class="cell width-10 position-0 " data-panel="">
								 <div class="tile <?php echo $SlugCategoria ?>">
									<div class="outstanding-header"><a class="outstanding-link" href="http://10.211.2.95/portal/category/assuntos/<?php echo $SlugCategoria ?>/">Saiba mais</a></div>
								 </div>
							  </div>
							</div>
<?php // --------------------------------------Infância---------------------------------------------------------------------------?>
						<?php $SlugCategoria = 'infancia' ?>
						<div class="row" data-layout-type="row">	
							<div class="cell width-10 position-0 " data-panel="">
								<div class="tile <?php echo $SlugCategoria ?>" data-tile="" id="">
									<div class="outstanding-header">       		
										<h2 class="outstanding-title">Inf&acirc;ncia</h2>
									</div>
								</div>
							</div>
						</div>

<?php // ----------------------------------------- Lista de Sub-Categorias (Projetos) 
								$Category = get_category_by_slug($SlugCategoria);
								$cat_ID = $Category->term_id ;
								$args = array(
									'child_of'                 => $cat_ID,
									'orderby'                  => 'name',
									'order'                    => 'ASC',
									'hide_empty'			   => 0
								); 
								$subCategories = get_categories($args); 								
?>
							<div class="visualClear"><!-- --></div>

							<?php 
							$count = '1';
							echo '<div class="row" data-layout-type="row">';
							foreach ($subCategories as $subCategory) 
							{
								// para cada subcategoria do assunto principal
								// se for o caso testar por bit ($count & 1)
								if ($count % 2 == 0) {
									//par
									$position = '5';
								} 
								else 
								{
									//impar ($count % 2 != 0)
									$position = '0';
								}
								$subCatLink = esc_url(get_category_link( $subCategory->cat_ID ));
								//caixa dos projetos
								?>
								<div class="cell width-5 position-<?php echo $position ?> " data-panel="">
									<div style="margin-bottom:20px;">
										<a href="<?php echo $subCatLink ?>" title="<?php echo $subCategory->name ?>">
											<div class="banner-projeto" data-tile="<?php echo $subCategory->name ?>" id="banner-<?php echo $count ?>">
												<h3><?php echo $subCategory->name ?></h3>
											</div>
										</a>
									</div>
								</div>
								 <?php 
								if ($count % 2 == 0) 
								{
									//quebra a linha depois da segunda caixa
									echo '<div class="tile fio-separador"><!-- --></div>';
									echo '<div class="visualClear"><!-- --></div>';
								} 
								$count ++;
							} // fim do foreach
							echo '</div>';
							?>		
							<div class="visualClear"><!-- --></div>
							<div class="row" data-layout-type="row">
							  <div class="cell width-10 position-0 " data-panel="">
								 <div class="tile <?php echo $SlugCategoria ?>">
									<div class="outstanding-header"><a class="outstanding-link" href="http://10.211.2.95/portal/category/assuntos/<?php echo $SlugCategoria ?>/">Saiba mais</a></div>
								 </div>
							  </div>
							</div>



						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<?php get_footer(); ?>	
