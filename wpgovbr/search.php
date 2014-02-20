<?php get_header(); ?>


<!--<section>-->
<div id="portal-columns" class="row">
        <?php // acrescenta os breadcumbs e carrega o menu lateral
		 include (TEMPLATEPATH . '/navigation.php'); ?>
 <!-- Conteudo -->
	<div id="portal-column-content" class="cell width-3:4 position-1:4">
		<a name="acontent" id="acontent"></a>
		<div class='template-summary_view'>
			<div id="content">
				<div id="viewlet-above-content-title"></div>
				<h1 class="documentFirstHeading">Resultado da pesquisa: <?php echo $_GET['s'] ?></h1>
				<div id="viewlet-above-content-body"></div>
				<div id="content-core">

					<?php get_template_part( 'loop', 'post' ); ?>

				</div>
			</div>
		</div>
	</div>
</div>

<?php  get_footer(); ?>