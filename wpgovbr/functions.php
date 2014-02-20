<?php
////////////////////////////////////////////////////////////////////////////////
// get theme option
////////////////////////////////////////////////////////////////////////////////
if( !function_exists('get_theme_option') ):
function get_theme_option($option_n ='', $option_g='') {
global $shortname;
if( $option_g == '') {
$options = get_option('wp_gov_br_theme_options');
$get_the_option = $options[ $shortname . '_'. $option_n ];
if( !empty($get_the_option) ) { return stripslashes($get_the_option); }
} else {
$options = get_option('wp_gov_br_theme_options');
if( !empty($options[ $option_n ]) ) { return stripslashes( $options[ $option_n ] ); }
}
}
endif;

////////////////////////////////////////////////////////////////////////////////
// get category color
////////////////////////////////////////////////////////////////////////////////
if( !function_exists('get_category_color') ):
function get_category_color($cat_id) 
{
	if($cat_id) 
	{
		$cat_value_option = 'tn_cat_color_' . $cat_id;
		$cat_bg_color = get_theme_option( $cat_value_option, 'cat' );
	}
	else
	{
		$cat_bg_color = "#00510F";
	}
	//$cat_bg_color =  implode("," ,get_option('wp_gov_br_theme_options'));
	
	return $cat_bg_color;
}
endif;


///////////////////////////////////////////////////////////////////////////////

class CSS_Menu_Maker_Walker extends Walker_Nav_Menu {
	var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
	var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<dl class=\"sub-menu\">\n";
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</dl>\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		$output .= $indent . '<dd' . $id . $value . $class_names .'>';
		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		/** This filter is documented in wp-includes/post-template.php */
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</dd>\n";
	}
} // Walker_Nav_Menu



//habilita o Plugin SlideShow Camera
//if (function_exists('camera_main_ss_add')) { add_action('admin_init','camera_main_ss_add'); }



//habilita o uso de menus
//criado por André Luiz de Castro em 03/12/2013
if ( function_exists( 'register_nav_menu' ) ) {

register_nav_menu( 'assuntos', 	'Este &eacute; o menu principal -Assuntos-,no lado esquerdo (sidebar) e rodap&eacute; site.' );
register_nav_menu( 'sobre', 	'Este &eacute; o menu principal -Sobre-,no lado esquerdo do site.(sidebar)' );
register_nav_menu( 'centrais_conteudo', 'Este &eacute; o menu principal -Centrais de Conte&eacute;do-, no lado esquerdo do site.(sidebar)' );
register_nav_menu( 'servicos', 'Este &eacute; o menu do canto superior direito e rodap&eacute; -Servi&ccedil;os-)' );
register_nav_menu( 'redes_sociais', 'Este &eacute; o menu de rodap&eacute; -Redes Sociais-)' );
register_nav_menu( 'rss', 'Este &eacute; o menu de rodap&eacute; -RSS-)' );
register_nav_menu( 'sobre_o_site', 'Este &eacute; o menu de rodap&eacute; -Sobre o Site-)' );
}


// cria as áreas de widgets
if ( function_exists('register_sidebar') ) {

	register_sidebar(array( // destaques centrais
	'name'=>'Destaques',
	'description' => 'Area de destaques',
	'before_widget' => '<li>',
	'after_widget' => '</li>',
	'before_title' => '',
	'after_title' => '',
	));

	register_sidebar(array( // banners da direita
	'name'=>'Banners',
	'description' => 'Area de banners',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
	));

}

// remove dos widgets o nome do mesmo
function foo_widget_title($title) {
    return '';
}
add_filter('widget_title', foo_widget_title);


// funções extras (redes sociais e etc)
require_once "functions_extra.php";


// remove admin bar
add_filter( 'show_admin_bar', '__return_false' );


// desabilita captions de imagens de posts colocados automaticamente
// add_filter('disable_captions', create_function('$a','return true;'));


