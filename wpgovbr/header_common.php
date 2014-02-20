<!--<header id="header">-->
	<!--<div class="grid">-->
<div id="wrapper">
    <div id="header" role="banner">
	<div>
        		<?php if ($_SESSION['deviceType'] != "phone") { ?>

        		<!--<ul id="topbar" class="hide_mobile clearfix">-->


                        <ul id="accessibility">
                            <li>
                                <a accesskey="1" href="#acontent" id="link-conteudo">
                                    Ir para o conte&uacute;do
                                    <span>1</span>
                                </a>
                            </li>
                            <li>
                                <a accesskey="2" href="#anavigation" id="link-navegacao">
                                    Ir para o menu
                                    <span>2</span>
                                </a>
                            </li>
                            <li>
                                <a accesskey="3" href="#SearchableText" id="link-buscar">
                                    Ir para a busca
                                    <span>3</span>
                                </a>
                            </li>
                            <li>
                                <a accesskey="4" href="#afooter" id="link-rodape">
                                    Ir para o rodap&eacute;
                                    <span>4</span>
                                </a>
                            </li>
                        </ul>
                <ul id="portal-siteactions">
                	<li id="siteaction-accessibility">
                		<a href="<?php bloginfo('wpurl');?>/acessibilidade" title="Acessibilidade" accesskey="5">Acessibilidade</a>
                	</li>
                    	<li id="siteaction-contraste">
                		<a href="#" title="Alto Contraste" accesskey="6">Alto Contraste</a>
                	</li>
                    	<li id="siteaction-mapadosite">
                		<a href="<?php bloginfo('wpurl');?>/mapa-do-site" title="Mapa do Site" accesskey="7">Mapa do Site</a>
                	</li>
                </ul>



            <div id="logo">
                <a id="portal-logo" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('wpurl'); ?>">
                        <span id="portal-title-1"><?php bloginfo('description'); ?></span>
                        <h1 id="portal-title" class="corto"><?php bloginfo('name'); ?></h1>
                        <span id="portal-description">Seceretaria de Assuntos Estrat&eacute;gicos da Presid&ecirc;ncia da Rep&uacute;blica</span>
                </a></div>

    		<?php } ?>

              <div id="portal-searchbox">
                <form id="nolivesearchGadget_form" action="<?php bloginfo('wpurl'); ?>" method="get" name="busca">
                  <fieldset class="LSBox">
                    <legend class="hiddenStructure">
                      Buscar no portal
                    </legend>
                    <label class="hiddenStructure" for="nolivesearchGadget">
                      Busca
                    </label>
                    
                    <input name="s" type="text" size="18" title="Search Site" placeholder="Buscar no portal" class="searchField" id="SearchableText" >
                    <input class="searchButton" type="submit" value="Buscar">
                    
                    <div class="LSResult" id="LSResult">
                      <div class="LSShadow" id="LSShadow">
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>

    	<?php if ($_SESSION['deviceType'] != "phone") { ?>
		<div id="social-icons">
    		<ul id="social-icons">
    			<li id="portalredes-facebook" class="portalredes-item"><a href="<?php bloginfo('wpurl'); ?>/facebookSAE.php" title="Curta no Facebook" class="icon-facebook"></a></li>
    			<li id="portalredes-twitter" class="portalredes-item"><a href="<?php bloginfo('wpurl'); ?>/twitterSAE.php" title="Siga no Twitter" class="icon-twitter"></a></li>
    			<li id="portalredes-youtube" class="portalredes-item"><a href="<?php bloginfo('wpurl'); ?>/youtubeSAE.php" title="Videos no Youtube" class="icon-youtube"></a></li>
    			<li id="portalredes-flickr" class="portalredes-item"><a href="<?php bloginfo('wpurl'); ?>/flickrSAE.php" title="Veja no Flickr" class="icon-flickr"></a></li>
                <li id="portalredes-slideshare" class="portalredes-item"><a href="<?php bloginfo('wpurl'); ?>/slideshareSAE.php" title="Veja no Slideshare" ></a></li>
    			<li id="portalredes-rss" class="portalredes-item"><a href="<?php bloginfo('wpurl'); ?>/?feed=rss2" title="Assine as atualiza&ccedil;&otilde;es via RSS" ></a></li>
    		</ul>
		<?php } ?>
		</div>
	</div>

            <!--<a href="#dropmenu" class="menu-link"><span aria-hidden="true" class="icon-menu"></span> Menu</a>-->
				<div id="sobre">
					<?php wp_nav_menu( array( 'menu' => 'servicos','theme_location' => 'servicos', 'menu_class' => '', 'menu_id' => '','container_class' => 'portalservicos-item' ) ); ?>
            	</div>
            

    </div><!--</header>-->
    
    <!--<section class="grid section group clearfix" name="conteudo">-->
    <div id="main" role="main">
        <div id="plone-content">