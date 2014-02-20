<div class="visualClear"><!-- --></div>
<div id="voltar-topo">
	<a href="#wrapper">Voltar para o topo</a>
</div>
</div>
</div>
</div>	
</div>				



<?php require_once "footer_common.php"; ?>

<?php if ($_SESSION['deviceType'] == "phone") { ?>
<script src="<?php bloginfo('template_directory'); ?>/js/zepto.min.js"></script>
<? } else { ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.7.2.min.js"><\/script>')</script>
<?php } ?>

<?php if ($_SESSION['deviceType'] == "phone") { if (!is_home()) { echo '<div id="accordion">'; require_once "accordion.php"; echo '</div>'; } ?>
<script src="<?php bloginfo('template_directory'); ?>/js/functions.zepto-1.1.min.js"></script>
<?php } else { ?>
<script src="<?php bloginfo('template_directory'); ?>/js/functions.js"></script>


<?php if ( is_page( 215 ) ) { ?>
<script type="text/javascript">
$(document).ready(function (){
	$('a.youtube').click(function(){
		$("#player").html('<iframe src="' + $(this).attr('href') + '"></iframe>');
		$(".post h3").text($(this).attr("title")).scrollTo('slow','swing');
		return false;
	});
});
</script>
<?php } else if ( is_page ( 5592 ) ) {  ?>
<script src="<?php bloginfo('template_directory'); ?>/js/jCal.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$('#calendar').jCal({
		day: new Date(),
<?php if (isset($_GET['data'])){  $data = explode("-", $_GET['data']); echo "sDate: new Date(" . $data[0] . ", " . ($data[1] - 1) . "," . $data[2] . ", 0, 0, 0), "; } ?>
		days: 1,
		showMonths: 1,
		monthSelect:false,
		dow: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
		ml: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
		ms: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		dCheck:	function (day) { return (day.getDay()); },
		callback: function (day, days) {
			$('#calendar').val( days );
			date = day.getFullYear() + '-' + (day.getMonth() + 1) + '-' + day.getDate();
			window.location = "/agenda-das-autoridades/?data=" + date;
			return true;
		}
	});
});
</script>
<?php } ?>
<?php } ?>
<?php if ( is_page ( 51978 ) ) { ?>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	  $('.lightbox').magnificPopup({
	  	type: 'image',
	  	mainClass: 'mfp-fade',
	  	tClose: 'Fechar (Esc)',
		  tLoading: 'Carregando...',
		  gallery: {
				enabled: true,
				navigateByImgClick: true,
				tPrev: 'Anterior (Seta esquerda)',
				tNext: 'Próxima (Seta direita)',
				tCounter: '%curr% de %total%'
		  },
		  image: {
		    tError: '<a href="%url%">A imagem</a> não pode ser carregada.'
		  },
		  ajax: {
		    tError: '<a href="%url%">A requisição</a> não pode ser carregada.'
		  }

	 	});
	});
