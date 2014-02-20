<!--	</section>-->

<?php if ($_SESSION['deviceType'] != "phone") { ?>
<!--<footer id="footer" class="clearfix hide_mobile" name="rodape"> -->
<div id="footer" role="contentinfo">
 	<a name="afooter" id="afooter"></a>
    	<div id="doormat-container" class="columns-4">
	        <div class="doormatColumn column-0">
	            <dl class="doormatSection"><dt class="doormatSectionHeader">Assuntos</dt>
	            	<?php  
				$menuParameters = array( 	'menu' => 'assuntos',
								'theme_location' => 'assuntos' ,
								'depth'=> 1,'container'=> '<dd>',
								'items_wrap' => '%3$s',
								'echo'=> false,
								'fallback_cb' => false,
								'before' => '<dd>',
								'after'=>'</dd>');
				echo strip_tags( wp_nav_menu($menuParameters), '<dd><a>');?>
	            </dl>
	        </div>

	        <div class="doormatColumn column-1">
	            <dl class="doormatSection"><dt class="doormatSectionHeader">Servi&ccedil;os</dt>
	            	<?php  

				$menuParameters = array( 	'menu' => 'servicos',
								'theme_location' => 'servicos' ,
								'depth'=> 1,'container'=> '<dd>',
								'items_wrap' => '%3$s',
								'echo'=> false,
								'fallback_cb' => false,
								'before' => '<dd>',
								'after'=>'</dd>');
				echo strip_tags( wp_nav_menu($menuParameters), '<dd><a>');?>

	            </dl>
	        </div>

	        <div class="doormatColumn column-2">
	            <dl class="doormatSection"><dt class="doormatSectionHeader">Redes Sociais</dt>
	            	<?php  

				$menuParameters = array( 	'menu' => 'redes_sociais',
								'theme_location' => 'redes_sociais' ,
								'depth'=> 1,'container'=> '<dd>',
								'items_wrap' => '%3$s',
								'echo'=> false,
								'fallback_cb' => false,
								'before' => '<dd>',
								'after'=>'</dd>');
				echo strip_tags( wp_nav_menu($menuParameters), '<dd><a>');?>
	            </dl>
	        </div>

	        <div class="doormatColumn column-3">
	            <dl class="doormatSection"><dt class="doormatSectionHeader">RSS</dt>
	            
			<?php 
				$menuParameters = array( 	'menu' => 'rss',
								'theme_location' => 'rss' ,
								'depth'=> 1,'container'=> '<dd>',
								'items_wrap' => '%3$s',
								'echo'=> false,
								'fallback_cb' => false,
								'before' => '<dd>',
								'after'=>'</dd>');
				echo strip_tags( wp_nav_menu($menuParameters), '<dd><a>');?>

	            </dl>
	            <dl class="doormatSection"><dt class="doormatSectionHeader">Sobre o Site</dt>
			<?php 
				$menuParameters = array( 	'menu' => 'sobre_o_site',
								'theme_location' => 'sobre_o_site' ,
								'depth'=> 1,'container'=> '<dd>',
								'items_wrap' => '%3$s',
								'echo'=> false,
								'fallback_cb' => false,
								'before' => '<dd>',
								'after'=>'</dd>');
				echo strip_tags( wp_nav_menu($menuParameters), '<dd><a>');?>
				
	            </dl>

	        </div>
		</div>
    
    <div class="clear"></div>
    <div class="footer-logos">
        <div>
            <a href="http://www.acessoainformacao.gov.br/" class="logo-acesso">
                <img src="<?php bloginfo('template_directory'); ?>/img/acesso-a-infornacao.png" alt="Acesso a Informação"></a>
            <a href="http://www.brasil.gov.br/" class="logo-brasil">
                <img src="<?php bloginfo('template_directory'); ?>/img/brasil.png" alt="Brasil - Governo Federal"></a>
        </div>
    </div>


</div>	
	<div id="extra-footer">
	    <p>
	    Desenvolvido com o CMS de c&oacute;digo aberto
	    WordPress
	    </p>
	</div>
<?php } ?>