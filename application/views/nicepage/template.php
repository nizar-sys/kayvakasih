<!DOCTYPE HTML>
<html lang = "id">
<head>
<?php
// set tagline
$get_tagline = $this->model_utama->view_where('tbl_nicepage',array('key' => 'tagline'))->row_array();
if(isset($get_tagline['value'])){
	if(!empty($get_tagline['value'])){
        $tagline = json_decode($get_tagline['value'],true);
	}
}
$tagline_header = '';
if( isset($tagline['text'])) {
	$tagline_header = !empty($tagline['text']) ? ' | '.$tagline['text'] : '';
}
?>
<title><?php echo $title; ?><?php echo $tagline_header;?> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index, follow">
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>"> 
	<meta name="robots" content="all,index,follow">
	<meta http-equiv="Content-Language" content="id-ID">
	<meta NAME="Distribution" CONTENT="Global">
	<meta NAME="Rating" CONTENT="General">
	<link rel="canonical" href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
	<?php if ($this->uri->segment(1)=='berita' AND $this->uri->segment(2)=='detail'){ $rows = $this->model_utama->view_where('berita',array('judul_seo' => $this->uri->segment(3)))->row_array();
	   echo '<meta property="og:title" content="'.$title.'" />
			 <meta property="og:type" content="article" />
			 <meta property="og:url" content="'.base_url().''.$this->uri->segment(3).'" />
			 <meta property="og:image" content="'.base_url().'asset/foto_berita/'.$rows['gambar'].'" />
			 <meta property="og:description" content="'.$description.'"/>';
	} ?>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/<?php echo favicon(); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss.xml" />

	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/main.css" />	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/themes/<?php echo background(); ?>.css" />	
      
	<?php include "partials/head.php"; ?>
</head>
<body class="responsive-menu-hide">
<div class="header">
	<?php  include "partials/header.php"; 	 ?>
</div> 	
<?php include "partials/nav_mobile.php"; ?>
<?php

    
    $get_mode = $this->model_utama->view_where('tbl_nicepage',array('key' =>  'mode')); 
    $mode = $get_mode->row_array(); 
    
	
	switch ($this->uri->segment(1)) {
		case 'teams':
		case 'portfolio':
			$main_file = "front-width.php";
			break;

		default:
		
			$main_file = "front-main.php";
			if( isset($mode['value'])) {

				if( json_decode($mode['value'],true) == '1' &&  ($this->uri->segment(1)=='main' OR $this->uri->segment(1)=='')){
					$main_file = "front-page.php";
				}
			}

			break;
	}

    include $main_file;
?>
<?php 
	include "partials/footer.php";	
?> 
<?php

$get_btn_to_top = $this->model_utama->view_where('tbl_nicepage',array('key' =>  'btn_back_to_top')); 
$btn_to_top = $get_btn_to_top->row_array(); 

if( isset($btn_to_top['value'])) {
	if( json_decode($btn_to_top['value'],true) == '1' ){
?>
<a id="back-to-top" href="#" style="display:none">
  <i class="fa fa-arrow-up" aria-hidden="true"></i>
</a> 	
<?php 
	} 
}
?>
<script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/vendor/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/main.js"></script>

<?php include "partials/foot.php"; ?>
</body>
</html>