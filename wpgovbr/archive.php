<?php get_header(); ?>
<div id="portal-columns" class="row">
	<?php include (TEMPLATEPATH . '/navigation.php'); ?>
<!-- Conteudo -->
    <div id="portal-column-content" class="cell width-1:2 position-1:4">
        <a name="acontent" id="acontent"></a>
        <div class="">
            <dl class="portalMessage info" id="kssPortalMessage" style="display:none"><dt>Info</dt>
                <dd></dd>
            </dl>
		<div id="content">
 
			<?php get_template_part( 'loop', 'post' ); ?>
 			</div><!-- content -->
		
		</div>
	</div>
	<div id="portal-column-two" class="cell width-1:4 position-3:4">
		<?php include (TEMPLATEPATH . '/media.php'); ?>
		<?php include (TEMPLATEPATH . '/news.php'); ?>

	</div>
</div>
<?php get_footer(); ?>