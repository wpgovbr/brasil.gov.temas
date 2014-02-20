<?php get_header(); ?>

<?php get_sidebar(); ?>

<section id="content" class="col span_9_of_12">

	<div id="portal-breadcrumbs"
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
	</div>
	<article class="post" id="tv">

		<h2><a href="/tv">TV Previdência</a></h2>

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

			$xml = simplexml_load_file("https://gdata.youtube.com/feeds/api/users/tvprevidencia/uploads?max-results=50&v=2");
			$regexp = "https:\/\/www\.youtube\.com\/watch\?v=(.*)(.*)";

			$url = explode("&", $xml->entry[0]->link['href']);
			$title = $xml->entry[0]->title;

			$link = $url[0];
			if(preg_match_all("/$regexp/siu", $link, $matches)) $id = $matches[1][0];
			$embed = "http://youtube.com/embed/$id";

		?>
		<h3><?php echo $title; ?></h3>

		<div id="player" class="tv_player"><iframe width="470" height="315" src="<?= $embed ?>" frameborder="0" allowfullscreen></iframe></div>

		<div id="list">

		<?php

			foreach ($xml->entry as $entry) {

				$title = $entry->title;
				$url = explode("&", $entry->link['href']);
				$link = $url[0];
				if(preg_match_all("/$regexp/siu", $link, $matches)) $id = $matches[1][0];
				$embed = "http://youtube.com/embed/$id";
				$thumbnail = "http://i1.ytimg.com/vi/$id/default.jpg";

				echo "<a href=\"$embed\" title=\"$title\" class=\"youtube\"><img src=\"$thumbnail\" /></a>";

				$url = explode("&", $xml->entry[0]->link['href']);
				$link = $url[0];
				if(preg_match_all("/$regexp/siu", $link, $matches)) $id = $matches[1][0];
				$embed = "http://youtube.com/embed/$id";

			}

		?>

		</div>
	</article>

</section>
<?php get_footer(); ?>