// limpa o head
remove_action( 'wp_head' , 'feed_links_extra' , 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head' , 'feed_links' , 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head' , 'rsd_link'  ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head' , 'wlwmanifest_link'  ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head' , 'index_rel_link'  ); // index link
remove_action( 'wp_head' , 'adjacent_posts_rel_link_wp_head'  ); // Display relational links for the posts adjacent to the current post
remove_action( 'wp_head' , 'parent_post_rel_link' , 10, 0 ); // prev link
remove_action( 'wp_head' , 'start_post_rel_link' , 10, 0 ); // start link
remove_action( 'wp_head' , 'rel_canonical' , 10, 0 ); // start link
remove_action( 'wp_head' , 'wp_generator'  ); // Display the XHTML generator that is generated on the wp_head hook, WP version


// remove as classes adicionais das listas do menu
function remove_page_class($wp_list_pages) {
	// $pattern = '/\<li class="page_item[^>]*>/';
	// $replace_with = '<li>';

	$pattern = '/page_item/';
	$replace_with = '';
	$wp_list_pages = preg_replace($pattern, $replace_with, $wp_list_pages);

	$pattern = ' page-item';
	$replace_with = 'page';
	$wp_list_pages = str_replace($pattern, $replace_with, $wp_list_pages);

	$pattern = 'current_';
	$replace_with = 'current ';
	$wp_list_pages = str_replace($pattern, $replace_with, $wp_list_pages);

	return $wp_list_pages;
}

add_filter('wp_list_pages', 'remove_page_class');


// adiciona suporte a imagem destacada nos posts
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 480, 360, true );
add_image_size( 'thumb', 560, 316, true ); // 472, 268
add_image_size( 'square', 250, 250, true );


// remove atributos adicionais dos thumbnails
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
  $html = preg_replace( '/(width|height)=\"(\d*|.+)\"\s/', "", $html );
  return $html;
}


// corrige conversão automática do --
// add_filter( 'the_content' , 'mh_un_en_dash' , 50 );
function mh_un_en_dash( $content ) {
  $content = str_replace( '&#8211;' , '--' , $content );
  return $content;
}

// reduz o tamanho do título
function the_truncate_title($limit = 65,$titulo) {
	//get_the_title($post->ID)
  $title = strip_tags($titulo);
  if(strlen($title) > $limit) {
      $title = substr($title, 0, $limit) . ' [...]';
  }

  echo $title;
}


// tempo humano (3 dias atrás)
function time_ago( $type = 'post' ) {
	$d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';

	return human_time_diff($d('U'), current_time('timestamp')) . " " . __('atrás');
}


// http://code.smrth.com/code/is_parent-wordpress-function/
function is_page_parent($page_id, $parent) {
	$page = get_page($page_id);
	if($page->post_parent == $parent) {
		return true;
	}
	return false;
}

function is_page_ancestor($page_id, $ancestor) {
	$page = get_page($page_id);
	if($page->post_parent) {
		$parent = get_page($page->post_parent);
		if($parent->post_parent == $ancestor) {
			return true;
		}
	}
	return false;
}


//
add_action( 'wp_print_styles', 'deregister_aec_styles', 100 );
function deregister_aec_styles() {
  wp_deregister_style( 'custom' );
}

// substitui as classes do link editar
function custom_edit_post_link($output) {
 // $output = str_replace('class="post-edit-link"', 'class="edit-pencil"', $output);
 return $output;
}
add_filter('edit_post_link', 'custom_edit_post_link');


// remove meta boxes da tela de posts
function remove_default_post_screen_metaboxes() {
	// remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
	// remove_meta_box( 'postexcerpt','post','normal' ); // Excerpt Metabox
	// remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Metabox
	// remove_meta_box( 'slugdiv','post','normal' ); // Slug Metabox
	remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
	remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
}
add_action('admin_menu','remove_default_post_screen_metaboxes');


