<div class="post-head mb-4"> 
Total Hasil Persentasi / Perhitungan Poling
</div>
<div class="blog card shadow detail mb-4">
	<div class="card-body">
		<?php
		if (get_cookie('poling')!='') {
			?>
			<div class="alert alert-danger">
				<strong>Mohon Maaf</strong>
				<p>Anda sudah pernah melakukan pemilihan terhadap jajak pendapat sebelumnya!. <br>
				  Klik <a href="<?php echo base_url()."polling";?>">disini</a> untuk melihat hasil polling.</p>
			</div> 
			<?php
		}else{
			set_cookie('poling', random_string('alnum', 64), time()+3600*24); 		
			?>
			<h4 class="card-title">
				Berikut Adalah hasil Perhitungan sementara Poling yang masuk.
			</h4>
			<p>Silahkan untuk selalu mengunjungi halaman ini untuk melihat hasil terbarunya.Terima kasih</p>		
			<div class="card-text polling"> 
				<div class="row">
					<?php
						foreach ($polling->result_array() as $s) {
						$prosentase = sprintf("%2.1f",(($s['rating']/$rows['jml_vote'])*100));
						$gbr_vote   = $prosentase * 3;
						?>
						<div class="col-md-12">
							<label class="title">
								<?php echo $s['pilihan'];?> ( <?php echo $s['rating'];?> )
							</label>
							<label class="result">
								<?php echo $prosentase."%";?>
							</label>
							<label class="bar" style="width:<?php echo ($prosentase+2).'%';?>">							
							</label>
						</div>
						<?php
						}
					?>
				</div>	
			</div> 
			<h5>Jumlah Pemilih: <?php echo $rows['jml_vote'];?></h5>
			<?php 
		} 
	?>
	</div> 
</div>