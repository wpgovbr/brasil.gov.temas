<?php get_header(); ?>
<?php // para rastrear as pageviews do post
          setPostViews(get_the_ID());
?>
<div id="portal-columns" class="row">
	<div id="portal-breadcrumbs"
		<?php if(function_exists('bcn_display'))
		{
			bcn_display();
		}?>
	</div>

	<?php include (TEMPLATEPATH . '/navigation.php'); ?>
	<!-- Conteudo -->
    <div id="portal-column-content" class="cell width-1:2 position-1:4">
        <a name="acontent" id="acontent"></a>
        <div class="">
            <dl class="portalMessage info" id="kssPortalMessage" style="display:none"><dt>Info</dt>
                <dd></dd>
            </dl>
			<div id="content">
				<div class="tileItem visualIEFloatFix tile-image">
					<div class="tileContent" style="border-bottom:1px solid #dfdfdf; margin-bottom: 5px;">
							<?php 
								//get_field é um comando criado pelo plugin Advanced Custom Fields. Preview é um 'custom field' criado para carregar imagens no SlideShow
								$imagemP = trim(get_field('preview')); 
								if($imagem === "")
								{
									$imagemP = get_post_meta($post->ID, 'preview', single);
								}
								$issuuID = get_post_meta($post->ID, 'issuu', single);
								$chapeu  = get_post_meta($post->ID, 'chapeu', single);
								$legenda = get_post_meta($post->ID, 'legenda', single);
								
								$thisCat = get_category($post->ID);								
							if ($issuuID) 
							{
								?>
									<a href="<?php bloginfo('url'); ?>/wp-content/ciclodepalestras/livro.php?id=<?php echo $issuuID; ?>" target="_blank" >
										<div class="tileImage">
											<img src="http://image.issuu.com/<?php echo $issuuID; ?>/jpg/page_1_thumb_medium.jpg" width="100" height="150" border="0" title="<?php the_title();?>" alt="<?php the_title();?>" class="tileImage" />
										</div>
									</a>
								<?php
							} elseif ($imagemP) 
							{
								?>
								<div class="tileImage">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $imagemP; ?>&amp;q=100&amp;h=310&amp;w=642&amp;zc=1" width="642" height="310" border="0" title="<?php the_title();?>" alt="<?php the_title();?>" class="tileImage" />
								<?php if ($legenda){
									echo "<div class='legenda'>".$legenda."</div>";
								} ?>
								</div>
								<div class="visualClear"><!-- --></div>
								<?php 
							}
						?>
						<h2 class="tileHeadline">
							<a href="<?php the_permalink() ?>" class="summary url"><?php the_title(); ?></a>
						</h2>
					  
							<p><span class="description"><?php the_content(); ?></span></p>
									<?php 		
										$audio = get_post_meta($post->ID, 'audio', $single = true);
										$audioTitulo = get_post_meta($post->ID, 'titulo-audio', $single = true);
										$audio2 = get_post_meta($post->ID, 'audio2', $single = true);
										$audioTitulo2 = get_post_meta($post->ID, 'titulo-audio2', $single = true);
										if ($audio || $audio2) 
										{	
										?>
<?php
											if ($audioTitulo) 
											{?>
												<p>
													<span class="description">																				
														<h3><?php echo $audioTitulo; ?>&nbsp;<a href="<?php echo $audio; ?>" target="_blank"></a></h3><br />
									  <?php } ?>
												<?php  if ($audio) {
																	$AudioPath = get_bloginfo('url') . "/" . $audio; 
																	echo do_shortcode('[audio mp3="' . $AudioPath . '" autoplay="off" loop="off" preload="on" controls="on" flash_fallback="on"]');
																}
												?>
														</span>
													</p>
												<?php  if ($audioTitulo2) {?>
													<p>
														<span class="description">
															<h3><?php echo $audioTitulo2; ?>&nbsp;<a href="<?php echo $audio2; ?>" target="_blank"></a></h3><br />
												<?php } 
														if ($audio2) {
																$AudioPath = '';
																$AudioPath = get_bloginfo('url') . "/" . $audio2; 
																echo do_shortcode('[audio mp3="' . $AudioPath . '" autoplay="off" loop="off" preload="on" controls="on" flash_fallback="on"]');
																} 	
										}
													?>				
														</span>
													</p>											
							</span></p>
							<div class="keywords">
								<?php // http://www.microkid.net/wordpress/related-posts/#API
									// MRP_show_related_posts(); ?>
								<?php the_tags('Tags: <span>', '</span>, <span>', '</span>'); ?>
							</div>
							<br/>
																				
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
													$postType = 'not&iacute;cia';
													$icone = 'icon-page';
													break;
											} 
										}
									}
								?>

								<span class="summary-view-icon">
									<i class="<?php echo $icone ?>"></i>
									<?php  echo $postType;?>
								</span>
								<div id="viewlet-social-like" class="" style="">
									<div class="sociallike-network-facebook">
										<!-- Facebook -->
										<div class="fb-like" data-href="<?php the_permalink();?>" data-width="90" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
									</div>
									<div class="sociallike-network-twitter">
										<!-- Twitter -->
										<a href="https://twitter.com/share" class="twitter-share-button" data-via="SAEPR" data-lang="pt">Tweetar</a>
										<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
									</div>
									<script type="text/javascript">
									jQuery(function () {
										jQuery("div#viewlet-social-like").each(function(){
											jQuery(this).fadeIn(3000);
											jQuery(this).removeAttr("style");
										});
									});
									</script>
								</div>
								<span class="visualClear"></span>
					</span>
					<?php if (is_user_logged_in()) {edit_post_link('editar', '<p style="text-align:right;margin-top:-1.8em;">', '</p>');} ?>
				</div>
				<?php //get_template_part( 'loop', 'post' ); ?>
				<?php comments_template(); ?>
			</div><!-- content -->
		</div>
	</div>
	<div id="portal-column-two" class="cell width-1:4 position-3:4">
		<div id="content">
		<?php //include (TEMPLATEPATH . '/media.php'); ?>
		<?php include (TEMPLATEPATH . '/news.php'); ?>
		</div><!-- content -->
	</div>
</div>
<?php get_footer(); ?>