// remove meta boxes da tela de páginas
function remove_default_page_screen_metaboxes() {
	// remove_meta_box( 'postcustom','page','normal' ); // Custom Fields Metabox
 	// remove_meta_box( 'postexcerpt','page','normal' ); // Excerpt Metabox
	// remove_meta_box( 'commentstatusdiv','page','normal' ); // Comments Metabox
	// remove_meta_box( 'slugdiv','page','normal' ); // Slug Metabox
 	remove_meta_box( 'trackbacksdiv','page','normal' ); // Talkback Metabox
 	remove_meta_box( 'authordiv','page','normal' ); // Author Metabox
}
add_action('admin_menu','remove_default_page_screen_metaboxes');


// edita o título da página
function page_title() {

	if (function_exists('is_tag') && is_tag()) {
     single_tag_title("Arquivado em: ");
     echo ' - ';
	} elseif (is_archive()) {
     echo wp_title('Arquivo: ');
     echo ' - ';
  } elseif (is_search()) {
     echo 'Busca: ' . get_search_query();
     echo ' - ';
  } elseif (!(is_404()) && (is_single()) || (is_page())) {
     wp_title('');
     echo ' - ';
  } elseif (is_404()) {
     echo 'Página não encontrada';
     echo ' - ';
	}

	bloginfo('name');

	if ($paged > 1) {
     echo ' - página '. $paged;
	}
}


// lista os campos personalizados (usados para estados)
function list_custom_fields($metakey, $output) {
	// based on http://sixrevisions.com/wordpress/custom-fields-search/
	global $wpdb;
	$items = $wpdb->get_col($wpdb->prepare("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", $metakey) );
	if ($items) {
		if ($output == "dropdown") { // display values in a select
			echo "<form action=\"/\" method=\"get\"><input type=\"hidden\" name=\"key\" value=\"$metakey\" /><select name=\"s\" onchange=\"this.form.submit();\"><option>Selecione</option>";
			foreach ($items as $item) {
			  echo "<option value=\"" . $item . "\">" . $item . "</option>";
			}
			echo "</select></form>";
		} else if ($output == "list") { // display values in a list
			echo "<ul>";
			foreach ($items as $item) {
			  echo "<li><a href=\"/?s=$item&key=$metakey\">$item</a></li>";
			}
			echo "</ul>";
		}
	}
}


// gera url curta
function getTinyUrl($url) {
  $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$url);
  return $tinyurl;
}


// breadcrumbs
function breadcrumbs() {
	global $post;

	if ((is_page() && !is_front_page()) || is_home() || is_category() || is_single() || is_search() || is_tag()) 
	{
		echo '<div id="viewlet-above-content"><div id="portal-breadcrumbs">';
		echo '<span id="breadcrumbs-home"> <a href="' . get_bloginfo('url') . '">P&Aacute;gina Inicial</a><span class="breadcrumbSeparator"> &gt; </span></span>';		
		
		$post_ancestors = get_post_ancestors($post);
		if ($post_ancestors) 
		{
			$count =0;
			$post_ancestors = array_reverse($post_ancestors);
			foreach ($post_ancestors as $crumb)
			{
				$count = $count + 1;
				echo  '<span dir="ltr" id="breadcrumbs-' . $count . '"><a href="'.get_permalink($crumb).'">'.get_the_title($crumb).'</a><span class="breadcrumbSeparator"> &gt; </span></span>';
			}
		}

		if (is_search()) 
		{

			if ( isset($_GET['key']) && $_GET['key'] == 'state' ) 
			{

				echo '<span dir="ltr"><a href="' . get_bloginfo('url') . '/category/noticias">Notícias</a><span class="breadcrumbSeparator"> &gt;</span></span>';
				echo '<span dir="ltr"><a href="/?key=state&s=' . get_search_query() .'" class="current">'. get_search_query() . '</a><span class="breadcrumbSeparator"> &gt; </span></span>';

			} 
			else 
			{
				echo '<span dir="ltr"><a href="/?s=' . get_search_query() .'" class="current">Busca: '. get_search_query() . '</a><span class="breadcrumbSeparator"> &gt; </span></span>';
			}

			echo '</div></div>';
			return true;
		}

		if (is_tag()) 
		{
			echo '<span dir="ltr"><a href="#" class="current">Assunto: '. single_tag_title("", false) . '</a><span class="breadcrumbSeparator"> &gt; </span></span>';
			echo '</div></div>';
			return true;
		}

		if (is_category() || is_single()) 
		{

			if (is_single()) 
			{
				echo '<span dir="ltr"><a href="' . get_bloginfo('url') . '/category/assuntos">Assunto</a><span class="breadcrumbSeparator"> &gt; </span></span>';
				$category = get_the_category();
				echo '<span dir="ltr"><a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a><span class="breadcrumbSeparator"> &gt; </span></span>';

			} 
			else 
			{
				echo '<span dir="ltr"><a href="' . get_bloginfo('url') . '/category/assuntos">Assunto</a><span class="breadcrumbSeparator"> &gt; </span></span>';
				$category = get_the_category();
				echo '<span dir="ltr"><a href="'.get_category_link($category[0]->cat_ID).'" class="current">'.$category[0]->cat_name.'</a></span>';
				echo '</div></div>';
				return true;

			}
		}

		if (!is_category() || !is_search()) 
		{
			echo '<span dir="ltr"><a href="'.get_permalink().'" class="current">'.get_the_title().'</a></span>';
		}
		echo '</div></div>';
	}
}


