<div class="widget card mb-4 posts-widget"> 
		<?php  
			$jumlah_berita = 0;
			if( isset($widget_setting['judul']) ) {
				if( !empty(trim($widget_setting['judul']))) {
					?>					
					<h5 class="card-header">
						<?php echo $widget_setting['judul'];?>
					</h5>
					<?php 
				}
			}


			$filter_berita = array();
			if( isset($widget_setting['group']) ) {
				$group_berita =  $widget_setting['group'];
				if(!empty(trim($group_berita))) {
					switch ($group_berita) {
						case 'headline':
							$filter_berita = array('berita.headline' => 'Y');
							break;
						case 'pilihan':								
							$filter_berita = array('berita.aktif' => 'Y');
							break;
						case 'utama':	
							$filter_berita = array('berita.utama' => 'Y');
							break; 
					}
				}
			} 

			if( isset($widget_setting['jumlah']) ) {
				$jumlah_berita = (int) $widget_setting['jumlah'];
			}  
		?>  
	<div class="card-body">
		<ul> 
				<?php 
					$this->load->helper('text');
 

					$filter_berita = array_merge($filter_berita,array(
						'berita.status' => 'Y'
					));

					$berita_pilihan = $this->model_utama->view_join_two(
							'berita',
							'users',
							'kategori',
							'username',
							'id_kategori',
							$filter_berita,
							'tanggal','DESC',0,$jumlah_berita);


					foreach ($berita_pilihan->result_array() as $i => $berita) {
					$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $berita['id_berita']))->num_rows();
		
					$img_src= base_url().'asset/foto_berita/small_no-image.jpg';
					if ($berita['gambar'] !==''){
						$img_src =base_url().'asset/foto_berita/'.$berita['gambar'];
					} 
					$img_size = getimagesize($img_src);
					$class_image= ($img_size[0] > $img_size[1]) ? 'landscape':'portrait';
					?>
					<li class="list-post">
							<a href="<?php echo base_url().$berita['judul_seo'];?>">
								<div class="post-img-container">
									<div class="thumbnail">
										<div class="center">
											<img class="<?php echo $class_image;?>" src="<?php echo $img_src;?>" title="image" />
										</div>
									</div>
								</div>							
							</a>
							<div class="post-content"> 
								<a href="<?php echo base_url().$berita['judul_seo'];?>" >
									<h5 class="post-header">										
										<?php echo word_limiter( strip_tags($berita['judul']),8);?>  
									</h5>
								</a> 
								<div class="post-meta">
									<i class="fa fa-clock-o"></i> <?php echo tgl_indo($berita['tanggal']);?>  
								</div>
							</div>
					</li>
					<?php
					}
				?> 
		</ul>
	</div>
</div>