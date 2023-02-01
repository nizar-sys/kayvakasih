<?php if ($total_komentar > 0 ){ ?>
<div class="card my-4 shadow" id="listcomment"> 
	<div class="card-body">
		<h3 class="comments"><?php echo "Ada $total_komentar Komentar untuk Berita Ini"; ?>
			<a href="#writecomment" class="comment-write">
				<i class="fa fa-pencil"></i> Tulis Komentar
			</a>
		</h3> 
				<ol class="commentlist">
						<?php
							$no = 1; 
							
							// paginasi komentar
							$komentar_base_url = base_url().$rows['judul_seo'];
							$komentar_per_page = 10;
							$komentar_total_page = ceil((int) $total_komentar / $komentar_per_page);
							$komentar_page = 1;
							$komentar_offset = 0;
							if(isset($_GET['kpage'])){
								$komentar_page = (int) $_GET['kpage'];
								if($komentar_page > 1 ) {
									$komentar_offset = ($komentar_per_page * ( $komentar_page - 1) ); 
								}
							}
							// end  

							$komentar = $this->model_utama->view_where_ordering_limit(
								'komentar',
								array(
									'id_berita' => $rows['id_berita'],
									'aktif' => 'Y'
								),
								'id_komentar',
								'DESC',
								$komentar_offset, 
								$komentar_per_page
							);
							
							foreach ($komentar->result_array() as $komentar_berita) {
								$isian=nl2br($komentar_berita['isi_komentar']); 
								$komentarku = sensor($isian); 
								$class_list = 'even';
								if(($no % 2)==0) { 
									$class_list = 'odd';
								} 
								$avatar = md5(strtolower(trim($komentar_berita['email'])));
								?>
								<li class="comment <?php echo $class_list;?>"> 
									<div class='avatar'>
										<?php if(!empty($avatar)) {?>
										<img src='https://www.gravatar.com/avatar/<?php echo $avatar;?>.jpg?s=60'/>
										<?php } else { ?>
										<i class="fa fa-user-circle user" aria-hidden="true"></i>
										<?php } ?> 
									</div>
									<div class="comment-author">
										<a href="<?php echo $komentar_berita['url'];?>">
											<?php echo $komentar_berita['nama_komentar'];?>
										</a>
									</div>
									<div class="comment-metadata">
										<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo tgl_indo($komentar_berita['tgl']) ;?>
									</div>
									<div class='comment-body'>
										<?php echo $komentarku;?>
									</div>
								<?php
								$no++;
								?> 
								</li>
								<?php
							}
						?>
				</ol> 

				
					
				<?php if( ($komentar_total_page > 1) && ($komentar_page <= $komentar_total_page) ) {?>
					<div class="navigation">
						<?php if($komentar_page > 1 ){?>
							<div class="alignleft">
								<a href="<?php echo $komentar_base_url;?>?kpage=<?php echo ($komentar_page -1 );?>#listcomment">
									<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Sebelum
								</a>
							</div>
						<?php }?>	

						<?php if( ($komentar_page >= 1) && ($komentar_page < $komentar_total_page)) {?>
							<div class="alignright">
								<a href="<?php echo $komentar_base_url;?>?kpage=<?php echo ($komentar_page + 1);?>#listcomment">
									Selanjutnya <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> 
								</a>
							</div>
						<?php }?>	
					</div>
				<?php } ?>
				
	</div>
</div>
<?php } ?>


<div class="comment-respond" id="writecomment">
	<h3 class="comment-reply-title">Tulis Komentar</h3> 
	<?php echo form_open('komentar-berita',array('class' => 'comment-form' , 'id' => 'form_komentar'));?>  
		<input type="hidden" name='berita' value='<?php echo "$rows[id_berita]"; ?>'>
			<?php  
				$alert = $this->session->flashdata('komentar_message');   
				if( !empty($alert) && isset($alert['success'])) {?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
						<?php echo $alert['success'];?>
					</div>
					<?php
				}
				if( !empty($alert) && isset($alert['warning'])) {?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
						<?php echo $alert['warning'];?>
					</div>
					<?php
				}
			?>
		<div class="row">
			<div class="col-md-6 form-group">
				<label for="c_name">Nama <span class="required">*</span></label>
				<input type="text" placeholder="Nama" name='nama' class="form-control" required/>
			</div>
			<div class="col-md-6 form-group">								
				<label for="c_email">E-mail <span class="required">*</span></label>
				<input type="text" name='email' placeholder="E-mail" class="form-control" required/>	
				<span class="info">(Tidak ditampilkan dikomentar)</span>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="c_webside">Website</label>
				<input type="text" name='url_website' placeholder="Website" class="form-control" />
			</div>
		</div>							
		<div class="row">
			<div class="form-group col-md-12">
				<label for="c_message">Komentar <span class="required">*</span></label>
				<textarea rows="5" name='komentar' placeholder="Tulis Komentar Anda .." class="form-control" required></textarea>
			</div>
		</div>								
		<div class="row">
			<div class="col-md-12">
				<label >Kode Keamanan <span class="required">*</span></label>
			</div>
			<div class="form-group col-md-3">
				<label><?php echo $image; ?></label>
			</div>							
			<div class="form-group col-md-9">
				<input name='security_code' maxlength=6 type="text" class="form-control" required placeholder="Masukkkan kode di sebelah kiri..">
			</div>
		</div>	
		<div class="row">
			<div class="form-group col-md-12">
				<input type="submit" name="submit" class="btn btn-theme" value="Kirim" onclick="return confirm('Haloo, komentar anda akan tampil setelah kami setujui?')"/>
			</div>
		</div>	 
	<?php echo form_close();?>
</div>