<?php if ($_SESSION['deviceType'] != "phone") { ?>

<nav id="sidebar" class="col span_3_of_12 hide_mobile">

	<?php

	require_once "menu.php";

	/*
	if ( is_page() && !( is_page( 215 ) || is_page( 98 ) || is_page( 5592 ) || is_page_parent($post->ID, 5592 ) ) ) { // lista as categorias em formato de árvore

		$ancestors = get_post_ancestors($post);
		$main_page = get_page($ancestors[count($ancestors) - 1]);
		$internal_pages = wp_list_pages('echo=0&title_li=&depth=2&child_of=' . $main_page->ID);

		if ( $internal_pages ) :

			echo '<div class="map"><b class="list_header">Navegação</b>';
			echo '<ul>';

			wp_list_pages('title_li=&depth=3&child_of=' . $main_page->ID);

			echo '</ul>';
			echo '</div>';

		endif;

	}
	*/


	if ( is_page( 5592 ) ) { // agenda das autoridades
	?>
	<div class="box schedule">
		<h4><span aria-hidden="true" class="icon-calendar"></span> Calendário</h4>

		<div id="calendar" class="clearfix">Carregando calendário...</div>
	</div>

	<?php
	} else if ( is_page( 98 ) || is_archive() || is_page( 5592 ) || is_page_parent($post->ID, 5592 ) || is_single() || ( isset($_GET['key']) && $_GET['key'] == 'state' ) ) { // notícias

	?>

	<div class="box state">
		<h4><span aria-hidden="true" class="icon-location"></span> Filtro por Estado</h4>

		<ul>
			<?php list_custom_fields('state', 'dropdown'); ?>
		</ul>
	</div>


	<div class="box tag">
		<h4><span aria-hidden="true" class="icon-tag"></span> Assuntos</h4>

		<div id="tagcloud">
			<ul>
				<?php wp_list_categories('orderby=name&exclude=1&title_li='); ?>
			</ul>
			<?php // wp_tag_cloud(array('smallest' => 10, 'largest' => 18, 'number' => 40) ); ?>
		</div>
		<div id="more_tagcloud_before"></div>
		<a id="more_tagcloud"><span>Mais</span></a>
	</div>
	<?php
	}

	echo '<div id="eaps"><a href="http://agencia.previdencia.gov.br/e-aps/"><img src="/img/eaps.jpg" alt="Agência Eletrônica" /></a></div>';
	echo '<div id="accordion">';
	require_once "accordion.php";
	echo '</div>';

	?>

</nav>
<?php } ?>