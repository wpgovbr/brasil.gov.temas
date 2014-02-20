<?php
/**
 * Plugin Name: WP GOV BR THEME SETTINGS
 * Plugin URI: http://www.sae.gov.br
 * Description: Permite a alteração das configurações de Layout do Tema desenvolvido pela SAE.
 * Version: 1.0
 * Author: Andre Luiz Montenegro de Castro
 * Author URI: http://www.sae.gov.br
 * License: GPL2
 */
 
/////////////////////////////////////////////////////////////////////////////////
// Global Define
////////////////////////////////////////////////////////////////////////////////
define('TEMPLATE_DOMAIN', 'WP.GOV.BR'); // do not change this, its for translation and options string
define('SUPER_STYLE', 'no');

$theme_data = wp_get_theme( TEMPLATE_DOMAIN );
$theme_version = $theme_data['Version'];
$theme_name = $theme_data['Name'];
$shortname = 'tn_'.TEMPLATE_DOMAIN;
$choose_count = array("Select a number","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20");

/** Adciona o hook do menu */
if ( is_admin() ){ // admin actions
  add_action( 'admin_menu', 'wp_gov_br_catcolor_theme_menu' );
  add_action( 'admin_init', 'wp_gov_br_register_settings' );
} else {
  // non-admin enqueues, actions, and filters
}

/** Função que cria o menu. O menu chama a função wp_gov_br_cat_color_options, que monta a tela de config do plugin*/
function wp_gov_br_menu() {
	add_options_page( 'Cores das Categorias', 'Config. WP.GOV.BR', 'manage_options', 'wpgovbr_cat_colors', 'wp_gov_br_cat_color_page' );
}

function wp_gov_br_catcolor_theme_menu() {
global $theme_name;
add_theme_page( $theme_name . __(' Cores das Categorias', TEMPLATE_DOMAIN), __('Config. WP.GOV.BR', TEMPLATE_DOMAIN), 'administrator', __FILE__, 'wp_gov_br_cat_color_page');
//add_theme_page('wpgovbr', 'wpgovbr', 'administrator', __FILE__, 'build_options_page');
}
/**
 * Função para registrar as propriedades
 */
