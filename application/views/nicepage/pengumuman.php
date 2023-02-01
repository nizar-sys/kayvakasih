<?php  
$get_section_pengumuman    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_pengumuman'))->row_array();
if(isset($get_section_pengumuman['value'])){
	if(!empty($get_section_pengumuman['value'])){
		$section_pengumuman = json_decode($get_section_pengumuman['value'],true);
	}
}

$base_path = FCPATH; 
?>
<div class="post-head mb-4">  
	Pengumuman
</div>
		<div class="row"> 
			<?php
			  $this->load->helper('text');
			  foreach ($get_pengumuman->result_array() as $pengumuman) {	 
				  if ($pengumuman['gambar'] !== '' &&  file_exists( $base_path ."asset/img_nicepage/pengumuman/".($pengumuman['gambar']) ) ){
						$img_src = base_url()."asset/img_nicepage/pengumuman/". $pengumuman['gambar'];
				  }
				  $isi = word_limiter(strip_tags($pengumuman['deskripsi']),20); 
				  ?> 
					<div class="col-md-12 mb-4">
						<div class="agenda card shadow h-100">
							<div class="row">
					  			<?php if( $section_pengumuman['gambar_halaman'] == '1') { ?>
								<div class="col-md-4">
									<div class="card card-image"> 
										<div class="image-container" 
												style="
													background:url('<?php echo $img_src;?>');
													background-position:center;
													background-size:cover;
													background-repeat:no-repeat
												">
										</div>  
									</div>
								</div>
								<?php } ?>
								<div class="col-md-<?php echo ($section_pengumuman['gambar_halaman'] == '1') ? '8' : '12';?>">
									<div class="card card-content">
										<div class="card-body">
											<a href="<?php echo base_url()."pengumuman/detail/".$pengumuman['judul_seo'];?>">
												<h3 class="card-title"><?php echo $pengumuman['judul'];?></h3>
											</a>
											<div class="post-meta"> 
												<i class="fa fa-calendar"></i> <?php echo  tgl_indo($pengumuman['tanggal']); ?> ,
												<i class="fa fa-user"></i> <?php echo $pengumuman['nama_lengkap']; ?> ,
												dilihat <?php echo $pengumuman['dibaca'];?> x 
											</div>

											<div class="card-text">
												<?php echo $isi;  ?>
											</div> 
											<a href="<?php echo base_url()."pengumuman/detail/".$pengumuman['judul_seo'];?>" class="read-more">
												Selengkapnya
											</a> 
										</div>
									</div>
								</div>
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