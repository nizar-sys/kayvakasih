<div class="widget card mb-4 widget-pengumuman ">
		<?php 			
			$jumlah_pengumuman = 0;
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
				$jumlah_pengumuman = (int) $widget_setting['jumlah'];
			}
			$tampilkan_gambar =  1;
			if( isset($widget_setting['tampilkan_gambar']) ) {
				$tampilkan_gambar = (int) $widget_setting['tampilkan_gambar'];
			}
		?>
	<div class="card-body">
		<ul> 
			<?php  
				$pengumuman = $this->db->query("
					SELECT
						* 
					FROM
						tbl_nicepage_pengumuman 
					ORDER BY
						id_pengumuman DESC
					LIMIT 0,".$jumlah_pengumuman
				)->result_array();   
				foreach ($pengumuman as $item) { 
					$img_src= base_url().'asset/img_nicepage/pengumuman/no-image.jpg';
					if ($item['gambar'] !==''){
						$img_src =base_url().'asset/img_nicepage/pengumuman/'.$item['gambar'];
					} 
					$img_size = getimagesize($img_src);
					$class_image= ($img_size[0] > $img_size[1]) ? 'landscape':'portrait'; 
					?>
					<li class="list-post"> 
						<?php if($tampilkan_gambar == 1) { ?>
						<a href="<?php echo base_url().$item['judul_seo'];?>">
							<div class="post-img-container">
								<div class="thumbnail">
									<div class="center">
										<img class="<?php echo $class_image;?>" src="<?php echo $img_src;?>" title="image" />
									</div>
								</div>
							</div>							
						</a>
						<?php } ?>
						<div class="post-content" 
							<?php if($tampilkan_gambar == 0) { ?>
								style="min-height: auto;padding: 0;"
							<?php } ?>
							> 
							<a href="<?php echo base_url('pengumuman/detail/'.$item['judul_seo']);?>" >
								<h5 class="post-header">										
									<?php echo $item['judul'];?> 
								</h5>
							</a>  
								<div class="post-meta">
									<i class="fa fa-clock-o"></i> <?php echo tgl_indo($item['tanggal']);?> 
								</div>
						</div>
					</li>
					<?php

				}
			?> 
		</ul>
    </div>
</div>