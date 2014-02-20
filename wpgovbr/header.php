<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="pt-BR"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="pt-BR"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="pt-BR"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="pt-BR"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="pt-br" dir="ltr"><!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php page_title(); ?></title>
	<meta name="title" content="<?php page_title(); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico/img/touch_icon.png">
	<!--<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> -->



	<link media="screen" rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/reset.css" id="reset-css">
	<link media="screen" rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/base.css" id="base-css">
	<link media="screen" rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/jquerytools.dateinput.css" id="jquerytools-dateinput-css">
	<link media="screen" rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/jquery.autocomplete.css" id="jquery-autocomplete-css">
	<link media="screen" rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/collection.css" id="collection-css">
	<link media="screen" rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/doormat.css" id="doormat-css">
	<link media="screen" rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/embedder.css" id="embedder-css">
	<link media="screen" rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/charcount.css" id="charcount-css">
	<link media="screen" rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ploneCustom.css" id="ploneCustom-css">
	<link media="screen" rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" id="bootstrap-min-css">
	<link media="all" 	rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/main.css" id="main-css">
	<link media="all" 	rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css" id="style-css">
    <!--
	<link media="all" 	rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/blue.monday/jplayer.blue.monday.css" id="style-css">
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.jplayer.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jplayer.playlist.min.js"></script>
	-->

	<link rel='stylesheet' id='slideshow-jquery-image-gallery-stylesheet_functional-css'  href='<?php echo trim(bloginfo('url')); ?>/wp-content/plugins/slideshow-jquery-image-gallery/style/SlideshowPlugin/functional.css?ver=2.2.19' type='text/css' media='all' />
	<link rel='stylesheet' id='slideshow-jquery-image-gallery-ajax-stylesheet_slideshow-jquery-image-gallery-custom-styles_1-css'  href='<?php echo trim(bloginfo('url')); ?>/wp-admin/admin-ajax.php?action=slideshow_jquery_image_gallery_load_stylesheet&#038;style=slideshow-jquery-image-gallery-custom-styles_1&#038;ver=1388677309' type='text/css' media='all' />

	<link media="all"  rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/verde.css">
	<!--<link media="screen" rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/geral.css">-->

	<link rel="alternate stylesheet" href="<?php bloginfo('template_directory'); ?>/css/high-1.1.min.css" title="high" disabled>
	<meta property="fb:app_id" content="132912276749954" />
<?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>
<?php if (is_single()) { ?>
	<meta property="og:url" content="<?php the_permalink() ?>"/>
	<meta property="og:title" content="<?php single_post_title(''); ?>" />
	<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>" />
<?php } else { ?>
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="/img/logo200.png" />
<?php } ?>
	
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.7.2.min.js"></script>

	<script src="<?php bloginfo('template_directory'); ?>/js/modernizr-1.7.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/tema.default.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/swfobject.js"></script>

	

	<!--[if lte IE 7]><script src="/js/lte-ie7.js"></script><![endif]-->

