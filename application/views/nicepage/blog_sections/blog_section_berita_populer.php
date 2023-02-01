<section id="<?php echo $section_id;?>" class="section mb-4"> 
	<div class="container"> 
				<?php 
					$section_populer_judul = ''; 
					$jumlah_berita = 0;
					if( isset($section_setting['judul']) ) {
						if( !empty(trim($section_setting['judul']))) {
							$section_populer_judul = $section_setting['judul'];
						}
					}
  
					if( isset($section_setting['jumlah']) ) {
						$jumlah_berita = (int) $section_setting['jumlah'];
					}
				?>  
		<div class="row">
			<div class="col-md-12 ">
				<div class="row-blog card shadow"> 
					<?php if(!empty($section_populer_judul)) { ?>
					<h5 class="card-header">
						<?php 
							echo $section_populer_judul;
						?>
					</h5>
					<?php } ?>
					<div class="card-body">
						<ul>
							<?php 
								$this->load->helper('text'); 
								$pilihan = $this->model_utama->view_join_two(
									'berita',
									'users',
									'kategori',
									'username',
									'id_kategori',
									array('berita.status' => 'Y'),
									'dibaca','DESC',0, $jumlah_berita
								);
								foreach ($pilihan->result_array() as $pi) {
								$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $pi['id_berita']))->num_rows();
								$tgl = tgl_indo($pi['tanggal']);
								$isi = word_limiter(strip_tags($pi['isi_berita']),20); 
								
								$img_src= base_url().'asset/foto_berita/small_no-image.jpg';
								if ($pi['gambar'] !==''){
									$img_src =base_url().'asset/foto_berita/'.$pi['gambar'];
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
												<a href="<?php echo base_url().$pi['judul_seo'];?>"  > 
													<h4 class="post-header">
														<?php echo $pi['judul'];?> 
													</h4>
												</a>
												<div class="post-meta pt-1"> 
													<i class="fa fa-calendar"></i> <?php echo tgl_indo($pi['tanggal']); ?> ,
													<i class="fa fa-user"></i> <?php echo "$pi[nama_lengkap]"; ?>,
													<a href="<?php echo base_url()."kategori/detail/$pi[kategori_seo]"; ?>">
														<b><?php echo "$pi[nama_kategori]"; ?></b>
													</a>
												</div>
												<div class="post-content pt-1">
													<?php echo $isi;?> 
												</div>
												
												<a href="<?php echo base_url().$pi['judul_seo'];?>" class="read-more"> 
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