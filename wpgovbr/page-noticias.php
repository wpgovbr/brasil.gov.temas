<?php get_header(); ?>
<div id="portal-columns" class="row">
	<?php // acrescenta os breadcumbs e carrega o menu lateral
	 include (TEMPLATEPATH . '/navigation.php'); ?>
	 
	<div id="portal-column-content" class="cell width-3:4 position-1:4">
		<a name="acontent" id="acontent"></a>
		<div class='template-summary_view'>
			<div id="content">
				<div id="viewlet-above-content-title"></div>
				<h1 class="documentFirstHeading"></h1>
				<div id="viewlet-above-content-body"></div>
				<div id="content-core">
					<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						wp_reset_query();
						wp_reset_postdata();	
						$args = array (
							'category_name' 		 => 'noticia',
							'pagination'			 => true,
							'posts_per_page'         => '7',
							'paged'					 => $paged
						);
						$query = new WP_Query($args);
						global $wp_query;
						$wp_query = $query;
					?>
					<?php get_template_part( 'loop', 'post' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php  get_footer(); ?>