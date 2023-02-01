<div class="widget card mb-4 widget-sekilas-info"> 
		<?php  
			$jumlah_info = 0;
			if( isset($widget_setting['judul']) ) {
				if( !empty(trim($widget_setting['judul']))) {
					?>					
					<h5 class="card-header">
						<?php echo $widget_setting['judul'];?>
					</h5>
					<?php 
				}
			}
  
			if( isset($widget_setting['jumlah']) ) {
				$jumlah_info = (int) $widget_setting['jumlah'];
			}  
		?>  
	<div class="card-body">
		<ul> 
				<?php   
					$sekilas_info = $this->model_utama->view_where_ordering_limit(
							'sekilasinfo', 
							array(
								'aktif' => 'Y'
							),
							'tgl_posting','DESC',0,$jumlah_info); 
					foreach ($sekilas_info->result_array() as $i => $info) {  
						$img_src= base_url().'asset/foto_info/small_no-image.jpg';
						if ($info['gambar'] !==''){
							$img_src =base_url().'asset/foto_info/'.$info['gambar'];
						} 
						$img_size = getimagesize($img_src);
						$class_image= ($img_size[0] > $img_size[1]) ? 'landscape':'portrait';
						?>
						<li class="list-post"> 
									<div class="post-img-container">
										<div class="thumbnail">
											<div class="center">
												<img class="<?php echo $class_image;?>" src="<?php echo $img_src;?>" title="image" />
											</div>
										</div>
									</div>				 
								<div class="post-content">  
									<div class="post-meta">
										<i class="fa fa-clock-o"></i> <?php echo tgl_indo($info['tgl_posting']);?> 
									</div>
									<div class="post-text">										
										<?php echo  strip_tags($info['info']) ;?>  
									</div> 
								</div>
						</li>
						<?php
					}
				?> 
		</ul>
	</div>
</div>