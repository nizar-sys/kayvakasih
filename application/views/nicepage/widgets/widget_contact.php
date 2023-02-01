<div class="widget card mb-4 widget-contact">
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
	<div class="contact">
	<?php			
		if( isset($widget_setting['email']) ) {
			if( !empty(trim($widget_setting['email']))) {
				?>				
				<div class="data">
					<label>
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</label>
					<div class="content">
						<?php echo $widget_setting['email'];?>
					</div>
				</div>
				<?php
			}
		} 
	?>   
	
	<?php			
		if( isset($widget_setting['telp']) ) {
			if( !empty(trim($widget_setting['telp']))) {
				?>
				<div class="data">
					<label>
						<i class="fa fa-phone" aria-hidden="true"></i>
					</label>
					<div class="content">
						<?php echo $widget_setting['telp'];?>
					</div>
				</div>
				<?php 
			}
		} 
	?>  
	<?php			
		if( isset($widget_setting['alamat']) ) {
			if( !empty(trim($widget_setting['alamat']))) {
				?>
				<div class="data">
					<label>
						<i class="fa fa-map" aria-hidden="true"></i>
					</label>
					<div class="content">
						<?php echo $widget_setting['alamat'];?>
					</div>
				</div>
				<?php 
			}
		} 
	?>  
	</div> 
</div> 