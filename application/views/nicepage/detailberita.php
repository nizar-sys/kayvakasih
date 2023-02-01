<?php
	$baca = $rows['dibaca']+1;	
	$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $rows['id_berita'],'aktif' => 'Y'))->num_rows();
?>	
 
<div class="post-head mb-4"> 
	<?php echo $rows['judul'] ."<small>$rows[sub_judul] </small>"; ?>
</div>  
	<div class="blog-detail card shadow mb-4"> 
		<?php 
			if ($rows['gambar'] !=''){ 
				echo "<img style='width:100%' src='".base_url()."asset/foto_berita/$rows[gambar]' alt='$rows[judul]' /></a><br><br>"; 
			
				if ($rows['keterangan_gambar'] !=''){ 
					echo "<center><p><i><b>Keterangan Gambar :</b> $rows[keterangan_gambar]</i></p></center><br>"; 
				}	
			}								
			?>
		<div class="card-body"> 
			<div class="post-meta">   
				<i class="fa fa-calendar"></i> <?php echo tgl_indo($rows['tanggal']); ?> ,
				<i class="fa fa-user"></i> <?php echo "$rows[nama_lengkap]"; ?>,
				<a href="<?php echo base_url()."kategori/detail/$rows[kategori_seo]"; ?>">
					<b><?php echo "$rows[nama_kategori]"; ?></b>
				</a>
				 
			</div> 
				<div class="card-text">
				<?php echo $rows['isi_berita'];?>	 
				<?php
				echo "
					<div class='fb-like'  data-href='".base_url()."$rows[judul_seo]' 
						data-send='false'  data-width='600' data-show-faces='false'>
					</div> <br><br>"; 
					if ($rows['youtube']!=''){
						echo "<h4>Video Terkait:</h4>";
						if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $rows['youtube'], $match)) {
								echo "<iframe width='100%' height='350px' id='ytplayer' type='text/html'
									src='https://www.youtube.com/embed/".$match[1]."?rel=0&showinfo=1&color=white&iv_load_policy=3'
									frameborder='0' allowfullscreen></iframe><div class='garis'></div><br/>";
							} 
					}

				?>
				</div>

				<?php 
				if( !empty($rows['tag'])) {
					$tags = explode(",",$rows['tag']);							
					$hitung = count($tags);				
				?>
					<div class="tags">
					<i class="fa fa-tags"></i>
						<?php						
							for ($x=0; $x<=$hitung-1; $x++) {
								if ($tags[$x] != ''){
									echo "<a href='".base_url()."tag/detail/$tags[$x]'>$tags[$x]</a>";
								}
							}
						?>
					</div>
				<?php } ?>
			</div>
			
		<div class="card-footer">  
			<?php include 'partials/share.php';?>
		</div>
	</div>

	<?php
	$ia = $this->model_utama->view_ordering_limit('iklantengah','id_iklantengah','ASC',3,1)->row_array();
	if( !empty($ia)) {
		echo '<div class="my-4">';
		echo "<a href='$ia[url]' target='_blank'>";
			$string = $ia['gambar'];
			if ($ia['gambar'] != ''){
				if(preg_match("/swf\z/i", $string)) {
					echo "<embed src='".base_url()."asset/foto_iklantengah/$ia[gambar]' width='100%' height=90px quality='high' type='application/x-shockwave-flash'>";
				} else {
					echo "<img width='100%' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' title='$ia[judul]' />";
				}
			}
		echo "</a>";
		echo '</div>';
	}
	?>
			

	<?php
	
		$this->load->helper('text');
		$pisah_kata  = explode(",",$rows['tag']);
		$jml_katakan = (integer)count($pisah_kata);
		$jml_kata = $jml_katakan-1; 
		$ambil_id = substr($rows['id_berita'],0,4);
		$cari = "SELECT * FROM berita join kategori on kategori.id_kategori = berita.id_kategori WHERE (id_berita<'$ambil_id') and (id_berita!='$ambil_id') and (" ;
		for ($i=0; $i<=$jml_kata; $i++){
		$cari .= "tag LIKE '%$pisah_kata[$i]%'";
		if ($i < $jml_kata ){
		$cari .= " OR ";}}
		$cari .= ") ORDER BY id_berita DESC LIMIT 3";
		$hasil  = $this->db->query($cari);
		if ($hasil->num_rows()>=1) {
	?>
	<div class="related-blog card mb-4 shadow">
		<h5 class="card-header">
			Baca Lainnya
		</h5>
		<div class="card-body">
			<div class="row">
				<?php 
					$base_path = FCPATH; 
					foreach ($hasil->result_array() as $related_row) {	
						$total_komentar_terkait = $this->model_utama->view_where('komentar',array('id_berita' => $related_row['id_berita'],'aktif' => 'Y'))->num_rows(); 					  		
						$img_src = base_url()."asset/foto_berita/no-image.jpg";
						if ($related_row['gambar'] !== '' &&  file_exists( $base_path ."asset/foto_berita/".($related_row['gambar']) ) ){
								$img_src = base_url()."asset/foto_berita/". $related_row['gambar'];
						}	
				?>
				<div class="col-lg-4 column">
					<div class="blog card mb-4 h-100"> 	
						<div class="image-container" 
								style="
									background:url('<?php echo $img_src;?>');
									background-position:center;
									background-size:cover;
									background-repeat:no-repeat;
									max-height:210px;
								">
						</div>   
						<div class="card-body">
							<a href="<?php echo base_url().$related_row['judul_seo'];?>">
								<h5 class="card-title"><?php echo $related_row['judul'];?></h5>
							</a>
							<div class="post-meta">		
								
								<i class="fa fa-calendar"></i> <?php echo tgl_indo($related_row['tanggal']); ?> , 
								<a href="<?php echo base_url()."kategori/detail/$related_row[kategori_seo]"; ?>">
									<b><?php echo "$related_row[nama_kategori]"; ?></b>
								</a> 
							</div>
							<div class="post-content">
								<?php echo strip_tags(word_limiter($related_row['isi_berita'],10) );?> 
							</div>
							<a href="<?php echo base_url().$related_row['judul_seo'];?>" class="read-more">Selengkapnya</a>
						</div>
					</div>
				</div>
				<?php
				}  
				?>
			</div>
		</div>
	</div>	
	<?php			
	}
	?>
	<?php include 'partials/komentar.php';?> 
 