// http://www.codedevelopr.com/articles/re-write-all-asset-urls-in-wordpress/
// https://gist.github.com/2315295
function cd_flush_rewrites() {
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}
//adiciona os rewrites do .htaccess para o thema wpgovbr
function cd_add_rewrites($content) {
	global $wp_rewrite;
	$cd_new_non_wp_rules = array(
		'css/(.*)' => 'wp-content/themes/wpgovbr/css/$1',
		'js/(.*)' => 'wp-content/themes/wpgovbr/js/$1',
		'img/(.*)' => 'wp-content/themes/wpgovbr/img/$1',
		'plugins/(.*)' => 'wp-content/plugins/$1'
		);
	$wp_rewrite->non_wp_rules += $cd_new_non_wp_rules;
	return $content;
}

add_action('admin_init', 'cd_flush_rewrites');

function cd_clean_urls($content) {
	if (strpos($content, '/wp-content/plugins') === 0) {
		return str_replace('/wp-content/plugins', wp_base_dir() . '/plugins', $content);
	} else {
		return str_replace('/wp-content/themes/sae2010', '', $content);
	}
}
/* 
*************************** estava buggado - todo: descobrir porque o cd_add_rewrites está cortando o arquivo htaccess ao meio.... *****************************
if (!is_multisite() && !is_child_theme()) {
	add_action('generate_rewrite_rules', 'cd_add_rewrites');

	if (!is_admin()) {
		$tags = array(
			'plugins_url',
			'bloginfo',
			'stylesheet_directory_uri',
			'template_directory_uri',
			'script_loader_src',
			'style_loader_src'
			);
		foreach($tags as $tag) {
			add_filter($tag, 'cd_clean_urls');
		}
	}
}
*************************************************************************************************** */

// reescreve a url de busca
function search_url_rewrite_rule() {

	if (is_search() && !empty($_GET['s'])) {

		global $wp_query;
    if ($wp_query->post_count == 1) {
      wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
      exit();
    }

		// wp_redirect("/search/" . urlencode(get_query_var('s')));
		// exit();
	}
}

add_action('template_redirect', 'search_url_rewrite_rule');


