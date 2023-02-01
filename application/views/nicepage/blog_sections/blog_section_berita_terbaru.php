<section id="<?php echo $section_id;?>" class="section mb-4"> 
	<div class="container">
		<div class="section-container">		
			<?php 
				$section_berita_terbaru_judul = '';
				$jumlah_berita = 0;
				if( isset($section_setting['judul']) ) {
					if( !empty(trim($section_setting['judul']))) {
						$section_berita_terbaru_judul = $section_setting['judul'];
					}
				}

				if( isset($section_setting['jumlah']) ) {
					$jumlah_berita = (int) $section_setting['jumlah'];
				}
			?> 
			<?php if(!empty($section_berita_terbaru_judul)) { ?>
				<div class="post-head mb-4">
					<?php echo $section_berita_terbaru_judul;?>
				</div>
			<?php } ?>
			<div class="section-body m-0"> 
				<div class="row">  
				<?php  
					
					$this->load->helper('text');
					$berita_populer = $this->model_utama->view_join_two(
						'berita','users','kategori','username','id_kategori',
						array('berita.status' => 'Y'),'tanggal','DESC',0,$jumlah_berita);

					foreach ($berita_populer->result_array() as $i => $berita) { 
						$img_src= base_url().'asset/foto_berita/no-image.jpg';
						$isi = word_limiter(strip_tags($berita['isi_berita']),20); 
						if ($berita['gambar'] !==''){
							$img_src =base_url().'asset/foto_berita/'.$berita['gambar'];
						}  
						?>
							<div class="col-md-6 mb-4">
			  					<div class="blog card shadow h-100">															

									<div class="image-container" 
											style="
												background:url('<?php echo $img_src;?>');
												background-position:center;
												background-size:cover;
												background-repeat:no-repeat
											">
									</div>  
									<div class="card-body">
										<a href="<?php echo base_url().$berita['judul_seo'];?>">
											<h3 class="card-title"><?php echo $berita['judul'];?></h3>
										</a>
										<div class="post-meta">
												<i class="fa fa-calendar"></i> <?php echo tgl_indo($berita['tanggal']); ?> ,
												<i class="fa fa-user"></i> <?php echo "$berita[nama_lengkap]"; ?>,
												<a href="<?php echo base_url()."kategori/detail/$berita[kategori_seo]"; ?>">
													<b><?php echo "$berita[nama_kategori]"; ?></b>
												</a> 
										</div>

										<div class="card-text">
											<?php echo $isi;  ?>
										</div>
										<?php 
										if( !empty($berita['tag'])) {
											$tags = explode(",",$berita['tag']);							
											$hitung = count($tags);	 
										?>
											<div class="tags">
											<i class="fa fa-tags"></i>
												<?php									
													$hitung = count($tags);
													for ($x=0; $x<=$hitung-1; $x++) {
														if ($tags[$x] != ''){
															echo "<a href='".base_url()."tag/detail/$tags[$x]'>$tags[$x]</a>";
														}
													}
												?>
											</div>
										<?php } ?>
										<a href="<?php echo base_url().$berita['judul_seo'];?>" class="read-more">
											Selengkapnya
										</a> 
									</div>
								</div>
							</div>  
						<?php 
					}
				?>  			
				</div>
			</div>
		</div>  
	</div>  
</section>