<?php
/*
Plugin Name: OSC Slider
Plugin URI: http://development.rajasekar.co.in/osclass/
Description: This plugin shows the JQuery Slideshow Where Ever You Want. Design modified by DrizzleThemes.com
Version: 2.5
Author: RajaSekar
Author URI: http://rajasekar.co.in/
Short Name: OSC Slider
*/
require_once( osc_plugins_path() . 'slider/ModelSlider.php' ) ;
function slider_install() {
	ModelSlider::newInstance()->import('slider/struct.sql') ;
	$aFields = array(
	's_internal_name' => 'slider'
	);
	osc_set_preference('backgroundcolor', '#333333','Slider','STRING');
	osc_set_preference('bordercolor', '#FFFFFF','Slider','STRING');
	osc_set_preference('borderwidth', '0','Slider','STRING');
	osc_set_preference('shadowcolor', '#333333','Slider','STRING');
	osc_set_preference('width', '0','Slider','STRING');
	osc_set_preference('height', '400','Slider','STRING');
	osc_set_preference('caption', '1','Slider','BOOLEAN');
	osc_set_preference('text', '1','Slider','BOOLEAN');
	osc_set_preference('link', '0','Slider','BOOLEAN');
	osc_set_preference('openin', '0','Slider','BOOLEAN');		
	osc_set_preference('auto', '1','Slider','BOOLEAN');
	osc_set_preference('pager', '0','Slider','BOOLEAN');
	osc_set_preference('navigation', '1','Slider','BOOLEAN');
	osc_set_preference('speed', '500','Slider','STRING');
}
function slider_uninstall() {
	try {
		Page::newInstance()->deleteByInternalName('slider');
		ModelSlider::newInstance()->uninstall();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	osc_delete_preference('backgroundcolor','Slider');
	osc_delete_preference('bordercolor','Slider');
	osc_delete_preference('borderwidth','Slider');
	osc_delete_preference('shadowcolor','Slider');
	osc_delete_preference('width','Slider');
	osc_delete_preference('height','Slider');
	osc_delete_preference('caption','Slider');
	osc_delete_preference('text','Slider');
	osc_delete_preference('link','Slider');
	osc_delete_preference('openin','Slider');
	osc_delete_preference('auto','Slider');
	osc_delete_preference('pager','Slider');
	osc_delete_preference('navigation','Slider');
	osc_delete_preference('speed','Slider');
}
function slider_admin_menu() {
	echo '<h3><a href="#">Slider</a></h3>
	<ul>
		<li><a href="'.osc_admin_render_plugin_url("slider/create.php").'">&raquo; ' . __('Create', 'Slider') . '</a></li>
		<li><a href="'.osc_admin_render_plugin_url("slider/list.php").'">&raquo; ' . __('Manage', 'Slider') . '</a></li>
		<li><a href="'.osc_admin_render_plugin_url("slider/settings.php").'">&raquo; ' . __('Settings', 'Slider') . '</a></li>
		<li><a href="'.osc_admin_render_plugin_url("slider/help.php").'">&raquo; ' . __('F.A.Q. / Help', 'Slider') . '</a></li>
	</ul>';
}
function slider_admin_head() {
?>
<style>
.ico-Slider{
	background-image: url('<?php echo osc_base_url().'oc-content/plugins/slider/slider-thumb.png'; ?>') !important;
}
body.compact .ico-Slider{
	background-image: url('<?php echo osc_base_url().'oc-content/plugins/slider/slider-thumb.png'; ?>') !important;
	background-size: 35px, 35px;
}
</style>
<?php
}
function getSliderBackgroundColor() {
	return(osc_get_preference('backgroundcolor', 'Slider')) ;
}
function getSliderBorderColor() {
	return(osc_get_preference('bordercolor', 'Slider')) ;
}
function getSliderBorderWidth() {
	return(osc_get_preference('borderwidth', 'Slider')) ;
}
function getSliderShadowColor() {
	return(osc_get_preference('shadowcolor', 'Slider')) ;
}	
function getSliderWidth() {
	return(osc_get_preference('width', 'Slider')) ;
}
function getSliderHeight() {
	return(osc_get_preference('height', 'Slider')) ;
}	
function getSliderCaption() {
	return(osc_get_preference('caption', 'Slider')) ;
}
function getSliderText() {
	return(osc_get_preference('text', 'Slider')) ;
}
function getSliderLink() {
	return(osc_get_preference('link', 'Slider')) ;
}
function getSliderOpenIn() {
	return(osc_get_preference('openin', 'Slider')) ;
}
function getSliderAuto() {
	return(osc_get_preference('auto', 'Slider')) ;
}	
function getSliderPager() {
	return(osc_get_preference('pager', 'Slider')) ;
}	
function getSliderNavigation() {
	return(osc_get_preference('navigation', 'Slider')) ;
}
function getSliderSpeed() {
	return(osc_get_preference('speed', 'Slider')) ;
}
function osc_slider() { 
?>
	<?php $slides = ModelSlider::newInstance()->getSlider(); ?>
	<div id="sliders"<?php if ( ModelSlider::newInstance()->getSlider() ) { ?> class="slidefix"<?php } ?>>	
	<div class="rslides_container">
	<ul class="rslides" id="slider">
	
	<?php foreach($slides as $slide) { ?>
		<li>
        	<img src="<?php echo osc_base_url().'oc-content/plugins/slider/images/'.$slide['uniqname']; ?>" alt="<?php echo $slide['imagename']; ?>">
			<?php if(getSliderCaption() ==1){ ?>
			<div class="carousel-caption">

				<h1 style="font-size: 15px; color: #F2F2F2; font-family: Verdana;">  HEADLINES <h1> 

            	<h1><?php echo $slide['caption']; ?></h1>
                <?php if(getSliderText() ==1){ ?>
                <div style="font-style : italic;  font-size: 20px; " class="rs-description"><?php echo $slide['text']; ?></p>
                <?php } ?>
                <?php if(getSliderLink() ==1){ ?>
                <a style="color: #61D844; font-weight: bold; font-size: 15px; font-style : normal ;" class="rs-morebtn" href="<?php echo $slide['link'];?>" <?php if(getSliderOpenIn() ==1) { echo 'target="_blank"'; } ?>><?php _e("Read more", 'flatter');?></a></p>
                <?php } ?>
            </div>
			<?php } ?>
		</li>
		<?php } ?>
	</ul>
	</div>
	</div>
	<?php
}function slider_head() {
	osc_enqueue_style('responsiveslides', osc_base_url().'oc-content/plugins/slider/responsiveslides.css');	
	osc_register_script('responsiveslides.min',osc_base_url().'oc-content/plugins/slider/responsiveslides.min.js');
	osc_enqueue_script('responsiveslides.min');
}function slider_js_Head() {
	?>
	<style type="text/css">
	#sliders{
background: <?php echo getSliderBackgroundColor(); ?>;
border: <?php echo getSliderBorderWidth(); ?>px solid <?php echo getSliderBorderColor(); ?>;
		/*box-shadow: 1px 1px 4px <?php //echo getSliderShadowColor(); ?>;*/
		<?php if(getSliderWidth() != 0){ echo 'width: '.getSliderWidth().'px'; } ?>
	}
	.rslides img {
		<?php if(getSliderHeight() == 0){ echo 'height: 100%;'; } else { echo 'height: '.getSliderHeight().'px'; }?>
	}
	</style>
	<script type='text/javascript'>
	jQuery(document).ready(function() {
		$("#slider").responsiveSlides({
			<?php if(getSliderAuto() == 0){ echo 'auto: false,'; }?>
			<?php if(getSliderPager() == 1){ echo 'pager: true,'; }?>
			<?php if(getSliderNavigation() == 1){ echo 'nav: true,'; }?>
speed: <?php echo getSliderSpeed(); ?>,
namespace: "sliderstyle"
		});
	});
	</script>
	<?php 
}		
/**
	* ADD HOOKS
	*/
