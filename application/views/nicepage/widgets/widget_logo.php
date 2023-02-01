<div class="widget card mb-4 widget-logo">	
	<div class="card-body">
	<?php
		$zoom_logo = 100;
		if( isset($widget_setting['zoom']) ) {  
			$zoom_logo = ((int) $widget_setting['zoom'] * 10);
		} 
		$logo_website = $this->model_utama->view('logo')->row_array();	 
		$base_path = FCPATH;
		if ( $logo_website['gambar'] !== '' &&  file_exists( $base_path ."asset/logo/".$logo_website['gambar'] ) ){
			$img_src = base_url() ."asset/logo/".$logo_website['gambar'] ;
			?> 
				<img  src="<?php echo $img_src ;?>" alt="logo" style="width:<?php echo $zoom_logo;?>%;"> 
			<?php
		} 
	?>
	</div>
</div>