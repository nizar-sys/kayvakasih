<div class="widget card mb-4 widget-comments"> 
		<?php   
			$jumlah_komentar = 0;
			if( isset($widget_setting['judul']) ) {
				if( !empty(trim($widget_setting['judul']))) {
					?>					
					<h5 class="card-header">
						<?php echo $widget_setting['judul'];?>
					</h5>
					<?php 
				}
			}

			if( isset($widget_setting['jumlah']) ) {
				$jumlah_komentar = (int) $widget_setting['jumlah'];
			} 
		?>  
		<ul>
			<?php
				$komentar = $this->model_utama->view_where_ordering_limit(
					'komentar',
					array('aktif' => 'Y'),
					'id_komentar',
					'DESC',
					0,$jumlah_komentar
				);
				$this->load->helper('text'); 
			  	foreach ($komentar->result_array() as $r) {
					$tgl = tgl_indo($r['tgl']);
					$isi_komentar = strip_tags($r['isi_komentar']);  
					$avatar = md5(strtolower(trim($r['email'])));
					$b = $this->model_utama->view_where('berita',array('id_berita' => $r['id_berita']))->row_array();
					?>

					<li>
						<div class='comment-photo'>
							<?php if(!empty($avatar)) {?>
							<img src='https://www.gravatar.com/avatar/<?php echo $avatar;?>.jpg?s=60'/>
							<?php } else { ?>
							<i class="fa fa-user-circle user" aria-hidden="true"></i>
							<?php } ?>
						</div>
						<div class='comment-content'>
							<h5> <?php echo $r['nama_komentar'];?></h5>
							<div> 						
								<?php echo word_limiter( strip_tags($isi_komentar),10);?> 
							</div>
							<a href="<?php echo base_url().$b['judul_seo'];?>" class="pt-2 read-more">
								Selengkapnya
							</a>
						</div>
					 </li>
					 <?php
				}
				
			?>
			
		</ul> 
</div>
