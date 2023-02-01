<div class="widget card mb-4 widget-video">	
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

	$filter_video = array();
	if( isset($widget_setting['playlist']) ) {
		$playlist =  $widget_setting['playlist'];
		if(!empty(trim($playlist))) { 
			$filter_video = array('playlist.id_playlist' => (int) $playlist );
		}
	} 


	$jumlah_video = 0;
	if( isset($widget_setting['jumlah']) ) {
		$jumlah_video = (int) $widget_setting['jumlah'];
	} 
?>
<?php  	

	
	$filter_video = array_merge($filter_video,array(
		'playlist.aktif' => 'Y'
	));   

	$video_data = $this->model_utama->view_join_one(
		'video',
		'playlist',
		'id_playlist', 
		$filter_video,
		'video.jdl_video','ASC',0,$jumlah_video
	)->result_array();   
	 
	if(!empty($video_data)) {
		?>
		<div class="list-video">
		<?php
		foreach ($video_data as $video){ 
			$img_src= base_url().'asset/img_video/small_no-image.jpg';
			if ($video['gbr_video'] !==''){
				$img_src =base_url().'asset/img_video/'.$video['gbr_video'];
			}  
			?>
			<div class="item-video"> 
				<a href="<?php echo base_url('playlist/watch/'.$video['video_seo']);?>">
					<div class="post-img-container"
						style="
							background:url('<?php echo $img_src;?>');
							background-position:center;
							background-size:cover;
							background-repeat:no-repeat
						">  
						<i class="fa fa-play-circle-o" aria-hidden="true"></i>
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