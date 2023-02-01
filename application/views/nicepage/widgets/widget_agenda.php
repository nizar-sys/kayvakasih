<div class="widget card mb-4 widget-agenda ">
		<?php 			
			$jumlah_agenda = 0;
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
				$jumlah_agenda = (int) $widget_setting['jumlah'];
			}
			$tampilkan_gambar =  1;
			if( isset($widget_setting['tampilkan_gambar']) ) {
				$tampilkan_gambar = (int) $widget_setting['tampilkan_gambar'];
			}
		?>
	<div class="card-body">
		<ul> 
			<?php  
				$agenda = $this->db->query("
					SELECT
						* 
					FROM
						agenda
					WHERE
						tgl_mulai >= curdate()
					ORDER BY
						tgl_mulai asc
					LIMIT 0,".$jumlah_agenda
				)->result_array();   
				foreach ($agenda as $item) { 
					$img_src= base_url().'asset/foto_agenda/no-image.jpg';
					if ($item['gambar'] !==''){
						$img_src =base_url().'asset/foto_agenda/'.$item['gambar'];
					} 
					$img_size = getimagesize($img_src);
					$class_image= ($img_size[0] > $img_size[1]) ? 'landscape':'portrait'; 
					?>
					<li class="list-post"> 
						<?php if($tampilkan_gambar == 1) { ?>
						<a href="<?php echo base_url().$item['tema_seo'];?>">
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
							<?php } ?>> 
							<a href="<?php echo base_url('agenda/detail/'.$item['tema_seo']);?>" >
								<h5 class="post-header">										
									<i class="fa fa-calendar-o"></i> <?php echo tgl_indo($item['tgl_mulai']);?> 
								</h5>
							</a> 
							<a href="<?php echo base_url('agenda/detail/'.$item['tema_seo']);?>" >
								<h5 class="post-header">	
									<?php echo $item['tema'];?> 
								</h5>
							</a> 
						</div>
					</li>
					<?php

				}
			?> 
		</ul>
    </div>
</div>