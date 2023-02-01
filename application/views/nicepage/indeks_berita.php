<div class="post-head mb-4"> 
Index Berita
</div> 
<div class="card blog shadow mb-4">
	<h5 class="card-header">Lihat Indeks Tanggal </h5>
	<div class="card-body">
		<form action="<?php echo base_url()."berita/indeks_berita";?>" method="POST" class="form-inline">
			<div class="form-group mr-2">
				<select name='tanggal' class='form-control'>";
					<?php
					for($n=1; $n<=31; $n++){
						if (isset($_POST['filter'])){ $tgls = $_POST['tanggal']; }else{ $tgls = date("d"); }
						if ($tgls==$n){
							echo "<option value='$n' selected>$n</option>";
						}else{
							echo "<option value='$n'>$n</option>";
						}
					}
					?>
				</select>
			</div>
			<div class="form-group mr-2">
				<select name='bulan' class='form-control'>
						<?php
						$bln = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
						for($n=1; $n<=12; $n++){
							if (isset($_POST['filter'])){ $blns = $_POST['bulan']; }else{ $blns = date("n"); }
							if ($blns == $n){
								echo "<option value='$n' selected>$bln[$n]</option>";
							}else{
								echo "<option value='$n'>$bln[$n]</option>";
							}
						}
						?>			
				</select>
			</div>
			<div class="form-group mr-2">
				<select name='tahun' class='form-control'>			
					<?php
					for($n=2008; $n<=date('Y'); $n++){ 
						if (isset($_POST['filter'])){ $year = $_POST['tahun']; }else{ $year = date("Y"); }
						if ($year == $n){
							echo "<option value='$n' selected>$n</option>";
						}else{
							echo "<option value='$n'>$n</option>";
						}
					} 											
					?>			
				</select>
			</div>
			<div class="form-group mr-2">
				<input class='btn btn-theme' type='submit' name='filter' value='Lihat Indeks'>
			</div>	
		</form>
	</div>
</div>
 
<div class="blog-list card shadow my-4"> 
<?php

	if (isset($_POST['filter'])){
		$bulan = strlen($_POST['bulan']);
		$tanggal = strlen($_POST['tanggal']);		
		if ($bulan <= 1){ $bulann = '0'.$_POST['bulan']; }else{ $bulann = $_POST['bulan']; }
		if ($tanggal <= 1){ $tanggall = '0'.$_POST['tanggal']; }else{ $tanggall = $_POST['tanggal']; }
		$fil = $_POST['tahun'].'-'.$bulann.'-'.$tanggall;
	}else{
		$fil = date("Y-m-d");
	} 
	 
		?>
		<div class="card-body">
		<?php 
			if ($record->num_rows() > 0) {
			foreach ($record->result_array() as $t) {
				$total = $this->model_utama->view_where('berita',array('id_kategori' => $t['id_kategori'],'tanggal' => $fil,'status' => 'Y'))->num_rows();
				if ($total >= 1){	 
						?>
						<a href="<?php echo base_url()."kategori/detail/".$t['kategori_seo'];?>">
							<h5 class="list-title">
								<?php echo $t['nama_kategori'];?>
							</h5>
						</a>
						<ul>
						<?php
								$sql = $this->model_utama->view_where_ordering_limit('berita',array('id_kategori' => $t['id_kategori'],'tanggal' => $fil,'status' => 'Y'),'id_berita','DESC',0,5);							
								foreach($sql->result_array() as $r) {
									$judul = $r['judul'];
									$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r['id_berita']))->num_rows();
									?>
									<li>
										<div class="post-content">
											<div class="post-title">
												<a title="<?php echo $r['judul'];?>" href="<?php echo base_url().$r['judul_seo'];?>">
													<?php echo $judul;?>
												</a>
											</div>
											<div class="post-meta">  
												<i class="fa fa-calendar"></i> <?php echo tgl_indo($r['tanggal']); ?> 
											</div>
										</div>
									</li>
									<?php
								}
						?>
						</ul>
						<?php		
				}
			}
		}	
		
		if ($hitung->num_rows()<1){
			echo "<center style='padding:15%'>Maaf, Belum ada artikel yang diterbitkan pada hari ini (".tgl_indo($hari_ini).").</center>";
		}
		?>

		</div>
		<?php 

?>
</div> 

