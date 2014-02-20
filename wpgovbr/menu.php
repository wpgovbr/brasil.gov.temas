<?php $ancestors = get_post_ancestors($post); if ( in_array(60, $ancestors) ) { // Órgãos colegiados ?>

<div class="map">
	<b class="list_header">Órgãos Colegiados</b>
	<ul>
		<li><a href="/a-previdencia/orgaos-colegiados/conselho-nacional-de-previdencia-social-cnps/">Conselho Nacional de Previdência Social – CNPS</a></li>
		<li><a href="/a-previdencia/orgaos-colegiados/conselho-nacional-dos-dirigentes-de-regimes-proprios-de-previdencia-social-conaprev">Conselho Nacional dos Dirigentes de Regimes Próprios de Previdência Social - CONAPREV</a></li>
		<li><a href="/a-previdencia/orgaos-colegiados/conselho-de-recursos-da-previdencia-social-crps/">Conselho de Recursos da Previdência Social - CRPS</a></li>
		<li><a href="/a-previdencia/orgaos-colegiados/conselho-nacional-de-previdencia-complementar-cnpc/">Conselho Nacional de Previdência Complementar – CNPC</a></li>
		<li><a href="/a-previdencia/orgaos-colegiados/camara-de-recursos-da-previdencia-complementar-crpc">Câmara de Recursos da Previdência Complementar - CRPC</a></li>
	</ul>
</div>

<?php } else if ( is_page( 5 ) || in_array(5, $ancestors) ) { // A Previdência ?>

<div class="map">
	<b class="list_header">A Previdência</b>
	<ul>
		<li><a href="/a-previdencia/historico">Histórico</a></li>
		<li><a href="/legislacao">Legislação</a></li>
		<li><a href="/a-previdencia/programa-de-educacao-previdenciaria/">Educação Previdenciária</a></li>
		<li><a href="/a-previdencia/escola-da-previdencia/">Escola da Previdência</a></li>
		<li><a href="/a-previdencia/instituto-nacional-do-seguro-social-inss/">INSS</a></li>
		<li><a href="/a-previdencia/dataprev/">Dataprev</a></li>
	</ul>
</div>

<?php } if ( is_page( 21 ) || in_array(21, $ancestors) || is_page( 106 ) || in_array(106, $ancestors) ) { // Benefícios, Acesso à Informação

		$ancestors = get_post_ancestors($post);
		$main_page = get_page($ancestors[count($ancestors) - 1]);
		$internal_pages = wp_list_pages('echo=0&title_li=&depth=2&child_of=' . $main_page->ID);

		if ( $internal_pages ) :

			if ( is_page( 21 ) || in_array(21, $ancestors) ) $desc = "Benefícios";
			if ( is_page( 106 ) || in_array(106, $ancestors) ) $desc = "Acesso à Informação";

			echo '<div class="map"><b class="list_header">' . $desc . '</b>';
			echo '<ul>';

			wp_list_pages('title_li=&depth=1&child_of=' . $main_page->ID);

			echo '</ul>';
			echo '</div>';

		endif;

	} ?>


