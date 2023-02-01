<?php 
$base_path = FCPATH; 
$tgl_posting   = tgl_indo($pengumuman['tanggal']);
$tanggal   = tgl_indo($pengumuman['tanggal']); 
$baca = $pengumuman['dibaca']+1; 
?>	

<div class="post-head mb-4"> 
Pengumuman
</div> 
<div class="agenda card shadow"> 
		<?php 
			if (!empty($pengumuman['gambar']) &&  file_exists( $base_path ."asset/img_nicepage/pengumuman/".($pengumuman['gambar']) ) ){
				$img_src = base_url()."asset/img_nicepage/pengumuman/". $pengumuman['gambar'];
				?>	 	
				<?php
			}
		?> 
		<div class="image-container">
			<img src="<?php echo $img_src;?>" alt="<?php echo  $pengumuman['gambar'];?>" class="card-img-top">
		</div>
	<div class="card-body">
		<h2 class="card-title">
			<?php echo $pengumuman['judul']; ?>
		</h2> 
		<div class="post-meta"> 
			<i class="fa fa-calendar"></i> <?php echo  tgl_indo($pengumuman['tanggal']); ?> ,
			<i class="fa fa-user"></i> <?php echo $pengumuman['nama_lengkap']; ?> ,
			dilihat <?php echo $pengumuman['dibaca'];?> x 
		</div>
		<div class="card-text">	 
			<?php echo $pengumuman['deskripsi'];?> 
		</div> 
	</div>
	<div class="card-footer">  
		<?php include 'partials/share.php';?>
	</div>
</div>


<?php
$aiklan = $this->model_utama->view_where_ordering_limit('iklantengah',array('posisi'=>'detail_agenda'),'id_iklantengah','ASC',0,5);
if(!empty($aiklan)){
	?>
	<div class="mt-4">
	<?php
	foreach ($aiklan->result_array() as $ia) {
		echo "<a href='$ia[url]' target='_blank'>";
			$string = $ia['gambar'];
			if ($ia['gambar'] != ''){
				if(preg_match("/swf\z/i", $string)) {
					echo "<embed style='margin-top:-10px' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' width='100%' height=90px quality='high' type='application/x-shockwave-flash'>";
				} else {
					echo "<img style='margin-top:-10px; margin-bottom:5px' width='100%' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' title='$ia[judul]' />";
				}
			}
		echo "</a>";
		if (trim($ia['source']) != ''){ echo "$ia[source]"; }
	}
	?>
	</div>
	<?php
}
?> 