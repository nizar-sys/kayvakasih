<?php 
$base_path = FCPATH;
?>
<div class="post-head mb-4">
	<?php echo "$rows[jdl_album]"; ?>
</div> 
<div class="row">
	<div class="col-lg-12">
		<div class="blog-detail card shadow mb-4">
			<div class="card-body">
				<div class="card-text">
					<?php echo "$rows[keterangan]"; ?>
				</div>			 
					<?php				
					$no = 1+$this->uri->segment(4); 
					foreach ($detailalbum->result_array() as $h) {	
						if (trim($h['gbr_gallery'])==''){ 
							$gbr_gallery = 'no-image.jpg'; 
						} else { 
							$gbr_gallery = $h['gbr_gallery']; 
						}
						?>
			 
							<h3 class="card-title">
								<?php echo $no." ".$h['jdl_gallery'];?>
							</h3>						
							<img src="<?php echo base_url()."asset/img_galeri/".$gbr_gallery;?>" alt="<?php echo $h['jdl_gallery'];?>" class="card-img-top" />
							<div class="card-text">
								<?php echo $h['keterangan']; ?>
							</div>
							<?php
							$no++;
						}
					?> 	
				<div class="post-meta">
				<i class="fa fa-calendar" aria-hidden="true"></i> <?php echo tgl_indo($rows['tgl_posting']); ?> , 
				<i class="fa fa-user" aria-hidden="true"> </i> <?php echo $rows['nama_lengkap']; ?> , 
					dilihat <?php echo ($rows['hits_album']+1); ?> x
				</div>
			</div>

			<div class="card-footer">  
				<?php include 'partials/share.php';?>
			</div>
		</div>
		<div class='pagination'>
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>	
</div>		
<?php
$bfiklan = $this->model_utama->view_where_ordering_limit('iklantengah',array('posisi'=>'berita_foto'),'id_iklantengah','ASC',0,5);
foreach ($bfiklan->result_array() as $ia) {
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
