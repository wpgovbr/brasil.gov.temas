<?php /* Template Name: mapa-do-site */ ?>
<?php get_header(); ?>
<div id="portal-columns" class="row">
	<div id="portal-column-content" class="cell width-1:2 position-1:4">
		<div id="content">
			<div class="tileItem visualIEFloatFix tile-image">
				<div class="tileContent" style="border-bottom:1px solid #dfdfdf; margin-bottom: 5px;">	
					<h1 class="tileHeadline">
						Mapa do site
					</h1>
					<div id="mapa-do-site">
						
							
							
						<?php wp_nav_menu( array( 	'menu' 				=> 'assuntos',
													'theme_location' 	=> 'assuntos', 
													'menu_class' 		=> '',
													'container_class' 	=> '',
													'depth'				=> 0, 
													'container'      	=> '',
													'items_wrap'		=>'<dl id="%1$s" class="%2$s portletNavigationTree"><dt class="portletHeader">Assuntos</dt>%3$s</dl>',
													'walker' 			=> new CSS_Menu_Maker_Walker
												) ); ?>

						<?php wp_nav_menu( array( 	'menu' 				=> 'sobre',
													'theme_location' 	=> 'sobre', 
													'menu_class' 		=> '',
													'container_class' 	=> '',
													'depth'				=> 0, 
													'container'      	=> '',
													'items_wrap'		=>'<dl id="%1$s" class="%2$s portletNavigationTree"><dt class="portletHeader">Sobre</dt>%3$s</dl>',
													'walker' 			=> new CSS_Menu_Maker_Walker
												) ); ?>												
						
						<dl class='portletNavigationTree'>
							<dt class="portletHeader">CENTRAIS DE CONTE&Uacute;DO</dt>
								<dd>
									<a href="<?php bloginfo('url'); ?>/category/documentos/?info=documento")>Biblioteca</a>
								</dd>
								<dd >
									<a href="<?php bloginfo('url'); ?>/category/imprensa/banco-de-audios/">&Aacute;udios</a>
								</dd>
								<dd >
									<a href="<?php bloginfo('url'); ?>/category/imprensa/banco-de-imagens/">Imagens</a>
								</dd>
								<dd >
									<a href="<?php bloginfo('url'); ?>/category/imprensa/videos-imprensa/">V&iacute;deos</a>
								</dd>	
						</dl>
						
						<?php wp_nav_menu( array( 	'menu' 				=> 'servicos',
												'theme_location' 	=> 'servicos', 
												'menu_class' 		=> '',
												'container_class' 	=> '',
												'depth'				=> 0, 
												'container'      	=> '',
												'items_wrap'		=>'<dl id="%1$s" class="%2$s portletNavigationTree"><dt class="portletHeader">Servi&ccedil;os</dt>%3$s</dl>',
												'walker' 			=> new CSS_Menu_Maker_Walker
											) ); ?>						

						<?php wp_nav_menu( array( 	'menu' 				=> 'redes_sociais',
												'theme_location' 	=> 'redes_sociais', 
												'menu_class' 		=> '',
												'container_class' 	=> '',
												'depth'				=> 0, 
												'container'      	=> '',
												'items_wrap'		=>'<dl id="%1$s" class="%2$s portletNavigationTree"><dt class="portletHeader">Redes Sociais</dt>%3$s</dl>',
												'walker' 			=> new CSS_Menu_Maker_Walker
											) ); ?>							
						<?php wp_nav_menu( array( 	'menu' 				=> 'rss',
												'theme_location' 	=> 'rss', 
												'menu_class' 		=> '',
												'container_class' 	=> '',
												'depth'				=> 0, 
												'container'      	=> '',
												'items_wrap'		=>'<dl id="%1$s" class="%2$s portletNavigationTree"><dt class="portletHeader">RSS</dt>%3$s</dl>',
												'walker' 			=> new CSS_Menu_Maker_Walker
											) ); ?>	
						
							<?php wp_nav_menu( array( 	'menu' 		=> 'sobre_o_site',
												'theme_location' 	=> 'sobre_o_site', 
												'menu_class' 		=> '',
												'container_class' 	=> '',
												'depth'				=> 0, 
												'container'      	=> '',
												'items_wrap'		=>'<dl id="%1$s" class="%2$s portletNavigationTree"><dt class="portletHeader">Sobre o Site</dt>%3$s</dl>',
												'walker' 			=> new CSS_Menu_Maker_Walker
											) ); ?>						
							
							
					
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>	