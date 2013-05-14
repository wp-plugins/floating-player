<?php

global $wpdb;

if(isset($_POST['url'])){
	
update_option('url',$_POST['url']);	
	
}






if(isset($_POST['height'])){
	
update_option('height',$_POST['height']);	
	
}


if(isset($_POST['width'])){
	
update_option('width',$_POST['width']);	
	
}


if(isset($_POST['top'])){
	
update_option('top',$_POST['top']);	
	
}


if(isset($_POST['bottom'])){
	
update_option('bottom',$_POST['bottom']);	
	
}


if(isset($_POST['left'])){
	
update_option('left',$_POST['left']);	
	
}


if(isset($_POST['right'])){
	
update_option('right',$_POST['right']);	
	
}

if(isset($_POST['autoplay'])){
	
update_option('autoplay',$_POST['autoplay']);	
	
}

if(!get_option('autoplay')){
update_option('autoplay',"true");		
	
}



if(isset($_POST['format'])){
	
update_option('format',$_POST['format']);	
	
}

if(!get_option('format')){
update_option('format',"flv");		
	
}





if($_FILES["upload"]["name"]!=""){
	
update_option('video-name',$_FILES["upload"]["name"]);	
	}



if ($_FILES["upload"]["error"] > 0)
  {
  //echo "Error: " . $_FILES["upload"]["error"] . "<br>";
  }
else
  {

	$target_path = dirname(__FILE__) . '/upload/';

	//update_option('video-name',$_FILES["upload"]["name"]);	
  move_uploaded_file($_FILES["upload"]["tmp_name"],$target_path.$_FILES["upload"]["name"]);
  
  }




?>


<style type="text/css">
.my_player{
width: 340px;
margin: 50px auto;
background: rgb(236, 236, 236);
height: 670px;
padding-top: 30px;
padding-left: 65px;
color: #000;
font-size: 15px;
text-shadow: 1px 1px 2px rgba(150, 150, 150, 1);
-webkit-box-shadow: 3px 3px 6px rgba(99, 99, 99, 1);
-moz-box-shadow:    3px 3px 6px rgba(99, 99, 99, 1);
box-shadow:         3px 3px 6px rgba(99, 99, 99, 1);

}
.form
{
width:600px;
}

label
{
display:block;
margin: 5px 0px 7px 10px;
}
input[type="text"]
{
width: 280px;
height: 31px !important;
font-size: 18px;
}

input[type="submit"]
{
width: 280px;
height: 40px;
margin-top: 10px;
font-size: 18px;
color:#000;
text-shadow: 3px 3px 6px rgba(99, 99, 99, 1);
font-weight: bold;
}

select
{
width: 280px;
height: 31px !important;
font-size: 18px;

}

h1
{
text-align:center;
text-shadow: 3px 3px 6px rgba(99, 99, 99, 1);
font-size: 46px;
color:rgb(236, 236, 236);
}

</style>
<h1>My Player Settings</h1>
<div class="my_player">

<form action="" method="post" enctype="multipart/form-data">


<label>Upload Video(Only Mp4 and Flv)</label><input type="file" name="upload" id="upload"  />
<label><?php echo get_option('video-name'); ?></label>
<br />

<label>Format Type</label><select name="format">
<option value="flv"
<?php if(get_option('format')=="flv"){
echo "selected='selected'";	
} ?>
>FLV</option>
<option value="mp4" <?php if(get_option('format')=="mp4"){
echo "selected='selected'";	
} ?>>MP4</option>

</select><br />


<label>Autoplay</label><select name="autoplay">
<option value="true"
<?php if(get_option('autoplay')=="true"){
echo "selected='selected'";	
} ?>
>On</option>
<option value="false" <?php if(get_option('autoplay')=="false"){
echo "selected='selected'";	
} ?>>Off</option>

</select><br />

<label>Height</label><input type="text" name="height" value="<?php echo get_option('height'); ?>" /><br />
<label>Width</label><input type="text" name="width" value="<?php echo get_option('width'); ?>" /><br />
<label>Margin Top (Y)</label><input type="text" name="top" value="<?php echo get_option('top'); ?>" /><br />
<label>Margin Bottom (-Y)</label><input type="text" name="bottom" value="<?php echo get_option('bottom'); ?>" /><br />
<label>Margin Left (X)</label><input type="text" name="left" value="<?php echo get_option('left'); ?>" /><br />
<label>Margin Right (-X)</label><input type="text" name="right" value="<?php echo get_option('right'); ?>" /><br />
<input type="submit" value="Save All Settings" />

</form></div>