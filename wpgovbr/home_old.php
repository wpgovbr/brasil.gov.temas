<?php get_header(); ?>
        <div id="portal-columns" class="row">
        <?php include (TEMPLATEPATH . '/navigation.php'); ?>
	
<!-- Conteudo -->
            <div id="portal-column-content" class="cell width-3:4 position-1:4">
                <a name="acontent" id="acontent"></a>
                <div class="">
                    <dl class="portalMessage info" id="kssPortalMessage" style="display:none"><dt>Info</dt>
                        <dd></dd>
                    </dl>

              
		      <div id="content">
                        <div class="row" data-layout-type="row">
                            <div class="cell width-15 position-0">
                                <div>

<?php //------------------------------------------------- SlideShow --------------------------------------------------------------- ?>								

									<div class="slideshow_container slideshow_container_slideshow-jquery-image-gallery-custom-styles_1" style="height: 300px; max-width: 712px; width: 712px;" data-session-id="0" data-style-name="slideshow-jquery-image-gallery-custom-styles_1" data-style-version="1388677309">
										<div class="slideshow_controlPanel slideshow_transparent" style="display: none;"><ul><li class="slideshow_pause"></li></ul></div>
										<div class="slideshow_button slideshow_previous slideshow_transparent" style="display: block;"></div>
										<div class="slideshow_button slideshow_next slideshow_transparent" style="display: block;"></div>
										<div class="slideshow_pagination" style="display: none;"><div class="slideshow_pagination_center"><ul><li class="slideshow_transparent slideshow_currentView"><span style="display: none;">0</span></li><li class="slideshow_transparent"><span style="display: none;">1</span></li><li class="slideshow_transparent"><span style="display: none;">2</span></li></ul></div></div>
										<div class="slideshow_content" style="width: 712px; height: 300px;">
										<?php
											wp_reset_query(); 
											wp_reset_postdata();
											$args = array('category_name' => 'destaque',
													  'ignore_sticky_posts' => 1,
													  'post_status' => 'publish',
													  'posts_per_page' => 20
													 );
											$Destaques= new WP_Query($args);	
											$count = 0;											
											while ($Destaques->have_posts()) : $Destaques->the_post(); 

													$imagem = "";
													$imagem = trim(get_post_meta(get_the_ID(), "preview", true));
													if($imagem === "")
													{
														continue;
													}
													$count = $count+1;
													if($count > 4)
													{
														break;
													}
												?> 
												<div class="slideshow_view slideshow_currentView" style="width: 712px; height: 300px; display: block; top: 0px; left: 0px;">
													<div class="slideshow_slide slideshow_slide_image" style="margin-left: 0px; margin-right: 0px; width: 712px; height: 300px;">
														<a target="_self" href="<?php the_permalink()?>">
															<img src="<?php echo trim(bloginfo('url')) . "/" . $imagem ?>" alt="<?php the_truncate_title() ?>" width="712" height="350" style="margin-top: -25px; margin-left: 0px; width: 712px; height: 350px;">
														</a>
														<div class="slideshow_description slideshow_transparent" style="display: block; position: absolute; top: 300px;">
															<h2><a href="<?php the_permalink()?>" target="_self"><?php the_truncate_title() ?></a></h2>
														</div>
													</div>

													<div style="clear: both;"></div>
												</div>

											<?php
												endwhile;
												wp_reset_query(); 
												wp_reset_postdata();
											?>
										</div>
									</div>		
<?php //------------------------------------------------- SlideShow --------------------------------------------------------------- ?>								
                                </div>
<?php //------------------------------------------------- Destaque do Dia --------------------------------------------------------- ?>
                                <div>
                                    <div class="tile --NOVALUE--" >
                                        <div>
										<?php
											wp_reset_query(); 
											wp_reset_postdata();


											$Category_ID = get_category_by_slug('destaque');
											$args = array('cat' => $Category_ID->term_id,
													  'ignore_sticky_posts' => 1,
													  'post_status' => 'publish',
													  'posts_per_page' => 1
													 );	
	
											$DestaqueDoDia= new WP_Query($args);	
											$count = 0;											
											while ($Destaques->have_posts()) : $Destaques->the_post(); 
													$count = $count+1;
													if($count > 1)
													{
														break;
													}
												?> 
													<h1>
														<a target="_self" href="<?php the_permalink()?>">
															 <?php echo get_the_title(); ?> 
														</a>
													</h1>
													<?php $resumo = apply_filters($post->post_content, substr(get_the_content(), 0, 300)).'...'; ?>
													<p class="tile-description"><?php echo $resumo ?></p>
											<?php
												endwhile;
												wp_reset_query(); 
												wp_reset_postdata();
											?>
                                            <div class="visualClear"><!-- --></div>
                                        </div>
                                    </div>
                                </div>
