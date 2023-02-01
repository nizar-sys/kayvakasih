<?php 
	$base_path = FCPATH;
?>
<div class="post-head mb-4"> 
	<?php echo $rows['judul']; ?> 
</div>  
<div class="blog card shadow detail mb-4">
	<?php
		if (!empty($rows['gambar']) &&  file_exists( $base_path ."asset/foto_statis/".($rows['gambar']) ) ){
			$img_src = base_url()."asset/foto_statis/". $rows['gambar'];
			?>	 
				<img src="<?php echo $img_src;?>" alt="<?php echo  $rows['gambar'];?>" class="card-img-top"> 
			<?php
	  	}
		?> 
	<div class="card-body"> 
		<div class="card-text">
			<?php echo "$rows[isi_halaman]";?>
		</div> 
	</div>

	<div class="card-footer">  
		<?php include 'partials/share.php';?>
	</div>
</div>
	<?php
	$iiklan = $this->model_utama->view_where_ordering_limit('iklantengah',array('posisi'=>'hal_statis'),'id_iklantengah','ASC',0,5);
	foreach ($iiklan->result_array() as $ia) {
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