<div class="widget card mb-4 widget-gallery">	
<?php   
	if( isset($widget_setting['judul']) ) {
		if( !empty(trim($widget_setting['judul']))) {
			?>
			<h5 class="card-header">
				<?php echo $widget_setting['judul'];?>
			</h5>
			<?php					
		}
	}

	$filter_gallery = array();
	if( isset($widget_setting['album']) ) {
		$album =  $widget_setting['album'];
		if(!empty(trim($album))) { 
			$filter_gallery = array('gallery.id_album' => (int) $album );
		}
	} 


	$jumlah_gallery = 0;
	if( isset($widget_setting['jumlah']) ) {
		$jumlah_gallery = (int) $widget_setting['jumlah'];
	} 
?>
<?php  	

	$filter_gallery = array_merge($filter_gallery,array(
		'album.aktif' => 'Y'
	));  
	$gallery_data = $this->model_utama->view_join_one(
		'gallery',
		'album',
		'id_album', 
		$filter_gallery,
		'gallery.jdl_gallery','ASC',0,$jumlah_gallery
	)->result_array();  
	 
	if(!empty($gallery_data)) {
		?>
		<div class="list-gallery">
		<?php
		foreach ($gallery_data as $gallery){ 
			$img_src= base_url().'asset/img_galeri/no-image.jpg';
			if ($gallery['gbr_gallery'] !==''){
				$img_src =base_url().'asset/img_galeri/'.$gallery['gbr_gallery'];
			}  
			?>
			<div class="item-gallery"> 
				<a href="<?php echo base_url('albums/detail/'.$gallery['album_seo']);?>"> 
					<div class="post-img-container"
						style="
							background:url('<?php echo $img_src;?>');
							background-position:center;
							background-size:cover;
							background-repeat:no-repeat
						">  
					</div>    
				</a>  
			</div>
			<?php
		}
		?>
		</div>
		<?php
	}
?>
</div>