<?php //------------------------------------------------- Destaque do Dia --------------------------------------------------------- ?>								
                            </div>
                        </div>	
						 <div class="row" data-layout-type="row">
					    <!-- Três notícias DESTAQUE -->
						<!--<ul id="small_features" class="clearfix destaque">-->
							<?php 	
								wp_reset_query();
								$cat_ID = get_cat_ID( 'Assuntos' ) ;
								$args = array(
									'child_of'                 => $cat_ID,
									'orderby'                  => 'name',
									'order'                    => 'ASC',
									'hide_empty'			   => 0
								); 
								$subCategoriasAssunto = get_categories($args); 
								$subCategoriasAssunto_IDs = array();
								
								foreach ($subCategoriasAssunto as $cat) {
									$arrCategoriasAssunto_IDs[] = $cat->term_id;
								}
								$strCategoriasAssunto_IDs = implode ("|", $arrCategoriasAssunto_IDs);
								$strCategoriasAssunto_IDs = '|' . $strCategoriasAssunto_IDs . '|';
								$args = array('category_name' => 'assuntos',
									          'ignore_sticky_posts' => 1,
									          'post_status' => 'publish',
									          'posts_per_page' => 30
								    	     );
						    	$ultimosPosts= new WP_Query($args);
								$categoriaMostrada =array();
								$postMostrado=array();
								$count = 0;
								while ($ultimosPosts->have_posts()) : $ultimosPosts->the_post(); 
							       	$categories = get_the_category();
							       	$separator = ' ';
									$CategoryName = '';
									$slug = '';
									if($categories)
									{
										foreach(get_the_category() as $category) 
										{
											$strID = '|' . $category->term_id . '|';
											$pos = strpos($strCategoriasAssunto_IDs , $strID);
											if ($pos !== false) 
											{
												if(in_array($category->term_id,$categoriaMostrada))
												{
													continue;
												}						
												$CategoryName = $category->name;
												$slug = $category->slug;
												$categoryLink = get_category_link( $category->term_id);
												$categoriaMostrada[] = $category->term_id;
											}
											else
											{
												continue;
											}
										}
									} 
								if($CategoryName ==='')
								{
									continue;
								}
								else
								{
									$count = $count+1;
									$postMostrado[] = get_the_ID();
								}
								if($count > 3)
								{
									break;
								}	
								switch ($count) {
											    case 1:
											        $numColuna = 0;
											        break;
											    case 2:
											         $numColuna = 5;
											        break;
											    case 3:
											        $numColuna = 10;
											        break;
												}
								?>		
					<!--			<div class="titulo_destaque">
										<h3 ><a href="<?php echo $categoryLink;?>"><?php echo $CategoryName;?> </a></h3>
									</div>
					-->
					 			<div class="cell width-5 position-<?php echo $numColuna ?>" data-panel="">
					  				<div>
					                    <div>
					                        <div> <!-- <div class="outstanding-header"> -->
					                            <p class="tile-subtitle"><?php echo $CategoryName;?></p>
					                        </div>
					                    </div>
					                </div>				
					                <div>
					                    <div class="tile --NOVALUE--">
					                        <div>
												<?php 
														$imagem = "";
														if ( has_post_thumbnail() ) 
														{ 
															$imagem = trim(the_post_thumbnail(array(230,80))); 
														}
														else 
														{
															//trim(bloginfo('url')) . 
															$imagem = trim(get_post_meta(get_the_ID(), "destaque", true));
															if($imagem === "")
															{
																$imagem = trim(get_post_meta(get_the_ID(), "preview", true));
															}
														}
														if($imagem !== "")
														{
													?> 
					                            <a class="imag" href="<?php the_permalink() ?>">
					                                <img alt="<?php the_truncate_title(); ?>" src="<?php echo $imagem ?>" width="220" height="130" class="left" style=" height: 105px;"></img>
					                            </a>
												<?php } ?>
					                            <h3>
					                                <a href="<?php the_permalink() ?>"><?php the_truncate_title(); ?></a>
					                            </h3>
					                            <div class="visualClear"><!-- --></div>
					                        </div>
					                    </div>
					                </div>
								</div>
							<!--</li>-->
							<?php 	endwhile; ?>
						  <!--</ul>-->
						</div>
 <div class="row" data-layout-type="row">
						 <div class="cell width-10 position-0" >
						<div class="canal-youtube">
							<div id="playerContainer" class="canal-youtube">
								<object id="player"></object>
							</div>							
							<div>
						            	<div class="tile azul" >
						                    	<div class="outstanding-header">
						                           	<a class="outstanding-link" target='blank' href="http://www.youtube.com/user/saepr">ACESSE O CANAL</a>
						              	</div>
								</div>
				              	</div>
						</div>
						</div>
						
						
						 <div class="cell width-5 position-10" >
							<?php include (TEMPLATEPATH . '/media.php'); ?>
							</div>
