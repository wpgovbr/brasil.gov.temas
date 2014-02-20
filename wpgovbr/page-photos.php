<?php /* Template Name: Photos */ ?>
<?php get_header(); ?>

<?php get_sidebar(); ?>

<section id="content" class="col span_9_of_12">

	<div id="portal-breadcrumbs"
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
	</div>

	<article class="post" id="">

		<h2><a href="/galeria">Galeria</a></h2>

		<div class="meta_header clearfix">
			<?php if ( !is_page() ) { ?>
			<span class="date" title="<?php the_time('d/m/Y H:i') ?>"><?php echo time_ago(); ?></span>
			<?php } ?>
			<span class="share">
				<?php edit_post_link('', ' ', ' '); ?>
				<a href="http://twitter.com/home?status=<?php the_truncate_title(93,get_the_title($post->ID)); ?> - <?php echo get_permalink($post->ID); ?> via @Previdencia" class="icon-twitter"></a>
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" class="icon-facebook" target="_blank"></a>
				<?php if ( is_single() || is_page() ) { ?><a href="#" class="icon-print hide_mobile"></a><?php } ?>
			</span>
		</div>
		<?php

			echo '<div id="list">';

			$output = '';
			$set = '72157634987710414';
			$api_key = "4ea70bbb11e4bb4254f03a8bd8a75af2";
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$url = "http://api.flickr.com/services/rest/?api_key={$api_key}&photoset_id={$set}&method=flickr.photosets.getPhotos&per_page=20&page=$page";

			$xml = simplexml_load_file($url);

			foreach ($xml->photoset->photo as $photo) {
				$title = $photo['title'];
				$farmid = $photo['farm'];
				$serverid = $photo['server'];
				$title = $photo['title'];
				$id = $photo['id'];
				$secret = $photo['secret'];
				// url referency: http://www.flickr.com/services/api/misc.urls.html
				$thumb_url = "http://farm{$farmid}.staticflickr.com/{$serverid}/{$id}_{$secret}_m.jpg";
				$full_url =  "http://farm{$farmid}.staticflickr.com/{$serverid}/{$id}_{$secret}_b.jpg";
				$page_url = "http://www.flickr.com/photos/{$owner}/{$id}";
				echo "<a href='{$full_url}' rel='gallery' title='{$title}' class='lightbox'><img alt='{$title}' src='{$thumb_url}'/></a>";
			}

			echo $output;

			echo '</div>';

			$page_count = $xml->photoset['pages'];

			if ($page_count > 1) {

				$back_page = $page - 1;
				$next_page = $page + 1;
				$range = 4;

				echo '<div class="pagination">';
				echo '<span>Página ' . $page . ' de ' . $page_count . '</span>';

				if ($page > 1) {
					echo "<a href='?page=1'>&laquo; Primeiro</a>";
					echo "<a href='?page=$back_page'>&lsaquo; Anterior</a>";
				}

				for ($i = 1; $i <= $page_count; $i++) {
					if (1 != $page_count && ( !($i >= $page + $range + 1 || $i <= $page - $range - 1) || $page_count <= $showitems )) {
						echo ($page == $i)? "<span class=\"current\">".$i."</span>" : "<a href='?page=" . $i . "' class=\"inactive\">" . $i . "</a>";
					}
				}

				if ($page != $page_count) {
				 echo "<a href='?page=$next_page'>Próximo &rsaquo;</a>";
				}

				if ($page < $page_count) {
					$last_page = $page_count;
					echo "<a href='?page=$last_page'>Última &raquo;</a>";
				}

				echo "</div>";

			}

			?>

	</article>

</section>
<?php get_footer(); ?>