</script>
<?php } ?>
<?php if ( is_home() ) { ?>
							<script src="http://code.jquery.com/jquery-latest.min.js"></script>
							<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.paging.min.js"></script>
							<script type="text/javascript">
								$(document).ready(function ()
								{
									var selectedImg = null;

									$.getJSON("http://api.flickr.com/services/rest/?format=json&method=flickr.photosets.getPhotos&photoset_id=72157634987710414&per_page=1&page=1&api_key=4ea70bbb11e4bb4254f03a8bd8a75af2&jsoncallback=?", {
										format: "json"},
									function(data) 
									{
									$.each(data.photoset.photo, function(i,item){

											var squareUrl = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_n.jpg';
											var largeUrl = squareUrl.replace('_n.jpg', '_b.jpg');
											var title = item.title;
											var img = '<img src="' + squareUrl + '" alt="' + title + '" />';

											//$('#flickr_holder').html(img);
										  });
										  

										//$('#flickr_holder').paging(20,{format: '*',perpage: 1,page:1});

									});
								});
							</script>
<script type="text/javascript">

$(document).ready(function (){
	/*$.ajax({
	  type: 'GET',
	  url: "http://api.flickr.com/services/rest/?format=json&method=flickr.photosets.getPhotos&photoset_id=72157634987710414&per_page=1&page=1&api_key=4ea70bbb11e4bb4254f03a8bd8a75af2&jsoncallback=?",
	  dataType: 'json',
	  success: function(data)
	  {
	  	$.each(data.photoset.photo, function(i,item){

		    var squareUrl = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_n.jpg';
		    var largeUrl = squareUrl.replace('_n.jpg', '_b.jpg');
		    var title = item.title;
		    var img = '<img src="' + squareUrl + '" alt="' + title + '" />';

		    $('#flickr_holder').html(img);
		  });

	  },
	  error: function(xhr, type)
	  {
			$('#flickr_holder').text('Imagem não carregada.');
	  }
	});

	$.ajax(
	{
	  type: 'GET',
	  url: 'http://gdata.youtube.com/feeds/users/tvprevidencia/uploads?alt=json-in-script&callback=?&max-results=1',
	  dataType: 'json',
	  success: function(data)
							{
								$.each(data.feed.entry, function(i, item) 
								{
									var url = item['media$group']['media$content'][0]['url'].replace('/v/', '/embed/') + '&showinfo=0';
									var title = item['media$group']['media$title']['$t'];
									// $('#youtube_holder').html('<iframe src="' + url + '"></iframe>');
								});
							}
	});
*/	
});
</script>
<?php if ($_SESSION['deviceType'] != "phone") { ?>
<script src="<?php bloginfo('template_directory'); ?>/js/bjqs-1.3.min.js"></script>
<script type="text/javascript">
	$(document).ready(
						function ()	{
										/*$("#small_features li:gt(2)").remove();*/

										$('#slide').bjqs({
											animtype : 'slide',
											showmarkers : false,
											responsive : true,
											hoverpause : true,
											animspeed : 5000,
											usecaptions : true,
											width : 560,
											height : 316,
											nexttext : '<span aria-hidden="true" class="icon-arrow-right"></span>',
											prevtext : '<span aria-hidden="true" class="icon-arrow-left"></span>'
										});
									}
					);
</script>
<script type="text/javascript"   src="http://gdata.youtube.com/feeds/users/saepr/uploads?alt=json-in-script&callback=showMyVideos2&max-results=1">
</script>
<?php } ?>
<?php } ?>
<script src="http://barra.brasil.gov.br/barra.js" type="text/javascript"></script>
<!-- GA -->

<script src="<?php bloginfo('template_directory'); ?>/js/jquery.jcarousel.min.js"></script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-9791636-1', 'sae.gov.br');
  ga('send', 'pageview');
</script>
<?php wp_footer(); ?>


<script type='text/javascript' src='<?php echo trim(bloginfo('url')); ?>/wp-includes/js/jquery/jquery.js?ver=1.10.2'></script>
<script type='text/javascript' src='<?php echo trim(bloginfo('url')); ?>/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
<script type='text/javascript'>
	/* <![CDATA[ */
	var SlideshowPluginSettings_0 = {"animation":"fade","slideSpeed":"1","descriptionSpeed":"0.4","intervalSpeed":"5","slidesPerView":"1","maxWidth":"712","aspectRatio":"3:1","height":"300","imageBehaviour":"crop","showDescription":"true","hideDescription":"true","preserveSlideshowDimensions":"false","enableResponsiveness":"true","play":"true","loop":"true","pauseOnHover":"true","controllable":"true","hideNavigationButtons":"false","showPagination":"true","hidePagination":"true","controlPanel":"true","hideControlPanel":"true","waitUntilLoaded":"true","showLoadingIcon":"true","random":"false","avoidFilter":"true"};
	var slideshow_jquery_image_gallery_script_adminURL = "<?php bloginfo('url'); ?>/wp-admin/";
	/* ]]> */
	$("#navigation .menuTrigger").click( function(){$("#navigation").toggleClass('ativo');})
	$(".portletHeader").click( 
	function(){
				$(this).toggleClass("ativo");
				if($(this).hasClass( "ativo" ))
				{
					$(".portletHeader").not(this).each(function(){$(this).removeClass("ativo");});
					$(".portletItem, .lastItem").css("display","none");
					$(this).parent().find(".portletItem, .lastItem").css("display","block");
				}
				else
				{
					$(this).parent().find(".portletItem, .lastItem").css("display","none");
				}
			}
	)
</script>
<script type='text/javascript' src='<?php echo trim(bloginfo('url')); ?>/wp-content/plugins/slideshow-jquery-image-gallery/js/min/all.frontend.min.js?ver=2.2.19'></script>

</body>
</html>