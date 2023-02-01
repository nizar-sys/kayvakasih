<section id="<?php echo $section_id;?>" class="section mb-4"> 
	<div class="container"> 
				<?php 
					$section_berita_pilihan_judul = ''; 
					$jumlah_berita = 0;
					if( isset($section_setting['judul']) ) {
						if( !empty(trim($section_setting['judul']))) {
							$section_berita_pilihan_judul = $section_setting['judul'];
						}
					}

					$filter_berita = array();
					if( isset($section_setting['group']) ) {
						$group_berita =  $section_setting['group'];
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
	

					if( isset($section_setting['jumlah']) ) {
						$jumlah_berita = (int) $section_setting['jumlah'];
					} 
				?>   
 

 		<div class="row">
			<div class="col-md-12">
				<div class="row-blog card shadow"> 
					<?php if(!empty($section_berita_pilihan_judul)) { ?>
					<h5 class="card-header">
						<?php 
							echo $section_berita_pilihan_judul;
						?>
					</h5>
					<?php } ?>
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
										'tanggal','DESC',0,$jumlah_berita
								)->result_array(); 

								foreach ($berita_pilihan as $berita) { 
									$tgl = tgl_indo($berita['tanggal']); 
									$isi = word_limiter(strip_tags($berita['isi_berita']),20); 
									
									$img_src= base_url().'asset/foto_berita/small_no-image.jpg';
									if ($berita['gambar'] !==''){
										$img_src =base_url().'asset/foto_berita/'.$berita['gambar'];
									}  
								?>
									<li>
											<div class="post-img-container"
												style="
													background:url('<?php echo $img_src;?>');
													background-position:center;
													background-size:cover;
													background-repeat:no-repeat;
												"> 
											</div> 
											<div class="post-body">
												<a href="<?php echo base_url().$berita['judul_seo'];?>"  > 
													<h4 class="post-header">
														<?php echo $berita['judul'];?> 
													</h4>
												</a>
												<div class="post-meta pt-1"> 
													<i class="fa fa-calendar"></i> <?php echo tgl_indo($berita['tanggal']); ?> ,
													<i class="fa fa-user"></i> <?php echo "$berita[nama_lengkap]"; ?>,
													<a href="<?php echo base_url()."kategori/detail/$berita[kategori_seo]"; ?>">
														<b><?php echo "$berita[nama_kategori]"; ?></b>
													</a>
												</div>
												<div class="post-content pt-1">
													<?php echo $isi;?> 
												</div>
												
												<a href="<?php echo base_url().$berita['judul_seo'];?>" class="read-more"> 
												 Selengkapnya
												</a>
											</div>
									</li>
								<?php
								}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>    
					  
	</div>  
</section>