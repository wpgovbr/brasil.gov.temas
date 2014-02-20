<?php get_header(); ?>
<div id="portal-columns" class="row">
        <?php // acrescenta os breadcumbs e carrega o menu lateral
		 include (TEMPLATEPATH . '/navigation.php'); ?>
		<div id="portal-column-content" class="cell width-3:4 position-1:4">
			<a name="acontent" id="acontent"></a>
			<div class='template-summary_view'>
				<div id="content">		 
					<section id="content" class="col span_2_of_3">

						<article class="post" style="margin-top: 15px">
							
							<h1 style="font-size:3.8em;font-weight:bolder;">Página não encontrada</h1>
							
							<p style="font-size:2.2em;">A página que você procura não foi encontrada.</p>
							<?php if (smart404_has_suggestions()) : ?>
							<h2 style="font-size:2em;">Veja algumas sugestões: </h2>
							<div style="font-size:1.6em;line-height: 1.6em;">
								<?php smart404_suggestions(); ?>
							</div>
							<?php endif; ?>
							
						</article>

					</section>
				</div>
			</div>
		</div>
</div>
<?php get_footer(); ?>