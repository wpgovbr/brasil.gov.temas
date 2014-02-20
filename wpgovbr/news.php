<div>
	<div class="tile lista-vertical">
		<div class="cover-collection-tile">
			<div class="tile-header">
				<span>&Uacute;ltimas not&iacute;cias</span>
			</div>
			<?php
				wp_reset_query(); 
				wp_reset_postdata();

				$args = array('category_name' => 'noticia',
						  'ignore_sticky_posts' => 1,
						  'post_status' => 'publish',
						  'posts_per_page' => 10
						 );
				
				$LatestNews= new WP_Query($args);					
				while ($LatestNews->have_posts()) : $LatestNews->the_post(); 

					?>
						<div class="collection-item">
						<h2>
						<a href="<?php the_permalink()?>"><?php the_truncate_title(65,get_the_title($post->ID)) ?></a>
						</h2>
						<div class="visualClear"><!-- --></div>
						</div>

			<?php
				endwhile;
				wp_reset_query(); 
				wp_reset_postdata();
			?>
			<div class="tile-footer">
				<a href="<?php bloginfo('url'); ?>/assunto/noticia/?listar=true">ACESSE A LISTA COMPLETA</a>
			</div>
			<div class="visualClear"><!-- --></div>
		</div>
	</div>

<?php if (is_category('classe-media')) { ?>

<a class="twitter-timeline" width="230" height="500" data-dnt=true href="https://twitter.com/search?q=%23classemedia" data-widget-id="298618552376754176">Tweets sobre "#classemedia"</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<?php } ?>
</div>								
