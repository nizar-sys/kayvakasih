<?php
$lihat = $rows['dilihat']+1;
$total_komentar = $this->model_utama->view_where('komentarvid',array('id_video' => $rows['id_video']))->num_rows();
?>	 
<div class="video-detail card shadow mb-4">
	<div class="video-container">
		<?php
			if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $rows['youtube'], $match)) {
				echo "<iframe width='855px' height='500px' src='https://www.youtube.com/embed/".$match[1]."' frameborder='0' allowfullscreen></iframe>";
			}
		?>
	</div>
	<div class="card-body">
		<h2 class="card-title">
		<?php echo $rows['jdl_video']; ?>
		</h2>
		<div class="post-meta"> 			
			<i class="fa fa-calendar"></i> <?php echo tgl_indo($rows['tanggal']) ; ?> , 
			<i class="fa fa-user" aria-hidden="true"> </i> <?php echo $rows['nama_lengkap']; ?>
			<a href="<?php echo base_url()."playlist/detail/".$rows['playlist_seo']; ?>">
				<b><?php echo $rows['jdl_playlist']; ?></b>
			</a>
			 
		</div> 
		<div class="card-text"> 
			<?php echo $rows['keterangan']; ?>
		</div> 
	</div>	

	<div class="card-footer">  
		<?php include 'partials/share.php';?>
	</div>
</div>  




<?php
$vdiklan = $this->model_utama->view_where_ordering_limit('iklantengah',array('posisi'=>'detail_video'),'id_iklantengah','ASC',0,5);
if(!empty($vdiklan)){
	foreach ($vdiklan->result_array() as $ia) {		
		echo '<div class="my-4">';
		echo "<a href='$ia[url]' target='_blank'>";
			$string = $ia['gambar'];
			if ($ia['gambar'] != ''){
				if(preg_match("/swf\z/i", $string)) {
					echo "<embed style='margin-top:-10px' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' width='100%' height=90px quality='high' type='application/x-shockwave-flash'>";
				} else {
					echo "<img width='100%' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' title='$ia[judul]' />";
				}
			}
		echo "</a>";
		echo "</div>";
		if (trim($ia['source']) != ''){ echo "$ia[source]"; }
	}
}
?>
 
<div class="related-video card mb-4 shadow">
		<h5 class="card-header">
			Random Video
		</h5>
		<div class="card-body"> 
			<ul> 
				<?php					
				$randvideo = $this->model_utama->view_ordering_limit('video','id_video','RANDOM',0,5);
				foreach ($randvideo->result_array() as $r2) {												  
				?>
				<li> 
					<a href="<?php echo base_url()."playlist/watch/". $r2['video_seo'];?>">
					<i class="fa fa-file-video-o"></i> <?php echo $r2['jdl_video'];?>
					</a>
				</li>
				<?php
				}  
				?> 
			</ul>
		</div>
</div>

<?php include 'partials/komentar_video.php';?> 