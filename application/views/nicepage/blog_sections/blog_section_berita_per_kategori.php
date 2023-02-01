<section id="<?php echo $section_id;?>" class="section mb-4"> 
	<div class="container"> 	
			<?php 
				$section_berita_per_kategori_judul = ''; 
				$jumlah_berita = 0;
				$kategori_id = 0;
				if( isset($section_setting['kategori']) ) {
					$kategori_id = (int) $section_setting['kategori'];
					$kategori_data = $this->model_utama->view_where('kategori',array('id_kategori' => $kategori_id))->row_array();
					$section_berita_per_kategori_judul = $kategori_data['nama_kategori'];
				}

				if( isset($section_setting['jumlah']) ) {
					$jumlah_berita = (int) $section_setting['jumlah'];
				} 
			?> 		 

		<div class="row">
			<div class="col-md-12">
				<div class="row-blog card shadow"> 
					<?php if(!empty($section_berita_per_kategori_judul)) { ?>
					<h5 class="card-header">
						<?php 
							echo $section_berita_per_kategori_judul;
						?>
					</h5>
					<?php } ?>
					<div class="card-body">
						<ul>
							<?php 
								$this->load->helper('text'); 
								$berita_list = $this->model_utama->view_join_two(
									'berita',
									'users',
									'kategori',
									'username',
									'id_kategori',
									array(
										'berita.status' => 'Y', 
										'berita.id_kategori' => $kategori_id
									),
									'tanggal','DESC',0,$jumlah_berita
								)->result_array(); 
								foreach ($berita_list as $berita) { 
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
											<div class="post-body>
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