function wp_gov_br_register_settings() {

	wp_enqueue_script( 'theme-color-picker-js', get_template_directory_uri() . '/js/colorpicker.js', array( 'jquery' ), $theme_version );
	wp_enqueue_script( 'theme-option-custom-js', get_template_directory_uri() . '/js/options-custom.js', array( 'jquery' ), $theme_version );
	wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/css/admin.css', array(), $theme_version );
	wp_enqueue_style( 'color-picker-main', get_template_directory_uri() . '/css/colorpicker.css', array(), $theme_version );
	wp_enqueue_style( 'uniform-css', get_template_directory_uri() . '/js/uniform/css/uniform.default.css', array(), $theme_version );

	// Register the settings with Validation callback
	register_setting( 'wp_gov_br_theme_options', 'wp_gov_br_theme_options', 'wp_gov_br_validate_settings' );

	// cat color options setting
	add_settings_section( 'wp_gov_br_catcolor_section'		, __('', TEMPLATE_DOMAIN)	, 'call_back_catcolor_section'		, 'page_category-color' );
	
	add_settings_section( 'wp_gov_br_configgeral_section'	, __('', TEMPLATE_DOMAIN)	, 'call_back_config_geral_section'	, 'page_config-geral' );

	$previous_ops = get_option('wp_gov_br_cor_caixa_generica');
    add_settings_field
	( 
        'wp_gov_br_cor_caixa_generica',             // ID used to identify the field throughout the theme
        'Cor da caixa genérica',                    // The label to the left of the option interface element
        'wp_gov_br_catcolor_display_setting',   	// The name of the function responsible for rendering the option interface
        'page_config-geral',                        // The page on which this option will be displayed
        'wp_gov_br_configgeral_section',         	// The name of the section to which this field belongs
        array('type'      => 'colorpicker',			// Args passed to call back function
			  'section'   => 'catcolor',
			  'id'        => 'wp_gov_br_cor_caixa_generica',
			  'name'      => 'Cor da caixa genérica',
			  'desc'      => 'Caixas genéricas, como Biblioteca e Documentos...',
			  'std'       => '',
			  'preops'    => $previous_ops,
			  'label_for' => 'Cor da caixa genérica',
			  'class'     => ''
			)
    );
	
	
	$cat_ID = get_cat_ID( 'Assuntos' ) ;

	$args = array
	(
		'child_of'                 => $cat_ID,
		'orderby'                  => 'name',
		'order'                    => 'ASC',
		'hide_empty'			   => 0,
		'hierarchical'			   => 'false',
		'parent' 				   => $cat_ID
	); 

	$categories2 = get_categories($args);
	
	
	$categories2[] = get_category(68); //Cadernos temáticos
	$categories2[] = get_category(65); //Apoio à atuação internacional do Brasil
	$wp_cats2 = array();
	foreach ($categories2 as $cat_value ) 
	{
		$cat_id = $cat_value->term_id;
		$cat_name = $cat_value->name;

		$cat_value_option = 'tn_cat_color_' . $cat_id;
		$previous_ops = get_option($cat_value_option);
		$description = $cat_value->description;
		// Create textbox field
			$field_args = array(
			  'type'      => 'colorpicker',
			  'section'   => 'catcolor',
			  'id'        => $cat_value_option,
			  'name'      => $cat_name,
			  'desc'      => $description,
			  'std'       => '',
			  'preops'    => $previous_ops,
			  'label_for' => $cat_name,
			  'class'     => ''
			);
		add_settings_field( $cat_value_option, $cat_name, 'wp_gov_br_catcolor_display_setting', 'page_category-color', 'wp_gov_br_catcolor_section', $field_args );
		//add_settings_field( $cat_value_option, $cat_name, 'wp_gov_br_catcolor_display_setting', 'page_category-color', $section = 'default', $field_args );
	}

}

//validate all options
function wp_gov_br_validate_settings($input) {
global $wp_gov_br_options,$wp_cats2,$wp_pages;
$option_name = 'wp_gov_br_theme_options';
$newinput = get_option( $option_name );
foreach($input as $k => $v) {
$newinput[$k] = trim($v);
$newinput[$k] = wp_filter_post_kses($v);
}
return $newinput;
}

/** Função que monta a tela de opções de cor das categorias */
function wp_gov_br_cat_color_page() {
global $theme_name;
?>
    <!--<div class="icon32" id="icon-tools"> -->
	
	<div id="custom-theme-option" class="wrap">
	<?php screen_icon('themes');?>
	<h2>Op&ccedil;&otilde;es do tema wpgovbr</h2> 
	<?php
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'cor_categorias';
	?>

	
	<h2 class="nav-tab-wrapper">
		
		<a href="?page=var/www/html/portal/wp-content/themes/wpgovbr/functions/admin-menu.php&tab=cor_categorias" class="nav-tab <?php echo $active_tab == 'cor_categorias' ? 'nav-tab-active' : ''; ?>">Cor das Categorias</a>	
		<a href="?page=var/www/html/portal/wp-content/themes/wpgovbr/functions/admin-menu.php&tab=config_gerais" class="nav-tab  <?php echo $active_tab == 'config_gerais' ? 'nav-tab-active' : ''; ?>">Configurações Gerais</a>
	</h2>		
	
		<?php if ( isset($_GET['settings-updated']) && false !== $_REQUEST['settings-updated'] ) : ?>
		<?php echo '<div class="updated fade"><p><strong>'. $theme_name . __(': As configurações foram salvas.', TEMPLATE_DOMAIN) . '</strong></p></div>'; ?>
		<?php if( get_option('_wp_gov_br_clear_db') ) { update_option('_wp_gov_br_clear_db', '2'); } ?>
		<?php endif; ?>
		<?php if ( isset($_POST['action']) && $_POST['action'] == 'settings-reset'  ) : ?>
		<?php echo '<div class="updated fade"><p><strong>'. $theme_name . __(' As configurações foram apagadas.', TEMPLATE_DOMAIN) . '</strong></p></div>'; ?>
		<?php endif;?>
		<form id="wp-theme-options" method="post" action="options.php" >
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('SALVAR', TEMPLATE_DOMAIN) ?>" />
			</p>
		<?php
				switch ( $active_tab ) 
				{
					case 'cor_categorias':
						
						settings_fields('wp_gov_br_theme_options');
						do_settings_sections('page_category-color');
						break;
					case 'config_gerais':
						
						settings_fields('wp_gov_br_theme_options');
						do_settings_sections('page_config-geral');
						break;
					default;
						break;
				}
			?>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('SALVAR', TEMPLATE_DOMAIN) ?>" />
			</p>
		</form>
	</div>
<?php
}


