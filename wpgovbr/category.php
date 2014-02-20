<?php get_header(); ?>
<!--<section>-->
		<div id="portal-columns" class="row">
        <?php // acrescenta os breadcumbs e carrega o menu lateral
		 include (TEMPLATEPATH . '/navigation.php'); ?>
 <!-- Conteudo -->
			<div id="portal-column-content" class="cell width-3:4 position-1:4">
            <a name="acontent" id="acontent"></a>
<?php
	
	//vamos alterar o conteúdo de acordo com o tipo de categoria
	// pegando o slug da categoria e salvando em uma variável 
   	$thisCat 		= get_category(get_query_var('cat'),false);
	$thisCatSlug 	= $thisCat->slug;
	$thisCatID 		= $thisCat->cat_ID;
	$thisCatLink 	= esc_url(get_category_link( $thisCatID ));
	$parentID 		= $thisCat->category_parent;
	$parent 		= get_category($parentID);
	$parentSlug 	= $parent->slug;
	$paged 			= (get_query_var('paged')) ? get_query_var('paged') : 1;
	$category = $thisCat ;
	$cat_Assuntos_ID = get_cat_ID( 'Assuntos' ) ;
	
	$cor_categoria = '#00510F';
	
	if ($category->category_parent === $cat_Assuntos_ID)
	{
		$cor_categoria = get_category_color($category->term_id);
	}
	else
	{
		$cor_categoria 		= get_category_color($category->category_parent);
		$parent = get_category($category->category_parent);
		if($parent->category_parent === $cat_Assuntos_ID)
		{
			$cor_categoria 		= get_category_color($category->category_parent);
		}
		
	}	
	/*if( in_array($thisCatID,array(65,68)))
	{

		$cor_categoria = get_category_color($thisCatID);
	}
	*/
