<?php 
$get_section_agenda    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_agenda'))->row_array();
if(isset($get_section_agenda['value'])){
	if(!empty($get_section_agenda['value'])){
		$section_agenda = json_decode($get_section_agenda['value'],true);
	}
}

$base_path = FCPATH;
?>
<div class="post-head mb-4"> 
Agenda
</div> 
<div class="row">
	<?php
      $this->load->helper('text');
	  foreach ($agenda->result_array() as $r) {	
		  $tgl_posting = tgl_indo($r['tgl_posting']);
		  $tgl_mulai   = tgl_indo($r['tgl_mulai']);
		  $tgl_selesai = tgl_indo($r['tgl_selesai']);
		  $baca = $r['dibaca']+1;
		  $judul = $r['tema']; 	
		  $isi = word_limiter(strip_tags($r['isi_agenda']),20); 	
		  $img_src = base_url()."asset/foto_agenda/small_no-image.jpg";
		  if ($r['gambar'] !== '' &&  file_exists( $base_path ."asset/foto_agenda/".($r['gambar']) ) ){
				$img_src = base_url()."asset/foto_agenda/". $r['gambar'];
		  }	
		  $user =  $this->model_utama->view_where('users',array('username' => $r['username'] ))->row_array();		  
		  $img_size = getimagesize($img_src);
		  $class_image= ($img_size[0] > $img_size[1]) ? 'landscape':'portrait'; 
		  ?>
			<div class="col-md-12 mb-4">
			  <div class="agenda card shadow h-100">
		  			<div class="row">
					  <?php if( $section_agenda['gambar_halaman'] == '1') { ?>
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
						<div class="col-md-<?php echo ($section_agenda['gambar_halaman'] == '1') ? '8' : '12';?>">
							<div class="card card-content">
								<div class="card-body">
									<a href="<?php echo base_url()."agenda/detail/".$r['tema_seo'];?>">
										<h3 class="card-title"><?php echo $judul;?></h3>
									</a>
									<div class="post-meta"> 
										<i class="fa fa-calendar"></i> <?php echo  $tgl_posting; ?> ,
										<?php if(!empty( $user['nama_lengkap'])) {?>
											<i class="fa fa-user"></i> <?php echo $user['nama_lengkap']; ?> ,
										<?php } ?>
										dilihat <?php echo $baca;?> x 
									</div>

									<div class="card-text">
										<?php echo $isi;  ?>
									</div> 
									<a href="<?php echo base_url()."agenda/detail/".$r['tema_seo'];?>" class="read-more">
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