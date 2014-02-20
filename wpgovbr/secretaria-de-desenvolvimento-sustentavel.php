<?php /* Template Name: subsecretaria-de-desenvolvimento-sustentavel */ ?>
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
								Secretaria de Desenvolvimento Sustent&aacute;vel
							</h2>
							<p>
								A Secretaria de Desenvolvimento Sustent&aacute;vel formula, avalia e implementa propostas de pol&iacute;&shy;ticas p&uacute;blicas, levando em considera&ccedil;&atilde;o aspectos econ&ocirc;micos, sociais e ambientais de interesse estrat&eacute;gico nacional, a fim de promover o desenvolvimento sustent&aacute;vel no Brasil e, em especial, na Amaz&ocirc;nia. Para tanto, a Secretaria promove parcerias e articula&ccedil;&atilde;o com &oacute;rg&atilde;os, entes federativos e entidades nacionais e estrangeiras.
							</p>
							<p>
								A estrat&eacute;gia de atua&ccedil;&atilde;o dessa Secretaria est&aacute; focada atualmente na formula&ccedil;&atilde;o e aperfei&ccedil;oamento de pol&iacute;&shy;ticas p&uacute;blicas nas seguintes &aacute;reas:
							</p>
						</div>
					</div>
<?php // -------------------------------------------Clima--------------------------------------------------------------------------- ?>
					<?php $SlugCategoria = 'clima' ?>
							<div class="visualClear"><!-- --></div>
							<div class="cell width-10 position-0 " data-panel="">
								<div class="tile <?php echo $SlugCategoria ?>" data-tile="" id="">
									<div class="outstanding-header">       		
										<h2 class="outstanding-title">Clima</h2>
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
<?php // --------------------------------------Cenários---------------------------------------------------------------------------?>
						<?php $SlugCategoria = 'cenarios' ?>
						<div class="row" data-layout-type="row">	
							<div class="cell width-10 position-0 " data-panel="">
								<div class="tile <?php echo $SlugCategoria ?>" data-tile="" id="">
									<div class="outstanding-header">       		
										<h2 class="outstanding-title">Cenários</h2>
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
<?php // --------------------------------------Água---------------------------------------------------------------------------?>
						<?php $SlugCategoria = 'agua' ?>
						<div class="row" data-layout-type="row">	
							<div class="cell width-10 position-0 " data-panel="">
								<div class="tile <?php echo $SlugCategoria ?>" data-tile="" id="">
									<div class="outstanding-header">       		
										<h2 class="outstanding-title">Água</h2>
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
<?php //--------------------------------------Produção e Consumo---------------------------------------------------------------------------?>
						<?php $SlugCategoria = 'producao-e-consumo' ?>
						<div class="row" data-layout-type="row">	
							<div class="cell width-10 position-0 " data-panel="">
								<div class="tile <?php echo $SlugCategoria ?>" data-tile="" id="">
									<div class="outstanding-header">       		
										<h2 class="outstanding-title">Produção e Consumo</h2>
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
<?php // --------------------------------------Florestas---------------------------------------------------------------------------?>
						<?php $SlugCategoria = 'florestas' ?>
						<div class="row" data-layout-type="row">	
							<div class="cell width-10 position-0 " data-panel="">
								<div class="tile <?php echo $SlugCategoria ?>" data-tile="" id="">
									<div class="outstanding-header">       		
										<h2 class="outstanding-title">Florestas</h2>
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
<?php // --------------------------------------Saneamento---------------------------------------------------------------------------?>
						<?php $SlugCategoria = 'saneamento' ?>
						<div class="row" data-layout-type="row">	
							<div class="cell width-10 position-0 " data-panel="">
								<div class="tile <?php echo $SlugCategoria ?>" data-tile="" id="">
									<div class="outstanding-header">       		
										<h2 class="outstanding-title">Saneamento</h2>
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
<?php // --------------------------------------Fronteira---------------------------------------------------------------------------?>
						<?php $SlugCategoria = 'fronteira' ?>
						<div class="row" data-layout-type="row">	
							<div class="cell width-10 position-0 " data-panel="">
								<div class="tile <?php echo $SlugCategoria ?>" data-tile="" id="">
									<div class="outstanding-header">       		
										<h2 class="outstanding-title">Fronteira</h2>
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
