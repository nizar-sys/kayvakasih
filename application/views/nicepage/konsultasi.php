<?php if ($this->uri->segment(3) == ''){ $stat = 'Pertanyaan'; $id = '0'; }else{ $stat = 'Jawaban'; $id = $this->uri->segment(3); } ?>
<div class="post-head mb-4"> 
	Tuliskan <?php echo "$stat"; ?> Anda Pada Form Dibawah Ini
</div>   

<div class="blog card shadow mb-4">
	<div class="card-body">
		<form class="form" action="<?php echo base_url(); ?>konsultasi/reply" method="POST" onSubmit="return validasi(this)" id="form_komentar">
			<input type="hidden" value='<?php echo $id; ?>' name='a'>
			<div class="form-group">
				<label for="c_name">Nama Anda<span class="required">*</label>
				<input class="form-control" type="text" placeholder="Nama Anda" id="nama" value='<?php echo "$usr[nama_lengkap]"; ?>' name='b' class="required" required/>
			</div>
			<div class="form-group">
				<label for="c_email">E-mail<span class="required">*</span></label>
				<input class="form-control"  type="text" name='c' placeholder="Alamat E-mail" id="email" value='<?php echo "$usr[email]"; ?>' class="required" required/>
			</div>
			<?php 
				$tanya = $this->model_utama->view_where('tbl_comment',array('id_komentar'=>$this->uri->segment(3)))->row_array();
				if ($this->uri->segment(3) != ''){  
			?>
			<div class="form-group">
				<label for='c_email'><b>Pertanyaan</b><span class='required'></span></label>
				<div class="alert alert-warning"><?php echo $tanya['isi_pesan'];?> ? </div>
			</div>
			<?php							
				}
			?>
			<div class="form-group">
				<label for="c_message"><?php echo "$stat"; ?><span class="required">*</span></label>
				<textarea class="form-control"  name='d' placeholder="Tuliskan <?php echo "$stat"; ?> Anda.." class="required" required></textarea>
			</div>
			<div class="form-group">
				<?php if ($this->uri->segment(3) == ''){ ?>
					<input type="submit" name="submit" class="btn btn-submit" value="Kirimkan Pertanyaan" onclick="return confirm('Yakin ingin mengirimkan pertanyaan ini ?')"/>
				<?php }else{ ?>
					<input type="submit" name="submit" class="btn btn-submit" value="Kirimkan Balasan" onclick="return confirm('Kirimkan Sebagai Balasan Pesan terpilih?')"/>
				<?php } ?>
			</div>
		</form>
	</div>
</div>
<div class="blog card shadow mb-4">	
	<div class="card-body">  
			<h3 class="comments">
				<?php 
					$total = $this->model_utama->view_where('tbl_comment',array('reply'=>0))->num_rows();
					echo "Total Ada $total Pertanyaan"; 
				?> 
			</h3>
 

 
			<ol class="commentlist"> 
					<?php
						$no = 1;
						foreach ($konsultasi->result_array() as $kka) {
							$isian=nl2br($kka['isi_pesan']); 
							$komentarku=sensor($isian); 
							$class_list = 'even';
							if(($no % 2)==0) { 
								$class_list = 'odd';
							} 	
							$avatar = md5(strtolower(trim($kka['alamat_email'])));
							?>
							<li class="comment <?php echo $class_list;?>">
								<div id="comment-<?php echo $kka['id_komentar'];?>" class="comment-question"> 
									<div class='avatar'>
										<?php if(!empty($avatar)) {?>
										<img src='https://www.gravatar.com/avatar/<?php echo $avatar;?>.jpg?s=60'/>
										<?php } else { ?>
										<i class="fa fa-user-circle user" aria-hidden="true"></i>
										<?php } ?> 
									</div>
									<div class="comment-author">
										<a href="#">
											<?php echo $kka['nama_lengkap'];?>
										</a>
									</div>
									<div class="comment-metadata">
										<?php echo tgl_indo($kka['tanggal_komentar']).", ".$kka['jam_komentar']." WIB";?>
									</div>
									<div class='comment-body'>
										<?php echo $komentarku;?>
									</div>
									<?php
									if ($this->session->level!=''){ ?>
										<div class="comment-footer">
											<a class="btn btn-sm btn-submit"  href="<?php echo base_url()."konsultasi/index/".$kka['id_komentar'];?>">
												<i class="fa fa-clock-o" aria-hidden="true"></i> Berikan Jawaban
											</a>
											<a class="btn btn-sm btn-delete-outline" href="<?php echo base_url()."konsultasi/delete/".$kka['id_komentar'];?>">
												<i class="fa fa-trash" aria-hidden="true"></i> Hapus
											</a> 
											<a class="btn btn-sm btn-logout-outline"  href="<?php echo base_url()."administrator/logout";?>">
												<i class="fa fa-sign-out" aria-hidden="true"></i> Logout
											</a> 
										</div>
									<?php } ?>
								</div>

								<?php 												
									$reply = $this->model_utama->view_where('tbl_comment',array('reply'=>$kka['id_komentar']));	
									if( $reply->result_array() ) {
										?>
										<div id="comment-reply-<?php echo $kka['id_komentar'];?>" class="comment-answer">
										<?php
										foreach ($reply->result_array() as $r) { 
											$avatar = md5(strtolower(trim($r['alamat_email'])));
											?> 
											<div class='avatar'>
												<?php if(!empty($avatar)) {?>
												<img src='https://www.gravatar.com/avatar/<?php echo $avatar;?>.jpg?s=60'/>
												<?php } else { ?>
												<i class="fa fa-user-circle user" aria-hidden="true"></i>
												<?php } ?> 
											</div>
											<div class="comment-author">
												Dijawab oleh :
												<a href="#">
													<?php echo $r['nama_lengkap'];?>
												</a>
											</div>
											<div class="comment-metadata">
												<?php echo tgl_indo($r['tanggal_komentar']).", ".$r['jam_komentar']." WIB";?>
											</div>
											<div class='comment-body'>
												<?php echo $r['isi_pesan'];?>
											</div>
											<?php 
										}	
										?>
										</div>
										<?php
									}
								
							$no++;
							?> 
							</li>
							<?php
						}
					?> 						
			</ol>

				 
	</div>
</div> 