<?php 
// especifico para a o video da home
if (is_home()) { ?>
<script type="text/javascript">
function loadVideo(playerUrl, autoplay) {
  swfobject.embedSWF(
      playerUrl + '&rel=1&border=0&fs=1&autoplay=' + 
      (autoplay?1:0), 'player', '500', '325', '9.0.0', false, 
      false, {allowfullscreen: 'true'});
}

function showMyVideos2(data) {
  var feed = data.feed;
  var entries = feed.entry || [];


  if (entries.length > 0) {
    loadVideo(entries[0].media$group.media$content[0].url, false);
  }
}
</script>
<?php 
// especifico para a categoria de videos
} else if (is_category('videos-imprensa')) { ?>

<script type="text/javascript" src="http://swfobject.googlecode.com/svn/trunk/swfobject/swfobject.js"></script>
<script type="text/javascript">
//variaveis globais
var per_page = 15; 
var offset = 1;
window.pagina = 1;
var maxItens = 6;
var user = 'saepr';
var youtubeURL = 'http://gdata.youtube.com/feeds/users/'+user+'/uploads?alt=json-in-script&callback=showMyVideos2&max-results=1';
ativo = '<div id="assistindo" align="center"><span style="color:red; font-weight:bold;">&bull;</span> Assistindo</div>';

function loadVideo(playerUrl, autoplay) {
  swfobject.embedSWF(
      playerUrl + '&rel=1&border=0&fs=1&autoplay=' +
      (autoplay?1:0), 'player', '480', '310', '9.0.0', false,
      false, {allowfullscreen: 'true'});
	 $( "ul.videos li div" ).on( "click", function() {
		 $("ul.videos li div").each(function(i) { 
			 $('#assistindo').remove();
		});
	  $(this).parent().append(ativo);
	});
}

function mudaPagina (nova) {
	if (nova == '1' || nova == '0') {
		offset = '1';
		window.pagina = '1';
	} else {
		offset = nova*per_page;
		window.pagina = nova;
	}
	src = 'http://gdata.youtube.com/feeds/users/'+user+'/uploads?alt=json-in-script&max-results='+per_page+'&start-index='+offset;
	pagination();
	var html = ['<ul class="videos">'];
	$.ajax({
        dataType: "jsonp",
        url: src,
        success: function(data, textStatus, jqXHR) {
            if (data.feed && data.feed.entry) {
                $.each(data.feed.entry, function(i, e) {
					//variaveis privadas
					var title = e.title.$t.substr(0, 20);
					var titleG = e.title.$t.replace('"',"&quot;");
					var thumbnailUrl = e.media$group.media$thumbnail[0].url;
					var playerUrl = e.media$group.media$content[0].url;
                    html.push('<li onclick="loadVideo(\'', playerUrl, '\', true)">',
					  '<span class="titlec">', title, '...</span><br /><div class="youtubeThumbs" style="background-image:url(',
					  thumbnailUrl, ');" title="', titleG, '"></div>', '</span></li>');;
                });
				html.push('</ul><br style="clear: left;"/>');
			    document.getElementById('videos2').innerHTML = html.join('');
            }
			$( "ul.videos li div" ).on( "click", function() {
				 $("ul.videos li div").each(function(i) { 
					 $('#assistindo').remove();
				});
			  $(this).parent().append(ativo);
			});
			if (nova == '0') {
				//carrega o video na primeira página apenas na primeira vez
				loadVideo(data.feed.entry[0].media$group.media$content[0].url, false);
			}
        } 
    });
}
function pagination() {
	var proxima  = window.pagina + 1;
	var anterior = window.pagina - 1;
	var pages = '';
	var range = 2;
	var showitems = (range * 2)+1;
	if (window.pagina == 0 || window.pagina == 1 ) {
		window.pagina = 1
		range = 3;
	} 
	if(pages == '') {
		pages = window.totais;
		if(!pages) {
			pages = 1;
		}
	}
	if(1 != pages) {
//		var htmlPagina = [""];
		var htmlPagina = ['<ul class="pagination">'];
		
		if(window.pagina > 1 && showitems < pages) {
			htmlPagina.push('<li><a class="anterior" href="javascript:mudaPagina('+anterior+');">&lsaquo; Anterior</a></li>');
		}
		if(window.pagina > 2 && window.pagina > range+1 && showitems < pages){
			 htmlPagina.push('<li><span class="reticencias">...</span></li>');
		}
		
		for (var n=1; n <= pages; n++)
		{
			if (1 != pages &&( !(n >= window.pagina+range+1 || n <= window.pagina-range-1) || pages <= showitems))
			{
				if (window.pagina == n){
					htmlPagina.push('<li class="current"><span>'+n+'</span></li>');
				}else{
					htmlPagina.push('<li><div><a href="javascript:mudaPagina('+n+');" class="inactive"><span>'+n+'</span></a></div></li>');
				}

			}
		}
		if (window.pagina < pages-range &&  window.pagina+range-1 < pages && showitems < pages){
			 htmlPagina.push('<li> <span class="reticencias">...</span></li><li><div><a href="javascript:mudaPagina('+pages+');" class="inactive">'+pages+'</a></div></li>');
		}
		if (window.pagina < pages && showitems < pages) {
			htmlPagina.push('<li><a class="proximo" href="javascript:mudaPagina('+proxima+');">Pr&oacute;ximo &rsaquo;</a></li>');
		}
		htmlPagina.push('</ul>');
		document.getElementById('paginate').innerHTML = htmlPagina.join('');
	}
}
function showMyVideos2(data) {
  var feed = data.feed;
  var totais = feed.openSearch$totalResults.$t;
  var paginasTotais = Math.ceil(totais/per_page);
  window.totais = paginasTotais-1;
  mudaPagina('0');
}
</script>
<?php 
// fim dos scipts de video
// especifico para a categoria de fotos
} else if (is_category('banco-de-imagens')) { ?>
<script type="text/javascript">
<!--
//variavel global de pagina
window.paginaFlickr = 1;
photosPerPage = 6;
photosPerSet = 6;
loadIMG ='<div id="carrega" align="center"><img src="<?php bloginfo('template_directory'); ?>/img/load.gif" /></div>';
carregaBT ='<div id="carregaBT" class="cell width-10 position-0" style="text-align:center; width:450px"><a href="javascript:carregaMais();" class="button green">Carregar mais</a></div>';
function openFlickr() {
	window.open('http://www.flickr.com/photos/114789156@N08/','_blank');
}
// Para criar um banco de imagens com todas as fotos de todos os sets
jQuery.getJSON( 'http://api.flickr.com/services/rest/?method=flickr.photosets.getList&per_page='+photosPerPage+'&page='+window.paginaFlickr+'&api_key=233674e0ace91a3ddfbad7ca1b7c38ee&user_id=114789156@N08&format=json&lang=pt-br&jsoncallback=?', listaPhotosets);

function listaPhotosets (data) {
	var htmlStringSets = "";
	window.paginasTotais = Math.ceil(data.photosets.total/photosPerPage);
	$.each(data.photosets.photoset, function(i,item){
		htmlStringSets += '<h3><a href="http://www.flickr.com/photos/saepr/sets/' + item.id + '/" target="_blank">'+item.title._content+'<span style="color:#999; font-size:12px;" > Fotos ('+ item.photos+')</h3>';
		htmlStringSets += '<div id = "flickrList" >';
		htmlStringSets += '<div id="'+item.id+'"></div>';
		htmlStringSets += '</div>';
		htmlStringSets += '<div class="tile fio-separador"><!-- --></div>';
		htmlStringSets += '<div class="tile fio-separador" style="border-top: 0.1em solid #ccc;"><!-- --></div>'
		htmlStringSets += "<div class='visualClear'><!-- --></div>";
		criaTumbs(item.id);
	});
	$('#flickrSETs').append (htmlStringSets);
	//insere o caeergar mais e remove o loading
	$("#carrega").remove();
	$('#flickrSETs').append (carregaBT);
	
	window.paginaFlickr++;
	
	if (window.paginaFlickr > window.paginasTotais ){
		//remove o carrega mais
		$( "#carregaBT" ).remove();
	}
}

function criaTumbs(setID){
	jQuery.getJSON( 'http://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&per_page='+photosPerSet+'&page=1&api_key=233674e0ace91a3ddfbad7ca1b7c38ee&photoset_id='+setID+'&extras=original_format&format=json&jsoncallback=?',displaySETEspecifico );
}
function displaySETEspecifico(data) {
    var htmlStringSet = "";
    $.each(data.photoset.photo, function(i,item){
       var photo = 'http://farm'+item.farm+'.static.flickr.com/'+item.server+'/'+item.id+'_'+item.secret+'_s.jpg'; 
       item.link = 'http://farm'+item.farm+'.static.flickr.com/'+item.server+'/'+item.id+'_'+item.originalsecret+'_o.jpg';
       htmlStringSet += '<li><a href="' + item.link + '" target="_blank">';
       htmlStringSet += '<img title="' + item.title + '" src="' + photo;
       htmlStringSet += '" alt="'; htmlStringSet += item.title + '" />';
       htmlStringSet += '</a></li>';  
    });
	var divID = '#'+data.photoset.id;
	$(divID).html(htmlStringSet);
    //return (htmlStringSet);
}
function carregaMais(){
		//adiciona o loading
		$( "#flickrSETs" ).append(loadIMG);
		$( "#carregaBT" ).remove();
		jQuery.getJSON( 'http://api.flickr.com/services/rest/?method=flickr.photosets.getList&per_page=6&page='+window.paginaFlickr+'&api_key=9adef24a00cc08c0b737118201e3536a&user_id=59379115@N08&format=json&lang=pt-br&jsoncallback=?', listaPhotosets);
	}
-->
</script>
<?php 
// fim dos scipts de imagens
// especifico para a categoria de fotos
} else if (is_category('documentos')) { 
$diretorio = '/var/www/html/portal/wp-content/ciclodepalestras/capas';
$iterator = new RecursiveDirectoryIterator($diretorio);
$recursiveIterator = new RecursiveIteratorIterator($iterator);
sort($recursiveIterator);

$arquivos = array();
foreach($recursiveIterator as $arquivo) {
	array_push($arquivos, $arquivo->getFilename());
}
rsort($arquivos);

$dadosJson = "[";
foreach($arquivos as $arquivo) {
	$fileInfo = explode(".", $arquivo);
	$dadosJson .= '{"ordem":';
	$dadosJson .= '"'.$fileInfo[0].'","extension":';
	$dadosJson .= '"'.$fileInfo[3].'","livro":';
	$dadosJson .= '"'.$fileInfo[1].'","id":';
	$dadosJson .= '"'.$fileInfo[2].'","file":';
	$dadosJson .= '"'.$arquivo;
	$dadosJson .= '"},';
}
$dadosJson = rtrim($dadosJson ,',');
$dadosJson .= "]";
?> 

<script language="javascript">
var path = 'http://www.sae.gov.br/site/wp-content/ciclodepalestras/capas/';
var dadosjson = {};
var novo, abrir, capa;

//dados carregados do servidor via python, agora e php antes - gerados a partir das imagens de uma pasta no servidor (em xml - www.sae.gov.br/site/wp-content/ciclodepalestras/lista.php)
dadosjson = <?php echo $dadosJson ?>;



$(document).ready(function(){
	
	//para a nova estante trocar: http://issuu.com/sae.pr/docs/NOME_DA_PUBLICAÇÃO_NO_ISSUU?mode=window
	
	novo = '<img class="novo" src="<?php bloginfo('template_directory'); ?>/img/novo.png" />';
	//icone de abrir com id específico
	abrir = '<div id="abrir" align="center" style="margin-top:-50px; width:'+$(this).parent().width()+'px;"><img class="abrir" src="<?php bloginfo('template_directory'); ?>/img/abrir.png" border="0" /></div>';
	//arruma o problema da altura da estante 
	var fundoHeight = (40*dadosjson.length)+'px';
	$('#estante').css('height', fundoHeight);
	//início do loop
	$.each(dadosjson, function(i, item) {
		//cria a imagem do livro e insere os itens
		var img = new Image();
		//inicia o carregamento da imagem atual
		img.src = path+dadosjson[i].file;
		//ao carregar a imagem:
		$(img).bind('load', function() {
			//qual a largura da imagem atual
			var imgWidth = this.width+4;
			//qual a altura da imagem
			var imgHeight = 153 //this.height+3;
			//verifica o tamanho da imagem carregada
			//cria a o efeito de brilho na capa
			capa = '<div align="center" style="margin:-151px 0px 0px -2px; width:'+imgWidth+'px; height:'+imgHeight+'px;"><a href="<?php bloginfo('url'); ?>/wp-content/ciclodepalestras/livro.php?id='+dadosjson[i].id+'&name='+dadosjson[i].livro+'" title="'+dadosjson[i].livro+'" target="_blank"><img class="capa" src="<?php bloginfo('template_directory'); ?>/img/sobreCapa.png" style="width:'+imgWidth+'px; height:'+imgHeight+'px;" border="0" /></a></div>';	
			//cria a div container dos objetos com id específico
			var livro = '<div class="livro" id="'+dadosjson[i].id+'" style="width:'+imgWidth+'px; height:'+imgHeight+'px;"><img src="'+path+dadosjson[i].file+'" title="'+dadosjson[i].livro+'" />'+capa+'</div>';
			//adiciona o livro na estante
			$('#estante').append(livro);
			if ( dadosjson[i]['extension'] == 'n' ){
				$('#'+dadosjson[i].id).append(novo);
			}
			//adiciona o efeito mouse over no livro para aparecer o 'abrir'
			$('#'+dadosjson[i].id).mouseenter(function() {
				//mouse em cima
				$('#'+dadosjson[i].id).append(abrir);
			  }).mouseleave(function() {
				//mouse saiu
				$('#abrir').remove();
			  });
		});
	//fim do loop
	});
});
</script>
<?php } ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/contraste.js"></script>
<?php wp_head(); ?> 
</head>
<body dir="ltr" class="template-view portaltype-collective-cover-content site-SAE section-home userrole-anonymous">
<?php if ($_SESSION['deviceType'] != "phone") { ?>
	<div id="barra-brasil">
	    <a href="http://brasil.gov.br" style="background:#7F7F7F; height: 20px; padding:4px 0 4px 10px; display: block; font-family:sans,sans-serif; text-decoration:none; color:white; ">Portal do Governo Brasileiro</a>
	</div>
<?php } ?>
<?php require_once "header_common.php"; ?>
