<div class="widget card mb-4 widget-social">
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
	<div class="social-bar">
		<?php
			$sosmed = $this->model_utama->view('identitas')->row_array();
			$pecahd = explode(",", $sosmed['facebook']);
		?>
		<a target="_BLANK" href="<?php echo $pecahd[0]; ?>" class="social-icon"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		<a target="_BLANK" href="<?php echo $pecahd[1]; ?>" class="social-icon"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		<a target="_BLANK" href="<?php echo $pecahd[2]; ?>" class="social-icon"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		<a target="_BLANK" href="<?php echo $pecahd[3]; ?>" class="social-icon"><i class="fa fa-youtube" aria-hidden="true"></i></a>
		<?php			
			if( isset($widget_setting['teks']) ) {
				if( !empty(trim($widget_setting['teks']))) {
					?>	 
					<div class="social-text"><?php echo $widget_setting['teks'];?></div> 
					<?php
				}
			} 
		?> 
	</div>
</div> 