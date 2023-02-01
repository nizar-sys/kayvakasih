<?php 
$berita_terbaru_max = 8;
$berita_pilihan_max = 5;

$get_berita_terbaru_max    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'terbaru_max'))->row_array();
if(isset($get_berita_terbaru_max['value'])){
	if(!empty($get_berita_terbaru_max['value'])){
		$berita_terbaru_max = (int) json_decode($get_berita_terbaru_max['value'],true);
	}
}


$get_berita_pilihan_max    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'pilihan_max'))->row_array();
if(isset($get_berita_pilihan_max['value'])){
	if(!empty($get_berita_pilihan_max['value'])){
		$berita_pilihan_max = (int) json_decode($get_berita_pilihan_max['value'],true);
	}
}


$base_path = FCPATH;
?>
			<div class="row"> 
			<?php 
				$no = 1;
				$berita_terbaru = $this->model_utama->view_join_two(
					'berita',
					'users',
					'kategori',
					'username',
					'id_kategori',
					array(
						'status' => 'Y'
					),
					'tanggal','DESC',0,$berita_terbaru_max
				);

                foreach ($berita_terbaru->result_array() as $row) {	
					$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $row['id_berita']))->num_rows();
					$tgl = tgl_indo($row['tanggal']);
					$isi_berita =(strip_tags($row['isi_berita'])); 
					$isi = substr($isi_berita,0,170); 
					$isi = substr($isi_berita,0,strrpos($isi," ")); 
					$judul = $row['judul'];  		
					$img_src = base_url()."asset/foto_berita/no-image.jpg";
					if ($row['gambar'] !== '' &&  file_exists( $base_path ."asset/foto_berita/".($row['gambar']) ) ){
						  $img_src = base_url()."asset/foto_berita/". $row['gambar'];
					}	
					?>
					<div class="col-md-6 mb-4"> 
						<div class='blog card shadow h-100'>
							<div class="image-container" 
									style="
										background:url('<?php echo $img_src;?>');
										background-position:center;
										background-size:cover;
										background-repeat:no-repeat
									"> 
							</div>  
						 
							<div class='card-body'>
								<a title="<?php echo $row['judul'];?>" href="<?php echo base_url().$row['judul_seo'];?>">
									<h3 class='card-title'>
										<?php echo $judul;?>
									</h3>
								</a>
								<div class='post-meta'> 
									<i class="fa fa-calendar" aria-hidden="true"></i> <?php echo tgl_indo($row['tanggal']);?> ,
									<i class="fa fa-user"></i> <?php echo "$row[nama_lengkap]"; ?>	,								
									<a href="<?php echo base_url(). 'kategori/detail/' . $row['kategori_seo'];?>">
										<b><?php echo $row['nama_kategori'];?></b>
									</a>
								</div>
								<div class='card-text'>
									<?php echo $isi;?> . . .
								</div>
								<a href="<?php echo base_url().$row['judul_seo'];?>" class="read-more">
									Selengkapnya
								</a>
							</div>
						</div>									
					</div>
				<?php } ?>
			</div>
			
			<?php
				$ia = $this->model_utama->view_where_ordering_limit('iklantengah',array('posisi'=>'home'),'id_iklantengah','ASC',0,1)->row_array();
				if( !empty($ia)){  
			?>
			<div class="row">
				<div class="col-md-12 mt-4">
				<?php
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
			?>
				</div>
			</div>
			<?php } ?>

			<div class="row">
				<div class="col-md-12 my-4">
					<div class="row-blog card shadow">
						<h5 class="card-header">Pilihan Redaksi</h5>
						<div class="card-body">
							<ul>
								<?php 
									$pilihan = $this->model_utama->view_join_two(
										'berita',
										'users',
										'kategori',
										'username',
										'id_kategori',
										array(
											'berita.aktif' => 'Y',
											'berita.status' => 'Y'
										),
											'tanggal','DESC',0,$berita_pilihan_max
									);
									foreach ($pilihan->result_array() as $pi) {
									$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $pi['id_berita']))->num_rows();
									$tgl = tgl_indo($pi['tanggal']);
									$isi_berita =(strip_tags($pi['isi_berita'])); 
									$isi = substr($isi_berita,0,170); 
									$isi = substr($isi_berita,0,strrpos($isi," "));  
									
									$img_src= base_url().'asset/foto_berita/small_no-image.jpg';
									if ($pi['gambar'] !==''){
										$img_src =base_url().'asset/foto_berita/'.$pi['gambar'];
									} 
									$img_size = getimagesize($img_src);
									$class_image= ($img_size[0] > $img_size[1]) ? 'landscape':'portrait'; 
									?>
										<li>
												<div class="post-img-container">
													<div class="thumbnail">
														<div class="center">
															<img class="<?php echo $class_image;?>" src="<?php echo $img_src;?>" title="image" />
														</div>
													</div>
												</div>
												<div class="post-body">
													<a href="<?php echo base_url().$pi['judul_seo'];?>"  > 
														<h4 class="post-header">
															<?php echo $pi['judul'];?> 
														</h4>
													</a>
													<div class="post-meta"> 
														<i class="fa fa-calendar"></i> <?php echo tgl_indo($pi['tanggal']); ?> ,
														<i class="fa fa-user"></i> <?php echo "$pi[nama_lengkap]"; ?>,
														<a href="<?php echo base_url()."kategori/detail/$pi[kategori_seo]"; ?>">
															<b><?php echo "$pi[nama_kategori]"; ?></b>
														</a>
													</div>
													<div class="post-content">
														<?php echo $isi;?> ...
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
			