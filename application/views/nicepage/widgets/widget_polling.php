<div class="widget card mb-4 widget-polling"> 
		<?php  
			if( isset($widget_setting['judul']) ) {
				if( !empty(trim($widget_setting['judul']))) {
					?>					
					<h5 class="card-header">
						<?php echo $widget_setting['judul'];?>
					</h5>
					<?php 
				}
			}  
		?>  
	<div class="card-body">
		<?php
			$t = $this->model_utama->view_where('poling',array('aktif' => 'Y','status' => 'Pertanyaan'))->row_array();
		?>
		<div class="card-title">
			<strong><?php echo $t['pilihan'];?></strong>
		</div>
		<form class="form" method="POST" action="<?php echo base_url()."polling/hasil";?>">	
		<div class="form-group">
			<?php  
				$pilih = $this->model_utama->view_where('poling',array('aktif' => 'Y','status' => 'Jawaban'));
				foreach ($pilih->result_array() as $p) {
					?>
					<label>
						<input type="radio" name="pilihan" value="<?php echo $p['id_poling'];?>"/> <?php echo $p['pilihan'];?>
					</label>
					<?php
				}
			?>
	 	</div>
		<div class="form-group">
			<input type=submit class="btn btn-submit" value="Pilih" />
			<a class="btn btn-info" href="<?php echo base_url()."polling";?>">Lihat Hasil</a>
		</div>
		</form>
	</div>
</div>