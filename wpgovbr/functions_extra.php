<?php

// obtém uma lista de vídeos do canal do youtube
// substituido por javascript para melhorar a experiência do usuário
function youtube_list() {
	$xml = simplexml_load_file("https://gdata.youtube.com/feeds/api/videos?author=tvprevidencia&v=2");
	$regexp = "https:\/\/www\.youtube\.com\/watch\?v=(.*)(.*)";
	$output = "";

	foreach ($xml->entry as $entry) {

		$title = $entry->title;
		$url = explode("&", $entry->link['href']);
		$link = $url[0];
		if(preg_match_all("/$regexp/siu", $link, $matches)) $id = $matches[1][0];
		$embed = "http://youtube.com/embed/$id";
		$thumbnail = "http://i1.ytimg.com/vi/$id/default.jpg";

		$output .= "<a href=\"$embed\" title=\"$title\" class=\"youtube\"><img src=\"$thumbnail\" alt=\"$title\" /></a>\n";

	}

	return $output;
}


// obtém o vídeo mais recente do youtube
// substituido por javascript para melhorar a experiência do usuário
function youtube_first() {

	$xml = simplexml_load_file("https://gdata.youtube.com/feeds/api/videos?author=tvprevidencia&v=2");
	$regexp = "https:\/\/www\.youtube\.com\/watch\?v=(.*)(.*)";

	$url = explode("&", $xml->entry[0]->link['href']);
	$link = $url[0];
	if(preg_match_all("/$regexp/siu", $link, $matches)) $id = $matches[1][0];
	$embed = "http://youtube.com/embed/$id";

	echo '<iframe width="100%" height="215" src="' . $embed . '" frameborder="0"></iframe>';

}


// https://github.com/serbanghita/Mobile-Detect
require_once "lib/Mobile_Detect.php";
$detect = new Mobile_Detect();
$_SESSION['deviceType'] = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');


// http://wp.tutsplus.com/tutorials/how-to-generate-website-screenshots-for-your-wordpress-site/
add_shortcode('ss_screenshot', 'ss_screenshot_shortcode');

function ss_screenshot_shortcode($atts){

  $width = intval($atts['width']);
  $width = (100 <= $width && $width <= 300) ? $width : 200;
  $site = trim($atts['site']);

  if ($site != ''){

    $query_url =  'http://s.wordpress.com/mshots/v1/' . urlencode($site) . '?w=' . $width;
    $image_tag = '<img class="ss_screenshot_img" alt="' . $site . '" width="' . $width . '" src="' . $query_url . '" />';
    echo $image_tag;

  }
}

?>