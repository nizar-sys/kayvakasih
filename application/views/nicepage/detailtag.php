<?php 
$base_path = FCPATH;
?>
<div class="post-head mb-4"> 
Berita Tag "<?php echo "$rows[nama_tag]"; ?>"
</div>
		<div class="row"> 
			<?php
			   foreach ($beritatag->result_array() as $r) {	
				  $baca = $r['dibaca']+1;	
				  $isi_berita =(strip_tags($r['isi_berita'])); 
				  $isi = substr($isi_berita,0,220); 
				  $isi = substr($isi_berita,0,strrpos($isi," ")); 
				  $judul = $r['judul']; 
				  $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r['id_berita']))->num_rows(); 
				  $img_src = base_url()."asset/foto_berita/no-image.jpg";
				  if ($r['gambar'] !== '' &&  file_exists( $base_path ."asset/foto_berita/".($r['gambar']) ) ){
						$img_src = base_url()."asset/foto_berita/". $r['gambar'];
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
							<a href="<?php echo base_url().$r['judul_seo'];?>">
								<h3 class="card-title"><?php echo $judul;?></h3>
							</a>
							<div class="post-meta">
								<i class="fa fa-calendar"></i> <?php echo tgl_indo($r['tanggal']); ?> ,
								<i class="fa fa-user"></i> <?php echo "$r[nama_lengkap]"; ?>,
								<a href="<?php echo base_url()."kategori/detail/$r[kategori_seo]"; ?>">
									<b><?php echo "$r[nama_kategori]"; ?></b>
								</a> 
							</div>
							<div class="card-text">
								<?php echo $isi;  ?>
							</div>
							<?php 
							if( !empty($r['tag'])) {
								$tags = explode(",",$r['tag']);							
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
							<a href="<?php echo base_url().$r['judul_seo'];?>" class="read-more">
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