osc_register_plugin(osc_plugin_path(__FILE__), 'slider_install');
osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'slider_uninstall');
//Header
osc_add_hook('admin_header', 'slider_admin_head');
osc_add_hook('header', 'slider_head');
osc_add_hook('header', 'slider_js_Head', 10);
// Admin menu
if(osc_version() <= 241) {
	osc_add_hook('admin_menu', 'slider_admin_menu');
} else {
	osc_add_admin_menu_page(__('OSC Slider', 'Slider'), '#', 'Slider');
	osc_add_admin_submenu_page('Slider', __('Create','Slider'), osc_admin_render_plugin_url(osc_plugin_path(dirname(__FILE__)) . '/create.php'), 'Slider_Create');
	osc_add_admin_submenu_page('Slider', __('Manage','Slider'), osc_admin_render_plugin_url(osc_plugin_path(dirname(__FILE__)) . '/list.php'), 'Slider_Manage');
	osc_add_admin_submenu_page('Slider', __('Settings','Slider'), osc_admin_render_plugin_url(osc_plugin_path(dirname(__FILE__)) . '/settings.php'), 'Slider_Settings');
	osc_add_admin_submenu_page('Slider', __('F.A.Q. / Help','Slider'), osc_admin_render_plugin_url(osc_plugin_path(dirname(__FILE__)) . '/help.php'), 'Slider_Help');
}?>