</div>
						<!--<ul id="small_features" class="clearfix assuntos">-->
						<!-- Demais categorias -->
						<?php
							$count = 0;
							echo '<div class="row" data-layout-type="row">';
							while ($ultimosPosts->have_posts()) : $ultimosPosts->the_post(); 
								if(in_array(get_the_ID(),$postMostrado)){
									continue;
								}
						       	$categories = get_the_category();
						       	$separator = ' ';
								$CategoryName = '';
								$slug = '';
								if($categories)
								{
									foreach($categories as $category) 
									{
										$strID = '|' . $category->term_id . '|';
										$pos = strpos($strCategoriasAssunto_IDs , $strID); //Verifica se a categoria está entre as Categorias da Categoria Assunto.
										if ($pos !== false) 
										{
											//Verifica se a categoria já foi mostrada. Caso positivo, pula para a próxima categoria desse Post, caso ele esteja em várias categorias.
											$strCategoriasMostradas = implode ("|", $categoriaMostrada);
											$strCategoriasMostradas = '|' . $strCategoriasMostradas . '|';
											$posCatMostrada = strpos($strCategoriasMostradas , $strID);
											if ($posCatMostrada !== false) 
											{
												continue;
											}
											/*
											A dunção in_array() tem falhado algumas vezes. Esse é um problema recorrente, conforme aparece em muitos foruns 
											na Internet. Ela foi substituída pelo código acima, usando strpos.
											if(in_array($category->term_id,$categoriaMostrada))
											{
												continue;
											}
											*/						
											$CategoryName 		 = $category->name;
											$slug 				 = $category->slug;
				                        	$categoryLink 		 = get_category_link( $category->term_id);
											$categoriaMostrada[] = $category->term_id;
										} 
										else
										{
											continue;
										}
									}
								}
								else
								{
									continue;
								}
								if($CategoryName ==='')
								{
									continue;
								}
								else
								{
									$count = $count+1;
									$postMostrado[] = get_the_ID();
								}
								if($count > 6)
								{
									break;
								}	
								switch ($count) {
											    case 1:
											    case 2:
											    case 3:
											        $numColuna = 0;
											        break;
											    case 4:
											    case 5:
											    case 6:
											         $numColuna = 5;
											        break;
												}
								?>		
					<!--			<div class="titulo_destaque">
										<h3><a href="<?php echo $categoryLink;?>"><?php echo $CategoryName;?> </a></h3>
									</div>
					-->
								<?php switch ($count) {
									case 1:
									case 4:
										echo '<div class="cell width-5 position-' . $numColuna . '">';
										break;
								} ?>
					  				<div>
					                    <div class="tile <?php echo $slug;?>">
					                        <div class="outstanding-header">
					                            <h2 class="outstanding-title">
					                            	<?php echo $CategoryName; ?> 
					                            </h2>
					                        </div>
					                    </div>
					                </div>				
					                <div>
					                    <div class="tile <?php echo $slug;?>">
					                        <div>
					                            <?php $chapeu = get_post_meta($post->ID, 'chapeu', $single = true); ?>
					                            <p class="tile-subtitle "><?php echo $chapeu; ?> &nbsp;</p>
					                            <h3>
					                                <a href="<?php the_permalink() ?>"><?php the_truncate_title(); ?></a>
					                            </h3>
                                                <?php $resumo = apply_filters($post->post_content, substr(get_the_content(), 0, 100)).'...'; ?>
                                                  <p class="tile-description"><?php echo $resumo ?></p>
					                            <div class="visualClear"><!-- --></div>
					                        </div>
					                    </div>
					                </div>
			                        <div>
			                            <div class="tile <?php echo $slug;?>" >
			                                <div class="outstanding-header">
			                                    <a class="outstanding-link" href="<?php echo $categoryLink;?>">Saiba mais</a>
			                                 </div>
			                            </div>
			                        </div>
								<?php switch ($count) {
									case 3:
									case 6:
										echo '</div>';
										break;
								}
								?>
						<!--</li>-->
						<?php 	endwhile;?>
			<div class="cell width-5 position-10">
			   <?php include (TEMPLATEPATH . '/news.php'); ?>
			</div>
			</div>
				<!-- </ul>-->
					</div>
					</div> <!-- content -->
					</div> <!-- novo content, antes before demais cats -->
				</div>
				</div>
	
</div>
<?php get_footer(); ?>
