<?php

/**
 * @package Floating Video Player
 * @version 1.0
 */
/*
Plugin Name: Floating Video Player
Description: A plugin to play Video in a Floating Player with option of playing MP4 and FLV video.
Author: Sanjay Singh Negi
Plugin URI: 
Version: 1.0
Author URI: 

*/
global $wpdb;

add_action('admin_menu', 'my_menu');


function my_menu() {
add_menu_page($page_title = __('My Player'), $menu_title = __('My Player'), $capability = 'administrator', $menu_slug = 'my-player', $function = 'my_player', $icon_url = '');
}


function my_player(){
	
include_once('menu-page.php');
	
	
}



function addplayer(){
	
?>	

<?php 
$path =  get_bloginfo('url');
	   
$target = $path."/wp-content/plugins/flash-play/upload/".get_option('video-name');


if(get_option('format')=="flv"){
?>




<script type="text/javascript" src="<?php bloginfo('url'); ?>\wp-content\plugins\flash-play\flash_player\js\swfobject.js"></script>
<script type="text/javascript">

  var flashvars = {};
  flashvars.skinName = "<?php bloginfo('url'); ?>/wp-content/plugins/flash-play/flash_player/skins/Clear_Skin_3";
  flashvars.streamName = "<?php bloginfo('url'); ?>/wp-content/plugins/flash-play/upload/<?php echo get_option('video-name'); ?>";
  var params = {};
  params.wmode = "transparent";
  flashvars.autoPlay = "<?php echo get_option('autoplay'); ?>"
  params.play = "true";
  var attributes = {};
  attributes.id = "main_movie";
  swfobject.embedSWF(
            "",
            "",
            "50",
            "100",
            "9.0.0",
            false,
            flashvars,
            params,
            attributes
        );

  
  swfobject.embedSWF("<?php bloginfo('url'); ?>/wp-content/plugins/flash-play/flash_player/player/FLVPlayer_Progressive.swf", "alt_content", "640", "368", "9.0.0", false, flashvars, params, attributes);

</script>

<div id="alt_content">
 
</div>
<?php }
else{ ?>

<link href="<?php bloginfo('url'); ?>\wp-content\plugins\flash-play\flash_player\video-js\video-js.css" rel="stylesheet" type="text/css">
<script src="<?php bloginfo('url'); ?>\wp-content\plugins\flash-play\flash_player\video-js\video.js"></script>	
 <script>
    _V_.options.flash.swf = "video-js.swf";
  </script>	

<video id="mp_player" class="video-js vjs-default-skin" <?php if(get_option('autoplay')=="true"){ echo "autoplay"; } ?> controls preload="none" width="<?php echo get_option('width'); ?>" height="<?php echo get_option('height'); ?>"
      
      data-setup="{}">
    <source src="<?php bloginfo('url'); ?>/wp-content/plugins/flash-play/upload/<?php echo get_option('video-name'); ?>" type='video/mp4' />
    <track kind="captions" src="captions.vtt" srclang="en" label="English" />
  </video>


<?php }
 ?>

  
  <style type="text/css">
  #main_movie{
	  position:fixed !important;
	  background:transparent !important;
	  z-index:9999;
	height:<?php echo get_option('height'); ?>px;
	width:<?php echo get_option('width'); ?>px !important;
	<?php 
	if(get_option('top')>0){
	?>
	top:<?php echo get_option('top');  ?>px;
	<?php } 
	if(get_option('bottom')>0){	?>  
	bottom:<?php echo get_option('bottom');  ?>px;  
	<?php } ?>
	<?php
	if(get_option('left')>0){	?>  
	left:<?php echo get_option('left');  ?>px;  
	<?php } ?>
	<?php
	if(get_option('right')>0){	?>  
	right:<?php echo get_option('right');  ?>px;  
	<?php } ?>
	
	
	
	
	}
	
#mp_player{
	  position:fixed !important;
	  background:transparent !important;
	  z-index:9999;
	height:<?php echo get_option('height'); ?>px;
	width:<?php echo get_option('width'); ?>px !important;
	<?php 
	if(get_option('top')>0){
	?>
	top:<?php echo get_option('top');  ?>px;
	<?php } 
	if(get_option('bottom')>0){	?>  
	bottom:<?php echo get_option('bottom');  ?>px;  
	<?php } ?>
	<?php
	if(get_option('left')>0){	?>  
	left:<?php echo get_option('left');  ?>px;  
	<?php } ?>
	<?php
	if(get_option('right')>0){	?>  
	right:<?php echo get_option('right');  ?>px;  
	<?php } ?>
	
	
	
	
	}	
	
	
  
  
  </style>






<?php }
add_action('wp_head','addplayer'); ?>