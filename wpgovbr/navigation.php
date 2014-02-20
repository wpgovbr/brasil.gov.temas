<?php
if ( is_home() ) {
    // nada na home, em breve, destaques
	$MenuLevel = 1;
} else {
    // Breadcumbs para as demais todas
	//breadcrumbs();
	?>
<div id="portal-breadcrumbs"
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<?php
	$MenuLevel = 0;
}
?>

<div id="navigation">
                <a name="anavigation" id="anavigation"></a>
                <span class="menuTrigger">Menu</span>
                <div id="portal-column-one" class="cell width-1:4 position-0" >
                            <div class="portletWrapper" id="portletwrapper">
                                <dl class="portlet portletNavigationTree">
                                    <dt class="portletHeader">
                                        <span class="portletTopLeft"></span>
                                        <span class="tile ui-droppable">Assuntos</span>
                                        <span class="portletTopRight"></span>
                                    </dt>

					<!--<h3 class="list_header">ASSUNTOS</h3>-->
                                    <dd class="portletItem lastItem">
											<?php wp_nav_menu( array( 'menu' => 'assuntos','theme_location' => 'assuntos', 'menu_class' => 'navTree navTreeLevel0','container_class' => 'navTreeItem visualNoMarker navTreeFolderish','depth'=> $MenuLevel, 'before' => '<span>','after'=>'</span>' ) ); ?>
                                        	<span class="portletBottomLeft"></span>
                                        	<span class="portletBottomRight"></span>
                                    </dd>
                                </dl>
                            </div> <!-- portletwrapper -->
							<div class="portletWrapper" >
                                <dl class="portlet portletNavigationTree " >
                                    <dt class="portletHeader">
                                        <span class="portletTopLeft"></span>
                                       <span class="tile ui-droppable">Sobre</span>
                                        <span class="portletTopRight"></span>
                                    </dt>

                                    <dd class="portletItem lastItem">
                                    	<ul class="navTree navTreeLevel0">
											<?php wp_nav_menu( array( 'sobre' => 'assuntos','theme_location' => 'sobre', 'menu_class' => 'navTree navTreeLevel0','container_class' => 'navTreeItem visualNoMarker navTreeFolderish','depth'=> $MenuLevel, 'before' => '<span>','after'=>'</span>' ) ); ?>
										</ul>
                                        <span class="portletBottomLeft"></span>
                                        <span class="portletBottomRight"></span>
                                    </dd>
                                </dl>
                            </div>
				<div class="portletWrapper" >
                                <dl class="portlet portletNavigationTree portletStaticText" >
                                    <dt class="portletHeader">
                                        <span class="portletTopLeft"></span>
                                        <span class="tile ui-droppable">CENTRAIS DE CONTE&Uacute;DO</span>
                                        <span class="portletTopRight"></span>
                                    </dt>
                                    <dd class="portletItem lastItem">
                                        <ul class="navTree navTreeLevel0">
											<?php //wp_nav_menu( array( 'centrais_conteudo' => 'assuntos','theme_location' => 'centrais_conteudo', 'menu_class' => 'navTree navTreeLevel0','container_class' => 'navTreeItem visualNoMarker navTreeFolderish','depth'=> $MenuLevel, 'before' => '<span>','after'=>'</span>' ) ); ?>
											<li id="menu-biblioteca" >
												<span>
													<a href="<?php bloginfo('url'); ?>/category/documentos/?info=documento")>Biblioteca</a>
												</span>
											</li>
											<!--
											<li id="menu-audios">
												<span>
													<a href="<?php //bloginfo('url'); ?>/category/imprensa/banco-de-audios/">&Aacute;udios</a>
												</span>
											</li>
											-->
											<li id="menu-imagens">
												<span>
													<a href="<?php bloginfo('url'); ?>/assunto/banco-de-imagens/">Imagens</a>
												</span>
											</li>
											<!--
											<li id="menu-videos">
												<span>
													<a href="<?php //bloginfo('url'); ?>/category/imprensa/videos-imprensa/">V&iacute;deos</a>
												</span>
											</li>		
												-->											
                                        </ul>
                                        <span class="portletBottomLeft"></span>
                                        <span class="portletBottomRight"></span>
                                    </dd>
                                </dl>
                            </div>
<!--
<dl class="portlet portletStaticText portlet-static-centrais-de-conteudos"><dt class="portletHeader">
        <span class="portletTopLeft"></span>
        <span>
           Centrais de Conteúdos
        </span>
        <span class="portletTopRight"></span>
    </dt>
    <dd class="portletItem odd">
        <ul class="list-central"><li class="item-central item-videos first"><a title="" href="http://www.brasil.gov.br/centrais-de-conteudo/videos" class="link-central link-videos internal-link" target="_self">Vídeos</a></li>
<li class="item-central item-audios"><a title="" href="http://www.brasil.gov.br/centrais-de-conteudo/audios" class="link-central link-audios internal-link" target="_self">Áudios</a></li>
<li class="item-central item-infograficos"><a title="" href="http://www.brasil.gov.br/centrais-de-conteudo/infograficos" class="link-central link-infograficos internal-link" target="_self">Infográficos</a></li>
<li class="item-central item-aplicativos last-item"><a class="link-central link-aplicativos internal-link" href="http://www.aplicativos.gov.br/" target="_self" title="">Aplicativos</a></li>
</ul><span class="portletBottomLeft"></span>
            <span class="portletBottomRight"></span>        
    </dd>
</dl>
-->
	
		 		</div> <!-- id="portal-column-one" -->
 </div> <!-- id="navigation" -->