function call_back_catcolor_sobre_section($section){
echo "<h3>Defina as cores das categorias do Menu sobre</h3>";
echo "<p>A cor defina aparecerá na caixa de título, textos, ícones de seleção etc</p>";
}
function call_back_catcolor_section($section){
echo "<h3>Defina as cores das categorias no tema WP.GOB.BR</h3>";
echo "<p>A cor defina aparecerá na caixa de título, textos, ícones de seleção etc</p>";
}
function call_back_config_geral_section($section){}

function wp_gov_br_catcolor_display_setting($args) 
{
	global $theme_name, $shortname;
	extract( $args );
	$option_name = 'wp_gov_br_theme_options';
	$options = get_option( $option_name );

	switch ( $type ) 
	{
		case 'colorpicker':
			$options[$id] = !empty($options[$id]) ? $options[$id] : "";
			$options[$id] = stripslashes($options[$id]);
			$options[$id] = esc_attr( $options[$id]);
			?>
			<div id="<?php echo $id . '_picker'; ?>" class="colorSelector">
			<div style="background-color:<?php if( $options[$id] ) { echo $options[$id]; } ?>"></div></div>&nbsp;
			<input class="of-color" name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>" type="text" value="<?php if( $options[$id] ) { echo $options[$id]; } else { echo $preops; } ?>" />
			<?php if($desc != '') { ?>
			<br /><label class="description" for="<?php echo $label_for; ?>">&nbsp;&nbsp;&nbsp;<?php printf(__('Escolha uma cor para %1$s', TEMPLATE_DOMAIN), $desc); ?></label>
			<?php } ?>
		<?php
		break;
		default;
		break;
	}
}

//reset category color options
function wp_gov_br_catcolor_reset() 
{
	global $wpdb, $wp_cats2, $wp_pages, $theme_name, $shortname, $wp_gov_br_options;
	$option_name = 'wp_gov_br_theme_options';
	$options = get_option( $option_name );
	if ( isset($_GET['page']) && $_GET["page"] == "theme-options" && isset($_GET['tab']) && $_GET["tab"] == "cor_categorias" ) 
	{
		if ( isset($_POST['action']) && $_POST['action'] == 'settings-reset' ) 
		{
			foreach ($wp_cats2 as $cat_value) 
			{
				$cat_id = get_cat_ID($cat_value);
				if(!$cat_id) 
				{
					$cat_name = get_term_by('name', $cat_value, 'product_cat');
					$cat_id = $cat_name->term_id;
				}
				$cat_value_option = 'tn_cat_color_' . $cat_id;
				$options[$cat_value_option] = '';
			}
			foreach ( $wp_gov_br_options as $val )
			{
				$options[$val['id']] = $options[$val['id']];
			}
			foreach ($wp_pages as $page_value) 
			{
				$page_id = $page_value;
				$page_title = get_the_title( $page_id );
				$page_value_option = 'tn_page_color_' . $page_id;
				$options[$page_value_option] = $options[$page_value_option];
			}
			$options['custom_css'] = $options['custom_css'];
			update_option( $option_name, $options );
		}
	}
}
add_action('admin_head', 'wp_gov_br_catcolor_reset');



?>