// paginação dos posts em uma página estática
// http://design.sparklette.net/teaches/how-to-add-wordpress-pagination-without-a-plugin/
function pagination($pages = '', $range = 3) {
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}

	if(1 != $pages) {
		echo "<ul class=\"pagination\">";
		//echo "<li>P&aacute;gina ".$paged." de ".$pages."</li>";
		
		if($paged > 1 && $showitems < $pages) echo "<li><a class='anterior' href='".get_pagenum_link($paged - 1)."'>&lsaquo; Anterior</a></li>";
		
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><div><a href='".get_pagenum_link(1)."'>1</a></div></li><li> <span class='reticencias'>...</span></li>";

		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems))
			{
				echo ($paged == $i)? "<li class=\"current\"><span>" . $i . "</span></li>" : "<li><div><a href='".get_pagenum_link($i)."' class=\"inactive\">" . $i . "</a></div></li>";
			}
		}

		if ($paged < $pages-$range &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li> <span class='reticencias'>...</span></li><li><div><a href='".get_pagenum_link($pages)."'>" . $pages . "</a></div></li>";
		if ($paged < $pages && $showitems < $pages) echo "<li><a class='proximo' href=\"".get_pagenum_link($paged + 1)."\">Pr&oacute;ximo &rsaquo;</a></li>";
		
		echo "</ul>\n";
	}
}


// acrescenta o link 'Leia mais' ao resumo do texto
function excerpt_ellipse($text) {
   return str_replace('[...]', '[...] <a href="'.get_permalink().'">Continue lendo</a>', $text);
}
add_filter('get_the_excerpt', 'excerpt_ellipse');


// gera uma operação matemática de captcha
function challenge_check($comment_id) {
    global $wpdb, $user_ID, $comment_count_cache;

    if ($user_ID) {
        return;
    }

    $hash = $_POST['challenge_hash'];
    $challenge = md5($_POST['challenge']);
    $post_id = $_POST['comment_post_ID'];

    if ($hash != $challenge) {
        $wpdb->query("DELETE FROM {$wpdb->comments} WHERE comment_ID = {$comment_id}");
        $count = $wpdb->get_var("select count(*) from $wpdb->comments where comment_post_id = {$post_id} and comment_approved = '1'");
        $wpdb->query("update $wpdb->posts set comment_count = {$count} where ID = {$post_id}");
        wp_die(__('Desculpe, mas a conta não está correta.'));
    }
}


function challenge_form() {
    global $user_ID;

    if ($user_ID) {
        return;
    }

    $nums = array(rand(1,4), rand(1,4));
    $n1 = max($nums[0], $nums[1]);
    $n2 = min($nums[0], $nums[1]);
    $challenge = ($n1 + $n2);
    $hash = md5($challenge);

    $question = "Valida&ccedil;&atilde;o: quanto &eacute; {$n1} + {$n2}?";
    $field = '<input type="hidden" name="challenge_hash" id="challenge_hash" value="' . $hash . '" /><input type="text" name="challenge" id="challenge" placeholder="' . $question . '" tabindex="4" class="required" />';
    echo $field;
}

add_action('comment_post', 'challenge_check');
add_action('comment_form', 'challenge_form');


// customiza os comentários
// http://codex.wordpress.org/Function_Reference/wp_list_comments
function mps_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>
<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">

		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>

		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 64 ); ?>


<?php if ($comment->comment_approved == '0') : ?>
		<b>Seu comentário aguarda aprova&ccedil;ão</b>
		<br />
<?php endif; ?>

		<?php comment_text() ?>

		<div class="meta clearfix">
		<?php printf(__('Escrito por %s'), get_comment_author_link()) ?> - <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?> <?php edit_comment_link('Editar',' - ', '' ); ?>
		<span class="date"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" title="Link para esse comentário"><?php comment_date('d/m/Y H:i'); ?></a></span>
		</div>

		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
<?php
        }
?>



<?php 
// importanto a pagina de config. do tema dentro do admin do wordpress
 require_once(TEMPLATEPATH . '/functions/admin-menu.php'); 
?>

<?php
/**
 * Track post views without a plugin using post meta
 *
 * http://wpsnipp.com/index.php/functions-php/track-post-views-without-a-plugin-using-post-meta/
 */
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
?>



