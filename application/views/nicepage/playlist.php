<?php 
$base_path = FCPATH;
?>
<div class="post-head mb-4"> 
	Playlist
</div>   
<div class="row"> 
	<?php 
		$no=$this->uri->segment(3)+1;
		foreach ($playlist->result_array() as $h) {	
		$total_video = $this->model_utama->view_where('video',array('id_playlist' => $h['id_playlist']))->num_rows();			
		$img_src = base_url()."asset/img_playlist/no-image.jpg";
		if ($h['gbr_playlist'] !== '' &&  file_exists( $base_path ."asset/img_playlist/".$h['gbr_playlist'] ) ){
			  $img_src = base_url()."asset/img_playlist/".$h['gbr_playlist'];
		}	
		?>
		<div class="col-md-6 mb-4">
			<div class="grid card shadow h-100">
				<div class="image-container" 
						style="
							background:url('<?php echo $img_src;?>');
							background-position:center;
							background-size:cover;
							background-repeat:no-repeat
						">
				</div>    
				<div class="card-body">
					<h3 class="card-title">
						<a href="<?php echo base_url()."playlist/detail/".$h['playlist_seo'];?>">
							<?php echo $h['jdl_playlist'];?>
						</a>
					</h3>
					<div class="card-text">
						<?php echo $total_video;?> Video
					</div> 
					<a href="<?php echo base_url()."playlist/detail/".$h['playlist_seo'];?>" class="read-more">
						Selengkapnya
					</a> 
				</div>
			</div>
		</div>	
		<?php
		}
	?> 
</div>  
<div class="pagination">
	<?php echo $this->pagination->create_links(); ?>
</div>