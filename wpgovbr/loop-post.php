<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="tileItem  tile-image">
			<div class="tileContent">
					<?php 
					//get_field é um comando criado pelo plugin Advanced Custom Fields. Preview é um 'custom field' criado para carregar imagens no SlideShow
					$imagemP="";
					$imagemP = trim(get_field('preview')); 
					if($imagemP === "")
					{
						$imagemP = get_post_meta($post->ID, 'preview', single);
					}					

					$issuuID = get_post_meta($post->ID, 'issuu', single);
					$chapeu = get_post_meta($post->ID, 'chapeu', single);
					
					if ($issuuID) {
					?>
					<a href="<?php bloginfo('url'); ?>/wp-content/ciclodepalestras/livro.php?id=<?php echo $issuuID; ?>" target="_blank" >
						<div class="tileImage">
							<img src="http://image.issuu.com/<?php echo $issuuID; ?>/jpg/page_1_thumb_medium.jpg" width="100" height="150" border="0" title="<?php the_title();?>" alt="<?php the_title();?>" class="tileImage" />
						</div>
					</a>
					<?php
					} elseif ($imagemP) {
					?>
						<div class="tileImage">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $imagemP; ?>&amp;q=100&amp;h=96&amp;w=128&amp;zc=1" width="128" height="96" border="0" title="<?php the_title();?>" alt="<?php the_title();?>" class="tileImage" />
						</div>
					<?php 
					}
					?>
				<h2 class="tileHeadline">
					<a href="<?php the_permalink() ?>" class="summary url"><?php the_title(); ?></a>
				</h2>
			  <?php $resumo = apply_filters($post->post_content, substr(wp_strip_all_tags(get_the_content(),false), 0, 250)).'...'; ?>
				<p><span class="description"><?php echo $resumo ?></span></p>

				<div class="keywords">
					<?php the_tags('Tags: <span>', '</span>, <span>', '</span>'); ?>
				</div>
			</div>
			<span class="documentByLine">
				<span class="hiddenStructure">
					publicado
				</span>
				<span class="summary-view-icon">
					<i class="icon-day"></i>
					<?php the_date('d/m/Y'); ?>
				</span>
				<span class="summary-view-icon">
					<i class="icon-hour"></i>
					<?php the_time('G:i'); ?>
				</span>
				<?php
					$posttags = get_the_tags();
					$postType = 'not&iacute;cia';
					$icone = 'icon-page';														
					if ($posttags) 
					{
						foreach($posttags as $tag) 
						{
							//procura por uma tag especial
							switch ($tag->name) 
							{
								case 'video':
									$postType = 'v&iacute;deo';
									$icone = 'icon-day';
									break 2;
								case 'audio':
									$postType = '&aacute;udio';
									$icone = 'icon-multimidia';
									break 2;
								case 'foto':
								case 'infografico':
									$postType = 'imagem';
									$icone = 'icon-image';
									break 2;
								case 'agenda':
									$postType = $tag->name;
									$icone = 'icon-day';
									break 2;
								case 'evento':
									$postType = $tag->name;
									$icone = 'icon-day';
									break 2;
								case 'documento':
									$postType = $tag->name;
									$icone = 'icon-page';
									break 2;
								default:
									// se nao achar nenhum, volta e procura mais ou usa noticia
									$postType = 'not&iacute;cia';
									$icone = 'icon-page';
									break;
							} 
						}
					}
				?>
				
				<span class="summary-view-icon">
					<i class="<?php echo $icone ?>"></i>
					<?php echo $postType; ?>
				</span>
				<span class="visualClear"></span>
			</span>
		</div>
		<?php if ( !is_page() ) { ?>
			<?php comments_template(); ?>
		<?php } ?>
	<?php endwhile; ?>
	<?php pagination(); ?>
<?php else : ?>
	<article class="post" style="margin-top: 15px">
		<h2><a href="#">Página não encontrada</a></h2>
		<p>A página que você procura não foi encontrada.
		<?php if (smart404_has_suggestions()) : ?>
			Veja algumas sugestões: </p>
			<?php smart404_suggestions(); ?>
		<?php endif; ?>
	</article>
<?php endif; ?>