if (isset($_GET['info'])) {
	//categoria especial
	$tipo= 'especial';
	$filtro = $_GET['info'];
	$thisTag = get_term_by('name', $filtro, 'post_tag');	
	wp_reset_query();
	wp_reset_postdata();	
								// WP_Query arguments
								$args = array (
									'category_name'          => $thisCatSlug,
									'tag'               	 => $filtro,
									'pagination'			 => true,
									'posts_per_page'         => '8',
									'paged'					 => $paged
								);
								// The Query
								$query = new WP_Query( $args );
								global $wp_query;
								$wp_query = $query;
								?>
                                <div class='template-summary_view'>
									<div id="content">
										<div id="viewlet-above-content-title"></div>
										<h1 class="documentFirstHeading">
										<?php 
											if (strtolower($thisCat->name) == 'documentos' || strtolower($thisCat->name) == 'biblioteca'){
												echo 'Biblioteca';
											}else{
												echo $thisTag->name.' - '.$thisCat->name; 
											}
										?></h1>
										<div id="viewlet-below-content-title">
											<div class="documentByLine" id="plone-document-byline">
												<span class="documentModified"><span>&Uacute;ltima modifica&ccedil;&atilde;o</span> 
												<?php the_modified_date('d/m/Y'); ?> <?php the_modified_date('g:i a'); ?></span>
											</div>
										</div>
<?php 
										// para acrescentar a estante de livros
										//if (strtolower($thisCat->name) == 'documentos' || strtolower($thisCat->name) == 'biblioteca'){ 
										?>
										<!--<div id='estanteWraper'><div id='estante'></div></div>
										<?php //} ?>

										<div id="viewlet-above-content-body"></div>
										<div id="content-core"> 
										-->
										<?php //abaixo entra o Loop para os documentos encontrados
										
										if ( $query->have_posts() ) {
											while ( $query->have_posts() ) {
												$query->the_post();
										  ?>
										<div class="tileItem tile-image">
											<div class="tileContent">
													<?php 
													//get_field é um comando criado pelo plugin Advanced Custom Fields. Preview é um 'custom field' criado para carregar imagens no SlideShow
													$imagemP = trim(get_field('preview')); 
													if($imagemP === "")
													{
														$imagemP = get_post_meta($post->ID, 'preview', single);
													}													
													$issuuID = get_post_meta($post->ID, 'issuu', single);
													$chapeu = get_post_meta($post->ID, 'chapeu', single);
													
													if ($issuuID) {
														?>
													<a href="<?php bloginfo('url'); ?>/wp-content/ciclodepalestras/livro.php?id=<?php echo $issuuID; ?>" target="_blank" >
														<div class="tileImage">
														  <img src="http://image.issuu.com/<?php echo $issuuID; ?>/jpg/page_1_thumb_medium.jpg" width="100" height="150" border="0" title="<?php the_title();?>" alt="<?php the_title();?>" class="tileImage" />
														</div>
													</a>
													<?php
													} elseif ($imagemP) {
														?>
													  <div class="tileImage">
													  <img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $imagemP; ?>&amp;q=100&amp;h=96&amp;w=185&amp;zc=1" width="185" height="96" border="0" title="<?php the_title();?>" alt="<?php the_title();?>" class="tileImage" />
													</div>
														<?php 
													}
												?>
											  <h2 class="tileHeadline">
												<a href="<?php the_permalink() ?>" class="summary url"><?php the_title(); ?></a>
											  </h2>
											  <?php $resumo = apply_filters($post->post_content, wp_strip_all_tags(substr(get_the_content(), 0, 250),false)).'...'; ?>
												<p><span class="description"><?php echo $resumo ?></span></p>
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
														<?php
															$posttags = get_the_tags();
															if ($posttags) 
															{
															  foreach($posttags as $tag) 
																{
																	//procura por uma tag especial
																	switch ($tag->name) 
																	{
																		case 'video':
																			$postType = 'v&iacute;deo';
																			$icone = 'icon-day';
																			break 2;
																		case 'audio':
																			$postType = '&aacute;udio';
																			$icone = 'icon-multimidia';
																			break 2;
																		case 'foto':
																		case 'infografico':
																			$postType = 'imagem';
																			$icone = 'icon-image';
																			break 2;
																		case 'agenda':
																			$postType = $tag->name;
																			$icone = 'icon-day';
																			break 2;
																		case 'evento':
																			$postType = $tag->name;
																			$icone = 'icon-day';
																			break 2;
																		case 'documento':
																			$postType = $tag->name;
																			$icone = 'icon-page';
																			break 2;
																		default:
																			// se nao achar nenhum, volta e procura mais ou usa noticia
																			$postType = 'not&iacute;cia';
																			$icone = 'icon-page';
																			break;
																	} 
																}
															}
														?>
														<span class="summary-view-icon">
															<i class="<?php echo $icone ?>"></i>
															<?php  echo $postType;  // $thisTag->name; ?>
														</span>
													<span class="visualClear"></span>
											</span>
										</div>
									  <?php // fim do loop caso encontre 
										  }
										  pagination();
										} else 
										{ 
											// caso nenhum post seja encontrado  ?>
											<div class="tileItem tile-image">
												<div class="tileContent">
													<h2>Nenhum item encontrado.</h2>
												</div>
											</div>
								<?php   }?>
										</div><?php // fecha content core ?>
									</div> <?php // fecha content ?>
                                </div> <?php // fecha sumary-view ?>
                                
<?php
} 
elseif (isset($_GET['listar']))
// para listar todos os posts de uma certa categoria 
{
	//categoria especial
	$tipo= 'especial';
	wp_reset_query();
	wp_reset_postdata();	
	// WP_Query arguments
	$args = array (
	'category_name'          => $thisCatSlug,
	'pagination'			 => true,
	'posts_per_page'         => '8',
	'paged'					 => $paged
	);
	// The Query
	$query = new WP_Query( $args );
	global $wp_query;
	$wp_query = $query;
?>
	                                <div class='template-summary_view'>
									<div id="content">
										<div id="viewlet-above-content-title"></div>
										<h1 class="documentFirstHeading">
										<?php 
										echo $thisCat->name; 
										?></h1>
										<div id="viewlet-below-content-title">
											<div class="documentByLine" id="plone-document-byline">
												<span class="documentModified"><span>&Uacute;ltima modifica&ccedil;&atilde;o</span> 
												<?php the_modified_date('d/m/Y'); ?> <?php the_modified_date('g:i a'); ?></span>
											</div>
										</div>
										<div id="viewlet-above-content-body"></div>
										<div id="content-core"> 
										<?php 
										//abaixo entra o Loop para os documentos encontrados									
										if ( $query->have_posts() ) {
											while ( $query->have_posts() ) {
												$query->the_post();
										  ?>
										<div class="tileItem tile-image">
											<div class="tileContent">
													<?php 
													//get_field é um comando criado pelo plugin Advanced Custom Fields. Preview é um 'custom field' criado para carregar imagens no SlideShow
													$imagemP = trim(get_field('preview')); 
													if($imagemP === "")
													{
														$imagemP = get_post_meta($post->ID, 'preview', single);
													}	
													$issuuID = get_post_meta($post->ID, 'issuu', single);
													$chapeu = get_post_meta($post->ID, 'chapeu', single);
													
													if ($issuuID) {
														?>
													<a href="<?php bloginfo('url'); ?>/wp-content/ciclodepalestras/livro.php?id=<?php echo $issuuID; ?>" target="_blank" >
													<div class="tileImage">
													  <img src="http://image.issuu.com/<?php echo $issuuID; ?>/jpg/page_1_thumb_medium.jpg" width="100" height="150" border="0" title="<?php the_title();?>" alt="<?php the_title();?>" class="tileImage" />
													</div>
													</a>
													<?php
													} elseif ($imagemP) {
														?>
													  <div class="tileImage">
													  <img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $imagemP; ?>&amp;q=100&amp;h=96&amp;w=190&amp;zc=1" width="190" height="96" border="0" title="<?php the_title();?>" alt="<?php the_title();?>" class="tileImage" />
													</div>
														<?php 
													}
												?>
											  <h2 class="tileHeadline">
												<a href="<?php the_permalink() ?>" class="summary url"><?php the_title(); ?></a>
											  </h2>
											  <?php $resumo = apply_filters($post->post_content, substr(wp_strip_all_tags(get_the_content(),false), 0, 300)).'...'; ?>
												<p><span class="description"><?php echo $resumo ?></span></p>
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
														<?php
															$posttags = get_the_tags();
															if ($posttags) 
															{
															  foreach($posttags as $tag) 
																{
																	//procura por uma tag especial
																	switch ($tag->name) 
																	{
																		case 'video':
																			$postType = 'v&iacute;deo';
																			$icone = 'icon-day';
																			break 2;
																		case 'audio':
																			$postType = '&aacute;udio';
																			$icone = 'icon-multimidia';
																			break 2;
																		case 'foto':
																		case 'infografico':
																			$postType = 'imagem';
																			$icone = 'icon-image';
																			break 2;
																		case 'agenda':
																			$postType = $tag->name;
																			$icone = 'icon-day';
																			break 2;
																		case 'evento':
																			$postType = $tag->name;
																			$icone = 'icon-day';
																			break 2;
																		case 'documento':
																			$postType = $tag->name;
																			$icone = 'icon-page';
																			break 2;
																		default:
																			// se nao achar nenhum, volta e procura mais ou usa noticia
																			$postType = 'not&iacute;cia';
																			$icone = 'icon-page';
																			break;
																	} 
																}
															}
														?>
														<span class="summary-view-icon">
															<i class="<?php echo $icone ?>"></i>
															<?php  echo $postType;  // $thisTag->name; ?>
														</span>
													<span class="visualClear"></span>
											</span>
										</div>
									  <?php // fim do loop caso encontre 
										}
										pagination();
										} 
										else 
										{ 
											// caso nenhum post seja encontrado  ?>
											<div class="tileItem tile-image">
												<div class="tileContent">
													<h2>Nenhum item encontrado.</h2>
												</div>
											</div>
								<?php   }?>
										</div><?php // fecha content core ?>
									</div> <?php // fecha content ?>
                                </div> <?php // fecha sumary-view ?>
<?php
}else{
// se nao for por tag ou lista completa, carregar as páginas especiais das categorias e subcategorias 
										//categorias normais
										if ($parentSlug == 'assuntos'){
											$tipo= 'principal';
											$estilo = $thisCatSlug;
											//principal
										}
										else
										{
											$tipo= 'secundaria';
									//		$estilo = $parent;
											$estilo = $parentSlug;
											//secundária
									};
										// a partir daqui, o geral das categorias normais e secundárias
								?>

<?php // ----------------------------------------- fim da parte inicial do conteudo de categorias e filtro de tags ?>

            	<div id="header-<?php echo $thisCatSlug ?>" class="tile <?php echo $estilo ?>">
				    <div class="outstanding-header" <?php if($cor_categoria){ echo 'style="border-top-color:' . $cor_categoria . ';"';} ?> >
        				<h2 class="outstanding-title" <?php if($cor_categoria){ echo 'style="border-color:' . $cor_categoria . ';color:' . $cor_categoria . ';"';} ?> > <?php single_cat_title(); ?> </h2>
    				</div>
				</div>	
                <a name="acontent" id="acontent"></a>
                <div class="--nada--">
                    <dl class="portalMessage info" id="kssPortalMessage" style="display:none"><dt>Info</dt>
                        <dd></dd>
                    </dl>
                    <div id="content">
                    <div class="cell width-5 position-10" style="z-index:99"> 
                        <?php  include (TEMPLATEPATH . '/news.php'); ?>
					</div>
					<div class="row" data-layout-type="row">
						<div class="cell width-10 position-0" style='padding-bottom:20px;'>
						<div class="tileContent">
                        <!-- conteúdo geral -->
						<? // texto de apresentação, aparece apenas na 1 vez ?>
							<?php if ( $paged < 2 ) : ?>
                                <!-- <div class="documentDescription" property="rnews:description"> -->
                                    <?php //pega o texto da pagina do tema usando: pg-slug
                                    $page = get_posts(
                                        array(
                                            'name'      => 'pg-'.$thisCatSlug,
                                            'post_type' => 'page'
                                        )
                                    );
									echo apply_filters('the_content', $page[0]->post_content);
                                    //echo $page[0]->post_content;
                                    ?> 
                              <!--  </div> -->
                            <?php endif; ?>
						</div></div>
 

<?php // ----------------------------------------- videos 
if ($thisCatSlug == 'videos-imprensa') {
		$tipo= 'especial';
		?>
        <div class="row" data-layout-type="row">
            <div class="cell width-10 position-0" data-panel="">
        		
                <div id="playerContainer" class="cell width-10 position-0">
                    <object id="player"></object>
                </div>
		  <div class="visualClear"><!-- --></div>
                <div id="videos2"></div>
                <script type="text/javascript" id="fixme"></script>
                <script type="text/javascript">
                    document.getElementById('fixme').src = youtubeURL;
                </script>
		  <div class="visualClear"><!-- --></div>
                <div id='paginate'></div>
                
             </div>
		</div>

<?php }
// ----------------------------------------- fim de videos ?>

<?php // ----------------------------------------- audio 
if ($thisCatSlug == 'banco-de-audios') {
		$tipo= 'especial';
		?>
        <div class="row" data-layout-type="row">
            <div class="cell width-10 position-0" data-panel="">
				<div class="visualClear"><!-- --></div>
								<?php 	
								wp_reset_query();
								// WP_Query arguments
								$args = array (
									'category_name'          => 'banco-de-audios',
									'pagination'             => true,
									'posts_per_page'         => '8',
									'paged' => $paged
								);
								// The Query
								$AudioPosts = new WP_Query( $args );
								// The Loop
								if ( $AudioPosts->have_posts() ) 
								{
									while ( $AudioPosts->have_posts() ) 
									{
									?>
										<div class="tileItem tile-image">
											<?php 		
											$AudioPosts->the_post();
											$audio = get_post_meta($post->ID, 'audio', $single = true);
											$audioTitulo = get_post_meta($post->ID, 'titulo-audio', $single = true);
											$audio2 = get_post_meta($post->ID, 'audio2', $single = true);
											$audioTitulo2 = get_post_meta($post->ID, 'titulo-audio2', $single = true);
											if ($audio || $audio2) 
											{	?>
												<div class="tileContent">
													
													<h2 class="tileHeadline"><a href="<?php the_permalink() ?>" class="summary url"><?php the_title(); ?></a>											</h2>										
													  <?php $resumo = apply_filters($post->post_content, substr(wp_strip_all_tags(get_the_content(),false), 0, 250)).'...'; ?>
														<p><span class="description"><?php echo $resumo ?></span></p>

												</div>		

												<?php
												if ($audioTitulo) {?>
													<p>
														<span class="description">																				
															<h3><?php echo $audioTitulo; ?>&nbsp;<a href="<?php echo $audio; ?>" target="_blank"></a></h3><br />
												<?php } ?>
													<?php  if ($audio) {
																		$AudioPath = get_bloginfo('url') . "/" . $audio; 
																		echo do_shortcode('[audio mp3="' . $AudioPath . '" autoplay="off" loop="off" preload="on" controls="on" flash_fallback="on"]');
																	}
													?>
															</span>
														</p>
													<?php  if ($audioTitulo2) {?>
														<p>
															<span class="description">
																<h3><?php echo $audioTitulo2; ?>&nbsp;<a href="<?php echo $audio2; ?>" target="_blank"></a></h3><br />
													<?php } 
															if ($audio2) {
																	$AudioPath = '';
																	$AudioPath = get_bloginfo('url') . "/" . $audio2; 
																	echo do_shortcode('[audio mp3="' . $AudioPath . '" autoplay="off" loop="off" preload="on" controls="on" flash_fallback="on"]');
																	} 													
														?>				
															</span>
														</p>		
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
														<?php
															$posttags = get_the_tags();
															$postType = 'not&iacute;cia';
															$icone = 'icon-page';									
															if ($posttags) 
															{
																foreach($posttags as $tag) 
																{
																	switch ($tag->name) 
																	{
																		case 'video':
																			$postType = 'v&iacute;deo';
																			$icone = 'icon-day';
																			break 2;
																		case 'audio':
																			$postType = '&aacute;udio';
																			$icone = 'icon-multimidia';
																			break 2;
																		case 'foto':
																		case 'infografico':
																			$postType = 'imagem';
																			$icone = 'icon-image';
																			break 2;
																		case 'agenda':
																			$postType = $tag->name;
																			$icone = 'icon-day';
																			break 2;
																		case 'evento':
																			$postType = $tag->name;
																			$icone = 'icon-day';
																			break 2;
																		case 'documento':
																			$postType = $tag->name;
																			$icone = 'icon-page';
																			break 2;
																		default:
																			$postType = 'not&iacute;cia';
																			$icone = 'icon-page';
																			break;
																	} 
																}
															}
														?>
														<span class="summary-view-icon">
															<i class="<?php echo $icone ?>"></i>
															<?php  echo $postType;?>
														</span>
														<span class="visualClear"></span>
													</span>
														
												 <br/> <br/>
									<?php									
											}
										?>
										</div>
									<?php
									} 
								}
								else 
								{ 
									// no posts found ?>
									<div><p class="tile-description" style="padding-bottom:20px;">Sem documentos desse assunto.</p></div>
								<?php 
								}
									// Restore original Post Data
									wp_reset_postdata();
								?>
								<?php pagination(); ?>
								<div class="visualClear"><!-- --></div>               
			</div>
		</div></div>
<?php }
// ----------------------------------------- fim de audio ?>



<?php // ----------------------------------------- fotografias 
if ($thisCatSlug == 'banco-de-imagens') {
		$tipo= 'especial';
		?>
		<div class="row" data-layout-type="row">
			<div id='flickrSETs' class="cell width-10 position-0" data-panel="">
				<div><div id='logoflickr' onclick='openFlickr();'></div><div class='outstanding-header'><h2 class='outstanding-title'><a href='http://www.flickr.com/photos/114789156@N08/' target='_blank'>Flickr do CNPD</a></h2></div><div class='visualClear'><!-- --></div></div>
				<div id="carrega" align="center"><img src="<?php bloginfo('template_directory'); ?>/img/load.gif" /></div>
			</div>
			<div class='visualClear'><!-- --></div>
		</div>
<?php }

// ----------------------------------------- fim de fotografias ?>
       
<?php // ----------------------------------------- lista de programas 
						if ($tipo == 'principal') {
								//$subCategories = get_categories( 'child_of='. $thisCatID );
								$args = array(
									'child_of'                 => $thisCatID,
									'orderby'                  => 'name',
									'order'                    => 'ASC',
									'hide_empty'			   => 0
								); 
								$subCategories = get_categories($args); 								
								if($subCategories){
?>

							<div class="visualClear"><!-- --></div>
							<div class="cell width-10 position-0 " data-panel="">
								<div class="tile <?php echo $estilo; ?>" data-tile="" id="">
									<div class="outstanding-header"  <?php if($cor_categoria){ echo 'style="border-top-color:' . $cor_categoria . ';"';} ?>>      		
										<h2 class="outstanding-title" <?php if($cor_categoria){ echo 'style="border-color:' . $cor_categoria . ';color:' . $cor_categoria . ';"';} ?>>Projetos</h2>
									</div>
								</div>
							</div>
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
									<div>
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
							<div class="tile fio-separador"><!-- --></div>
<?php 						}
						} // fim do if principal

// ----------------------------------------- fim da lista de programas ?>

                    
<?php // ----------------------------------------- lista de noticias 
	if ($tipo != 'especial'){
?>

                        <?php // quadro com lista de notícias da categoria ?>
                            <?php 
							// WP_Query arguments
							$args = array (
								'category_name'          => $thisCatSlug,
								'pagination'             => true,
								'posts_per_page'         => '3',
								'paged'					 => $paged,
								'tag__not_in' => array( 513, 381 )
							);
							// The Query
							$query = new WP_Query( $args );
							// The Loop
							if ( $query->have_posts() ) {?>
								<div class="visualClear"><!-- --></div>
									<div class="cell width-10 position-0 ">
											<div>
											<div class="tile <?php echo $estilo; ?>"  id="">
												<div class="outstanding-header"  <?php if($cor_categoria){ echo 'style="border-top-color:' . $cor_categoria . ';"';} ?>>    		
														<h2 class="outstanding-title"<?php if($cor_categoria){ echo 'style="border-color:' . $cor_categoria . ';color:' . $cor_categoria . ';"';} ?>>Not&iacute;cias do assunto</h2>
												</div>
											</div>
										</div>
									</div>							
                                    <div class="visualClear"><!-- --></div>
								<?php while ( $query->have_posts() ) {
									$query->the_post(); 
									// aqui formata toda a lista ?>
                                    <div class="row" data-layout-type="row">
										<div class="cell width-10 position-0 " data-panel="">
											<div class="tile fio-separador">
												<p><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
											</div>
										</div>
                                    </div>
									<!--
                                    <div class="row" data-layout-type="row">
										<div class="cell width-10 position-0 " data-panel="">
											<div>
												<div class="tile fio-separador" data-tile="">
													<div class="outstanding-header">
													</div>
												</div>
											</div>
										</div>
									</div>
									-->
								<?php } ?>
	                                <div class="visualClear"><!-- --></div>
                                    <div class="cell width-10 position-0 " data-panel="">
			                           <div class="tile <?php echo $estilo; ?>" >
			                               <div class="outstanding-header"  <?php if($cor_categoria){ echo 'style="border-top-color:' . $cor_categoria . ';"';} ?>>
			                                   <a class="outstanding-link" href="<?php echo $thisCatLink.'?listar=true'; ?>">Veja todas <img <?php if($cor_categoria){ echo 'style="background-color:' . $cor_categoria . ';"';} ?> src="<?php bloginfo('template_directory')?>/img/seta_transparente.png" height="20px" width="20px"></a>
			                                </div>
			                           </div>
	                           		</div>
							<?php } else {
								// nada feito
								//echo '<div class="visualClear"><!-- --></div><div class="row" data-layout-type="row"><div class="cell width-10 position-0 " data-panel=""><div class="tile fio-separador"><p>Sem noc&iacute;cia recente desse assunto.</p></div></div></div><div class="visualClear"><!-- --></div>';
							}
							// Restore original Post Data
							wp_reset_postdata();
                            ?>
<?php // ----------------------------------------- fim da lista de noticias ?>                  
                        
<!-- midia social                         <div class="cell width-5 position-10" >
                        <?php // include (TEMPLATEPATH . '/media.php'); ?>
                        </div> -->
                      </div> <?php // fecha row de noticias ?>
<?php // ----------------------------------------- Quadrados de documentos relacionados ?>   
						<div class="row" data-layout-type="row">
                        <!-- Abre o quadrado de documentos -->
		
                        <?php 	
								wp_reset_query();
								// WP_Query arguments
								$args = array (
									'category_name'          => $thisCatSlug,
									'tag'               	 => 'documento',
									'posts_per_page'         => '1',
									'paged'					 => $paged,
									'pagination'			 => true
								);
								// The Query
								$query = new WP_Query( $args );
								// The Loop
								$primeiro = true;
								if ( $query->have_posts() ) {
									while ( $query->have_posts() ) {
										$query->the_post();
										//o que sai debtro do quadrado
										?>
									<div class="cell width-5 position-0">
									<div><div class="tile <?php echo $estilo; ?>"><div class="outstanding-header"  <?php if($cor_categoria){ echo 'style="border-top-color:' . $cor_categoria . ';"';} ?>>
					                           <h2 class="outstanding-title"<?php if($cor_categoria){ echo 'style="border-color:' . $cor_categoria . ';color:' . $cor_categoria . ';"';} ?>>Documentos</h2>
					                       </div>
					                   </div>
					               </div>										
                                    <div>
					                   <div class="tile <?php if($primeiro){
											echo '--NOVALUE--';
										}else{
											echo 'fio-separador';
											};?>
                                        ">
                                        	<div>
                                            	<?php $chapeu = get_post_meta($post->ID, 'chapeu', $single = true); ?>
					                           <p class="tile-subtitle" <?php if($cor_categoria){ echo 'style="color:' . $cor_categoria . ';"';} ?>><?php echo $chapeu; ?></p>
                                            	<h3>
												   <a href="<?php the_permalink() ?>"><?php the_truncate_title(65,get_the_title($post->ID)); ?></a>
					                           </h3>
											   
                                                <p class="tile-description">
													<?php $resumo = apply_filters($post->post_content, substr(strip_tags(get_the_content()), 0, 120)).'...'; ?>
													<p class="tile-description"><?php echo $resumo ?></p>
												</p>
					                           <div class="visualClear"><!-- --></div>
					                       </div>
					                   </div>
					               </div>
							 <div>
			                           <div class="tile <?php echo $estilo; ?>" >
			                               <div class="outstanding-header"  <?php if($cor_categoria){ echo 'style="border-top-color:' . $cor_categoria . ';"';} ?>>
			                                   <a class="outstanding-link" href="<?php echo $thisCatLink.'?info=documento'; ?>">Veja todos <img <?php if($cor_categoria){ echo 'style="background-color:' . $cor_categoria . ';"';} ?> src="<?php bloginfo('template_directory')?>/img/seta_transparente.png" height="20px" width="20px"></a>
			                                </div>
			                           </div>
			                       </div>
                            </div>
								   <?php
									$primeiro = false;
									$posicaoDoQuadradoInfograficos = 5;
									//Quando não houver documentos o quadrado de documentos não será mostrado e o quadrado Infograficos aparecerá na posção 0,
									//caso contrário na posição 5.
									}
								} else { 
									// no posts found 
									$posicaoDoQuadradoInfograficos = 0;
									?>
                                    <!-- <div><p class="tile-description" style="padding-bottom:20px;">Sem documentos desse assunto.</p></div>-->
								<?php }
								// Restore original Post Data
								wp_reset_postdata();
							?>

                            <?php // fecha quadrado ?>
                            <?php // abre quadrado de infográficos ?>
		
                        <?php 	
								wp_reset_query();
								// WP_Query arguments
								$args = array (
									'category_name'         => $thisCatSlug,
									'tag'               	=> 'infograficos',
									'posts_per_page'        => '2',
									'pagination'			=>true,
									'paged'					=> $paged
								);
								// The Query
								$query = new WP_Query( $args );
								// The Loop
								$primeiro = true;
								if ( $query->have_posts() ) {
									while ( $query->have_posts() ) {
										$query->the_post();
										//o que sai debtro do quadrado
										?>
									<div class="cell width-5 position-<?php echo $posicaoDoQuadradoInfograficos ?>">
										<div>
											<div class="tile <?php echo $estilo; ?>">
												<div class="outstanding-header"  <?php if($cor_categoria){ echo 'style="border-top-color:' . $cor_categoria . ';"';} ?>>
												   <h2 class="outstanding-title" <?php if($cor_categoria){ echo 'style="border-color:' . $cor_categoria . ';color:' . $cor_categoria . ';"';} ?>>Infogr&aacute;ficos</h2>
											   </div>
										   </div>
									   </div>										
                                    <div>
					                   <div class="tile <?php if($primeiro){
											echo '--NOVALUE--';
										}else{
											echo 'fio-separador';
											};?>
                                        ">
                                        	<div>
                                            	<?php $chapeu = get_post_meta($post->ID, 'chapeu', $single = true); ?>
					                           <p class="tile-subtitle" <?php if($cor_categoria){ echo 'style="color:' . $cor_categoria . ';"';} ?>><?php echo $chapeu; ?></p>
                                            	<h3>
					                               <a href="<?php the_permalink() ?>"><?php the_truncate_title(); ?></a>
					                           </h3>
                                                <p class="tile-description"><?php // echo apply_filters($post->post_content, substr(get_the_content(), 0, 100)).'...'; ?></p>
					                           <div class="visualClear"><!-- --></div>
					                       </div>
					                   </div>
					               </div>
								 <div>
									<div class="tile <?php echo $estilo; ?>" >
											   <div class="outstanding-header"  <?php if($cor_categoria){ echo 'style="border-top-color:' . $cor_categoria . ';"';} ?>>
												   <a class="outstanding-link" href="<?php echo $thisCatLink.'?info=infograficos'; ?>">Veja todos <img <?php if($cor_categoria){ echo 'style="background-color:' . $cor_categoria . ';"';} ?> src="<?php bloginfo('template_directory')?>/img/seta_transparente.png" height="20px" width="20px"></a>
												</div>
										   </div>
									   </div>
								</div>								   
                                    <?php
									$primeiro = false;
									}
								} else { 
									// no posts found ?>
                                    <!--<div><p class="tile-description" style="padding-bottom:20px;">Sem dados desse assunto.</p></div>-->
								<?php }
								
								// Restore original Post Data
								wp_reset_postdata();
							?>

                            <?php // fecha quadrado de infograficos ?>
                        <?php // abre quadrado de dados estaísticos 
						/*
						?>
                        <div class="cell width-5 position-5">
									<div>
                                    	<div class="tile <?php echo $thisCatSlug; ?>">
                                    		<div class="outstanding-header">
					                           <h2 class="outstanding-title">Dados Estat&iacute;sticos</h2>
					                       </div>
					                   </div>
					               </div>		
                        <?php 	
								wp_reset_query();
								// WP_Query arguments
								$args = array (
									'category_name'          => $thisCatSlug,
									'tag'               => 'dados-estatisticos',
									'posts_per_page'         => '2'
								);
								
								// The Query
								$query = new WP_Query( $args );
								
								// The Loop
								$primeiro = true;
								if ( $query->have_posts() ) {
									while ( $query->have_posts() ) {
										$query->the_post();
										//o que sai debtro do quadrado
										?>
                                    <div>
					                   <div class="tile <?php if($primeiro){
											echo '--NOVALUE--';
										}else{
											echo 'fio-separador';
											};?>
                                        ">
                                        	<div>
                                            	<?php $chapeu = get_post_meta($post->ID, 'chapeu', $single = true); ?>
					                           <p class="tile-subtitle"><?php echo $chapeu; ?></p>
                                            	<h3>
					                               <a href="<?php the_permalink() ?>"><?php the_truncate_title(65,get_the_title($post->ID)); ?></a>
					                           </h3>
                                                <p class="tile-description"><?php // echo apply_filters($post->post_content, substr(get_the_content(), 0, 100)).'...'; ?></p>
					                           <div class="visualClear"><!-- --></div>
					                       </div>
					                   </div>
					               </div>
                                    <?php
									$primeiro = false;
									}
								} else { 
									// no posts found ?>
                                    <div><p class="tile-description" style="padding-bottom:20px;">Sem dados desse assunto.</p></div>
								<?php }
								
								// Restore original Post Data
								wp_reset_postdata();
							?>
							 <div>
                             	<div class="tile <?php echo $thisCatSlug; ?>" >
			                               <div class="outstanding-header">
			                                   <a class="outstanding-link" href="<?php echo $thisCatLink.'?info=dados-estatisticos'; ?>">Veja todos <img src=<?php echo trim(bloginfo('url')) . "/img/seta_transparente.png" ?> height="20px" width="20px"></a>
			                                </div>
			                           </div>
			                       </div>
                            </div>
                            <?php // fecha quadrado de dados estatisticos 
							*/
							?>
							</div> <?php // fecha itens da categoria?>
						</div>
<?php }; // fecha a condicional das categorias nao especiais ?>
				<!-- </ul>-->
					</div>
                    <?php
					//fechando os conteúdos diferenciados
};
?>

			</div> <!-- content -->
		</div>
<?php get_footer(); ?>